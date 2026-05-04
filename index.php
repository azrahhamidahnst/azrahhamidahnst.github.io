<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Perpustakaan SD Sinar Mulia</title>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root {
  --hijau: #2E7D32;
  --hijau-muda: #4CAF50;
  --hijau-terang: #81C784;
  --kuning: #FFC107;
  --kuning-muda: #FFF9C4;
  --merah: #C62828;
  --cream: #FFFDE7;
  --putih: #FFFFFF;
  --abu: #F5F5F5;
  --teks: #1B1B1B;
  --teks-sub: #555;
  --shadow: 0 4px 20px rgba(0,0,0,0.12);
  --radius: 16px;
}
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family: 'Nunito', sans-serif; background: var(--abu); color: var(--teks); overflow-x: hidden; }

/* ===== AUTH ===== */
#auth {
  min-height: 100vh;
  background: linear-gradient(135deg, #1B5E20 0%, #2E7D32 40%, #388E3C 70%, #1565C0 100%);
  display: flex; align-items: center; justify-content: center;
  position: relative; overflow: hidden;
}
#auth::before { content:'📚'; font-size:300px; position:absolute; opacity:0.05; top:-50px; right:-60px; transform:rotate(-20deg); }
.auth-card {
  background: rgba(255,255,255,0.97); padding: 40px 36px; border-radius: 24px;
  width: 360px; max-width: 95vw; box-shadow: 0 20px 60px rgba(0,0,0,0.3);
  text-align: center; animation: slideUp 0.5s ease both;
}
@keyframes slideUp { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }
.auth-logo { font-size:3.5rem; margin-bottom:8px; }
.auth-card h2 { font-family:'Fredoka One',cursive; color:var(--hijau); font-size:1.6rem; margin-bottom:6px; }
.auth-card p.sub { color:var(--teks-sub); font-size:.9rem; margin-bottom:24px; font-weight:600; }
.auth-card input {
  width:100%; padding:12px 16px; margin:8px 0; border-radius:12px;
  border:2px solid #E0E0E0; font-size:.95rem; font-family:'Nunito',sans-serif;
  font-weight:600; transition:border-color .2s; outline:none;
}
.auth-card input:focus { border-color:var(--hijau-muda); }
.btn-primary-custom {
  width:100%; padding:13px;
  background:linear-gradient(135deg,var(--hijau),var(--hijau-muda));
  color:white; border:none; border-radius:12px; font-family:'Fredoka One',cursive;
  font-size:1.1rem; cursor:pointer; margin-top:12px; transition:all .2s;
  box-shadow:0 4px 15px rgba(46,125,50,.4);
}
.btn-primary-custom:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(46,125,50,.5); }
.auth-switch { margin-top:16px; font-size:.88rem; color:var(--teks-sub); font-weight:600; }
.auth-switch a { color:var(--hijau); cursor:pointer; font-weight:800; text-decoration:underline; }

/* ===== APP ===== */
#app { display:none; min-height:100vh; }

