<?php 
include "config/koneksi.php"; 
include "layout/header.php"; 

// FILTER
$kategori_filter = isset($_GET['kat']) ? mysqli_real_escape_string($conn, $_GET['kat']) : '';
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// QUERY PRODUK
$query_str = "SELECT p.*, k.nama_kategori 
              FROM produk p
              LEFT JOIN kategori k 
              ON p.id_kategori = k.id_kategori
              WHERE 1=1";

$kategori_nama = 'Semua Kategori';

if ($kategori_filter != '') {
    $kat_query = mysqli_query($conn, "
        SELECT nama_kategori 
        FROM kategori 
        WHERE id_kategori = '$kategori_filter'
    ");

    if ($kat_data = mysqli_fetch_assoc($kat_query)) {
        $kategori_nama = $kat_data['nama_kategori'];
    }
}

// FILTER KATEGORI
if ($kategori_filter != '') { 
    $query_str .= " AND p.id_kategori = '$kategori_filter'"; 
}

// FILTER SEARCH
if ($search != '') { 
    $query_str .= " AND (
        p.nama_produk LIKE '%$search%' 
        OR p.deskripsi LIKE '%$search%'
    )"; 
}

// URUTKAN PRODUK TERBARU
$query_str .= " ORDER BY p.id DESC";

// EKSEKUSI QUERY
$data = mysqli_query($conn, $query_str);

