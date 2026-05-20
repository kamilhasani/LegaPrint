<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Cutting Sticker</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f8ff;
            color: #222;
        }

        /* ==================== HERO (ANTI KEPOTONG) ==================== */
        .hero {
            width: 100%;
            /* Mengunci rasio banner agar gambar utuh dari atas sampai bawah */
            aspect-ratio: 16 / 5; 
            min-height: 380px; /* Batas aman tinggi di desktop */
            position: relative;
            overflow: hidden;
        }

        .hero img {
            width: 100%;
            height: 100%;
            object-fit: fill; /* Gambar utuh mengikuti kontainer tanpa ter-crop */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.75) 0%, rgba(0, 78, 162, 0.45) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            padding: 20px;
        }

        .overlay h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .overlay p {
            max-width: 700px;
            line-height: 1.8;
            font-size: 1.1rem;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        /* CONTENT */
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 60px 20px;
        }

        /* SECTION TITLE + LAYANAN */
        .section-wrapper {
            display: flex;
            flex-direction: column; /* Default HP */
            gap: 40px;
            margin-bottom: 60px;
        }

        .section-title {
            text-align: center; /* Default HP */
            width: 100%;
            margin-bottom: 30px;
        }

        .badge {
            display: inline-block;
            background: #004ea2; /* Biru Persib */
            color: #fff;
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 14px;
            margin-bottom: 18px;
            font-weight: bold;
        }

        .section-title h2 {
            font-size: 32px;
            color: #004ea2;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .section-title p {
            color: #555;
            line-height: 1.9;
            font-size: 16px;
        }

        /* LAYANAN LIST */
        .layanan-list {
            width: 100%;
            display: grid;
            grid-template-columns: 1fr; /* Default HP */
            gap: 15px;
            margin-top: 25px;
        }

        .layanan-item {
            background: #fff;
            padding: 18px;
            border-radius: 14px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.04);
            font-weight: 600;
            border: 1px solid #e2e8f0;
            text-align: center;
        }

        /* ==================== PRODUK GRID + ZOOM EFFECT ==================== */
        .produk-grid {
            display: grid;
            grid-template-columns: 1fr; /* Default HP */
            gap: 20px;
        }

        .produk-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden; /* Memotong luapan gambar saat membesar (zoom) */
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
            transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .produk-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0,78,162,0.1);
        }

        .produk-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            cursor: zoom-in; /* Kursor berubah jadi kaca pembesar */
            transition: transform 0.5s ease; /* Gerakan zoom halus */
        }

        /* Efek Zoom Gambar saat Kartu di-hover */
        .produk-card:hover img {
            transform: scale(1.08);
        }

        .produk-content {
            padding: 20px;
            position: relative;
            background: #fff;
            z-index: 2;
        }

        .produk-content h3 {
            margin-bottom: 10px;
            color: #004ea2;
            font-size: 18px;
        }

        .produk-content p {
            color: #555;
            line-height: 1.6;
            font-size: 14px;
        }

        /* BUTTON */
        .btn-wrapper {
            text-align: center;
            margin-top: 50px;
        }

        .btn {
            display: inline-block;
            padding: 14px 35px;
            background: #004ea2;
            color: #fff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0, 78, 162, 0.2);
            transition: 0.3s;
        }

        .btn:hover {
            background: #003772;
            transform: translateY(-2px);
        }

        /* ==================== LIGHTBOX GALERI FULLSCREEN ==================== */
        .gallery-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            animation-name: zoom;
            animation-duration: 0.3s;
        }

        @keyframes zoom {
            from { transform: scale(0.85); opacity: 0; } 
            to { transform: scale(1); opacity: 1; }
        }

        /* TOMBOL CLOSE FIXED POJOK KIRI */
        .close-btn {
            position: fixed !important; 
            top: 30px;
            left: 30px;
            right: auto !important;
            display: block !important;
            text-align: left !important;
            width: auto !important;
            height: auto !important;
            
            color: #ffffff;
            font-size: 50px;
            font-weight: bold;
            line-height: 1;
            transition: all 0.3s ease;
            cursor: pointer;
            user-select: none;
            z-index: 10010 !important; 
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5); 
        }

        .close-btn:hover {
            color: #38bdf8;
            transform: scale(1.15);
        }

        /* ==================== RESPONSIVE MEDIA QUERIES ==================== */

        /* LAYANAN & GRID LAPTOP (Minimal Lebar Layar 992px) */
        @media (min-width: 992px) {
            .hero {
                aspect-ratio: 16 / 5;
            }

            .section-title {
                text-align: center; /* Rata kiri di laptop */
            }

            .layanan-list {
                grid-template-columns: 1fr 1fr; /* Membagi 2 kolom sejajar di laptop */
            }

            .produk-grid {
                grid-template-columns: repeat(4, 1fr); /* 4 Kolom rapi ke samping di laptop */
                gap: 25px;
            }
        }

        /* LAYANAN & GRID TABLET (Maksimal Layar 991px) */
        @media (max-width: 991px) and (min-width: 769px) {
            .layanan-list { grid-template-columns: 1fr 1fr; }
            .produk-grid { grid-template-columns: repeat(2, 1fr); } /* 2 Kolom di tablet */
        }

        /* LAYANAN & GRID HP (Maksimal Layar 768px) */
        @media (max-width: 768px) {
            .hero {
                aspect-ratio: 16 / 7; /* Rasio disesuaikan agar teks overlay aman di HP */
                min-height: 260px;
            }

            .overlay h1 { font-size: 2rem; }
            .overlay p { font-size: 0.95rem; }

            .layanan-list { grid-template-columns: 1fr; }
            
            .produk-grid {
                grid-template-columns: 1fr; /* Kembali 1 kolom lurus ke bawah di HP */
                gap: 20px;
            }

            .produk-card img {
                height: 180px;
            }

            .modal-content {
                max-width: 95%;
                margin-top: 100px; /* Memberi ruang agar tidak menabrak tombol close */
            }

            /* Tombol close menyesuaikan layar HP */
            .close-btn {
                top: 20px;
                left: 20px;
                font-size: 40px;
            }
        }
    </style>
