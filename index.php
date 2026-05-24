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

        .commitment-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        }

        .commitment-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .commitment-header .badge {
            display: inline-block;
            background: rgba(56, 189, 248, 0.15);
            color: var(--primary-dark);
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .commitment-header h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 15px;
        }

        .commitment-header h2 span {
            color: var(--primary);
        }

        .commitment-header p {
            color: var(--gray);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .commitment-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 50px;
        }

        .commitment-card {
            background: var(--white);
            padding: 30px 25px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(56, 189, 248, 0.1);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
        }

        .commitment-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: 0 15px 35px rgba(56, 189, 248, 0.1);
        }

        .commitment-icon {
            width: 70px;
            height: 70px;
            background: rgba(56, 189, 248, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .commitment-icon i {
            font-size: 2rem;
            color: var(--primary);
        }

        .commitment-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .commitment-card p {
            font-size: 0.85rem;
            color: var(--gray);
            line-height: 1.6;
        }

        .commitment-cta {
            text-align: center;
        }

        .commitment-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #25D366;
            color: white;
            padding: 14px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
        }

        .commitment-btn:hover {
            background: #1eb954;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.4);
        }

        /* ==================== RESPONSIVE COMMITMENT ==================== */
        @media (max-width: 992px) {
            .commitment-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 576px) {
            .commitment-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .commitment-header h2 {
                font-size: 1.5rem;
            }
            
            .commitment-header p {
                font-size: 0.85rem;
                padding: 0 15px;
            }
            
            .commitment-section {
                padding: 50px 0;
            }
            
            .commitment-card {
                padding: 20px 15px;
            }
            
            .commitment-icon {
                width: 55px;
                height: 55px;
            }
            
            .commitment-icon i {
                font-size: 1.5rem;
            }
            
            .commitment-card h3 {
                font-size: 1rem;
            }
            
            .commitment-card p {
                font-size: 0.8rem;
            }
            
            .commitment-btn {
                padding: 10px 25px;
                font-size: 0.85rem;
            }
        }

        /* ==================== TESTIMONIAL SECTION ==================== */
        .testimonial-section {
            padding: 80px 0;
            background: var(--white);
            position: relative;
            overflow: hidden;
        }

        .testimonial-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .testimonial-header .badge {
            display: inline-block;
            background: rgba(56, 189, 248, 0.1);
            color: var(--primary-dark);
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .testimonial-header h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 15px;
        }

        .testimonial-header h2 span {
            color: var(--primary);
        }

        .testimonial-header p {
            color: var(--gray);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 50px;
        }

        .testimonial-card {
            background: var(--bg-light);
            padding: 25px;
            border-radius: 20px;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            border-color: var(--primary-light);
        }

        .testimonial-rating {
            margin-bottom: 15px;
        }

        .testimonial-rating i {
            color: #fbbf24;
            font-size: 0.9rem;
            margin-right: 2px;
        }

        .testimonial-text {
            font-size: 0.9rem;
            color: var(--gray);
            line-height: 1.7;
            margin-bottom: 20px;
            font-style: italic;
        }

        .testimonial-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
        }

        .user-avatar i {
            font-size: 2.5rem;
            color: var(--primary);
        }

        .user-info h4 {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 3px;
        }

        .user-info span {
            font-size: 0.7rem;
            color: var(--gray);
        }

        .testimonial-stats {
            display: flex;
            justify-content: center;
            gap: 60px;
            background: linear-gradient(135deg, var(--dark), #1e293b);
            padding: 35px 40px;
            border-radius: 25px;
            text-align: center;
        }

        .testimonial-stats .stat {
            text-align: center;
        }

        .testimonial-stats .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
        }

        .testimonial-stats .stat-label {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* ==================== RESPONSIVE TESTIMONIAL ==================== */
        @media (max-width: 992px) {
            .testimonial-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .testimonial-stats {
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                gap: 20px;
                padding: 20px 15px;
                overflow-x: auto;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
            }
            
            .testimonial-stats .stat {
                flex-shrink: 0;
                min-width: 100px;
            }
            
            .testimonial-stats .stat-number {
                font-size: 1.5rem;
            }
            
            .testimonial-stats .stat-label {
                font-size: 0.7rem;
            }
        }

        @media (max-width: 576px) {
            .testimonial-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .testimonial-header h2 {
                font-size: 1.5rem;
            }
            
            .testimonial-header p {
                font-size: 0.85rem;
                padding: 0 15px;
            }
            
            .testimonial-section {
                padding: 50px 0;
            }
            
            .testimonial-card {
                padding: 18px;
            }
            
            .testimonial-text {
                font-size: 0.85rem;
            }
            
            .user-avatar i {
                font-size: 2rem;
            }
            
            .user-info h4 {
                font-size: 0.85rem;
            }
            
            /* TESTIMONIAL STATS */
            .testimonial-stats {
                gap: 15px;
                padding: 15px 12px;
            }
            
            .testimonial-stats .stat {
                min-width: 85px;
            }
            
            .testimonial-stats .stat-number {
                font-size: 1.3rem;
            }
            
            .testimonial-stats .stat-label {
                font-size: 0.65rem;
            }
        }

        /* Untuk HP yang sangat kecil (max-width: 400px) */
        @media (max-width: 400px) {
            .testimonial-stats {
                gap: 10px;
                padding: 12px 10px;
            }
            
            .testimonial-stats {
                gap: 15px;
                padding: 15px 12px;
            }
            
            .testimonial-stats .stat {
                min-width: 85px;
            }
            
            .testimonial-stats .stat-number {
                font-size: 1.2rem;
                margin-bottom: 4px;
            }
            
            .testimonial-stats .stat-label {
                font-size: 0.6rem;
            }
        }

        /* ==================== CLIENT SECTION ==================== */
        .client-section {
            padding: 60px 0 80px;
        }
        
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
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        /* WARNA ASLI TETAP PERTAHANKAN */
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
        }

        .client-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        /* TOOLTIP NAMA CLIENT */
        .client-hover {
            position: absolute;
            bottom: -40px;
            left: 0;
            right: 0;
            background: var(--primary);
            color: white;
            text-align: center;
            padding: 8px;
            font-size: 0.7rem;
            font-weight: 600;
            transition: bottom 0.3s ease;
            z-index: 10;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .client-card:hover .client-hover {
            bottom: 0;
        }

        /* ==================== ANIMASI SCROLL ==================== */
        .scroll-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.7s ease-out;
        }

        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-1 { transition-delay: 0.1s; }
        .delay-2 { transition-delay: 0.2s; }
        .delay-3 { transition-delay: 0.3s; }
        .delay-4 { transition-delay: 0.4s; }
        .delay-5 { transition-delay: 0.5s; }

        /* ==================== RESPONSIVE CLIENT GRID ==================== */
        @media (max-width: 992px) {
            .client-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 15px;
            }
            
            .client-card {
                padding: 15px;
                height: 90px;
            }
            
            .client-card img {
                max-height: 50px;
            }
        }

        @media (max-width: 768px) {
            .client-grid { 
                grid-template-columns: repeat(3, 1fr);
                gap: 12px;
            }
            
            .client-card {
                padding: 12px;
                height: 80px;
                border-radius: 10px;
            }
            
            .client-card img {
                max-height: 45px;
            }
            
            .client-hover {
                font-size: 0.65rem;
                padding: 6px;
                white-space: normal;
            }
        }

        @media (max-width: 480px) {
            .client-grid { 
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }
            
            .client-card {
                padding: 10px;
                height: 70px;
                border-radius: 8px;
            }
            
            .client-card img {
                max-height: 38px;
            }
            
            .client-hover {
                font-size: 0.6rem;
                padding: 5px;
            }
        }

        @media (max-width: 380px) {
            .client-grid { 
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
            }
            
            .client-card {
                padding: 8px;
                height: 65px;
            }
            
            .client-card img {
                max-height: 35px;
            }
        }

        /* ==================== FOOTER RESPONSIVE ==================== */
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

        @media (max-width: 767px) {
            footer {
                padding: 40px 0 20px;
            }
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 30px;
            }
            .socials {
                justify-content: center;
            }
            .footer-bottom {
                font-size: 0.7rem;
                text-align: center;
                padding: 0 15px;
            }
        }

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
$heroData = [];
while($row = mysqli_fetch_assoc($data)){
    $heroData[] = $row;
}
?>

