<?php 
include "config/koneksi.php"; 
include "layout/header.php"; 

$kategori_filter = isset($_GET['kat']) ? mysqli_real_escape_string($conn, $_GET['kat']) : '';
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

$query_str = "SELECT * FROM produk WHERE 1=1";

if ($kategori_filter != '') { 
    $query_str .= " AND kategori = '$kategori_filter'"; 
}

if ($search != '') { 
    $query_str .= " AND (nama_produk LIKE '%$search%' OR deskripsi LIKE '%$search%')"; 
}

$query_str .= " ORDER BY id DESC";
$data = mysqli_query($conn, $query_str);
?>

<main class="product-page">
    <div class="filter-wrapper">
        <div class="container">
            <div class="search-category-container">
                <!-- SEARCH -->
                <div class="search-box">
                    <form action="" method="GET">
                        <?php if ($kategori_filter != ''): ?>
                            <input type="hidden" name="kat" value="<?php echo $kategori_filter; ?>">
                        <?php endif; ?>
                        
                        <input type="text" name="search" placeholder="Cari produk impianmu..." value="<?php echo $search; ?>">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- HAMBURGER CATEGORY -->
                <div class="category-menu">
                    <button class="btn-hamburger" onclick="toggleCategory()">
                        <i class="fas fa-list-ul"></i>
                    </button>

                    <div id="categoryDropdown" class="category-content">
                        <a href="produk.php<?php echo ($search != '') ? '?search=' . urlencode($search) : ''; ?>" 
                           class="<?php echo $kategori_filter == '' ? 'active' : ''; ?>">
                            Semua Produk
                        </a>

                        <?php
                        $list_kat = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori ASC");

                        if ($list_kat && mysqli_num_rows($list_kat) > 0) {
                            while ($row = mysqli_fetch_assoc($list_kat)) {
                                $nama_kat = $row['nama_kategori'];
                                $active_class = ($kategori_filter == $nama_kat) ? 'active' : '';
                                $url_search = ($search != '') ? "&search=" . urlencode($search) : "";

                                echo "<a href='produk.php?kat=" . urlencode($nama_kat) . "$url_search' class='$active_class'>
                                        <i class='fas fa-tag'></i> " . htmlspecialchars($nama_kat) . "
                                      </a>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <?php if ($kategori_filter != '' || $search != ''): ?>
                <div class="search-result-info">
                    Menampilkan hasil untuk:
                    <strong><?php echo $kategori_filter ?: 'Semua Kategori'; ?></strong>
                    
                    <?php if ($search != '') echo " | Kata kunci: <em>\"$search\"</em>"; ?>
                    
                    <a href="produk.php" class="clear-filter">Hapus Filter</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- PRODUK -->
    <section class="product-section section-padding">
        <div class="container">
            <div class="product-grid">
                <?php if ($data && mysqli_num_rows($data) > 0): ?>
                    <?php while ($p = mysqli_fetch_array($data)): ?>
                        <div class="product-card">
                            <a href="detail_produk.php?id=<?php echo $p['id']; ?>" class="product-img-link">
                                <div class="product-img">
                                    <img src="assets/images/produk/<?php echo $p['gambar']; ?>" alt="<?php echo $p['nama_produk']; ?>">
                                    <div class="product-overlay">
                                        <span class="view-text">Lihat Detail</span>
                                    </div>
                                </div>
                            </a>

                            <div class="product-info">
                                <div class="category-tag">
                                    <?php echo $p['kategori']; ?>
                                </div>

                                <h3>
                                    <a href="detail_produk.php?id=<?php echo $p['id']; ?>" style="text-decoration:none;color:inherit;">
                                        <?php echo $p['nama_produk']; ?>
                                    </a>
                                </h3>

                                <p class="desc">
                                    <?php
                                    echo (strlen($p['deskripsi']) > 80)
                                        ? substr($p['deskripsi'], 0, 80) . "..."
                                        : $p['deskripsi'];
                                    ?>
                                </p>

                                <div class="price-action">
                                    <div class="price">
                                        <?php
                                        echo is_numeric($p['harga'])
                                            ? "Rp " . number_format($p['harga'], 0, ',', '.')
                                            : $p['harga'];
                                        ?>
                                    </div>

                                    <a href="https://wa.me/628123456789?text=Halo, saya ingin pesan produk: <?php echo urlencode($p['nama_produk']); ?>" 
                                       class="btn-order" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                        Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class='alert-empty'>
                        <i class='fas fa-search'></i>
                        <p>Maaf, produk tidak ditemukan.</p>
                        <a href='produk.php' class='btn-back'>Kembali</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<style>
    .filter-wrapper { 
        padding-top: 40px; 
    }

    .search-category-container { 
        display: flex; 
        gap: 15px; 
        align-items: center; 
        background: white; 
        padding: 10px; 
        border-radius: 16px; 
        box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
    }

    .search-box { 
        flex: 1; 
        position: relative; 
    }

    .search-box input { 
        width: 100%; 
        padding: 15px 20px; 
        border: none; 
        background: transparent; 
        font-size: 1rem; 
        outline: none; 
    }

    .search-box button { 
        position: absolute; 
        right: 10px; 
        top: 50%; 
        transform: translateY(-50%); 
        background: none; 
        border: none; 
        color: #94a3b8; 
        cursor: pointer; 
        font-size: 1.2rem; 
    }

    .btn-hamburger { 
        background: #004d95; 
        color: white; 
        border: none; 
        width: 50px; 
        height: 50px; 
        border-radius: 12px; 
        cursor: pointer; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        font-size: 1.3rem; 
        transition: 0.3s; 
    }

    .category-menu { 
        position: relative; 
    }

    .category-content { 
        display: none; 
        position: absolute; 
        right: 0; 
        top: 60px; 
        background: white; 
        min-width: 220px; 
        border-radius: 12px; 
        box-shadow: 0 10px 25px rgba(0,0,0,0.1); 
        z-index: 1000; 
        overflow: hidden; 
        border: 1px solid #f1f5f9; 
    }

    .category-content a { 
        display: block; 
        padding: 14px 20px; 
        text-decoration: none; 
        color: #1e293b; 
        font-weight: 500; 
        transition: 0.2s; 
    }

    .category-content a:hover, 
    .category-content a.active { 
        background: #f1f5f9; 
        color: #004d95; 
    }

    .show { 
        display: block !important; 
    }

    .search-result-info { 
        margin-top: 15px; 
        font-size: 0.9rem; 
        color: #64748b; 
    }

    .clear-filter { 
        color: #ef4444; 
        margin-left: 10px; 
        text-decoration: none; 
        font-weight: 600; 
    }

    .alert-empty { 
        grid-column: 1 / -1; 
        text-align: center; 
        padding: 60px; 
        background: white; 
        border-radius: 20px; 
        border: 2px dashed #e2e8f0; 
    }

    .btn-back { 
        display: inline-block; 
        margin-top: 15px; 
        color: #004d95; 
        font-weight: 600; 
        text-decoration: none; 
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    .product-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: 0.3s;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .product-img {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
    }

    .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.3s;
    }

    .product-card:hover img {
        transform: scale(1.05);
    }

    .product-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s;
    }

    .product-card:hover .product-overlay {
        opacity: 1;
    }

    .view-text {
        background: #004d95;
        color: white;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 600;
    }

    .product-info {
        padding: 18px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .category-tag {
        background: #eef2ff;
        color: #2563eb;
        padding: 4px 10px;
        font-size: 12px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 8px;
    }

    .desc {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 12px;
    }

    .price-action {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .price {
        font-weight: 700;
    }

    .btn-order {
        background: #25D366;
        color: white;
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        display: flex;
        gap: 6px;
        align-items: center;
    }

    .btn-order:hover {
        background: #1eb954;
    }

    .alert-empty {
        grid-column: 1/-1;
        text-align: center;
        padding: 60px;
    }

    @media(max-width: 768px) {
        .search-category-container {
            flex-direction: column;
        }

        .product-grid {
            grid-template-columns: 1fr;
        }

        .product-img {
            height: 180px;
        }

        .price-action {
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
        }

        .btn-order {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<script>
function toggleCategory() {
    document.getElementById("categoryDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.btn-hamburger') && !event.target.matches('.fa-list-ul')) {
        var dropdowns = document.getElementsByClassName("category-content");
        
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>

<?php include "layout/footer.php"; ?>