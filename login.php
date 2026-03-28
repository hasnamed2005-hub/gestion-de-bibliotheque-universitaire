<?php
require_once 'config.php';
if(isLogged()){
  $r=['superadmin'=>'admin/','admin'=>'admin/','bibliothecaire'=>'bibliothecaire/','etudiant'=>'etudiant/','enseignant'=>'etudiant/'];
  $role = getRole();
  if(isset($r[$role])){
    header('Location: '.BASE_URL.$r[$role]);
    exit;
  } else {
    // Session existante mais rôle invalide (bug), on nettoie.
    session_destroy();
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion — Bibliothèque Nationale de Djibouti</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,700&family=DM+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
<script>
(function() {
    const theme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', theme);
})();
</script>
<style>
:root{
  --blue: #0A84FF;
  --blue-dark: #0040DD;
  --green: #30D158;
  --gold: #FFD60A;
  --bg: #F2F2F7;
  --ink: #1C1C1E;
  --ink2: rgba(28, 28, 30, 0.6);
  --glass-bg: rgba(255, 255, 255, 0.6);
  --glass-border: rgba(0, 0, 0, 0.1);
  --rtab-bg: rgba(0, 0, 0, 0.03);
}
[data-theme="dark"] {
  --bg: #050b14;
  --ink: #ffffff;
  --ink2: rgba(255, 255, 255, 0.6);
  --glass-bg: rgba(10, 22, 40, 0.45);
  --glass-border: rgba(255, 255, 255, 0.15);
  --rtab-bg: rgba(255, 255, 255, 0.03);
}
*{margin:0;padding:0;box-sizing:border-box;}
body{
  font-family:'DM Sans',sans-serif;
  min-height:100vh;
  display:flex;
  background-color: var(--bg);
  color: var(--ink);
  overflow-y: auto;
  overflow-x: hidden;
}

/* PANNEAU GAUCHE (Image IA) */
.left{
  flex: 1.2;
  position: relative;
  background: url('assets/img/modern_library_bg.png') center/cover no-repeat;
  display:flex;flex-direction:column;justify-content:center;align-items:center;
  padding:52px 44px;
}
.left::before{
  content:'';
  position:absolute;inset:0;
  background: linear-gradient(135deg, rgba(5,11,20,0.85) 0%, rgba(5,11,20,0.4) 50%, rgba(10,132,255,0.2) 100%);
}
.left::after{
  content:'';position:absolute;inset:0;
  backdrop-filter: blur(4px);
  -webkit-backdrop-filter: blur(4px);
}
.left-inner{
  position:relative;z-index:2;
  text-align:center;max-width:480px;
  animation: fadeUp 1s cubic-bezier(0.2, 0.8, 0.2, 1);
}
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}

.left-logo img {
  width: 140px;
  height: auto;
  filter: drop-shadow(0 0 30px rgba(10,132,255,0.6));
  margin-bottom: 24px;
  animation: float 6s ease-in-out infinite;
}
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-12px); }
}

.left-title{
  font-family:'Playfair Display',serif;
  font-size:clamp(32px, 3.5vw, 48px);
  font-weight:900;color:#fff;
  line-height:1.15;margin-bottom:16px;
  text-shadow: 0 4px 20px rgba(0,0,0,0.5);
}
.left-title span{
  background: linear-gradient(90deg, #FFD60A, #FF9F0A);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.left-sub{
  font-size:15px;color:rgba(255,255,255,.8);
  line-height:1.7;margin-bottom:36px;
  text-shadow: 0 2px 10px rgba(0,0,0,0.5);
}

.univ-chips{display:flex;gap:10px;flex-wrap:wrap;justify-content:center;margin-top:28px;}
.chip{
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(10px);
  border:1px solid rgba(255,255,255,0.2);
  border-radius:99px;padding:8px 18px;
  font-size:12px;font-weight: 600;
  color: #fff;
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}
.chip:hover {
  background: rgba(255,255,255,0.2);
  transform: translateY(-2px);
  border-color: rgba(255,255,255,0.4);
}

/* PANNEAU DROIT (Glassmorphism) */
.right{
  flex: 1;
  display:flex;align-items:center;justify-content:center;
  padding:40px;
  background: var(--bg);
  position: relative;
  z-index: 10;
  box-shadow: -20px 0 50px rgba(0,0,0,0.2);
}
[data-theme="dark"] .right { box-shadow: -20px 0 50px rgba(0,0,0,0.5); }
.right::before {
  content:''; position:absolute; inset:0;
  background: radial-gradient(circle at top right, rgba(10,132,255,0.15), transparent 60%);
  pointer-events: none;
}

.login-box{
  width:100%;max-width:420px;
  background: var(--glass-bg);
  backdrop-filter: blur(30px);
  -webkit-backdrop-filter: blur(30px);
  border: 1px solid var(--glass-border);
  border-radius: 24px;
  padding: 40px;
  box-shadow: 0 20px 60px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.1);
  animation: slideIn 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
  opacity: 0;
  transform: translateX(30px);
}
@keyframes slideIn {
  to { opacity: 1; transform: translateX(0); }
}