// ERROR DEBUG
if (!$data) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<main class="product-page">
    <!-- Hero Section Produk -->
    <section class="product-hero">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="hero-badge">Koleksi Produk</div>
            <h1 class="hero-title">Layanan <span>Digital Printing</span></h1>
            <p class="hero-subtitle">Berbagai kebutuhan cetak digital untuk bisnis dan personal dengan kualitas terbaik</p>
            <div class="hero-features">
                <div class="hero-feature">
                    <i class="fas fa-check-circle"></i>
                    <span>Kualitas Premium</span>
                </div>
                <div class="hero-feature">
                    <i class="fas fa-check-circle"></i>
                    <span>Cepat & Tepat Waktu</span>
                </div>
                <div class="hero-feature">
                    <i class="fas fa-check-circle"></i>
                    <span>Harga Bersaing</span>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#f8fafc" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,208C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
                <path fill="#f8fafc" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,208C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="product-filter-section">
        <div class="container">
            <div class="filter-card">
                <div class="filter-header">
                    <i class="fas fa-filter"></i>
                    <span>Filter & Pencarian</span>
                </div>
                <div class="filter-body">
                    <div class="search-wrapper">
                        <form action="" method="GET" class="search-form">
                            <?php if ($kategori_filter != ''): ?>
                                <input type="hidden" name="kat" value="<?php echo $kategori_filter; ?>">
                            <?php endif; ?>
                            <div class="search-input-group">
                                <i class="fas fa-search"></i>
                                <input type="text" 
                                       name="search" 
                                       placeholder="Cari produk..." 
                                       value="<?php echo htmlspecialchars($search); ?>">
                                <button type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="category-wrapper">
                        <div class="category-label">
                            <i class="fas fa-tags"></i>
                            <span>Kategori:</span>
                        </div>
                        <div class="category-list">
                            <a href="produk.php<?php echo ($search != '') ? '?search=' . urlencode($search) : ''; ?>" 
                               class="cat-item <?php echo ($kategori_filter == '') ? 'active' : ''; ?>">
                                Semua
                            </a>
                            <?php
                            $list_kat = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                            if ($list_kat && mysqli_num_rows($list_kat) > 0) {
                                while ($row = mysqli_fetch_assoc($list_kat)) {
                                    $id_kat = $row['id_kategori'];
                                    $active_class = ($kategori_filter == $id_kat) ? 'active' : '';
                                    $url_search = ($search != '') ? "&search=" . urlencode($search) : "";
                                    echo "<a href='produk.php?kat=$id_kat$url_search' class='cat-item $active_class'>"
                                        . htmlspecialchars($row['nama_kategori']) 
                                        . "</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                
                <?php if ($kategori_filter != '' || $search != ''): ?>
                <div class="filter-result-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Menampilkan: <strong><?php echo $kategori_nama; ?></strong></span>
                    <?php if ($search != ''): ?>
                        <span>| Keyword: <em>"<?php echo htmlspecialchars($search); ?>"</em></span>
                    <?php endif; ?>
                    <a href="produk.php" class="reset-filter">
                        <i class="fas fa-times"></i> Reset Filter
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Product Grid Section -->
    <section class="product-section">
        <div class="container">
            <?php if ($data && mysqli_num_rows($data) > 0): ?>
                <div class="product-stats">
                    <span><i class="fas fa-cube"></i> Menampilkan <?php echo mysqli_num_rows($data); ?> produk</span>
                </div>
                <div class="product-grid">
                    <?php while ($p = mysqli_fetch_assoc($data)): ?>
                        <div class="product-card">
                            <div class="product-badge">
                                <?php 
                                // Badge berdasarkan stok atau fitur
                                if(!empty($p['stok']) && $p['stok'] > 0) {
                                    echo '<span class="badge-stok">Tersedia</span>';
                                } else {
                                    echo '<span class="badge-preorder">Pre-Order</span>';
                                }
                                ?>
                            </div>
                            <div class="product-image">
                                <a href="detail_produk.php?id=<?php echo $p['id']; ?>">
                                    <img 
                                        src="assets/images/produk/<?php echo (!empty($p['gambar'])) ? $p['gambar'] : 'default.png'; ?>" 
                                        alt="<?php echo htmlspecialchars($p['nama_produk']); ?>">
                                    <div class="image-overlay">
                                        <span class="view-detail"><i class="fas fa-eye"></i> Detail</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="product-category">
                                    <i class="fas fa-folder"></i> <?php echo htmlspecialchars($p['nama_kategori']); ?>
                                </div>
                                <h3 class="product-title">
                                    <a href="detail_produk.php?id=<?php echo $p['id']; ?>">
                                        <?php echo htmlspecialchars($p['nama_produk']); ?>
                                    </a>
                                </h3>
                                <p class="product-description">
                                    <?php
                                    $deskripsi = strip_tags($p['deskripsi']);
                                    echo (strlen($deskripsi) > 60)
                                        ? substr($deskripsi, 0, 60) . "..."
                                        : $deskripsi;
                                    ?>
                                </p>
                                <div class="product-footer">
                                    <div class="product-price">
                                        <span class="price-label">Harga</span>
                                        <span class="price-value">
                                            <?php
                                            echo is_numeric($p['harga'])
                                                ? "Rp " . number_format($p['harga'], 0, ',', '.')
                                                : $p['harga'];
                                            ?>
                                        </span>
                                    </div>
                                    <a href="https://wa.me/6282117773741?text=Halo, saya ingin pesan produk: <?php echo urlencode($p['nama_produk']); ?>" 
                                       class="order-btn"
                                       target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Pesan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="empty-products">
                    <div class="empty-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h3>Belum Ada Produk</h3>
                    <p>Maaf, produk yang Anda cari tidak ditemukan.</p>
                    <a href="produk.php" class="back-btn">
                        <i class="fas fa-arrow-left"></i> Kembali ke Semua Produk
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Benefit Section -->
    <section class="benefit-section">
        <div class="container">
            <div class="benefit-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-truck-fast"></i>
                    </div>
                    <h4>Pengiriman Cepat</h4>
                    <p>Proses cepat & packing aman sampai tujuan</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h4>Kualitas Terjamin</h4>
                    <p>Material premium & hasil cetak memuaskan</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>Konsultasi Gratis</h4>
                    <p>Tim siap membantu desain & kebutuhan Anda</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h4>Harga Kompetitif</h4>
                    <p>Terjangkau dengan kualitas terbaik</p>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* ==================== VARIABLES ==================== */
:root {
    --primary: #004ea2;
    --primary-dark: #0284c7;
    --primary-light: #7dd3fc;
    --dark: #0f172a;
    --dark-soft: #1e293b;
    --gray: #64748b;
    --gray-light: #94a3b8;
    --bg-light: #f8fafc;
    --white: #ffffff;
    --whatsapp: #25D366;
    --whatsapp-dark: #1eb954;
    --transition: all 0.3s ease;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.product-page {
    overflow-x: hidden;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    width: 100%;
}

/* ==================== HERO SECTION ==================== */
/* ==================== HERO SECTION ==================== */
.product-hero {
    position: relative;
    
    /* 1. SETUP BACKGROUND GAMBAR DI SINI (Ganti path jika filenya berbeda) */
    background-image: url('assets/images/logo/logo.jpeg'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    
    overflow: hidden;
    padding: 60px 0 80px;
}

.product-hero .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* 2. OVERLAY DIUBAH AGAR AGAK GELAP: Supaya teks dan list fitur kontras & terbaca */
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(30, 41, 59, 0.75) 100%);
    z-index: 1;
}

.hero-content {
    position: relative;
    /* 3. MEMASTIKAN KONTEN BERADA DI ATAS OVERLAY GELAP */
    z-index: 2;
    text-align: center;
}

.hero-badge {
    display: inline-block;
    background: rgba(56, 189, 248, 0.15);
    backdrop-filter: blur(10px);
    padding: 6px 16px;
    border-radius: 50px;
    color: var(--primary);
    font-weight: 600;
    font-size: 0.75rem;
    letter-spacing: 1px;
    margin-bottom: 20px;
    border: 1px solid rgba(56, 189, 248, 0.3);
}

.hero-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--white);
    margin-bottom: 15px;
}

