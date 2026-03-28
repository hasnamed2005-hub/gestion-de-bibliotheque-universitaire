<?php
require_once 'config.php';
$pdo = getDB();

$updates = [
    '978-2-10-080914-1' => 'https://www.eyrolles.com/Chapitres/9782212134346/Swinnen_G.pdf', // Python
    '978-2-07-041311-9' => 'https://beq.ebooksgratuits.com/vents/Camus_Letranger.pdf', // L'Etranger
    '978-2-266-23133-4' => 'https://www.google.fr/books/edition/Sapiens/Kz4vDgAAQBAJ?hl=fr&gbpv=1' // Sapiens (preview)
];

foreach ($updates as $isbn => $url) {
    $pdo->prepare("UPDATE livre SET url_numerique = ? WHERE isbn = ?")->execute([$url, $isbn]);
}

echo "Success: Digital URLs updated.\n";
