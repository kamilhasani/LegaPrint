<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Lega DigiPrint - Jasa Percetakan Tangerang</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* --- RESET & VARIABLES --- */
        :root {
            --primary: #004ea2;
            --primary-dark: #004ea2;
            --dark: #0f172a;
            --text-main: #1e293b;
            --white: #ffffff;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 25px;
        }

        /* --- OVERLAY --- */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: none;
            z-index: 998;
        }

        .overlay.active {
            display: block;
        }

        /* --- HEADER NAVIGATION --- */
        header {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            height: 80px;
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        /* Mengatur kontainer utama logo agar gambar dan teks sejajar horizontal */
        .logo {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }

        /* Membuat teks judul dan subtitle menyusun ke bawah (vertikal) */
        .logo-text-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left; /* Memastikan teks rata kiri */
        }

        /* Ukuran dan gaya teks utama (sesuaikan dengan css lamo kamu jika ada) */
        .logo-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #1e293b; /* Warna gelap utama, sesuaikan sendiri */
            line-height: 1.1; /* Merapatkan jarak bawah sedikit */
        }

        .logo-title span {
            color: var(--primary); /* Mengikuti warna biru/warna tema utama */
        }

        /* Ukuran dan gaya tulisan di bawahnya (Digital Printing) */
        .logo-subtitle {
            font-size: 0.75rem; /* Ukuran lebih kecil */
            font-weight: 500;
            color: #64748b; /* Warna abu-abu elegan */
            letter-spacing: 1px; /* Memberikan sedikit jarak antar huruf agar rapi */
            margin-top: 2px; /* Jarak halus dari tulisan utama di atasnya */
        }

        /* Nav Links (Desktop) */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 35px;
            list-style: none;
        }

        .nav-links li a {
            text-decoration: none;
            color: var(--text-main);
            font-weight: 600;
            font-size: 0.95rem;
            position: relative;
            transition: var(--transition);
            padding: 6px 0;
        }

        /* GARIS ANIMASI HOVER */
        .nav-links li a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 0%;
            height: 2px;
            background: var(--primary);
            border-radius: 10px;
            transition: 0.3s ease;
        }

        .nav-links li a:hover::after {
            width: 100%;
        }

        /* TAB AKTIF */
        .nav-links li a.active {
            color: var(--primary);
        }

        .nav-links li a.active::after {
            width: 100%;
        }

        /* --- DROPDOWN SYSTEM --- */
        .dropdown {
            position: relative;
            display: flex;
            align-items: center;
        }

        .dropbtn {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .dropbtn i {
            font-size: 0.8rem;
            transition: transform 0.3s;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background: var(--white);
            min-width: 200px;
            top: 100%;
            left: 0;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 10px 0;
            list-style: none;
            z-index: 1100;
            margin-top: 10px;
        }

        .dropdown-content li { width: 100%; }

        /* --- BUTTONS & TOGGLE (TAMPILAN LAPTOP / DESKTOP) --- */
        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--dark);
        }

        .btn-cta {
            background: var(--primary);
            color: var(--white) !important;
            min-width: 140px; 
            padding: 12px 28px; 
            border-radius: 50px;             
            font-size: 1.05rem; 
            font-weight: 700 !important;
            text-decoration: none;           
            box-shadow: 0 8px 20px rgba(56, 189, 248, 0.3); 
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;                       
            border: none;                    
            cursor: pointer;
            transition: var(--transition); 
        }

        .btn-cta:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);     
            box-shadow: 0 12px 24px rgba(56, 189, 248, 0.45); 
        }

        .btn-cta i, 
        .btn-cta img {
            font-size: 1.2rem;               
            height: 1.2rem;                  
            width: auto;
        }

        /* Desktop Hover Dropdown */
        @media (min-width: 993px) {
            .dropdown:hover .dropdown-content { display: block; }
            .dropdown:hover .dropbtn i { transform: rotate(180deg); }
        }


        /* --- RESPONSIVE MOBILE (< 992px) --- */
        @media (max-width: 992px) {
        .mobile-toggle { display: block; }

        .nav-links {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: var(--white);
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start; 
            padding: 100px 24px;
            transition: 0.4s;
            z-index: 999;
            box-shadow: -10px 0 30px rgba(0,0,0,0.1);
            gap: 15px;
        }

        .nav-links li {
            width: 100%;
            text-align: left;
        }

        .nav-links li a {
            display: block;
            width: 100%;
            padding: 10px 0;
            text-align: left;
        }

        .nav-links.active { right: 0; }

        .dropdown { 
            flex-direction: column; 
            width: 100%; 
            align-items: flex-start; 
        }
        
        .dropbtn {
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between; 
            align-items: center;
            padding: 10px 0;
        }
        
        .dropdown-content {
            position: static;
            display: none;
            width: 100%;
            box-shadow: none;
            background: #f8fafc;
            margin-top: 5px;
            padding-left: 15px; 
        }

        .dropdown-content a {
            text-align: left;
            padding: 8px 0;
        }

        .dropdown.active .dropdown-content { display: block; }
        .dropdown.active .dropbtn i { transform: rotate(180deg); }

        .nav-links .login-item,
        .nav-links li:last-child { 
            margin-top: auto; 
            width: 100%;
            display: flex;
            justify-content: center; 
            padding-top: 20px;
        }

        .nav-links .login-item a,
        .nav-links li:last-child a {
            text-align: center !important;
            display: inline-block;
            width: 85%;
            padding: 12px 0;
            background: #004ea2; 
            color: #ffffff !important;
            border-radius: 25px; 
        }
    }
    </style>
