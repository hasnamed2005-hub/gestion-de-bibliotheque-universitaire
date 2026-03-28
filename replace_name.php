<?php
$dir = new RecursiveDirectoryIterator('c:\wamp64\www\bibliodj');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach($files as $file) {
    if (strpos($file[0], 'update_index_design.php') !== false) continue;
    if (strpos($file[0], 'replace_name.php') !== false) continue;

    $content = file_get_contents($file[0]);
    
    // Remplacements
    $new_content = str_replace('BiblioNational Djibouti', 'Bibliothèque Nationale de Djibouti', $content);
    $new_content = str_replace('BiblioNational', 'Bibliothèque Nationale de Djibouti', $new_content);

    if ($new_content !== $content) {
        file_put_contents($file[0], $new_content);
        echo "Updated: " . $file[0] . "\n";
    }
}
echo "Done.";
?>
