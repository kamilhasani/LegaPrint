<!DOCTYPE html>
<?php
include "config/koneksi.php";

$query = mysqli_query($conn, "
    SELECT *
    FROM produk
    ORDER BY id DESC
");

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

        /* ===== NAVBAR RESPONSIVE ===== */
        header {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            height: 75px;
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            width: 100%;
        }

        nav.container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            text-decoration: none;
            letter-spacing: -0.5px;
            z-index: 1001;
            white-space: nowrap;
        }

        .logo span {
            color: var(--primary);
        }

        /* Desktop menu */
        .nav-links {
            display: flex;
            list-style: none;
            gap: 32px;
            margin: 0 auto;
        }

        .nav-links li a {
            text-decoration: none;
            color: var(--text-main);
            font-weight: 600;
            font-size: 0.95rem;
            transition: var(--transition);
            white-space: nowrap;
        }

        .nav-links li a:hover {
            color: var(--primary);
        }
        
        /* Container Dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Styling Link Utama (Produk) */
        .dropbtn {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dropbtn i {
            font-size: 0.7rem;
            transition: transform 0.3s;
        }

        /* Isi Dropdown (Sembunyi secara default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #ffffff;
            min-width: 220px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.1);
            z-index: 1001;
            border-radius: 4px;
            padding: 10px 0;
            list-style: none;
            top: 100%; /* Muncul tepat di bawah menu */
            left: 0;
        }

        /* Styling Item di dalam Dropdown */
        .dropdown-content li a {
            color: #333;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
            font-size: 0.95rem;
            text-align: left;
            transition: all 0.2s ease;
        }

        /* Hover pada Item Dropdown */
        .dropdown-content li a:hover {
            background-color: #f8f9fa;
            color: #38bdf8; /* Warna identitas LegaDigiPrint */
            padding-left: 25px; /* Efek geser sedikit saat hover */
        }

        /* Tampilkan Dropdown saat Menu di-hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Putar icon panah saat di-hover */
        .dropdown:hover .dropbtn i {
            transform: rotate(180deg);
        }

        /* Responsive Mobile */
        @media (max-width: 768px) {
            .dropdown-content {
                position: static;
                display: none;
                width: 100%;
                box-shadow: none;
                background-color: #f1f5f9;
                padding-left: 20px;
            }
            
            .nav-menu.active .dropdown.active .dropdown-content {
                display: block;
            }
        }

        /* Tombol Login Desktop */
        .nav-btns {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .login-btn {
            background: var(--primary);
            color: white;
            padding: 10px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            white-space: nowrap;
            box-shadow: 0 4px 12px rgba(56, 189, 248, 0.25);
        }

        .login-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
        }

        /* Mobile Toggle */
        .mobile-toggle {
            display: none;
            font-size: 1.8rem;
            cursor: pointer;
            z-index: 1001;
            background: none;
            border: none;
            color: var(--dark);
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            transition: 0.2s;
        }

        .mobile-toggle:hover {
            background: rgba(0,0,0,0.05);
        }

        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 998;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

    /* ===== RESPONSIVE MOBILE ===== */
    @media (min-width: 993px) {
        .mobile-only { display: none !important; }
        .mobile-toggle { display: none !important; }
        .nav-links { display: flex !important; }
    }

    /* --- TAMPILAN HP (Layar Kecil) --- */
    @media (max-width: 992px) {
        /* 1. Sembunyikan menu teks dari layar utama */
        .nav-links {
            display: none; /* Default sembunyi */
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: #fff;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
            z-index: 999;
            transition: 0.3s;
            box-shadow: -5px 0 15px rgba(0,0,0,0.1);
        }

        /* Munculkan menu saat tombol diklik */
        .nav-links.active {
            display: flex !important;
            right: 0;
        }

        /* 2. Sembunyikan tombol login bawaan header agar tidak mengambang */
        .nav-btns .login-btn {
            display: none !important;
        }

        /* 3. PASTIKAN Hamburger Tetap Muncul */
        .mobile-toggle {
            display: flex !important; /* Paksa muncul */
            cursor: pointer;
            font-size: 1.6rem;
            color: var(--dark);
            z-index: 1000;
            padding: 5px;
        }

        /* 4. Login di DALAM Hamburger */
        .mobile-only {
            display: block !important;
            width: 100%;
            margin-top: 10px;
        }

        .login-btn-mobile {
            background: var(--primary);
            color: white !important;
            padding: 12px 0;
            border-radius: 10px;
            text-align: center;
            display: block;
            width: 80%;
            margin: 0 auto;
            font-weight: 700;
            text-decoration: none;
        }
    }

        /* Container Utama */
        .banner-slider {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            margin-top: 0; 
            margin-bottom: 0;
            padding: 0;
            line-height: 0;
            overflow: hidden;
            background-color: #f0f0f0; /* Background netral saat loading */
        }

        .slider-container {
            position: relative;
            width: 100%;
            /* PERBAIKAN: Gunakan auto agar mengikuti tinggi gambar asli */
            height: auto; 
            overflow: hidden;
        }

        .slider-wrapper {
            display: flex;
            width: 100%;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .slide {
            min-width: 100%;
            height: auto;
        }

        .slide img {
            width: 100%;
            /* PERBAIKAN UTAMA: */
            height: auto;         /* Biarkan tinggi menyesuaikan secara alami */
            object-fit: contain;  /* Pastikan SELURUH isi gambar masuk dalam frame */
            display: block;
        }

        /* Navigasi Tombol */
        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.4);
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slider-btn:hover {
            background: #0ea5e9; /* Mengikuti tema biru Lega DigiPrint */
        }

        /* Indikator Dot */
        .slider-dots {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 10;
        }

        .dot {
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
        }

        .dot.active {
            background: #fff;
            transform: scale(1.2);
        }

        /* Responsive: Smartphone */
        @media (max-width: 768px) {
            .slider-container {
                /* PERBAIKAN: Jangan paksa aspect-ratio di HP jika gambar memanjang horizontal */
                aspect-ratio: auto; 
            }
            .slider-btn {
                width: 30px;
                height: 30px;
                background: rgba(0, 0, 0, 0.2); /* Lebih transparan di HP agar tidak ganggu teks */
            }
            .prev-btn { left: 5px; }
            .next-btn { right: 5px; }
        }

        /* ===== HERO SECTION ===== */
        .hero {
            padding: 70px 0;
            background: radial-gradient(circle at 10% 30%, #e0f2fe, #ffffff);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 40px;
            align-items: center;
        }

        .hero-content {
            text-align: center;
        }

        .hero-image {
            display: flex;
            justify-content: center;
        }

        .hero-image img {
            width: 100%;
            max-width: 420px;
            border-radius: 22px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
            transition: 0.3s;
        }

        .hero-image img:hover {
            transform: translateY(-6px) scale(1.02);
        }

        /* BADGE */
        .badge {
            background: #e0f2fe;
            color: var(--primary-dark);
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 20px;
        }

        /* TITLE */
        .hero h1 {
            font-size: 2rem;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        /* DESC */
        .hero p {
            font-size: 1rem;
            color: var(--text-muted);
            margin-bottom: 30px;
        }

        /* BUTTON */
        .buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn-primary,
        .btn-outline {
            padding: 12px 24px;
            border-radius: 14px;
            font-weight: 700;
            text-align: center;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 8px 18px rgba(56,189,248,0.3);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        /* TABLET */
        @media (min-width:768px){

        .hero-grid{
        grid-template-columns: 1.1fr 0.9fr;
        }

        .hero-content{
        text-align:left;
        }

        .hero h1{
        font-size:2.8rem;
        }

        .buttons{
        flex-direction:row;
        }

        }

        /* DESKTOP */
        @media (min-width:1024px){

        .hero h1{
        font-size:3.5rem;
        }

        .hero-image img{
        max-width:480px;
        }

        }

        /* Update khusus untuk tampilan Smartphone */
        @media (max-width: 767px) {
            .hero {
                padding: 40px 10px; /* Mengurangi padding agar lebih luas */
            }

            .hero-grid {
                /* Memaksa menjadi 2 kolom: 60% teks, 40% gambar */
                grid-template-columns: 1.2fr 0.8fr; 
                gap: 15px; /* Jarak antara teks dan gambar diperkecil */
                align-items: center;
                text-align: left; /* Memastikan semua teks rata kiri */
            }

            .hero-content {
                text-align: left; /* Rata kiri untuk container konten */
            }

            .badge {
                font-size: 0.6rem; /* Mengecilkan badge agar tidak makan tempat */
                padding: 4px 10px;
                margin-bottom: 10px;
            }

            .hero h1 {
                font-size: 1.2rem; /* Mengecilkan ukuran judul agar muat 2 kolom */
                margin-bottom: 10px;
                line-height: 1.3;
            }

            .hero p {
                font-size: 0.85rem; /* Mengecilkan paragraf */
                margin-bottom: 15px;
                line-height: 1.4;
            }

            .buttons {
                flex-direction: column; /* Tombol tetap susun bawah agar tidak sempit */
                gap: 8px;
            }

            .btn-primary, .btn-outline {
                padding: 8px 12px; /* Mengecilkan ukuran tombol */
                font-size: 0.8rem;
                border-radius: 8px;
            }

            .hero-image img {
                max-width: 100%; /* Gambar menyesuaikan lebar kolom */
                border-radius: 12px;
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            }
        }

        /* ===== SECTION UMUM ===== */
        section {
            padding: 60px 0;
            background: white;
        }
        
        .bg-light {
            background: var(--light-bg);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-title h2 {
            font-size: 2rem;
            color: #0f172a;
            font-weight: 800;
            margin-bottom: 12px;
        }
        
        .section-title .line {
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, #0ea5e9, #38bdf8);
            margin: 12px auto;
            border-radius: 4px;
        }
        
        .text-white h2 {
            color: white !important;
        }
        
        @media (min-width: 768px) {
            .about-grid {
                grid-template-columns: 1fr 1fr;
                gap: 50px;
            }
            .about-text {
                text-align: left;
            }
        }

        /*PRODUK GRID*/
        .produk-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        /*CARD PRODUK*/
        .produk-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            position: relative;
        }

        .produk-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        /* GAMBAR */
        .produk-img {
            position: relative;
            width: 100%;
            height: 170px;
            overflow: hidden;
            background: #f5f5f5;
        }

        .produk-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.4s;
        }

        .produk-card:hover .produk-img img {
            transform: scale(1.05);
        }

        /* OVERLAY */
        .produk-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: 0.3s;
        }

        .produk-card:hover .produk-overlay {
            opacity: 1;
        }

        .view-text {
            color: white;
            font-size: 14px;
            font-weight: 600;
        }

        /*INFO PRODUK */
        .produk-info {
            padding: 12px;
        }

        .category-tag {
            display: inline-block;
            background: #eef4ff;
            color: #004d95;
            padding: 4px 10px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .produk-info h3 {
            font-size: 15px;
            font-weight: 700;
            color: #222;
            line-height: 1.4;
            margin-bottom: 6px;
        }

        .produk-info h3 a {
            text-decoration: none;
            color: inherit;
        }

        .produk-desc {
            font-size: 12px;
            color: #666;
            line-height: 1.5;
            margin-bottom: 10px;

            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /*PRICE & BUTTON */
        .price-action {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .price-tag {
            font-size: 16px;
            font-weight: 700;
            color: #e63946;
        }

        /* BUTTON WA */
        .btn-wa {
            background: #25D366;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;

            font-size: 13px;
            font-weight: 600;

            transition: 0.3s;
        }

        .btn-wa:hover {
            background: #1da851;
        }

        /*EMPTY */
        .alert-empty {
            grid-column: 1/-1;
            text-align: center;
            padding: 50px 20px;
        }

        .alert-empty i {
            font-size: 40px;
            color: #999;
            margin-bottom: 15px;
        }

        .alert-empty p {
            color: #666;
            margin-bottom: 15px;
        }

        .btn-back {
            background: #004d95;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
        }

        /* TABLET */
        @media (min-width: 768px) {

            .produk-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }

            .produk-img {
                height: 220px;
            }

            .produk-info h3 {
                font-size: 16px;
            }

            .produk-desc {
                font-size: 13px;
            }
        }

        /*  DESKTOP */
        @media (min-width: 1200px) {

            .produk-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 25px;
            }

            .produk-img {
                height: 250px;
            }
        }

        /* ===== LAYANAN SECTION ===== */
        #layanan {
            background: var(--dark);
            color: white;
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

<header>
    <nav class="container">
        <a href="index.php" class="logo">
            <img src="assets/images/logo/logo.jpeg" alt="Logo LegaDigiPrint" style="height: 40px; vertical-align: middle; margin-right: 8px;">
            Lega<span>DigiPrint</span>
        </a>
        
        <ul class="nav-links" id="navMenu">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li class="dropdown">
            <a href="produk.php" class="dropbtn">
                Produk <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown-content">
                <li><a href="produk.php?kat=Banner">Banner</a></li>
                <li><a href="produk.php?kat=Cutting Sticker">Cutting Sticker</a></li>
                <li><a href="produk.php?kat=Plakat">Plakat</a></li>
                <li><a href="produk.php?kat=Merchandise">Merchandise</a></li>
                </ul>
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="kontak.php">Kontak</a></li>
            
            <li class="mobile-only">
                <a href="../legaprint/admin/login.php" class="login-btn-mobile">
                    <i class="fas fa-key"></i> Login
                </a>
            </li>
        </ul>

        <div class="nav-btns">
            <a href="../legaprint/admin/login.php" class="login-btn">
                <i class="fas fa-key"></i> Login
            </a>
            
            <div class="mobile-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
</header>

<div class="overlay" id="menuOverlay"></div> 
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
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</section>


<section class="hero">
    <div class="container">
        <div class="hero-grid">

            <div class="hero-content">
                <h1>
                    Percetakan <span>Digital Printing</span>
                </h1>

                <p>
                    Lega DigiPrint hadir sebagai mitra percetakan digital profesional 
                    dengan kualitas premium dan pengerjaan kilat untuk segala 
                    kebutuhan bisnis Anda.
                </p>

                <div class="buttons">
                    <a href="produk.php" class="btn-primary">Eksplor Produk</a>
                    <a href="#" class="btn-outline">Konsultasi Gratis</a>
                </div>
            </div>

            <div class="hero-image">
                <img src="assets/images/hero/hero.JPEG" alt="Digital Printing">
            </div>

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
                                <?php echo $p['id_kategori']; ?>
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
            <h2 style="color: white;">Mengapa Memilih Kami?</h2>
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
</section>


<section class="client-section" style="padding: 60px 0; background: #fff;">
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
    // ==================== MOBILE MENU TOGGLE ====================
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    
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