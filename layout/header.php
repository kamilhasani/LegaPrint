<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lega DigiPrint - Jasa Percetakan Tangerang</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* --- RESET & VARIABLES --- */
        :root {
            --primary: #38bdf8; /* Warna Biru Sky Lega DigiPrint */
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
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 25px;
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
            transition: var(--transition);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        /* Logo */
        .logo {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--dark);
            text-decoration: none;
            letter-spacing: -1px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .logo span {
            color: var(--primary);
        }

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

        /* Animasi Underline */
        .nav-links li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--primary);
            transition: var(--transition);
        }

        .nav-links li a:hover {
            color: var(--primary);
        }

        .nav-links li a:hover::after {
            width: 100%;
        }

        /* Button CTA */
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
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(2, 132, 199, 0.3);
        }

        .btn-cta::after {
            display: none; /* Hilangkan underline untuk button */
        }

        /* Hamburger Menu (Mobile) */
        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--dark);
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 768px) {
            header { height: 70px; }
            
            .nav-links {
                display: none; /* Sembunyikan menu di mobile untuk diganti sidebar nantinya */
            }

            .mobile-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>

    <header>
        <nav class="container">
            <a href="index.php" class="logo">
                Lega<span>DigiPrint</span>
            </a>

            <ul class="nav-links">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang.php">Tentang Kami</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="https://wa.me/6281234567890" class="btn-cta">Order Sekarang</a></li>
            </ul>

            <div class="mobile-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>