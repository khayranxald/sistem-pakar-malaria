<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tentang Kami | Diagnosa Malaria</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<style>
/* ================== GLOBAL STYLES ================== */
:root {
    --primary: #2a6fa1;
    --secondary: #1fa2b8;
    --accent: #7f5cff;
    --light: #f8f9fa;
    --dark: #1a1a2e;
    --gradient: linear-gradient(135deg, #2a6fa1, #1fa2b8);
    --gradient-dark: linear-gradient(135deg, #1a1a2e, #16213e);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    min-height: 100vh;
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #fff;
    overflow-x: hidden;
}

/* Background animation */
.bg-animation {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    overflow: hidden;
}

.bg-animation div {
    position: absolute;
    border-radius: 50%;
    animation: float 15s infinite linear;
}

.bg-animation div:nth-child(1) {
    width: 80px;
    height: 80px;
    background: rgba(42, 111, 161, 0.2);
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.bg-animation div:nth-child(2) {
    width: 120px;
    height: 120px;
    background: rgba(31, 162, 184, 0.15);
    top: 70%;
    left: 80%;
    animation-delay: -3s;
}

.bg-animation div:nth-child(3) {
    width: 60px;
    height: 60px;
    background: rgba(127, 92, 255, 0.1);
    top: 30%;
    left: 85%;
    animation-delay: -5s;
}

.bg-animation div:nth-child(4) {
    width: 100px;
    height: 100px;
    background: rgba(255, 217, 102, 0.1);
    top: 85%;
    left: 15%;
    animation-delay: -7s;
}

.bg-animation div:nth-child(5) {
    width: 90px;
    height: 90px;
    background: rgba(42, 111, 161, 0.1);
    top: 15%;
    left: 70%;
    animation-delay: -10s;
}

@keyframes float {
    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 0.7;
    }
    50% {
        transform: translateY(-40px) rotate(180deg);
        opacity: 0.3;
    }
    100% {
        transform: translateY(0) rotate(360deg);
        opacity: 0.7;
    }
}

/* ================== NAVBAR ================== */
.navbar {
    background: rgba(26, 26, 46, 0.95);
    backdrop-filter: blur(10px);
    padding: 15px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.navbar.scrolled {
    padding: 10px 0;
    background: rgba(26, 26, 46, 0.98);
}

.navbar-brand {
    font-weight: 700;
    font-size: 1.5rem;
    background: linear-gradient(90deg, #3ec6ff, #7f5cff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    display: flex;
    align-items: center;
}

.navbar-brand i {
    margin-right: 10px;
    font-size: 1.8rem;
}

.nav-link {
    color: #fff !important;
    font-weight: 500;
    margin: 0 8px;
    padding: 8px 16px !important;
    border-radius: 20px;
    transition: all 0.3s ease;
}

.nav-link:hover {
    background: rgba(63, 198, 255, 0.1);
    transform: translateY(-2px);
}

.nav-link.active {
    background: var(--gradient);
    color: white !important;
}

/* ================== MAIN CONTENT ================== */
.main-content {
    margin-top: 100px;
    margin-bottom: 80px;
}

/* Header Section */
.header-section {
    text-align: center;
    margin-bottom: 50px;
    position: relative;
}

.header-title {
    font-size: 3.5rem;
    font-weight: 800;
    background: linear-gradient(90deg, #3ec6ff, #7f5cff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 20px;
    text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.header-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.7);
    max-width: 700px;
    margin: 0 auto 30px;
    line-height: 1.6;
}

/* Mission Card */
.mission-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 40px;
    margin-bottom: 60px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
}

.mission-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.mission-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--gradient);
}

.mission-icon {
    font-size: 3rem;
    margin-bottom: 20px;
    background: var(--gradient);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.mission-title {
    font-size: 1.8rem;
    margin-bottom: 20px;
    font-weight: 700;
}

.mission-text {
    font-size: 1.1rem;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.8);
}

/* Team Section */
.team-section-title {
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 50px;
    font-weight: 700;
    position: relative;
    display: inline-block;
    left: 50%;
    transform: translateX(-50%);
}

.team-section-title::after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--gradient);
    border-radius: 3px;
}