</head>
<body>

    <section class="hero">
        <img src="assets/images/iklan/iklan1.png" alt="Cutting Sticker">

        <div class="overlay">
            <h1>Jasa Cutting Sticker</h1>
            <p>
                Solusi branding terbaik dengan hasil cutting presisi,
                modern, dan berkualitas premium.
            </p>
        </div>
    </section>

    <section class="container">
        <div class="section-title">
            <span class="badge">Layanan Profesional</span>
            <h2>Solusi Cutting Sticker Berkualitas Premium</h2>
            <p>
                Kami menghadirkan layanan cutting sticker modern dengan hasil
                presisi tinggi, desain elegan, dan material berkualitas premium.
                Cocok untuk kebutuhan branding usaha, dekorasi kendaraan,
                toko, promosi bisnis, hingga kebutuhan custom sesuai keinginan Anda.
            </p>
            
            <div class="layanan-list">
                <div class="layanan-item">✔ Desain Custom & Modern</div>
                <div class="layanan-item">✔ Bahan Tahan Air & Tahan Panas</div>
                <div class="layanan-item">✔ Pengerjaan Cepat & Rapi</div>
                <div class="layanan-item">✔ Cocok Untuk Branding Usaha</div>
            </div>
        </div>

        <div class="section-title" style="margin-top: 60px;">
            <h2>Produk Kami</h2>
            <p>Berbagai hasil cutting sticker terbaik dan berkualitas.</p>
        </div>

        <div class="produk-grid">
            <div class="produk-card">
                <img src="assets/images/display/StickerVinylMeteran.jpeg" alt="Sticker Vynil Meteran" onclick="openLightbox(this)">
                <div class="produk-content">
                    <h3>Sticker Vynil Meteran</h3>
                    <p>Cutting sticker kendaraan dengan desain modern, tahan air, dan tahan panas.</p>
                </div>
            </div>

            <div class="produk-card">
                <img src="assets/images/display/Sticker.png" alt="Sticker" onclick="openLightbox(this)">
                <div class="produk-content">
                    <h3>Sticker</h3>
                    <p>Cocok untuk branding toko, kaca, dan promosi usaha dengan hasil elegan.</p>
                </div>
            </div>

            <div class="produk-card">
                <img src="assets/images/display/stikertoples.jpeg" alt="Sticker Custom" onclick="openLightbox(this)">
                <div class="produk-content">
                    <h3>Sticker Custom</h3>
                    <p>Melayani desain custom sesuai kebutuhan dengan kualitas premium dan presisi tinggi.</p>
                </div>
            </div>

            <div class="produk-card">
                <img src="assets/images/display/StickerVinylBlockout.jpeg" alt="Sticker Blockout" onclick="openLightbox(this)">
                <div class="produk-content">
                    <h3>Sticker Blockout</h3>
                    <p>Melayani desain custom sesuai kebutuhan dengan kualitas premium dan presisi tinggi.</p>
                </div>
            </div>
        </div>

        <div class="btn-wrapper">
            <a href="index.php" class="btn">Kembali ke Beranda</a>
        </div>
    </section>

    <div id="galleryModal" class="gallery-modal" onclick="closeLightbox()">
        <span class="close-btn" onclick="closeLightbox()">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <?php include "layout/footer.php"; ?>

    <script>
    function openLightbox(element) {
        var modal = document.getElementById("galleryModal");
        var modalImg = document.getElementById("modalImage");
        
        modal.style.display = "block"; 
        modalImg.src = element.src;    
    }

    function closeLightbox() {
        var modal = document.getElementById("galleryModal");
        modal.style.display = "none"; 
    }
    </script>

</body>
</html>