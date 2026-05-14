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
            --primary: #38bdf8;
            --primary-dark: #0284c7;
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

        .logo {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--dark);
            text-decoration: none;
            letter-spacing: -1px;
        }

        .logo span { color: var(--primary); }

        /* Nav Links */
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
        }

        .nav-links li a:not(.btn-cta):hover { color: var(--primary); }

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

        .dropdown-content li a {
            padding: 12px 20px;
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .dropdown-content li a:hover {
            background: #f1f5f9;
            color: var(--primary) !important;
        }

        /* Desktop Hover */
        @media (min-width: 993px) {
            .dropdown:hover .dropdown-content { display: block; }
            .dropdown:hover .dropbtn i { transform: rotate(180deg); }
        }

        /* --- BUTTONS --- */
        .btn-cta {
            background: var(--primary);
            color: var(--white) !important;
            padding: 10px 24px;
            border-radius: 12px;
            font-weight: 700 !important;
            box-shadow: 0 10px 20px rgba(56, 189, 248, 0.2);
            transition: var(--transition);
        }

        .btn-cta:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
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
                padding: 100px 20px;
                transition: 0.4s;
                z-index: 999;
                box-shadow: -10px 0 30px rgba(0,0,0,0.1);
            }

            .nav-links.active { right: 0; }

            .dropdown { flex-direction: column; width: 100%; }
            
            .dropdown-content {
                position: static;
                display: none;
                width: 100%;
                box-shadow: none;
                background: #f8fafc;
                margin-top: 5px;
            }

            .dropdown.active .dropdown-content { display: block; }
            .dropdown.active .dropbtn i { transform: rotate(180deg); }
        }
    </style>
</head>
<body>

    <div class="overlay" id="overlay"></div>

    <header>
        <nav class="container">
            <a href="index.php" class="logo">
                <img src="assets/images/logo/logo1.png" alt="Logo LegaDigiPrint" style="height: 40px; vertical-align: middle; margin-right: 8px;">
                Lega<span>DigiPrint</span>
            </a>

            <ul class="nav-links" id="nav-menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang.php">Tentang Kami</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                
                <li class="dropdown">
                    <a href="produk.php" class="dropbtn">
                        Produk <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-content">
                        <li><a href="produk.php?kat=outdoor-indoor">Banner</a></li>
                        <li><a href="produk.php?kat=cutting-sticker">Cutting Sticker</a></li>
                        <li><a href="produk.php?kat=outdoor-indoor">Plakat</a></li>
                        <li><a href="produk.php?kat=outdoor-indoor">Merchandise</a></li>
                    </ul>
                </li>

                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="https://wa.me/6282117773741" class="btn-cta">Order Sekarang</a></li>
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

        // Dropdown Click (untuk Mobile)
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            const dropBtn = dropdown.querySelector('.dropbtn');
            dropBtn.addEventListener('click', (e) => {
                if (window.innerWidth <= 992) {
                    e.preventDefault(); 
                    dropdown.classList.toggle('active');
                }
            });
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
    </script>

</body>
</html>