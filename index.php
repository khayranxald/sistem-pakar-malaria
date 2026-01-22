<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Sistem Diagnosa Malaria</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
  :root{
    /* Medical Blue & Teal Theme */
    --primary: #0EA5E9;
    --secondary: #06B6D4;
    --accent: #14B8A6;
    --dark: #0F172A;
    --text: #334155;
    --white: #ffffff;
    --gradient: linear-gradient(135deg, #0EA5E9 0%, #06B6D4 100%);
    --sidebar-w: 280px;
  }

  /* Base Styles */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  
  body {
    font-family: 'Poppins', sans-serif;
    color: var(--text);
    background: linear-gradient(135deg, #0EA5E9 0%, #06B6D4 100%);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    position: relative;
    overflow-x: hidden;
  }

  /* Animated background */
  body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
      radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
      radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
      radial-gradient(circle at 40% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
    animation: float 20s ease-in-out infinite;
    pointer-events: none;
    z-index: 0;
  }

  @keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(10px, -10px) rotate(1deg); }
    50% { transform: translate(-10px, 10px) rotate(-1deg); }
    75% { transform: translate(10px, 10px) rotate(0.5deg); }
  }

  /* Layout */
  .app {
    display: flex;
    min-height: 100vh;
    gap: 28px;
    align-items: stretch;
    padding: 24px;
    position: relative;
    z-index: 1;
  }

  /* SIDEBAR - White Background */
  .sidebar {
    width: var(--sidebar-w);
    min-width: 180px;
    max-width: 420px;
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(20px);
    color: var(--text);
    padding: 28px 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    border-radius: 24px;
    position: relative;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
    gap: 16px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    animation: slideInLeft 0.6s ease-out;
  }

  @keyframes slideInLeft {
    from {
      opacity: 0;
      transform: translateX(-50px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  .sidebar.collapsed {
    width: 80px !important;
    padding-left: 14px;
    padding-right: 14px;
  }

  /* Brand */
  .brand {
    display: flex;
    align-items: center;
    gap: 14px;
    font-weight: 800;
    font-size: 19px;
    padding-bottom: 18px;
    border-bottom: 2px solid rgba(14, 165, 233, 0.1);
    transition: all 0.3s ease;
    color: var(--dark);
  }

  .brand .logo {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--gradient);
    border-radius: 14px;
    font-size: 24px;
    box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
    transition: all 0.3s ease;
  }

  .brand .logo:hover {
    transform: scale(1.1) rotate(5deg);
  }

  /* Menu */
  .menu {
    margin-top: 16px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    flex: 1;
  }

  .menu a {
    display: flex;
    align-items: center;
    gap: 14px;
    color: var(--text);
    padding: 14px 16px;
    border-radius: 14px;
    text-decoration: none;
    font-weight: 600;
    font-size: 15px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
  }

  .menu a::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: var(--gradient);
    transform: scaleY(0);
    transition: transform 0.3s ease;
    border-radius: 0 4px 4px 0;
  }

  .menu a .icon {
    font-size: 22px;
    opacity: 0.7;
    transition: all 0.3s ease;
    color: var(--primary);
  }

  .menu a:hover {
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.1), rgba(6, 182, 212, 0.1));
    color: var(--primary);
    transform: translateX(6px);
  }

  .menu a:hover::before {
    transform: scaleY(1);
  }

  .menu a:hover .icon {
    transform: scale(1.1);
    opacity: 1;
  }

  .menu a.active {
    background: var(--gradient);
    color: var(--white);
    box-shadow: 0 8px 20px rgba(14, 165, 233, 0.3);
  }

  .menu a.active .icon {
    color: var(--white);
    opacity: 1;
  }

  /* Toggle Button */
  .toggle-btn {
    margin-top: auto;
    padding-top: 18px;
    border-top: 2px solid rgba(14, 165, 233, 0.1);
  }

  .toggle-btn button {
    width: 100%;
    background: var(--gradient);
    color: var(--white);
    border: none;
    padding: 12px 16px;
    border-radius: 14px;
    cursor: pointer;
    font-weight: 700;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);
  }

  .toggle-btn button:hover {
    transform: scale(1.02);
    box-shadow: 0 6px 20px rgba(14, 165, 233, 0.4);
  }

  /* Resizer */
  .resizer {
    position: absolute;
    right: -12px;
    top: 40px;
    bottom: 40px;
    width: 20px;
    cursor: ew-resize;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .sidebar:hover .resizer {
    opacity: 1;
  }

  .resizer .bar {
    width: 4px;
    height: 50px;
    background: rgba(14, 165, 233, 0.3);
    border-radius: 4px;
    transition: all 0.3s ease;
  }

  .resizer:hover .bar {
    background: var(--gradient);
    height: 70px;
    box-shadow: 0 0 15px rgba(14, 165, 233, 0.6);
  }

  /* Content */
  .content {
    flex: 1;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* Hero Card */
  .hero-card {
    width: 100%;
    max-width: 1200px;
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(20px);
    padding: 60px;
    border-radius: 32px;
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
    display: flex;
    gap: 50px;
    align-items: center;
    border: 1px solid rgba(255, 255, 255, 0.3);
    animation: scaleIn 0.8s ease-out;
    transition: all 0.3s ease;
  }

  @keyframes scaleIn {
    from {
      opacity: 0;
      transform: scale(0.9) translateY(30px);
    }
    to {
      opacity: 1;
      transform: scale(1) translateY(0);
    }
  }

  .hero-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 40px 100px rgba(0, 0, 0, 0.25);
  }

  /* Hero Left */
  .hero-left {
    flex: 1;
  }

  .hero-title {
    font-size: 52px;
    font-weight: 800;
    background: var(--gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    line-height: 1.1;
    margin: 0 0 24px 0;
    letter-spacing: -0.5px;
  }

  #animated-text {
    display: inline-block;
    min-height: 62px;
  }

  /* Cursor blink - hanya saat mengetik */
  #animated-text.typing::after {
    content: '';
    display: inline-block;
    width: 4px;
    height: 1em;
    background: #0EA5E9;
    margin-left: 4px;
    vertical-align: middle;
    animation: blink 0.8s step-end infinite;
  }

  @keyframes blink {
    50% { opacity: 0; }
  }

  .hero-desc {
    color: var(--text);
    margin-bottom: 32px;
    line-height: 1.8;
    font-size: 17px;
    font-weight: 400;
  }

  .hero-desc b {
    color: var(--primary);
    font-weight: 700;
  }

  .hero-desc i {
    color: var(--secondary);
  }

  /* Button */
  .btn-start {
    background: var(--gradient);
    color: var(--white);
    border: none;
    padding: 16px 40px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 17px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 30px rgba(14, 165, 233, 0.4);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
  }

  .btn-start::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
  }

  .btn-start:hover::before {
    left: 100%;
  }

  .btn-start:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 40px rgba(14, 165, 233, 0.5);
  }

  .btn-start:active {
    transform: translateY(-2px);
  }

  /* Hero Image */
  .hero-img {
    flex: 0 0 450px;
    text-align: center;
    position: relative;
  }

  .hero-img::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 120%;
    height: 120%;
    background: radial-gradient(circle, rgba(14, 165, 233, 0.1) 0%, transparent 70%);
    transform: translate(-50%, -50%);
    border-radius: 50%;
    animation: pulse 3s ease-in-out infinite;
  }

  @keyframes pulse {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
    50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.3; }
  }

  .hero-img img {
    width: 100%;
    max-width: 450px;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    animation: floatImg 4s ease-in-out infinite;
    position: relative;
    z-index: 1;
  }

  @keyframes floatImg {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
  }

  /* Collapsed State */
  .sidebar.collapsed .menu a span.text { display: none; }
  .sidebar.collapsed .brand span.brand-text { display: none; }
  .sidebar.collapsed .toggle-btn button { padding: 10px; font-size: 12px; }

  /* Responsive */
  @media (max-width: 992px) {
    .app {
      flex-direction: column;
      padding: 16px;
      gap: 20px;
    }
    
    .sidebar {
      width: 100%;
      flex-direction: row;
      align-items: center;
      padding: 16px;
      border-radius: 20px;
    }
    
    .sidebar.collapsed { width: 100%; }
    
    .menu {
      flex-direction: row;
      flex: 1;
      margin-left: 20px;
    }
    
    .resizer { display: none; }
    
    .content { padding: 16px; }
    
    .hero-card {
      flex-direction: column;
      padding: 40px 30px;
      gap: 30px;
    }
    
    .hero-img {
      order: -1;
      flex: 0 0 auto;
      margin-bottom: 20px;
    }
    
    .hero-title { font-size: 36px; }
    
    .btn-start {
      width: 100%;
      justify-content: center;
    }
  }

  @media (max-width: 576px) {
    .hero-card {
      padding: 30px 20px;
    }
    
    .hero-title {
      font-size: 28px;
    }
    
    #animated-text {
      min-height: 42px;
    }
    
    .hero-desc {
      font-size: 15px;
    }
  }
