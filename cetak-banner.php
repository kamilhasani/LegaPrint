<?php include "layout/header.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>Lega DigiPrint - Jasa Cetak Banner Professional</title>

    <style>
        /* ============================================================
                   VARIABLES
                   ============================================================ */
        :root {
            --primary: #004ea2;
            --primary-dark: #003d82;
            --primary-light: #3b82f6;
            --primary-gradient: linear-gradient(135deg, #004ea2 0%, #3b82f6 100%);
            --secondary: #38bdf8;
            --dark: #0f172a;
            --dark-soft: #1e293b;
            --gray: #64748b;
            --gray-light: #94a3b8;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            --shadow-hover: 0 20px 50px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --radius: 16px;
        }

        /* ============================================================
                   RESET
                   ============================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--white);
            color: var(--dark-soft);
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
        }

        html {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        /* ============================================================
                   SECTION HEADER
                   ============================================================ */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-tag {
            display: inline-block;
            background: rgba(0, 78, 162, 0.1);
            color: var(--primary);
            padding: 5px 18px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 15px;
            border: 1px solid rgba(0, 78, 162, 0.1);
        }

        .section-header h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .section-header h2 span {
            color: var(--primary);
        }

        .section-header p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .section-divider {
            width: 60px;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 3px;
            margin: 0 auto 20px;
        }

        /* ============================================================
                   HERO SECTION
                   ============================================================ */
        .hero {
            position: relative;
            width: 100%;
            min-height: 80vh;
            background: linear-gradient(135deg, #0a0f2a 0%, #0f172a 50%, #1a1a3e 100%);
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-bg-pattern {
            position: absolute;
            inset: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 78, 162, 0.06) 0%, transparent 40%),
                radial-gradient(circle at 60% 80%, rgba(59, 130, 246, 0.05) 0%, transparent 30%);
            pointer-events: none;
        }

        .hero-grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            padding: 40px 0;
            width: 100%;
        }

        .hero-text {
            animation: fadeInUp 0.6s ease;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(59, 130, 246, 0.15);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 50px;
            border: 1px solid rgba(59, 130, 246, 0.3);
            margin-bottom: 25px;
        }

        .hero-badge .badge-dot {
            width: 8px;
            height: 8px;
            background: var(--secondary);
            border-radius: 50%;
            animation: pulseDot 2s ease-in-out infinite;
        }

        @keyframes pulseDot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.5); opacity: 0.5; }
        }

        .hero-badge span {
            color: var(--secondary);
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--white);
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero h1 span {
            background: linear-gradient(135deg, var(--secondary), var(--primary-light));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero p {
            max-width: 520px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .hero-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--primary-gradient);
            color: var(--white);
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            transition: var(--transition);
            box-shadow: 0 4px 20px rgba(0, 78, 162, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0, 78, 162, 0.4);
        }

        .btn-primary i {
            transition: var(--transition);
        }

        .btn-primary:hover i {
            transform: translateX(5px);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            color: var(--white);
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .btn-outline:hover {
            border-color: var(--secondary);
            background: rgba(59, 130, 246, 0.1);
            transform: translateY(-3px);
        }

        .hero-image {
            position: relative;
            animation: fadeInUp 0.6s ease 0.2s both;
        }

        .hero-image .image-wrapper {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        }

        .hero-image .image-wrapper img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .hero-image .floating-badge {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 12px 18px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            animation: floatBadge 3s ease-in-out infinite;
        }

        .floating-badge-1 {
            bottom: -15px;
            left: -20px;
            animation-delay: 0s;
        }

        .floating-badge-2 {
            top: -15px;
            right: -20px;
            animation-delay: 1.5s;
        }

        @keyframes floatBadge {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .floating-badge .fb-icon {
            width: 40px;
            height: 40px;
            background: rgba(59, 130, 246, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .floating-badge .fb-icon i {
            font-size: 1.2rem;
            color: var(--secondary);
        }

        .floating-badge .fb-text {
            color: var(--white);
        }

        .floating-badge .fb-text strong {
            display: block;
            font-size: 0.9rem;
        }

        .floating-badge .fb-text span {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .hero-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            line-height: 0;
            z-index: 3;
            pointer-events: none;
        }

        .hero-wave svg {
            width: 100%;
            height: 60px;
            display: block;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================================================
                   STATS SECTION
                   ============================================================ */
        .stats-section {
            padding: 60px 0;
            background: var(--white);
            border-bottom: 1px solid #e8e4dc;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            text-align: center;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-card .number {
            display: block;
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1;
        }

        .stat-card .label {
            font-size: 0.85rem;
            color: var(--gray);
            margin-top: 8px;
            display: block;
        }

        .stat-divider {
            width: 1px;
            height: 50px;
            background: #e2e8f0;
        }

        /* ============================================================
                   ABOUT SECTION
                   ============================================================ */
        .about-section {
            padding: 80px 0;
            background: var(--white);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-image {
            position: relative;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-hover);
        }

        .about-image img {
            width: 100%;
            height: 350px;
            object-fit: cover;
        }

        .about-image .floating-badge-about {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: var(--white);
            padding: 12px 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .floating-badge-about i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .floating-badge-about span {
            font-weight: 700;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .about-content .about-tag {
            display: inline-block;
            background: rgba(0, 78, 162, 0.1);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .about-content h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .about-content h2 span {
            color: var(--primary);
        }

        .about-content p {
            color: var(--gray);
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .about-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .about-features .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: var(--dark-soft);
        }

        .about-features .feature-item i {
            color: var(--primary);
            font-size: 1rem;
        }

        /* ============================================================
                   SERVICES SECTION
                   ============================================================ */
        .services-section {
            padding: 80px 0;
            background: var(--bg-light);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .service-card {
            background: var(--white);
            padding: 30px 25px;
            border-radius: var(--radius);
            text-align: center;
            transition: var(--transition);
            border: 1px solid #e2e8f0;
        }

        .service-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: var(--shadow-hover);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: rgba(0, 78, 162, 0.08);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: var(--transition);
        }

        .service-card:hover .service-icon {
            background: var(--primary-gradient);
        }

        .service-card:hover .service-icon i {
            color: var(--white);
        }

        .service-icon i {
            font-size: 2rem;
            color: var(--primary);
            transition: var(--transition);
        }

        .service-card h3 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .service-card p {
            font-size: 0.85rem;
            color: var(--gray);
            line-height: 1.6;
        }

        /* ============================================================
                   GALLERY SECTION
                   ============================================================ */
        .gallery-section {
            padding: 80px 0;
            background: var(--white);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .gallery-item {
            position: relative;
            border-radius: var(--radius);
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 4/3;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.08);
        }

        .gallery-item .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.7);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
            padding: 20px;
            text-align: center;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay i {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 10px;
        }

        .gallery-overlay h4 {
            color: var(--white);
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .gallery-overlay p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
        }

        /* ============================================================
                   CTA SECTION
                   ============================================================ */
        .cta-section {
            padding: 70px 0;
            background: var(--primary-gradient);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
        }

        .cta-content {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            color: var(--white);
            margin-bottom: 15px;
            font-weight: 800;
        }

        .cta-content p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.05rem;
            margin-bottom: 30px;
        }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #25D366;
            color: var(--white);
            padding: 16px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            transition: var(--transition);
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
        }

        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.4);
            gap: 18px;
        }

        /* ============================================================
                   LIGHTBOX
                   ============================================================ */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(8px);
            cursor: pointer;
        }

        .lightbox-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 12px;
            animation: zoomIn 0.3s ease;
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        .lightbox-close {
            position: fixed;
            top: 30px;
            right: 40px;
            color: white;
            font-size: 45px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            z-index: 10000;
        }

        .lightbox-close:hover {
            color: var(--secondary);
            transform: scale(1.1);
        }

        /* ============================================================
                   RESPONSIVE - TANPA MENGUBAH DESAIN
                   ============================================================ */

        /* Tablet */
        @media (max-width: 992px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-actions {
                justify-content: center;
            }

            .hero-image .image-wrapper img {
                height: 300px;
            }

            .floating-badge-1 {
                left: 10px;
                bottom: -10px;
            }

            .floating-badge-2 {
                right: 10px;
                top: -10px;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-image img {
                height: 280px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .stat-divider {
                display: none;
            }

            .services-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        /* Mobile */
        @media (max-width: 768px) {
            .hero {
                min-height: auto;
                padding: 40px 0;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 0.9rem;
            }

            .hero-image .image-wrapper img {
                height: 220px;
            }

            .floating-badge {
                padding: 8px 12px;
            }

            .floating-badge .fb-icon {
                width: 30px;
                height: 30px;
            }

            .floating-badge .fb-icon i {
                font-size: 0.9rem;
            }

            .floating-badge .fb-text strong {
                font-size: 0.8rem;
            }

            .floating-badge .fb-text span {
                font-size: 0.6rem;
            }

            .section-header h2 {
                font-size: 1.6rem;
            }

            .about-content h2 {
                font-size: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-card .number {
                font-size: 1.8rem;
            }

            .stat-card .label {
                font-size: 0.75rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .service-card {
                padding: 25px 20px;
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }

            .gallery-item {
                aspect-ratio: 4/3;
            }

            .cta-content h2 {
                font-size: 1.6rem;
            }

            .cta-content p {
                font-size: 0.9rem;
            }

            .cta-btn {
                padding: 12px 28px;
                font-size: 0.9rem;
            }

            .hero-wave svg {
                height: 35px;
            }

            .about-features {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .about-image .floating-badge-about {
                padding: 8px 15px;
            }

            .floating-badge-about i {
                font-size: 1.2rem;
            }

            .floating-badge-about span {
                font-size: 0.8rem;
            }
        }

        /* Mobile Kecil */
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 1.6rem;
            }

            .hero-badge {
                padding: 6px 14px;
            }

            .hero-badge span {
                font-size: 0.7rem;
            }

            .hero p {
                font-size: 0.85rem;
            }

            .btn-primary, .btn-outline {
                padding: 10px 20px;
                font-size: 0.85rem;
                width: 100%;
                justify-content: center;
            }

            .hero-actions {
                flex-direction: column;
                width: 100%;
            }

            .hero-image .image-wrapper img {
                height: 180px;
            }

            .floating-badge-1 {
                left: 5px;
                bottom: -5px;
            }

            .floating-badge-2 {
                right: 5px;
                top: -5px;
            }

            .floating-badge .fb-text strong {
                font-size: 0.7rem;
            }

            .floating-badge .fb-text span {
                font-size: 0.55rem;
            }

            .section-header h2 {
                font-size: 1.3rem;
            }

            .section-header p {
                font-size: 0.85rem;
                padding: 0 10px;
            }

            .about-image img {
                height: 200px;
            }

            .about-content h2 {
                font-size: 1.3rem;
            }

            .about-content p {
                font-size: 0.85rem;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 10px;
            }

            .stat-card .number {
                font-size: 1.4rem;
            }

            .stat-card .label {
                font-size: 0.65rem;
            }

            .service-card {
                padding: 20px 15px;
            }

            .service-icon {
                width: 55px;
                height: 55px;
            }

            .service-icon i {
                font-size: 1.5rem;
            }

            .service-card h3 {
                font-size: 1rem;
            }

            .service-card p {
                font-size: 0.8rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

            .gallery-overlay i {
                font-size: 1.8rem;
            }

            .gallery-overlay h4 {
                font-size: 0.85rem;
            }

            .gallery-overlay p {
                font-size: 0.7rem;
            }

            .cta-content h2 {
                font-size: 1.3rem;
            }

            .cta-content p {
                font-size: 0.85rem;
            }

            .cta-btn {
                padding: 10px 20px;
                font-size: 0.85rem;
                width: 100%;
                justify-content: center;
            }
        }

        /* HP Sangat Kecil */
        @media (max-width: 380px) {
            .hero h1 {
                font-size: 1.3rem;
            }

            .hero p {
                font-size: 0.8rem;
            }

            .hero-image .image-wrapper img {
                height: 150px;
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .stat-card .number {
                font-size: 1.2rem;
            }

            .stat-card .label {
                font-size: 0.6rem;
            }
        }
    </style>
</head>
<body>

    <!-- ============================================================
    HERO SECTION
    ============================================================ -->
    <section class="hero">
        <div class="hero-bg-pattern"></div>

        <div class="container">
            <div class="hero-grid">
                <!-- Left Content -->
                <div class="hero-text">
                    <div class="hero-badge">
                        <span class="badge-dot"></span>
                        <span>Cetak Banner Profesional</span>
                    </div>
                    <h1>Solusi Banner <span>Untuk Bisnis Anda</span></h1>
                    <p>Cetak banner indoor & outdoor dengan kualitas premium, warna tajam, dan material tahan lama untuk promosi maksimal.</p>
                    <div class="hero-actions">
                        <a href="#gallery" class="btn-primary">
                            Lihat Portofolio <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="kontak.php" class="btn-outline">
                            <i class="fab fa-whatsapp"></i> Konsultasi
                        </a>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="hero-image">
                    <div class="image-wrapper">
                        <img src="assets/images/display/bannerrjualrumah.jpeg" alt="Hasil Cetak Banner Lega DigiPrint">
                    </div>
                    <div class="floating-badge floating-badge-1">
                        <div class="fb-icon"><i class="fas fa-medal"></i></div>
                        <div class="fb-text">
                            <strong>Premium Quality</strong>
                            <span>Hasil cetak terbaik</span>
                        </div>
                    </div>
                    <div class="floating-badge floating-badge-2">
                        <div class="fb-icon"><i class="fas fa-rocket"></i></div>
                        <div class="fb-text">
                            <strong>1-2 Hari</strong>
                            <span>Pengerjaan cepat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#f8fafc" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,208C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- ============================================================
    STATS SECTION
    ============================================================ -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="number">500+</span>
                    <span class="label">Klien Puas</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-card">
                    <span class="number">1000+</span>
                    <span class="label">Banner Dicetak</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-card">
                    <span class="number">1-2 Hari</span>
                    <span class="label">Pengerjaan Cepat</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-card">
                    <span class="number">100%</span>
                    <span class="label">Kualitas Terjamin</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    ABOUT SECTION
    ============================================================ -->
    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-image">
                    <img src="assets/images/iklan/iklan2.png" alt="Cetak Banner Lega DigiPrint">
                    <div class="floating-badge-about">
                        <i class="fas fa-award"></i>
                        <span>Best Quality Printing</span>
                    </div>
                </div>
                <div class="about-content">
                    <span class="about-tag">Tentang Kami</span>
                    <h2>Cetak Banner <span>Berkualitas</span> untuk Promosi Anda</h2>
                    <p>Lega DigiPrint menyediakan layanan cetak banner profesional untuk berbagai kebutuhan promosi bisnis, event, toko, hingga branding perusahaan. Kami menggunakan mesin cetak resolusi tinggi dengan material premium yang tahan cuaca dan warna tajam.</p>
                    <div class="about-features">
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Bahan Berkualitas</div>
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Warna Tajam & Tahan Lama</div>
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Harga Kompetitif</div>
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Pengerjaan Cepat</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    SERVICES SECTION
    ============================================================ -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Keunggulan Kami</span>
                <h2>Mengapa Memilih <span>Lega DigiPrint</span>?</h2>
                <div class="section-divider"></div>
                <p>Kami memberikan layanan terbaik untuk setiap proyek cetak banner Anda</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-palette"></i></div>
                    <h3>Desain Menarik</h3>
                    <p>Tim desainer profesional siap membantu membuat banner yang menarik dan efektif</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-fill-drip"></i></div>
                    <h3>Warna Akurat</h3>
                    <p>Hasil cetak dengan warna tajam dan akurat sesuai desain yang diinginkan</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-water"></i></div>
                    <h3>Tahan Cuaca</h3>
                    <p>Material premium yang tahan terhadap panas matahari dan hujan</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-rocket"></i></div>
                    <h3>Proses Cepat</h3>
                    <p>Pengerjaan cepat tanpa mengurangi kualitas hasil cetak banner</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    GALLERY SECTION
    ============================================================ -->
    <section class="gallery-section" id="gallery">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Portofolio</span>
                <h2>Hasil <span>Cetak Banner</span> Terbaik</h2>
                <div class="section-divider"></div>
                <p>Beberapa contoh hasil cetak banner berkualitas dari Lega DigiPrint</p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="assets/images/display/bannerrjualrumah.jpeg" alt="Banner Jual Rumah">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Banner Jual Rumah</h4>
                        <p>Banner properti dengan desain profesional</p>
                    </div>
                </div>

                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="assets/images/display/bannerstand.jpeg" alt="Banner Stand Event">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Banner Event/Stand</h4>
                        <p>Cocok untuk pameran dan seminar</p>
                    </div>
                </div>

                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="assets/images/display/BANNER.jpeg" alt="Banner Promosi">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Banner Promosi Toko</h4>
                        <p>Banner promosi dengan desain menarik</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    CTA SECTION
    ============================================================ -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Butuh Banner untuk Promosi Usaha?</h2>
                <p>Konsultasikan kebutuhan cetak banner Anda dengan tim profesional kami</p>
                <a href="https://wa.me/6282117773741" target="_blank" class="cta-btn">
                    <i class="fab fa-whatsapp"></i> Pesan Sekarang
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================
    LIGHTBOX MODAL
    ============================================================ -->
    <div id="lightboxModal" class="lightbox-modal" onclick="closeLightbox()">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img class="lightbox-content" id="lightboxImage" alt="Preview">
    </div>

    <?php include "layout/footer.php"; ?>

    <script>
        function openLightbox(element) {
            const img = element.querySelector('img');
            if (!img) return;

            const modal = document.getElementById('lightboxModal');
            const modalImg = document.getElementById('lightboxImage');

            modal.style.display = 'block';
            modalImg.src = img.src;
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const modal = document.getElementById('lightboxModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>

</body>
</html>