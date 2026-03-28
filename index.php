<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Bibliothèque Nationale de Djibouti — Plateforme nationale de gestion des bibliothèques universitaires de la République de Djibouti">
<title>Bibliothèque Nationale de Djibouti — Bibliothèques Universitaires de Djibouti</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=DM+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,700&family=Outfit:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap');
:root{
  --blue: #0A84FF; --blue2: #0040DD; 
  --green: #30D158; --green2: #24A143;
  --red: #FF453A; --gold: #FFD60A; 
  --dark: #050b14; --dark-surface: #0f172a;
  --text-main: #f8fafc; --text-muted: #94a3b8;
  --glass: rgba(15, 23, 42, 0.65);
  --glass-border: rgba(255, 255, 255, 0.08);
  --font-d: 'Playfair Display', Georgia, serif;
  --font-b: 'Outfit', sans-serif;
  --font-mono: 'JetBrains Mono', monospace;
}
*{margin:0;padding:0;box-sizing:border-box;}
html{scroll-behavior:smooth;}
body{font-family:var(--font-b);color:var(--text-main);background:var(--dark);overflow-x:hidden;}
a{text-decoration:none;color:inherit;}

/* NAV */
nav{
  position:fixed;top:0;left:0;right:0;z-index:900;
  height:76px;display:flex;align-items:center;justify-content:space-between;
  padding:0 clamp(20px,5vw,64px);
  background:rgba(5, 11, 20, 0.7);backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);
  border-bottom:1px solid var(--glass-border);
  transition:all .3s;
}
.nav-brand{display:flex;align-items:center;gap:14px;}
.nav-logo{
  width:44px;height:44px;border-radius:12px;
  background:linear-gradient(135deg,var(--blue),var(--green));
  display:flex;align-items:center;justify-content:center;font-size:22px;
  box-shadow:0 4px 16px rgba(10,132,255,.4);
}
.nav-name strong{display:block;font-family:var(--font-d);font-size:19px;font-weight:700;color:#fff;}
.nav-name span{font-size:10px;color:var(--gold);text-transform:uppercase;letter-spacing:2px;font-weight:600;}
.nav-links{display:flex;gap:36px;}
.nav-links a{font-size:14px;font-weight:500;color:var(--text-muted);transition:color .2s;}
.nav-links a:hover{color:#fff;}
.nav-actions{display:flex;gap:12px;}
.btn-nav-o{padding:10px 22px;border-radius:12px;border:1px solid rgba(255,255,255,.15);color:#fff;font-size:14px;font-weight:600;transition:all .2s;}
.btn-nav-o:hover{background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.25);}
.btn-nav-f{padding:10px 24px;border-radius:12px;background:var(--blue);color:#fff;font-size:14px;font-weight:600;transition:all .2s;box-shadow:0 4px 14px rgba(10,132,255,.4);}
.btn-nav-f:hover{background:var(--blue2);transform:translateY(-1px);box-shadow:0 6px 20px rgba(10,132,255,.5);}

/* HERO */
.hero{
  min-height:100vh;padding-top:76px;
  background: url('assets/img/hero_university_outdoors.png') center/cover no-repeat;
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.hero-pattern{
  position:absolute;inset:0;
  background: linear-gradient(135deg, rgba(5,11,20,0.95) 0%, rgba(5,11,20,0.7) 40%, rgba(10,132,255,0.15) 100%);
  backdrop-filter: blur(8px);
}
.hero-inner{
  position:relative;z-index:2;
  width:100%;max-width:1280px;margin:0 auto;
  padding:80px clamp(20px,5vw,64px);
  display:grid;grid-template-columns:1.2fr 1fr;gap:60px;align-items:center;
}
.hero-badge{
  display:inline-flex;align-items:center;gap:10px;
  background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);
  padding:8px 20px;border-radius:99px;font-size:12px;font-weight:500;
  color:rgba(255,255,255,.9);margin-bottom:28px;
  backdrop-filter:blur(12px);
}
.hb-dot{width:8px;height:8px;border-radius:50%;background:var(--gold);box-shadow:0 0 10px var(--gold);}
.hero h1{
  font-family:var(--font-d);
  font-size:clamp(40px,5vw,72px);
  font-weight:900;color:#fff;line-height:1.1;
  margin-bottom:24px;letter-spacing:-1px;
  text-shadow: 0 4px 24px rgba(0,0,0,0.5);
}
.hero h1 em{
  font-style:italic;
  background: linear-gradient(90deg, #FFD60A, #FF9F0A);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.hero p{
  font-size:clamp(15px,1.5vw,18px);
  color:var(--text-muted);
  line-height:1.7;margin-bottom:40px;max-width:540px;
}
.hero-cta{display:flex;gap:16px;flex-wrap:wrap;}
.btn-h1{
  padding:16px 36px;border-radius:14px;background:#fff;
  color:var(--dark);font-size:15px;font-weight:700;
  transition:all .3s cubic-bezier(0.2,0.8,0.2,1);box-shadow:0 8px 30px rgba(0,0,0,.3);
  display:inline-flex;align-items:center;gap:10px;
}
.btn-h1:hover{transform:translateY(-3px);box-shadow:0 14px 40px rgba(255,255,255,.2);background:var(--gold);}
.btn-h2{
  padding:16px 36px;border-radius:14px;
  background:rgba(255,255,255,.05);backdrop-filter:blur(10px);
  border:1px solid rgba(255,255,255,.15);color:#fff;
  font-size:15px;font-weight:600;transition:all .3s;
  display:inline-flex;align-items:center;gap:10px;
}
.btn-h2:hover{background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.3);transform:translateY(-3px);}

/* Float cards */
.hero-right{display:flex;flex-direction:column;gap:16px; position:relative;}
.fcard{
  background:var(--glass);
  backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);
  border:1px solid var(--glass-border);
  border-radius:20px;padding:24px 28px;color:#fff;
  animation:flt 5s ease-in-out infinite;
  transition:all .4s;
  box-shadow:0 16px 40px rgba(0,0,0,0.4);
}
.fcard:hover{background:rgba(25, 35, 55, 0.8);transform:translateY(-6px)!important;border-color:rgba(255,255,255,0.2);}
.fcard:nth-child(2){animation-delay:1.5s;margin-left:32px;}
.fcard:nth-child(3){animation-delay:3s;margin-left:12px;}
@keyframes flt{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
.fc-icon{font-size:32px;margin-bottom:12px;filter:drop-shadow(0 4px 8px rgba(0,0,0,0.3));}
.fc-val{font-size:36px;font-weight:700;font-family:var(--font-mono);letter-spacing:-1.5px;}
.fc-lbl{font-size:12px;color:var(--text-muted);margin-top:4px;letter-spacing:1px;font-weight:500;text-transform:uppercase;}
.fc-chip{display:inline-block;background:rgba(10,132,255,.2);color:var(--blue);border-radius:8px;padding:4px 12px;font-size:11px;margin-top:10px;font-weight:600;}
.flag-stripe{height:5px;background:linear-gradient(to right,var(--blue) 33.33%,var(--green) 33.33% 66.66%,#fff 66.66%);}

/* SECTIONS */
.section{padding:clamp(60px,8vw,120px) clamp(20px,5vw,64px);max-width:1280px;margin:0 auto;}
.s-tag{font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--blue);font-weight:700;margin-bottom:12px;display:inline-block;padding:6px 14px;background:rgba(10,132,255,.1);border-radius:99px;}
.s-title{font-family:var(--font-d);font-size:clamp(32px,4vw,56px);font-weight:700;margin-bottom:16px;letter-spacing:-.5px;line-height:1.15;color:#fff;}
.s-sub{font-size:16px;color:var(--text-muted);margin-bottom:60px;max-width:600px;line-height:1.8;}

/* UNIVERSITÉS */
.univ-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;}
.ucard{
  background:var(--dark-surface);border-radius:24px;border:1px solid var(--glass-border);
  overflow:hidden;transition:all .35s cubic-bezier(0.2,0.8,0.2,1);cursor:default;
  position:relative;
}
.ucard:hover{box-shadow:0 24px 60px rgba(0,0,0,.5);transform:translateY(-8px);border-color:var(--blue);}
.uc-top{
  height:120px;display:flex;align-items:center;justify-content:center;
  font-size:56px;position:relative;background:rgba(255,255,255,0.02);
}
.uc-body{padding:24px;background:linear-gradient(180deg, transparent, rgba(0,0,0,0.3));}
.uc-name{font-family:var(--font-d);font-size:18px;font-weight:700;margin-bottom:6px;line-height:1.3;color:#fff;}
.uc-code{font-size:11px;color:var(--text-muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:16px;font-weight:500;}
.uc-stats{display:flex;gap:10px;flex-wrap:wrap;}
.uc-chip{background:rgba(255,255,255,.05);border-radius:8px;padding:6px 12px;font-size:12px;color:var(--text-muted);font-weight:500;}

/* STATS */
.stats-bg{background:rgba(10,15,30,0.5);border-top:1px solid var(--glass-border);border-bottom:1px solid var(--glass-border);position:relative;overflow:hidden;}
.stats-bg::before{content:'';position:absolute;inset:0;background:radial-gradient(circle at center, rgba(10,132,255,0.05), transparent 70%);}
.stats-inner{max-width:1280px;margin:0 auto;padding:clamp(60px,8vw,100px) clamp(20px,5vw,64px);position:relative;z-index:2;}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:32px;margin-top:60px;}
.sc{
  background:rgba(255,255,255,0.03);border-radius:24px;padding:40px 24px;
  text-align:center;border:1px solid var(--glass-border);transition:all .3s;
  backdrop-filter:blur(12px);
}
.sc:hover{background:rgba(255,255,255,0.06);transform:translateY(-6px);border-color:rgba(255,255,255,0.15);}
.sc-ico{font-size:48px;margin-bottom:20px;filter:drop-shadow(0 4px 12px rgba(0,0,0,0.4));}
.sc-num{font-family:var(--font-mono);font-size:56px;font-weight:700;color:#fff;letter-spacing:-2px;line-height:1;}
.sc-lbl{font-size:14px;color:var(--text-muted);margin-top:10px;font-weight:500;text-transform:uppercase;letter-spacing:1px;}

/* FEATURES */
.feat-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:28px;}
.feat{
  background:var(--dark-surface);border-radius:24px;padding:36px;
  border:1px solid var(--glass-border);transition:all .3s cubic-bezier(0.2,0.8,0.2,1);
}
.feat:hover{background:rgba(30,41,59,0.8);box-shadow:0 20px 50px rgba(0,0,0,.4);transform:translateY(-6px);border-color:rgba(255,255,255,0.15);}
.feat-ico{font-size:44px;margin-bottom:20px;filter:drop-shadow(0 4px 8px rgba(0,0,0,0.3));}
.feat-title{font-family:var(--font-d);font-size:22px;font-weight:700;margin-bottom:12px;color:#fff;}
.feat-txt{font-size:15px;color:var(--text-muted);line-height:1.8;}

/* COMMENT ÇA MARCHE */
.steps{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;position:relative;}
.steps::before{content:'';position:absolute;top:36px;left:10%;right:10%;height:2px;background:linear-gradient(90deg,var(--blue),var(--green));z-index:0;opacity:0.3;}
.step{text-align:center;position:relative;z-index:1;}
.step-num{
  width:72px;height:72px;border-radius:50%;
  background:var(--dark);border:2px solid var(--blue);
  display:flex;align-items:center;justify-content:center;
  font-family:var(--font-mono);font-size:24px;font-weight:700;color:#fff;margin:0 auto 20px;
  box-shadow:0 0 24px rgba(10,132,255,.3);
}
.step-title{font-weight:700;font-size:18px;margin-bottom:10px;color:#fff;font-family:var(--font-d);}
.step-txt{font-size:14px;color:var(--text-muted);line-height:1.7;}

/* TARIFS */
.pricing-bg{padding:clamp(60px,8vw,120px) 0;position:relative;}
.pricing-bg::before{content:'';position:absolute;inset:0;background:radial-gradient(circle at 100% 100%, rgba(48,209,88,0.05), transparent 60%);pointer-events:none;}
.pricing-inner{max-width:1280px;margin:0 auto;padding:0 clamp(20px,5vw,64px);position:relative;z-index:2;}
.pricing-inner .s-title{color:#fff;}
.pricing-inner .s-sub{color:var(--text-muted);margin-bottom:60px;}
.pricing-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:32px;}
.pcard{
  background:var(--dark-surface);
  border:1px solid var(--glass-border);
  border-radius:28px;padding:40px;
  transition:all .3s cubic-bezier(0.2,0.8,0.2,1);
}
.pcard.featured{
  background:linear-gradient(180deg, rgba(30,41,59,0.9), rgba(15,23,42,0.9));
  border-color:var(--gold);
  transform:scale(1.05);
  box-shadow:0 24px 64px rgba(0,0,0,.5);position:relative;
}
.pcard.featured::before{content:'';position:absolute;top:0;left:15%;right:15%;height:1px;background:linear-gradient(90deg,transparent,var(--gold),transparent);}
.pcard:hover{transform:translateY(-8px);border-color:rgba(255,255,255,0.2);}
.pcard.featured:hover{transform:scale(1.05) translateY(-8px);}
.pc-tag{font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:12px;display:inline-block;padding:4px 12px;background:rgba(255,214,10,0.1);border-radius:99px;}
.pc-title{font-family:var(--font-d);font-size:26px;font-weight:700;color:#fff;margin-bottom:10px;}
.pc-price{font-size:42px;font-weight:700;color:#fff;margin:16px 0 24px;font-family:var(--font-mono);letter-spacing:-1px;}
.pc-price span{font-size:16px;font-weight:400;color:var(--text-muted);font-family:var(--font-b);}
.pc-list{list-style:none;margin-bottom:32px;}
.pc-list li{font-size:15px;color:var(--text-muted);padding:10px 0;border-bottom:1px solid var(--glass-border);display:flex;gap:12px;align-items:flex-start;}
.pc-list li:last-child{border:none;}
.btn-pcard{display:flex;justify-content:center;align-items:center;padding:14px 24px;border-radius:14px;font-size:14px;font-weight:700;transition:all .2s;cursor:pointer;}
.btn-pcard-o{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.15);color:#fff;}
.btn-pcard-o:hover{background:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.3);transform:translateY(-2px);}
.btn-pcard-f{background:var(--gold);color:var(--dark);border:none;}
.btn-pcard-f:hover{background:#ffdf33;transform:translateY(-2px);box-shadow:0 8px 24px rgba(255,214,10,0.3);}

/* CTA INSCRIPTION */
.cta-section{
  padding:clamp(60px,8vw,120px) clamp(20px,5vw,64px);
  max-width:1280px;margin:0 auto;
}
.cta-box{
  background:linear-gradient(135deg, rgba(10,132,255,0.2) 0%, rgba(48,209,88,0.1) 100%);
  border-radius:32px;padding:clamp(50px,7vw,80px);
  position:relative;overflow:hidden;
  border:1px solid var(--glass-border);
  box-shadow:0 24px 64px rgba(0,0,0,.4);
  backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);
  text-align:center;
}
.cta-box::after{content:'📚';position:absolute;right:40px;top:50%;transform:translateY(-50%);font-size:240px;opacity:.04;filter:blur(4px);pointer-events:none;}
.cta-title{font-family:var(--font-d);font-size:clamp(32px,4vw,52px);font-weight:700;color:#fff;margin-bottom:16px;position:relative;z-index:2;}
.cta-sub{font-size:18px;color:var(--text-muted);margin-bottom:40px;line-height:1.7;position:relative;z-index:2;max-width:700px;margin-inline:auto;}
.cta-btns{display:flex;gap:16px;justify-content:center;flex-wrap:wrap;position:relative;z-index:2;}
.btn-cta{padding:16px 36px;border-radius:14px;font-size:15px;font-weight:700;transition:all .3s cubic-bezier(0.2,0.8,0.2,1);display:inline-flex;align-items:center;gap:12px;}
.btn-cta-w{background:#fff;color:var(--dark);box-shadow:0 8px 30px rgba(0,0,0,.3);}
.btn-cta-w:hover{transform:translateY(-3px);box-shadow:0 14px 40px rgba(255,255,255,.2);background:var(--gold);}
.btn-cta-o{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.15);color:#fff;backdrop-filter:blur(10px);}
.btn-cta-o:hover{background:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.3);transform:translateY(-3px);}

/* FOOTER */
footer{background:#020617;color:var(--text-muted);padding:clamp(60px,8vw,100px) clamp(20px,5vw,64px);border-top:1px solid var(--glass-border);}
.footer-inner{max-width:1280px;margin:0 auto;display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:48px;}
.f-brand-name{font-family:var(--font-d);font-size:24px;color:#fff;font-weight:700;margin-bottom:12px;}
.f-brand-sub{font-size:14px;line-height:1.8;max-width:320px;}
.f-col-title{font-size:12px;letter-spacing:2px;text-transform:uppercase;color:#fff;font-weight:600;margin-bottom:20px;}
.f-link{display:block;font-size:14px;padding:6px 0;transition:all .2s;color:var(--text-muted);}
.f-link:hover{color:#fff;transform:translateX(4px);}
.f-bottom{max-width:1280px;margin:40px auto 0;padding-top:24px;border-top:1px solid rgba(255,255,255,.05);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;font-size:13px;}
.f-flag{display:flex;border-radius:4px;overflow:hidden;height:16px;width:48px;opacity:0.8;}

/* MODAL INSCRIPTION */
.backdrop{display:none;position:fixed;inset:0;background:rgba(2, 6, 23, 0.85);z-index:1000;align-items:center;justify-content:center;backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);padding:20px;}
.backdrop.open{display:flex;animation:fadeIn 0.3s cubic-bezier(0.2,0.8,0.2,1);}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
.imodal{
  background:var(--dark-surface);border:1px solid var(--glass-border);
  border-radius:28px;padding:40px;width:600px;max-width:100%;max-height:90vh;overflow-y:auto;
  box-shadow:0 32px 80px rgba(0,0,0,.6);
  animation:mUp .4s cubic-bezier(0.2,0.8,0.2,1);
}
@keyframes mUp{from{opacity:0;transform:translateY(40px) scale(0.95)}to{opacity:1;transform:none}}
.im-close{float:right;cursor:pointer;font-size:28px;color:var(--text-muted);line-height:1;transition:all .2s;width:36px;height:36px;display:flex;align-items:center;justify-content:center;border-radius:10px;background:rgba(255,255,255,0.05);}
.im-close:hover{color:#fff;background:rgba(255,255,255,0.1);transform:rotate(90deg);}
.im-title{font-family:var(--font-d);font-size:32px;font-weight:700;margin-bottom:6px;color:#fff;}
.im-sub{font-size:15px;color:var(--text-muted);margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid var(--glass-border);line-height:1.6;}
.ifg{margin-bottom:16px;}
.ifg label{display:block;font-size:12px;font-weight:600;color:var(--text-muted);margin-bottom:8px;text-transform:uppercase;letter-spacing:1px;}
.ifg input,.ifg select,.ifg textarea{
  width:100%;padding:14px 16px;
  background:rgba(255,255,255,0.03);
  border:1.5px solid rgba(255,255,255,0.1);
  border-radius:12px;font-family:var(--font-b);font-size:15px;color:#fff;
  outline:none;transition:all .2s;
}
.ifg input:focus,.ifg select:focus,.ifg textarea:focus{
  border-color:var(--blue);
  background:rgba(10,132,255,0.05);
  box-shadow:0 0 0 4px rgba(10,132,255,.1);
}
.ifg select option{background:var(--dark-surface);color:#fff;}
.ir2{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
.im-foot{display:flex;gap:12px;justify-content:flex-end;margin-top:32px;padding-top:24px;border-top:1px solid var(--glass-border);}
.im-cancel{padding:14px 24px;border-radius:12px;border:1.5px solid rgba(255,255,255,0.15);background:transparent;cursor:pointer;color:#fff;font-family:var(--font-b);font-size:14px;font-weight:600;transition:all .2s;}
.im-cancel:hover{background:rgba(255,255,255,0.05);border-color:rgba(255,255,255,0.3);}
.im-submit{padding:14px 28px;border-radius:12px;background:linear-gradient(135deg,var(--blue),var(--blue2));color:#fff;border:none;cursor:pointer;font-family:var(--font-b);font-size:14px;font-weight:700;transition:all .3s cubic-bezier(0.2,0.8,0.2,1);box-shadow:0 8px 24px rgba(10,132,255,.3);}
.im-submit:hover{transform:translateY(-2px);filter:brightness(1.1);box-shadow:0 12px 32px rgba(10,132,255,.4);}
.success-view{text-align:center;padding:40px 20px;display:none;}
.sv-ico{font-size:72px;margin-bottom:24px;animation:zoomIn .5s cubic-bezier(0.2,0.8,0.2,1);}
@keyframes zoomIn{from{transform:scale(0.5);opacity:0}to{transform:scale(1);opacity:1}}
.sv-title{font-family:var(--font-d);font-size:36px;font-weight:700;color:#fff;margin-bottom:12px;}
.sv-sub{font-size:16px;color:var(--text-muted);line-height:1.8;}

/* RESPONSIVE */
@media(max-width:1000px){
  .hero-inner{grid-template-columns:1fr;gap:40px;padding-top:60px;}
  .hero-right{display:none;}
  .univ-grid,.stats-grid{grid-template-columns:1fr 1fr;}
  .feat-grid{grid-template-columns:1fr 1fr;}
  .pricing-grid{grid-template-columns:1fr;}
  .pcard.featured{transform:none;}
  .steps{grid-template-columns:1fr 1fr;gap:24px;}
  .steps::before{display:none;}
  .footer-inner{grid-template-columns:1fr 1fr;gap:32px;}
}
@media(max-width:640px){
  .nav-links,.nav-actions .btn-nav-o{display:none;}
  .univ-grid,.feat-grid{grid-template-columns:1fr;}
  .stats-grid{grid-template-columns:1fr;}
  .ir2{grid-template-columns:1fr;}
  .footer-inner{grid-template-columns:1fr;}
  .hero h1{font-size:36px;}
  .hero-inner{padding:40px 20px;}
  .section{padding:60px 20px;}
}
</style>
<script>
(function() {
    const theme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', theme);
})();
</script>
</head>
<body data-theme="dark">

<!-- NAV -->
<nav>
  <div class="nav-brand">
    <img src="assets/img/premium_logo.png" alt="Logo Bibliothèque" style="width: 44px; height: 44px; border-radius: 12px; object-fit: cover; box-shadow: 0 4px 16px rgba(10,132,255,.4); mix-blend-mode: screen;">
    <div class="nav-name">
      <strong>Bibliothèque Nationale de Djibouti</strong>
      <span>République de Djibouti</span>
    </div>
  </div>
  <div class="nav-links">
    <a href="#accueil">Accueil</a>
    <a href="#universites">Universités</a>
    <a href="#fonctionnalites">Fonctionnalités</a>
    <a href="#comment">Comment ça marche</a>
    <a href="#tarifs">Tarifs</a>
  </div>
  <div class="nav-actions">
    <button onclick="toggleTheme()" class="btn-nav-o" style="padding:10px;width:44px;display:flex;align-items:center;justify-content:center" title="Changer de mode">
        <span id="nav-theme-ico">🌙</span>
    </button>
    <a href="login.php" class="btn-nav-o">Se connecter</a>
    <a href="#" class="btn-nav-f" onclick="openInsc();return false">S'inscrire</a>
  </div>
</nav>

<!-- HERO -->
<section class="hero" id="accueil">
  <div class="hero-pattern"></div>
  <div class="hero-lines"></div>
  <div class="hero-inner">
    <div>
      <div class="hero-flag"><div class="hf-b"></div><div class="hf-g"></div><div class="hf-w"></div></div>
      <div class="hero-badge"><div class="hb-dot"></div>Plateforme officielle — République de Djibouti</div>
      <h1>La bibliothèque<br>universitaire<br><em>de demain</em>,<br>aujourd'hui.</h1>
      <p>Bibliothèque Nationale de Djibouti connecte toutes les universités de Djibouti sur une seule plateforme numérique. Gérez vos collections, vos membres et vos emprunts — depuis n'importe quel appareil, partout dans le monde.</p>
      <div class="hero-cta">
        <a href="#" class="btn-h1" onclick="openInsc();return false">🎓 Demander mon accès</a>
        <a href="login.php" class="btn-h2">🔐 Connexion</a>
      </div>
    </div>
    <div class="hero-right">
      <div class="fcard">
        <div class="fc-icon">📚</div>
        <div class="fc-val" id="h-livres">—</div>
        <div class="fc-lbl">LIVRES AU CATALOGUE</div>
        <div class="fc-chip">Toutes universités</div>
      </div>
      <div class="fcard">
        <div class="fc-icon">🎓</div>
        <div class="fc-val" id="h-membres">—</div>
        <div class="fc-lbl">MEMBRES INSCRITS</div>
        <div class="fc-chip">Étudiants & Enseignants</div>
      </div>
      <div class="fcard">
        <div class="fc-icon">🏛️</div>
        <div class="fc-val" id="h-univs">4</div>
        <div class="fc-lbl">UNIVERSITÉS CONNECTÉES</div>
        <div class="fc-chip">République de Djibouti</div>
      </div>
    </div>
  </div>
</section>

<div class="flag-stripe"></div>

<!-- UNIVERSITÉS -->
<div style="padding-block:clamp(60px,8vw,120px); position:relative; overflow:hidden;" id="universites">
  <div class="section" style="padding-block:0">
    <div class="s-tag">Nos partenaires</div>
    <div class="s-title">Universités de Djibouti</div>
    <div class="s-sub">Chaque université dispose de son propre espace bibliothèque dédié, géré de façon indépendante mais centralisé sur une seule plateforme.</div>
    <div class="univ-grid" id="univ-grid">
      <!-- Chargé dynamiquement -->
      <div class="ucard" style="animation:pulse .8s ease infinite alternate;opacity:.5"><div class="uc-top">⏳</div><div class="uc-body"><div class="uc-name" style="background:rgba(255,255,255,0.05);height:16px;border-radius:6px;margin-bottom:8px"></div></div></div>
      <div class="ucard" style="animation:pulse .8s .2s ease infinite alternate;opacity:.5"><div class="uc-top">⏳</div><div class="uc-body"><div class="uc-name" style="background:rgba(255,255,255,0.05);height:16px;border-radius:6px;margin-bottom:8px"></div></div></div>
      <div class="ucard" style="animation:pulse .8s .4s ease infinite alternate;opacity:.5"><div class="uc-top">⏳</div><div class="uc-body"><div class="uc-name" style="background:rgba(255,255,255,0.05);height:16px;border-radius:6px;margin-bottom:8px"></div></div></div>
      <div class="ucard" style="animation:pulse .8s .6s ease infinite alternate;opacity:.5"><div class="uc-top">⏳</div><div class="uc-body"><div class="uc-name" style="background:rgba(255,255,255,0.05);height:16px;border-radius:6px;margin-bottom:8px"></div></div></div>
    </div>
  </div>
</div>

<div class="flag-stripe"></div>

<!-- STATS -->
<div class="stats-bg">
  <div class="stats-inner">
    <div class="s-tag">En chiffres</div>
    <div class="s-title">Une plateforme, des milliers d'ouvrages</div>
    <div class="stats-grid">
      <div class="sc"><div class="sc-ico">📖</div><div class="sc-num" id="st-livres">—</div><div class="sc-lbl">Titres au catalogue</div></div>
      <div class="sc"><div class="sc-ico">🎓</div><div class="sc-num" id="st-membres">—</div><div class="sc-lbl">Membres inscrits</div></div>
      <div class="sc"><div class="sc-ico">🔄</div><div class="sc-num" id="st-emprunts">—</div><div class="sc-lbl">Emprunts actifs</div></div>
      <div class="sc"><div class="sc-ico">🏛️</div><div class="sc-num">4</div><div class="sc-lbl">Universités connectées</div></div>
    </div>
  </div>
</div>

<div class="flag-stripe"></div>

<!-- FONCTIONNALITÉS -->
<div style="position:relative; overflow:hidden;" id="fonctionnalites">
  <div class="section">
    <div class="s-tag">Fonctionnalités</div>
    <div class="s-title">Tout ce dont vous avez besoin</div>
    <div class="s-sub">Une solution professionnelle complète pour la gestion moderne des bibliothèques universitaires djiboutiennes.</div>
    <div class="feat-grid">
      <div class="feat"><div class="feat-ico">🔍</div><div class="feat-title">Recherche avancée & ISBN</div><div class="feat-txt">Trouvez n'importe quel livre par ISBN, titre, auteur ou catégorie. Scannez un ISBN pour vérifier la disponibilité instantanément.</div></div>
      <div class="feat"><div class="feat-ico">🔄</div><div class="feat-title">Emprunts & Retours digitaux</div><div class="feat-txt">Les bibliothécaires enregistrent les emprunts numériquement. Les étudiants consultent leurs livres en cours depuis leur espace personnel.</div></div>
      <div class="feat"><div class="feat-ico">💰</div><div class="feat-title">Amendes automatiques</div><div class="feat-txt">Les amendes de retard (200 FDJ/jour) sont calculées automatiquement. Les emprunts sont bloqués si une amende est impayée.</div></div>
      <div class="feat"><div class="feat-ico">📝</div><div class="feat-title">Inscription en ligne</div><div class="feat-txt">Les étudiants s'inscrivent en ligne en quelques minutes. L'administrateur approuve et le compte est créé automatiquement.</div></div>
      <div class="feat"><div class="feat-ico">📊</div><div class="feat-title">Rapports & Graphiques</div><div class="feat-txt">Tableaux de bord avec graphiques interactifs : livres les plus empruntés, statistiques par catégorie, suivi financier.</div></div>
      <div class="feat"><div class="feat-ico">🖨️</div><div class="feat-title">Carte membre imprimable</div><div class="feat-txt">Générez et imprimez des cartes membres professionnelles pour chaque étudiant, avec code d'identification unique.</div></div>
      <div class="feat"><div class="feat-ico">🔔</div><div class="feat-title">Notifications en temps réel</div><div class="feat-txt">Alertes automatiques pour les retards, les demandes en attente et les amendes impayées. Restez informé en permanence.</div></div>
      <div class="feat"><div class="feat-ico">🌐</div><div class="feat-title">Accessible partout</div><div class="feat-txt">Accédez à la plateforme depuis n'importe quel appareil connecté : PC, tablette, smartphone. Disponible 24h/24.</div></div>
      <div class="feat"><div class="feat-ico">🏛️</div><div class="feat-title">Multi-universités</div><div class="feat-txt">Une seule plateforme pour toutes les universités. Chaque institution gère ses données de façon indépendante et sécurisée.</div></div>
    </div>
  </div>
</div>

<div class="flag-stripe"></div>

<!-- COMMENT ÇA MARCHE -->
<div style="background:rgba(10,15,30,0.3); border-top:1px solid var(--glass-border); padding-block:clamp(60px,8vw,120px); position:relative; overflow:hidden;" id="comment">
  <div class="section" style="padding-block:0">
    <div class="s-tag">Processus</div>
    <div class="s-title">Comment ça marche ?</div>
    <div class="s-sub">De l'inscription à l'emprunt, tout se fait en quelques clics.</div>
    <div class="steps">
      <div class="step"><div class="step-num">1</div><div class="step-title">S'inscrire en ligne</div><div class="step-txt">L'étudiant remplit le formulaire d'inscription depuis le site public.</div></div>
      <div class="step"><div class="step-num">2</div><div class="step-title">Approbation admin</div><div class="step-txt">L'administrateur approuve la demande et génère automatiquement les identifiants.</div></div>
      <div class="step"><div class="step-num">3</div><div class="step-title">Se connecter</div><div class="step-txt">L'étudiant accède à son espace avec ses identifiants, consulte le catalogue.</div></div>
      <div class="step"><div class="step-num">4</div><div class="step-title">Emprunter</div><div class="step-txt">Le bibliothécaire enregistre l'emprunt. L'étudiant suit ses livres en ligne.</div></div>
    </div>
  </div>
</div>

<div class="flag-stripe"></div>

<!-- TARIFS -->
<div class="pricing-bg" id="tarifs">
  <div class="pricing-inner">
    <div class="s-tag" style="color:var(--gold)">Tarification</div>
    <div class="s-title">Offres pour les universités</div>
    <div class="s-sub">Des offres adaptées à chaque établissement de la République de Djibouti.</div>
    <div class="pricing-grid">
      <div class="pcard">
        <div class="pc-tag">Starter</div>
        <div class="pc-title">Découverte</div>
        <div class="pc-price">Gratuit <span>/3 mois</span></div>
        <ul class="pc-list">
          <li>✅ 1 bibliothèque</li>
          <li>✅ Jusqu'à 500 membres</li>
          <li>✅ Catalogue illimité</li>
          <li>✅ Support email</li>
          <li>❌ Rapports avancés</li>
          <li>❌ Multi-bibliothèques</li>
        </ul>
        <a href="#" class="btn-pcard btn-pcard-o" onclick="openInsc();return false">Commencer gratuitement</a>
      </div>
      <div class="pcard featured">
        <div class="pc-tag">⭐ Recommandé</div>
        <div class="pc-title">Université</div>
        <div class="pc-price">50 000 FDJ <span>/an</span></div>
        <ul class="pc-list">
          <li>✅ 1 université complète</li>
          <li>✅ Membres illimités</li>
          <li>✅ Rapports & graphiques</li>
          <li>✅ Cartes membres PDF</li>
          <li>✅ Support prioritaire</li>
          <li>✅ Formation du personnel</li>
        </ul>
        <a href="mailto:hasnamed2526@gmail.com" class="btn-pcard btn-pcard-f">Contacter pour un devis</a>
      </div>
      <div class="pcard">
        <div class="pc-tag">Entreprise</div>
        <div class="pc-title">National</div>
        <div class="pc-price">Sur devis</div>
        <ul class="pc-list">
          <li>✅ Toutes universités</li>
          <li>✅ Vue super-admin nationale</li>
          <li>✅ Personnalisation logo/couleurs</li>
          <li>✅ Installation sur site</li>
          <li>✅ Support dédié 24/7</li>
          <li>✅ Mises à jour incluses</li>
        </ul>
        <a href="mailto:hasnamed2526@gmail.com" class="btn-pcard btn-pcard-o">Nous contacter</a>
      </div>
    </div>
  </div>
</div>

<!-- CTA -->
<div class="cta-section">
  <div class="cta-box">
    <div class="cta-title">Rejoignez Bibliothèque Nationale de Djibouti dès aujourd'hui</div>
    <div class="cta-sub">Inscrivez-vous gratuitement et accédez à la bibliothèque de votre université.<br>Pour les établissements : contactez-nous pour une démonstration personnalisée.</div>
    <div class="cta-btns">
      <a href="#" class="btn-cta btn-cta-w" onclick="openInsc();return false">🎓 Inscription étudiant</a>
      <a href="login.php" class="btn-cta btn-cta-o">🔐 Espace membre</a>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div>
      <div class="f-brand-name">📚 Bibliothèque Nationale de Djibouti</div>
      <div class="f-brand-sub">Plateforme nationale de gestion des bibliothèques universitaires de la République de Djibouti. Accessible 24h/24, partout dans le monde.</div>
      <div class="f-flag" style="margin-top:16px"><div class="ff-b"></div><div class="ff-g"></div><div class="ff-w"></div></div>
    </div>
    <div>
      <div class="f-col-title">Navigation</div>
      <a href="#universites" class="f-link">Universités</a>
      <a href="#fonctionnalites" class="f-link">Fonctionnalités</a>
      <a href="#comment" class="f-link">Comment ça marche</a>
      <a href="#tarifs" class="f-link">Tarifs</a>
    </div>
    <div>
      <div class="f-col-title">Accès</div>
      <a href="login.php" class="f-link">Connexion</a>
      <a href="#" onclick="openInsc();return false" class="f-link">S'inscrire</a>
      <a href="admin/" class="f-link">Espace Admin</a>
      <a href="bibliothecaire/" class="f-link">Bibliothécaire</a>
    </div>
    <div>
      <div class="f-col-title">Contact</div>
      <a href="mailto:hasnamed2526@gmail.com" class="f-link">hasnamed2526@gmail.com</a>
      <a href="tel:+25377175221" class="f-link">+253 77 17 52 21</a>
      <div class="f-link">Djibouti-Ville, République de Djibouti</div>
    </div>
  </div>
  <div class="f-bottom">
    <div>© <?= date('Y') ?> Bibliothèque Nationale de Djibouti — Tous droits réservés</div>
    <div>Conçu pour les universités de la République de Djibouti 🇩🇯</div>
  </div>
</footer>

<!-- MODAL INSCRIPTION -->
<div class="backdrop" id="m-insc">
  <div class="imodal">
    <div id="form-view">
      <span class="im-close" onclick="closeInsc()">×</span>
      <div class="im-title">📝 Demande d'inscription</div>
      <div class="im-sub">Remplissez ce formulaire. L'administration de votre université vous enverra vos identifiants de connexion sous 24–48h.</div>
      <div class="ifg"><label>Université *</label><select id="i-univ"><option value="">— Sélectionner votre université —</option></select></div>
      <div class="ir2">
        <div class="ifg"><label>Nom *</label><input type="text" id="i-nom" placeholder="Nom de famille"></div>
        <div class="ifg"><label>Prénom *</label><input type="text" id="i-prenom" placeholder="Prénom"></div>
      </div>
      <div class="ifg"><label>Email *</label><input type="email" id="i-email" placeholder="votre@email.com"></div>
      <div class="ir2">
        <div class="ifg"><label>Téléphone</label><input type="text" id="i-tel" placeholder="77 XX XX XX"></div>
        <div class="ifg"><label>Type *</label><select id="i-type"><option value="etudiant">Étudiant(e)</option><option value="enseignant">Enseignant(e)</option></select></div>
      </div>
      <div class="ir2">
        <div class="ifg"><label>Filière / Département</label><input type="text" id="i-fil" placeholder="Ex: Informatique"></div>
        <div class="ifg"><label>Niveau</label><select id="i-niv"><option value="">—</option><option>Licence 1</option><option>Licence 2</option><option>Licence 3</option><option>Master 1</option><option>Master 2</option><option>Doctorat</option></select></div>
      </div>
      <div class="ifg"><label>Message (optionnel)</label><textarea id="i-msg" placeholder="Précisez si nécessaire…" rows="2"></textarea></div>
      <div class="im-foot">
        <button class="im-cancel" onclick="closeInsc()">Annuler</button>
        <button class="im-submit" id="btn-insc" onclick="submitInsc()">📨 Envoyer la demande</button>
      </div>
    </div>
    <div class="success-view" id="success-view">
      <div class="sv-ico">✅</div>
      <div class="sv-title" id="sv-title-txt">Demande validée !</div>
      <div class="sv-sub" id="sv-sub-txt">Votre compte a été créé et validé automatiquement.<br><br>
        <strong>Nom d'utilisateur :</strong> <span id="sv-uname"></span><br>
        <strong>Mot de passe :</strong> <span id="sv-pwd">password</span><br>
        <strong>N° Carte :</strong> <span id="sv-carte"></span><br><br>
        Vous pouvez maintenant vous connecter à votre espace.
      </div>
      <a href="login.php" class="im-submit" style="margin-top:24px;display:block;width:100%;text-align:center;text-decoration:none">Se connecter maintenant</a>
    </div>
  </div>
</div>

<div id="toasts"></div>

<script>
function openInsc(){document.getElementById('m-insc').classList.add('open');loadUnivs();}
function closeInsc(){document.getElementById('m-insc').classList.remove('open');document.getElementById('form-view').style.display='block';document.getElementById('success-view').style.display='none';}
document.getElementById('m-insc').addEventListener('click',e=>{if(e.target===document.getElementById('m-insc'))closeInsc();});
function toast(m,t='ok'){const el=document.createElement('div');el.className=`toast ${t}`;el.innerHTML=`<span>${t==='ok'?'✅':'❌'}</span><span>${m}</span>`;document.getElementById('toasts').appendChild(el);setTimeout(()=>el.remove(),4000);}

window.addEventListener('load', () => {
  if(window.location.hash === '#inscription') {
    openInsc();
  }
});

let univsLoaded=false;
async function loadUnivs(){
  if(univsLoaded)return;
  const r=await fetch('api/public.php?action=univs');const d=await r.json();
  const sel=document.getElementById('i-univ');
  (d.data||[]).forEach(u=>{const o=document.createElement('option');o.value=u.id_univ;o.textContent=u.logo_emoji+' '+u.nom;sel.appendChild(o);});
  univsLoaded=true;
}

async function submitInsc(){
  const id_univ=document.getElementById('i-univ').value;
  const nom=document.getElementById('i-nom').value.trim();
  const prenom=document.getElementById('i-prenom').value.trim();
  const email=document.getElementById('i-email').value.trim();
  if(!nom||!prenom||!email||!id_univ){toast('Remplissez tous les champs obligatoires (*)','err');return;}
  const btn=document.getElementById('btn-insc');btn.textContent='⏳ Envoi…';btn.disabled=true;
  const r=await fetch('api/inscriptions.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({id_univ:parseInt(id_univ),nom,prenom,email,telephone:document.getElementById('i-tel').value.trim(),type_membre:document.getElementById('i-type').value,filiere:document.getElementById('i-fil').value.trim(),niveau:document.getElementById('i-niv').value,message:document.getElementById('i-msg').value.trim()})});
  const d=await r.json();btn.textContent='📨 Envoyer la demande';btn.disabled=false;
  if(d.success){
    document.getElementById('sv-uname').textContent = d.data.username || '';
    document.getElementById('sv-pwd').textContent = d.data.password || 'password';
    document.getElementById('sv-carte').textContent = d.data.carte || '';
    document.getElementById('form-view').style.display='none';
    document.getElementById('success-view').style.display='block';
  }
  else toast(d.message||'Erreur','err');
}

async function loadStats(){
  try{
    const r=await fetch('api/public.php?action=stats');const d=await r.json();if(!d.success)return;const s=d.data;
    document.getElementById('h-livres').textContent=s.nb_livres||'—';
    document.getElementById('h-membres').textContent=s.nb_membres||'—';
    document.getElementById('h-univs').textContent=s.nb_univs||'4';
    document.getElementById('st-livres').textContent=s.nb_livres||'—';
    document.getElementById('st-membres').textContent=s.nb_membres||'—';
    document.getElementById('st-emprunts').textContent=s.nb_emprunts||'—';
    const g=document.getElementById('univ-grid');g.innerHTML='';
    (s.univs||[]).forEach(u=>{
      g.innerHTML+=`<div class="ucard">
        <div class="uc-top" style="background:linear-gradient(135deg,${u.couleur}18,${u.couleur}08)">${u.logo_emoji}</div>
        <div class="uc-body">
          <div class="uc-name">${u.nom}</div>
          <div class="uc-code">${u.code}</div>
          <div class="uc-stats">
            <span class="uc-chip">📖 ${u.nb_livres} livres</span>
            <span class="uc-chip">👥 ${u.nb_membres} membres</span>
          </div>
        </div>
      </div>`;
    });
  }catch(e){}
}
loadStats();

// Nav scroll
window.addEventListener('scroll',()=>{
  document.querySelector('nav').style.boxShadow=window.scrollY>20?'0 4px 30px rgba(14,71,161,.12)':'0 2px 20px rgba(14,71,161,.07)';
});

function toggleTheme() {
    const html = document.documentElement;
    const current = html.getAttribute('data-theme');
    const target = current === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-theme', target);
    localStorage.setItem('theme', target);
    updateNavThemeUI(target);
}
function updateNavThemeUI(theme) {
    const ico = document.getElementById('nav-theme-ico');
    if(ico) ico.textContent = theme === 'dark' ? '🌙' : '☀️';
}
document.addEventListener('DOMContentLoaded', () => {
    const theme = localStorage.getItem('theme') || 'dark';
    updateNavThemeUI(theme);
});
</script>
</body>
</html>
