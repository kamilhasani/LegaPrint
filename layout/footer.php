<?php
?>
<footer>
    <div class="footer-container">
        
        <div class="footer-column brand-column">
            <div class="footer-brand-wrapper">
                <div class="footer-logo-container">
                    <div class="footer-logo-img">
                        <img src="assets/images/logo/logo.jpeg" alt="Digiprint" width="40" height="40">
                    </div>
                    <div class="footer-logo-text">
                        <h3>Lega DigiPrint</h3>
                        <span class="tagline-text">Solusi Cetak Modern</span>
                    </div>
                </div>
                
                <div class="footer-line"></div>
                <p class="brand-desc">Digiprint berkomitmen memberikan layanan percetakan digital terbaik yang cepat, berkualitas tinggi, dan profesional untuk mendukung segala kebutuhan bisnis dan kreativitas Anda.</p>
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
                <a href="https://shopee.co.id/YOUR_SHOP_ID" target="_blank" class="f-social-icon shopee" title="Shopee">
                    <i class="fas fa-store"></i>
                </a>
            </div>
        </div>

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

        <div class="footer-column contact-column">
            <h3>Hubungi Kami</h3>
            <div class="footer-line"></div>
            <div class="footer-info">
                <a href="https://maps.google.com" target="_blank" class="footer-link">
                    <span class="icon-wrapper">📍</span> 
                    <span class="text-wrapper">Jln. Kalibaru Timur III. Ruko Yon Angmor, Senen, Kota Jakarta Pusat 10460</span>
                </a>
                <a href="tel:02112345678" class="footer-link">
                    <span class="icon-wrapper">📞</span> 
                    <span class="text-wrapper">(021) 1234 5678</span>
                </a>
                <a href="mailto:info@digiprint.co.id" class="footer-link">
                    <span class="icon-wrapper">✉</span> 
                    <span class="text-wrapper">digiprint@gmail.com</span>
                </a>
            </div>
        </div>

        <div class="footer-divider"></div>
        <div class="footer-copyright">
            © 2026 Digiprint. All Rights Reserved.
        </div>
    </div>
</footer>

