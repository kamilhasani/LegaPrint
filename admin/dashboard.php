<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>

<?php include "../layout/admin_header.php";?>
<!DOCTYPE html>
<html lang="id">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Lega DigiPrint | Dashboard Manajemen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            background: #f0f2f8;
            overflow-x: hidden;
        }

        /* Import Inter font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap');

      

        /* Nav Right (user & logout) */
        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .user-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f8fafc;
            padding: 6px 16px 6px 12px;
            border-radius: 40px;
            border: 1px solid #e2e8f0;
        }
        .user-badge i {
            font-size: 1.2rem;
            color: #3b82f6;
        }
        .user-badge span {
            font-weight: 500;
            color: #1e293b;
            font-size: 0.9rem;
        }
        .btn-logout {
            background: #fee2e2;
            color: #b91c1c;
            padding: 8px 18px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
            border: 1px solid #fecaca;
        }
        .btn-logout i {
            font-size: 0.9rem;
        }
        .btn-logout:hover {
            background: #fecaca;
            color: #991b1b;
            transform: translateY(-1px);
        }

        /* ========== CONTENT AREA ========== */
        .content {
            padding: 32px 36px;
        }

        /* Welcome Header */
        .welcome-header {
            margin-bottom: 32px;
        }
        .welcome-header h1 {
            font-size: 1.9rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.3px;
        }
        .welcome-header p {
            color: #475569;
            margin-top: 8px;
            font-size: 1rem;
        }

        /* Card Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
            gap: 28px;
            margin-top: 16px;
        }
        .card {
            background: white;
            border-radius: 28px;
            padding: 24px 28px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.02), 0 2px 6px rgba(0, 0, 0, 0.03);
            transition: all 0.25s ease;
            border: 1px solid #edf2f7;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e1;
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 14px;
        }
        .card-header h3 {
            font-size: 1.4rem;
            font-weight: 600;
            background: linear-gradient(135deg, #1e293b, #2d3a4e);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .card-header i {
            font-size: 2rem;
            color: #3b82f6;
            opacity: 0.7;
        }
        .stats-badge {
            background: #eef2ff;
            padding: 6px 14px;
            border-radius: 40px;
            font-weight: 700;
            font-size: 1.1rem;
            display: inline-block;
            margin: 12px 0 16px 0;
            color: #1e40af;
        }
        .product-list {
            margin: 18px 0 20px;
            background: #f8fafc;
            border-radius: 20px;
            padding: 12px 16px;
        }
        .product-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #e2e8f0;
            font-weight: 500;
        }
        /* CONTAINER TOMBOL - UNIFIED */
        .btn-group {
            display: flex;
            gap: 14px;
            margin-top: 20px;
            flex-wrap: wrap; /* Menjamin tombol otomatis turun rapi jika di layar HP */
        }

        /* SETTING DASAR UNTUK SEMUA TOMBOL DI BTN-GROUP */
        .btn-group .btn-primary,
        .btn-group .btn-outline {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            /* CORRECTED: Standardized kebulatan sudut */
            border-radius: 40px; 
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            /* CORRECTED: Standardized padding agar semua tombol memiliki tinggi yang sama */
            padding: 10px 20px; 
            font-size: 0.85rem;
        }

        /* KELOLA PRODUK & GALERI (PRIMARY BUTTONS) */
        .btn-primary {
            background: #0f1e35;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: #1e3a5f;
            transform: scale(0.97); /* Efek mengecil sedikit saat diklik/dihover */
        }

        /* HAPUS, TAMBAH PRODUK, & TAMBAH GALERI (OUTLINE BUTTONS) */
        .btn-outline {
            background: transparent;
            /* CORRECTED: Standardized garis tepi agar konsisten */
            border: 1.5px solid #cbd5e1; 
            color: #1f2937;
        }

        .btn-outline:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
        }

        /* PENGATURAN OTOMATIS JARAK IKON FONT AWESOME DENGAN TEKS */
        .btn-group a i {
            margin-right: 6px;
            font-size: 0.9rem;
        }

        /* RESPONSIF UNTUK HP LAYAR KECIL (< 480px) */
        @media (max-width: 480px) {
            .btn-group {
                gap: 10px; /* Jarak antar tombol sedikit dirapatkan di HP */
            }
            .btn-group .btn-primary,
            .btn-group .btn-outline {
                padding: 8px 16px; /* Mengecilkan padding tombol agar tidak meluber */
                font-size: 0.8rem;   /* Ukuran text sedikit disesuaikan untuk jari */
            }
        }
        .hero-preview {
            background: #fefce8;
            border-radius: 20px;
            padding: 14px;
            margin: 16px 0;
            border-left: 5px solid #eab308;
        }
        .hero-count {
            font-size: 2rem;
            font-weight: 800;
            color: #ca8a04;
        }
        hr {
            margin: 15px 0;
            border-color: #ecf3fa;
        }

        /* responsive */
        @media (max-width: 1024px) {
            .content {
                padding: 28px 24px;
            }
            .dashboard-grid {
                gap: 22px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -280px;
                width: 280px;
                box-shadow: none;
            }
            .sidebar.active {
                left: 0;
                box-shadow: 8px 0 28px rgba(0,0,0,0.2);
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .hamburger {
                display: flex;
            }
            .mobile-logo {
                display: flex;
                align-items: center;
            }
            .nav-left .desktop-logo-text {
                display: none;
            }
            .top-nav {
                padding: 0 20px;
            }
            .user-badge span {
                display: none;
            }
            .user-badge {
                padding: 6px 10px;
            }
            .btn-logout span {
                display: none;
            }
            .btn-logout i {
                margin: 0;
                font-size: 1.1rem;
            }
            .btn-logout {
                padding: 8px 12px;
            }
            .content {
                padding: 20px 18px;
            }
            .welcome-header h1 {
                font-size: 1.5rem;
            }
            .dashboard-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .card {
                padding: 20px;
            }
        }

        /* untuk laptop kecil dan smooth */
        @media (min-width: 769px) and (max-width: 1200px) {
            .sidebar {
                width: 260px;
            }
            .main-content {
                margin-left: 260px;
                width: calc(100% - 260px);
            }
            .card-header h3 {
                font-size: 1.25rem;
            }
        }

        /* overlay untuk mobile saat sidebar aktif */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            backdrop-filter: blur(2px);
            z-index: 998;
            display: none;
        }
        .overlay.active {
            display: block;
        }

        /* efek interaktif */
        button, a {
            cursor: pointer;
        }
        footer {
            text-align: center;
            margin-top: 48px;
            padding: 16px;
            color: #6c7a91;
            font-size: 0.8rem;
            border-top: 1px solid #e9eef3;
        }
    </style>