<section class="banner-slider scroll-animate">
    <div class="slider-container">
        <div class="slider-wrapper" id="sliderWrapper">
            <?php foreach($heroData as $d): ?>
                <div class="slide">
                    <img src="assets/images/hero/<?php echo $d['gambar']; ?>" alt="Hero Image">
                </div>
            <?php endforeach; ?>
        </div>
        <button class="slider-btn prev-btn" id="prevBtn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-btn next-btn" id="nextBtn">
            <i class="fas fa-chevron-right"></i>
        </button>
        <div class="slider-dots">
            <?php foreach($heroData as $index => $d): ?>
                <span class="dot <?php echo $index == 0 ? 'active' : ''; ?>"></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="iklan-section scroll-animate">
    <div class="container">
        <div class="iklan-grid">
            <a href="cutting-sticker.php" class="iklan-card">
                <img src="assets/images/iklan/iklan1.png" alt="Cutting Sticker">
            </a>
            <a href="cetak-banner.php" class="iklan-card">
                <img src="assets/images/iklan/iklan2.png" alt="Cetak Banner">
            </a>
            <a href="jasa-plakat.php" class="iklan-card">
                <img src="assets/images/iklan/iklan3.png" alt="Jasa Plakat">
            </a>
        </div>
    </div>
</section>

