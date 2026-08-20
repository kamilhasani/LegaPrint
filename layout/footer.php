<?php
// Footer file - Lega DigiPrint
?>

<footer>
    <div class="footer-container">
        <!-- Column 1: Brand & Social Media -->
        <div class="footer-column brand-column">
            <div class="footer-brand-wrapper">
                <div class="footer-logo-container">
                    <div class="footer-logo-img">
                        <img src="assets/images/logo/logo.jpeg" alt="Lega DigiPrint" width="40" height="40">
                    </div>
                    <div class="footer-logo-text">
                        <h3>Lega DigiPrint</h3>
                        <span class="tagline-text">Solusi Cetak Modern</span>
                    </div>
                </div>
                <div class="footer-line"></div>
                <p class="brand-desc">
                    Lega DigiPrint berkomitmen memberikan layanan percetakan digital terbaik 
                    yang cepat, berkualitas tinggi, dan profesional untuk mendukung segala 
                    kebutuhan bisnis dan kreativitas Anda.
                </p>
            </div>
            <div class="footer-socials">
                <a href="https://facebook.com/YOUR_FB_PAGE" target="_blank" class="f-social-icon fb" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://instagram.com/digiprint" target="_blank" class="f-social-icon ig" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@YOUR_USERNAME" target="_blank" class="f-social-icon tiktok" title="TikTok">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://shopee.co.id/legadigiprint" target="_blank" class="f-social-icon shopee" title="Shopee">
                    <i class="fas fa-store"></i>
                </a>
            </div>
        </div>

        <!-- Column 2: Quick Links -->
        <div class="footer-column links-column">
            <h3>Tautan Cepat</h3>
            <div class="footer-line"></div>
            <ul class="quick-links">
                <li><a href="index.php"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                <li><a href="tentang.php"><i class="fas fa-chevron-right"></i> Tentang Kami</a></li>
                <li><a href="produk.php"><i class="fas fa-chevron-right"></i> Produk</a></li>
                <li><a href="galeri.php"><i class="fas fa-chevron-right"></i> Galeri</a></li>
                <li><a href="kontak.php"><i class="fas fa-chevron-right"></i> Kontak</a></li>
            </ul>
        </div>

        <!-- Column 3: Contact Info -->
        <div class="footer-column contact-column">
            <h3>Hubungi Kami</h3>
            <div class="footer-line"></div>
            <div class="footer-info">
                <a href="https://maps.google.com" target="_blank" class="footer-link">
                    <span class="icon-wrapper">📍</span>
                    <span class="text-wrapper">Jln. Kalibaru Timur III, Ruko Yon Angmor, Senen, Jakarta Pusat 10460</span>
                </a>
                <a href="tel:6282117773741" class="footer-link">
                    <span class="icon-wrapper">📞</span>
                    <span class="text-wrapper">(+62) 821-1777-3741</span>
                </a>
                <a href="mailto:digiprint@gmail.com" class="footer-link">
                    <span class="icon-wrapper">✉</span>
                    <span class="text-wrapper">digiprint@gmail.com</span>
                </a>
            </div>
        </div>

        <!-- Divider -->
        <div class="footer-divider"></div>

        <!-- Copyright -->
        <div class="footer-copyright">
            &copy; 2026 Lega DigiPrint. All Rights Reserved.
            <span class="admin-link-wrapper">
                | <a href="../legaprint/admin/login.php" class="admin-login-link" title="Area Khusus Staff">Staff Only</a>
            </span>
        </div>
    </div>
</footer>

