<?php // update_final.php
require_once 'config.php';
$pdo = getDB();

$file = 'uploads/livres/real_sample.pdf';
$pdo->prepare("UPDATE livre SET url_numerique = ? WHERE url_numerique IS NOT NULL")->execute([$file]);

echo "All digital books now point to a real, multi-page local PDF.";
