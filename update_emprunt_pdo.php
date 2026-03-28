<?php
require_once 'config.php';
$pdo = getDB();
try {
    $pdo->exec("ALTER TABLE emprunt MODIFY COLUMN statut ENUM('actif','rendu','retard','en_attente') DEFAULT 'actif'");
    echo "Success: Altered emprunt table\n";
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