.lb-logo img { width: 48px; border-radius:12px; transition: 0.3s; }
[data-theme="dark"] .lb-logo img { filter: invert(1); }
.lb-logo-name{font-family:'Playfair Display',serif;font-size:24px;font-weight:700;color:var(--ink);}
.left-logo { display: none; }
}

.lb-title{
  font-family:'Playfair Display',serif;
  font-size:32px;font-weight:700;color:var(--ink);
  margin-bottom:8px;
}
.lb-sub{font-size:14px;color:var(--ink2);margin-bottom:32px;}

/* Rôle tabs */
.role-tabs{
  display:grid;grid-template-columns:repeat(5,1fr);gap:8px;
  margin-bottom:28px;
}
.rtab{
  padding:12px 4px; border-radius:12px;
  background: var(--rtab-bg);
  border: 1px solid var(--glass-border);
  cursor:pointer;text-align:center;
  font-size:11px;font-weight:600;color:var(--ink2);
  transition:all .3s cubic-bezier(0.2,0.8,0.2,1);
}
.rtab .ri{font-size:22px;display:block;margin-bottom:6px;}
.rtab:hover{
  background: var(--glass-border);
  color:var(--ink);
  transform: translateY(-2px);
}
.rtab.active{
  background: var(--blue);
  border-color: var(--blue);
  color:#fff;
  box-shadow: 0 8px 20px rgba(10,132,255,0.4);
}

/* Demo comptes */
.demo-box{
  background:rgba(10,132,255,0.08);
  border: 1px solid rgba(10,132,255,0.2);
  border-radius:12px;padding:16px;
  margin-bottom:24px;font-size:12px;
}
.demo-title{font-weight:700;color:var(--blue);margin-bottom:10px;font-size:13px;}
.demo-row{display:flex;justify-content:space-between;padding:4px 0;color:var(--ink2);}
.demo-pwd{font-family:monospace;color:var(--ink);font-weight:700;font-size:13px; background: var(--rtab-bg); padding: 2px 6px; border-radius: 4px; border: 1px solid var(--glass-border);}

/* Form */
.fg{margin-bottom:18px;}
.fg label{
  display:block;font-size:12px;font-weight:600;
  color:var(--ink2);margin-bottom:8px;
  letter-spacing:0.5px;
}
.iw{position:relative;}
.iw .ii{position:absolute;left:16px;top:50%;transform:translateY(-50%);font-size:16px;color:var(--ink2); opacity: 0.5;}
.iw input, .univ-select{
  width:100%;
  padding:14px 16px 14px 44px;
  border: 1px solid var(--glass-border);
  border-radius:12px;
  font-family:'DM Sans',sans-serif;
  font-size:15px;color:var(--ink);
  background: var(--rtab-bg);
  outline:none;
  transition:all .3s;
}
.univ-select { padding-left: 16px; cursor:pointer;}
.univ-select option { background: var(--bg); color: var(--ink); }
.iw input:focus, .univ-select:focus{
  border-color:var(--blue);
  background: var(--glass-bg);
  box-shadow: 0 0 0 4px rgba(10,132,255,0.15);
}
.iw input::placeholder { color: var(--ink2); opacity: 0.4; }

.btn-login{
  width:100%;padding:15px;border-radius:12px;
  background: linear-gradient(135deg, var(--blue), var(--blue-dark));
  color:#fff;font-size:16px;font-weight:700;
  border:none;cursor:pointer;
  font-family:'DM Sans',sans-serif;
  transition:all .3s cubic-bezier(0.2,0.8,0.2,1);
  display:flex;align-items:center;justify-content:center;gap:10px;
  box-shadow: 0 8px 24px rgba(10,132,255,0.4);
  margin-top: 24px;
}
.btn-login:hover{
  transform:translateY(-2px);
  box-shadow: 0 12px 32px rgba(10,132,255,0.5);
  filter: brightness(1.1);
}

.divider{text-align:center;font-size:13px;color:rgba(255,255,255,0.3);margin:24px 0;position:relative;}
.divider::before,.divider::after{content:'';position:absolute;top:50%;width:40%;height:1px;background:rgba(255,255,255,0.1);}
.divider::before{left:0;} .divider::after{right:0;}

