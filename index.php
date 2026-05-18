<!DOCTYPE html>
<?php
include "config/koneksi.php";

$query = mysqli_query($conn, 
        "SELECT p.*, k.nama_kategori 
        FROM produk p
        LEFT JOIN kategori k 
        ON p.id_kategori = k.id_kategori
        WHERE 1=1"
        );

if (!$query) {
    die(mysqli_error($conn));
}
?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Lega DigiPrint | Percetakan Digital Profesional</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* ===== ROOT VARIABLES ===== */
        :root {
            --primary: #38bdf8;
            --primary-dark: #0284c7;
            --dark: #0f172a;
            --text-main: #1e293b;
            --text-muted: #475569;
            --white: #ffffff;
            --light-bg: #f8fafc;
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            line-height: 1.6;
            background-color: var(--white);
            overflow-x: hidden;
            width: 100%;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }


    .banner-slider{
    width:100%;
    overflow:hidden;
    position:relative;
}

.slider-container{
    position:relative;
    width:100%;
    overflow:hidden;
}

.slider-wrapper{
    display:flex;
    transition:transform .6s ease;
}

.slide{
    min-width:100%;
}

.slide img{
    width:100%;
    display:block;
    object-fit:cover;
}

/* BUTTON */
.slider-btn{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    
    width:45px;
    height:45px;

    border:none;
    border-radius:50%;

    background:rgba(0,0,0,.4);
    color:#fff;

    cursor:pointer;
    z-index:10;

    transition:.3s;

    display:flex;
    align-items:center;
    justify-content:center;
}

.slider-btn:hover{
    background:var(--primary);
}

.prev-btn{
    left:20px;
}

.next-btn{
    right:20px;
}

/* DOTS */
.slider-dots{
    position:absolute;
    left:50%;
    bottom:15px;
    transform:translateX(-50%);
    
    display:flex;
    gap:8px;
}

.dot{
    width:10px;
    height:10px;
    border-radius:50%;
    
    background:rgba(255,255,255,.5);
    cursor:pointer;

    transition:.3s;
}

.dot.active{
    background:#fff;
    transform:scale(1.2);
}

