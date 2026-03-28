<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// ============================================================
//  Bibliothèque Nationale de Djibouti — Configuration principale
// ============================================================

// ── Base de données ──────────────────────────────────────────
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bibliodj');

// ── Application ──────────────────────────────────────────────
define('APP_NAME',    'Bibliothèque Nationale de Djibouti');
define('APP_VERSION', '1.0.0');
define('TARIF_JOUR',  200);  // Francs Djibouti / jour de retard
define('DUREE_STD',   14);   // Jours d'emprunt standard
define('MAX_EMPRUNTS', 3);   // Maximum de livres simultanés

// ── URL de base (modifier selon votre hébergeur) ─────────────
// Localhost :
define('BASE_URL', 'http://localhost/bibliodj/');
// InfinityFree (exemple) :
// define('BASE_URL', 'https://bibliodj.infinityfreeapp.com/');
// VPS avec domaine :
// define('BASE_URL', 'https://biblio.dj/');

// ── Session ──────────────────────────────────────────────────


// ── Connexion PDO ─────────────────────────────────────────────
function getDB(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4';
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            http_response_code(500);
            // En production, ne pas afficher l'erreur
            die(json_encode(['success'=>false,'error'=>'Connexion impossible. Vérifiez config.php']));
        }
    }
    return $pdo;
}

// ── Réponse JSON ─────────────────────────────────────────────
function jsonResp(bool $ok, $data = [], string $msg = ''): void {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success'=>$ok,'message'=>$msg,'data'=>$data], JSON_UNESCAPED_UNICODE);
    exit;
}

// ── Session helpers ──────────────────────────────────────────
function isLogged(): bool      { return isset($_SESSION['user_id']); }
function getRole(): string     { return $_SESSION['role'] ?? ''; }
function getUserId(): int      { return (int)($_SESSION['user_id'] ?? 0); }
function getUnivId(): ?int     { return $_SESSION['id_univ'] ?? null; }
function getMembreId(): ?int   { return $_SESSION['id_membre'] ?? null; }
function getNom(): string      { return $_SESSION['nom_complet'] ?? 'Utilisateur'; }
function isSuperAdmin(): bool  { return getRole() === 'superadmin'; }
function getPhoto(): ?string   { return $_SESSION['photo'] ?? null; }

function requireLogin(string ...$roles): void {
    $isApi = strpos($_SERVER['REQUEST_URI'], '/api/') !== false;
    if (!isLogged()) {
        if ($isApi) jsonResp(false, [], 'Session expirée. Veuillez vous reconnecter.');
        header('Location: '.BASE_URL.'login.php');
        exit;
    }
    if (!empty($roles) && !in_array(getRole(), $roles)) {
        if ($isApi) jsonResp(false, [], 'Accès refusé (droits insuffisants).');
        header('Location: '.BASE_URL.'login.php?err=acces');
        exit;
    }
}

// ── Mise à jour automatique des retards ──────────────────────
function updateRetards(?int $idUniv = null): void {
    $pdo = getDB();
    $sql = "UPDATE emprunt SET statut='retard'
            WHERE statut='actif' AND date_retour_prevue < CURRENT_DATE";
    if ($idUniv) {
        $pdo->prepare($sql.' AND id_univ=?')->execute([$idUniv]);
    } else {
        $pdo->exec($sql);
    }
}

// ── Obtenir infos université courante ─────────────────────────
function getUniv(?int $id = null): ?array {
    $id = $id ?? getUnivId();
    if (!$id) return null;
    $stmt = getDB()->prepare("SELECT * FROM universite WHERE id_univ=?");
    $stmt->execute([$id]);
    return $stmt->fetch() ?: null;
}

// ── XSS Protection ───────────────────────────────────────────
function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// ── Générer numéro de carte unique ───────────────────────────
function genCarte(int $idUniv, string $type): string {
    $pdo = getDB();
    $univ = getUniv($idUniv);
    $code = $univ['code'] ?? 'UNI';
    $prefix = strtoupper($type === 'enseignant' ? 'ENS' : ($type === 'personnel' ? 'PER' : 'ETU'));
    $cnt = $pdo->prepare("SELECT COUNT(*)+1 FROM membre WHERE id_univ=?");
    $cnt->execute([$idUniv]);
    return $code.'-'.$prefix.'-'.str_pad($cnt->fetchColumn(), 3, '0', STR_PAD_LEFT);
}
