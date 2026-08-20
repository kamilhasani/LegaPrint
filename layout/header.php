<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Lega DigiPrint - Jasa Percetakan Jakarta</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* --- RESET & VARIABLES --- */
        :root {
            --primary: #004ea2;
            --primary-dark: #003875;
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
            background: rgba(255, 255, 255, 0.85);
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
            align-items: center;
            width: 100%;
            position: relative;
        }

        /* Logo Ujung Kiri */
        .logo {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            margin-right: auto;
        }

        .logo-text-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
        }

        .logo-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #1e293b;
            line-height: 1.1;
        }

        .logo-title span {
            color: var(--primary);
        }

        .logo-subtitle {
            font-size: 0.75rem;
            font-weight: 500;
            color: #64748b;
            letter-spacing: 1px;
            margin-top: 2px;
        }

        /* Nav Links Tengah */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 35px;
            list-style: none;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
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

        .nav-links li a:hover::after,
        .nav-links li a.active::after {
            width: 100%;
        }

        .nav-links li a.active {
            color: var(--primary);
        }

        /* --- SOCIAL MEDIA ICONS (DESKTOP) --- */
        .header-socials {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: auto;
        }

        .social-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f1f5f9;
            color: var(--dark);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .social-btn:hover {
            color: var(--white);
            transform: translateY(-3px);
        }

        .social-btn.whatsapp:hover { background: #25D366; }
        .social-btn.instagram:hover { background: #E4405F; }
        .social-btn.facebook:hover { background: #1877F2; }
        .social-btn.tiktok:hover { background: #000000; }

        /* Hide Mobile Social Section di Desktop */
        .mobile-socials {
            display: none;
        }

        /* --- TOGGLE BUTTON --- */
        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--dark);
            margin-left: 15px;
        }

        /* --- RESPONSIVE MOBILE (< 992px) --- */
        @media (max-width: 992px) {
            .mobile-toggle { display: block; }
            .header-socials { display: none; } /* Sembunyikan medsol header atas */

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                left: auto;
                transform: none;
                width: 280px;
                height: 100vh;
                background: var(--white);
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start; 
                padding: 90px 24px 30px;
                transition: 0.4s ease-in-out;
                z-index: 999;
                box-shadow: -10px 0 30px rgba(0,0,0,0.1);
                gap: 15px;
            }

            .nav-links.active { right: 0; }

            .nav-links li {
                width: 100%;
                text-align: left;
            }

            .nav-links li a {
                display: block;
                width: 100%;
                padding: 10px 0;
            }

            /* Social Media Section di Drawer Mobile */
            .mobile-socials {
                display: block;
                margin-top: auto;
                width: 100%;
                padding-top: 20px;
                border-top: 1px solid #e2e8f0;
            }

            .mobile-socials p {
                font-size: 0.8rem;
                font-weight: 700;
                color: #64748b;
                margin-bottom: 12px;
                text-transform: uppercase;
            }

            .mobile-social-icons {
                display: flex;
                gap: 10px;
            }

            .mobile-social-icons .social-btn {
                background: #f1f5f9;
            }
        }
    </style>
</head>
<body>

    <div class="overlay" id="overlay"></div>

    <header>
        <nav class="container">
            <!-- LOGO -->
            <a href="index.php" class="logo">
                <img src="assets/images/logo/logo.jpeg" alt="Logo LegaDigiPrint" style="height: 40px; vertical-align: middle; margin-right: 8px;">
                <div class="logo-text-wrapper">
                    <span class="logo-title">Lega<span>DigiPrint</span></span>
                    <span class="logo-subtitle">Digital Printing</span>
                </div>
            </a>

            <!-- NAV MENU -->
            <ul class="nav-links" id="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="tentang.php">About</a></li>
                <li><a href="galeri.php">Gallery</a></li>
                <li><a href="produk.php">Product</a></li>
                <li><a href="kontak.php">Contact</a></li>

                <!-- SOCIAL MEDIA KHUSUS MOBILE DRAWER -->
                <li class="mobile-socials">
                    <p>Ikuti Kami</p>
                    <div class="mobile-social-icons">
                        <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="social-btn whatsapp" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://instagram.com/legadigiprint" target="_blank" rel="noopener noreferrer" class="social-btn instagram" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://facebook.com/legadigiprint" target="_blank" rel="noopener noreferrer" class="social-btn facebook" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://tiktok.com/@legadigiprint" target="_blank" rel="noopener noreferrer" class="social-btn tiktok" title="TikTok">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </li>
            </ul>

            <!-- SOCIAL MEDIA DESKTOP -->
            <div class="header-socials">
                <a href="https://wa.me/6282117773741?text=Halo%20Lega%20DigiPrint,%20saya%20ingin%20bertanya%20mengenai%20layanan%20percetakan." target="_blank" rel="noopener noreferrer" class="social-btn whatsapp" title="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://instagram.com/legadigiprint" target="_blank" rel="noopener noreferrer" class="social-btn instagram" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://facebook.com/legadigiprint" target="_blank" rel="noopener noreferrer" class="social-btn facebook" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://tiktok.com/@legadigiprint" target="_blank" rel="noopener noreferrer" class="social-btn tiktok" title="TikTok">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>

            <!-- MOBILE TOGGLE BUTTON -->
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
            }
        });

        // Close when overlay clicked
        overlay.addEventListener('click', () => {
            navMenu.classList.remove('active');
            overlay.classList.remove('active');
            icon.classList.replace('fa-times', 'fa-bars');
        });

        // Close when link clicked
        const navItems = document.querySelectorAll('.nav-links a');
        navItems.forEach(item => {
            item.addEventListener('click', () => {
                navMenu.classList.remove('active');
                overlay.classList.remove('active');
                icon.classList.replace('fa-times', 'fa-bars');
            });
        });

        // AUTO ACTIVE NAVBAR
        const currentPage = window.location.pathname.split("/").pop() || "index.php";
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