<style>
    /* Gaya untuk footer */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }
    
    footer {
        /* KEMBALI KE WARNA ASLI: Biru Tua */
        background: #0f172a; 
        color: #f1f5f9;
        padding: 60px 7% 25px;
        font-size: 14px;
        /* Mengubah warna border aksen atas menjadi biru muda cerah agar serasi */
        border-top: 5px solid #38bdf8;
    }

    .footer-container {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr 1fr;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-column h3 {
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    /* Garis dekoratif kecil di bawah setiap judul kolom */
    .footer-line {
        width: 40px;
        height: 3px;
        /* Mengubah warna aksen garis menjadi biru muda cerah */
        background: #38bdf8;
        border-radius: 2px;
        margin-bottom: 20px;
    }

    .footer-brand-wrapper {
        max-width: 400px; 
    }

    /* Kontainer Utama Logo + Teks Bersanding Horizontal */
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
    }

    /* Susunan Teks Vertikal di Sebelah Kiri */
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

    /* Slogan / Tagline Baru Digiprint */
    .footer-logo-text .tagline-text {
        font-size: 0.85rem;
        font-weight: 500;
        color: #38bdf8; /* Menggunakan warna aksen biru muda cerah */
        margin-top: 4px;
        letter-spacing: 0.2px;
    }

    /* Deskripsi Singkat */
    .brand-desc {
        font-size: 0.9rem;
        line-height: 1.6;
        color: #cbd5e1;
        margin: 0 0 25px 0;
    }

    /* Penataan Grup Media Sosial */
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

    /* Kolom 2: Tautan Cepat */
    .quick-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .quick-links li {
        margin-bottom: 12px;
    }

    .quick-links a {
        color: #cbd5e1;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .quick-links a i {
        font-size: 10px;
        color: #38bdf8; /* Panah mengikuti aksen biru muda */
        transition: transform 0.2s;
    }

    .quick-links a:hover {
        color: #ffffff;
    }

    .quick-links a:hover i {
        transform: translateX(4px);
    }

    /* Kolom 3: Kontak */
    .footer-info {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .footer-link {
        color: #cbd5e1;
        text-decoration: none;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        transition: color 0.2s ease;
        line-height: 1.4;
    }

    .icon-wrapper {
        font-size: 16px;
        flex-shrink: 0;
    }

    .footer-link:hover {
        color: #38bdf8;
    }

    /* Area Bawah: Copyright */
    .footer-divider {
        grid-column: span 3;
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        margin: 20px 0 5px 0;
    }

    .footer-copyright {
        grid-column: span 3;
        text-align: center;
        font-size: 12px;
        color: #94a3b8;
    }

    /* ==========================================================================
    OPTIMASI FOOTER KHUSUS SMARTPHONE (max-width: 768px)
    MATA LAYOUT DI-MAINTAIN TETAP 3 KOLOM KE SAMPING SEPERTI SEBELUMNYA
    ========================================================================== */
    @media (max-width: 768px) {
        footer {
            padding: 25px 3% 15px !important;
        }

        .footer-container {
            display: grid !important;
            grid-template-columns: 1.1fr 0.9fr 1fr !important; 
            gap: 10px !important;
            text-align: left !important;
            align-items: start !important;
        }

        /* --- OVERRIDE RESET UNTUK BRANDING DI HP --- */
        .footer-logo-container {
            justify-content: flex-start !important;
            gap: 8px !important;
            margin-bottom: 0 !important;
        }

        .footer-logo-text h3 {
            font-size: 1rem !important;
            font-weight: 700 !important;
        }

        .footer-logo-text .tagline-text {
            font-size: 0.65rem !important;
            margin-top: 2px !important;
        }

        /* Sembunyikan garis pemisah internal kolom pertama & deskripsi panjang di HP agar tidak luber */
        .brand-column .footer-line,
        .brand-desc {
            display: none !important;
        }

        .footer-column {
            display: block !important;
            text-align: left !important;
        }

        .footer-column h3 {
            font-size: 11px !important;
            margin-bottom: 6px !important;
        }

        .footer-column .footer-line {
            display: block !important;
            width: 20px !important;
            height: 2px !important;
            margin-bottom: 10px !important;
        }

        /* --- KOLOM 1: SOSMED HP --- */
        .footer-socials {
            gap: 6px !important;
            margin-top: 10px !important;
        }

        .f-social-icon {
            width: 24px !important;
            height: 24px !important;
            font-size: 11px !important;
        }

        /* --- KOLOM 2: TAUTAN CEPAT HP --- */
        .quick-links {
            width: 100% !important;
        }
        
        .quick-links li {
            margin-bottom: 6px !important;
        }
        
        .quick-links a {
            font-size: 9px !important;
            padding: 0 !important;
            justify-content: flex-start !important;
            gap: 4px !important;
        }
        
        .quick-links a i {
            font-size: 7px !important;
        }

        /* --- KOLOM 3: HUBUNGI KAMI HP --- */
        .footer-info {
            align-items: flex-start !important;
            width: 100% !important;
            gap: 8px !important;
        }

        .footer-link {
            font-size: 9px !important;
            flex-direction: row !important;
            align-items: flex-start !important;
            text-align: left !important;
            gap: 6px !important;
            width: 100% !important;
        }

        .icon-wrapper {
            font-size: 10px !important;
        }

        /* --- AREA BAWAH --- */
        .footer-divider {
            grid-column: span 3 !important;
            margin: 15px 0 5px 0 !important;
        }

        .footer-copyright {
            grid-column: span 3 !important;
            font-size: 9px !important;
            text-align: center !important;
        }
    }
</style>