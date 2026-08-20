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
    <!-- HERO SECTION - ONLY BACKGROUND IMAGE FULL -->
    <section class="product-hero">
        <div class="hero-bg-image">
            <img src="assets/images/bgproduk.jpg" alt="Digital Printing Background">
        </div>
    </section>

    <!-- Filter Section -->
    <section class="product-filter-section" id="products">
        <div class="container">
            <div class="filter-card">
                <div class="filter-header">
                    <div class="filter-title">
                        <i class="fas fa-sliders-h"></i>
                        <span>Filter & Pencarian</span>
                    </div>
                    <?php if ($kategori_filter != '' || $search != ''): ?>
                        <a href="produk.php" class="clear-filter">
                            <i class="fas fa-times-circle"></i>
                            Hapus Filter
                        </a>
                    <?php endif; ?>
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
                                       placeholder="Cari produk berdasarkan nama atau deskripsi..." 
                                       value="<?php echo htmlspecialchars($search); ?>">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                    <span>Cari</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="category-wrapper">
                        <div class="category-label">
                            <i class="fas fa-tags"></i>
                            <span>Kategori Produk:</span>
                        </div>
                        <div class="category-list">
                            <a href="produk.php<?php echo ($search != '') ? '?search=' . urlencode($search) : ''; ?>" 
                               class="cat-item <?php echo ($kategori_filter == '') ? 'active' : ''; ?>">
                                <i class="fas fa-th-large"></i>
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
                                        . "<i class='fas fa-folder'></i>"
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
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Product Grid Section -->
    <section class="product-section">
        <div class="container">
            <?php if ($data && mysqli_num_rows($data) > 0): ?>
                <div class="product-header">
                    <div class="product-stats">
                        <i class="fas fa-cube"></i>
                        <span>Menampilkan <strong><?php echo mysqli_num_rows($data); ?></strong> produk</span>
                    </div>
                </div>
                <div class="product-grid">
                    <?php while ($p = mysqli_fetch_assoc($data)): ?>
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <div class="product-badge">
                                    <?php 
                                    if(!empty($p['stok']) && $p['stok'] > 0) {
                                        echo '<span class="badge-stok"><i class="fas fa-check-circle"></i> Tersedia</span>';
                                    } else {
                                        echo '<span class="badge-preorder"><i class="fas fa-clock"></i> Pre-Order</span>';
                                    }
                                    ?>
                                </div>
                                <div class="product-image">
                                    <a href="detail_produk.php?id=<?php echo $p['id']; ?>">
                                        <img 
                                            src="assets/images/produk/<?php echo (!empty($p['gambar'])) ? $p['gambar'] : 'default.png'; ?>" 
                                            alt="<?php echo htmlspecialchars($p['nama_produk']); ?>">
                                        <div class="image-overlay">
                                            <div class="overlay-content">
                                                <span class="view-detail">
                                                    <i class="fas fa-eye"></i> 
                                                    Lihat Detail
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-category">
                                    <i class="fas fa-folder-open"></i> 
                                    <?php echo htmlspecialchars($p['nama_kategori']); ?>
                                </div>
                                <h3 class="product-title">
                                    <a href="detail_produk.php?id=<?php echo $p['id']; ?>">
                                        <?php echo htmlspecialchars($p['nama_produk']); ?>
                                    </a>
                                </h3>
                                <p class="product-description">
                                    <?php
                                    $deskripsi = strip_tags($p['deskripsi']);
                                    echo (strlen($deskripsi) > 80)
                                        ? substr($deskripsi, 0, 80) . "..."
                                        : $deskripsi;
                                    ?>
                                </p>
                                <div class="product-footer">
                                    <div class="product-price">
                                        <span class="price-label">Harga Mulai</span>
                                        <span class="price-value">
                                            <?php
                                            echo is_numeric($p['harga'])
                                                ? "Rp " . number_format($p['harga'], 0, ',', '.')
                                                : $p['harga'];
                                            ?>
                                        </span>
                                    </div>
                                    <a href="https://wa.me/6282117773741?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20<?php echo urlencode($p['nama_produk']); ?>%20di%20Lega%20DigiPrint.%20Mohon%20informasi%20lebih%20lanjut." 
                                       class="order-btn"
                                       target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Pesan</span>
                                        <i class="fas fa-arrow-right"></i>
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
                    <h3>Produk Tidak Ditemukan</h3>
                    <p>Maaf, produk yang Anda cari belum tersedia atau tidak ditemukan.</p>
                    <a href="produk.php" class="back-btn">
                        <i class="fas fa-arrow-left"></i> 
                        Kembali ke Semua Produk
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Benefit Section -->
    <section class="benefit-section">
        <div class="container">
            <div class="section-header center">
                <span class="section-tag">Keunggulan Kami</span>
                <h2 class="section-title">Kenapa Memilih <span>Lega DigiPrint</span>?</h2>
                <div class="section-divider"></div>
                <p class="section-desc">Kami berkomitmen memberikan layanan terbaik untuk setiap pelanggan</p>
            </div>
            <div class="benefit-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-truck-fast"></i>
                    </div>
                    <h4>Pengiriman Cepat</h4>
                    <p>Proses cepat & packing aman sampai tujuan dengan ekspedisi terpercaya</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h4>Kualitas Terjamin</h4>
                    <p>Material premium & hasil cetak memuaskan dengan teknologi modern</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>Konsultasi Gratis</h4>
                    <p>Tim profesional siap membantu desain & konsultasi kebutuhan Anda</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h4>Harga Kompetitif</h4>
                    <p>Terjangkau dengan kualitas terbaik tanpa mengorbankan hasil</p>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* ==================== VARIABLES ==================== */
