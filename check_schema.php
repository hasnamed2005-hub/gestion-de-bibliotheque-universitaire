<?php
require_once 'config.php';
$pdo = getDB();

echo "--- LIVRE TABLE ---\n";
$stmt = $pdo->query("DESCRIBE livre");
while($row = $stmt->fetch()) {
    echo $row['Field'] . " (" . $row['Type'] . ")\n";
}

echo "\n--- ACHAT TABLE ---\n";
try {
    $stmt = $pdo->query("DESCRIBE achat");
    while($row = $stmt->fetch()) {
        echo $row['Field'] . " (" . $row['Type'] . ")\n";
    }
} catch(Exception $e) {
    echo "Achat table not found or error: " . $e->getMessage() . "\n";
}
