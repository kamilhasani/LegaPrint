<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Cetak Banner</title>

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
            /* Mengunci rasio banner 16:5 agar gambar utuh dari atas sampai bawah */
            aspect-ratio: 16 / 5; 
            min-height: 400px; /* Batas aman tinggi di desktop */
            position: relative;
            overflow: hidden;
        }

        .hero img {
            width: 100%;
            height: 100%;
            /* Diubah ke 100% 100% agar mengikuti bingkai kontainer tanpa ter-crop */
            object-fit: fill; 
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

        /* CONTAINER UTAMA */
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 60px 20px;
        }

        /* ==================== SECTION WRAPPER (FITUR) ==================== */
        .section-wrapper {
            display: flex;
            flex-direction: column; /* Default HP: menumpuk vertikal */
            gap: 40px;
            margin-bottom: 60px;
        }

        .section-title {
            text-align: center; /* Default HP: tengah */
            width: 100%;
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

        /* GRID FITUR */
        .fitur-grid {
            width: 100%;
            display: grid;
            grid-template-columns: 1fr; /* Default HP: 1 Kolom vertikal */
            gap: 18px;
        }

        .fitur-item {
            background: #fff;
            padding: 25px 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.04);
            font-weight: 600;
            text-align: center;
            border: 1px solid #e2e8f0;
            transition: transform 0.3s ease;
        }
        
        .fitur-item:hover {
            transform: translateY(-3px);
        }

        /* ==================== SECTION PRODUK ==================== */
        /* ==================== SECTION PRODUK ==================== */
        .produk-title {
            text-align: center;
            margin: 60px 0 40px;
        }

        .produk-title h2 {
            color: #004ea2;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .produk-grid {
            display: grid;
            grid-template-columns: 1fr; /* Default HP: 1 Kolom vertikal */
            gap: 20px;
        }

        .produk-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden; /* KUNCI: Memotong luapan gambar saat membesar (zoom) */
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
            transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Efek kartu terangkat saat di-hover */
        .produk-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0,78,162,0.1);
        }

        .produk-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            cursor: zoom-in; /* Mengubah kursor jadi lambang kaca pembesar */
            transition: transform 0.5s ease; /* Transisi animasi zoom agar smooth */
        }

        /* KUNCI EFEK ZOOM: Gambar membesar sedikit ke dalam saat kartu di-hover */
        .produk-card:hover img {
            transform: scale(1.08); 
        }

        .produk-content {
            padding: 20px;
            position: relative;
            background: #fff; /* Menutupi luapan gambar jika melar ke bawah */
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

        /* ==================== BUTTON CALL TO ACTION ==================== */
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
        /* Wadah background hitam fullscreen */
        .gallery-modal {
            display: none; /* Tersembunyi secara default */
            position: fixed;
            z-index: 9999; /* Di atas elemen apa pun termasuk navbar */
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(15, 23, 42, 0.95); /* Warna dongker-hitam pekat */
            backdrop-filter: blur(5px); /* Efek blur estetik latar belakang */
        }

        /* Elemen Gambar di dalam Pop-up */
        .modal-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 80vh; /* Batas tinggi di layar monitor/PC */
            object-fit: contain; /* Gambar utuh tidak terpotong */
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            
            /* Animasi muncul halus */
            animation-name: zoom;
            animation-duration: 0.3s;
        }

        @keyframes zoom {
            from { transform: scale(0.85); opacity: 0; } 
            to { transform: scale(1); opacity: 1; }
        }

        .close-btn {
            position: absolute;
            top: 25px;
            left: 25px;   /* Mengunci jarak 25px dari dinding kiri modal */
            right: auto;  /* Mematikan paksa perintah kanan */
            
            /* SOLUSI KUNCI: Mematikan efek text-align center dari pembungkusnya */
            display: block !important;
            text-align: left !important;
            width: auto !important;
            
            color: #ffffff;
            font-size: 45px; /* Sedikit diperbesar agar mudah di-klik */
            font-weight: bold;
            line-height: 1;
            transition: 0.3s;
            cursor: pointer;
            user-select: none;
            z-index: 10005; /* Menjamin posisi layer berada di paling depan */
        }

        .close-btn:hover {
            color: #38bdf8; 
            transform: scale(1.15);
        }

        /* ==================== RESPONSIVE LAYOUT (LAPTOP & HP) ==================== */

        /* Layar Laptop / Monitor Desktop */
        @media (min-width: 992px) {
            .produk-grid {
                grid-template-columns: repeat(3, 1fr); /* 3 Kolom sejajar ke samping */
                gap: 25px;
            }
        }

        /* Layar Tablet */
        @media (max-width: 991px) and (min-width: 769px) {
            .produk-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 Kolom di tablet */
            }
        }

        /* Layar Smartphone & Responsif Lightbox HP */
        @media (max-width: 768px) {
            .produk-grid {
                grid-template-columns: 1fr; /* Kembali 1 kolom lurus ke bawah di HP */
                gap: 15px;
            }

            .modal-content {
                max-width: 95%;
                margin-top: 80px; 
            }

            .close-btn {
                top: 20px;
                left: 20px;   /* Menjaga kerapatan di layar HP */
                right: auto !important;
                font-size: 38px;
            }
        }
    </style>
