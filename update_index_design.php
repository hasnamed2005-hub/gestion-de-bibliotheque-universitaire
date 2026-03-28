<?php
$file = 'c:\wamp64\www\bibliodj\index.php';
$content = file_get_contents($file);

$new_style = <<<'CSS'
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
  background: url('assets/img/modern_library_bg.png') center/cover no-repeat;
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
CSS;

$content = preg_replace('/<style>.*?<\/style>/is', $new_style, $content);
$content = preg_replace('/style="background:#fff;padding-block:clamp\(52px,7vw,96px\)"/', 'style="padding-block:clamp(60px,8vw,120px); position:relative; overflow:hidden;"', $content);
$content = preg_replace('/style="background:#fff"/', 'style="position:relative; overflow:hidden;"', $content);
$content = preg_replace('/style="background:#F0F4FC;padding-block:clamp\(52px,7vw,96px\)"/', 'style="background:rgba(10,15,30,0.3); border-top:1px solid var(--glass-border); padding-block:clamp(60px,8vw,120px); position:relative; overflow:hidden;"', $content);
$content = preg_replace('/<div class="uc-name" style="background:#EEF3FB;([^"]+)">/', '<div class="uc-name" style="background:rgba(255,255,255,0.05);$1">', $content);
file_put_contents($file, $content);
echo "OK";
?>
