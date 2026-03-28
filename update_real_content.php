<?php // update_real_content.php
require_once 'config.php';
$pdo = getDB();

$file = 'uploads/livres/python_chap1.pdf';

// Update Python book specifically
$pdo->prepare("UPDATE livre SET url_numerique = ? WHERE titre LIKE '%Python%'")->execute([$file]);

// Update other books that are currently pointing to dummy.pdf to use this one instead for better demo
$pdo->prepare("UPDATE livre SET url_numerique = ? WHERE url_numerique = 'uploads/livres/dummy.pdf'")->execute([$file]);

echo "Real content updated for digital books.";