</style>
</head>
<body>

<!-- WRAPPER UTAMA APLIKASI -->
<div class="app">

  <!-- ================= SIDEBAR ================= -->
  <aside id="sidebar" class="sidebar" role="navigation" aria-label="Sidebar utama">

    <!-- BRAND / LOGO APLIKASI -->
    <div class="brand">
      <!-- Ikon logo (emoji nyamuk sebagai simbol malaria) -->
      <div class="logo">🦟</div>
      <!-- Nama sistem -->
      <span class="brand-text">Sistem Diagnosa</span>
    </div>

    <!-- MENU NAVIGASI -->
    <nav class="menu" aria-label="Menu utama">
      <!-- Menu Dashboard -->
      <a href="#" class="active" title="Dashboard">
        <i class="ri-home-5-fill icon"></i>
        <span class="text">Dashboard</span>
      </a>

      <!-- Menu Gejala -->
      <a href="gejala.php" title="Gejala">
        <i class="ri-mental-health-line icon"></i>
        <span class="text">Gejala</span>
      </a>

      <!-- Menu Penyakit -->
      <a href="./infopenyakit/infopenyakit.php" title="Penyakit">
        <i class="ri-virus-line icon"></i>
        <span class="text">Penyakit</span>
      </a>

      <!-- Menu Tentang Kami -->
      <a href="./tentang/tentang.php" title="Tentang Kami">
        <i class="ri-virus-line icon"></i>
        <span class="text">Tentang kami</span>
      </a>
    </nav>

    <!-- TOMBOL COLLAPSE / EXPAND SIDEBAR -->
    <div class="toggle-btn">
      <button id="collapseBtn" aria-expanded="true" title="Tutup/Buka sidebar">
        ⟨ Collapse
      </button>
    </div>

    <!-- RESIZER UNTUK MENGUBAH LEBAR SIDEBAR DENGAN DRAG -->
    <div class="resizer" id="resizer" title="Tarik untuk ubah lebar sidebar">
      <div class="bar"></div>
    </div>
  </aside>
  <!-- =============== END SIDEBAR =============== -->

  <!-- ================= CONTENT ================= -->
  <main class="content">

    <!-- HERO SECTION -->
    <section class="hero-card" aria-labelledby="hero-heading">

      <!-- BAGIAN KIRI HERO -->
      <div class="hero-left">

        <!-- JUDUL DENGAN EFEK TYPING -->
        <h1 id="hero-heading" class="hero-title">
          <span id="animated-text" class="typing"></span>
        </h1>

        <!-- DESKRIPSI SINGKAT TENTANG MALARIA -->
        <p class="hero-desc">
          Malaria adalah penyakit menular yang disebabkan oleh parasit 
          <b>Plasmodium</b> dan ditularkan melalui gigitan nyamuk 
          <i>Anopheles</i> yang terinfeksi. Diagnosis cepat sangat penting 
          untuk mencegah komplikasi serius.
        </p>

        <!-- TOMBOL MULAI KONSULTASI -->
        <a href="./diagnosis/input_gejala.php" class="btn-start">
          <i class="ri-stethoscope-line"></i>
          Mulai Konsultasi
        </a>
      </div>

      <!-- GAMBAR ILUSTRASI -->
      <div class="hero-img">
        <img src="./images/01.png" alt="Dokter ilustrasi diagnosa malaria">
      </div>

    </section>
  </main>
  <!-- =============== END CONTENT =============== -->