</head>
<body>

    <div class="overlay" id="overlay"></div>

    <header>
        <nav class="container">
            <a href="index.php" class="logo">
                <img src="assets/images/logo/logo.jpeg" alt="Logo LegaDigiPrint" style="height: 40px; vertical-align: middle; margin-right: 8px;">
                <div class="logo-text-wrapper">
                    <span class="logo-title">Lega<span>DigiPrint</span></span>
                    <span class="logo-subtitle">Digital Printing</span>
                </div>
            </a>

            <ul class="nav-links" id="nav-menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang.php">Tentang Kami</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="produk.php">Produk </a></li>

                <li><a href="kontak.php">Kontak</a></li>
                <li class="mobile-only">
                <a href="../legaprint/admin/login.php" class="btn-cta">
                    <i class="fas fa-key"></i> Login
                </a>
            </li>
            </ul>

            <div class="mobile-toggle" id="mobile-btn">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <script>
        const mobileBtn = document.getElementById('mobile-btn');
        const navMenu = document.getElementById('nav-menu');
        const overlay = document.getElementById('overlay');
        const icon = mobileBtn.querySelector('i');

        // Toggle Menu Mobile
        mobileBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            overlay.classList.toggle('active');
            
            if (navMenu.classList.contains('active')) {
                icon.classList.replace('fa-bars', 'fa-times');
            } else {
                icon.classList.replace('fa-times', 'fa-bars');
                document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('active'));
            }
        });


        // Close when overlay clicked
        overlay.addEventListener('click', () => {
            navMenu.classList.remove('active');
            overlay.classList.remove('active');
            icon.classList.replace('fa-times', 'fa-bars');
            document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('active'));
        });

        // Close when link clicked (except dropdown button)
        const navItems = document.querySelectorAll('.nav-links a');
        navItems.forEach(item => {
            item.addEventListener('click', (e) => {
                if (!item.classList.contains('dropbtn')) {
                    navMenu.classList.remove('active');
                    overlay.classList.remove('active');
                    icon.classList.replace('fa-times', 'fa-bars');
                }
            });
        });
        // AUTO ACTIVE NAVBAR
    const currentPage = window.location.pathname.split("/").pop();
    const navLinks = document.querySelectorAll(".nav-links a");
    navLinks.forEach(link => {
        const linkPage = link.getAttribute("href");
        if (linkPage === currentPage) {
            link.classList.add("active");
        }
    });
    </script>

</body>
</html>