/* MOBILE */
@media(max-width:768px){

    .slider-btn{
        width:32px;
        height:32px;
    }

    .prev-btn{
        left:8px;
    }

    .next-btn{
        right:8px;
    }

    .dot{
        width:8px;
        height:8px;
    }

    .slider-dots{
        bottom:10px;
    }
}
        
        /* =========================
        IKLAN SECTION
        ========================= */

        .iklan-section{
            padding: 50px 0; /* hilangkan jarak kiri kanan */
            background: #f4f8ff;
            width: 100%;
        }

        .iklan-grid{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            width: 100%;
        }

        .iklan-card{
            display: block;
            text-decoration: none;
            overflow: hidden;

            background: #fff;
            border-radius: 0; /* agar full sampai ujung */
            box-shadow: none;
            transition: 0.3s ease;
            aspect-ratio: 16/9;
        }

        .iklan-card:hover{
            transform: scale(1.01);
        }

        .iklan-card img{
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        /* =========================
        TABLET
        ========================= */

        @media(max-width:992px){

            .iklan-grid{
                grid-template-columns: repeat(2,1fr);
                gap: 8px;
            }

        }

        /* =========================
        SMARTPHONE
        ========================= */

        @media(max-width:768px){

            .iklan-section{
                padding: 20px 0;
            }

            .iklan-grid{
                grid-template-columns: repeat(3, 1fr);
                gap: 4px;
            }

            .iklan-card{
                aspect-ratio: auto; /* hilangkan crop paksa */
            }

            .iklan-card img{
                width: 100%;
                height: auto; /* agar gambar full tidak terpotong */
                object-fit: contain;
                display: block;
            }

        }

        /* =========================
        PRODUK GRID
        ========================= */

        .produk-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr); /* smartphone 2 kesamping */
            gap:12px;
        }

        /* =========================
        CARD PRODUK
        ========================= */

        .produk-card{
            background:#fff;
            border-radius:10px; /* lebih kotak */
            overflow:hidden;
            transition:all 0.3s ease;
            box-shadow:0 4px 12px rgba(0,0,0,0.08);
            position:relative;
            border:1px solid #e5e7eb;
        }

        .produk-card:hover{
            transform:translateY(-4px);
            box-shadow:0 10px 22px rgba(0,0,0,0.12);
        }

        /* =========================
        GAMBAR
        ========================= */

        .produk-img{
            position:relative;
            width:100%;
            aspect-ratio:1/1; /* kotak presisi */
            overflow:hidden;
            background:#f5f5f5;
        }

        .produk-img img{
            width:100%;
            height:100%;
            object-fit:cover;
            transition:0.4s;
        }

        .produk-card:hover .produk-img img{
            transform:scale(1.05);
        }

        /* =========================
        OVERLAY
        ========================= */

        .produk-overlay{
            position:absolute;
            inset:0;
            background:rgba(0,0,0,0.35);
            display:flex;
            justify-content:center;
            align-items:center;
            opacity:0;
            transition:0.3s;
        }

        .produk-card:hover .produk-overlay{
            opacity:1;
        }

        .view-text{
            color:#fff;
            font-size:13px;
            font-weight:600;
        }

        /* =========================
        INFO PRODUK
        ========================= */

        .produk-info{
            padding:12px;
        }

        .category-tag{
            display:inline-block;
            background:#eef4ff;
            color:#004d95;
            padding:4px 10px;
            border-radius:30px;
            font-size:10px;
            font-weight:600;
            margin-bottom:8px;
        }

        .produk-info h3{
            font-size:14px;
            font-weight:700;
            color:#222;
            line-height:1.4;
            margin-bottom:10px;
        }

        .produk-info h3 a{
            text-decoration:none;
            color:inherit;
        }

        /* =========================
        DESKRIPSI DIHILANGKAN
        ========================= */

        .produk-desc{
            display:none;
        }

        /* =========================
        PRICE & BUTTON
        ========================= */

        .price-action{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:6px;
        }

        .price-tag{
            font-size:14px;
            font-weight:700;
            color:#e63946;
            white-space:nowrap;
            flex-shrink:0;
        }

        /* =========================
        BUTTON WHATSAPP
        ========================= */

        .btn-wa{
            background:#25D366;
            color:#fff;
            text-decoration:none;

            padding:8px 10px;
            border-radius:8px;

            display:flex;
            align-items:center;
            justify-content:center;
            gap:4px;

            font-size:11px;
            font-weight:600;

            transition:0.3s;

            flex:1;
            min-width:0;
            white-space:nowrap;
        }

        .btn-wa:hover{
            background:#1da851;
        }

        /* =========================
        SMARTPHONE
        ========================= */

        @media(max-width:768px){

            .price-action{
                flex-direction:row; /* tetap kesamping */
                align-items:center;
                gap:5px;
            }

            .price-tag{
                font-size:12px;
            }

            .btn-wa{
                font-size:10px;
                padding:7px 6px;
                border-radius:7px;
            }

        }

        /* =========================
        EMPTY
        ========================= */

        .alert-empty{
            grid-column:1/-1;
            text-align:center;
            padding:50px 20px;
        }

        .alert-empty i{
            font-size:40px;
            color:#999;
            margin-bottom:15px;
        }

        .alert-empty p{
            color:#666;
            margin-bottom:15px;
        }

        .btn-back{
            background:#004d95;
            color:#fff;
            padding:10px 20px;
            border-radius:10px;
            text-decoration:none;
        }

        /* =========================
        TABLET
        ========================= */

        @media (min-width:768px){

            .produk-grid{
                grid-template-columns:repeat(3,1fr);
                gap:20px;
            }

            .produk-info h3{
                font-size:15px;
            }

        }

        /* =========================
        DESKTOP
        ========================= */

        @media (min-width:1200px){

            .produk-grid{
                grid-template-columns:repeat(4,1fr);
                gap:25px;
            }

        }

        /* ===== LAYANAN SECTION ===== */
        #layanan {
            background: var(--dark);
            color: white;
            margin-bo
        }

        .layanan-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 10px; 
        }

        .layanan-item {
            background: rgba(255,255,255,0.04);
            padding: 15px 10px; 
            border-radius: 16px; 
            text-align: center;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255,255,255,0.05);
            transition: all 0.3s ease; 
            cursor: pointer;
        }

        .layanan-item:hover {
            transform: translateY(-8px); 
            background: rgba(255, 255, 255, 0.1); 
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .layanan-item:hover i {
            transform: scale(1.1);
            transition: 0.3s;
        }

        /* DESKTOP & TABLET TETAP SEPERTI ASLINYA */
        @media (min-width: 768px) {
            .layanan-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }
            .layanan-item {
                padding: 30px 20px;
                border-radius: 28px;
            }
            .layanan-item i {
                font-size: 2.5rem;
            }
            .layanan-item h4 {
                font-size: 1.3rem;
            }
        }

        @media (min-width: 1024px) {
            .layanan-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* ===== TENAGA KERJA SECTION ===== */
        #tenaga-kerja {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 60px 0;
            color: #ffffff !important; 
        }

        #tenaga-kerja h2, 
        #tenaga-kerja .section-title h2 {
            color: #ffffff !important;
            text-align: center;
        }

        .tim-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 10px; 
        }

        .tim-item {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            padding: 15px 10px; 
            border-radius: 16px; 
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .tim-item:hover {
            background: rgba(255,255,255,0.08);
            transform: translateY(-8px);
            border-color: #38bdf8;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #0ea5e9 0%, #38bdf8 100%);
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.4rem;
            color: #ffffff; /* Warna icon putih */
            transition: 0.3s;
        }

        .tim-item h4 {
            font-size: 0.75rem; 
            margin-bottom: 5px;
            /* Mengubah ke putih murni */
            color: #ffffff !important; 
            font-weight: 700;
        }

        .tim-item p {
            color: #e2e8f0; 
            display: none; 
        }

        /* TABLET & DESKTOP (KEMBALI KE PENGATURAN ASLI) */
        @media (min-width: 768px) {
            .tim-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }
            
            .tim-item {
                padding: 30px 20px;
            }

            .icon-box {
                width: 70px;
                height: 70px;
                font-size: 1.8rem;
            }

            .tim-item h4 {
                font-size: 1.2rem;
            }

            .tim-item p {
                display: block; 
                font-size: 0.9rem;
            }
        }

        @media (min-width: 1024px) {
            .tim-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /*CLIENT*/
        .client-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
        justify-items: center;
        align-items: center;
        }

        .client-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
            border: 1px solid #f1f5f9;
        }

        .client-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .client-card img {
            max-width: 100%;
            max-height: 60px;
            object-fit: contain;
            filter: grayscale(0%); 
            opacity: 1; 
            transition: 0.3s;
        }

        .client-card:hover img {
            transform: scale(1.05);
            opacity: 1;
        }

        @media (max-width: 768px) {
            .client-grid { grid-template-columns: repeat(3, 1fr); }
        }

        /* ===== FOOTER ===== */
        footer {
            background: #0f172a;
            color: white;
            padding: 40px 20px 20px; /* Padding samping ditambah agar tidak mepet layar HP */
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 25px; /* Mengurangi gap agar lebih rapat di smartphone */
            text-align: center;
            margin-bottom: 30px;
        }

        /* Merapikan judul di footer */
        .footer-grid h3, .footer-grid h4 {
            font-size: 1.1rem;
            margin-bottom: 12px;
            color: #f8fafc;
        }

        /* Merapikan teks/link di footer */
        .footer-grid p, .footer-grid a {
            font-size: 0.9rem;
            color: #94a3b8;
            line-height: 1.6;
            text-decoration: none;
        }
        
        .socials {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 10px;
        }
        
        .socials a {
            width: 36px;
            height: 36px;
            background: #1e293b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: 0.2s;
        }
        
        .socials a:hover {
            background: var(--primary);
            transform: scale(1.1);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.05); /* Border dibuat lebih halus */
            padding-top: 20px;
            text-align: center;
            font-size: 0.75rem; /* Font copyright sedikit diperkecil */
            color: #64748b;
        }
        
        /* TABLET & DESKTOP */
        @media (min-width: 768px) {
            footer {
                padding: 60px 0 30px;
            }
            .footer-grid {
                grid-template-columns: 1.5fr 1fr 1fr;
                text-align: left;
                gap: 50px;
            }
            .socials {
                justify-content: flex-start;
            }
            .footer-bottom {
                font-size: 0.8rem;
            }
        }

        /* Utility */
        button, a {
            -webkit-tap-highlight-color: transparent;
        }
    </style>