.hero-title span {
    color: var(--primary);
}

.hero-subtitle {
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 30px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.hero-features {
    display: flex;
    justify-content: center;
    gap: 25px;
    flex-wrap: wrap;
}

.hero-feature {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.85rem;
}

.hero-feature i {
    color: var(--primary);
}

/* 4. POSISI OMBAK DIKUNCI PAS DI DASAR BAWAH HERO */
.hero-wave {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    line-height: 0;
    z-index: 3; /* Berada di atas gambar background dan overlay gelap */
    pointer-events: none;
}

.hero-wave svg {
    width: 100%;
    height: 40px;
    display: block;
}

/* Penyesuaian responsif otomatis saat dibuka di smartphone */
@media (max-width: 768px) {
    .product-hero {
        padding: 40px 0 60px; /* Padding sedikit diperkecil agar pas di HP */
    }
    .hero-title {
        font-size: 1.6rem; /* Ukuran teks judul mengecil rapi di HP */
    }
    .hero-features {
        gap: 12px; /* Jarak antar ikon fitur dirapatkan di HP */
    }
}

/* ==================== FILTER SECTION ==================== */
.product-filter-section {
    position: relative;
    margin-top: -30px;
    z-index: 10;
    padding-bottom: 40px;
}

.filter-card {
    background: var(--white);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.filter-header {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary));
    padding: 15px 20px;
    color: white;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
}

.filter-header i {
    font-size: 1.1rem;
}

.filter-body {
    padding: 20px;
}

.search-form {
    margin-bottom: 20px;
}

.search-input-group {
    display: flex;
    align-items: center;
    background: var(--bg-light);
    border-radius: 50px;
    padding: 5px 5px 5px 20px;
    border: 1px solid #e2e8f0;
    transition: var(--transition);
}

.search-input-group:focus-within {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
}

.search-input-group i {
    color: var(--gray-light);
}

.search-input-group input {
    flex: 1;
    padding: 12px 10px;
    border: none;
    background: transparent;
    font-size: 0.9rem;
    outline: none;
}

