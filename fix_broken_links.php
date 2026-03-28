<?php // fix_broken_links.php
require_once 'config.php';
$pdo = getDB();

// Point everything that was supposed to be local to dummy.pdf (since only it exists)
$pdo->prepare("UPDATE livre SET url_numerique = 'uploads/livres/dummy.pdf' WHERE url_numerique IS NOT NULL")->execute();

echo "All digital books now point to dummy.pdf for testing.";
