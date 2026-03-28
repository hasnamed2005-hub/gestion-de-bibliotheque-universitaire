<?php
require_once 'config.php';
$pdo = getDB();
try {
    // 1. Clear fines for the student demo account (f.abdillahi is usually id_membre 1)
    $stmt = $pdo->prepare("SELECT id_membre FROM membre WHERE numero_carte = 'UD-ETU-001' OR prenom = 'Fadumo'");
    $stmt->execute();
    $idM = $stmt->fetchColumn();
    
    if($idM){
        $pdo->prepare("DELETE FROM amende WHERE id_membre = ?")->execute([$idM]);
        echo "Success: Cleared fines for student ID $idM.\n";
    } else {
        echo "Warning: Could not find student f.abdillahi.\n";
    }

    // 2. Check librarian credentials
    $stmt = $pdo->query("SELECT username, password, role FROM utilisateur WHERE role IN ('bibliothecaire', 'admin', 'superadmin')");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "Librarian/Admin Accounts:\n";
    foreach($users as $user){
        $match = password_verify('password', $user['password']);
        echo "- {$user['username']} ({$user['role']}): " . ($match ? "Password 'password' matches" : "Password 'password' DOES NOT MATCH") . " / Raw: {$user['password']}\n";
    }

} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