.search-input-group button {
    background: var(--primary);
    border: none;
    padding: 8px 20px;
    border-radius: 50px;
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.search-input-group button:hover {
    background: var(--primary-dark);
}

.category-wrapper {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 15px;
}

.category-label {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--gray);
    font-size: 0.85rem;
}

.category-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.cat-item {
    padding: 6px 16px;
    background: var(--bg-light);
    border-radius: 30px;
    text-decoration: none;
    color: var(--gray);
    font-size: 0.8rem;
    font-weight: 500;
    transition: var(--transition);
}

.cat-item:hover,
.cat-item.active {
    background: var(--primary);
    color: white;
}

.filter-result-info {
    background: #fef3c7;
    padding: 12px 20px;
    border-top: 1px solid #fde68a;
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    font-size: 0.85rem;
    color: #92400e;
}

.reset-filter {
    margin-left: auto;
    color: #dc2626;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
    font-weight: 600;
}

/* ==================== PRODUCT SECTION ==================== */
.product-section {
    padding: 40px 0 60px;
    background: var(--bg-light);
}

.product-stats {
    margin-bottom: 25px;
    padding: 10px 0;
    border-bottom: 1px solid #e2e8f0;
}

.product-stats span {
    color: var(--gray);
    font-size: 0.85rem;
}

.product-stats i {
    color: var(--primary);
    margin-right: 5px;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
}

.product-card {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    transition: var(--transition);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    border: 1px solid #e2e8f0;
    position: relative;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.product-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    z-index: 5;
}

.badge-stok {
    background: #10b981;
    color: white;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 600;
}

.badge-preorder {
    background: #f59e0b;
    color: white;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 600;
}

.product-image {
    position: relative;
    overflow: hidden;
    aspect-ratio: 1 / 1;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.08);
}

.image-overlay {
    position: absolute;
    inset: 0;
    background: rgba(15, 23, 42, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition);
}

.product-card:hover .image-overlay {
    opacity: 1;
}

.view-detail {
    background: var(--white);
    color: var(--dark);
    padding: 8px 16px;
    border-radius: 30px;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.product-content {
    padding: 16px;
}

.product-category {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #eef2ff;
    color: var(--primary-dark);
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.product-title {
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 8px;
    line-height: 1.4;
}

.product-title a {
    text-decoration: none;
    color: var(--dark);
    transition: var(--transition);
}

.product-title a:hover {
    color: var(--primary);
}

.product-description {
    font-size: 0.8rem;
    color: var(--gray);
    line-height: 1.5;
    margin-bottom: 15px;
}

.product-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
}

.product-price {
    flex: 1;
}

.price-label {
    display: block;
    font-size: 0.65rem;
    color: var(--gray-light);
}

.price-value {
    display: block;
    font-weight: 800;
    color: var(--primary-dark);
    font-size: 1rem;
}

.order-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    background: var(--whatsapp);
    color: white;
    padding: 8px 14px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 600;
    transition: var(--transition);
}

.order-btn:hover {
    background: var(--whatsapp-dark);
    transform: scale(1.02);
}

/* ==================== BENEFIT SECTION ==================== */
.benefit-section {
    padding: 60px 0;
    background: var(--white);
}

.benefit-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 25px;
}

.benefit-card {
    text-align: center;
    padding: 25px 20px;
    border-radius: 16px;
    transition: var(--transition);
    border: 1px solid #e2e8f0;
    background: var(--white);
}

.benefit-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    border-color: var(--primary-light);
}

.benefit-icon {
    width: 70px;
    height: 70px;
    background: rgba(56, 189, 248, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
}

.benefit-icon i {
    font-size: 2rem;
    color: var(--primary);
}

.benefit-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: var(--dark);
}

.benefit-card p {
    font-size: 0.8rem;
    color: var(--gray);
}

/* ==================== EMPTY STATE ==================== */
.empty-products {
    text-align: center;
    padding: 60px 20px;
    background: var(--white);
    border-radius: 20px;
}