<section class="product-section section-padding scroll-animate">
    <div class="container">
        <div class="produk-grid">
            <?php if(mysqli_num_rows($query) > 0): ?>
                <?php $productIndex = 0; while($p = mysqli_fetch_assoc($query)): $productIndex++; ?>
                    <div class="produk-card scroll-animate delay-<?php echo min($productIndex % 5 + 1, 5); ?>">
                        <a href="detail_produk.php?id=<?php echo $p['id']; ?>" class="produk-img-link">
                            <div class="produk-img">
                                <img src="assets/images/produk/<?php echo $p['gambar']; ?>" alt="<?php echo $p['nama_produk']; ?>">
                                <div class="produk-overlay">
                                    <span class="view-text">Lihat Detail</span>
                                </div>
                            </div>
                        </a>
                        <div class="produk-info">
                            <div class="category-tag"><?php echo $p['nama_kategori']; ?></div>
                            <h3><a href="detail_produk.php?id=<?php echo $p['id']; ?>" style="text-decoration:none;color:inherit;"><?php echo $p['nama_produk']; ?></a></h3>
                            <p class="produk-desc"><?php echo (strlen($p['deskripsi']) > 80) ? substr($p['deskripsi'], 0, 80) . "..." : $p['deskripsi']; ?></p>
                            <div class="price-action">
                                <div class="price-tag">Rp <?php echo number_format((int)$p['harga'], 0, ',', '.'); ?></div>
                                <a href="https://wa.me/628123456789?text=Halo saya ingin pesan <?php echo urlencode($p['nama_produk']); ?>" class="btn-wa" target="_blank"><i class="fab fa-whatsapp"></i> Pesan</a>
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

<section class="commitment-section scroll-animate">
    <div class="container">
        <div class="commitment-header">
            <span class="badge">Komitmen Kami</span>
            <h2>Kenapa <span>Pelanggan Percaya</span> kepada Kami?</h2>
            <p>Bukan hanya sekadar cetak, tapi solusi percetakan yang tepat untuk bisnis Anda</p>
        </div>
        <div class="commitment-grid">
            <div class="commitment-card scroll-animate delay-1">
                <div class="commitment-icon"><i class="fas fa-handshake"></i></div>
                <div class="commitment-content">
                    <h3>Garansi Kepuasan</h3>
                    <p>Hasil cetak tidak sesuai? Kami perbaiki GRATIS atau refund 100% uang Anda.</p>
                </div>
            </div>
            <div class="commitment-card scroll-animate delay-2">
                <div class="commitment-icon"><i class="fas fa-tachometer-alt"></i></div>
                <div class="commitment-content">
                    <h3>Prioritaskan Deadline</h3>
                    <p>Kami paham waktu adalah uang. Pengerjaan tepat waktu, bahkan untuk pesanan dadakan.</p>
                </div>
            </div>
            <div class="commitment-card scroll-animate delay-3">
                <div class="commitment-icon"><i class="fas fa-microphone-alt"></i></div>
                <div class="commitment-content">
                    <h3>Konsultasi Langsung</h3>
                    <p>Diskusikan kebutuhan cetak Anda langsung dengan tim expert kami, gratis!</p>
                </div>
            </div>
            <div class="commitment-card scroll-animate delay-4">
                <div class="commitment-icon"><i class="fas fa-truck"></i></div>
                <div class="commitment-content">
                    <h3>Pengiriman Terjamin</h3>
                    <p>Packing aman & ekspedisi terpercaya untuk memastikan pesanan sampai utuh.</p>
                </div>
            </div>
        </div>
        <div class="commitment-cta">
            <a href="https://wa.me/6282117773741" target="_blank" class="commitment-btn"><i class="fab fa-whatsapp"></i> Konsultasi Sekarang</a>
        </div>
    </div>
