<?php 
include "config/koneksi.php"; 
include "layout/header.php"; 
?>

<main class="gallery-page">
    <!-- Hero Section Galeri yang Lebih Hidup -->
    <section class="gallery-hero">
        <div class="hero-bg-animation">
            <div class="bg-gradient-1"></div>
            <div class="bg-gradient-2"></div>
            <div class="bg-gradient-3"></div>
        </div>
        
        <!-- Animated Shapes -->
        <div class="hero-shapes">
            <div class="shape shape-1">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgba(59,130,246,0.1)" d="M47.5,-63.2C60.9,-54.3,70.3,-36.8,74.1,-17.8C77.9,1.2,76.1,21.7,66.9,38.1C57.7,54.5,41.1,66.8,22.2,72.1C3.3,77.4,-17.9,75.7,-36.9,67.1C-55.9,58.5,-72.7,43.1,-79.2,24.3C-85.7,5.5,-81.9,-16.7,-71.1,-34.3C-60.3,-51.9,-42.5,-64.9,-24.1,-69.7C-5.7,-74.5,13.2,-71,34.1,-72.1C55,-73.2,58.9,-72.1,47.5,-63.2Z" transform="translate(100 100)" />
                </svg>
            </div>
            <div class="shape shape-2">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgba(139,92,246,0.08)" d="M53.3,-65.5C66.7,-52.5,73.5,-32.2,77.2,-10.9C80.9,10.4,81.5,32.7,72.5,50.1C63.5,67.5,44.9,80,25.4,84.2C5.9,88.4,-14.5,84.3,-32.7,74.9C-50.9,65.5,-66.9,50.8,-74.5,32.1C-82.1,13.4,-81.3,-9.3,-72.1,-27.8C-62.9,-46.3,-45.3,-60.6,-27.8,-68.8C-10.3,-77,7.2,-79.1,24.6,-74.9C42,-70.7,59.2,-60.2,53.3,-65.5Z" transform="translate(100 100)" />
                </svg>
            </div>
            <div class="shape shape-3">
                <div class="pulse-ring"></div>
            </div>
        </div>
        
        <!-- Floating Particles -->
        <div class="hero-particles">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
            <div class="particle particle-5"></div>
            <div class="particle particle-6"></div>
            <div class="particle particle-7"></div>
            <div class="particle particle-8"></div>
            <div class="particle particle-9"></div>
            <div class="particle particle-10"></div>
        </div>
        
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="hero-badge">
                <i class="fas fa-camera-retro"></i>
                <span>Portofolio Kreatif</span>
            </div>
            <h1 class="hero-title">
                Galeri <span class="gradient-text">Karya</span>
                <div class="hero-title-glow"></div>
            </h1>
            <p class="hero-subtitle">
                Hasil cetakan terbaik dari berbagai project yang telah kami kerjakan 
                untuk pelanggan setia Lega DigiPrint
            </p>
            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-icon">
                        <i class="fas fa-print"></i>
                    </div>
                    <span class="stat-number" id="totalCount">0</span>
                    <span class="stat-label">Karya Terbaik</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat">
                    <div class="stat-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Klien Puas</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat">
                    <div class="stat-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Kualitas</span>
                </div>
            </div>
            <div class="hero-scroll">
                <span class="scroll-text">Scroll untuk lihat karya</span>
                <div class="scroll-mouse">
                    <div class="scroll-wheel"></div>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <div class="hero-wave-container">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#f8fafc" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,208C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-wrapper">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-th-large"></i>
                        <span>Semua</span>
                    </button>
                    <button class="filter-btn" data-filter="image">
                        <i class="fas fa-image"></i>
                        <span>Gambar</span>
                    </button>
                    <button class="filter-btn" data-filter="video">
                        <i class="fas fa-video"></i>
                        <span>Video</span>
                    </button>
                </div>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari galeri...">
                    <button class="search-clear" id="searchClear" style="display: none;">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Grid Section -->
    <section class="gallery-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Koleksi Kami</span>
                <h2 class="section-title">Hasil <span>Produk Terbaik</span></h2>
                <div class="section-divider"></div>
                <p class="section-desc">Berbagai macam project percetakan digital yang telah kami selesaikan dengan hasil memuaskan</p>
            </div>

            <div class="gallery-grid" id="galleryGrid">
                <?php
                $data = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
                $total = 0;
                while($g = mysqli_fetch_array($data)){
                    $file_name = $g['gambar'];
                    $ekstensi = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    $video_ext = array('mp4', 'mov', 'webm', 'avi', 'mkv');
                    $total++;
                ?>
                
                <div class="gallery-item" data-type="<?php echo in_array($ekstensi, $video_ext) ? 'video' : 'image'; ?>" data-title="<?php echo htmlspecialchars($g['judul'] ?? 'Karya Lega DigiPrint'); ?>">
                    <div class="gallery-card">
                        <div class="gallery-img-wrapper">
                            <?php if(in_array($ekstensi, $video_ext)): ?>
                                <video src="assets/images/galeri/<?php echo $file_name; ?>" muted loop autoplay style="width:100%; height:100%; object-fit:cover;"></video>
                                <div class="media-badge video-badge">
                                    <i class="fas fa-play"></i> Video
                                </div>
                            <?php else: ?>
                                <img src="assets/images/galeri/<?php echo $file_name; ?>" alt="<?php echo htmlspecialchars($g['judul'] ?? 'Koleksi LegaPrint'); ?>">
                                <div class="media-badge image-badge">
                                    <i class="fas fa-image"></i> Foto
                                </div>
                            <?php endif; ?>
                            <div class="gallery-overlay" onclick="<?php echo in_array($ekstensi, $video_ext) ? "openLightboxVideo('assets/images/galeri/$file_name')" : "openLightbox('assets/images/galeri/$file_name')"; ?>">
                                <div class="overlay-content">
                                    <?php if(in_array($ekstensi, $video_ext)): ?>
                                        <i class="fas fa-play-circle"></i>
                                        <span>Putar Video</span>
                                    <?php else: ?>
                                        <i class="fas fa-search-plus"></i>
                                        <span>Perbesar</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="gallery-info">
                            <h4><?php echo htmlspecialchars($g['judul'] ?? 'Lega DigiPrint'); ?></h4>
                            <p><?php echo htmlspecialchars($g['deskripsi'] ?? 'Hasil cetakan digital berkualitas tinggi'); ?></p>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
            </div>

            <?php if($total == 0): ?>
            <div class="empty-gallery">
                <i class="fas fa-images"></i>
                <h3>Belum Ada Konten</h3>
                <p>Galeri masih kosong. Silakan tambahkan karya terbaik Anda.</p>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-icon">
                    <i class="fas fa-print"></i>
                </div>
                <h3>Butuh Cetakan Berkualitas?</h3>
                <p>Konsultasikan kebutuhan cetak digital Anda dengan tim profesional kami</p>
                <a href="kontak.php" class="cta-btn">Hubungi Kami <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
</main>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close-btn">&times;</span>
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" style="display:none;">
        <video id="lightbox-video" controls autoplay style="display:none; max-width:90%; max-height:80vh; border-radius:10px;"></video>
        <div class="lightbox-caption" id="lightboxCaption"></div>
    </div>
</div>

<style>
    /* ==================== VARIABLES ==================== */
    :root {
        --primary: #004ea2;
        --primary-dark: #003d82;
        --primary-light: #3b82f6;
        --primary-glow: rgba(59, 130, 246, 0.5);
        --dark: #0f172a;
        --dark-soft: #1e293b;
        --gray: #64748b;
        --light-gray: #f1f5f9;
        --white: #ffffff;
        --transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .gallery-page {
        overflow-x: hidden;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        width: 100%;
    }

    /* ==================== HERO SECTION YANG LEBIH HIDUP ==================== */
    .gallery-hero {
        position: relative;
        min-height: 650px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
        background: linear-gradient(135deg, #0a0f2a 0%, #0f172a 50%, #1e1b4b 100%);
    }

    /* Animated Background Gradients */
    .hero-bg-animation {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .bg-gradient-1 {
        position: absolute;
        top: -50%;
        left: -20%;
        width: 80%;
        height: 150%;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%);
        animation: rotateGradient 20s linear infinite;
    }

    .bg-gradient-2 {
        position: absolute;
        bottom: -50%;
        right: -20%;
        width: 80%;
        height: 150%;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.12) 0%, transparent 70%);
        animation: rotateGradientReverse 25s linear infinite;
    }

    .bg-gradient-3 {
        position: absolute;
        top: 30%;
        left: 30%;
        width: 60%;
        height: 60%;
        background: radial-gradient(circle, rgba(236, 72, 153, 0.08) 0%, transparent 70%);
        animation: pulse 8s ease-in-out infinite;
    }

    @keyframes rotateGradient {
        0% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(180deg) scale(1.2); }
        100% { transform: rotate(360deg) scale(1); }
    }

    @keyframes rotateGradientReverse {
        0% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(-180deg) scale(1.3); }
        100% { transform: rotate(-360deg) scale(1); }
    }

    @keyframes pulse {
        0%, 100% { opacity: 0.5; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.2); }
    }

    /* Animated Shapes */
    .hero-shapes {
        position: absolute;
        inset: 0;
        pointer-events: none;
    }

    .shape {
        position: absolute;
        opacity: 0.6;
    }

    .shape-1 {
        top: 10%;
        left: -5%;
        width: 250px;
        height: 250px;
        animation: floatShape 15s ease-in-out infinite;
    }

    .shape-2 {
        bottom: 5%;
        right: -5%;
        width: 300px;
        height: 300px;
        animation: floatShape 18s ease-in-out infinite reverse;
    }

    .shape-3 {
        top: 40%;
        left: 30%;
        width: 100px;
        height: 100px;
    }

    .pulse-ring {
        width: 100px;
        height: 100px;
        background: rgba(59, 130, 246, 0.15);
        border-radius: 50%;
        animation: pulseRing 3s ease-in-out infinite;
    }

    @keyframes floatShape {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(30px, -50px) rotate(120deg); }
        66% { transform: translate(-20px, 30px) rotate(240deg); }
    }

    @keyframes pulseRing {
        0% { transform: scale(0.8); opacity: 0.5; }
        50% { transform: scale(1.2); opacity: 0.2; }
        100% { transform: scale(0.8); opacity: 0.5; }
    }

    /* Floating Particles */
    .hero-particles {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        border-radius: 50%;
        animation: floatParticle linear infinite;
    }

    .particle-1 { width: 4px; height: 4px; background: rgba(59, 130, 246, 0.8); top: 20%; left: 10%; animation-duration: 12s; }
    .particle-2 { width: 6px; height: 6px; background: rgba(139, 92, 246, 0.8); top: 60%; left: 85%; animation-duration: 15s; animation-delay: 2s; }
    .particle-3 { width: 3px; height: 3px; background: rgba(236, 72, 153, 0.8); top: 70%; left: 20%; animation-duration: 10s; animation-delay: 4s; }
    .particle-4 { width: 5px; height: 5px; background: rgba(59, 130, 246, 0.8); top: 30%; left: 75%; animation-duration: 14s; animation-delay: 6s; }
    .particle-5 { width: 4px; height: 4px; background: rgba(139, 92, 246, 0.8); top: 80%; left: 50%; animation-duration: 11s; animation-delay: 1s; }
    .particle-6 { width: 6px; height: 6px; background: rgba(236, 72, 153, 0.8); top: 15%; left: 45%; animation-duration: 13s; animation-delay: 3s; }
    .particle-7 { width: 3px; height: 3px; background: rgba(59, 130, 246, 0.8); top: 50%; left: 15%; animation-duration: 16s; animation-delay: 5s; }
    .particle-8 { width: 5px; height: 5px; background: rgba(139, 92, 246, 0.8); top: 85%; left: 70%; animation-duration: 9s; animation-delay: 7s; }
    .particle-9 { width: 4px; height: 4px; background: rgba(236, 72, 153, 0.8); top: 45%; left: 60%; animation-duration: 17s; animation-delay: 2.5s; }
    .particle-10 { width: 6px; height: 6px; background: rgba(59, 130, 246, 0.8); top: 75%; left: 35%; animation-duration: 12s; animation-delay: 4.5s; }

    @keyframes floatParticle {
        0% {
            transform: translateY(0) translateX(0);
            opacity: 0;
        }
        50% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh) translateX(50px);
            opacity: 0;
        }
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.7) 0%, rgba(30, 41, 59, 0.6) 100%);
        z-index: 1;
    }

    .gallery-hero .hero-content {
        position: relative;
        z-index: 2;
        padding: 60px 0;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 8px 20px;
        border-radius: 50px;
        margin-bottom: 30px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        animation: fadeInUp 0.8s ease;
    }

    .hero-badge i {
        color: var(--primary-light);
        font-size: 0.9rem;
    }

    .hero-badge span {
        color: white;
        font-size: 0.8rem;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--white);
        margin-bottom: 20px;
        position: relative;
        animation: fadeInUp 0.8s ease 0.1s backwards;
    }

    .gradient-text {
        background: linear-gradient(135deg, #60a5fa, #a78bfa, #f472b6);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: gradientShift 3s ease infinite;
        background-size: 200% 200%;
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .hero-title-glow {
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, transparent, var(--primary-light), transparent);
        animation: glowPulse 2s ease-in-out infinite;
    }

    @keyframes glowPulse {
        0%, 100% { width: 80px; opacity: 0.5; }
        50% { width: 150px; opacity: 1; }
    }

    .hero-subtitle {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 15px;
        animation: fadeInUp 0.8s ease 0.2s backwards;
        line-height: 1.6;
    }

    .hero-stats {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
        margin-bottom: 50px;
        animation: fadeInUp 0.8s ease 0.3s backwards;
    }

    .hero-stats .stat {
        text-align: center;
    }

    .stat-icon {
        width: 45px;
        height: 45px;
        background: rgba(59, 130, 246, 0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        transition: var(--transition);
    }

    .stat-icon i {
        font-size: 1.2rem;
        color: var(--primary-light);
    }

    .stat:hover .stat-icon {
        transform: translateY(-5px);
        background: rgba(59, 130, 246, 0.3);
    }

    .stat-number {
        display: block;
        font-size: 2rem;
        font-weight: 800;
        color: white;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .stat-divider {
        width: 1px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-scroll {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        animation: fadeInUp 0.8s ease 0.4s backwards;
    }

    .scroll-text {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.6);
        letter-spacing: 2px;
    }

    .scroll-mouse {
        width: 26px;
        height: 40px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 20px;
        position: relative;
    }

    .scroll-wheel {
        width: 4px;
        height: 8px;
        background: white;
        border-radius: 2px;
        position: absolute;
        top: 8px;
        left: 50%;
        transform: translateX(-50%);
        animation: scrollWheel 2s ease infinite;
    }

    @keyframes scrollWheel {
        0% { opacity: 1; transform: translateX(-50%) translateY(0); }
        80% { opacity: 0; transform: translateX(-50%) translateY(15px); }
        100% { opacity: 0; transform: translateX(-50%) translateY(0); }
    }

    .hero-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 3;
        pointer-events: none;
    }

    .hero-wave-container svg {
        width: 100%;
        height: 60px;
        display: block;
    }

    /* ==================== FILTER SECTION ==================== */
    .filter-section {
        padding: 25px 0;
        background: var(--white);
        border-bottom: 1px solid var(--light-gray);
        position: sticky;
        top: 0;
        z-index: 99;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
    }

    .filter-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .filter-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .filter-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        border: 2px solid var(--light-gray);
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--gray);
        cursor: pointer;
        transition: var(--transition);
    }

    .filter-btn i {
        font-size: 0.85rem;
    }

    .filter-btn.active,
    .filter-btn:hover {
        background: var(--primary);
        border-color: var(--primary);
        color: var(--white);
        transform: translateY(-2px);
    }

    .search-box {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-box i {
        position: absolute;
        left: 15px;
        color: var(--gray);
        z-index: 1;
    }

    .search-box input {
        padding: 10px 15px 10px 40px;
        border: 2px solid var(--light-gray);
        border-radius: 40px;
        width: 260px;
        font-size: 0.85rem;
        transition: var(--transition);
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
        width: 300px;
    }

    .search-clear {
        position: absolute;
        right: 10px;
        background: none;
        border: none;
        color: var(--gray);
        cursor: pointer;
        font-size: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .search-clear:hover {
        color: var(--primary);
    }

    /* ==================== SECTION HEADER ==================== */
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-tag {
        display: inline-block;
        background: linear-gradient(135deg, rgba(0,78,162,0.1) 0%, rgba(59,130,246,0.1) 100%);
        color: var(--primary);
        padding: 5px 15px;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 15px;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 15px;
    }

    .section-title span {
        color: var(--primary);
    }

    .section-divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--primary-light));
        border-radius: 3px;
        margin: 0 auto 15px;
    }

    .section-desc {
        color: var(--gray);
        font-size: 0.9rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* ==================== GALLERY GRID ==================== */
    .gallery-section {
        padding: 60px 0;
        background: var(--light-gray);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
    }

    .gallery-item {
        opacity: 1;
        transform: scale(1);
        transition: all 0.3s ease;
    }

    .gallery-item.hide {
        display: none;
    }

    .gallery-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        transition: var(--transition);
    }

    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.15);
    }

    .gallery-img-wrapper {
        position: relative;
        height: 260px;
        overflow: hidden;
    }

    .gallery-img-wrapper img,
    .gallery-img-wrapper video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .gallery-img-wrapper img,
    .gallery-card:hover .gallery-img-wrapper video {
        transform: scale(1.1);
    }

    .media-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        z-index: 2;
        backdrop-filter: blur(5px);
    }

    .video-badge {
        background: rgba(239, 68, 68, 0.95);
        color: white;
    }

    .image-badge {
        background: rgba(56, 189, 248, 0.95);
        color: white;
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: rgba(15, 23, 42, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s;
        cursor: pointer;
        z-index: 3;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .overlay-content {
        color: white;
        text-align: center;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .gallery-card:hover .overlay-content {
        transform: translateY(0);
    }

    .overlay-content i {
        font-size: 2.5rem;
        margin-bottom: 10px;
        display: block;
    }

    .overlay-content span {
        display: block;
        font-size: 0.85rem;
    }

    .gallery-info {
        padding: 18px 20px 20px;
    }

    .gallery-info h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 6px;
    }

    .gallery-info p {
        font-size: 0.8rem;
        color: var(--gray);
        line-height: 1.5;
    }

    /* ==================== EMPTY STATE ==================== */
    .empty-gallery {
        text-align: center;
        padding: 80px 20px;
        background: var(--white);
        border-radius: 20px;
    }

    .empty-gallery i {
        font-size: 4rem;
        color: var(--gray);
        margin-bottom: 20px;
    }

    .empty-gallery h3 {
        font-size: 1.5rem;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .empty-gallery p {
        color: var(--gray);
    }

    /* ==================== CTA SECTION ==================== */
    .cta-section {
        padding: 70px 0;
        background: linear-gradient(135deg, var(--dark) 0%, #1e293b 100%);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, transparent 70%);
        animation: rotateBg 20s linear infinite;
    }

    @keyframes rotateBg {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .cta-content {
        text-align: center;
        color: var(--white);
        position: relative;
        z-index: 1;
    }

    .cta-icon {
        width: 80px;
        height: 80px;
        background: rgba(56, 189, 248, 0.15);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        transition: var(--transition);
        animation: pulseIcon 2s ease-in-out infinite;
    }

    @keyframes pulseIcon {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); background: rgba(56, 189, 248, 0.25); }
    }

    .cta-icon i {
        font-size: 2.5rem;
        color: var(--primary-light);
    }

    .cta-content h3 {
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .cta-content p {
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 30px;
    }

    .cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--primary);
        color: var(--white);
        padding: 14px 35px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
    }

    .cta-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
        gap: 15px;
        box-shadow: 0 10px 25px rgba(0,78,162,0.3);
    }

    /* ==================== LIGHTBOX ==================== */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.95);
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s;
    }

    .lightbox.active {
        display: flex;
    }

    .lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
    }

    .lightbox img {
        max-width: 100%;
        max-height: 80vh;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0,0,0,0.5);
    }

    .lightbox-caption {
        text-align: center;
        color: white;
        margin-top: 15px;
        font-size: 0.9rem;
    }

    .close-btn {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        z-index: 10000;
        transition: 0.3s;
    }

    .close-btn:hover {
        color: var(--primary);
        transform: rotate(90deg);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-stats {
            gap: 25px;
        }
        
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .gallery-hero {
            min-height: 550px;
        }
        
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-stats {
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .stat-divider {
            display: none;
        }
        
        .filter-wrapper {
            flex-direction: column;
            align-items: stretch;
        }
        
        .filter-buttons {
            justify-content: center;
        }
        
        .search-box input {
            width: 100%;
        }
        
        .search-box input:focus {
            width: 100%;
        }
        
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .gallery-img-wrapper {
            height: 180px;
        }
        
        .section-title {
            font-size: 1.5rem;
        }
        
        .cta-content h3 {
            font-size: 1.3rem;
        }
        
        .hero-wave-container svg {
            height: 40px;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 1.6rem;
        }
        
        .hero-subtitle {
            font-size: 0.85rem;
        }
        
        .hero-stats .stat {
            min-width: 80px;
        }
        
        .stat-number {
            font-size: 1.5rem;
        }
        
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        
        .gallery-img-wrapper {
            height: 140px;
        }
        
        .gallery-info {
            padding: 10px 12px 12px;
        }
        
        .gallery-info h4 {
            font-size: 0.85rem;
        }
        
        .gallery-info p {
            font-size: 0.7rem;
            display: none;
        }
        
        .filter-btn span {
            display: inline;
        }
        
        .filter-btn {
            padding: 6px 14px;
            font-size: 0.75rem;
        }
        
        .hero-wave-container svg {
            height: 30px;
        }
    }
</style>

<script>
// Menghitung total item untuk ditampilkan di hero
document.addEventListener('DOMContentLoaded', function() {
    const totalItems = document.querySelectorAll('.gallery-item').length;
    const totalCountSpan = document.getElementById('totalCount');
    if (totalCountSpan) {
        totalCountSpan.textContent = totalItems;
    }

    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const searchInput = document.getElementById('searchInput');
    const searchClear = document.getElementById('searchClear');

    function filterGallery() {
        const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';

        let visibleCount = 0;
        
        galleryItems.forEach(item => {
            const itemType = item.getAttribute('data-type');
            const itemTitle = item.getAttribute('data-title').toLowerCase();
            
            let typeMatch = activeFilter === 'all' || itemType === activeFilter;
            let searchMatch = searchTerm === '' || itemTitle.includes(searchTerm);
            
            if (typeMatch && searchMatch) {
                item.classList.remove('hide');
                visibleCount++;
            } else {
                item.classList.add('hide');
            }
        });
        
        // Update total count display
        if (totalCountSpan && visibleCount !== totalItems) {
            totalCountSpan.textContent = visibleCount;
        } else if (totalCountSpan) {
            totalCountSpan.textContent = totalItems;
        }
        
        // Show/hide clear button
        if (searchClear) {
            searchClear.style.display = searchTerm !== '' ? 'flex' : 'none';
        }
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filterGallery();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('keyup', filterGallery);
    }
    
    if (searchClear) {
        searchClear.addEventListener('click', function() {
            searchInput.value = '';
            filterGallery();
            searchInput.focus();
        });
    }
});

// Lightbox functions
function openLightbox(src) {
    const lightbox = document.getElementById('lightbox');
    const img = document.getElementById('lightbox-img');
    const video = document.getElementById('lightbox-video');

    img.style.display = 'none';
    video.style.display = 'none';
    if (video.pause) video.pause();

    const ekstensi = src.split('.').pop().toLowerCase();
    const videoExt = ['mp4', 'webm', 'ogg', 'mov', 'avi', 'mkv'];

    if (videoExt.includes(ekstensi)) {
        video.src = src;
        video.style.display = 'block';
    } else {
        img.src = src;
        img.style.display = 'block';
    }

    lightbox.style.display = 'flex';
    setTimeout(() => { lightbox.classList.add('active'); }, 10);
}

function openLightboxVideo(src) {
    openLightbox(src);
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    const video = document.getElementById('lightbox-video');
    
    lightbox.classList.remove('active');
    if (video.pause) video.pause();
    
    setTimeout(() => {
        lightbox.style.display = 'none';
    }, 300);
}

document.addEventListener('keydown', function(e) {
    if (e.key === "Escape") closeLightbox();
});

// Tambahkan delay animation yang berbeda untuk setiap item
document.querySelectorAll('.gallery-item').forEach((item, index) => {
    item.style.setProperty('--delay', index);
});
</script>

<?php include "layout/footer.php"; ?>