:root {
    --primary: #004ea2;
    --primary-dark: #003d82;
    --primary-light: #3b82f6;
    --primary-gradient: linear-gradient(135deg, #004ea2 0%, #3b82f6 100%);
    --gold: #c9a84c;
    --gold-light: #e8d5a3;
    --dark: #0a0a1a;
    --dark-soft: #1a1a2e;
    --gray: #6b6b7b;
    --gray-light: #a0a0b0;
    --bg-light: #f8fafc;
    --white: #ffffff;
    --whatsapp: #25D366;
    --shadow-premium: 0 20px 60px rgba(0, 0, 0, 0.3);
    --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
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

/* ==================== HERO SECTION - FULL IMAGE ==================== */
.product-hero {
    position: relative;
    width: 100%;
    height: auto;
    min-height: 300px;
    overflow: hidden;
    display: block;
    line-height: 0;
}

.hero-bg-image {
    width: 100%;
    display: block;
    line-height: 0;
}

.hero-bg-image img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
}

/* ==================== FILTER SECTION ==================== */
.product-filter-section {
    position: relative;
    margin-top: -30px;
    z-index: 10;
    padding-bottom: 50px;
}

.filter-card {
    background: var(--white);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.filter-header {
    background: var(--primary-gradient);
    padding: 18px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.filter-title {
    display: flex;
    align-items: center;
    gap: 10px;
    color: white;
    font-weight: 600;
}

.filter-title i {
    font-size: 1.1rem;
}

.clear-filter {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.2);
    padding: 6px 16px;
    border-radius: 50px;
    color: white;
    text-decoration: none;
    font-size: 0.8rem;
    transition: var(--transition);
}

.clear-filter:hover {
    background: rgba(255,255,255,0.3);
    transform: translateY(-2px);
}

.filter-body {
    padding: 25px;
}

.search-form {
    margin-bottom: 25px;
}

.search-input-group {
    display: flex;
    align-items: center;
    background: var(--bg-light);
    border-radius: 50px;
    padding: 5px 5px 5px 20px;
    border: 2px solid #e2e8f0;
    transition: var(--transition);
}

.search-input-group:focus-within {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(0,78,162,0.1);
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
    padding: 10px 25px;
    border-radius: 50px;
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 8px;
}

.search-input-group button:hover {
    background: var(--primary-dark);
    transform: scale(1.02);
}

.category-wrapper {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 20px;
}

.category-label {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--gray);
    font-size: 0.85rem;
    font-weight: 600;
}

.category-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.cat-item {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 18px;
    background: var(--bg-light);
    border-radius: 30px;
    text-decoration: none;
    color: var(--gray);
    font-size: 0.8rem;
    font-weight: 500;
    transition: var(--transition);
}

.cat-item i {
    font-size: 0.75rem;
}

.cat-item:hover,
.cat-item.active {
    background: var(--primary);
    color: white;
    transform: translateY(-2px);
}

.filter-result-info {
    background: linear-gradient(135deg, #e0f2fe 0%, #fef3c7 100%);
    padding: 12px 25px;
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
    font-size: 0.85rem;
    color: #1e293b;
}

/* ==================== PRODUCT SECTION ==================== */
.product-section {
    padding: 30px 0 70px;
    background: var(--bg-light);
}

.product-header {
    margin-bottom: 30px;
}

.product-stats {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--white);
    padding: 8px 20px;
    border-radius: 50px;
    color: var(--gray);
    font-size: 0.85rem;
    border: 1px solid #e2e8f0;
}

.product-stats i {
    color: var(--primary);
}

/* ==================== PRODUCT GRID ==================== */
.product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
}

.product-card {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    transition: var(--transition);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    border: 1px solid #e2e8f0;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    border-color: transparent;
}

.product-image-wrapper {
    position: relative;
    overflow: hidden;
}

.product-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    z-index: 5;
}

.badge-stok, .badge-preorder {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.65rem;
    font-weight: 700;
}

.badge-stok {
    background: #10b981;
    color: white;
}