</head>
<body>
<?php include "layout/header.php"; ?>
                <?php
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM hero ORDER BY id DESC");
                ?>

<section class="banner-slider">
    <div class="slider-container">
        <div class="slider-wrapper" id="sliderWrapper">
            <?php while($d = mysqli_fetch_assoc($data)): ?>
                <div class="slide">
                    <img src="assets/images/hero/<?php echo $d['gambar']; ?>" 
                         alt="Hero Image" 
                         loading="lazy">
                </div>
            <?php endwhile; ?>
        </div>
        
        <button class="slider-btn prev-btn" id="prevBtn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-btn next-btn" id="nextBtn">
            <i class="fas fa-chevron-right"></i>
        </button>
        
        <div class="slider-dots" id="sliderDots">
        <?php
        mysqli_data_seek($data, 0);
        $i = 0;
        while($d = mysqli_fetch_assoc($data)):
        ?>
            <span class="dot <?php echo $i == 0 ? 'active' : ''; ?>"></span>
        <?php
        $i++;
        endwhile;
        ?>
    </div>
    </div>
</section>


<section class="iklan-section">
    <div class="container">
        <div class="iklan-grid">

            <!-- IKLAN 1 -->
            <a href="cutting-sticker.php" class="iklan-card">
                <img src="assets/images/iklan/iklan1.png" alt="Cutting Sticker">
            </a>

            <!-- IKLAN 2 -->
            <a href="cetak-banner.php" class="iklan-card">
                <img src="assets/images/iklan/iklan2.png" alt="Cetak Banner">
            </a>

            <!-- IKLAN 3 -->
            <a href="jasa-plakat.php" class="iklan-card">
                <img src="assets/images/iklan/iklan3.png" alt="Jasa Plakat">
            </a>

        </div>
    </div>