<style>
    /* ============================================================
               FOOTER STYLES - Lega DigiPrint
               ============================================================ */

    /* --- RESET & VARIABLES --- */
    :root {
        --footer-bg: #0f172a;
        --footer-text: #f1f5f9;
        --footer-text-muted: #cbd5e1;
        --footer-text-dim: #94a3b8;
        --footer-accent: #38bdf8;
        --footer-border: rgba(255, 255, 255, 0.1);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* --- FOOTER BASE --- */
    footer {
        background: var(--footer-bg);
        color: var(--footer-text);
        padding: 60px 7% 25px;
        font-size: 14px;
        border-top: 5px solid var(--footer-accent);
    }

    .footer-container {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr 1fr;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* --- FOOTER COLUMNS --- */
    .footer-column h3 {
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    .footer-line {
        width: 40px;
        height: 3px;
        background: var(--footer-accent);
        border-radius: 2px;
        margin-bottom: 20px;
    }

    /* --- BRAND COLUMN --- */
    .footer-brand-wrapper {
        max-width: 400px;
    }

    .footer-logo-container {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 15px;
    }

    .footer-logo-img {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .footer-logo-img img {
        width: 35px;
        height: 35px;
        object-fit: contain;
        border-radius: 4px;
    }

    .footer-logo-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .footer-logo-text h3 {
        font-size: 1.5rem;
        font-weight: 800;
        color: #ffffff;
        margin: 0 !important;
        line-height: 1.1;
        letter-spacing: 0.5px;
    }

    .footer-logo-text .tagline-text {
        font-size: 0.85rem;
        font-weight: 500;
        color: var(--footer-accent);
        margin-top: 4px;
        letter-spacing: 0.2px;
    }

    .brand-desc {
        font-size: 0.9rem;
        line-height: 1.7;
        color: var(--footer-text-muted);
        margin: 0 0 25px 0;
    }

    /* --- SOCIAL MEDIA --- */
    .footer-socials {
        display: flex;
        gap: 12px;
    }

    .f-social-icon {
        width: 42px;
        height: 42px;
        background: rgba(255, 255, 255, 0.08);
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        font-size: 18px;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275),
                    background 0.3s ease,
                    box-shadow 0.4s ease;
    }

    .f-social-icon:hover {
        transform: translateY(-6px) scale(1.1);
        color: white;
    }

    .f-social-icon.fb:hover {
        background: #1877F2;
        box-shadow: 0 10px 20px rgba(24, 119, 242, 0.45);
    }

    .f-social-icon.ig:hover {
        background: linear-gradient(45deg, #f9ce34, #ee2a7b, #6228d7);
        box-shadow: 0 10px 20px rgba(238, 42, 123, 0.45);
    }

    .f-social-icon.tiktok:hover {
        background: #010101;
        box-shadow: -3px 3px 0px rgba(254, 44, 85, 0.6),
                    3px -3px 0px rgba(37, 244, 238, 0.6),
                    0 10px 20px rgba(0, 0, 0, 0.5);
    }

    .f-social-icon.shopee:hover {
        background: #EE4D2D;
        box-shadow: 0 10px 20px rgba(238, 77, 45, 0.45);
    }

    /* --- QUICK LINKS --- */
    .quick-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .quick-links li {
        margin-bottom: 12px;
    }

    .quick-links a {
        color: var(--footer-text-muted);
        text-decoration: none;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .quick-links a i {
        font-size: 10px;
        color: var(--footer-accent);
        transition: transform 0.2s;
    }

    .quick-links a:hover {
        color: #ffffff;
    }

    .quick-links a:hover i {
        transform: translateX(4px);
    }

    /* --- CONTACT INFO --- */
    .footer-info {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .footer-link {
        color: var(--footer-text-muted);
        text-decoration: none;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        transition: color 0.2s ease;
        line-height: 1.5;
    }

    .icon-wrapper {
        font-size: 16px;
        flex-shrink: 0;
    }

    .footer-link:hover {
        color: var(--footer-accent);
    }

    .text-wrapper {
        word-break: break-word;
    }

    /* --- COPYRIGHT --- */
    .footer-divider {
        grid-column: span 3;
        height: 1px;
        background: var(--footer-border);
        margin: 20px 0 5px 0;
    }

    .footer-copyright {
        grid-column: span 3;
        text-align: center;
        font-size: 12px;
        color: var(--footer-text-dim);
    }

    .admin-login-link {
        color: var(--footer-text-dim);
        text-decoration: none;
        transition: var(--transition);
        font-size: 11px;
    }

    .admin-login-link:hover {
        color: var(--footer-accent);
    }

    /* ============================================================
               RESPONSIVE - SMARTPHONE (3 KOLOM KE SAMPING)
               ============================================================ */

    @media (max-width: 992px) {
        .footer-container {
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .footer-divider,
        .footer-copyright {
            grid-column: span 2;
        }
    }

    /* ============================================================
               RESPONSIVE - HP (3 KOLOM KE SAMPING)
               ============================================================ */
    @media (max-width: 768px) {
        footer {
            padding: 30px 20px 20px !important;
        }

        .footer-container {
            display: grid !important;
            grid-template-columns: 1fr 1fr 1fr !important;
            gap: 15px !important;
            text-align: left !important;
            align-items: start !important;
        }

        /* --- KOLOM 1: BRAND (LOGO + SOSMED) --- */
        .brand-column {
            display: flex !important;
            flex-direction: column !important;
            gap: 8px !important;
        }

        .footer-brand-wrapper {
            max-width: 100% !important;
        }

        .footer-logo-container {
            gap: 8px !important;
            margin-bottom: 0 !important;
        }

        .footer-logo-img img {
            width: 28px !important;
            height: 28px !important;
        }

        .footer-logo-text h3 {
            font-size: 0.9rem !important;
            font-weight: 700 !important;
        }

        .footer-logo-text .tagline-text {
            font-size: 0.55rem !important;
            margin-top: 1px !important;
        }

        /* Sembunyikan garis & deskripsi di HP */
        .brand-column .footer-line,
        .brand-desc {
            display: none !important;
        }

        /* Sosial Media di HP - Posisi di bawah logo */
        .footer-socials {
            gap: 6px !important;
            margin-top: 4px !important;
            flex-wrap: wrap !important;
        }

        .f-social-icon {
            width: 26px !important;
            height: 26px !important;
            font-size: 11px !important;
        }

        /* --- KOLOM 2: TAUTAN CEPAT --- */
        .links-column h3 {
            font-size: 10px !important;
            margin-bottom: 4px !important;
        }

        .links-column .footer-line {
            width: 18px !important;
            height: 2px !important;
            margin-bottom: 8px !important;
        }

        .quick-links li {
            margin-bottom: 4px !important;
        }

        .quick-links a {
            font-size: 9px !important;
            gap: 4px !important;
        }

        .quick-links a i {
            font-size: 6px !important;
        }

        /* --- KOLOM 3: HUBUNGI KAMI --- */
        .contact-column h3 {
            font-size: 10px !important;
            margin-bottom: 4px !important;
        }

        .contact-column .footer-line {
            width: 18px !important;
            height: 2px !important;
            margin-bottom: 8px !important;
        }

        .footer-info {
            gap: 6px !important;
        }

        .footer-link {
            font-size: 8px !important;
            gap: 4px !important;
            line-height: 1.3 !important;
        }

        .icon-wrapper {
            font-size: 10px !important;
        }

        /* --- AREA BAWAH --- */
        .footer-divider {
            grid-column: span 3 !important;
            margin: 12px 0 5px 0 !important;
        }

        .footer-copyright {
            grid-column: span 3 !important;
            font-size: 8px !important;
            text-align: center !important;
        }

        .admin-login-link {
            font-size: 7px !important;
        }
    }

    /* ============================================================
               RESPONSIVE - HP KECIL (480px)
               ============================================================ */
    @media (max-width: 480px) {
        footer {
            padding: 20px 12px 15px !important;
        }

        .footer-container {
            gap: 10px !important;
        }

        .footer-logo-img img {
            width: 24px !important;
            height: 24px !important;
        }

        .footer-logo-text h3 {
            font-size: 0.8rem !important;
        }

        .footer-logo-text .tagline-text {
            font-size: 0.5rem !important;
        }

        .f-social-icon {
            width: 22px !important;
            height: 22px !important;
            font-size: 9px !important;
        }

        .links-column h3,
        .contact-column h3 {
            font-size: 9px !important;
        }

        .quick-links a {
            font-size: 8px !important;
        }

        .footer-link {
            font-size: 7px !important;
        }

        .icon-wrapper {
            font-size: 8px !important;
        }

        .footer-copyright {
            font-size: 7px !important;
        }
    }

    /* ============================================================
               RESPONSIVE - HP SANGAT KECIL (360px)
               ============================================================ */
    @media (max-width: 360px) {
        .footer-container {
            gap: 8px !important;
        }

        .footer-logo-text h3 {
            font-size: 0.7rem !important;
        }

        .f-social-icon {
            width: 20px !important;
            height: 20px !important;
            font-size: 8px !important;
        }

        .quick-links a {
            font-size: 7px !important;
        }

        .footer-link {
            font-size: 6.5px !important;
        }

        .footer-copyright {
            font-size: 6px !important;
        }
    }
</style>