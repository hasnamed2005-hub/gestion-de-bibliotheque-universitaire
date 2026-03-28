-- ============================================================
--  BiblioNational Djibouti — Base de données complète
--  Plateforme nationale multi-universités
-- ============================================================

CREATE DATABASE IF NOT EXISTS bibliodj
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bibliodj;

-- ============================================================
-- TABLE: universite
-- ============================================================
CREATE TABLE IF NOT EXISTS universite (
  id_univ      INT AUTO_INCREMENT PRIMARY KEY,
  code         VARCHAR(20) UNIQUE NOT NULL,
  nom          VARCHAR(200) NOT NULL,
  nom_court    VARCHAR(50),
  ville        VARCHAR(100) DEFAULT 'Djibouti-Ville',
  adresse      TEXT,
  telephone    VARCHAR(30),
  email        VARCHAR(150),
  logo_emoji   VARCHAR(10) DEFAULT '🎓',
  couleur      VARCHAR(7)  DEFAULT '#0E47A1',
  actif        TINYINT(1)  DEFAULT 1,
  created_at   DATETIME    DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================================
-- TABLE: utilisateur
-- ============================================================
CREATE TABLE IF NOT EXISTS utilisateur (
  id_user      INT AUTO_INCREMENT PRIMARY KEY,
  id_univ      INT          DEFAULT NULL,
  username     VARCHAR(80)  UNIQUE NOT NULL,
  password     VARCHAR(255) NOT NULL,
  password_clair VARCHAR(100) DEFAULT NULL,  -- visible par super-admin/admin
  role         ENUM('superadmin','admin','bibliothecaire','etudiant','enseignant') NOT NULL,
  id_membre    INT          DEFAULT NULL,
  actif        TINYINT(1)   DEFAULT 1,
  derniere_connexion DATETIME DEFAULT NULL,
  created_at   DATETIME     DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_univ) REFERENCES universite(id_univ) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================================
-- TABLE: membre
-- ============================================================
CREATE TABLE IF NOT EXISTS membre (
  id_membre        INT AUTO_INCREMENT PRIMARY KEY,
  id_univ          INT          NOT NULL,
  numero_carte     VARCHAR(30)  UNIQUE NOT NULL,
  nom              VARCHAR(100) NOT NULL,
  prenom           VARCHAR(100) NOT NULL,
  email            VARCHAR(150),
  telephone        VARCHAR(25),
  adresse          TEXT,
  type_membre      ENUM('etudiant','enseignant','personnel') DEFAULT 'etudiant',
  filiere          VARCHAR(120),
  niveau           VARCHAR(60),
  date_inscription DATE         NOT NULL DEFAULT (CURRENT_DATE),
  actif            TINYINT(1)   DEFAULT 1,
  FOREIGN KEY (id_univ) REFERENCES universite(id_univ) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ============================================================
-- TABLE: livre
-- ============================================================
CREATE TABLE IF NOT EXISTS livre (
  id_livre        INT AUTO_INCREMENT PRIMARY KEY,
  id_univ         INT          NOT NULL,
  isbn            VARCHAR(17)  NOT NULL,
  titre           VARCHAR(250) NOT NULL,
  auteur          VARCHAR(200) NOT NULL,
  editeur         VARCHAR(150),
  annee_pub       YEAR,
  categorie       VARCHAR(80),
  description     TEXT,
  nb_exemplaires  INT          DEFAULT 1,
  nb_disponibles  INT          DEFAULT 1,
  created_at      DATETIME     DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uk_isbn_univ (isbn, id_univ),
  FOREIGN KEY (id_univ) REFERENCES universite(id_univ) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ============================================================
-- TABLE: emprunt
-- ============================================================
CREATE TABLE IF NOT EXISTS emprunt (
  id_emprunt          INT AUTO_INCREMENT PRIMARY KEY,
  id_univ             INT  NOT NULL,
  id_membre           INT  NOT NULL,
  id_livre            INT  NOT NULL,
  id_bibliothecaire   INT  DEFAULT NULL,
  date_emprunt        DATE NOT NULL DEFAULT (CURRENT_DATE),
  date_retour_prevue  DATE NOT NULL,
  date_retour_reelle  DATE DEFAULT NULL,
  statut              ENUM('actif','rendu','retard') DEFAULT 'actif',
  notes               TEXT,
  FOREIGN KEY (id_univ)           REFERENCES universite(id_univ)    ON DELETE RESTRICT,
  FOREIGN KEY (id_membre)         REFERENCES membre(id_membre)       ON DELETE RESTRICT,
  FOREIGN KEY (id_livre)          REFERENCES livre(id_livre)         ON DELETE RESTRICT,
  FOREIGN KEY (id_bibliothecaire) REFERENCES utilisateur(id_user)   ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================================
-- TABLE: amende
-- ============================================================
CREATE TABLE IF NOT EXISTS amende (
  id_amende     INT AUTO_INCREMENT PRIMARY KEY,
  id_univ       INT           NOT NULL,
  id_emprunt    INT           NOT NULL,
  id_membre     INT           NOT NULL,
  jours_retard  INT           NOT NULL,
  montant       DECIMAL(10,2) NOT NULL,
  date_creation DATE          NOT NULL DEFAULT (CURRENT_DATE),
  statut        ENUM('impayee','payee') DEFAULT 'impayee',
  date_paiement DATE          DEFAULT NULL,
  FOREIGN KEY (id_univ)    REFERENCES universite(id_univ)  ON DELETE RESTRICT,
  FOREIGN KEY (id_emprunt) REFERENCES emprunt(id_emprunt)  ON DELETE CASCADE,
  FOREIGN KEY (id_membre)  REFERENCES membre(id_membre)    ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ============================================================
-- TABLE: inscription_demande
-- ============================================================
CREATE TABLE IF NOT EXISTS inscription_demande (
  id_demande   INT AUTO_INCREMENT PRIMARY KEY,
  id_univ      INT          NOT NULL,
  nom          VARCHAR(100) NOT NULL,
  prenom       VARCHAR(100) NOT NULL,
  email        VARCHAR(150) NOT NULL,
  telephone    VARCHAR(25),
  type_membre  ENUM('etudiant','enseignant') DEFAULT 'etudiant',
  filiere      VARCHAR(120),
  niveau       VARCHAR(60),
  message      TEXT,
  statut       ENUM('en_attente','approuvee','rejetee') DEFAULT 'en_attente',
  date_demande DATETIME     DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_univ) REFERENCES universite(id_univ) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- TABLE: notification
-- ============================================================
CREATE TABLE IF NOT EXISTS notification (
  id_notif     INT AUTO_INCREMENT PRIMARY KEY,
  id_user      INT          NOT NULL,
  message      TEXT         NOT NULL,
  type         ENUM('info','warn','success','danger') DEFAULT 'info',
  lu           TINYINT(1)   DEFAULT 0,
  created_at   DATETIME     DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_user) REFERENCES utilisateur(id_user) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- DONNÉES : Universités de Djibouti
-- ============================================================
INSERT INTO universite (code, nom, nom_court, ville, email, logo_emoji, couleur) VALUES
('UD',  'Université de Djibouti',              'Univ. Djibouti',  'Djibouti-Ville', 'biblio@univ.dj',      '🎓', '#0E47A1'),
('UG',  'Université du Golfe',                 'Univ. Golfe',     'Djibouti-Ville', 'biblio@univgolfe.dj', '🏫', '#1B8B3B'),
('ISG', 'Institut Supérieur de Gestion',       'ISG Djibouti',    'Djibouti-Ville', 'biblio@isg.dj',       '📊', '#8B1A1A'),
('IUT', 'Institut Universitaire de Technologie','IUT Djibouti',   'Djibouti-Ville', 'biblio@iut.dj',       '⚙️', '#5C3D1E');

-- ============================================================
-- DONNÉES : Utilisateurs
-- Mot de passe "password" pour tous (hashé + visible en clair)
-- ============================================================
INSERT INTO utilisateur (id_univ, username, password, password_clair, role) VALUES
-- Super Admin (gère toutes les universités)
(NULL, 'superadmin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'superadmin'),
-- Admin UD
(1, 'admin.ud', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'admin'),
-- Admin UG
(2, 'admin.ug', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'admin'),
-- Bibliothécaires
(1, 'biblio.ud', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'bibliothecaire'),
(2, 'biblio.ug', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'bibliothecaire');

-- ============================================================
-- DONNÉES : Membres UD
-- ============================================================
INSERT INTO membre (id_univ, numero_carte, nom, prenom, email, telephone, type_membre, filiere, niveau) VALUES
(1,'UD-ETU-001','Abdillahi','Fadumo',  'f.abdillahi@univ.dj','77000001','etudiant',  'Informatique',        'Licence 2'),
(1,'UD-ETU-002','Omar',     'Hassan',  'h.omar@univ.dj',     '77000002','etudiant',  'Droit',               'Licence 1'),
(1,'UD-ETU-003','Daher',    'Amina',   'a.daher@univ.dj',    '77000003','etudiant',  'Économie',            'Master 1'),
(1,'UD-ETU-004','Guedi',    'Mahad',   'm.guedi@univ.dj',    '77000004','etudiant',  'Lettres',             'Licence 3'),
(1,'UD-ETU-005','Ali',      'Hodan',   'h.ali@univ.dj',      '77000005','etudiant',  'Informatique',        'Master 2'),
(1,'UD-ENS-001','Ibrahim',  'Mohamed', 'm.ibrahim@univ.dj',  '77100001','enseignant','Informatique',        NULL),
(1,'UD-ENS-002','Said',     'Khadija', 'k.said@univ.dj',     '77100002','enseignant','Droit',               NULL),
-- Membres UG
(2,'UG-ETU-001','Bouh',     'Ilyas',   'i.bouh@univgolfe.dj','77200001','etudiant',  'Sciences',            'Licence 1'),
(2,'UG-ETU-002','Warsama',  'Safia',   's.warsama@univgolfe.dj','77200002','etudiant','Gestion',            'Licence 2'),
(2,'UG-ENS-001','Ahmed',    'Barkat',  'b.ahmed@univgolfe.dj','77300001','enseignant','Sciences',           NULL);

-- Utilisateurs étudiants UD
INSERT INTO utilisateur (id_univ, username, password, password_clair, role, id_membre) VALUES
(1,'f.abdillahi','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','password','etudiant',1),
(1,'h.omar',     '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','password','etudiant',2),
(1,'a.daher',    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','password','etudiant',3),
(1,'m.ibrahim',  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','password','enseignant',6),
(2,'i.bouh',     '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','password','etudiant',8),
(2,'s.warsama',  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','password','etudiant',9);

-- ============================================================
-- DONNÉES : Livres UD
-- ============================================================
INSERT INTO livre (id_univ, isbn, titre, auteur, editeur, annee_pub, categorie, description, nb_exemplaires, nb_disponibles) VALUES
-- Informatique (UD)
(1,'978-2-10-080914-1','Apprendre à programmer avec Python', 'Gérard Swinnen', 'Eyrolles', 2012, 'Informatique', 'Manuel d\'apprentissage de la programmation avec Python 3.', 5, 4),
(1,'978-2-10-079066-5','Réseaux informatiques', 'Andrew Tanenbaum', 'Pearson', 2011, 'Informatique', 'Ouvrage de référence mondial sur les architectures réseaux.', 3, 2),
(1,'978-2-04-732386-X','Sécurité informatique: Ethical Hacking', 'David Bombal', 'Eni', 2021, 'Informatique', 'Les bases de la cybersécurité et du pentesting.', 4, 4),
(1,'978-2-212-67895-4','Design Patterns - Tête la première', 'Eric Freeman', 'O\'Reilly', 2019, 'Informatique', 'Comprendre les modèles de conception orientés objet.', 2, 2),
(1,'978-2-10-077221-5','Intelligence Artificielle 3e édition', 'Stuart Russell', 'Pearson', 2010, 'Informatique', 'L\'approche moderne de l\'IA et du Machine Learning.', 3, 3),

-- Droit / Économie (UD)
(1,'978-2-247-19827-4','Droit civil : Les obligations', 'François Terré', 'Dalloz', 2018, 'Droit', 'Traité classique sur le droit des contrats.', 6, 6),
(1,'978-2-7081-3751-0','Macroéconomie européenne', 'Michael Burda', 'De Boeck', 2014, 'Économie', 'Mécanismes économiques et politiques monétaires.', 4, 3),
(1,'978-2-10-071536-6','Management : principes et méthodes', 'Stephen Robbins', 'Pearson', 2020, 'Sciences Soc.', 'Concepts fondamentaux du management d\'entreprise.', 5, 5),

-- Sciences & Ingénierie (UG)
(2,'978-2-10-081920-5','Physique générale : Mécanique', 'Marcel Alonso', 'Dunod', 2015, 'Sciences', 'Cours complet de mécanique physique pour licence.', 5, 5),
(2,'978-2-8073-0667-0','Chimie Organique - Traité', 'Jonathan Clayden', 'De Boeck', 2013, 'Sciences', 'Référence absolue pour les étudiants en chimie.', 3, 2),
(2,'978-2-225-84684-5','Génie civil : Résistance des matériaux', 'Jean Courbon', 'Eyrolles', 2008, 'Sciences', 'Principes de base pour les ingénieurs.', 4, 4),

-- Lettres & Langues (ISG / UD)
(1,'978-2-07-041311-9','L\'Étranger', 'Albert Camus', 'Gallimard', 1942, 'Littérature', 'Roman classique de l\'absurde.', 10, 8),
(1,'978-2-266-23133-4','Sapiens : Une brève histoire de l\'humanité', 'Yuval Noah Harari', 'Albin Michel', 2015, 'Histoire', 'Essai sur l\'évolution de l\'espèce humaine.', 7, 5),

-- Médecine (UG)
(2,'978-2-294-75844-5','Anatomie humaine - Atlas', 'Frank H. Netter', 'Elsevier Masson', 2019, 'Médecine', 'Incontournable pour l\'étude de l\'anatomie.', 3, 3),
(2,'978-2-257-20673-3','Pharmacologie médicale', 'Michael Neal', 'De Boeck', 2017, 'Médecine', 'Bases pharmacologiques de la thérapeutique.', 2, 2);

-- Emprunts UD
INSERT INTO emprunt (id_univ, id_membre, id_livre, id_bibliothecaire, date_emprunt, date_retour_prevue, statut) VALUES
(1,1,2,4,DATE_SUB(CURRENT_DATE,INTERVAL 30 DAY),DATE_SUB(CURRENT_DATE,INTERVAL 16 DAY),'retard'),
(1,2,5,4,DATE_SUB(CURRENT_DATE,INTERVAL 20 DAY),DATE_SUB(CURRENT_DATE,INTERVAL 6  DAY),'retard'),
(1,3,7,4,DATE_SUB(CURRENT_DATE,INTERVAL 8  DAY),DATE_ADD(CURRENT_DATE,INTERVAL 6  DAY),'actif'),
(1,4,1,4,DATE_SUB(CURRENT_DATE,INTERVAL 5  DAY),DATE_ADD(CURRENT_DATE,INTERVAL 9  DAY),'actif'),
(1,6,13,4,DATE_SUB(CURRENT_DATE,INTERVAL 3  DAY),DATE_ADD(CURRENT_DATE,INTERVAL 11 DAY),'actif');

-- Amendes
INSERT INTO amende (id_univ, id_emprunt, id_membre, jours_retard, montant) VALUES
(1,1,1,16,800.00),
(1,2,2,6, 300.00);

-- Demandes inscription
INSERT INTO inscription_demande (id_univ, nom, prenom, email, telephone, type_membre, filiere, niveau) VALUES
(1,'Moussa','Ayan',  'a.moussa@gmail.com','77400001','etudiant', 'Informatique','Licence 1'),
(1,'Hassan','Omar',  'o.hassan@gmail.com','77400002','etudiant', 'Droit',       'Licence 2'),
(2,'Djibril','Asad', 'a.djibril@gmail.com','77400003','etudiant','Sciences',    'Licence 1');