.btn-register{
  width:100%;padding:14px;border-radius:12px;
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.1);
  color: #fff;font-size:15px;
  font-weight:600;cursor:pointer;
  font-family:'DM Sans',sans-serif;
  transition:all .3s;
}
.btn-register:hover{
  background: rgba(255,255,255,0.1);
  border-color: rgba(255,255,255,0.2);
}
.theme-switch-login {
    position: absolute; top: 20px; right: 20px;
    background: var(--glass-bg); border: 1px solid var(--glass-border);
    padding: 8px; border-radius: 10px; cursor: pointer; color: var(--ink);
    transition: 0.3s; z-index: 100;
}
.theme-switch-login:hover { transform: scale(1.1); background: var(--blue); color: #fff; }

.back{text-align:center;margin-top:24px;font-size:14px;color:rgba(255,255,255,0.5);}
.back a{color:var(--blue);font-weight:600;text-decoration: none; transition: 0.2s;}
.back a:hover { color: #fff; }

.err-box{
  background:rgba(255,59,48,0.15);
  border:1px solid rgba(255,59,48,0.3);
  border-radius:12px;padding:14px 18px;
  font-size:14px;color:#FF453A;
  margin-bottom:20px;display:none;
  backdrop-filter: blur(10px);
}

.spin{display:inline-block;width:18px;height:18px;border:2px solid rgba(255,255,255,.3);border-top-color:#fff;border-radius:50%;animation:spn .6s linear infinite;}
@keyframes spn{to{transform:rotate(360deg)}}

@media(max-width:960px){
  body{flex-direction: column; overflow: auto;}
  .left{flex: none; min-height: 40vh; padding: 40px 20px;}
  .right{flex: none; padding: 30px 20px; box-shadow: none;}
  .login-box { box-shadow: none; border: none; background: transparent; padding: 0; }
  .lb-logo{display:flex;align-items:center;gap:12px;margin-bottom:32px;justify-content:center;}
  .lb-logo img { width: 48px; border-radius:12px;}
  .lb-logo-name{font-family:'Playfair Display',serif;font-size:24px;font-weight:700;color:#fff;}
  .left-logo { display: none; }
}
</style>
</head>
<body>

<!-- PANNEAU GAUCHE -->
<div class="left">
  <div class="left-inner">
    <div class="left-logo">
      <img src="assets/img/premium_logo.png" alt="Bibliothèque Nationale de Djibouti Logo" style="mix-blend-mode: screen;">
    </div>
    <div class="left-title">Bibliothèques<br><span>Nationales</span></div>
    <div class="left-sub">L'excellence académique connectée. Plateforme unifiée de gestion documentaire pour toutes les universités de la République de Djibouti.</div>
    <div class="univ-chips">
      <span class="chip">🎓 Univ. de Djibouti</span>
      <span class="chip">🏫 Univ. du Golfe</span>
      <span class="chip">📊 ISG</span>
      <span class="chip">⚙️ IUT</span>
    </div>
  </div>
</div>

<!-- PANNEAU DROIT -->
<div class="right">
  <button class="theme-switch-login" onclick="toggleTheme()" id="btn-theme-login">🌙</button>
  <div class="login-box">
    <div class="lb-logo">
      <img src="assets/img/premium_logo.png" alt="Logo" style="mix-blend-mode: screen; filter: invert(1);">
      <div class="lb-logo-name">Bibliothèque Nationale de Djibouti</div>
    </div>
    <div class="lb-title">Bienvenue</div>
    <div class="lb-sub">Sélectionnez votre rôle et connectez-vous au portail.</div>

    <!-- Rôles -->
    <div class="role-tabs">
      <div class="rtab active" onclick="setRole('superadmin',this)" title="Super Admin">
        <span class="ri">👑</span>Super
      </div>
      <div class="rtab" onclick="setRole('admin',this)">
        <span class="ri">🛡️</span>Admin
      </div>
      <div class="rtab" onclick="setRole('bibliothecaire',this)">
        <span class="ri">📚</span>Biblio.
      </div>
      <div class="rtab" onclick="setRole('enseignant',this)">
        <span class="ri">🧑‍🏫</span>Ens.
      </div>
      <div class="rtab" onclick="setRole('etudiant',this)">
        <span class="ri">🎓</span>Étu.
      </div>
    </div>

    <!-- Démo -->
    <div class="demo-box">
      <div class="demo-title">✨ Comptes de démonstration</div>
      <div class="demo-row"><span>Super Admin</span><span class="demo-pwd">superadmin / hasna</span></div>
      <div class="demo-row"><span>Administrateur UD</span><span class="demo-pwd">admin.ud / password</span></div>
      <div class="demo-row"><span>Bibliothécaire UD</span><span class="demo-pwd">biblio.ud / password</span></div>
      <div class="demo-row"><span>Enseignant</span><span class="demo-pwd">prof.ud / password</span></div>
      <div class="demo-row"><span>Étudiant</span><span class="demo-pwd">f.abdillahi / password</span></div>
    </div>

    <div class="err-box" id="err-box"></div>

    <div class="fg">
      <label>Université</label>
      <select class="univ-select" id="sel-univ">
        <option value="">— Veuillez sélectionner —</option>
      </select>
    </div>
    <div class="fg">
      <label>Identifiant</label>
      <div class="iw"><span class="ii">👤</span>
        <input type="text" id="inp-user" placeholder="Saisissez votre identifiant" autocomplete="username">
      </div>
    </div>
    <div class="fg">
      <label>Mot de passe</label>
      <div class="iw"><span class="ii">🔒</span>
        <input type="password" id="inp-pwd" placeholder="Saisissez votre mot de passe" autocomplete="current-password">
      </div>
    </div>

    <button class="btn-login" id="btn-login" onclick="doLogin()">
      <span id="btn-txt">Accéder au portail ➔</span>
    </button>

    <div class="divider">Nouveau sur la plateforme ?</div>
    <button class="btn-register" onclick="window.location='index.php#inscription'">Créer un compte lecteur</button>
    <div class="back"><a href="index.php">← Retour au site public</a></div>
  </div>
</div>

<script>
let selRole='superadmin';
const demos={
  superadmin:['superadmin','hasna',''],
  admin:['admin.ud','password','1'],
  bibliothecaire:['biblio.ud','password','1'],
  enseignant:['prof.ud','password','1'],
  etudiant:['f.abdillahi','password','1'],
};

function setRole(r,el){
  selRole=r;
  document.querySelectorAll('.rtab').forEach(t=>t.classList.remove('active'));
  el.classList.add('active');
  const d=demos[r]||['','',''];
  document.getElementById('inp-user').value=d[0];
  document.getElementById('inp-pwd').value=d[1];
  if(d[2]) {
    document.getElementById('sel-univ').value=d[2];
  } else {
    document.getElementById('sel-univ').value='';
  }
}

// Charger universités
async function loadUnivs(){
  try{
    const r=await fetch('api/public.php?action=univs');
    const d=await r.json();
    const sel=document.getElementById('sel-univ');
    (d.data||[]).forEach(u=>{
      const o=document.createElement('option');
      o.value=u.id_univ;o.textContent=u.logo_emoji+' '+u.nom;
      sel.appendChild(o);
    });
    // On ne force plus la valeur à '1' par défaut pour éviter un blocage.
    if(selRole!=='superadmin') sel.value='1';
  }catch(e){}
}
loadUnivs();

document.getElementById('inp-pwd').addEventListener('keydown',e=>{if(e.key==='Enter')doLogin();});

async function doLogin(){
  const username=document.getElementById('inp-user').value.trim();
  const password=document.getElementById('inp-pwd').value;
  const id_univ=document.getElementById('sel-univ').value||null;
  const errEl=document.getElementById('err-box');
  errEl.style.display='none';
  if(!username||!password){errEl.textContent='⚠️ Saisissez votre identifiant et mot de passe';errEl.style.display='block';return;}

  const btn=document.getElementById('btn-login');
  btn.disabled=true;
  document.getElementById('btn-txt').innerHTML='<span class="spin"></span> Authentification...';

  const r=await fetch('api/auth.php',{
    method:'POST',headers:{'Content-Type':'application/json'},
    body:JSON.stringify({username,password,id_univ})
  });
  const data=await r.json();
  btn.disabled=false;
  document.getElementById('btn-txt').textContent='Accéder au portail ➔';

  if(data.success){
    const redir={superadmin:'admin/',admin:'admin/',bibliothecaire:'bibliothecaire/',etudiant:'etudiant/',enseignant:'etudiant/'};
    window.location=redir[data.data.role]||'index.php';
  }else{
    errEl.innerHTML='<strong>Accès refusé</strong><br>'+(data.message||'Identifiants incorrects');
    errEl.style.display='block';
    
    // Animation d'erreur
    errEl.animate([
      { transform: 'translateX(0)' },
      { transform: 'translateX(-10px)' },
      { transform: 'translateX(10px)' },
      { transform: 'translateX(-10px)' },
      { transform: 'translateX(10px)' },
      { transform: 'translateX(0)' }
    ], { duration: 400, easing: 'ease-in-out' });
  }
}
function updateLoginThemeUI(theme) {
    const btn = document.getElementById('btn-theme-login');
    if(btn) btn.textContent = theme === 'dark' ? '🌙' : '☀️';
}
function toggleTheme() {
    const html = document.documentElement;
    const current = html.getAttribute('data-theme');
    const target = current === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-theme', target);
    localStorage.setItem('theme', target);
    updateLoginThemeUI(target);
}
document.addEventListener('DOMContentLoaded', () => {
    updateLoginThemeUI(localStorage.getItem('theme') || 'dark');
});
</script>
</body>
</html>
