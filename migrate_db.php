<?php
require_once 'config.php';
$pdo = getDB();
try {
    $pdo->exec("ALTER TABLE livre ADD COLUMN url_numerique VARCHAR(255) DEFAULT NULL;");
    echo "Success: Column url_numerique added.\n";
} catch(Exception $e) {
    echo "Error or already exists: " . $e->getMessage() . "\n";
}
