<?php include "layout/header.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>Lega DigiPrint - Jasa Cutting Sticker Professional</title>

    <style>
        /* ============================================================
           VARIABLES & RESET
           ============================================================ */
        :root {
            --primary: #004ea2;
            --primary-dark: #003d82;
            --primary-light: #3b82f6;
            --primary-gradient: linear-gradient(135deg, #004ea2 0%, #3b82f6 100%);
            --secondary: #38bdf8;
            --dark: #0f172a;
            --dark-soft: #1e293b;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 10px 25px -5px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 20px 30px -10px rgba(0, 78, 162, 0.15);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --radius-sm: 8px;
            --radius-md: 16px;
            --radius-lg: 24px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--white);
            color: var(--dark-soft);
            line-height: 1.6;
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        /* ============================================================
           TYPOGRAPHY & SECTION HEADERS
           ============================================================ */
        .section-header {
            text-align: center;
            max-width: 680px;
            margin: 0 auto 50px;
        }

        .section-tag {
            display: inline-block;
            background: rgba(0, 78, 162, 0.08);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .section-header h2 {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--dark);
            line-height: 1.25;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }

        .section-header h2 span {
            color: var(--primary);
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-header p {
            color: var(--gray);
            font-size: 1rem;
        }

        /* ============================================================
           HERO SECTION (PERBAIKAN GAMBAR FULL/TIDAK TERPOTONG)
           ============================================================ */
        .hero {
            position: relative;
            width: 100%;
            background: var(--dark);
            overflow: hidden;
        }

        .hero-bg-image {
            width: 100%;
            height: auto;
            position: relative;
        }

        .hero-bg-image img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: contain;
        }

        .hero-wave {
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            line-height: 0;
            z-index: 3;
            pointer-events: none;
        }

        .hero-wave svg {
            width: 100%;
            height: 50px;
            display: block;
        }

        /* ============================================================
           STATS SECTION
           ============================================================ */
        .stats-section {
            padding: 40px 0;
            background: var(--white);
            margin-top: -30px;
            position: relative;
            z-index: 4;
        }

        .stats-wrapper {
            background: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            padding: 30px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            border: 1px solid var(--gray-light);
        }

        .stat-card {
            text-align: center;
            flex: 1;
            min-width: 150px;
        }

        .stat-card .number {
            display: block;
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1;
        }

        .stat-card .label {
            font-size: 0.875rem;
            color: var(--gray);
            margin-top: 6px;
            font-weight: 500;
        }

        .stat-divider {
            width: 1px;
            height: 40px;
            background: var(--gray-light);
        }

        /* ============================================================
           MATERIAL SECTION
           ============================================================ */
        .material-section {
            padding: 90px 0;
            background: var(--bg-light);
        }

        .material-flex {
            display: flex;
            gap: 24px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .material-card {
            flex: 1;
            min-width: 280px;
            max-width: 360px;
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 36px 28px;
            text-align: center;
            border: 1px solid var(--gray-light);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .material-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(0, 78, 162, 0.3);
        }

        .material-icon {
            width: 64px;
            height: 64px;
            background: rgba(0, 78, 162, 0.06);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: var(--transition);
        }

        .material-card:hover .material-icon {
            background: var(--primary);
        }

        .material-icon i {
            font-size: 1.5rem;
            color: var(--primary);
            transition: var(--transition);
        }

        .material-card:hover .material-icon i {
            color: var(--white);
        }

        .material-card h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .material-card p {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .material-card .material-tag {
            padding: 6px 14px;
            background: var(--bg-light);
            color: var(--primary);
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            border: 1px solid rgba(0, 78, 162, 0.1);
        }

        /* ============================================================
           PROCESS SECTION
           ============================================================ */
        .process-section {
            padding: 90px 0;
            background: var(--white);
        }

        .process-flex {
            display: flex;
            gap: 20px;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .process-card {
            flex: 1;
            min-width: 220px;
            text-align: center;
            padding: 20px 10px;
            position: relative;
        }

        .process-number {
            width: 48px;
            height: 48px;
            background: var(--primary-gradient);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            font-weight: 800;
            margin: 0 auto 20px;
            box-shadow: 0 6px 15px rgba(0, 78, 162, 0.25);
        }

        .process-card h3 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .process-card p {
            font-size: 0.875rem;
            color: var(--gray);
        }

        /* ============================================================
           GALLERY SECTION
           ============================================================ */
        .gallery-section {
            padding: 90px 0;
            background: var(--bg-light);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .gallery-item {
            position: relative;
            border-radius: var(--radius-md);
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 4/3;
            box-shadow: var(--shadow-sm);
            background: var(--white);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.85) 0%, rgba(15, 23, 42, 0.2) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            opacity: 0;
            transition: var(--transition);
            padding: 24px;
            text-align: center;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay i {
            font-size: 1.75rem;
            color: var(--secondary);
            margin-bottom: 12px;
        }

        .gallery-overlay h4 {
            color: var(--white);
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .gallery-overlay p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
        }

        /* ============================================================
           CTA SECTION
           ============================================================ */
        .cta-section {
            padding: 80px 0;
            background: var(--primary-gradient);
            color: var(--white);
            text-align: center;
            position: relative;
        }

        .cta-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .cta-content h2 {
            font-size: 2.25rem;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .cta-content p {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 32px;
        }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: var(--white);
            color: var(--primary);
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            transition: var(--transition);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
            gap: 16px;
        }

        /* ============================================================
           LIGHTBOX MODAL
           ============================================================ */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            inset: 0;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: var(--radius-sm);
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 25px;
            color: var(--white);
            font-size: 32px;
            cursor: pointer;
        }

        /* ============================================================
           RESPONSIVE DESIGN (RESPONSIF RESPONSIF)
           ============================================================ */
        @media (max-width: 992px) {
            .section-header h2 { font-size: 1.85rem; }
            .stats-wrapper { gap: 30px; }
            .stat-divider { display: none; }
            .stat-card { flex: 1 1 40%; }
            .material-card { max-width: 100%; }
            .process-card { flex: 1 1 40%; }
        }

        @media (max-width: 600px) {
            .container { padding: 0 16px; }
            .section-header { margin-bottom: 35px; }
            .section-header h2 { font-size: 1.5rem; }
            .section-header p { font-size: 0.875rem; }
            
            .stats-section { margin-top: -20px; }
            .stats-wrapper { padding: 20px 10px; gap: 15px; }
            .stat-card { flex: 1 1 40%; }
            .stat-card .number { font-size: 1.6rem; }
            .stat-card .label { font-size: 0.75rem; }

            .material-section, .process-section, .gallery-section { padding: 50px 0; }
            .material-flex, .process-flex { flex-direction: column; }
            .process-card { min-width: 100%; }

            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 16px;
            }

            .cta-section { padding: 50px 0; }
            .cta-content h2 { font-size: 1.5rem; }
            .cta-btn { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-bg-image">
            <img src="assets/images/iklan/iklan1.png" alt="Cutting Sticker Banner">
        </div>
        <div class="hero-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#ffffff" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,208C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-wrapper">
                <div class="stat-card">
                    <span class="number">500+</span>
                    <span class="label">Proyek Selesai</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-card">
                    <span class="number">1000+</span>
                    <span class="label">Pelanggan Puas</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-card">
                    <span class="number">24 Jam</span>
                    <span class="label">Pengerjaan Cepat</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-card">
                    <span class="number">100%</span>
                    <span class="label">Kualitas Terjamin</span>
                </div>
            </div>
        </div>
    </section>

    <!-- MATERIAL SECTION -->
    <section class="material-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Bahan Berkualitas</span>
                <h2>Material <span>Premium</span> Kami</h2>
                <p>Kami menggunakan bahan terbaik untuk menghasilkan cutting sticker yang tahan lama dan estetik.</p>
            </div>

            <div class="material-flex">
                <div class="material-card">
                    <div class="material-icon"><i class="fas fa-film"></i></div>
                    <h3>Vinyl Premium</h3>
                    <p>Bahan vinyl berkualitas tinggi dengan daya rekat kuat dan tahan terhadap cuaca ekstrem.</p>
                    <span class="material-tag">Tahan Air & Panas</span>
                </div>

                <div class="material-card">
                    <div class="material-icon"><i class="fas fa-sun"></i></div>
                    <h3>Blockout</h3>
                    <p>Sticker khusus tidak tembus cahaya, ideal digunakan untuk aplikasi outdoor dan banner.</p>
                    <span class="material-tag">Anti UV & Tahan Lama</span>
                </div>

                <div class="material-card">
                    <div class="material-icon"><i class="fas fa-sparkles"></i></div>
                    <h3>Transparan / Clear</h3>
                    <p>Sticker bening presisi dengan hasil jernih, memberikan kesan minimalis dan elegan.</p>
                    <span class="material-tag">Elegan & Eksklusif</span>
                </div>
            </div>
        </div>
    </section>

    <!-- PROCESS SECTION -->
    <section class="process-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Proses Pengerjaan</span>
                <h2>Bagaimana <span>Kami Bekerja</span></h2>
                <p>Tahapan pengerjaan terstruktur untuk menjaga presisi dan kepuasan pelanggan.</p>
            </div>

            <div class="process-flex">
                <div class="process-card">
                    <div class="process-number">01</div>
                    <h3>Konsultasi</h3>
                    <p>Diskusikan kebutuhan spesifik dan ide desain Anda bersama tim kami.</p>
                </div>

                <div class="process-card">
                    <div class="process-number">02</div>
                    <h3>Desain & Proofing</h3>
                    <p>Penyusunan tata letak desain dan konfirmasi sebelum masuk ke cetak.</p>
                </div>

                <div class="process-card">
                    <div class="process-number">03</div>
                    <h3>Cutting Presisi</h3>
                    <p>Pemotongan menggunakan mesin cutting presisi tinggi untuk hasil rapi.</p>
                </div>

                <div class="process-card">
                    <div class="process-number">04</div>
                    <h3>Quality Check</h3>
                    <p>Pemeriksaan hasil akhir secara menyeluruh sebelum pengiriman.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section class="gallery-section" id="gallery">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Portofolio</span>
                <h2>Hasil <span>Cutting Sticker</span> Terbaik</h2>
                <p>Kumpulan hasil karya pembuatan sticker berkualitas yang telah kami kerjakan.</p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="assets/images/display/StickerVinylMeteran.jpeg" alt="Sticker Vinyl Meteran">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Sticker Vinyl Meteran</h4>
                        <p>Sticker kendaraan tahan air & panas</p>
                    </div>
                </div>

                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="assets/images/display/stikertoples.jpeg" alt="Sticker Toples">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Sticker Toples</h4>
                        <p>Kemasan produk dengan desain menarik</p>
                    </div>
                </div>

                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="assets/images/display/StickerVinylBlockout.jpeg" alt="Sticker Blockout">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Sticker Blockout</h4>
                        <p>Aplikasi outdoor anti tembus cahaya</p>
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
                <p>Konsultasikan kebutuhan cetak Anda dengan tim kami sekarang juga.</p>
                <a href="kontak.php" class="cta-btn">
                    <i class="fab fa-whatsapp"></i> Hubungi Sekarang
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- LIGHTBOX MODAL -->
    <div id="lightboxModal" class="lightbox-modal" onclick="closeLightbox()">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img class="lightbox-content" id="lightboxImage" alt="Preview">
    </div>

    <?php include "layout/footer.php"; ?>

    <script>
        function openLightbox(element) {
            const img = element.querySelector('img');
            if (!img) return;

            const modal = document.getElementById('lightboxModal');
            const modalImg = document.getElementById('lightboxImage');

            modal.style.display = 'flex';
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