</head>
<body>
<div class="main-content">

    <div class="content">
        <div class="dashboard-grid">
            <!-- Card Manajemen Produk -->
            <div class="card">
                <div class="card-header">
                    <h3><i class="fas fa-tag" style="font-size:1.2rem; margin-right: 8px;"></i> Manajemen Produk</h3>
                    <i class="fas fa-cubes"></i>
                </div>
                <p style="color: #334155; margin-bottom: 8px;">Atur katalog produk mulai dari Banner hingga Stiker.</p>

                <div class="product-list">
                    <div class="product-item"><span>🖨️ Banner</span> <span>Aktif</span></div>
                    <div class="product-item"><span>🖼️ Poster</span> <span>Aktif</span></div>
                    <div class="product-item"><span>📄 Flyer</span> <span>Aktif</span></div>
                    <div class="product-item"><span>🏷️ Stiker</span> <span>Aktif</span></div>
                </div>

                <div class="btn-group">
                    <a href="produk.php" class="btn-primary" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="fas fa-list-ul" style="margin-right: 5px;"></i> Kelola Produk
                    </a>

                    <a href="hapus_galeri.php" class="btn-outline" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="fas fa-upload" style="margin-right: 5px;"></i> Hapus
                    </a>
                    
                    <a href="tambah_produk.php" class="btn-outline" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="fas fa-plus-circle" style="margin-right: 5px;"></i> Tambah Produk
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3><i class="fas fa-images"></i> Galeri Portofolio</h3>
                    <i class="fas fa-photo-video"></i>
                </div>
                
                <p class="card-description">Kelola foto hasil produksi untuk ditampilkan di landing page.</p>

                <div class="product-list">
                    <div class="product-item"><span>📸 Proses Produksi</span> <span>Terbaru</span></div>
                    <div class="product-item"><span>🖨️ Mesin Cetak</span> <span>Aktif</span></div>
                    <div class="product-item"><span>✨ Kegiatan</span> <span>Produktif</span></div>
                    <div class="product-item"><span>👕 Seragam Karyawan</span> <span>Seragam</span></div>
                </div>

                <div class="btn-group">
                    <a href="galeri.php" class="btn-primary">
                        <i class="fas fa-list-ul"></i> Kelola Galeri
                    </a>
                    
                    <a href="hapus_galeri.php" class="btn-outline">
                        <i class="fas fa-upload"></i> Hapus
                    </a>
                    
                    <a href="tambah_galeri.php" class="btn-outline">
                        <i class="fas fa-plus-circle"></i> Tambah Galeri
                    </a>
                </div>
            </div>

            <!-- Card Konten Visual Hero -->
           <div class="card">
                <div class="card-header">
                    <h3><i class="fas fa-image" style="font-size:1.2rem;"></i> Konten Visual Hero</h3>
                    <i class="fas fa-sliders-h"></i>
                </div>
                <p style="color: #334155;">Ubah tampilan gambar utama promosi di halaman depan.</p>
                
                <div class="hero-preview">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <span><i class="fas fa-chart-simple"></i> <strong>Jumlah Hero Aktif</strong></span>
                        <span class="hero-count" id="heroCount">3</span>
                    </div>
                    <div style="margin-top: 12px; display: flex; gap: 6px; flex-wrap: wrap;">
                        <i class="fas fa-check-circle" style="color:#22c55e;"></i> <span>Promo Cetak Cepat</span>
                        <i class="fas fa-check-circle" style="color:#22c55e; margin-left: 8px;"></i> <span>Diskon Spanduk</span>
                        <i class="fas fa-check-circle" style="color:#22c55e; margin-left: 8px;"></i> <span>Gratis Ongkir</span>
                    </div>
                </div>

                <div class="btn-group">
                    <a href="hero.php" class="btn-primary" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="fas fa-edit" style="margin-right: 5px;"></i> Kelola Hero
                    </a>
                    
                    <a href="edit_hero.php" class="btn-outline" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="fas fa-plus-circle" style="margin-right: 5px;"></i> Edit
                    </a>
                </div>

                <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 15px 0;">
            </div>
        <footer>
            <i class="fas fa-copyright"></i> 2026 Lega DigiPrint | Manajemen Percetakan Profesional
        </footer>
    </div>