</section>


<section class="product-section section-padding">
    <div class="container">
        <div class="produk-grid">
            <?php if(mysqli_num_rows($query) > 0): ?>
                <?php while($p = mysqli_fetch_assoc($query)): ?>
                    <div class="produk-card">
                        <a href="detail_produk.php?id=<?php echo $p['id']; ?>" 
                           class="produk-img-link">
                            <div class="produk-img">
                                <img 
                                    src="assets/images/produk/<?php echo $p['gambar']; ?>" 
                                    alt="<?php echo $p['nama_produk']; ?>">
                                <div class="produk-overlay">
                                    <span class="view-text">
                                        Lihat Detail
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="produk-info">
                            <div class="category-tag">
                                <?php echo $p['nama_kategori']; ?>
                            </div>
                            <h3>
                                <a href="detail_produk.php?id=<?php echo $p['id']; ?>"
                                   style="text-decoration:none;color:inherit;">
                                    <?php echo $p['nama_produk']; ?>
                                </a>
                            </h3>
                            <p class="produk-desc">
                                <?php
                                echo (strlen($p['deskripsi']) > 80)
                                    ? substr($p['deskripsi'], 0, 80) . "..."
                                    : $p['deskripsi'];
                                ?>
                            </p>
                            <div class="price-action">
                                <div class="price-tag">
                                    <?php
                                    echo "Rp " . number_format((int)$p['harga'], 0, ',', '.');
                                    ?>
                                </div>
                                <a href="https://wa.me/628123456789?text=Halo saya ingin pesan <?php echo urlencode($p['nama_produk']); ?>" 
                                   class="btn-wa"
                                   target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <h2>Produk tidak ditemukan</h2>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="layanan">
    <div class="container">
        <div class="section-title text-white">
            <h2 style="text-align: center;">Mengapa Memilih Kami?</h2>
        </div>
        <div class="layanan-grid">
            <div class="layanan-item">
                <i class="fas fa-bolt"></i>
                <h4>Proses Kilat</h4>
                <p>Sistem antrean efisien, cetak bisa ditunggu atau selesai dalam 24 jam.</p>
            </div>
            <div class="layanan-item">
                <i class="fas fa-medal"></i>
                <h4>High Definition</h4>
                <p>Resolusi tinggi hingga 2400 DPI untuk detail yang sangat halus.</p>
            </div>
            <div class="layanan-item">
                <i class="fas fa-wallet"></i>
                <h4>Harga Kompetitif</h4>
                <p>Kualitas bintang lima dengan harga yang tetap ramah di kantong.</p>
            </div>
        </div>
    </div>
