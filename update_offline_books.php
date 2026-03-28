<?php // update_offline_books.php
require_once 'config.php';
$pdo = getDB();

$updates = [
    'Alice in Wonderland' => 'uploads/livres/alice.pdf',
    'Structure Sample' => 'uploads/livres/structure.pdf',
    'Sales Order Sample' => 'uploads/livres/sample1.pdf',
];

foreach($updates as $titre => $url) {
    $stmt = $pdo->prepare("UPDATE livre SET url_numerique = ? WHERE titre LIKE ?");
    $stmt->execute([$url, "%$titre%"]);
    echo "Updated $titre to $url\n";
}

$pdo->prepare("UPDATE livre SET url_numerique = 'uploads/livres/dummy.pdf' WHERE url_numerique IS NOT NULL AND url_numerique NOT LIKE 'uploads/%'")->execute();

echo "Offline books updated.";