</div>

<!-- ================= JAVASCRIPT ================= -->
<script>
/* =================================================
   ANIMATED TYPING TEXT
   Menampilkan teks judul dengan efek mengetik
   hanya sekali saat halaman dimuat
================================================= */
(function () {
  const text = "DIAGNOSA PENYAKIT MALARIA"; // Teks yang akan ditampilkan
  const el = document.getElementById("animated-text"); // Elemen target
  let idx = 0; // Index karakter

  function tick() {
    // Menampilkan teks bertahap
    if (idx <= text.length) {
      el.textContent = text.slice(0, idx);
      idx++;
      setTimeout(tick, 80); // Kecepatan typing
    } else {
      // Menghapus efek cursor setelah selesai
      el.classList.remove('typing');
    }
  }

  tick(); // Memulai animasi
})();

/* =================================================
   SIDEBAR COLLAPSE / EXPAND
   Mengatur buka-tutup sidebar
================================================= */
(function(){
  const sidebar = document.getElementById('sidebar');
  const btn = document.getElementById('collapseBtn');
  let collapsed = false;

  btn.addEventListener('click', () => {
    collapsed = !collapsed;
    sidebar.classList.toggle('collapsed', collapsed);
    btn.innerHTML = collapsed ? '⟩ Expand' : '⟨ Collapse';
    btn.setAttribute('aria-expanded', (!collapsed).toString());
  });
})();

