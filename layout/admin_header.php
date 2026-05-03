<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Admin Panel - Lega DigiPrint</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        /* ========== RESET GLOBAL ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
            overflow-x: hidden;
            position: relative;
        }

        /* ========== VARIABLES ========== */
        :root {
            --primary: #38bdf8;
            --primary-dark: #0284c7;
            --sidebar-bg: #0f172a;
            --sidebar-text: #94a3b8;
            --sidebar-text-hover: #ffffff;
            --border-color: #eef2f6;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            width: 280px;
            height: 100vh;
            background: var(--sidebar-bg);
            position: fixed;
            left: 0;
            top: 0;
            padding: 28px 20px;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.06);
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: #1e293b;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #38bdf8;
            border-radius: 10px;
        }

        .sidebar-brand {
            font-size: 1.4rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 12px 20px 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-brand i {
            font-size: 1.6rem;
            color: var(--primary);
        }

        .sidebar-brand span {
            color: var(--primary);
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            text-decoration: none;
            color: var(--sidebar-text);
            font-weight: 500;
            border-radius: 12px;
            transition: all 0.2s ease;
        }

        .nav-link i {
            width: 22px;
            font-size: 1.1rem;
            text-align: center;
        }

        .nav-link:hover {
            color: var(--sidebar-text-hover);
            background: rgba(255, 255, 255, 0.05);
        }

        .nav-link.active {
            background: var(--primary);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(56, 189, 248, 0.25);
        }

        .sidebar-divider {
            margin: 24px 0;
            border: none;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            margin-left: 280px;
            width: calc(100% - 280px);
            transition: all 0.3s ease;
        }

        /* ========== TOPBAR ========== */
        .topbar {
            background: #ffffff;
            height: 60px;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            background: #f1f5f9;
            padding: 8px 12px;
            border-radius: 12px;
            transition: 0.2s;
        }

        .hamburger span {
            width: 22px;
            height: 2px;
            background: #1e293b;
            border-radius: 4px;
        }

        .hamburger:hover {
            background: #e2e8f0;
        }

        .page-info small {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .user-name {
            font-weight: 700;
            font-size: 0.9rem;
            color: #0f172a;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .btn-logout {
            background: #fee2e2;
            color: #b91c1c;
            padding: 8px 20px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
            border: 1px solid #fecaca;
        }

        .btn-logout:hover {
            background: #fecaca;
            transform: translateY(-2px);
        }

        /* ========== CONTENT WRAPPER - TANPA JARAK ========== */
        .content-wrapper {
            padding: 0;
            margin: 0;
        }

        /* Reset margin untuk semua elemen yang mungkin ada di dalam content-wrapper */
        .content-wrapper > * {
            margin-top: 0;
        }

        /* ========== OVERLAY MOBILE ========== */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(2px);
            z-index: 998;
            display: none;
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .content-wrapper {
                padding: 0;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -280px;
                width: 280px;
            }
            .sidebar.active {
                left: 0;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .hamburger {
                display: flex;
            }
            .topbar {
                padding: 0 20px;
            }
            .content-wrapper {
                padding: 0;
            }
            .btn-logout span {
                display: none;
            }
            .btn-logout {
                padding: 8px 14px;
            }
        }
    </style>
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <i class="fas fa-print"></i>
        <span>Lega DigiPrint</span>
    </div>
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                <i class="fas fa-th-large"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="produk.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'produk.php' ? 'active' : ''; ?>">
                <i class="fas fa-box"></i> <span>Kelola Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="hero.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'hero.php' ? 'active' : ''; ?>">
                <i class="fas fa-sliders-h"></i> <span>Kelola Hero</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="galeri.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'galeri.php' ? 'active' : ''; ?>">
                <i class="fas fa-images"></i> <span>Kelola Galeri</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="clients.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'clients.php' ? 'active' : ''; ?>">
                <i class="fas fa-users"></i> <span>Kelola Client</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a href="../index.php" target="_blank" class="nav-link">
                <i class="fas fa-external-link-alt"></i> <span>Lihat Website</span>
            </a>
        </li>
    </ul>
</aside>

<div class="main-content">
    <header class="topbar">
        <div class="topbar-left">
            <div class="hamburger" id="hamburgerBtn">

            </div>
            <div class="page-info">
                <small>Selamat Datang Kembali,</small>
                <div class="user-name">Admin</div>
            </div>
        </div>
        <div class="user-profile">
            <a href="logout.php" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
            </a>
        </div>
    </header>

</div>

<script>
    // ========== HAMBURGER MENU TOGGLE ==========
    const hamburger = document.getElementById('hamburgerBtn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    function closeSidebar() {
        if (window.innerWidth <= 768) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }
    }

    function openSidebar() {
        if (window.innerWidth <= 768) {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        }
    }

    if (hamburger) {
        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            if (sidebar.classList.contains('active')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });
    }

    overlay.addEventListener('click', closeSidebar);

    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }
    });

    // Tutup sidebar saat klik link menu di mobile
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                setTimeout(closeSidebar, 150);
            }
        });
    });
</script>

</body>
</html>