.badge-preorder {
    background: #f59e0b;
    color: white;
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
    transition: transform 0.5s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

.image-overlay {
    position: absolute;
    inset: 0;
    background: rgba(15, 23, 42, 0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition);
}

.product-card:hover .image-overlay {
    opacity: 1;
}

.overlay-content {
    transform: translateY(20px);
    transition: transform 0.3s ease;
}

.product-card:hover .overlay-content {
    transform: translateY(0);
}

.view-detail {
    background: var(--primary);
    color: white;
    padding: 10px 20px;
    border-radius: 40px;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
}

.view-detail:hover {
    background: var(--primary-dark);
    transform: scale(1.05);
}

.product-content {
    padding: 16px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.product-category {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #eef2ff;
    color: var(--primary-dark);
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.65rem;
    font-weight: 600;
    margin-bottom: 10px;
    width: fit-content;
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
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    margin-top: auto;
}

.product-price {
    flex: 1;
}

.price-label {
    display: block;
    font-size: 0.65rem;
    color: var(--gray-light);
    margin-bottom: 2px;
}

.price-value {
    display: block;
    font-weight: 800;
    color: var(--primary-dark);
    font-size: 1rem;
}

.order-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #25D366;
    color: white;
    padding: 8px 14px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 600;
    transition: var(--transition);
    white-space: nowrap;
}

.order-btn:hover {
    background: #128C7E;
    transform: scale(1.02);
}

.order-btn i:last-child {
    font-size: 0.7rem;
}

/* ==================== BENEFIT SECTION ==================== */
.benefit-section {
    padding: 70px 0;
    background: var(--white);
}

.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-tag {
    display: inline-block;
    background: rgba(0,78,162,0.1);
    color: var(--primary);
    padding: 5px 15px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 15px;
}

.section-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 15px;
}

.section-title span {
    color: var(--primary);
}

.section-divider {
    width: 60px;
    height: 3px;
    background: var(--primary-gradient);
    border-radius: 3px;
    margin: 0 auto 15px;
}

.section-desc {
    color: var(--gray);
    font-size: 0.9rem;
}

.benefit-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
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
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
    border-color: var(--primary-light);
}

.benefit-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, rgba(0,78,162,0.1) 0%, rgba(59,130,246,0.1) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    transition: var(--transition);
}

.benefit-card:hover .benefit-icon {
    transform: scale(1.1);
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
    line-height: 1.5;
}

/* ==================== EMPTY STATE ==================== */
.empty-products {
    text-align: center;
    padding: 80px 20px;
    background: var(--white);
    border-radius: 24px;
}

.empty-icon {
    width: 100px;
    height: 100px;
    background: var(--bg-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
}

.empty-icon i {
    font-size: 3rem;
    color: var(--gray-light);
}

.empty-products h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: var(--dark);
}

.empty-products p {
    color: var(--gray);
    margin-bottom: 30px;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--primary);
    color: white;
    padding: 12px 30px;
    border-radius: 40px;
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.back-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

/* ==================== RESPONSIVE ==================== */
@media (max-width: 1200px) {
    .product-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    
    .benefit-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 992px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .product-hero {
        min-height: auto;
    }
    
    .filter-header {
        flex-direction: column;
        text-align: center;
    }
    
    .filter-body {
        padding: 20px;
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
    }
    
    .cat-item {
        white-space: nowrap;
    }
    
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .product-content {
        padding: 12px;
    }
    
    .product-title {
        font-size: 0.85rem;
    }
    
    .product-description {
        display: none;
    }
    
    .price-label {
        display: none;
    }
    
    .price-value {
        font-size: 0.85rem;
    }
    
    .order-btn {
        padding: 6px 10px;
        font-size: 0.7rem;
    }
    
    .order-btn span {
        display: inline;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .benefit-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
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
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }
    
    .search-input-group {
        padding: 4px 4px 4px 14px;
    }
    
    .search-input-group input {
        padding: 10px 8px;
        font-size: 0.8rem;
    }
    
    .search-input-group button {
        padding: 8px 14px;
        font-size: 0.75rem;
    }
    
    .search-input-group button span {
        display: none;
    }
    
    .product-grid {
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    
    .product-card {
        border-radius: 12px;
    }
    
    .product-image img {
        aspect-ratio: 1 / 1;
        object-fit: cover;
    }
    
    .product-title {
        font-size: 0.8rem;
        -webkit-line-clamp: 2;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .order-btn {
        padding: 5px 8px;
        font-size: 0.65rem;
    }
    
    .order-btn i:last-child {
        display: none;
    }
    
    .price-value {
        font-size: 0.8rem;
    }
}
</style>

<script>
// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add animation on scroll for product cards
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

document.querySelectorAll('.product-card, .benefit-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'all 0.6s ease';
    observer.observe(el);
});
</script>

<?php include "layout/footer.php"; ?>