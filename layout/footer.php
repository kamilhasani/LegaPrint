<footer class="main-footer">
    <div class="container footer-grid">
        <div class="footer-col">
            <div class="footer-logo">Lega<span>DigiPrint</span></div>
            <p class="footer-desc">
                Solusi percetakan digital berkualitas tinggi di Tangerang. Kami melayani cetak banner, brosur, stiker, dan media promosi lainnya dengan hasil tajam dan cepat.
            </p>
            <div class="footer-socials">
                <a href="https://www.instagram.com/lega.digiprint" target="_blank" class="social-icon instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/Lega_Digiprint" target="_blank" class="social-icon facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://wa.me/62821177773741" target="_blank" class="social-icon whatsapp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.tiktok.com/@legadigiprint5" target="_blank" class="social-icon tiktok">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
        </div>

        <div class="footer-col">
            <h4>Navigasi</h4>
            <ul class="footer-links">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang.php">About Us</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="kontak.php">Hubungi Kami</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Kontak Kami</h4>
            <ul class="footer-contact">
                <li><i class="fas fa-phone-alt"></i> +62 821-1777-3741</li>
                <li><i class="fas fa-envelope"></i> legadigiprint@gmail.com</li>
                <li><i class="fas fa-map-marker-alt"></i> Pasar Senen, Jakarta, DKI Jakarta</li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <strong>Lega DigiPrint</strong>. Dibuat untuk Kelancaran Bisnis Anda.</p>
        </div>
    </div>
</footer>

<style>
    /* CSS WAJIB ADA DI DALAM TAG STYLE */
    .main-footer {
        background: #0f172a;
        color: #cbd5e1;
        padding: 60px 0 0;
        font-family: 'Inter', sans-serif;
    }

    .footer-grid {
        display: flex;
        justify-content: space-between;
        gap: 40px;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px 40px;
    }

    .footer-col {
        flex: 1;
        min-width: 250px;
    }

    .footer-logo {
        font-size: 1.6rem;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 20px;
    }

    .footer-logo span { color: #38bdf8; }

    .footer-links, .footer-contact {
        list-style: none; /* Menghilangkan titik-titik (bullet points) */
        padding: 0;
    }

    .footer-links li, .footer-contact li {
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .footer-links a {
        color: #cbd5e1;
        text-decoration: none;
        transition: 0.3s;
    }

    .footer-links a:hover { color: #38bdf8; }

    .footer-socials { 
        display: flex; 
        gap: 15px; /* Jarak antar ikon sedikit diperlebar agar elegan */
        margin-top: 25px; 
    }

    .social-icon {
        width: 45px; /* Ukuran sedikit lebih besar */
        height: 45px;
        background: rgba(255, 255, 255, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: white;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Efek membal saat hover */
        font-size: 1.2rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Efek Saat Ingin Diklik (Hover) */

    /* Instagram: Gradasi Pink-Orange-Blue */
    /* Instagram */
    .social-icon.instagram:hover { 
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%) !important; 
        transform: translateY(-5px);
    }

    /* Facebook */
    .social-icon.facebook:hover { 
        background: #1877F2 !important; 
        transform: translateY(-5px);
    }

    /* WhatsApp */
    .social-icon.whatsapp:hover { 
        background: #25D366 !important; 
        transform: translateY(-5px);
    }

    /* TikTok */
    .social-icon.tiktok:hover { 
        background: #000000 !important; 
        box-shadow: 2px 2px 0px #fe2c55, -2px -2px 0px #25f4ee !important;
        transform: translateY(-5px);
    }

    /* Efek Aktif (Saat Benar-benar diklik) */
    .social-icon:active {
        transform: scale(0.9); /* Mengecil sedikit saat ditekan */
    }
</style>