<?php include 'layout/header.php'; ?>

<main class="about-page">
    <!-- HERO SECTION -->
    <section class="about-hero-section">
        <div class="container hero-container">
            <div class="hero-left">
                <span class="section-tag">TENTANG KAMI</span>
                <h1 class="about-title">LEGA <span>DIGI PRINT</span></h1>
                <p class="about-subtitle">Solusi Cetak Berkualitas untuk Semua Kebutuhan Anda</p>
                <p class="about-description">
                    Lega Digi Print adalah percetakan digital yang berkomitmen memberikan hasil cetak berkualitas tinggi dengan teknologi modern, pelayanan cepat, dan harga yang kompetitif untuk mendukung kebutuhan bisnis Anda.
                </p>
                <a href="kontak.php" class="btn-cta-hero">
                    Pesan Sekarang <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="hero-center-badges">
                <div class="badge-item">
                    <div class="badge-icon"><i class="fas fa-print"></i></div>
                    <span class="badge-text">TEKNOLOGI<br>MODERN</span>
                </div>
                <div class="badge-item">
                    <div class="badge-icon"><i class="fas fa-shield-alt"></i></div>
                    <span class="badge-text">KUALITAS<br>TERJAMIN</span>
                </div>
                <div class="badge-item">
                    <div class="badge-icon"><i class="fas fa-users"></i></div>
                    <span class="badge-text">PELAYANAN<br>TERBAIK</span>
                </div>
            </div>

            <div class="hero-right-image">
                <div class="curved-bg"></div>
                <img src="assets/images/banner/toko.jpg" alt="Gedung Lega DigiPrint">
            </div>
        </div>
    </section>

    <!-- MIDDLE SECTION (VISI MISI, GAMBAR, STATS) -->
    <section class="middle-section">
        <div class="container middle-container">
            <!-- VISI & MISI -->
            <div class="visimisi-block">
                <h3 class="block-title">VISI & MISI</h3>
                
                <div class="vm-item">
                    <div class="vm-icon"><i class="fas fa-eye"></i></div>
                    <div class="vm-text">
                        <h4>VISI</h4>
                        <p>Menjadi percetakan digital terpercaya yang memberikan solusi cetak terbaik dan berkontribusi dalam perkembangan bisnis pelanggan.</p>
                    </div>
                </div>

                <div class="vm-item">
                    <div class="vm-icon"><i class="fas fa-bullseye"></i></div>
                    <div class="vm-text">
                        <h4>MISI</h4>
                        <ul class="misi-list">
                            <li>Memberikan hasil cetak berkualitas dengan teknologi terkini</li>
                            <li>Memberikan pelayanan cepat, ramah, dan profesional</li>
                            <li>Menawarkan harga kompetitif dengan hasil terbaik</li>
                            <li>Selalu berinovasi untuk memenuhi kebutuhan pelanggan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- GAMBAR MESIN -->
            <div class="machine-image-block">
                <img src="assets/images/about.jpg" alt="Proses Cetak Machine">
            </div>

            <!-- KENAPA MEMILIH KAMI? -->
            <div class="stats-block">
                <h3 class="block-title">KENAPA MEMILIH KAMI?</h3>
                <div class="stats-card">
                    <div class="stat-item">
                        <div class="stat-icon"><i class="fas fa-trophy"></i></div>
                        <div class="stat-info">
                            <span class="stat-num">1000+</span>
                            <span class="stat-lbl">Pelanggan Puas</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon"><i class="fas fa-print"></i></div>
                        <div class="stat-info">
                            <span class="stat-num">50+</span>
                            <span class="stat-lbl">Jenis Produk</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon"><i class="fas fa-clock"></i></div>
                        <div class="stat-info">
                            <span class="stat-num">24 Jam</span>
                            <span class="stat-lbl">Proses Cepat</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon"><i class="fas fa-award"></i></div>
                        <div class="stat-info">
                            <span class="stat-num">100%</span>
                            <span class="stat-lbl">Kualitas Terjamin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NILAI KAMI SECTION -->
    <section class="values-banner-section">
        <div class="container">
            <h3 class="values-title">NILAI KAMI</h3>
            <div class="values-grid">
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-ribbon"></i></div>
                    <div class="value-text">
                        <h4>KUALITAS TERBAIK</h4>
                        <p>Kami menggunakan bahan dan mesin berkualitas untuk hasil cetak terbaik.</p>
                    </div>
                </div>
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-tachometer-alt"></i></div>
                    <div class="value-text">
                        <h4>CEPAT & TEPAT</h4>
                        <p>Proses cepat dan tepat waktu sesuai kebutuhan pelanggan.</p>
                    </div>
                </div>
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-user-friends"></i></div>
                    <div class="value-text">
                        <h4>PELAYANAN RAMAH</h4>
                        <p>Tim kami siap membantu dengan pelayanan yang ramah dan profesional.</p>
                    </div>
                </div>
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-lightbulb"></i></div>
                    <div class="value-text">
                        <h4>INOVASI</h4>
                        <p>Selalu berinovasi mengikuti perkembangan teknologi cetak.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    :root {
        --blue-primary: #004ea2;
        --blue-light: #eef6ff;
        --blue-sky: #00a3e0;
        --text-dark: #0f172a;
        --text-muted: #64748b;
        --white: #ffffff;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Inter', sans-serif; background: #f8fafc; color: var(--text-dark); }
    .container { max-width: 1240px; margin: 0 auto; padding: 0 20px; }

    /* --- HERO SECTION --- */
    .about-hero-section {
        position: relative;
        background: linear-gradient(135deg, #f0f6ff 0%, #ffffff 100%);
        padding: 60px 0;
        overflow: hidden;
    }
    .hero-container {
        display: grid;
        grid-template-columns: 1.2fr 0.6fr 1.2fr;
        align-items: center;
        gap: 20px;
    }
    .section-tag {
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--blue-sky);
        letter-spacing: 1px;
    }
    .about-title {
        font-size: 2.8rem;
        font-weight: 900;
        color: var(--text-dark);
        line-height: 1.1;
        margin: 10px 0;
    }
    .about-title span { color: #0066cc; }
    .about-subtitle {
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 12px;
        font-size: 1rem;
    }
    .about-description {
        font-size: 0.85rem;
        color: var(--text-muted);
        line-height: 1.6;
        margin-bottom: 25px;
    }
    .btn-cta-hero {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #0056b3;
        color: var(--white);
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        font-size: 0.9rem;
        box-shadow: 0 4px 15px rgba(0, 86, 179, 0.3);
    }
    
    /* Hero Badges */
    .hero-center-badges {
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 2;
    }
    .badge-item {
        background: var(--white);
        padding: 8px 16px;
        border-radius: 50px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        width: max-content;
    }
    .badge-icon {
        width: 36px;
        height: 36px;
        background: #0056b3;
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }
    .badge-text {
        font-size: 0.65rem;
        font-weight: 800;
        color: var(--text-dark);
        line-height: 1.2;
    }

    /* Hero Right Image Frame */
    .hero-right-image {
        position: relative;
        height: 320px;
    }
    .hero-right-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;
        position: relative;
        z-index: 2;
    }

    /* --- MIDDLE SECTION --- */
    .middle-section { padding: 50px 0; }
    .middle-container {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 25px;
        align-items: start;
    }
    .block-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--blue-primary);
        margin-bottom: 20px;
    }

    /* Visi Misi List */
    .vm-item {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
    }
    .vm-icon {
        width: 38px;
        height: 38px;
        background: #0056b3;
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .vm-text h4 { font-size: 0.95rem; font-weight: 800; color: var(--blue-primary); }
    .vm-text p, .misi-list li {
        font-size: 0.8rem;
        color: var(--text-muted);
        line-height: 1.5;
    }
    .misi-list { list-style: disc; padding-left: 15px; }

    /* Middle Machine Image */
    .machine-image-block img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 16px;
    }

    /* Stats Block */
    .stats-card {
        background: var(--white);
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    .stat-item {
        background: var(--blue-light);
        padding: 12px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .stat-icon {
        font-size: 1.2rem;
        color: var(--blue-primary);
    }
    .stat-num { display: block; font-weight: 800; font-size: 1rem; color: var(--blue-primary); }
    .stat-lbl { font-size: 0.65rem; color: var(--text-muted); }

    /* --- VALUES BANNER --- */
    .values-banner-section {
        background: #004ea2;
        color: var(--white);
        padding: 35px 0;
    }
    .values-title {
        font-size: 1.1rem;
        font-weight: 800;
        margin-bottom: 25px;
    }
    .values-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }
    .value-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }
    .value-icon {
        width: 42px;
        height: 42px;
        background: var(--white);
        color: #004ea2;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    .value-text h4 { font-size: 0.85rem; font-weight: 800; margin-bottom: 4px; }
    .value-text p { font-size: 0.72rem; opacity: 0.85; line-height: 1.4; }

    /* Responsive Breakdown */
    @media (max-width: 992px) {
        .hero-container, .middle-container, .values-grid {
            grid-template-columns: 1fr;
        }
        .hero-center-badges { flex-direction: row; flex-wrap: wrap; }
    }
</style>

<?php include 'layout/footer.php'; ?>