/* =================================================
   DRAG TO RESIZE SIDEBAR
   Mengubah lebar sidebar dengan drag mouse
================================================= */
(function(){
  const resizer = document.getElementById('resizer');
  const sidebar = document.getElementById('sidebar');
  let startX, startWidth;
  let dragging = false;

  // Sidebar hanya bisa di-drag di layar besar
  function isDraggable(){ 
    return window.innerWidth > 992; 
  }

  // Mouse ditekan
  resizer.addEventListener('mousedown', (e)=>{
    if (!isDraggable()) return;
    dragging = true;
    startX = e.clientX;
    startWidth = sidebar.getBoundingClientRect().width;
    document.body.style.userSelect = 'none';
  });

  // Mouse digeser
  window.addEventListener('mousemove', (e)=>{
    if (!dragging) return;
    const dx = e.clientX - startX;
    let newWidth = startWidth + dx;
    newWidth = Math.max(180, Math.min(420, newWidth)); // Batas lebar
    sidebar.style.width = newWidth + 'px';
  });

  // Mouse dilepas
  window.addEventListener('mouseup', ()=>{
    dragging = false;
    document.body.style.userSelect = '';
  });
})();

/* =================================================
   ACTIVE MENU HIGHLIGHT
   Menandai menu yang sedang aktif
================================================= */
(function() {
  const menuLinks = document.querySelectorAll('.menu a');
  const currentPath = window.location.pathname;

  menuLinks.forEach(link => {
    if (
      link.getAttribute('href') === currentPath || 
      (currentPath.includes(link.getAttribute('href')) && link.getAttribute('href') !== '#')
    ) {
      link.classList.add('active');
    }
  });
})();
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>