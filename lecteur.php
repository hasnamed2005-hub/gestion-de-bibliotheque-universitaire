<?php // lecteur.php
require_once 'config.php';
requireLogin('etudiant','enseignant','admin','bibliothecaire','superadmin');

$idL = (int)($_GET['id']??0);
if(!$idL) die("ID livre manquant.");

$pdo = getDB();
$st = $pdo->prepare("SELECT * FROM livre WHERE id_livre = ?");
$st->execute([$idL]);
$l = $st->fetch();

if(!$l || !$l['url_numerique']) die("Ce livre n'a pas de version numérique.");

// Access Check
$hasAccess = false;
$role = getRole();
if(in_array($role, ['admin','bibliothecaire','superadmin'])) {
    $hasAccess = true;
} else {
    $idM = getMembreId();
    $chk = $pdo->prepare("SELECT 1 FROM achat WHERE id_membre=? AND id_livre=? UNION SELECT 1 FROM emprunt WHERE id_membre=? AND id_livre=? AND statut IN ('actif','retard') LIMIT 1");
    $chk->execute([$idM, $idL, $idM, $idL]);
    $hasAccess = (bool)$chk->fetch();
}

if(!$hasAccess) die("Accès refusé. Vous devez emprunter ou acheter ce livre pour le lire.");

$title = $l['titre'];
$url = $l['url_numerique'];
?>
<!DOCTYPE html><html lang="fr"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Lecture : <?=h($title)?> — Bibliodj</title>
<link rel="stylesheet" href="assets/css/app.css?v=2">
<style>
body, html { margin:0; padding:0; height:100%; overflow:hidden; background:#1a1a1a; }
.reader-container { display:flex; flex-direction:column; height:100vh; }
.reader-header { background:var(--bg2); color:var(--ink); padding:12px 20px; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid var(--glass-border); z-index:10; }
.reader-body { flex:1; position:relative; }
iframe { width:100%; height:100%; border:none; background:#fff; }
.loading-msg { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); color:#fff; text-align:center; z-index:1; }
</style>
</head><body>
<div class="reader-container">
    <header class="reader-header">
        <div style="display:flex; align-items:center; gap:12px">
            <button onclick="window.close(); if(!window.opener) window.history.back();" class="btn btn-outline btn-sm">← Retour</button>
            <div style="font-weight:700"><?=h($title)?></div>
        </div>
        <div class="badge b-blue"><?=h($l['auteur'])?></div>
    </header>
    <div class="reader-body">
        <div class="loading-msg">Chargement du livre...</div>
        <iframe src="<?=h($url)?>" onload="this.previousElementSibling.style.display='none'"></iframe>
    </div>
</div>
</body></html>