</div>

<script>
    // === Interaktivitas untuk demo profesional (tambah produk, kelola hero, dll) ===
    // Data state
    let totalProduk = 4;
    let heroSlides = 3;

    // Elemen
    const totalProdukSpan = document.getElementById('totalProdukCount');
    const heroCountSpan = document.getElementById('heroCount');
    const btnTambahProduk = document.getElementById('btnTambahProduk');
    const btnDaftarProduk = document.getElementById('btnDaftarProduk');
    const btnKelolaHero = document.getElementById('btnKelolaHero');
    const btnPreviewHero = document.getElementById('btnPreviewHero');
    const logoutBtn = document.getElementById('logoutBtn');
    const refreshStatBtn = document.getElementById('refreshStatBtn');

    // Sidebar + overlay logic responsif
    const hamburger = document.getElementById('hamburgerBtn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

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

    hamburger.addEventListener('click', (e) => {
        e.stopPropagation();
        if (sidebar.classList.contains('active')) {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    overlay.addEventListener('click', closeSidebar);
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }
    });

    // Fungsi update UI
    function updateProductCounter() {
        totalProdukSpan.innerText = totalProduk;
        // animasi kecil
        totalProdukSpan.style.transform = 'scale(1.1)';
        setTimeout(() => { if(totalProdukSpan) totalProdukSpan.style.transform = ''; }, 200);
    }

    function updateHeroCounter() {
        heroCountSpan.innerText = heroSlides;
        heroCountSpan.style.transform = 'scale(1.1)';
        setTimeout(() => { if(heroCountSpan) heroCountSpan.style.transform = ''; }, 200);
    }

    // Tambah Produk interaktif
    btnTambahProduk.addEventListener('click', () => {
        totalProduk++;
        updateProductCounter();
        // notifikasi simpel (alert modern pakai confirm style? tapi lebih elegan)
        showToast("✅ Produk baru ditambahkan! Total produk: " + totalProduk);
        // tambahan visual pada product list (simulasi)
        const productListDiv = document.querySelector('.product-list');
        if (productListDiv && totalProduk === 5) {
            const newItem = document.createElement('div');
            newItem.className = 'product-item';
            newItem.innerHTML = '<span>✨ Spanduk Kain</span> <span>Baru</span>';
            productListDiv.appendChild(newItem);
        } else if (totalProduk > 5) {
            // tidak menambah duplikat berlebih
        }
    });

    // Daftar Produk - simulasi alert daftar produk
    btnDaftarProduk.addEventListener('click', () => {
        showToast("📋 Menampilkan daftar produk: Banner, Poster, Flyer, Stiker" + (totalProduk > 4 ? " + Spanduk Kain" : ""));
    });

    // Kelola Hero
    btnKelolaHero.addEventListener('click', () => {
        heroSlides++;
        if(heroSlides > 6) heroSlides = 6;
        updateHeroCounter();
        showToast("🎨 Slide hero berhasil ditambahkan. Total hero: " + heroSlides);
        // update preview hero list
        const heroPreviewDiv = document.querySelector('.hero-preview div:last-child');
        if (heroPreviewDiv && heroSlides === 4) {
            const parentDiv = document.querySelector('.hero-preview');
            if(parentDiv && !document.getElementById('extraHeroTag')) {
                const extraSpan = document.createElement('div');
                extraSpan.id = 'extraHeroTag';
                extraSpan.style.marginTop = '8px';
                extraSpan.innerHTML = '<i class="fas fa-plus-circle"></i> Promo Spesial Akhir Tahun';
                parentDiv.appendChild(extraSpan);
            }
        } else if(heroSlides === 5) {
            const extra = document.getElementById('extraHeroTag');
            if(extra) extra.innerHTML = '<i class="fas fa-plus-circle"></i> Promo Spesial Akhir Tahun + Paket Hemat';
        }
    });

    btnPreviewHero.addEventListener('click', () => {
        showToast("🖼️ Preview hero slide: Menampilkan " + heroSlides + " visual promosi utama.");
    });

    // Tombol refresh stat
    refreshStatBtn.addEventListener('click', () => {
        showToast("📊 Data dashboard diperbarui: Pesanan hari ini tetap 12, sukses.");
    });

    // Logout dengan notifikasi ramah
    logoutBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if(confirm("Apakah Anda yakin ingin keluar dari dashboard Lega DigiPrint?")) {
            showToast("🔒 Anda telah logout. Sampai jumpa kembali!");
            setTimeout(() => {
                alert("Demo: Halaman login profesional. (Simulasi logout)");
                // bisa redirect ke #, tetapi hanya simulasi
            }, 300);
        }
    });

    // Toast notifikasi ringan & profesional
    function showToast(message) {
        let toast = document.getElementById('customToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'customToast';
            toast.style.position = 'fixed';
            toast.style.bottom = '30px';
            toast.style.left = '50%';
            toast.style.transform = 'translateX(-50%)';
            toast.style.backgroundColor = '#1e293b';
            toast.style.color = 'white';
            toast.style.padding = '12px 24px';
            toast.style.borderRadius = '48px';
            toast.style.fontSize = '0.9rem';
            toast.style.fontWeight = '500';
            toast.style.boxShadow = '0 10px 25px -5px rgba(0,0,0,0.2)';
            toast.style.zIndex = '1200';
            toast.style.backdropFilter = 'blur(8px)';
            toast.style.background = '#0f172ae6';
            toast.style.border = '1px solid #334155';
            toast.style.fontFamily = 'inherit';
            document.body.appendChild(toast);
        }
        toast.innerText = message;
        toast.style.opacity = '1';
        toast.style.transition = 'opacity 0.2s';
        clearTimeout(window.toastTimeout);
        window.toastTimeout = setTimeout(() => {
            toast.style.opacity = '0';
        }, 2500);
    }

    // Inisialisasi dan efek tambahan untuk memastikan jumlah produk counter sinkron
    // tombol tambah juga merubah produk count dan menambahkan item baru pada product list untuk demo lebih hidup
    // (opsional event untuk menambah stiker baru)
    const btnTambahRef = btnTambahProduk;
    // style responsif professional sudah fix

    // Fix untuk mobile klik link sidebar menutup sidebar (UX)
    const allSidebarLinks = document.querySelectorAll('.sidebar-menu a');
    allSidebarLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                closeSidebar();
            }
            // highlight sederhana
            allSidebarLinks.forEach(l => l.parentElement.classList.remove('active'));
            link.parentElement.classList.add('active');
            if(link.getAttribute('href') === '#') e.preventDefault();
            showToast(`Navigasi ke ${link.innerText.trim()} (demo)`);
        });
    });

    // First load adjustment
    console.log("Dashboard Lega DigiPrint siap | Responsif & Profesional");
</script>
</body>
</html>