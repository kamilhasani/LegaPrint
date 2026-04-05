<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Lega DigiPrint</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
    :root {
            --admin-primary: #38bdf8; /* Biru terang untuk aksen */
            --admin-dark: #ffffff;
            --admin-bg: #f8fafc;
            /* Diubah menjadi Navy Gelap sesuai gambar */
            --admin-sidebar: #0f172a; 
            --text-sidebar: #94a3b8; /* Warna teks abu-abu saat tidak aktif */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--admin-bg);
            display: flex;
        }

        /* Sidebar Styling - Update Warna ke Dark Mode */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: var(--admin-sidebar);
            border-right: none; /* Hapus border karena sudah gelap */
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
            z-index: 100;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 10px;
        }

        .sidebar-brand span {
            color: var(--admin-primary);
        }

        /* Garis pemisah tipis di bawah brand seperti di gambar */
        .sidebar-brand::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 1px;
            background: rgba(255,255,255,0.05);
            left: 0;
            top: 85px;
        }

        .nav-menu {
            list-style: none;
            margin-top: 20px;
        }

        .nav-item {
            margin-bottom: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px 18px;
            text-decoration: none;
            color: var(--text-sidebar);
            font-weight: 500;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link i {
            width: 20px;
            font-size: 1.2rem;
            text-align: center;
        }

        /* Efek Hover & Active sesuai gambar */
        .nav-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
        }

        .nav-link.active {
            background: var(--admin-primary);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(56, 189, 248, 0.2);
        }

        .nav-link.active i {
            color: #ffffff;
        }

        /* Main Content Area */
        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
        }

        /* Topbar Styling */
        .topbar {
            height: 70px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        @media (max-width: 768px) {
            .sidebar { width: 80px; padding: 25px 15px; }
            .sidebar-brand span, .nav-link span { display: none; }
            .main-content { margin-left: 80px; width: calc(100% - 80px); }
            .nav-link { justify-content: center; padding: 15px; }
            .nav-link i { margin: 0; font-size: 1.4rem; }
        }

        /* Main Content Area */
        .main-content {
            margin-left: 260px; /* Lebar sidebar */
            width: calc(100% - 260px);
            min-height: 100vh;
        }

        /* Topbar Styling */
        .topbar {
            height: 70px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }

        .user-profile img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-name {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--admin-dark);
        }

        /* Utility Classes */
        .btn-logout {
            color: #ef4444;
            font-size: 0.9rem;
            text-decoration: none;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .sidebar { width: 70px; padding: 20px 10px; }
            .sidebar-brand span, .nav-link span, .user-name { display: none; }
            .main-content { margin-left: 70px; width: calc(100% - 70px); }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-print"></i> <span>Lega DigiPrint</span>
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
                    <i class="fas fa-th-large"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="produk.php" class="nav-link">
                    <i class="fas fa-box"></i> <span>Kelola Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="hero.php" class="nav-link">
                    <i class="fas fa-box"></i> <span>Kelola Hero</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="galeri.php" class="nav-link">
                    <i class="fas fa-images"></i> <span>Kelola Galeri</span>
                </a>
            </li>
            </li>
            <hr style="margin: 20px 0; border: none; border-top: 1px solid #f1f5f9;">
            <li class="nav-item">
                <a href="../index.php" target="_blank" class="nav-link">
                    <i class="fas fa-external-link-alt"></i> <span>Lihat Website</span>
                </a>
            </li>
        </ul>
    </aside>

    <div class="main-content">
        <header class="topbar">
            <div class="page-info">
                <small style="color: #94a3b8; font-weight: 600;">Selamat Datang Kembali,</small>
                <div class="user-name">Muhammad Farhan Syaakir</div>
            </div>
            
            <div class="user-profile">
                <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </header>

      