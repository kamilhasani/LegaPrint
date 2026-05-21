<?php include "layout/header.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>Lega DigiPrint - Jasa Cetak Banner Professional</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: #ffffff;
            color: #1e293b;
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
        }

        /* Mencegah overflow horizontal */
        html {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }

        /* ==================== HERO SECTION MODERN ==================== */
        .hero {
            position: relative;
            width: 100%;
            min-height: 85vh;
            background: linear-gradient(145deg, #0a0f2a 0%, #0f172a 50%, #0a0f2a 100%);
            overflow-x: hidden;
        }

        .hero-bg-shape {
            position: absolute;
            top: -50%;
            right: -20%;
            width: 80%;
            height: 150%;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-bg-shape-2 {
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 60%;
            height: 100%;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 85vh;
            padding: 80px 20px;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(56, 189, 248, 0.12);
            backdrop-filter: blur(10px);
            padding: 8px 24px;
            border-radius: 50px;
            color: #38bdf8;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 1.5px;
            margin-bottom: 25px;
            border: 1px solid rgba(56, 189, 248, 0.25);
            animation: fadeInUp 0.6s ease;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 20px;
            line-height: 1.2;
            animation: fadeInUp 0.6s ease 0.1s both;
        }

        .hero h1 span {
            color: #38bdf8;
            position: relative;
            display: inline-block;
        }

        .hero h1 span::before {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #38bdf8, #0284c7, transparent);
        }

        .hero p {
            max-width: 650px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 35px;
            animation: fadeInUp 0.6s ease 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.6s ease 0.3s both;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #38bdf8;
            color: white;
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
            box-shadow: 0 5px 20px rgba(56, 189, 248, 0.3);
        }

        .btn-primary:hover {
            background: #0284c7;
            transform: translateY(-3px);
            gap: 15px;
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            color: white;
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-outline:hover {
            border-color: #38bdf8;
            color: #38bdf8;
            transform: translateY(-3px);
        }

        .hero-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            line-height: 0;
        }

        .hero-wave svg {
            width: 100%;
            height: 50px;
        }

        /* ==================== TRUST BADGES ==================== */
        .trust-section {
            padding: 30px 0;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        .trust-grid {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #64748b;
            font-size: 0.85rem;
        }

        .trust-item i {
            font-size: 1.3rem;
            color: #38bdf8;
        }

        /* ==================== MAIN CONTAINER ==================== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        /* ==================== ABOUT SECTION ==================== */
        .about-section {
            padding: 80px 0;
            background: white;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-image {
            position: relative;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .about-image .floating-badge {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: white;
            padding: 12px 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .floating-badge i {
            font-size: 1.5rem;
            color: #38bdf8;
        }

        .floating-badge span {
            font-weight: 700;
            color: #0f172a;
        }

        .about-content .badge {
            display: inline-block;
            background: rgba(56, 189, 248, 0.1);
            color: #0284c7;
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .about-content h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .about-content h2 span {
            color: #38bdf8;
        }

        .about-content p {
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .feature-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 25px;
        }

        .feature-list-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: #1e293b;
        }

        .feature-list-item i {
            color: #38bdf8;
            font-size: 1rem;
        }

        /* ==================== SERVICES GRID ==================== */
        .services-section {
            padding: 80px 0;
            background: #f8fafc;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header .tag {
            display: inline-block;
            background: rgba(56, 189, 248, 0.1);
            color: #0284c7;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .section-header h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 15px;
        }

        .section-header h2 span {
            color: #38bdf8;
        }

        .section-header p {
            color: #64748b;
            max-width: 600px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .service-card {
            background: white;
            padding: 30px 25px;
            border-radius: 20px;
            text-align: center;
            transition: 0.3s;
            border: 1px solid #e2e8f0;
        }

        .service-card:hover {
            transform: translateY(-8px);
            border-color: #38bdf8;
            box-shadow: 0 20px 35px rgba(56, 189, 248, 0.08);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: rgba(56, 189, 248, 0.1);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .service-icon i {
            font-size: 2rem;
            color: #38bdf8;
        }

        .service-card h3 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .service-card p {
            font-size: 0.8rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* ==================== PRODUCT GALLERY ==================== */
        .product-section {
            padding: 80px 0;
            background: white;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            position: relative;
            overflow: hidden;
            height: 250px;
            cursor: pointer;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.08);
        }

        .product-overlay {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: 0.3s;
        }

        .product-card:hover .product-overlay {
            opacity: 1;
        }

        .view-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0284c7;
            font-size: 1.2rem;
        }

        .product-info {
            padding: 20px;
        }

        .product-info h3 {
            font-size: 1rem;
            margin-bottom: 8px;
            color: #0f172a;
        }

        .product-info p {
            font-size: 0.8rem;
            color: #64748b;
            line-height: 1.5;
        }

        /* ==================== CTA SECTION ==================== */
        .cta-section {
            padding: 70px 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            position: relative;
            overflow: hidden;
        }

        .cta-content {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .cta-content h2 {
            font-size: 2rem;
            color: white;
            margin-bottom: 15px;
        }

        .cta-content p {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #25D366;
            color: white;
            padding: 14px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
            box-shadow: 0 5px 20px rgba(37, 211, 102, 0.3);
        }

        .cta-btn:hover {
            background: #1eb954;
            transform: translateY(-3px);
            gap: 18px;
        }

        /* ==================== LIGHTBOX ==================== */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(15, 23, 42, 0.96);
            backdrop-filter: blur(8px);
            cursor: pointer;
        }

        .lightbox-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 12px;
            animation: zoomIn 0.3s ease;
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        .lightbox-close {
            position: fixed;
            top: 30px;
            right: 40px;
            color: white;
            font-size: 45px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            z-index: 10000;
        }

        .lightbox-close:hover {
            color: #38bdf8;
            transform: scale(1.1);
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

        /* ==================== RESPONSIVE HP (TIDAK BISA ZOOM OUT) ==================== */
        @media (max-width: 1024px) {
            .services-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
            .product-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
            .hero h1 { font-size: 2.8rem; }
        }

        @media (max-width: 768px) {
            body, html {
                overflow-x: hidden;
                width: 100%;
                position: relative;
            }
            
            .hero { min-height: 70vh; }
            .hero-content { min-height: 70vh; padding: 60px 16px; }
            .hero h1 { font-size: 1.8rem; }
            .hero p { font-size: 0.9rem; padding: 0 5px; }
            .hero-buttons { flex-direction: column; gap: 12px; align-items: center; width: 100%; }
            .btn-primary, .btn-outline { width: 90%; justify-content: center; padding: 12px 20px; }
            
            .about-grid { grid-template-columns: 1fr; gap: 40px; }
            .about-content h2 { font-size: 1.6rem; }
            .feature-list { grid-template-columns: 1fr; gap: 12px; }
            
            .services-grid { grid-template-columns: 1fr; gap: 15px; }
            .product-grid { grid-template-columns: 1fr; gap: 20px; }
            
            .section-header h2 { font-size: 1.6rem; }
            .cta-content h2 { font-size: 1.4rem; }
            .cta-btn { padding: 12px 30px; font-size: 0.9rem; }
            
            .trust-grid { gap: 20px; }
            .trust-item { font-size: 0.75rem; }
            
            .lightbox-close { top: 20px; right: 25px; font-size: 35px; }
            
            .container { padding: 0 16px; }
            .hero-wave svg { height: 35px; }
            .service-card { padding: 20px 15px; }
            .product-info { padding: 15px; }
            
            /* Mencegah overflow pada gambar */
            img { max-width: 100%; height: auto; }
            .about-image .floating-badge { padding: 8px 15px; }
            .floating-badge i { font-size: 1.2rem; }
            .floating-badge span { font-size: 0.8rem; }
        }

        @media (max-width: 480px) {
            .hero h1 { font-size: 1.5rem; }
            .hero-badge { font-size: 0.7rem; padding: 6px 16px; }
            .hero p { font-size: 0.85rem; }
            .btn-primary, .btn-outline { font-size: 0.85rem; padding: 10px 16px; }
            .section-header h2 { font-size: 1.4rem; }
            .service-icon { width: 55px; height: 55px; }
            .service-icon i { font-size: 1.5rem; }
            .service-card h3 { font-size: 1rem; }
            .product-image { height: 200px; }
        }
    </style>
</head>
<body>

    <!-- HERO SECTION MODERN -->
    <section class="hero">
        <div class="hero-bg-shape"></div>
        <div class="hero-bg-shape-2"></div>
        <div class="hero-content">
            <span class="hero-badge">✦ CETAK BANNER PROFESIONAL</span>
            <h1>Solusi Banner <span>Untuk Bisnis Anda</span></h1>
            <p>Cetak banner indoor & outdoor dengan kualitas premium, warna tajam, dan material tahan lama untuk promosi maksimal</p>
            <div class="hero-buttons">
                <a href="kontak.php" class="btn-primary"><i class="fab fa-whatsapp"></i> Konsultasi Gratis</a>
                <a href="#produk" class="btn-outline"><i class="fas fa-images"></i> Lihat Portofolio</a>
            </div>
        </div>
        <div class="hero-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#ffffff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,208C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- TRUST BADGES -->
    <section class="trust-section">
        <div class="container">
            <div class="trust-grid">
                <div class="trust-item"><i class="fas fa-check-circle"></i> 500+ Klien Puas</div>
                <div class="trust-item"><i class="fas fa-clock"></i> Pengerjaan 1-2 Hari</div>
                <div class="trust-item"><i class="fas fa-shield-alt"></i> Garansi Kualitas</div>
                <div class="trust-item"><i class="fas fa-truck"></i> Pengiriman Cepat</div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-image">
                    <img src="assets/images/iklan/iklan2.png" alt="Cetak Banner Lega DigiPrint">
                    <div class="floating-badge">
                        <i class="fas fa-award"></i>
                        <span>Best Quality Printing</span>
                    </div>
                </div>
                <div class="about-content">
                    <span class="badge">Tentang Kami</span>
                    <h2>Cetak Banner <span>Berkualitas</span> untuk Promosi Anda</h2>
                    <p>Lega DigiPrint menyediakan layanan cetak banner profesional untuk berbagai kebutuhan promosi bisnis, event, toko, hingga branding perusahaan. Kami menggunakan mesin cetak resolusi tinggi dengan material premium yang tahan cuaca dan warna tajam.</p>
                    <div class="feature-list">
                        <div class="feature-list-item"><i class="fas fa-check"></i> Bahan Berkualitas</div>
                        <div class="feature-list-item"><i class="fas fa-check"></i> Warna Tajam & Tahan Lama</div>
                        <div class="feature-list-item"><i class="fas fa-check"></i> Harga Kompetitif</div>
                        <div class="feature-list-item"><i class="fas fa-check"></i> Pengerjaan Cepat</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <span class="tag">Keunggulan Kami</span>
                <h2>Mengapa Memilih <span>Lega DigiPrint</span>?</h2>
                <p>Kami memberikan layanan terbaik untuk setiap proyek cetak banner Anda</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-palette"></i></div>
                    <h3>Desain Menarik</h3>
                    <p>Tim desainer profesional siap membantu membuat banner yang menarik dan efektif</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-fill-drip"></i></div>
                    <h3>Warna Akurat</h3>
                    <p>Hasil cetak dengan warna tajam dan akurat sesuai desain yang diinginkan</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-water"></i></div>
                    <h3>Tahan Cuaca</h3>
                    <p>Material premium yang tahan terhadap panas matahari dan hujan</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-rocket"></i></div>
                    <h3>Proses Cepat</h3>
                    <p>Pengerjaan cepat tanpa mengurangi kualitas hasil cetak banner</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCT GALLERY SECTION -->
    <section id="produk" class="product-section">
        <div class="container">
            <div class="section-header">
                <span class="tag">Portofolio</span>
                <h2>Hasil <span>Cetak Banner</span> Terbaik</h2>
                <p>Beberapa contoh hasil cetak banner berkualitas dari Lega DigiPrint</p>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <div class="product-image" onclick="openLightbox(this)">
                        <img src="assets/images/display/bannerrjualrumah.jpeg" alt="Banner Jual Rumah">
                        <div class="product-overlay">
                            <div class="view-icon"><i class="fas fa-search-plus"></i></div>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Banner Jual Rumah</h3>
                        <p>Banner properti dengan desain profesional untuk menarik pembeli</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image" onclick="openLightbox(this)">
                        <img src="assets/images/display/bannerstand.jpeg" alt="Banner Stand Event">
                        <div class="product-overlay">
                            <div class="view-icon"><i class="fas fa-search-plus"></i></div>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Banner Event/Stand</h3>
                        <p>Cocok untuk pameran, seminar, dan berbagai event bisnis</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image" onclick="openLightbox(this)">
                        <img src="assets/images/display/BANNER.jpeg" alt="Banner Promosi">
                        <div class="product-overlay">
                            <div class="view-icon"><i class="fas fa-search-plus"></i></div>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Banner Promosi Toko</h3>
                        <p>Banner promosi usaha dengan desain menarik dan harga terjangkau</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Butuh Banner untuk Promosi Usaha?</h2>
                <p>Konsultasikan kebutuhan cetak banner Anda dengan tim profesional kami</p>
                <a href="https://wa.me/6282117773741" target="_blank" class="cta-btn">
                    <i class="fab fa-whatsapp"></i> Pesan Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- LIGHTBOX MODAL -->
    <div id="lightboxModal" class="lightbox-modal" onclick="closeLightbox()">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img class="lightbox-content" id="lightboxImage">
    </div>

    <?php include "layout/footer.php"; ?>

    <script>
        function openLightbox(element) {
            const img = element.querySelector('img');
            if (!img) return;
            
            const modal = document.getElementById('lightboxModal');
            const modalImg = document.getElementById('lightboxImage');
            
            modal.style.display = 'block';
            modalImg.src = img.src;
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const modal = document.getElementById('lightboxModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
</body>
</html>