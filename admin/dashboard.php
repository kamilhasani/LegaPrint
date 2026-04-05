<?php
session_start();
include "../config/koneksi.php"; // Tambahkan koneksi untuk menghitung data

// Proteksi Halaman
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Simulasi data user
$admin_name = "Farhan Syaakir"; 

// Mengambil jumlah data untuk ringkasan
$count_produk = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM produk"));
$count_hero   = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM hero"));
$count_galeri = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM galeri"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Lega DigiPrint</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #0284c7;
            --primary-dark: #0369a1;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --bg-body: #f8fafc;
            --white: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --transition: all 0.3s ease;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            height: 100vh;
            position: fixed;
            color: var(--white);
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 0 25px 30px;
            font-size: 1.25rem;
            font-weight: 700;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }

        .sidebar-brand span { color: #38bdf8; }

        .sidebar-menu { list-style: none; flex-grow: 1; }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #94a3b8;
            padding: 14px 25px;
            text-decoration: none;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: var(--sidebar-hover);
            color: var(--white);
            border-left: 4px solid #38bdf8;
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
        }

        .top-nav {
            background: var(--white);
            height: 70px;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .btn-logout {
            background: #ef4444;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .container { padding: 40px; }

        .welcome-section { margin-bottom: 30px; }
        .welcome-section h1 { font-size: 1.75rem; margin-bottom: 8px; }

        /* --- CARDS --- */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .card {
            background: var(--white);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            border: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
        }

        .card h3 {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }

        .card p {
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 20px;
            font-size: 0.9rem;
            flex-grow: 1;
        }

        .stats-info {
            background: #f8fafc;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 0.85rem;
            color: var(--text-main);
        }

        /* --- BUTTONS --- */
        .btn-group { display: flex; gap: 10px; }

        .btn {
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-outline { background: #f1f5f9; color: var(--text-main); }

        @media (max-width: 768px) {
            .sidebar { width: 70px; }
            .sidebar-brand, .sidebar-menu span { display: none; }
            .main-content { margin-left: 70px; width: calc(100% - 70px); }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            Lega <span>Admin</span>
        </div>
        <ul class="sidebar-menu">
            <li><a href="dashboard.php" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="produk.php"><i class="fas fa-box"></i> <span>Kelola Produk</span></a></li>
            <li><a href="hero.php"><i class="fas fa-image"></i> <span>Kelola Hero</span></a></li>
            <li><a href="galeri.php"><i class="fas fa-images"></i> <span>Kelola Galeri</span></a></li>
            <li><a href="pengaturan.php"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
            <li class="nav-item">
                <a href="../index.php" target="_blank" class="nav-link">
                    <i class="fas fa-external-link-alt"></i> <span>Lihat Website</span>
                </a>
            </li>    
        </ul>
    </aside>

    <main class="main-content">
        <nav class="top-nav">
            <div></div>
            <div class="user-profile" style="display: flex; align-items: center; gap: 20px;">
                <span style="font-weight: 500;">Hi, <?= $admin_name; ?></span>
                <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </nav>

        <div class="container">
            <div class="welcome-section">
                <h1>Selamat Datang Kembali 👋</h1>
                <p>Pantau dan kelola aktivitas percetakan Lega DigiPrint hari ini.</p>
            </div>

            <div class="dashboard-grid">
                <div class="card">
                    <h3><i class="fas fa-boxes" style="color: #0284c7;"></i> Manajemen Produk</h3>
                    <p>Atur katalog produk mulai dari Banner hingga Stiker.</p>
                    <div class="stats-info">Total Produk: <strong><?= $count_produk; ?></strong></div>
                    <div class="btn-group">
                        <a href="produk.php" class="btn btn-primary">Daftar</a>
                        <a href="tambah_produk.php" class="btn btn-outline">Tambah</a>
                    </div>
                </div>

                <div class="card">
                    <h3><i class="fas fa-image" style="color: #f59e0b;"></i> Konten Visual Hero</h3>
                    <p>Ubah tampilan gambar utama promosi di halaman depan.</p>
                    <div class="stats-info">Jumlah Hero: <strong><?= $count_hero; ?></strong></div>
                    <div class="btn-group">
                        <a href="hero.php" class="btn btn-primary">Kelola</a>
                    </div>
                </div>

                <div class="card">
                    <h3><i class="fas fa-images" style="color: #10b981;"></i> Galeri Portofolio</h3>
                    <p>Upload hasil cetakan terbaik untuk meyakinkan calon pelanggan Anda.</p>
                    <div class="stats-info">Koleksi Foto: <strong><?= $count_galeri; ?></strong></div>
                    <div class="btn-group">
                        <a href="galeri.php" class="btn btn-primary">Kelola Galeri</a>
                        <a href="tambah_galeri.php" class="btn btn-outline">Tambah Foto</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>