.empty-icon {
    width: 80px;
    height: 80px;
    background: var(--bg-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}

.empty-icon i {
    font-size: 2.5rem;
    color: var(--gray-light);
}

.empty-products h3 {
    font-size: 1.3rem;
    margin-bottom: 10px;
    color: var(--dark);
}

.empty-products p {
    color: var(--gray);
    margin-bottom: 20px;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--primary);
    color: white;
    padding: 10px 25px;
    border-radius: 40px;
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.back-btn:hover {
    background: var(--primary-dark);
}

/* ==================== RESPONSIVE HP (2 Kolom) ==================== */
@media (max-width: 768px) {
    .container {
        padding: 0 12px;
    }

    .hero-title {
        font-size: 1.6rem;
    }

    .hero-subtitle {
        font-size: 0.85rem;
        padding: 0 15px;
    }

    .hero-features {
        gap: 12px;
    }

    .hero-feature {
        font-size: 0.7rem;
    }

    .hero-wave svg {
        height: 30px;
    }

    .filter-card {
        border-radius: 16px;
    }

    .filter-header {
        padding: 12px 15px;
        font-size: 0.85rem;
    }

    .filter-body {
        padding: 15px;
    }

    .search-input-group {
        padding: 3px 3px 3px 15px;
    }

    .search-input-group input {
        padding: 10px 8px;
        font-size: 0.85rem;
    }

    .search-input-group button {
        padding: 6px 15px;
        font-size: 0.8rem;
    }

    .category-wrapper {
        flex-direction: column;
        align-items: flex-start;
    }

    .category-list {
        width: 100%;
        overflow-x: auto;
        flex-wrap: nowrap;
        padding-bottom: 5px;
        -webkit-overflow-scrolling: touch;
    }

    .cat-item {
        white-space: nowrap;
        font-size: 0.75rem;
        padding: 5px 14px;
    }

    .filter-result-info {
        font-size: 0.7rem;
        padding: 10px 15px;
    }

    .reset-filter {
        font-size: 0.7rem;
    }

    /* ========== PERBAIKAN UTAMA: 2 KOLOM DI HP ========== */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr) !important; /* 2 kolom */
        gap: 12px;
    }

    .product-card {
        width: 100%;
        margin: 0;
    }

    .product-content {
        padding: 10px;
    }

    .product-category {
        font-size: 0.6rem;
        padding: 3px 8px;
        margin-bottom: 6px;
    }

    .product-title {
        font-size: 0.85rem;
        margin-bottom: 4px;
    }

    .product-description {
        font-size: 0.7rem;
        margin-bottom: 10px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Harga dan Button Order dalam 1 baris */
    .product-footer {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }

    .product-price {
        flex: 1;
        min-width: 0;
    }

    .price-label {
        display: none;
    }

    .price-value {
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--primary-dark);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .order-btn {
        padding: 6px 8px;
        font-size: 0.65rem;
        white-space: nowrap;
        flex-shrink: 0;
        gap: 4px;
    }

    .order-btn span {
        display: inline;
    }

    .order-btn i {
        font-size: 0.65rem;
    }

    .benefit-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .benefit-card {
        padding: 15px 12px;
    }

    .benefit-icon {
        width: 50px;
        height: 50px;
    }

    .benefit-icon i {
        font-size: 1.3rem;
    }

    .benefit-card h4 {
        font-size: 0.85rem;
    }

    .benefit-card p {
        font-size: 0.7rem;
    }

    .product-stats {
        font-size: 0.75rem;
    }
}

/* Untuk HP yang sangat kecil (max-width: 480px) - tetap 2 kolom */
@media (max-width: 480px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 10px;
    }
    
    .price-value {
        font-size: 0.7rem;
    }
    
    .order-btn {
        padding: 5px 6px;
        font-size: 0.6rem;
    }
}
</style>

<?php include "layout/footer.php"; ?>