<?php
 include "layout/header.php"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>Lega DigiPrint - Jasa Cutting Sticker Professional</title>

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
            position: relative;
        }

        /* ==================== HERO SECTION MODERN ==================== */
        .hero {
            position: relative;
            width: 100%;
            min-height: 85vh;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            overflow-x: hidden;
        }

        .hero-bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.05"><path fill="none" d="M10,10 L90,10 M10,20 L90,20 M10,30 L90,30 M10,40 L90,40 M10,50 L90,50 M10,60 L90,60 M10,70 L90,70 M10,80 L90,80 M10,90 L90,90 M20,10 L20,90 M30,10 L30,90 M40,10 L40,90 M50,10 L50,90 M60,10 L60,90 M70,10 L70,90 M80,10 L80,90 M90,10 L90,90" stroke="white" stroke-width="0.5"/></svg>');
            background-repeat: repeat;
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
            background: rgba(56, 189, 248, 0.15);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 50px;
            color: #38bdf8;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 1px;
            margin-bottom: 25px;
            border: 1px solid rgba(56, 189, 248, 0.3);
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

        .hero h1 span::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #38bdf8, transparent);
        }

        .hero p {
            max-width: 700px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 35px;
            animation: fadeInUp 0.6s ease 0.2s both;
        }

        .hero-stats {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
            animation: fadeInUp 0.6s ease 0.3s both;
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat .number {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            color: #38bdf8;
        }

        .hero-stat .label {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
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
            height: 60px;
        }

        /* ==================== FEATURE CARDS ==================== */
        .feature-section {
            padding: 80px 0;
            background: #f8fafc;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-tag {
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
            font-size: 2.2rem;
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

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .feature-card {
            background: white;
            padding: 30px 20px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.02);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            border-color: #38bdf8;
            box-shadow: 0 20px 35px rgba(56, 189, 248, 0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.1), rgba(56, 189, 248, 0.05));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .feature-icon i {
            font-size: 2rem;
            color: #38bdf8;
        }

        .feature-card h3 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .feature-card p {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* ==================== PRODUCT SHOWCASE ==================== */
        .product-section {
            padding: 80px 0;
            background: white;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
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
            aspect-ratio: 1 / 1;
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
            transition: 0.3s;
        }

        .product-info {
            padding: 20px;
        }

        .product-category {
            display: inline-block;
            background: rgba(56, 189, 248, 0.1);
            color: #0284c7;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            margin-bottom: 10px;
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
        }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #38bdf8;
            color: white;
            padding: 14px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
        }

        .cta-btn:hover {
            background: #0284c7;
            transform: translateY(-3px);
            gap: 15px;
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
            background-color: rgba(15, 23, 42, 0.95);
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
            .feature-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
            .product-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
            .hero h1 { font-size: 2.5rem; }
            .hero-stats { gap: 25px; }
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
            .hero-stats { flex-wrap: wrap; gap: 15px; }
            .hero-stat .number { font-size: 1.3rem; }
            .hero-stat .label { font-size: 0.7rem; }
            
            .feature-grid { grid-template-columns: 1fr; gap: 15px; }
            .product-grid { grid-template-columns: 1fr; gap: 20px; }
            
            .section-header h2 { font-size: 1.6rem; }
            .cta-content h2 { font-size: 1.4rem; }
            .cta-btn { padding: 12px 25px; font-size: 0.9rem; }
            
            .lightbox-close { top: 20px; right: 25px; font-size: 35px; }
            
            .container { padding: 0 16px; }
            .hero-wave svg { height: 35px; }
            .feature-card { padding: 20px 15px; }
            .product-info { padding: 15px; }
            
            /* Mencegah overflow pada gambar */
            img { max-width: 100%; height: auto; }
            
            .feature-icon { width: 55px; height: 55px; }
            .feature-icon i { font-size: 1.5rem; }
            .feature-card h3 { font-size: 1rem; }
            .feature-card p { font-size: 0.8rem; }
        }

        @media (max-width: 480px) {
            .hero h1 { font-size: 1.5rem; }
            .hero-badge { font-size: 0.7rem; padding: 6px 16px; }
            .hero p { font-size: 0.85rem; }
            .hero-stat .number { font-size: 1.1rem; }
            .hero-stat .label { font-size: 0.65rem; }
            .section-header h2 { font-size: 1.4rem; }
            .product-image { aspect-ratio: 1 / 1; }
            .product-info h3 { font-size: 0.9rem; }
            .product-info p { font-size: 0.75rem; }
            .cta-btn { padding: 10px 20px; font-size: 0.85rem; }
            .lightbox-close { top: 15px; right: 20px; font-size: 30px; }
        }

        /* Untuk HP yang sangat kecil */
        @media (max-width: 380px) {
            .hero h1 { font-size: 1.3rem; }
            .hero-badge { font-size: 0.65rem; }
            .hero p { font-size: 0.8rem; }
            .hero-stats { gap: 10px; }
            .hero-stat .number { font-size: 1rem; }
            .hero-stat .label { font-size: 0.6rem; }
            .section-header h2 { font-size: 1.3rem; }
            .cta-btn { padding: 8px 16px; font-size: 0.8rem; gap: 6px; }
        }
    </style>
</head>
<body>

    <!-- HERO SECTION MODERN -->
    <section class="hero">
        <div class="hero-bg-pattern"></div>
        <div class="hero-content">
            <span class="hero-badge">✦ Professional Cutting Sticker</span>
            <h1>Presisi Tinggi <span>Hasil Maksimal</span></h1>
            <p>Layanan cutting sticker modern dengan teknologi presisi tinggi, material berkualitas premium, dan hasil yang tahan lama untuk branding usaha Anda.</p>
            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="number">500+</span>
                    <span class="label">Proyek Selesai</span>
                </div>
                <div class="hero-stat">
                    <span class="number">1000+</span>
                    <span class="label">Pelanggan Puas</span>
                </div>
                <div class="hero-stat">
                    <span class="number">24 Jam</span>
                    <span class="label">Pengerjaan Cepat</span>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#f8fafc" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,208C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- FEATURE SECTION -->
    <section class="feature-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Keunggulan Kami</span>
                <h2>Kenapa Pilih <span>Layanan Kami</span>?</h2>
                <p>Kami memberikan yang terbaik untuk setiap proyek cutting sticker Anda</p>
            </div>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-pen-fancy"></i></div>
                    <h3>Desain Custom</h3>
                    <p>Layanan desain profesional sesuai kebutuhan dan keinginan Anda</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-tint"></i></div>
                    <h3>Tahan Air & Panas</h3>
                    <p>Material premium yang tahan terhadap cuaca dan panas matahari</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                    <h3>Pengerjaan Cepat</h3>
                    <p>Proses cutting presisi dengan waktu pengerjaan yang efisien</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-medal"></i></div>
                    <h3>Garansi Kualitas</h3>
                    <p>Kami menjamin hasil cutting rapi dan berkualitas premium</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCT SHOWCASE -->
    <section class="product-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Portofolio</span>
                <h2>Hasil <span>Cutting Sticker</span> Terbaik</h2>
                <p>Berbagai jenis cutting sticker dengan kualitas terbaik untuk kebutuhan Anda</p>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <div class="product-image" onclick="openLightbox(this)">
                        <img src="assets/images/display/StickerVinylMeteran.jpeg" alt="Sticker Vinyl Meteran">
                        <div class="product-overlay">
                            <div class="view-icon"><i class="fas fa-search-plus"></i></div>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Vinyl</span>
                        <h3>Sticker Vinyl Meteran</h3>
                        <p>Cutting sticker kendaraan dengan desain modern, tahan air dan panas</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image" onclick="openLightbox(this)">
                        <img src="assets/images/display/Sticker.png" alt="Sticker Custom">
                        <div class="product-overlay">
                            <div class="view-icon"><i class="fas fa-search-plus"></i></div>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Custom</span>
                        <h3>Sticker Custom</h3>
                        <p>Cocok untuk branding toko, kaca, dan promosi usaha</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image" onclick="openLightbox(this)">
                        <img src="assets/images/display/stikertoples.jpeg" alt="Sticker Toples">
                        <div class="product-overlay">
                            <div class="view-icon"><i class="fas fa-search-plus"></i></div>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Packaging</span>
                        <h3>Sticker Toples</h3>
                        <p>Sticker kemasan produk dengan desain elegan dan premium</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image" onclick="openLightbox(this)">
                        <img src="assets/images/display/StickerVinylBlockout.jpeg" alt="Sticker Blockout">
                        <div class="product-overlay">
                            <div class="view-icon"><i class="fas fa-search-plus"></i></div>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Blockout</span>
                        <h3>Sticker Blockout</h3>
                        <p>Sticker tidak tembus cahaya, cocok untuk banner dan spanduk</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Butuh Cutting Sticker Berkualitas?</h2>
                <p>Konsultasikan kebutuhan Anda dengan tim profesional kami secara gratis</p>
                <a href="kontak.php" class="cta-btn">
                    <i class="fab fa-whatsapp"></i> Konsultasi Sekarang
                    <i class="fas fa-arrow-right"></i>
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