</section>

<section id="tenaga-kerja">
    <div class="container">
        <div class="section-title">
            <h2>Tenaga Kerja Profesional</h2>
            <div class="divider"></div>
        </div>
        <div class="tim-grid">
            <div class="tim-item">
                <div class="icon-box">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h4>Desainer Ahli</h4>
                <p>Tim kreatif yang siap mewujudkan ide Anda menjadi desain visual yang menjual dan estetik.</p>
            </div>
            <div class="tim-item">
                <div class="icon-box">
                    <i class="fas fa-print"></i>
                </div>
                <h4>Operator Senior</h4>
                <p>Tenaga teknis berpengalaman yang memastikan setiap hasil cetak tajam, presisi, dan sempurna.</p>
            </div>
            <div class="tim-item">
                <div class="icon-box">
                    <i class="fas fa-check-double"></i>
                </div>
                <h4>Quality Control</h4>
                <p>Proses pengecekan ketat pada setiap pesanan sebelum sampai ke tangan Anda.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 40px; font-weight: 800; color: #0f172a; font-size: 2rem;">Our Client</h2>
        
        <div class="client-grid">
            <?php
            include "config/koneksi.php";
            $clients = mysqli_query($conn, "SELECT * FROM clients");
            while($cl = mysqli_fetch_array($clients)){
            ?>
            <div class="client-card">
                <img src="assets/images/clients/<?php echo $cl['logo']; ?>" alt="<?php echo $cl['nama_client']; ?>">
            </div>
            <?php } ?>
        </div>
    </div>
</section>



<script>

    
    // Cek jika elemen menu ada sebelum menjalankan event listener
    if (menuToggle && navMenu) {
        const icon = menuToggle.querySelector('i');
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            
            // Ganti icon bars jadi X saat terbuka
            if (navMenu.classList.contains('active')) {
                icon.classList.replace('fa-bars', 'fa-times');
            } else {
                icon.classList.replace('fa-times', 'fa-bars');
            }
        });
    }

    // ==================== BANNER SLIDER JAVASCRIPT ====================
    document.addEventListener('DOMContentLoaded', function() {
        const sliderWrapper = document.getElementById('sliderWrapper');
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const dots = document.querySelectorAll('.dot');
        const sliderContainer = document.querySelector('.slider-container');
        
        // Proteksi: Cek apakah elemen slider ada di halaman
        if (!sliderWrapper || slides.length === 0) return;
        
        let currentIndex = 0;
        const totalSlides = slides.length;
        let autoSlideInterval;
        
        // Update slider position & UI
        function updateSlider() {
            sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
            
            // Update active dot
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }
        
        // Fungsi Navigasi
        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
            resetAutoSlide();
        }
        
        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
            resetAutoSlide();
        }
        
        function goToSlide(index) {
            currentIndex = index;
            updateSlider();
            resetAutoSlide();
        }
        
        // Logic Autoplay
        function startAutoSlide() {
            if (autoSlideInterval) clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(nextSlide, 5000);
        }
        
        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }
        
        // Fitur Tambahan: Stop auto slide saat kursor di atas banner
        if (sliderContainer) {
            sliderContainer.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
            sliderContainer.addEventListener('mouseleave', () => startAutoSlide());
        }
        
        // Event Listeners Tombol
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        
        // Event Listeners Dots
        if (dots.length > 0) {
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => goToSlide(index));
            });
        }
        
        // ==================== TOUCH/SWIPE SUPPORT ====================
        let touchStartX = 0;
        let touchEndX = 0;
        
        if (sliderContainer) {
            sliderContainer.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, {passive: true});
            
            sliderContainer.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, {passive: true});
        }
        
        function handleSwipe() {
            const swipeThreshold = 50; // Jarak minimal geser
            const diff = touchEndX - touchStartX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    prevSlide(); // Geser kanan (prev)
                } else {
                    nextSlide(); // Geser kiri (next)
                }
            }
        }
        
        // Jalankan Autoplay pertama kali
        startAutoSlide();
    });
</script>

<?php include "layout/footer.php"; ?>

</body>
</html>