</section>

<section class="testimonial-section scroll-animate">
    <div class="container">
        <div class="testimonial-header">
            <span class="badge">Testimonial</span>
            <h2>Apa Kata <span>Pelanggan</span>?</h2>
            <p>Lebih dari 500+ pelanggan telah mempercayakan kebutuhan cetaknya kepada Lega DigiPrint</p>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card scroll-animate delay-1">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Hasil cetak sangat memuaskan, warna tajam dan proses cepat. Recommended banget untuk kebutuhan banner dan stiker!"</p>
                <div class="testimonial-user">
                    <div class="user-avatar"><i class="fas fa-user-circle"></i></div>
                    <div class="user-info"><h4>Andi Wijaya</h4><span>Owner Cafe Kopi Senja</span></div>
                </div>
            </div>
            <div class="testimonial-card scroll-animate delay-2">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Pelayanan ramah, harga bersaing, dan hasil cetak premium. Sudah 3x pesan di sini, selalu memuaskan!"</p>
                <div class="testimonial-user">
                    <div class="user-avatar"><i class="fas fa-user-circle"></i></div>
                    <div class="user-info"><h4>Siti Nurhaliza</h4><span>Marketing Event Organizer</span></div>
                </div>
            </div>
            <div class="testimonial-card scroll-animate delay-3">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Desain kami dikerjakan dengan detail, tepat waktu, dan komunikasinya sangat baik. Terima kasih Lega DigiPrint!"</p>
                <div class="testimonial-user">
                    <div class="user-avatar"><i class="fas fa-user-circle"></i></div>
                    <div class="user-info"><h4>Budi Santoso</h4><span>Digital Agency Owner</span></div>
                </div>
            </div>
        </div>
        <div class="testimonial-stats scroll-animate delay-4">
            <div class="stat"><span class="stat-number">500+</span><span class="stat-label">Pelanggan Puas</span></div>
            <div class="stat"><span class="stat-number">1000+</span><span class="stat-label">Proyek Selesai</span></div>
            <div class="stat"><span class="stat-number">99%</span><span class="stat-label">Ulasan Positif</span></div>
        </div>
    </div>
</section>

<!-- CLIENT SECTION DENGAN TOOLTIP NAMA -->
<section class="client-section scroll-animate">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 40px; font-weight: 800; color: #0f172a; font-size: 2rem;">Our Client</h2>
        <div class="client-grid">
            <?php
            $clients = mysqli_query($conn, "SELECT * FROM clients");
            $clientIndex = 0;
            while($cl = mysqli_fetch_array($clients)){
                $clientIndex++;
            ?>
            <div class="client-card scroll-animate delay-<?php echo min($clientIndex % 5 + 1, 5); ?>">
                <img src="assets/images/clients/<?php echo $cl['logo']; ?>" alt="<?php echo htmlspecialchars($cl['nama_client']); ?>">
                <div class="client-hover">
                    <span><?php echo htmlspecialchars($cl['nama_client']); ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<script>
// ==================== ANIMASI SCROLL ====================
document.addEventListener('DOMContentLoaded', function() {
    // Animasi scroll dengan Intersection Observer
    const animatedElements = document.querySelectorAll('.scroll-animate');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    animatedElements.forEach(element => {
        observer.observe(element);
    });
    
    // ==================== BANNER SLIDER ====================
    const sliderWrapper = document.getElementById('sliderWrapper');
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dots = document.querySelectorAll('.dot');
    const sliderContainer = document.querySelector('.slider-container');
    
    if (sliderWrapper && slides.length > 0) {
        let currentIndex = 0;
        const totalSlides = slides.length;
        let autoSlideInterval;
        
        function updateSlider() {
            sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }
        
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
        
        function startAutoSlide() {
            if (autoSlideInterval) clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(nextSlide, 5000);
        }
        
        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }
        
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        
        if (dots.length > 0) {
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => goToSlide(index));
            });
        }
        
        if (sliderContainer) {
            sliderContainer.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
            sliderContainer.addEventListener('mouseleave', () => startAutoSlide());
        }
        
        // Touch swipe support
        let touchStartX = 0;
        let touchEndX = 0;
        
        sliderContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, {passive: true});
        
        sliderContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchEndX - touchStartX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) prevSlide();
                else nextSlide();
            }
        }, {passive: true});
        
        startAutoSlide();
    }
});
</script>

<?php include "layout/footer.php"; ?>

</body>
</html>