.team-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 30px 20px;
    text-align: center;
    transition: all 0.4s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
    height: 100%;
    position: relative;
    overflow: hidden;
    margin-bottom: 30px;
}

.team-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    border-color: rgba(63, 198, 255, 0.3);
}

.team-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--gradient);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.team-card:hover::before {
    transform: scaleX(1);
}

.team-img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto 20px;
    border: 5px solid transparent;
    background: linear-gradient(white, white) padding-box, 
                linear-gradient(135deg, #3ec6ff, #7f5cff) border-box;
    transition: all 0.4s ease;
}

.team-card:hover .team-img {
    transform: scale(1.05);
}

.team-name {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.team-role {
    display: inline-block;
    background: var(--gradient);
    color: white;
    padding: 6px 20px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 15px;
    letter-spacing: 0.5px;
}

.team-desc {
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.6;
    margin-bottom: 20px;
}

.team-social {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 15px;
}

.team-social a {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.team-social a:hover {
    background: var(--gradient);
    transform: translateY(-3px);
}

/* Stats Section */
.stats-section {
    margin: 80px 0;
    padding: 60px 0;
    background: rgba(0, 0, 0, 0.2);
    border-radius: 30px;
    position: relative;
    overflow: hidden;
}

.stats-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=10');
    background-size: cover;
    background-position: center;
    opacity: 0.1;
    z-index: -1;
}

.stat-item {
    text-align: center;
    padding: 20px;
}

.stat-number {
    font-size: 3.5rem;
    font-weight: 800;
    background: linear-gradient(90deg, #3ec6ff, #7f5cff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 10px;
    line-height: 1;
}

.stat-text {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

/* ================== FOOTER ================== */
.footer {
    background: rgba(0, 0, 0, 0.3);
    padding: 40px 0 20px;
    text-align: center;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
}

.footer::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--gradient);
}

.footer-content {
    margin-bottom: 30px;
}

.footer-logo {
    font-size: 1.8rem;
    font-weight: 700;
    background: linear-gradient(90deg, #3ec6ff, #7f5cff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 20px;
    display: inline-block;
}

.footer-text {
    color: rgba(255, 255, 255, 0.7);
    font-size: 1rem;
    max-width: 600px;
    margin: 0 auto 20px;
    line-height: 1.6;
}

.footer-social {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
}

.footer-social a {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    transition: all 0.3s ease;
}

.footer-social a:hover {
    background: var(--gradient);
    transform: translateY(-5px);
}

.copyright {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.9rem;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.highlight {
    color: #ffd966;
    font-weight: 600;
}

/* ================== RESPONSIVE ================== */
@media (max-width: 992px) {
    .header-title {
        font-size: 2.8rem;
    }
    
    .team-section-title {
        font-size: 2.2rem;
    }
    
    .stat-number {
        font-size: 2.8rem;
    }
}

@media (max-width: 768px) {
    .header-title {
        font-size: 2.3rem;
    }
    
    .mission-card {
        padding: 30px 20px;
    }
    
    .team-card {
        margin-bottom: 30px;
    }
    
    .navbar-brand {
        font-size: 1.3rem;
    }
}

@media (max-width: 576px) {
    .header-title {
        font-size: 2rem;
    }
    
    .team-section-title {
        font-size: 1.8rem;
    }
    
    .mission-title {
        font-size: 1.5rem;
    }
    
    .team-name {
        font-size: 1.3rem;
    }
}
</style>
</head>

<body>

<!-- Background Animation -->
<div class="bg-animation">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <i class="fas fa-stethoscope"></i> Diagnosa Malaria
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="tentang.html">TENTANG KAMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DIAGNOSA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">KONTAK</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container main-content">
    <!-- Header Section -->
    <div class="header-section animate__animated animate__fadeIn">
        <h1 class="header-title">Tentang Kami</h1>
        <p class="header-subtitle">
            Kami adalah tim yang berkomitmen membantu masyarakat dalam mendiagnosis 
            penyakit malaria melalui sistem pakar berbasis web yang modern, akurat, dan mudah digunakan.
        </p>
    </div>

    <!-- Mission Card -->
    <div class="mission-card animate__animated animate__fadeInUp">
        <div class="text-center">
            <div class="mission-icon">
                <i class="fas fa-heartbeat"></i>
            </div>
            <h2 class="mission-title">Misi Kami</h2>
            <p class="mission-text">
                Misi kami adalah mengurangi penyebaran penyakit malaria dengan menyediakan alat diagnosa 
                yang cepat dan akurat kepada masyarakat luas. Kami menggabungkan teknologi kecerdasan buatan 
                dengan pengetahuan medis terbaru untuk membantu identifikasi gejala malaria sejak dini, 
                sehingga pengobatan dapat dilakukan dengan tepat waktu.
            </p>
        </div>
    </div>

    <!-- Team Section -->
    <h2 class="team-section-title animate__animated animate__fadeIn">Tim Kami</h2>
    
    <div class="row g-4">
        <!-- Team Member 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="team-card animate__animated animate__fadeInLeft">
                <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                     alt="Khayran" class="team-img">
                <h3 class="team-name">Khayran</h3>
                <div class="team-role">Ahli Kesehatan</div>
                <p class="team-desc">
                    Spesialis penyakit tropis dengan pengalaman lebih dari 10 tahun dalam penelitian malaria 
                    dan pencegahan penyakit menular.
                </p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <!-- Team Member 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="team-card animate__animated animate__fadeInUp">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                     alt="Andi Ahmad Zulkifli" class="team-img">
                <h3 class="team-name">Andi Ahmad Zulkifli</h3>
                <div class="team-role">Web Developer</div>
                <p class="team-desc">
                    Full-stack developer dengan spesialisasi dalam sistem pakar dan kecerdasan buatan, 
                    bertanggung jawab atas pengembangan platform ini.
                </p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <!-- Team Member 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="team-card animate__animated animate__fadeInRight">
                <img src="3.jpg" 
                     alt="Syahwania" class="team-img">
                <h3 class="team-name">Syahwania</h3>
                <div class="team-role">Peneliti Penyakit</div>
                <p class="team-desc">
                    Peneliti dengan fokus pada epidemiologi penyakit tropis, telah menerbitkan berbagai 
                    penelitian tentang pencegahan dan pengobatan malaria.
                </p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-researchgate"></i></a>
                    <a href="#"><i class="fas fa-graduation-cap"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section animate__animated animate__fadeIn">
        <div class="row text-center">
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number" data-count="1000">0</div>
                    <div class="stat-text">Diagnosa Berhasil</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number" data-count="98">0</div>
                    <div class="stat-text">Akurasi Sistem</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number" data-count="24">0</div>
                    <div class="stat-text">Jam Operasional</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number" data-count="3">0</div>
                    <div class="stat-text">Ahli Medis</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">
                <i class="fas fa-stethoscope"></i> Diagnosa Malaria
            </div>
            <p class="footer-text">
                Sistem pakar diagnosa penyakit malaria yang dikembangkan untuk membantu masyarakat 
                dalam mendeteksi gejala malaria secara dini dengan akurasi tinggi.
            </p>
            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="copyright">
            © <span class="highlight">2025</span> Sistem Pakar Diagnosa Penyakit Malaria  
            <br>
            Dikembangkan oleh <span class="highlight">Tim Sistem Pakar</span>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Animated counter for stats
function animateCounter() {
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200; // The lower the faster
    
    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-count');
            const count = +counter.innerText;
            const increment = target / speed;
            
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = target;
            }
        };
        
        updateCount();
    });
}

// Intersection Observer untuk animasi saat scroll
const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            if (entry.target.classList.contains('stats-section')) {
                animateCounter();
            }
            entry.target.classList.add('animate__animated', 'animate__fadeInUp');
        }
    });
}, observerOptions);

// Observe elements
document.querySelectorAll('.team-card, .mission-card, .stats-section').forEach(el => {
    observer.observe(el);
});

// Initialize animation for elements already in view
window.addEventListener('load', () => {
    // Check if stats section is in view on load
    const statsSection = document.querySelector('.stats-section');
    const rect = statsSection.getBoundingClientRect();
    const isInView = (rect.top <= window.innerHeight && rect.bottom >= 0);
    
    if (isInView) {
        animateCounter();
    }
});
</script>
</body>
</html>