/* ===== HEADER / NAVBAR ===== */
header {
  position:sticky; top:0; z-index:1000;
  background:linear-gradient(135deg,#1B5E20,#2E7D32);
  box-shadow:0 4px 20px rgba(0,0,0,.3);
}
.header-inner {
  max-width:1200px; margin:0 auto;
  display:flex; align-items:center; justify-content:space-between;
  height:64px; padding:0 20px;
}
.header-logo {
  display:flex; align-items:center; gap:10px;
  font-family:'Fredoka One',cursive; color:white; font-size:1.25rem; flex-shrink:0;
}
.header-logo span { font-size:1.8rem; }

/* Desktop nav */
nav.desktop-nav { display:flex; gap:2px; align-items:center; flex-wrap:wrap; }
nav.desktop-nav a, nav.desktop-nav .nav-link-custom {
  color:rgba(255,255,255,.85); text-decoration:none;
  padding:8px 10px; border-radius:10px; font-size:.78rem; font-weight:700;
  cursor:pointer; transition:all .2s; white-space:nowrap; background:none; border:none;
}
nav.desktop-nav a:hover, nav.desktop-nav a.active-nav,
nav.desktop-nav .nav-link-custom:hover, nav.desktop-nav .nav-link-custom.active-nav {
  background:rgba(255,255,255,.2); color:white;
}
nav.desktop-nav .btn-logout {
  background:rgba(255,82,82,.3); color:#FFCDD2;
  border-radius:10px; padding:8px 12px; font-size:.78rem; font-weight:700;
  cursor:pointer; transition:all .2s; border:none;
}
nav.desktop-nav .btn-logout:hover { background:rgba(255,82,82,.5); color:white; }

/* Dropdown in nav */
.nav-dropdown { position:relative; display:inline-block; }
.nav-dropdown-menu {
  display:none; position:absolute; top:100%; left:0;
  background:white; border-radius:12px; min-width:160px;
  box-shadow:0 8px 30px rgba(0,0,0,.2); padding:8px 0; z-index:999;
  animation:fadeIn .2s ease;
}
.nav-dropdown:hover .nav-dropdown-menu, .nav-dropdown.open .nav-dropdown-menu { display:block; }
.nav-dropdown-menu a {
  display:block; padding:10px 18px; color:var(--hijau); font-weight:700;
  font-size:.85rem; text-decoration:none; transition:background .15s;
}
.nav-dropdown-menu a:hover { background:#E8F5E9; }

/* Hamburger */
.hamburger-btn {
  display:none; background:rgba(255,255,255,.2); border:none;
  color:white; font-size:1.5rem; padding:8px 12px; border-radius:10px;
  cursor:pointer; transition:all .2s;
}
.hamburger-btn:hover { background:rgba(255,255,255,.35); }

/* Mobile sidebar */
.mobile-sidebar {
  display:none; position:fixed; top:0; left:0; width:280px; height:100vh;
  background:linear-gradient(180deg,#1B5E20,#2E7D32); z-index:2000;
  overflow-y:auto; padding:20px 0; transform:translateX(-100%);
  transition:transform .3s ease; box-shadow:4px 0 30px rgba(0,0,0,.4);
}
.mobile-sidebar.open { transform:translateX(0); }
.sidebar-header {
  display:flex; align-items:center; justify-content:space-between;
  padding:10px 20px 20px; border-bottom:1px solid rgba(255,255,255,.2); margin-bottom:12px;
}
.sidebar-header .logo { font-family:'Fredoka One',cursive; color:white; font-size:1.1rem; display:flex; gap:8px; align-items:center; }
.sidebar-close { background:rgba(255,255,255,.2); border:none; color:white; font-size:1.3rem; padding:6px 10px; border-radius:8px; cursor:pointer; }
.sidebar-link {
  display:flex; align-items:center; gap:10px; padding:12px 24px;
  color:rgba(255,255,255,.9); font-weight:700; font-size:.95rem;
  cursor:pointer; transition:background .2s; border:none; background:none; width:100%; text-align:left;
}
.sidebar-link:hover, .sidebar-link.active { background:rgba(255,255,255,.15); color:white; }
.sidebar-submenu { padding-left:0; background:rgba(0,0,0,.15); }
.sidebar-submenu .sidebar-link { padding:10px 24px 10px 44px; font-size:.88rem; }
.sidebar-accordion-btn {
  display:flex; align-items:center; justify-content:space-between; width:100%;
  padding:12px 24px; color:rgba(255,255,255,.9); font-weight:700; font-size:.95rem;
  cursor:pointer; background:none; border:none; transition:background .2s;
}
.sidebar-accordion-btn:hover { background:rgba(255,255,255,.15); }
.sidebar-accordion-body { display:none; }
.sidebar-accordion-body.open { display:block; }
.sidebar-overlay {
  display:none; position:fixed; top:0; left:0; width:100%; height:100%;
  background:rgba(0,0,0,.5); z-index:1999;
}
.sidebar-overlay.open { display:block; }

/* MARQUEE */
.marquee-wrap { background:linear-gradient(90deg,var(--kuning),#FFD54F,var(--kuning)); padding:10px 0; overflow:hidden; }
.marquee-track { display:flex; width:max-content; animation:marquee 18s linear infinite; }
.marquee-track span { font-weight:800; font-size:.95rem; color:#4E342E; padding:0 60px; }
@keyframes marquee { from{transform:translateX(0)} to{transform:translateX(-50%)} }

/* SECTION */
.section { display:none; }
.section.active { display:block; }
.page-wrap { max-width:1100px; margin:0 auto; padding:32px 20px 60px; }
.page-title { font-family:'Fredoka One',cursive; font-size:2rem; color:var(--hijau); margin-bottom:6px; }
.page-title::after { content:''; display:block; width:60px; height:5px; background:linear-gradient(90deg,var(--kuning),var(--hijau-muda)); border-radius:3px; margin-top:8px; }
.page-subtitle { color:var(--teks-sub); font-weight:600; margin-bottom:28px; margin-top:8px; }

/* ===== BERANDA ===== */
.beranda-hero { background:linear-gradient(135deg,#E8F5E9,#F1F8E9); border-radius:var(--radius); padding:32px; margin-bottom:28px; border:2px solid #C8E6C9; display:flex; gap:24px; align-items:flex-start; }
.beranda-hero .hero-icon { font-size:5rem; flex-shrink:0; }
.beranda-hero h3 { font-family:'Fredoka One',cursive; font-size:1.3rem; color:var(--hijau); margin-bottom:10px; }
.beranda-hero p { color:var(--teks-sub); line-height:1.7; font-weight:600; }
.visi-misi-grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:28px; }
.vm-card { background:white; border-radius:var(--radius); padding:24px; box-shadow:var(--shadow); border-top:5px solid var(--hijau-muda); }
.vm-card.misi { border-top-color:var(--kuning); }
.vm-card h3 { font-family:'Fredoka One',cursive; font-size:1.2rem; color:var(--hijau); margin-bottom:12px; }
.vm-card p, .vm-card li { color:var(--teks-sub); font-weight:600; line-height:1.7; }
.vm-card ul { padding-left:20px; }

/* Event Notification Box */
.event-notif-box {
  position:fixed; bottom:24px; right:24px; width:300px; z-index:500;
  background:white; border-radius:16px; box-shadow:0 8px 40px rgba(0,0,0,.2);
  border-left:5px solid var(--kuning); overflow:hidden; animation:slideInRight .4s ease;
}
@keyframes slideInRight { from{opacity:0;transform:translateX(40px)} to{opacity:1;transform:translateX(0)} }
.notif-header {
  background:linear-gradient(135deg,var(--kuning),#FF8F00);
  padding:10px 14px; display:flex; align-items:center; justify-content:space-between;
}
.notif-header span { font-family:'Fredoka One',cursive; font-size:.95rem; color:white; }
.notif-close { background:none; border:none; color:white; font-size:1.1rem; cursor:pointer; line-height:1; }
.notif-body { padding:12px 14px; max-height:220px; overflow-y:auto; }
.notif-item { padding:8px 0; border-bottom:1px dashed #EEE; }
.notif-item:last-child { border-bottom:none; }
.notif-item .notif-tgl { font-size:.72rem; color:#FF8F00; font-weight:800; margin-bottom:2px; }
.notif-item .notif-nama { font-weight:700; font-size:.88rem; color:var(--teks); }
.notif-btn-show {
  position:fixed; bottom:24px; right:24px; z-index:499;
  background:linear-gradient(135deg,var(--kuning),#FF8F00); color:white;
  border:none; border-radius:50px; padding:12px 18px; font-family:'Fredoka One',cursive;
  font-size:.9rem; cursor:pointer; box-shadow:0 4px 20px rgba(255,193,7,.5);
  animation:pulse 2s infinite; display:none;
}
@keyframes pulse { 0%,100%{transform:scale(1)} 50%{transform:scale(1.05)} }

/* ===== CIRCLE MENU ===== */
.circle-menu { display:flex; gap:20px; justify-content:center; flex-wrap:wrap; margin-bottom:32px; }
.circle-btn {
  width:130px; height:130px; border-radius:50%;
  background:linear-gradient(135deg,var(--hijau-muda),var(--hijau));
  color:white; display:flex; flex-direction:column; align-items:center; justify-content:center;
  cursor:pointer; font-family:'Fredoka One',cursive; font-size:1rem; text-align:center;
  transition:all .3s; box-shadow:0 6px 20px rgba(46,125,50,.35); border:none; gap:6px;
}
.circle-btn:hover { transform:translateY(-6px) scale(1.06); box-shadow:0 12px 30px rgba(46,125,50,.45); }
.circle-btn .circle-icon { font-size:2rem; }
.circle-btn.active-circle { background:linear-gradient(135deg,var(--kuning),#FF8F00); }

/* ===== BUKU GRID ===== */
.buku-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(180px,1fr)); gap:20px; }
.buku-card { background:white; border-radius:var(--radius); box-shadow:var(--shadow); overflow:hidden; transition:all .3s; cursor:pointer; }
.buku-card:hover { transform:translateY(-6px); box-shadow:0 12px 30px rgba(0,0,0,.15); }
.buku-thumb { height:140px; display:flex; align-items:center; justify-content:center; font-size:3.5rem; }
.buku-info { padding:14px; }
.buku-judul { font-family:'Fredoka One',cursive; font-size:.95rem; color:var(--hijau); margin-bottom:5px; }
.buku-sinopsis { font-size:.78rem; color:var(--teks-sub); font-weight:600; line-height:1.5; }
.buku-badge { display:inline-block; margin-top:8px; padding:3px 10px; border-radius:10px; font-size:.72rem; font-weight:800; background:#E8F5E9; color:var(--hijau); }

/* ===== LAYANAN ===== */
.layanan-box { background:white; border-radius:var(--radius); padding:28px; box-shadow:var(--shadow); margin-top:8px; animation:fadeIn .3s ease; }
@keyframes fadeIn { from{opacity:0;transform:translateY(10px)} to{opacity:1;transform:translateY(0)} }
.layanan-box h3 { font-family:'Fredoka One',cursive; font-size:1.3rem; color:var(--hijau); margin-bottom:16px; }
.info-row { display:flex; align-items:center; gap:12px; padding:12px 0; border-bottom:1px solid #F0F0F0; font-weight:700; }
.info-row:last-child { border-bottom:none; }
.info-row .label { color:var(--teks-sub); min-width:160px; }
.info-row .val { color:var(--hijau); font-size:1rem; }
.layanan-input { width:100%; max-width:280px; padding:12px 16px; border-radius:12px; border:2px solid #E0E0E0; font-family:'Nunito',sans-serif; font-weight:700; font-size:.95rem; outline:none; transition:border-color .2s; display:block; margin-bottom:14px; }
.layanan-input:focus { border-color:var(--hijau-muda); }
.btn-aksi { padding:11px 26px; background:linear-gradient(135deg,var(--hijau),var(--hijau-muda)); color:white; border:none; border-radius:12px; font-family:'Fredoka One',cursive; font-size:1rem; cursor:pointer; transition:all .2s; box-shadow:0 4px 12px rgba(46,125,50,.35); }
.btn-aksi:hover { transform:translateY(-2px); }
.result-text { margin-top:16px; padding:14px 18px; background:#E8F5E9; border-radius:12px; color:var(--hijau); font-weight:800; font-size:1.05rem; }

/* Layanan Dropdown */
.layanan-sub-tabs { display:flex; gap:12px; flex-wrap:wrap; margin-bottom:20px; }
.layanan-tab-btn {
  padding:10px 20px; background:white; border:2px solid #E0E0E0; border-radius:12px;
  font-family:'Fredoka One',cursive; font-size:.9rem; cursor:pointer; transition:all .2s; color:var(--teks-sub);
}
.layanan-tab-btn.active { border-color:var(--hijau); background:var(--hijau); color:white; }

/* ===== GAME ===== */
.game-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:24px; }
.game-card { background:white; border-radius:var(--radius); padding:24px; box-shadow:var(--shadow); text-align:center; }
.game-card h3 { font-family:'Fredoka One',cursive; font-size:1.2rem; color:var(--hijau); margin-bottom:6px; }
.game-card p.soal { font-size:1.05rem; font-weight:800; color:var(--teks); margin:14px 0; min-height:36px; background:var(--abu); padding:10px 14px; border-radius:10px; }
.game-input { width:100%; padding:11px 14px; border-radius:12px; border:2px solid #E0E0E0; font-family:'Nunito',sans-serif; font-weight:700; font-size:1rem; text-align:center; outline:none; margin-bottom:12px; transition:border-color .2s; }
.game-input:focus { border-color:var(--hijau-muda); }
.hasil-game { font-size:1rem; font-weight:800; padding:8px 14px; border-radius:10px; margin-top:8px; min-height:36px; }
.hasil-game.benar { background:#E8F5E9; color:#1B5E20; }
.hasil-game.salah { background:#FFEBEE; color:#C62828; }
.skor-badge { display:inline-block; background:linear-gradient(135deg,var(--kuning),#FF8F00); color:#4E342E; padding:6px 18px; border-radius:20px; font-family:'Fredoka One',cursive; font-size:1rem; margin-bottom:20px; }
.kalkulator { display:grid; grid-template-columns:1fr 1fr; gap:10px; margin:14px 0; }
.kalkulator input { grid-column:span 2; padding:11px 14px; border-radius:12px; border:2px solid #E0E0E0; font-family:'Nunito',sans-serif; font-weight:700; font-size:1rem; text-align:center; outline:none; transition:border-color .2s; }
.kalkulator input:focus { border-color:var(--hijau-muda); }
.btn-op { padding:11px; border:none; border-radius:12px; font-family:'Fredoka One',cursive; font-size:1rem; cursor:pointer; transition:all .2s; color:white; }
.btn-op:nth-child(3){background:#1565C0} .btn-op:nth-child(4){background:#C62828} .btn-op:nth-child(5){background:#FF8F00} .btn-op:nth-child(6){background:#6A1B9A}
.btn-op:hover { opacity:.85; transform:scale(1.04); }
.game-options { display:flex; flex-wrap:wrap; gap:8px; justify-content:center; margin-bottom:10px; }
.opt-btn { padding:8px 16px; border:2px solid #E0E0E0; border-radius:10px; background:white; font-weight:700; font-size:.9rem; cursor:pointer; transition:all .2s; }
.opt-btn:hover { border-color:var(--hijau-muda); }
.opt-btn.benar-opt { background:#E8F5E9; border-color:var(--hijau); color:var(--hijau); }
.opt-btn.salah-opt { background:#FFEBEE; border-color:#C62828; color:#C62828; }

/* ===== VIDEO ===== */
.video-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:20px; }
.video-card { background:white; border-radius:var(--radius); overflow:hidden; box-shadow:var(--shadow); transition:transform .3s,box-shadow .3s; }
.video-card:hover { transform:translateY(-6px); box-shadow:0 16px 35px rgba(0,0,0,.15); }
.video-container { position:relative; width:100%; padding-bottom:56.25%; height:0; background:#000; }
.video-container iframe { position:absolute; top:0; left:0; width:100%; height:100%; border:none; }
.video-info { padding:14px; }
.video-info h3 { font-family:'Fredoka One',cursive; font-size:1rem; color:var(--hijau); margin-bottom:5px; }
.video-info p { font-size:.82rem; color:var(--teks-sub); font-weight:600; }
.video-meta { display:flex; justify-content:space-between; margin-top:8px; font-size:.78rem; color:#AAA; font-weight:700; }
.btn-yt { display:inline-flex; align-items:center; gap:6px; margin-top:10px; padding:8px 16px; background:#FF0000; color:white; border-radius:10px; font-family:'Fredoka One',cursive; font-size:.85rem; text-decoration:none; transition:all .2s; }
.btn-yt:hover { background:#CC0000; transform:scale(1.04); }

/* ===== EVENT ===== */
.event-list { display:flex; flex-direction:column; gap:20px; }
.event-item { background:white; border-radius:var(--radius); padding:24px 28px; box-shadow:var(--shadow); display:flex; gap:20px; align-items:flex-start; border-left:6px solid var(--kuning); transition:transform .2s; }
.event-item:hover { transform:translateX(4px); }
.event-item.event-hijau{border-left-color:var(--hijau-muda)} .event-item.event-biru{border-left-color:#1565C0} .event-item.event-ungu{border-left-color:#7B1FA2} .event-item.event-merah{border-left-color:#C62828}
.event-bulan { background:linear-gradient(135deg,var(--hijau),var(--hijau-muda)); color:white; border-radius:12px; padding:10px 16px; text-align:center; min-width:80px; flex-shrink:0; }
.event-bulan .bln { font-family:'Fredoka One',cursive; font-size:1.2rem; }
.event-bulan .tgl { font-size:2rem; font-family:'Fredoka One',cursive; line-height:1; }
.event-content h3 { font-family:'Fredoka One',cursive; font-size:1.2rem; color:var(--hijau); margin-bottom:8px; }
.event-content p { color:var(--teks-sub); font-weight:700; line-height:1.9; font-size:.92rem; }
.btn-daftar-wa { display:inline-flex; align-items:center; gap:8px; margin-top:12px; padding:10px 20px; background:linear-gradient(135deg,#25D366,#128C7E); color:white; border-radius:12px; font-family:'Fredoka One',cursive; font-size:.95rem; text-decoration:none; transition:all .2s; box-shadow:0 4px 12px rgba(37,211,102,.4); }
.btn-daftar-wa:hover { transform:translateY(-2px); }

/* ===== KONTAK ===== */
.kontak-grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:28px; }
.kontak-card { background:white; border-radius:var(--radius); padding:24px; box-shadow:var(--shadow); display:flex; gap:16px; align-items:flex-start; }
.kontak-icon { font-size:2.5rem; flex-shrink:0; }
.kontak-card h3 { font-family:'Fredoka One',cursive; font-size:1.1rem; color:var(--hijau); margin-bottom:6px; }
.kontak-card p { color:var(--teks-sub); font-weight:600; font-size:.9rem; line-height:1.6; }

/* DISKUSI */
.diskusi-tabs { display:flex; gap:0; margin-bottom:24px; border-radius:14px; overflow:hidden; box-shadow:var(--shadow); }
.diskusi-tab { flex:1; padding:13px; background:white; border:none; font-family:'Fredoka One',cursive; font-size:1rem; cursor:pointer; transition:all .2s; color:var(--teks-sub); }
.diskusi-tab.active { background:linear-gradient(135deg,var(--hijau),var(--hijau-muda)); color:white; }
.diskusi-panel { display:none; }
.diskusi-panel.active { display:block; }

/* RUANG DISKUSI */
.chat-box {
  background:white; border-radius:var(--radius); box-shadow:var(--shadow);
  overflow:hidden; margin-bottom:0;
}
.chat-header { background:linear-gradient(135deg,var(--hijau),var(--hijau-muda)); padding:14px 20px; display:flex; align-items:center; gap:10px; }
.chat-header h3 { font-family:'Fredoka One',cursive; font-size:1.1rem; color:white; }
.chat-online { background:rgba(255,255,255,.25); color:white; font-size:.75rem; font-weight:800; padding:3px 10px; border-radius:20px; }
.chat-messages { height:320px; overflow-y:auto; padding:16px; display:flex; flex-direction:column; gap:12px; }
.chat-msg { display:flex; gap:10px; animation:fadeIn .3s ease; }
.chat-msg.mine { flex-direction:row-reverse; }
.chat-avatar { width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:1.2rem; background:#E8F5E9; flex-shrink:0; font-weight:800; }
.chat-bubble { max-width:75%; padding:10px 14px; border-radius:14px; font-size:.88rem; font-weight:600; line-height:1.5; }
.chat-msg:not(.mine) .chat-bubble { background:#F1F8E9; border-bottom-left-radius:4px; }
.chat-msg.mine .chat-bubble { background:linear-gradient(135deg,var(--hijau),var(--hijau-muda)); color:white; border-bottom-right-radius:4px; }
.chat-meta { font-size:.7rem; color:#AAA; margin-top:3px; }
.chat-msg.mine .chat-meta { text-align:right; }
.chat-input-row { display:flex; gap:10px; padding:12px 16px; border-top:2px solid #F0F0F0; }
.chat-input-row input { flex:1; padding:10px 14px; border-radius:12px; border:2px solid #E0E0E0; font-family:'Nunito',sans-serif; font-weight:600; font-size:.92rem; outline:none; transition:border-color .2s; }
.chat-input-row input:focus { border-color:var(--hijau-muda); }
.chat-send { padding:10px 18px; background:linear-gradient(135deg,var(--hijau),var(--hijau-muda)); color:white; border:none; border-radius:12px; font-family:'Fredoka One',cursive; font-size:.9rem; cursor:pointer; transition:all .2s; }
.chat-send:hover { transform:scale(1.05); }

/* KOTAK SARAN */
.saran-box { background:white; border-radius:var(--radius); padding:28px; box-shadow:var(--shadow); }
.saran-box h3 { font-family:'Fredoka One',cursive; font-size:1.3rem; color:var(--hijau); margin-bottom:18px; }
.saran-field { display:flex; flex-direction:column; gap:12px; }
.saran-field input, .saran-field textarea { width:100%; padding:12px 16px; border-radius:12px; border:2px solid #E0E0E0; font-family:'Nunito',sans-serif; font-weight:600; font-size:.95rem; outline:none; transition:border-color .2s; resize:vertical; }
.saran-field input:focus, .saran-field textarea:focus { border-color:var(--hijau-muda); }
.rating-wrap { display:flex; gap:12px; align-items:center; flex-wrap:wrap; }
.rating-wrap label { font-weight:700; color:var(--teks-sub); min-width:60px; }
.rating-emot { display:flex; gap:8px; }
.rating-emot button { font-size:1.8rem; background:none; border:2px solid transparent; border-radius:10px; padding:4px 8px; cursor:pointer; transition:all .2s; opacity:.5; }
.rating-emot button:hover { opacity:1; transform:scale(1.2); }
.rating-emot button.selected { opacity:1; border-color:var(--hijau-muda); background:#E8F5E9; transform:scale(1.15); }
.saran-terkirim { margin-top:16px; background:#E8F5E9; border:2px solid var(--hijau-muda); border-radius:12px; padding:16px 20px; font-weight:700; color:var(--hijau); animation:fadeIn .4s ease; display:none; }

/* Daftar saran publik */
.saran-list-box { margin-top:24px; background:white; border-radius:var(--radius); padding:24px; box-shadow:var(--shadow); }
.saran-list-box h3 { font-family:'Fredoka One',cursive; color:var(--hijau); font-size:1.1rem; margin-bottom:16px; }
.saran-item { padding:14px 0; border-bottom:1px dashed #EEE; }
.saran-item:last-child { border-bottom:none; }
.saran-item .si-head { display:flex; justify-content:space-between; margin-bottom:4px; }
.saran-item .si-nama { font-weight:800; color:var(--hijau); font-size:.9rem; }
.saran-item .si-rating { font-size:1rem; }
.saran-item .si-pesan { color:var(--teks-sub); font-weight:600; font-size:.88rem; line-height:1.6; }
.saran-item .si-tgl { font-size:.72rem; color:#AAA; margin-top:3px; }

/* ===== MAPS / PANDUAN ===== */
.maps-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:20px; }
.maps-card { background:white; border-radius:var(--radius); padding:24px; box-shadow:var(--shadow); border-top:5px solid var(--hijau-muda); cursor:pointer; transition:all .3s; }
.maps-card:hover { transform:translateY(-5px); box-shadow:0 14px 30px rgba(0,0,0,.15); }
.maps-card.kuning{border-top-color:var(--kuning)} .maps-card.biru{border-top-color:#1565C0} .maps-card.ungu{border-top-color:#7B1FA2} .maps-card.merah{border-top-color:#C62828} .maps-card.orange{border-top-color:#E65100} .maps-card.teal{border-top-color:#00796B} .maps-card.pink{border-top-color:#AD1457}
.maps-card-icon { font-size:3rem; margin-bottom:12px; }
.maps-card h3 { font-family:'Fredoka One',cursive; font-size:1.1rem; color:var(--hijau); margin-bottom:8px; }
.maps-card p { color:var(--teks-sub); font-size:.88rem; font-weight:600; line-height:1.6; }
.maps-card .go-btn { display:inline-flex; align-items:center; gap:6px; margin-top:14px; padding:8px 18px; background:linear-gradient(135deg,var(--hijau),var(--hijau-muda)); color:white; border-radius:10px; font-family:'Fredoka One',cursive; font-size:.88rem; border:none; cursor:pointer; transition:all .2s; }
.maps-card .go-btn:hover { transform:scale(1.05); }
.maps-hero { background:linear-gradient(135deg,#E8F5E9,#F1F8E9); border:2px solid #C8E6C9; border-radius:var(--radius); padding:28px; margin-bottom:28px; text-align:center; }
.maps-hero h3 { font-family:'Fredoka One',cursive; font-size:1.4rem; color:var(--hijau); margin-bottom:8px; }
.maps-hero p { color:var(--teks-sub); font-weight:600; line-height:1.7; }

/* ===== ABOUT ===== */
.about-wrap { max-width:650px; margin:0 auto; }
.about-avatar { width:140px; height:140px; background:linear-gradient(135deg,var(--kuning),#FF8F00); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:5rem; margin:0 auto 20px; box-shadow:0 8px 30px rgba(255,193,7,.4); animation:float 4s ease-in-out infinite; }
@keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }
.about-name { font-family:'Fredoka One',cursive; font-size:2rem; color:var(--hijau); text-align:center; margin-bottom:4px; }
.about-sub { text-align:center; color:var(--teks-sub); font-weight:700; margin-bottom:28px; }
.about-stats { display:grid; grid-template-columns:repeat(3,1fr); gap:14px; margin-bottom:24px; }
.stat { background:white; border-radius:var(--radius); padding:18px 10px; text-align:center; box-shadow:var(--shadow); }
.stat-num { font-family:'Fredoka One',cursive; font-size:1.8rem; color:var(--hijau); display:block; }
.stat-lbl { font-size:.8rem; color:var(--teks-sub); font-weight:700; }
.about-card { background:white; border-radius:var(--radius); padding:24px; box-shadow:var(--shadow); margin-bottom:16px; }
.about-card h3 { font-family:'Fredoka One',cursive; font-size:1.2rem; color:var(--hijau); margin-bottom:10px; }
.about-card p { color:var(--teks-sub); font-weight:600; line-height:1.7; }
.contact-links { display:flex; flex-direction:column; gap:10px; margin-top:10px; }
.contact-link-item { display:flex; align-items:center; gap:10px; padding:10px 14px; border-radius:12px; background:var(--abu); font-weight:700; font-size:.9rem; color:var(--teks); text-decoration:none; transition:all .2s; }
.contact-link-item:hover { background:#E8F5E9; color:var(--hijau); transform:translateX(4px); }
.contact-link-item .ci { font-size:1.4rem; }
.chips { display:flex; flex-wrap:wrap; gap:10px; margin-top:12px; }
.chip { padding:6px 16px; border-radius:20px; font-size:.85rem; font-weight:800; background:linear-gradient(135deg,var(--hijau-muda),var(--hijau)); color:white; }

/* ===== RESPONSIVE ===== */
@media (max-width:991px) {
  nav.desktop-nav { display:none; }
  .hamburger-btn { display:block; }
  .mobile-sidebar { display:block; }
}
@media (max-width:768px) {
  .visi-misi-grid, .kontak-grid { grid-template-columns:1fr; }
  .beranda-hero { flex-direction:column; }
  .event-item { flex-direction:column; }
  .page-title { font-size:1.5rem; }
  .event-notif-box { width:calc(100vw - 32px); right:16px; bottom:16px; }
  .buku-grid { grid-template-columns:repeat(auto-fill,minmax(150px,1fr)); }
  .circle-btn { width:100px; height:100px; font-size:.85rem; }
  .circle-btn .circle-icon { font-size:1.6rem; }
}
@media (max-width:576px) {
  .page-wrap { padding:20px 14px 60px; }
  .header-inner { padding:0 14px; }
  .buku-grid { grid-template-columns:repeat(2,1fr); }
  .game-grid { grid-template-columns:1fr; }
  .video-grid { grid-template-columns:1fr; }
  .about-stats { grid-template-columns:repeat(3,1fr); }
}
</style>
</head>
<body>

<!-- AUTH -->
<div id="auth">
  <div id="registerBox" class="auth-card">
    <div class="auth-logo">📚</div>
    <h2>Daftar Anggota</h2>
    <p class="sub">Perpustakaan SD Sinar Mulia</p>
    <input id="reg-nama" placeholder="Nama lengkap">
    <input id="reg-tgl" type="date">
    <input id="reg-pass" type="password" placeholder="Buat password">
    <button class="btn-primary-custom" onclick="daftar()">✅ Daftar Sekarang</button>
    <div class="auth-switch">Sudah punya akun? <a onclick="toggleAuth('login')">Login di sini</a></div>
  </div>
  <div id="loginBox" class="auth-card" style="display:none">
    <div class="auth-logo">🔑</div>
    <h2>Login Anggota</h2>
    <p class="sub">Perpustakaan SD Sinar Mulia</p>
    <input id="login-nama" placeholder="Nama kamu">
    <input id="login-pass" type="password" placeholder="Password">
    <button class="btn-primary-custom" onclick="masuk()">🚀 Masuk</button>
    <div class="auth-switch">Belum punya akun? <a onclick="toggleAuth('register')">Daftar di sini</a></div>
  </div>
</div>

<!-- APP -->
<div id="app">

  <!-- Sidebar overlay -->
  <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

  <!-- Mobile Sidebar -->
  <div class="mobile-sidebar" id="mobileSidebar">
    <div class="sidebar-header">
      <div class="logo"><span>📚</span> SD Sinar Mulia</div>
      <button class="sidebar-close" onclick="closeSidebar()">✕</button>
    </div>
    <button class="sidebar-link" onclick="show('beranda'); closeSidebar()">🏠 Beranda</button>
    <button class="sidebar-link" onclick="show('koleksi'); closeSidebar()">📖 Koleksi Buku</button>
    <button class="sidebar-accordion-btn" onclick="toggleAccordion('acc-layanan')">
      <span>⭐ Layanan & Media</span><span id="acc-layanan-icon">▼</span>
    </button>
    <div class="sidebar-accordion-body" id="acc-layanan">
      <div class="sidebar-submenu">
        <button class="sidebar-link" onclick="show('layanan'); closeSidebar()">⭐ Layanan</button>
        <button class="sidebar-link" onclick="show('game'); closeSidebar()">🎮 Game Edukasi</button>
        <button class="sidebar-link" onclick="show('video'); closeSidebar()">🎬 Video Edukasi</button>
      </div>
    </div>
    <button class="sidebar-link" onclick="show('event'); closeSidebar()">🎪 Event</button>
    <button class="sidebar-link" onclick="show('kontak'); closeSidebar()">📞 Kontak</button>
    <button class="sidebar-link" onclick="show('maps'); closeSidebar()">🗺️ Panduan</button>
    <button class="sidebar-link" onclick="show('about'); closeSidebar()">👤 About</button>
    <div style="padding:16px 20px;margin-top:auto;border-top:1px solid rgba(255,255,255,.2);margin-top:20px;">
      <button onclick="logout()" style="width:100%;padding:12px;background:rgba(255,82,82,.4);border:none;border-radius:12px;color:white;font-family:'Fredoka One',cursive;font-size:.95rem;cursor:pointer;">⬅ Keluar</button>
    </div>
  </div>

  <!-- Header -->
  <header>
    <div class="header-inner">
      <div class="header-logo"><span>📚</span> SD Sinar Mulia</div>
      <!-- Desktop Nav -->
      <nav class="desktop-nav">
        <a onclick="show('beranda',this)">🏠 Beranda</a>
        <a onclick="show('koleksi',this)">📖 Koleksi</a>
        <div class="nav-dropdown">
          <a class="nav-link-custom" id="navLayananBtn" onclick="toggleNavDropdown(this)">⭐ Layanan ▾</a>
          <div class="nav-dropdown-menu">
            <a onclick="show('layanan'); closeDropdowns()">⭐ Layanan</a>
            <a onclick="show('game'); closeDropdowns()">🎮 Game Edukasi</a>
            <a onclick="show('video'); closeDropdowns()">🎬 Video Edukasi</a>
          </div>
        </div>
        <a onclick="show('event',this)">🎪 Event</a>
        <a onclick="show('kontak',this)">📞 Kontak</a>
        <a onclick="show('maps',this)">🗺️ Panduan</a>
        <a onclick="show('about',this)">👤 About</a>
        <button class="btn-logout" onclick="logout()">⬅ Keluar</button>
      </nav>
      <!-- Hamburger -->
      <button class="hamburger-btn" onclick="openSidebar()">☰</button>
    </div>
  </header>

  <!-- Marquee -->
  <div class="marquee-wrap">
    <div class="marquee-track">
      <span>🌟 SELAMAT DATANG DI PERPUSTAKAAN SD SINAR MULIA — RAJIN MEMBACA, CERDAS BERPRESTASI!!! 📚</span>
      <span>🌟 SELAMAT DATANG DI PERPUSTAKAAN SD SINAR MULIA — RAJIN MEMBACA, CERDAS BERPRESTASI!!! 📚</span>
    </div>
  </div>

  <!-- Event Notification Widget -->
  <div class="event-notif-box" id="eventNotifBox">
    <div class="notif-header">
      <span>🎪 Event Mendatang</span>
      <button class="notif-close" onclick="hideNotif()">✕</button>
    </div>
    <div class="notif-body" id="notifBody">
      <div class="notif-item"><div class="notif-tgl">12 April 2026</div><div class="notif-nama">🎬 Nonton Bareng Film Adaptasi Novel</div></div>
      <div class="notif-item"><div class="notif-tgl">26 April 2026</div><div class="notif-nama">📝 Lomba Menulis Cerita Pendek</div></div>
      <div class="notif-item"><div class="notif-tgl">10 Mei 2026</div><div class="notif-nama">🔬 Workshop Sains Seru</div></div>
      <div class="notif-item"><div class="notif-tgl">24 Mei 2026</div><div class="notif-nama">🎤 Pojok Baca: Mendongeng Bersama</div></div>
      <div class="notif-item"><div class="notif-tgl">7 Juni 2026</div><div class="notif-nama">🏆 Lomba Baca Cepat & Kuis Literasi</div></div>
    </div>
  </div>
  <button class="notif-btn-show" id="notifBtnShow" onclick="showNotif()">🎪 Event</button>

  <!-- ====== BERANDA ====== -->
  <div id="beranda" class="section active">
    <div class="page-wrap">
      <div class="page-title">🏠 Beranda</div>
      <p class="page-subtitle">Selamat datang, <b id="namaUser">Pengguna</b>! Selamat belajar.</p>
      <div class="beranda-hero">
        <div class="hero-icon">🏫</div>
        <div>
          <h3>Sejarah Perpustakaan</h3>
          <p>Perpustakaan SD Sinar Mulia berdiri sejak tahun 2010 sebagai pilar pendukung kegiatan belajar mengajar. Seiring waktu, perpustakaan ini terus berkembang dari sekadar ruang penyimpanan buku menjadi pusat literasi digital yang modern, guna menyediakan akses informasi yang luas bagi seluruh siswa dan tenaga pendidik.</p>
        </div>
      </div>
      <div class="visi-misi-grid">
        <div class="vm-card">
          <h3>🎯 Visi</h3>
          <p>Menjadi pusat sumber belajar yang inspiratif, unggul dalam literasi, dan berwawasan teknologi untuk seluruh warga sekolah SD Sinar Mulia.</p>
        </div>
        <div class="vm-card misi">
          <h3>📋 Misi</h3>
          <ul>
            <li>Meningkatkan minat baca dan budaya literasi di lingkungan sekolah</li>
            <li>Menyediakan koleksi referensi yang lengkap, terkini, dan mudah diakses</li>
            <li>Mengembangkan layanan berbasis digital untuk kemudahan belajar mandiri</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ====== KOLEKSI ====== -->
  <div id="koleksi" class="section">
    <div class="page-wrap">
      <div class="page-title">📖 Koleksi Buku</div>
      <p class="page-subtitle">Pilih kategori buku yang ingin kamu jelajahi</p>
      <div class="circle-menu">
        <button class="circle-btn" onclick="tampilBuku('cerita',this)"><span class="circle-icon">📖</span>Buku Cerita</button>
        <button class="circle-btn" onclick="tampilBuku('pelajaran',this)"><span class="circle-icon">📘</span>Buku Pelajaran</button>
        <button class="circle-btn" onclick="tampilBuku('komik',this)"><span class="circle-icon">🦸</span>Komik</button>
      </div>
      <div id="bukuGrid" class="buku-grid"></div>
    </div>
  </div>

  <!-- ====== LAYANAN ====== -->
  <div id="layanan" class="section">
    <div class="page-wrap">
      <div class="page-title">⭐ Layanan</div>
      <p class="page-subtitle">Pilih layanan perpustakaan yang kamu butuhkan</p>
      <div class="circle-menu">
        <button class="circle-btn" onclick="showLayanan('peminjaman',this)"><span class="circle-icon">📥</span>Peminjaman</button>
        <button class="circle-btn" onclick="showLayanan('perpanjangan',this)"><span class="circle-icon">🔄</span>Perpanjangan</button>
        <button class="circle-btn" onclick="showLayanan('pengembalian',this)"><span class="circle-icon">📤</span>Pengembalian</button>
      </div>
      <div id="layananBox"></div>
    </div>
  </div>

  <!-- ====== GAME ====== -->
  <div id="game" class="section">
    <div class="page-wrap">
      <div class="page-title">🎮 Game Edukasi</div>
      <p class="page-subtitle">Belajar sambil bermain — seru dan tetap cerdas!</p>
      <div class="skor-badge">🏆 Skor Total: <span id="skorTotal">0</span></div>
      <div class="game-grid">

        <!-- KALKULATOR -->
        <div class="game-card">
          <div style="font-size:2.5rem;margin-bottom:8px">🧮</div>
          <h3>Kalkulator Edukasi</h3>
          <div class="kalkulator">
            <input type="number" id="angka1" placeholder="Angka pertama">
            <input type="number" id="angka2" placeholder="Angka kedua">
            <button class="btn-op" onclick="hitung('+')">➕ Tambah</button>
            <button class="btn-op" onclick="hitung('-')">➖ Kurang</button>
            <button class="btn-op" onclick="hitung('*')">✖ Kali</button>
            <button class="btn-op" onclick="hitung('/')">➗ Bagi</button>
          </div>
          <div class="hasil-game" id="hasilKalkulator">Hasil: —</div>
        </div>

        <!-- MATEMATIKA -->
        <div class="game-card">
          <div style="font-size:2.5rem;margin-bottom:8px">🔢</div>
          <h3>Game Matematika</h3>
          <p class="soal" id="soalMath">Memuat soal...</p>
          <input type="number" class="game-input" id="jawabanMath" placeholder="Ketik jawaban..." onkeydown="if(event.key==='Enter') cekMath()">
          <button class="btn-aksi" onclick="cekMath()">✅ Jawab</button>
          <div class="hasil-game" id="hasilMath"></div>
        </div>

        <!-- BAHASA INDONESIA -->
        <div class="game-card">
          <div style="font-size:2.5rem;margin-bottom:8px">📝</div>
          <h3>Game Bahasa Indonesia</h3>
          <p style="font-size:.85rem;color:var(--teks-sub);font-weight:600;margin-bottom:4px">Lengkapi kata singkatan berikut:</p>
          <p class="soal" id="soalBI">Memuat soal...</p>
          <input class="game-input" id="jawabanBI" placeholder="Tulis kata lengkap..." onkeydown="if(event.key==='Enter') cekBI()">
          <button class="btn-aksi" onclick="cekBI()">✅ Jawab</button>
          <div class="hasil-game" id="hasilBI"></div>
        </div>

        <!-- AGAMA -->
        <div class="game-card">
          <div style="font-size:2.5rem;margin-bottom:8px">🕌</div>
          <h3>Game Agama</h3>
          <p class="soal" id="soalAgama">Memuat soal...</p>
          <input class="game-input" id="jawabanAgama" placeholder="Ketik jawaban..." onkeydown="if(event.key==='Enter') cekAgama()">
          <button class="btn-aksi" onclick="cekAgama()">✅ Jawab</button>
          <div class="hasil-game" id="hasilAgama"></div>
        </div>

        <!-- IPA PILIHAN GANDA -->
        <div class="game-card">
          <div style="font-size:2.5rem;margin-bottom:8px">🔬</div>
          <h3>Game IPA</h3>
          <p class="soal" id="soalIPA">Memuat soal...</p>
          <div class="game-options" id="opsiIPA"></div>
          <div class="hasil-game" id="hasilIPA"></div>
        </div>

        <!-- IPS -->
        <div class="game-card">
          <div style="font-size:2.5rem;margin-bottom:8px">🌏</div>
          <h3>Game IPS</h3>
          <p class="soal" id="soalIPS">Memuat soal...</p>
          <input class="game-input" id="jawabanIPS" placeholder="Ketik jawaban..." onkeydown="if(event.key==='Enter') cekIPS()">
          <button class="btn-aksi" onclick="cekIPS()">✅ Jawab</button>
          <div class="hasil-game" id="hasilIPS"></div>
        </div>

        <!-- TEBAK KATA -->
        <div class="game-card">
          <div style="font-size:2.5rem;margin-bottom:8px">🔤</div>
          <h3>Tebak Kata</h3>
          <p style="font-size:.82rem;color:var(--teks-sub);font-weight:600;margin-bottom:4px">Tebak kata dari definisinya!</p>
          <p class="soal" id="soalTebakKata">Memuat soal...</p>
          <input class="game-input" id="jawabanTebakKata" placeholder="Ketik jawabanmu..." onkeydown="if(event.key==='Enter') cekTebakKata()">
          <button class="btn-aksi" onclick="cekTebakKata()">✅ Jawab</button>
          <div class="hasil-game" id="hasilTebakKata"></div>
        </div>

        <!-- TEBAK GAMBAR EMOJI -->
        <div class="game-card">
          <div style="font-size:2.5rem;margin-bottom:8px">🎭</div>
          <h3>Tebak Emoji</h3>
          <p style="font-size:.82rem;color:var(--teks-sub);font-weight:600;margin-bottom:4px">Tebak benda dari emoji berikut:</p>
          <p class="soal" id="soalEmoji" style="font-size:2rem;letter-spacing:4px">...</p>
          <input class="game-input" id="jawabanEmoji" placeholder="Nama bendanya..." onkeydown="if(event.key==='Enter') cekEmoji()">
          <button class="btn-aksi" onclick="cekEmoji()">✅ Jawab</button>
          <div class="hasil-game" id="hasilEmoji"></div>
        </div>

      </div>

      <!-- GAME ONLINE -->
      <div style="margin-top:36px;background:white;border-radius:var(--radius);padding:28px;box-shadow:var(--shadow)">
        <h3 style="font-family:'Fredoka One',cursive;font-size:1.3rem;color:var(--hijau);margin-bottom:16px">🌐 Game Edukasi Online</h3>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:12px">
          <a href="https://www.mathplayground.com" target="_blank" rel="noopener" style="text-decoration:none"><div style="background:#E8F5E9;border-radius:12px;padding:14px;font-weight:700;color:var(--hijau);text-align:center">🧮 Game Matematika</div></a>
          <a href="https://www.abcya.com" target="_blank" rel="noopener" style="text-decoration:none"><div style="background:#E3F2FD;border-radius:12px;padding:14px;font-weight:700;color:#1565C0;text-align:center">📖 Game Membaca</div></a>
          <a href="https://www.coolmathgames.com" target="_blank" rel="noopener" style="text-decoration:none"><div style="background:#FFF3E0;border-radius:12px;padding:14px;font-weight:700;color:#E65100;text-align:center">💡 Game Logika</div></a>
          <a href="https://www.funbrain.com" target="_blank" rel="noopener" style="text-decoration:none"><div style="background:#FCE4EC;border-radius:12px;padding:14px;font-weight:700;color:#880E4F;text-align:center">🎉 Game Seru</div></a>
          <a href="https://www.splashlearn.com" target="_blank" rel="noopener" style="text-decoration:none"><div style="background:#EDE7F6;border-radius:12px;padding:14px;font-weight:700;color:#4A148C;text-align:center">✨ SplashLearn</div></a>
          <a href="https://toytheater.com" target="_blank" rel="noopener" style="text-decoration:none"><div style="background:#E0F7FA;border-radius:12px;padding:14px;font-weight:700;color:#006064;text-align:center">🎭 Toy Theater</div></a>
        </div>
      </div>
    </div>
  </div>

  <!-- ====== VIDEO ====== -->
  <div id="video" class="section">
    <div class="page-wrap">
      <div class="page-title">🎬 Video Edukasi</div>
      <p class="page-subtitle">Tonton video pembelajaran yang seru dan mudah dipahami</p>
      <div class="video-grid">
        <div class="video-card"><div class="video-container"><iframe src="https://www.youtube.com/embed/vHxWiVL0oWA" title="Belajar Perkalian" allowfullscreen></iframe></div><div class="video-info"><h3>Belajar Perkalian</h3><p>Perkalian sebagai penjumlahan berulang dengan contoh sederhana.</p><div class="video-meta"><span>⏱ 8 mnt</span><span>👁 1.2M views</span></div><a href="https://www.youtube.com/watch?v=vHxWiVL0oWA" target="_blank" rel="noopener" class="btn-yt">▶ Buka di YouTube</a></div></div>
        <div class="video-card"><div class="video-container"><iframe src="https://www.youtube.com/embed/RakEW82veFg" title="Metamorfosis" allowfullscreen></iframe></div><div class="video-info"><h3>Metamorfosis Kupu-Kupu</h3><p>Proses perubahan dari telur, larva, pupa, hingga kupu-kupu dewasa.</p><div class="video-meta"><span>⏱ 12 mnt</span><span>👁 1.2M views</span></div><a href="https://www.youtube.com/watch?v=RakEW82veFg" target="_blank" rel="noopener" class="btn-yt">▶ Buka di YouTube</a></div></div>
        <div class="video-card"><div class="video-container"><iframe src="https://www.youtube.com/embed/nlXwuNHF8JM" title="Fotosintesis" allowfullscreen></iframe></div><div class="video-info"><h3>Proses Fotosintesis</h3><p>Tumbuhan mengubah cahaya matahari, air, dan CO₂ menjadi makanan dan oksigen.</p><div class="video-meta"><span>⏱ 10 mnt</span><span>👁 1.5M views</span></div><a href="https://www.youtube.com/watch?v=nlXwuNHF8JM" target="_blank" rel="noopener" class="btn-yt">▶ Buka di YouTube</a></div></div>
        <div class="video-card"><div class="video-container"><iframe src="https://www.youtube.com/embed/2EgP_zSOKN4" title="Tata Surya" allowfullscreen></iframe></div><div class="video-info"><h3>Sistem Tata Surya</h3><p>Kenali 8 Planet dan Benda Langit di Tata Surya kita.</p><div class="video-meta"><span>⏱ 15 mnt</span><span>👁 5.2M views</span></div><a href="https://www.youtube.com/watch?v=2EgP_zSOKN4" target="_blank" rel="noopener" class="btn-yt">▶ Buka di YouTube</a></div></div>
        <div class="video-card"><div class="video-container"><iframe src="https://www.youtube.com/embed/zSRpom4gxGE" title="Siklus Air" allowfullscreen></iframe></div><div class="video-info"><h3>Siklus Air Hujan</h3><p>Proses Siklus Air: Evaporasi, Kondensasi, Adveksi, Presipitasi.</p><div class="video-meta"><span>⏱ 11 mnt</span><span>👁 9.2M views</span></div><a href="https://www.youtube.com/watch?v=zSRpom4gxGE" target="_blank" rel="noopener" class="btn-yt">▶ Buka di YouTube</a></div></div>
      </div>
    </div>
  </div>

  <!-- ====== EVENT ====== -->
  <div id="event" class="section">
    <div class="page-wrap">
      <div class="page-title">🎪 Event & Kegiatan</div>
      <p class="page-subtitle">Jadwal kegiatan perpustakaan — daftar dan ikuti serunya!</p>
      <div class="event-list">
        <div class="event-item">
          <div class="event-bulan"><div class="bln">APR</div><div class="tgl">12</div></div>
          <div class="event-content"><h3>🎬 Nonton Bareng Film Adaptasi Novel</h3><p>📌 Menonton film dari adaptasi novel lalu diskusi bersama<br>🕒 08.00 WIB – Selesai<br>📍 Aula SD Sinar Mulia</p><a href="https://wa.me/628123456789?text=Halo%2C%20saya%20ingin%20mendaftar%20event%20Nonton%20Bareng" target="_blank" rel="noopener" class="btn-daftar-wa">💬 Daftar via WhatsApp</a></div>
        </div>
        <div class="event-item event-hijau">
          <div class="event-bulan" style="background:linear-gradient(135deg,#2E7D32,#4CAF50)"><div class="bln">APR</div><div class="tgl">26</div></div>
          <div class="event-content"><h3>📝 Lomba Menulis Cerita Pendek</h3><p>📌 Lomba menulis cerita pendek bertema lingkungan untuk siswa kelas 4–6<br>🕒 09.00 – 12.00 WIB<br>📍 Ruang Perpustakaan<br>🏆 Hadiah menarik untuk juara 1, 2, dan 3!</p><a href="https://wa.me/628123456789?text=Halo%2C%20saya%20ingin%20mendaftar%20Lomba%20Menulis" target="_blank" rel="noopener" class="btn-daftar-wa">💬 Daftar via WhatsApp</a></div>
        </div>
        <div class="event-item event-biru">
          <div class="event-bulan" style="background:linear-gradient(135deg,#1565C0,#1976D2)"><div class="bln">MEI</div><div class="tgl">10</div></div>
          <div class="event-content"><h3>🔬 Workshop Sains Seru: Eksperimen Sederhana</h3><p>📌 Eksperimen sains sederhana yang bisa dilakukan di rumah<br>🕒 08.30 – 11.30 WIB<br>📍 Laboratorium Mini SD Sinar Mulia<br>👶 Terbuka untuk kelas 3–6</p><a href="https://wa.me/628123456789?text=Halo%2C%20saya%20ingin%20mendaftar%20Workshop%20Sains" target="_blank" rel="noopener" class="btn-daftar-wa">💬 Daftar via WhatsApp</a></div>
        </div>
        <div class="event-item event-ungu">
          <div class="event-bulan" style="background:linear-gradient(135deg,#6A1B9A,#8E24AA)"><div class="bln">MEI</div><div class="tgl">24</div></div>
          <div class="event-content"><h3>🎤 Pojok Baca: Mendongeng Bersama</h3><p>📌 Sesi mendongeng interaktif bersama penulis tamu<br>🕒 09.00 – 11.00 WIB<br>📍 Taman Baca SD Sinar Mulia<br>📚 Gratis untuk seluruh siswa</p><a href="https://wa.me/628123456789?text=Halo%2C%20saya%20ingin%20mendaftar%20Pojok%20Baca" target="_blank" rel="noopener" class="btn-daftar-wa">💬 Daftar via WhatsApp</a></div>
        </div>
        <div class="event-item event-merah">
          <div class="event-bulan" style="background:linear-gradient(135deg,#B71C1C,#E53935)"><div class="bln">JUN</div><div class="tgl">07</div></div>
          <div class="event-content"><h3>🏆 Lomba Baca Cepat & Kuis Literasi</h3><p>📌 Kompetisi membaca cepat dan kuis pengetahuan umum antar kelas<br>🕒 07.30 – 13.00 WIB<br>📍 Aula SD Sinar Mulia<br>🎁 Piala bergilir + sertifikat untuk semua peserta!</p><a href="https://wa.me/628123456789?text=Halo%2C%20saya%20ingin%20mendaftar%20Lomba%20Baca%20Cepat" target="_blank" rel="noopener" class="btn-daftar-wa">💬 Daftar via WhatsApp</a></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ====== KONTAK ====== -->
  <div id="kontak" class="section">
    <div class="page-wrap">
      <div class="page-title">📞 Kontak Kami</div>
      <p class="page-subtitle">Hubungi perpustakaan untuk pertanyaan dan informasi lebih lanjut</p>
      <div class="kontak-grid">
        <div class="kontak-card"><div class="kontak-icon">📍</div><div><h3>Alamat</h3><p>Jl. Pendidikan No. 10, Kota Medan,Sumatera Utara, Indonesia</p></div></div>
        <div class="kontak-card"><div class="kontak-icon">📞</div><div><h3>Telepon</h3><p>+6282277225725</p></div></div>
        <div class="kontak-card"><div class="kontak-icon">📧</div><div><h3>Email</h3><p>perpustakaan@sinarmulia.sch.id</p></div></div>
        <div class="kontak-card"><div class="kontak-icon">⏰</div><div><h3>Jam Operasional</h3><p>Senin – Jum'at: 08.00 – 15.00 WIB<br>Sabtu: 09.00 - 12.00<br>Minggu & Tanggal Merah: TUTUP</p></div></div>
      </div>

      <!-- TABS: Diskusi & Saran -->
      <div class="diskusi-tabs">
        <button class="diskusi-tab active" onclick="switchKontakTab('diskusi',this)">💬 Ruang Diskusi</button>
        <button class="diskusi-tab" onclick="switchKontakTab('saran',this)">💌 Kotak Saran</button>
      </div>

      <!-- DISKUSI PANEL -->
      <div class="diskusi-panel active" id="panel-diskusi">
        <div class="chat-box">
          <div class="chat-header">
            <h3>💬 Ruang Diskusi Perpustakaan</h3>
            <span class="chat-online" id="onlineCount">● 1 online</span>
          </div>
          <div class="chat-messages" id="chatMessages">
            <!-- Pesan default -->
            <div class="chat-msg">
              <div class="chat-avatar">🤖</div>
              <div>
                <div class="chat-bubble">Halo! Selamat datang di Ruang Diskusi Perpustakaan SD Sinar Mulia! Silakan berdiskusi, bertanya, atau berbagi tentang buku dan kegiatan perpustakaan. 📚</div>
                <div class="chat-meta">Bot Perpustakaan • Selalu aktif</div>
              </div>
            </div>
          </div>
          <div class="chat-input-row">
            <input type="text" id="chatInput" placeholder="Tulis pesan..." onkeydown="if(event.key==='Enter') kirimChat()">
            <button class="chat-send" onclick="kirimChat()">Kirim ➤</button>
          </div>
        </div>
      </div>

      <!-- SARAN PANEL -->
      <div class="diskusi-panel" id="panel-saran">
        <div class="saran-box">
          <h3>💌 Kotak Saran</h3>
          <div class="saran-field">
            <input type="text" id="saran-nama" placeholder="Nama kamu">
            <input type="text" id="saran-sosmed" placeholder="Media sosial (contoh: @namakamu)">
            <textarea id="saran-pesan" rows="4" placeholder="Pesan atau saran kamu untuk perpustakaan..."></textarea>
            <div class="rating-wrap">
              <label>⭐ Rating:</label>
              <div class="rating-emot" id="ratingEmot">
                <button onclick="pilihRating(this,'😞','Sangat Kecewa')">😞</button>
                <button onclick="pilihRating(this,'😕','Kecewa')">😕</button>
                <button onclick="pilihRating(this,'😐','Biasa')">😐</button>
                <button onclick="pilihRating(this,'😊','Puas')">😊</button>
                <button onclick="pilihRating(this,'😁','Sangat Puas')">😁</button>
              </div>
            </div>
            <div><button class="btn-aksi" onclick="kirimSaran()">📤 Kirim Saran</button></div>
          </div>
          <div id="saranTerkirim" class="saran-terkirim"></div>
        </div>

        <!-- Daftar Saran Publik -->
        <div class="saran-list-box" id="saranListBox">
          <h3>📋 Saran dari Pengguna</h3>
          <div id="saranList"><p style="color:#AAA;font-weight:600;font-size:.88rem">Belum ada saran yang masuk.</p></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ====== MAPS ====== -->
  <div id="maps" class="section">
    <div class="page-wrap">
      <div class="page-title">🗺️ Panduan Menu</div>
      <p class="page-subtitle">Tidak tahu harus kemana? Baca panduan ini!</p>
      <div class="maps-hero">
        <div style="font-size:4rem;margin-bottom:12px">🧭</div>
        <h3>Peta Perpustakaan Digital SD Sinar Mulia</h3>
        <p>Klik tombol "Pergi ke Menu" untuk langsung berpindah ke menu yang kamu inginkan.</p>
      </div>
      <div class="maps-grid">
        <div class="maps-card"><div class="maps-card-icon">🏠</div><h3>Beranda</h3><p>Halaman utama. Baca sejarah singkat, visi dan misi perpustakaan SD Sinar Mulia.</p><button class="go-btn" onclick="show('beranda')">🚀 Pergi ke Beranda</button></div>
        <div class="maps-card kuning"><div class="maps-card-icon">📖</div><h3>Koleksi Buku</h3><p>Koleksi Buku Cerita, Buku Pelajaran, dan Komik Edukasi lebih dari 60 judul!</p><button class="go-btn" onclick="show('koleksi')">🚀 Lihat Koleksi</button></div>
        <div class="maps-card biru"><div class="maps-card-icon">⭐</div><h3>Layanan</h3><p>Peminjaman, perpanjangan, dan penghitungan denda keterlambatan.</p><button class="go-btn" onclick="show('layanan')">🚀 Ke Layanan</button></div>
        <div class="maps-card ungu"><div class="maps-card-icon">🎮</div><h3>Game Edukasi</h3><p>8 game edukasi: Matematika, IPA, IPS, Bahasa, Agama, Tebak Kata, Emoji!</p><button class="go-btn" onclick="show('game')">🚀 Main Game</button></div>
        <div class="maps-card merah"><div class="maps-card-icon">🎬</div><h3>Video Edukasi</h3><p>Tonton video pembelajaran tentang Perkalian, Metamorfosis, Fotosintesis, dan lainnya.</p><button class="go-btn" onclick="show('video')">🚀 Tonton Video</button></div>
        <div class="maps-card orange"><div class="maps-card-icon">🎪</div><h3>Event & Kegiatan</h3><p>Jadwal lomba, workshop, dan acara seru dengan tombol daftar via WhatsApp.</p><button class="go-btn" onclick="show('event')">🚀 Lihat Event</button></div>
        <div class="maps-card teal"><div class="maps-card-icon">📞</div><h3>Kontak & Diskusi</h3><p>Alamat, telepon, jam buka, ruang diskusi, dan kotak saran perpustakaan.</p><button class="go-btn" onclick="show('kontak')">🚀 Ke Kontak</button></div>
        <div class="maps-card pink"><div class="maps-card-icon">👤</div><h3>About Me</h3><p>Profil Admin Perpustakaan SD Sinar Mulia, program unggulan, kontak, dan CV.</p><button class="go-btn" onclick="show('about')">🚀 Lihat Profil</button></div>
      </div>
    </div>
  </div>

  <!-- ====== ABOUT ====== -->
  <div id="about" class="section">
    <div class="page-wrap">
      <div class="page-title">👤 About Me</div>
      <p class="page-subtitle">Kenali pengelola Perpustakaan SD Sinar Mulia</p>
      <div class="about-wrap">
        <div class="about-avatar">👩‍🏫</div>
        <div class="about-name">Azrah Hamidah NST.</div>
        <div class="about-sub">🏫 Pustakawan SD Sinar Mulia</div>
        <div class="about-stats">
          <div class="stat"><span class="stat-num">14+</span><span class="stat-lbl">Tahun Pengalaman</span></div>
          <div class="stat"><span class="stat-num">500+</span><span class="stat-lbl">Koleksi Buku</span></div>
          <div class="stat"><span class="stat-num">200+</span><span class="stat-lbl">Anggota Aktif</span></div>
        </div>
        <div class="about-card">
          <h3>👋 Sapa Saya!😁😁😁</h3>
          <p style="margin-bottom:16px">Halo! Saya Azrah, pustakawan dan admin SD Sinar Mulia sejak tahun 2010. Saya berdedikasi untuk menciptakan suasana perpustakaan yang menyenangkan dan membuat anak-anak semakin cinta membaca!</p>
          <div class="contact-links">
            <div style="font-weight:700;color:var(--hijau);margin-bottom:4px">📋 Informasi Kontak:</div>
            <a href="https://drive.google.com/file/d/1IAb7KRsTeZ_DDY5-UzanqW6R9Z5e2Obc/view?usp=drive_link" target="_blank" rel="noopener" class="contact-link-item"><span class="ci">📄</span> Curriculum Vitae (CV)</a>
            <a href="https://wa.me/6282277225725" target="_blank" rel="noopener" class="contact-link-item"><span class="ci">📱</span> +62 822-7722-5725</a>
            <a href="https://www.instagram.com/zraah_h_?igsh=MXVuM3Q4YnQxZjRseA==" target="_blank" rel="noopener" class="contact-link-item"><span class="ci">📸</span> @zraah_h_</a>
            <a href="mailto:azrahhamidahnst@gmail.com" class="contact-link-item"><span class="ci">📧</span> azrahhamidahnst@gmail.com</a>
          </div>
        </div>
        <div class="about-card">
          <h3>🌟 Program Unggulan</h3>
          <div class="chips">
            <span class="chip">📚 Pojok Baca</span><span class="chip">🎬 Nonton Bareng</span><span class="chip">✏️ Menulis Kreatif</span><span class="chip">🔬 Sains Seru</span><span class="chip">🏆 Lomba Baca</span>
          </div>
        </div>
        <div class="about-card">
          <h3>💌 Pesan</h3>
          <p>"Setiap buku yang kamu buka adalah jendela menuju dunia yang lebih luas. Jangan berhenti membaca, karena ilmu adalah bekal terbaik untuk masa depanmu!" 🌟</p>
        </div>
      </div>
    </div>
  </div>

</div><!-- end #app -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
/* ============= STORAGE HELPERS ============= */
// Use localStorage as persistent storage substitute
// (Note: In production use a real backend/database)
function storeGet(key) { try { return JSON.parse(localStorage.getItem(key)); } catch(e) { return null; } }
function storeSet(key, val) { try { localStorage.setItem(key, JSON.stringify(val)); } catch(e) {} }

/* ============= AUTH ============= */
let userData = {};
let currentUser = '';

function toggleAuth(mode) {
  document.getElementById('registerBox').style.display = mode==='login' ? 'none' : 'block';
  document.getElementById('loginBox').style.display = mode==='login' ? 'block' : 'none';
}

function daftar() {
  const nama = document.getElementById('reg-nama').value.trim();
  const pass = document.getElementById('reg-pass').value.trim();
  if (!nama || !pass) { alert('⚠️ Harap isi nama dan password!'); return; }
  let users = storeGet('users') || {};
  if (users[nama]) { alert('⚠️ Nama sudah terdaftar!'); return; }
  users[nama] = pass;
  storeSet('users', users);
  alert('✅ Pendaftaran berhasil! Silakan login.');
  toggleAuth('login');
}

function masuk() {
  const nama = document.getElementById('login-nama').value.trim();
  const pass = document.getElementById('login-pass').value.trim();
  const users = storeGet('users') || {};
  // Allow demo login even without registration
  if (!nama || !pass) { alert('⚠️ Isi nama dan password!'); return; }
  if (users[nama] && users[nama] !== pass) { alert('❌ Password salah!'); return; }
  if (!users[nama]) {
    // auto-register on first login
    users[nama] = pass;
    storeSet('users', users);
  }
  currentUser = nama;
  document.getElementById('auth').style.display = 'none';
  document.getElementById('app').style.display = 'block';
  document.getElementById('namaUser').textContent = nama;
  soalBaruMath(); soalBaruBI(); soalBaruAgama(); soalBaruIPA(); soalBaruIPS(); soalBaruTebakKata(); soalBaruEmoji();
  loadChatMessages(); loadSaranList();
  updateOnlineCount();
}

function logout() { location.reload(); }

/* ============= SIDEBAR ============= */
function openSidebar() {
  document.getElementById('mobileSidebar').classList.add('open');
  document.getElementById('sidebarOverlay').classList.add('open');
}
function closeSidebar() {
  document.getElementById('mobileSidebar').classList.remove('open');
  document.getElementById('sidebarOverlay').classList.remove('open');
}
function toggleAccordion(id) {
  const body = document.getElementById(id);
  const icon = document.getElementById(id+'-icon');
  body.classList.toggle('open');
  if (icon) icon.textContent = body.classList.contains('open') ? '▲' : '▼';
}

/* ============= NAV DROPDOWN ============= */
function toggleNavDropdown(el) {
  const dd = el.closest('.nav-dropdown');
  dd.classList.toggle('open');
}
function closeDropdowns() {
  document.querySelectorAll('.nav-dropdown').forEach(d => d.classList.remove('open'));
}
document.addEventListener('click', function(e) {
  if (!e.target.closest('.nav-dropdown')) closeDropdowns();
});

/* ============= NAVIGASI ============= */
function show(id, el) {
  document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
  document.getElementById(id).classList.add('active');
  document.querySelectorAll('nav.desktop-nav a').forEach(a => a.classList.remove('active-nav'));
  if (el && el.tagName === 'A') el.classList.add('active-nav');
  window.scrollTo({top:0, behavior:'smooth'});
}

/* ============= EVENT NOTIF ============= */
function hideNotif() {
  document.getElementById('eventNotifBox').style.display = 'none';
  document.getElementById('notifBtnShow').style.display = 'block';
}
function showNotif() {
  document.getElementById('eventNotifBox').style.display = 'block';
  document.getElementById('notifBtnShow').style.display = 'none';
}

/* ============= KOLEKSI ============= */
const dataBuku = {
  cerita: [
    {judul:'Malin Kundang',icon:'🧒',warna:'#FFECB3',sinopsis:'Kisah anak durhaka yang dikutuk menjadi batu oleh ibunya.',kat:'Legenda'},
    {judul:'Sangkuriang',icon:'🏔️',warna:'#B2EBF2',sinopsis:'Kisah cinta terlarang yang melahirkan Gunung Tangkuban Perahu.',kat:'Legenda'},
    {judul:'Bawang Merah Bawang Putih',icon:'🌸',warna:'#FCE4EC',sinopsis:'Kisah kebaikan vs keserakahan yang berujung kebahagiaan.',kat:'Dongeng'},
    {judul:'Keong Mas',icon:'🐚',warna:'#E8F5E9',sinopsis:'Putri cantik yang dikutuk menjadi keong mas.',kat:'Dongeng'},
    {judul:'Timun Mas',icon:'🥒',warna:'#F1F8E9',sinopsis:'Gadis pemberani yang lari dari raksasa dengan benih ajaib.',kat:'Dongeng'},
    {judul:'Putri Salju',icon:'❄️',warna:'#E3F2FD',sinopsis:'Putri cantik yang diracuni apel merah oleh ibu tiri.',kat:'Dongeng'},
    {judul:'Si Kancil & Buaya',icon:'🦊',warna:'#FFF3E0',sinopsis:'Kancil yang cerdik berhasil menyeberangi sungai penuh buaya.',kat:'Fabel'},
    {judul:'Ande-Ande Lumut',icon:'🦋',warna:'#EDE7F6',sinopsis:'Pemuda tampan yang dicari para gadis di seluruh negeri.',kat:'Legenda'},
    {judul:'Lutung Kasarung',icon:'🐒',warna:'#E0F7FA',sinopsis:'Pangeran yang dikutuk menjadi lutung demi keadilan.',kat:'Legenda'},
    {judul:'Cinderella',icon:'👗',warna:'#FCE4EC',sinopsis:'Gadis baik hati menemukan cinta sejati melalui sepatu kaca.',kat:'Dongeng'},
    {judul:'Jaka Tarub',icon:'👘',warna:'#FFF8E1',sinopsis:'Pemuda yang menikahi bidadari setelah menyembunyikan selendangnya.',kat:'Legenda'},
    {judul:'Putri Tidur',icon:'🌹',warna:'#FCE4EC',sinopsis:'Putri yang tertidur 100 tahun karena sihir penyihir jahat.',kat:'Dongeng'},
    {judul:'Asal Usul Danau Toba',icon:'🏞️',warna:'#E8F5E9',sinopsis:'Kisah sedih seorang ayah dan anak yang menjadi danau besar.',kat:'Legenda'},
    {judul:'Si Pitung',icon:'🦸',warna:'#FFF3E0',sinopsis:'Pahlawan rakyat Betawi yang melawan penjajah dan tuan tanah.',kat:'Legenda'},
    {judul:'Roro Jonggrang',icon:'🏯',warna:'#EDE7F6',sinopsis:'Kisah cinta dan kutukan yang melahirkan Candi Prambanan.',kat:'Legenda'},
    {judul:'Nyi Roro Kidul',icon:'🌊',warna:'#E0F7FA',sinopsis:'Ratu laut selatan yang menjaga lautan dengan kekuatannya.',kat:'Legenda'},
    {judul:'Hansel & Gretel',icon:'🍭',warna:'#FFECB3',sinopsis:'Kakak adik yang tersesat di hutan dan bertemu penyihir jahat.',kat:'Dongeng'},
    {judul:'Si Kabayan',icon:'😄',warna:'#E8F5E9',sinopsis:'Kisah lucu pemuda Sunda yang penuh akal dan humor.',kat:'Humor'},
    {judul:'Gadis Penjual Korek Api',icon:'🕯️',warna:'#F3E5F5',sinopsis:'Kisah mengharukan gadis kecil di malam musim dingin.',kat:'Dongeng'},
    {judul:'Aladdin',icon:'🧞',warna:'#FFF3E0',sinopsis:'Pemuda miskin yang menemukan lampu ajaib berisi jin.',kat:'Dongeng'},
    {judul:'Siti Nurbaya',icon:'💌',warna:'#FCE4EC',sinopsis:'Kisah cinta yang terhalang adat dan paksaan keluarga.',kat:'Sastra'},
    {judul:'Sang Kura-Kura & Kelinci',icon:'🐢',warna:'#E8F5E9',sinopsis:'Lomba lari yang mengajarkan bahwa konsisten itu menang.',kat:'Fabel'},
    {judul:'Harimau & Tikus',icon:'🐯',warna:'#FFF8E1',sinopsis:'Harimau yang sombong dibantu tikus kecil yang ia remehkan.',kat:'Fabel'},
    {judul:'Pinokio',icon:'🤥',warna:'#E3F2FD',sinopsis:'Boneka kayu yang hidungnya memanjang setiap kali berbohong.',kat:'Dongeng'},
  ],
  pelajaran: [
    {judul:'Matematika Dasar',icon:'🔢',warna:'#E3F2FD',sinopsis:'Belajar penjumlahan, pengurangan, perkalian, dan pembagian.',kat:'Matematika'},
    {judul:'Bahasa Indonesia',icon:'📝',warna:'#FFF3E0',sinopsis:'Tata bahasa, menulis, membaca, dan berbicara yang baik dan benar.',kat:'Bahasa'},
    {judul:'IPA (Sains)',icon:'🔬',warna:'#E8F5E9',sinopsis:'Mengenal alam, tumbuhan, hewan, dan fenomena ilmu pengetahuan alam.',kat:'Sains'},
    {judul:'Bahasa Inggris',icon:'🌍',warna:'#EDE7F6',sinopsis:'Belajar kosakata, percakapan, dan tata bahasa Inggris dasar.',kat:'Bahasa'},
    {judul:'IPS (Ilmu Pengetahuan Sosial)',icon:'🗺️',warna:'#E0F7FA',sinopsis:'Sejarah, geografi, ekonomi, dan kehidupan sosial masyarakat.',kat:'Sosial'},
    {judul:'Pendidikan Agama Islam',icon:'🕌',warna:'#FFF8E1',sinopsis:'Aqidah, ibadah, akhlak, dan Al-Quran untuk siswa SD.',kat:'Agama'},
    {judul:'PKn (Kewarganegaraan)',icon:'🇮🇩',warna:'#FFEBEE',sinopsis:'Pancasila, UUD, hak dan kewajiban warga negara Indonesia.',kat:'PKn'},
    {judul:'Matematika Lanjutan',icon:'📐',warna:'#E3F2FD',sinopsis:'Pecahan, geometri, pengukuran, dan statistik dasar.',kat:'Matematika'},
    {judul:'Seni Budaya',icon:'🎨',warna:'#FCE4EC',sinopsis:'Seni rupa, musik, tari, dan prakarya untuk kreativitas siswa.',kat:'Seni'},
    {judul:'Penjaskes',icon:'⚽',warna:'#E8F5E9',sinopsis:'Pendidikan jasmani, kesehatan, dan olahraga untuk siswa SD.',kat:'Olahraga'},
    {judul:'Buku Pintar IPA Kelas 4',icon:'🧪',warna:'#E0F7FA',sinopsis:'Rangkuman materi IPA kelas 4 SD lengkap dan mudah dipahami.',kat:'Sains'},
    {judul:'Bahasa Inggris Kelas 5',icon:'✏️',warna:'#EDE7F6',sinopsis:'Materi Bahasa Inggris lengkap untuk kelas 5 SD.',kat:'Bahasa'},
    {judul:'Matematika Kelas 6',icon:'📊',warna:'#E3F2FD',sinopsis:'Persiapan ujian matematika kelas 6 dengan latihan soal.',kat:'Matematika'},
    {judul:'Atlas Indonesia',icon:'🗺️',warna:'#E8F5E9',sinopsis:'Peta lengkap 34 provinsi Indonesia dengan info geografi.',kat:'Sosial'},
    {judul:'Ensiklopedi Hewan',icon:'🦁',warna:'#FFF3E0',sinopsis:'Informasi lengkap tentang 500+ hewan di seluruh dunia.',kat:'Sains'},
    {judul:'Kamus Bahasa Indonesia',icon:'📖',warna:'#FCE4EC',sinopsis:'Kamus lengkap Bahasa Indonesia untuk siswa SD-SMP.',kat:'Bahasa'},
    {judul:'Buku Cerita Rakyat',icon:'📜',warna:'#FFF8E1',sinopsis:'Kumpulan cerita rakyat dari 34 provinsi di Indonesia.',kat:'Sastra'},
    {judul:'Matematika Asyik',icon:'🎲',warna:'#E3F2FD',sinopsis:'Matematika disajikan dengan cara yang menyenangkan dan interaktif.',kat:'Matematika'},
    {judul:'Sains Seru SD',icon:'🌱',warna:'#E8F5E9',sinopsis:'Eksperimen sains sederhana yang bisa dilakukan di rumah.',kat:'Sains'},
    {judul:'Geografi Nusantara',icon:'🏝️',warna:'#E0F7FA',sinopsis:'Mengenal keindahan dan kekayaan alam kepulauan Indonesia.',kat:'Geografi'},
    {judul:'Pancasila & Karakter',icon:'⭐',warna:'#FFF8E1',sinopsis:'Nilai-nilai Pancasila dalam kehidupan sehari-hari siswa.',kat:'PKn'},
    {judul:'Bahasa Arab Dasar',icon:'🌙',warna:'#FFF8E1',sinopsis:'Pengenalan huruf hijaiyah dan kosakata Arab dasar.',kat:'Bahasa'},
    {judul:'Buku Latihan Soal USBN',icon:'📋',warna:'#FFEBEE',sinopsis:'Bank soal lengkap untuk persiapan Ujian Sekolah Berstandar Nasional.',kat:'Ujian'},
    {judul:'Komputer & TIK',icon:'💻',warna:'#E3F2FD',sinopsis:'Teknologi Informasi dan Komunikasi untuk siswa SD.',kat:'TIK'},
  ],
  komik: [
    {judul:'Komik Sains',icon:'🧪',warna:'#E0F7FA',sinopsis:'Petualangan sains yang seru dan mudah dipahami lewat gambar.',kat:'Sains'},
    {judul:'Komik Agama',icon:'🕌',warna:'#FFF8E1',sinopsis:'Kisah para nabi dan nilai-nilai agama dalam format komik.',kat:'Agama'},
    {judul:'Komik Matematika',icon:'🔢',warna:'#F3E5F5',sinopsis:'Soal-soal matematika dalam alur cerita petualangan seru.',kat:'Matematika'},
    {judul:'Komik Adab',icon:'🤝',warna:'#E8F5E9',sinopsis:'Pelajaran sopan santun dan adab sehari-hari lewat tokoh lucu.',kat:'Karakter'},
    {judul:'Petualangan Dora',icon:'🎒',warna:'#E3F2FD',sinopsis:'Dora dan teman-temannya bertualang sambil belajar Bahasa Inggris.',kat:'Bahasa'},
    {judul:'Komik Sejarah RI',icon:'🏴',warna:'#FFEBEE',sinopsis:'Perjuangan pahlawan kemerdekaan Indonesia dalam komik berwarna.',kat:'Sejarah'},
    {judul:'Doraemon - Belajar Sains',icon:'🤖',warna:'#E3F2FD',sinopsis:'Nobita dan Doraemon belajar sains dengan alat ajaib yang seru.',kat:'Sains'},
    {judul:'Komik IPS Seru',icon:'🌏',warna:'#E0F7FA',sinopsis:'Perjalanan seru keliling Indonesia dan dunia bersama tokoh lucu.',kat:'Sosial'},
    {judul:'Superhero Lingkungan',icon:'🌿',warna:'#E8F5E9',sinopsis:'Kisah anak-anak yang menjadi pahlawan pelindung lingkungan.',kat:'Lingkungan'},
    {judul:'Komik Kesehatan',icon:'🏥',warna:'#FCE4EC',sinopsis:'Belajar hidup sehat dan menjaga kebersihan diri lewat komik.',kat:'Kesehatan'},
    {judul:'Detektif Cilik',icon:'🔍',warna:'#FFF3E0',sinopsis:'Petualangan detektif kecil yang memecahkan misteri di sekolah.',kat:'Misteri'},
    {judul:'Komik Pancasila',icon:'⭐',warna:'#FFF8E1',sinopsis:'Nilai-nilai Pancasila diceritakan lewat tokoh-tokoh yang menggemaskan.',kat:'PKn'},
    {judul:'Petualangan Luar Angkasa',icon:'🚀',warna:'#E3F2FD',sinopsis:'Ekspedisi ke luar angkasa yang penuh pelajaran tentang tata surya.',kat:'Sains'},
    {judul:'Komik Dinosaurus',icon:'🦕',warna:'#E8F5E9',sinopsis:'Cerita seru kehidupan dinosaurus dan kepunahannya.',kat:'Sains'},
    {judul:'Si Unyil',icon:'🎭',warna:'#FFF3E0',sinopsis:'Petualangan sehari-hari Unyil dan teman-temannya yang penuh nilai moral.',kat:'Karakter'},
    {judul:'Komik Cuaca & Iklim',icon:'🌦️',warna:'#E0F7FA',sinopsis:'Belajar tentang cuaca, musim, dan perubahan iklim lewat komik.',kat:'Sains'},
    {judul:'Ninja Matematika',icon:'🥷',warna:'#F3E5F5',sinopsis:'Ninja yang menyelesaikan soal matematika untuk mengalahkan musuh.',kat:'Matematika'},
    {judul:'Komik Cerita Nusantara',icon:'🏮',warna:'#FFF8E1',sinopsis:'Kumpulan cerita rakyat Nusantara dalam format komik berwarna.',kat:'Budaya'},
    {judul:'Petualangan Bawah Laut',icon:'🐠',warna:'#E0F7FA',sinopsis:'Menjelajahi keindahan dan keanekaragaman hayati laut Indonesia.',kat:'Sains'},
    {judul:'Komik Pahlawan Nasional',icon:'🦅',warna:'#FFEBEE',sinopsis:'Kisah keberanian para pahlawan nasional dalam bingkai komik.',kat:'Sejarah'},
    {judul:'Si Kancil Adventures',icon:'🦊',warna:'#FFF3E0',sinopsis:'Petualangan baru Si Kancil yang mengajarkan nilai kejujuran.',kat:'Fabel'},
    {judul:'Komik Teknologi',icon:'📱',warna:'#E3F2FD',sinopsis:'Mengenal dunia teknologi modern yang seru dan bermanfaat.',kat:'TIK'},
    {judul:'Komik Olahraga',icon:'🏆',warna:'#E8F5E9',sinopsis:'Semangat berlatih dan sportivitas dalam olahraga favorit.',kat:'Olahraga'},
    {judul:'Petualangan Museum',icon:'🏛️',warna:'#FCE4EC',sinopsis:'Menjelajahi museum dan belajar sejarah dengan cara yang menyenangkan.',kat:'Sejarah'},
  ]
};

function tampilBuku(kategori, btn) {
  document.querySelectorAll('.circle-btn').forEach(b => b.classList.remove('active-circle'));
  if (btn) btn.classList.add('active-circle');
  const grid = document.getElementById('bukuGrid');
  grid.innerHTML = dataBuku[kategori].map(b => `
    <div class="buku-card">
      <div class="buku-thumb" style="background:${b.warna}">${b.icon}</div>
      <div class="buku-info">
        <div class="buku-judul">${b.judul}</div>
        <div class="buku-sinopsis">${b.sinopsis}</div>
        <span class="buku-badge">${b.kat}</span>
      </div>
    </div>
  `).join('');
}

/* ============= LAYANAN ============= */
let sisaHari = 3;

function showLayanan(jenis, btn) {
  document.querySelectorAll('#layanan .circle-btn').forEach(b => b.classList.remove('active-circle'));
  if (btn) btn.classList.add('active-circle');
  const box = document.getElementById('layananBox');
  if (jenis === 'peminjaman') {
    box.innerHTML = `<div class="layanan-box"><h3>📥 Informasi Peminjaman</h3>
      <div class="info-row"><span class="label">📚 Buku Cerita</span><span class="val">Total 24 | Dipinjam 8 | <b>Tersedia 16</b></span></div>
      <div class="info-row"><span class="label">📘 Buku Pelajaran</span><span class="val">Total 24 | Dipinjam 6 | <b>Tersedia 18</b></span></div>
      <div class="info-row"><span class="label">🦸 Komik</span><span class="val">Total 24 | Dipinjam 4 | <b>Tersedia 20</b></span></div>
      <div class="info-row"><span class="label">⏳ Batas Pinjam</span><span class="val">Maksimal <b>7 hari</b></span></div>
    </div>`;
  }
  if (jenis === 'perpanjangan') {
    box.innerHTML = `<div class="layanan-box"><h3>🔄 Perpanjangan Pinjaman</h3>
      <div class="info-row"><span class="label">Sisa hari saat ini</span><span class="val" id="sisaHariTxt"><b>${sisaHari}</b> hari</span></div>
      <label style="display:block;margin:16px 0 6px;font-weight:700">Tambah berapa hari?</label>
      <input class="layanan-input" type="number" id="tambahHari" min="1" max="7" placeholder="contoh: 3">
      <button class="btn-aksi" onclick="tambahWaktu()">✅ Perpanjang</button>
      <div id="hasilPerpanjang"></div>
    </div>`;
  }
  if (jenis === 'pengembalian') {
    box.innerHTML = `<div class="layanan-box"><h3>📤 Hitung Denda Keterlambatan</h3>
      <p style="color:var(--teks-sub);font-weight:600;margin-bottom:16px">Denda keterlambatan: <b>Rp 1.000 / hari</b></p>
      <label style="display:block;margin-bottom:6px;font-weight:700">Jumlah hari terlambat:</label>
      <input class="layanan-input" type="number" id="hariTelat" min="0" placeholder="contoh: 2" oninput="hitungDenda()">
      <div id="hasilDenda"></div>
    </div>`;
  }
}

function tambahWaktu() {
  const tambah = parseInt(document.getElementById('tambahHari').value);
  if (isNaN(tambah)||tambah<1) { alert('Masukkan jumlah hari yang valid!'); return; }
  sisaHari += tambah;
  document.getElementById('sisaHariTxt').innerHTML = `<b>${sisaHari}</b> hari`;
  document.getElementById('hasilPerpanjang').innerHTML = `<div class="result-text">✅ Berhasil diperpanjang! Sisa waktu: <b>${sisaHari} hari</b></div>`;
}

function hitungDenda() {
  const hari = parseInt(document.getElementById('hariTelat').value)||0;
  const total = hari*1000;
  document.getElementById('hasilDenda').innerHTML = hari>0
    ? `<div class="result-text">⚠️ Terlambat <b>${hari} hari</b> → Total denda: <b>Rp ${total.toLocaleString('id-ID')}</b></div>`
    : '';
}

/* ============= KONTAK TABS ============= */
function switchKontakTab(id, btn) {
  document.querySelectorAll('.diskusi-tab').forEach(t=>t.classList.remove('active'));
  document.querySelectorAll('.diskusi-panel').forEach(p=>p.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('panel-'+id).classList.add('active');
}

/* ============= RUANG DISKUSI (persistent via localStorage) ============= */
function loadChatMessages() {
  const msgs = storeGet('chatMessages') || [];
  const container = document.getElementById('chatMessages');
  // Keep welcome message, add stored
  msgs.forEach(m => appendChatBubble(m.user, m.text, m.time, m.user === currentUser, false));
  scrollChat();
}

function appendChatBubble(user, text, time, isMine, save) {
  const container = document.getElementById('chatMessages');
  const initials = user.charAt(0).toUpperCase();
  const div = document.createElement('div');
  div.className = 'chat-msg' + (isMine ? ' mine' : '');
  div.innerHTML = `
    <div class="chat-avatar">${isMine ? initials : initials}</div>
    <div>
      ${!isMine ? `<div style="font-size:.72rem;font-weight:800;color:var(--hijau);margin-bottom:3px">${escHtml(user)}</div>` : ''}
      <div class="chat-bubble">${escHtml(text)}</div>
      <div class="chat-meta">${time}</div>
    </div>`;
  container.appendChild(div);
  if (save) {
    const msgs = storeGet('chatMessages') || [];
    msgs.push({user, text, time});
    storeSet('chatMessages', msgs);
  }
  scrollChat();
}

function scrollChat() {
  const c = document.getElementById('chatMessages');
  if (c) c.scrollTop = c.scrollHeight;
}

function kirimChat() {
  const input = document.getElementById('chatInput');
  const text = input.value.trim();
  if (!text) return;
  const time = new Date().toLocaleString('id-ID', {dateStyle:'short', timeStyle:'short'});
  appendChatBubble(currentUser, text, time, true, true);
  input.value = '';
}

function updateOnlineCount() {
  // Simulate online users with random small number
  const n = Math.floor(Math.random()*4)+1;
  const el = document.getElementById('onlineCount');
  if (el) el.textContent = `● ${n} online`;
}

function escHtml(s) {
  return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}

/* ============= KOTAK SARAN (persistent) ============= */
let ratingDipilih = '';

function pilihRating(btn, emot, label) {
  document.querySelectorAll('.rating-emot button').forEach(b=>b.classList.remove('selected'));
  btn.classList.add('selected');
  ratingDipilih = emot+' '+label;
}

function loadSaranList() {
  const saranArr = storeGet('saranPublik') || [];
  renderSaranList(saranArr);
}

function renderSaranList(arr) {
  const el = document.getElementById('saranList');
  if (!arr.length) { el.innerHTML = '<p style="color:#AAA;font-weight:600;font-size:.88rem">Belum ada saran yang masuk.</p>'; return; }
  el.innerHTML = arr.map(s => `
    <div class="saran-item">
      <div class="si-head">
        <span class="si-nama">👤 ${escHtml(s.nama)}${s.sosmed?' <span style="color:#AAA;font-weight:600;font-size:.8rem">('+escHtml(s.sosmed)+')</span>':''}</span>
        <span class="si-rating">${s.rating}</span>
      </div>
      <div class="si-pesan">${escHtml(s.pesan)}</div>
      <div class="si-tgl">🕐 ${s.waktu}</div>
    </div>
  `).join('');
}

function kirimSaran() {
  const nama = document.getElementById('saran-nama').value.trim();
  const sosmed = document.getElementById('saran-sosmed').value.trim();
  const pesan = document.getElementById('saran-pesan').value.trim();
  if (!nama||!pesan) { alert('⚠️ Harap isi nama dan pesan!'); return; }
  if (!ratingDipilih) { alert('⚠️ Harap pilih rating!'); return; }
  const waktu = new Date().toLocaleString('id-ID', {dateStyle:'long', timeStyle:'short'});
  const entry = {nama, sosmed, pesan, rating:ratingDipilih, waktu};

  // Save to localStorage
  const arr = storeGet('saranPublik') || [];
  arr.unshift(entry); // newest first
  storeSet('saranPublik', arr);
  renderSaranList(arr);

  const kotak = document.getElementById('saranTerkirim');
  kotak.style.display = 'block';
  kotak.innerHTML = `<div style="font-size:1.3rem;margin-bottom:6px">✅ Terima kasih! Saran kamu sudah tersimpan.</div>`;
  document.getElementById('saran-nama').value = '';
  document.getElementById('saran-sosmed').value = '';
  document.getElementById('saran-pesan').value = '';
  document.querySelectorAll('.rating-emot button').forEach(b=>b.classList.remove('selected'));
  ratingDipilih = '';
  setTimeout(()=>{ kotak.style.display='none'; }, 3000);
}

/* ============= GAME ============= */
let skor = 0;
function tambahSkor() { skor++; document.getElementById('skorTotal').textContent = skor; }
function setHasil(elId, benar) {
  const el = document.getElementById(elId);
  el.textContent = benar ? '🎉 Benar! Skor bertambah!' : '❌ Salah, coba lagi!';
  el.className = 'hasil-game '+(benar?'benar':'salah');
}

// KALKULATOR
function hitung(op) {
  const a = parseFloat(document.getElementById('angka1').value);
  const b = parseFloat(document.getElementById('angka2').value);
  const el = document.getElementById('hasilKalkulator');
  if (isNaN(a)||isNaN(b)) { el.textContent='⚠️ Isi kedua angka!'; el.className='hasil-game salah'; return; }
  let h; if(op==='+')h=a+b; else if(op==='-')h=a-b; else if(op==='*')h=a*b; else h=b!==0?(a/b):'Tidak bisa dibagi 0!';
  el.textContent = 'Hasil: '+h; el.className='hasil-game benar';
}

// MATEMATIKA
let aMath,bMath,opMath;
const ops=['+','-','×'];
function soalBaruMath() {
  aMath=Math.floor(Math.random()*10)+1; bMath=Math.floor(Math.random()*10)+1;
  opMath=ops[Math.floor(Math.random()*ops.length)];
  document.getElementById('soalMath').textContent=`${aMath} ${opMath} ${bMath} = ?`;
  document.getElementById('jawabanMath').value='';
  document.getElementById('hasilMath').textContent=''; document.getElementById('hasilMath').className='hasil-game';
}
function jawabanBenarMath() { if(opMath==='+')return aMath+bMath; if(opMath==='-')return aMath-bMath; return aMath*bMath; }
function cekMath() { const j=parseInt(document.getElementById('jawabanMath').value); const ok=j===jawabanBenarMath(); setHasil('hasilMath',ok); if(ok){tambahSkor();setTimeout(soalBaruMath,1000);} }

// BAHASA INDONESIA
const soalBI_data=[
  {singkat:'mkn',lengkap:'makan'},{singkat:'bljr',lengkap:'belajar'},{singkat:'mnm',lengkap:'minum'},
  {singkat:'bku',lengkap:'buku'},{singkat:'sklh',lengkap:'sekolah'},{singkat:'jln',lengkap:'jalan'},
  {singkat:'tmn',lengkap:'teman'},{singkat:'rmh',lengkap:'rumah'},{singkat:'mmbca',lengkap:'membaca'},
  {singkat:'mnls',lengkap:'menulis'},{singkat:'pljrn',lengkap:'pelajaran'},{singkat:'grk',lengkap:'gerak'},
];
let iBI=0;
function soalBaruBI() {
  iBI=Math.floor(Math.random()*soalBI_data.length);
  document.getElementById('soalBI').textContent=soalBI_data[iBI].singkat;
  document.getElementById('jawabanBI').value=''; document.getElementById('hasilBI').textContent=''; document.getElementById('hasilBI').className='hasil-game';
}
function cekBI() { const j=document.getElementById('jawabanBI').value.trim().toLowerCase(); const ok=j===soalBI_data[iBI].lengkap; setHasil('hasilBI',ok); if(ok){tambahSkor();setTimeout(soalBaruBI,1000);} }

// AGAMA
const soalAgama_data=[
  {soal:'Siapa nabi terakhir dalam Islam?',jawab:'muhammad'},{soal:'Kitab suci umat Islam adalah?',jawab:'alquran'},
  {soal:'Berapa jumlah rukun Islam?',jawab:'5'},{soal:'Hari raya umat Islam setelah puasa Ramadan?',jawab:'idul fitri'},
  {soal:'Siapa malaikat yang menyampaikan wahyu?',jawab:'jibril'},{soal:'Berapa jumlah rukun iman?',jawab:'6'},
  {soal:'Bulan puasa umat Islam dinamakan?',jawab:'ramadan'},{soal:'Tempat ibadah umat Islam disebut?',jawab:'masjid'},
];
let iAgama=0;
function soalBaruAgama() {
  iAgama=Math.floor(Math.random()*soalAgama_data.length);
  document.getElementById('soalAgama').textContent=soalAgama_data[iAgama].soal;
  document.getElementById('jawabanAgama').value=''; document.getElementById('hasilAgama').textContent=''; document.getElementById('hasilAgama').className='hasil-game';
}
function cekAgama() { const j=document.getElementById('jawabanAgama').value.trim().toLowerCase(); const ok=j.includes(soalAgama_data[iAgama].jawab); setHasil('hasilAgama',ok); if(ok){tambahSkor();setTimeout(soalBaruAgama,1000);} }

// IPA PILIHAN GANDA
const soalIPA_data=[
  {soal:'Proses tumbuhan membuat makanan disebut?',opsi:['Fotosintesis','Respirasi','Evaporasi','Fermentasi'],jawab:0},
  {soal:'Planet terbesar di tata surya adalah?',opsi:['Saturnus','Jupiter','Uranus','Neptunus'],jawab:1},
  {soal:'Organ pernapasan manusia adalah?',opsi:['Jantung','Hati','Paru-paru','Ginjal'],jawab:2},
  {soal:'Hewan yang mengalami metamorfosis sempurna?',opsi:['Kecoak','Belalang','Kupu-kupu','Capung'],jawab:2},
  {soal:'Zat yang diperlukan tumbuhan untuk fotosintesis?',opsi:['O₂ dan air','CO₂ dan cahaya','CO₂, air, dan cahaya','Gula dan air'],jawab:2},
  {soal:'Benda padat berubah menjadi cair disebut?',opsi:['Membeku','Mencair','Menguap','Mengembun'],jawab:1},
  {soal:'Gaya yang dihasilkan magnet disebut?',opsi:['Gaya gesek','Gaya magnet','Gaya gravitasi','Gaya pegas'],jawab:1},
];
let iIPA=0;
function soalBaruIPA() {
  iIPA=Math.floor(Math.random()*soalIPA_data.length);
  const s=soalIPA_data[iIPA];
  document.getElementById('soalIPA').textContent=s.soal;
  document.getElementById('hasilIPA').textContent=''; document.getElementById('hasilIPA').className='hasil-game';
  const opsiEl=document.getElementById('opsiIPA');
  opsiEl.innerHTML=s.opsi.map((o,i)=>`<button class="opt-btn" onclick="cekIPA(this,${i})">${o}</button>`).join('');
}
function cekIPA(btn, idx) {
  const ok=idx===soalIPA_data[iIPA].jawab;
  document.querySelectorAll('#opsiIPA .opt-btn').forEach((b,i)=>{
    if(i===soalIPA_data[iIPA].jawab) b.classList.add('benar-opt');
    else if(i===idx&&!ok) b.classList.add('salah-opt');
    b.disabled=true;
  });
  setHasil('hasilIPA',ok); if(ok){tambahSkor();setTimeout(soalBaruIPA,1500);}
}

// IPS
const soalIPS_data=[
  {soal:'Ibu kota Indonesia adalah?',jawab:'jakarta'},{soal:'Suku terbesar di Indonesia adalah?',jawab:'jawa'},
  {soal:'Gunung tertinggi di Indonesia adalah?',jawab:'puncak jaya'},{soal:'Danau terbesar di Indonesia adalah?',jawab:'danau toba'},
  {soal:'Presiden pertama Indonesia adalah?',jawab:'soekarno'},{soal:'Bendera Indonesia terdiri dari warna apa?',jawab:'merah putih'},
  {soal:'Hari kemerdekaan Indonesia diperingati tiap tanggal berapa?',jawab:'17 agustus'},
  {soal:'Mata uang Indonesia adalah?',jawab:'rupiah'},
];
let iIPS=0;
function soalBaruIPS() {
  iIPS=Math.floor(Math.random()*soalIPS_data.length);
  document.getElementById('soalIPS').textContent=soalIPS_data[iIPS].soal;
  document.getElementById('jawabanIPS').value=''; document.getElementById('hasilIPS').textContent=''; document.getElementById('hasilIPS').className='hasil-game';
}
function cekIPS() { const j=document.getElementById('jawabanIPS').value.trim().toLowerCase(); const ok=j.includes(soalIPS_data[iIPS].jawab); setHasil('hasilIPS',ok); if(ok){tambahSkor();setTimeout(soalBaruIPS,1000);} }

// TEBAK KATA
const tebakKata_data=[
  {def:'Tempat orang menyimpan dan meminjam buku.',jawab:'perpustakaan'},
  {def:'Orang yang mengajar di sekolah.',jawab:'guru'},
  {def:'Benda yang digunakan untuk menulis.',jawab:'pensil'},
  {def:'Tempat anak-anak belajar setiap hari.',jawab:'sekolah'},
  {def:'Buku yang berisi gambar dan cerita bergambar.',jawab:'komik'},
  {def:'Kegiatan membaca yang dilakukan setiap hari.',jawab:'literasi'},
  {def:'Alat untuk menghitung angka.',jawab:'kalkulator'},
  {def:'Orang yang menulis buku.',jawab:'penulis'},
];
let iTK=0;
function soalBaruTebakKata() {
  iTK=Math.floor(Math.random()*tebakKata_data.length);
  document.getElementById('soalTebakKata').textContent=tebakKata_data[iTK].def;
  document.getElementById('jawabanTebakKata').value=''; document.getElementById('hasilTebakKata').textContent=''; document.getElementById('hasilTebakKata').className='hasil-game';
}
function cekTebakKata() { const j=document.getElementById('jawabanTebakKata').value.trim().toLowerCase(); const ok=j===tebakKata_data[iTK].jawab; setHasil('hasilTebakKata',ok); if(ok){tambahSkor();setTimeout(soalBaruTebakKata,1000);} }

// TEBAK EMOJI
const emoji_data=[
  {emoji:'🌧️🌈',jawab:'hujan pelangi'},{emoji:'🌊🏄',jawab:'surfing'},{emoji:'📚✏️',jawab:'belajar'},
  {emoji:'🌙⭐',jawab:'malam'},{emoji:'🍎🌳',jawab:'pohon apel'},{emoji:'🐟🌊',jawab:'ikan laut'},
  {emoji:'🦋🌸',jawab:'kupu kupu bunga'},{emoji:'🚀🌙',jawab:'roket bulan'},{emoji:'🎨🖌️',jawab:'melukis'},
  {emoji:'🏊💦',jawab:'berenang'},{emoji:'⚽🏟️',jawab:'sepak bola'},{emoji:'🎵🎤',jawab:'menyanyi'},
];
let iEmoji=0;
function soalBaruEmoji() {
  iEmoji=Math.floor(Math.random()*emoji_data.length);
  document.getElementById('soalEmoji').textContent=emoji_data[iEmoji].emoji;
  document.getElementById('jawabanEmoji').value=''; document.getElementById('hasilEmoji').textContent=''; document.getElementById('hasilEmoji').className='hasil-game';
}
function cekEmoji() {
  const j=document.getElementById('jawabanEmoji').value.trim().toLowerCase();
  const jawaban=emoji_data[iEmoji].jawab;
  const words=jawaban.split(' ');
  const ok=words.some(w=>j.includes(w));
  setHasil('hasilEmoji',ok); if(ok){tambahSkor();setTimeout(soalBaruEmoji,1000);}
}
</script>
</body>
</html>
