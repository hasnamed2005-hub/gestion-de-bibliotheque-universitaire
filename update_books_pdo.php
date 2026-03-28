<?php
require_once 'config.php';
$pdo = getDB();
try {
    $pdo->beginTransaction();

    // 1. Delete dependent rows (demandes, amendes, emprunts)
    $pdo->exec("DELETE FROM amende");
    $pdo->exec("DELETE FROM emprunt");
    $pdo->exec("DELETE FROM livre");

    // 2. Insert new realistic books
    $sql_livres = "INSERT INTO livre (id_univ, isbn, titre, auteur, editeur, annee_pub, categorie, description, nb_exemplaires, nb_disponibles) VALUES
    (1,'978-2-10-080914-1','Apprendre a programmer avec Python', 'Gerard Swinnen', 'Eyrolles', 2012, 'Informatique', 'Manuel d\'apprentissage de la programmation avec Python 3.', 5, 4),
    (1,'978-2-10-079066-5','Reseaux informatiques', 'Andrew Tanenbaum', 'Pearson', 2011, 'Informatique', 'Ouvrage de reference mondial sur les architectures reseaux.', 3, 2),
    (1,'978-2-04-732386-X','Securite informatique: Ethical Hacking', 'David Bombal', 'Eni', 2021, 'Informatique', 'Les bases de la cybersecurite et du pentesting.', 4, 4),
    (1,'978-2-212-67895-4','Design Patterns - Tete la premiere', 'Eric Freeman', 'O\'Reilly', 2019, 'Informatique', 'Comprendre les modeles de conception orientes objet.', 2, 2),
    (1,'978-2-10-077221-5','Intelligence Artificielle 3e edition', 'Stuart Russell', 'Pearson', 2010, 'Informatique', 'L\'approche moderne de l\'IA et du Machine Learning.', 3, 3),
    (1,'978-2-247-19827-4','Droit civil : Les obligations', 'Francois Terre', 'Dalloz', 2018, 'Droit', 'Traite classique sur le droit des contrats.', 6, 6),
    (1,'978-2-7081-3751-0','Macroeconomie europeenne', 'Michael Burda', 'De Boeck', 2014, 'Économie', 'Mecanismes economiques et politiques monetaires.', 4, 3),
    (1,'978-2-10-071536-6','Management : principes et methodes', 'Stephen Robbins', 'Pearson', 2020, 'Sciences Soc.', 'Concepts fondamentaux du management d\'entreprise.', 5, 5),
    (2,'978-2-10-081920-5','Physique generale : Mecanique', 'Marcel Alonso', 'Dunod', 2015, 'Sciences', 'Cours complet de mecanique physique pour licence.', 5, 5),
    (2,'978-2-8073-0667-0','Chimie Organique - Traite', 'Jonathan Clayden', 'De Boeck', 2013, 'Sciences', 'Reference absolue pour les etudiants en chimie.', 3, 2),
    (2,'978-2-225-84684-5','Genie civil : Resistance des materiaux', 'Jean Courbon', 'Eyrolles', 2008, 'Sciences', 'Principes de base pour les ingenieurs.', 4, 4),
    (1,'978-2-07-041311-9','L\'Étranger', 'Albert Camus', 'Gallimard', 1942, 'Littérature', 'Roman classique de l\'absurde.', 10, 8),
    (1,'978-2-266-23133-4','Sapiens : Une breve histoire de l\'humanite', 'Yuval Noah Harari', 'Albin Michel', 2015, 'Histoire', 'Essai sur l\'evolution de l\'espece humaine.', 7, 5),
    (2,'978-2-294-75844-5','Anatomie humaine - Atlas', 'Frank H. Netter', 'Elsevier Masson', 2019, 'Médecine', 'Incontournable pour l\'etude de l\'anatomie.', 3, 3),
    (2,'978-2-257-20673-3','Pharmacologie medicale', 'Michael Neal', 'De Boeck', 2017, 'Médecine', 'Bases pharmacologiques de la therapeutique.', 2, 2)";
    $pdo->exec($sql_livres);

    // 3. Recreate some emprunts referencing the new book IDs
    // Get new book IDs using their ISBN
    function getBookId($pdo, $isbn) {
        $stmt = $pdo->prepare("SELECT id_livre FROM livre WHERE isbn = ?");
        $stmt->execute([$isbn]);
        return $stmt->fetchColumn();
    }
    
    $id_python = getBookId($pdo, '978-2-10-080914-1');
    $id_reseaux = getBookId($pdo, '978-2-10-079066-5');
    $id_macro = getBookId($pdo, '978-2-7081-3751-0');
    $id_chimie = getBookId($pdo, '978-2-8073-0667-0');
    $id_sapiens = getBookId($pdo, '978-2-266-23133-4');

    $sql_emprunts = "INSERT INTO emprunt (id_univ, id_membre, id_livre, id_bibliothecaire, date_emprunt, date_retour_prevue, statut) VALUES
    (1, 1, $id_python, 4, DATE_SUB(CURRENT_DATE,INTERVAL 30 DAY), DATE_SUB(CURRENT_DATE,INTERVAL 16 DAY), 'retard'),
    (1, 2, $id_reseaux, 4, DATE_SUB(CURRENT_DATE,INTERVAL 20 DAY), DATE_SUB(CURRENT_DATE,INTERVAL 6 DAY), 'retard'),
    (1, 3, $id_macro, 4, DATE_SUB(CURRENT_DATE,INTERVAL 8 DAY), DATE_ADD(CURRENT_DATE,INTERVAL 6 DAY), 'actif'),
    (1, 4, $id_sapiens, 4, DATE_SUB(CURRENT_DATE,INTERVAL 5 DAY), DATE_ADD(CURRENT_DATE,INTERVAL 9 DAY), 'actif'),
    (2, 8, $id_chimie, 5, DATE_SUB(CURRENT_DATE,INTERVAL 3 DAY), DATE_ADD(CURRENT_DATE,INTERVAL 11 DAY), 'actif')";
    $pdo->exec($sql_emprunts);

    // 4. Recreate amendes for the retards
    $id_emp_1 = $pdo->lastInsertId() - 4; // Approximative, let's fetch precisely:
    
    $stmt = $pdo->query("SELECT id_emprunt, id_membre, jours_retard FROM emprunt e JOIN (SELECT id_emprunt as ide, DATEDIFF(CURRENT_DATE, date_retour_prevue) as jours_retard FROM emprunt WHERE statut='retard') r ON e.id_emprunt = r.ide");
    $retards = $stmt->fetchAll();
    
    foreach ($retards as $r) {
        $montant = $r['jours_retard'] * 50; // TARIF_JOUR
        $pdo->exec("INSERT INTO amende (id_univ, id_emprunt, id_membre, jours_retard, montant) VALUES (1, {$r['id_emprunt']}, {$r['id_membre']}, {$r['jours_retard']}, $montant)");
    }

    $pdo->commit();
    echo "Success: Replaced old books with real books.";
} catch(Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "Error: " . $e->getMessage() . "\n";
}