</head>
<body>

    <!-- HERO -->
    <section class="hero">
        <img src="assets/images/iklan/iklan2.png" alt="Banner">
    </section>

    <!-- CONTENT -->
    <section class="container">

        <!-- TENTANG -->
        <div class="section-title">

            <span class="badge">Layanan Profesional</span>

            <h2>Banner Promosi Berkualitas Premium</h2>

            <p>
                Kami melayani pembuatan banner indoor dan outdoor untuk
                kebutuhan promosi usaha, event, toko, hingga branding bisnis.
                Menggunakan material premium dengan hasil cetak tajam,
                tahan lama, dan desain menarik yang mampu meningkatkan
                daya tarik pelanggan.
            </p>

            <div class="fitur-grid">

                <div class="fitur-item">
                    ✔ Desain Modern & Elegan
                </div>

                <div class="fitur-item">
                    ✔ Warna Tajam & Berkualitas
                </div>

                <div class="fitur-item">
                    ✔ Tahan Air & Tahan Cuaca
                </div>

                <div class="fitur-item">
                    ✔ Cocok Untuk Semua Promosi
                </div>

            </div>

        </div>

        <!-- PRODUK -->
        <div class="produk-title">
            <h2>Display Produk Banner</h2>

            <p>
                Berbagai jenis banner berkualitas untuk kebutuhan bisnis dan promosi.
            </p>
        </div>

        <div class="produk-grid">

            <div class="produk-card">
                <img src="assets/images/display/bannerrjualrumah.jpeg" alt="Banner Outdoor" onclick="openLightbox(this)">
                <div class="produk-content">
                    <h3>Banner Jual Rumah</h3>
                    <p>Banner tahan cuaca dengan kualitas cetak premium untuk promosi luar ruangan.</p>
                </div>
            </div>

            <div class="produk-card">
                <img src="assets/images/display/bannerstand.jpeg" alt="Banner Event" onclick="openLightbox(this)">
                <div class="produk-content">
                    <h3>Banner Stand/Event</h3>
                    <p>Cocok untuk acara seminar, event, promosi produk, dan kegiatan bisnis lainnya.</p>
                </div>
            </div>

            <div class="produk-card">
                <img src="assets/images/iklan/iklan2.png" alt="Banner Toko" onclick="openLightbox(this)">
                <div class="produk-content">
                    <h3>Banner Toko</h3>
                    <p>Banner promosi usaha dengan desain menarik untuk meningkatkan branding toko Anda.</p>
                </div>
            </div>

        </div>

        <!-- BUTTON -->
        <div class="btn-wrapper">
            <a href="index.php" class="btn">Kembali ke Beranda</a>
        </div>

    </section>

<script>
// Fungsi untuk membuka gambar full screen
function openLightbox(element) {
    var modal = document.getElementById("galleryModal");
    var modalImg = document.getElementById("modalImage");
    
    modal.style.display = "block"; // Munculkan modal
    modalImg.src = element.src;    // Ambil link gambar yang di-klik dan masukkan ke modal
}

// Fungsi untuk menutup geleri full screen saat tombol X atau background di-klik
function closeLightbox() {
    var modal = document.getElementById("galleryModal");
    modal.style.display = "none"; // Sembunyikan kembali modal
}
</script>
<div id="galleryModal" class="gallery-modal" onclick="closeLightbox()">
    <span class="close-btn">&times;</span>
    <img class="modal-content" id="modalImage">
</div>
    

<?php include "layout/footer.php"; ?>
</body>
</html>
