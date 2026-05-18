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

    <!-- FILTER -->
    <div class="filter-wrapper">
        <div class="container">

            <div class="search-category-container">

                <!-- SEARCH -->
                <div class="search-box">
                    <form action="" method="GET">

                        <?php if ($kategori_filter != ''): ?>
                            <input type="hidden" 
                                   name="kat" 
                                   value="<?php echo $kategori_filter; ?>">
                        <?php endif; ?>

                        <input type="text" 
                               name="search" 
                               placeholder="Cari produk impianmu..." 
                               value="<?php echo htmlspecialchars($search); ?>">

                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>

                    </form>
                </div>

                <!-- CATEGORY -->
                <div class="category-menu">

                    <button class="btn-hamburger" onclick="toggleCategory()">
                        <i class="fas fa-list-ul"></i>
                    </button>

                    <div id="categoryDropdown" class="category-content">

                        <!-- SEMUA PRODUK -->
                        <a href="produk.php<?php echo ($search != '') ? '?search=' . urlencode($search) : ''; ?>" 
                           class="<?php echo ($kategori_filter == '') ? 'active' : ''; ?>">
                            Semua Produk
                        </a>

                        <?php
                        $list_kat = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori ASC");

                        if ($list_kat && mysqli_num_rows($list_kat) > 0) {

                            while ($row = mysqli_fetch_assoc($list_kat)) {

                                $id_kat = $row['id_kategori'];

                                $active_class = ($kategori_filter == $id_kat) ? 'active' : '';

                                $url_search = ($search != '') 
                                    ? "&search=" . urlencode($search) 
                                    : "";

                                echo "
                                <a href='produk.php?kat=$id_kat$url_search' class='$active_class'>
                                    <i class='fas fa-tag'></i>
                                    " . htmlspecialchars($row['nama_kategori']) . "
                                </a>";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>

            <!-- INFO FILTER -->
            <?php if ($kategori_filter != '' || $search != ''): ?>

                <div class="search-result-info">

                    Menampilkan hasil untuk:

                    <strong>
                        <?php 
                        echo $kategori_nama;
                        ?>
                    </strong>

                    <?php if ($search != ''): ?>
                        | Kata kunci:
                        <em>"<?php echo htmlspecialchars($search); ?>"</em>
                    <?php endif; ?>

                    <a href="produk.php" class="clear-filter">
                        Hapus Filter
                    </a>

                </div>

            <?php endif; ?>

        </div>
    </div>

    <!-- PRODUK -->
    <section class="product-section section-padding">
        <div class="container">
            <div class="product-grid">
                <?php if ($data && mysqli_num_rows($data) > 0): ?>
                    <?php while ($p = mysqli_fetch_assoc($data)): ?>
                        <div class="product-card">

                            <!-- GAMBAR -->
                            <a href="detail_produk.php?id=<?php echo $p['id']; ?>" 
                               class="product-img-link">
                                <div class="product-img">
                                    <img 
                                        src="assets/images/produk/<?php echo (!empty($p['gambar'])) ? $p['gambar'] : 'default.png'; ?>" 
                                        alt="<?php echo htmlspecialchars($p['nama_produk']); ?>">
                                    <div class="product-overlay">
                                        <span class="view-text">
                                            Lihat Detail
                                        </span>
                                    </div>
                                </div>
                            </a>

                            <!-- INFO -->
                            <div class="product-info">
                                <!-- KATEGORI -->
                                <div class="category-tag">
                                    <?php echo htmlspecialchars($p['nama_kategori']); ?>
                                </div>

                                <!-- NAMA -->
                                <h3>
                                    <a href="detail_produk.php?id=<?php echo $p['id']; ?>" 
                                       style="text-decoration:none;color:inherit;">
                                        <?php echo htmlspecialchars($p['nama_produk']); ?>
                                    </a>
                                </h3>

                                <!-- DESKRIPSI -->
                                <p class="desc">
                                    <?php
                                    $deskripsi = strip_tags($p['deskripsi']);
                                    echo (strlen($deskripsi) > 80)
                                        ? substr($deskripsi, 0, 80) . "..."
                                        : $deskripsi;
                                    ?>
                                </p>

                                <!-- HARGA -->
                                <div class="price-action">
                                    <div class="price">
                                        <?php
                                        echo is_numeric($p['harga'])
                                            ? "Rp " . number_format($p['harga'], 0, ',', '.')
                                            : $p['harga'];
                                        ?>
                                    </div>
                                    <!-- BUTTON PESAN -->
                                    <a href="https://wa.me/6282117773741?text=Halo, saya ingin pesan produk: <?php echo urlencode($p['nama_produk']); ?>" 
                                       class="btn-order"
                                       target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                        Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <!-- PRODUK KOSONG -->
                    <div class="alert-empty">
                        <i class="fas fa-search"></i>
                        <p>Maaf, produk tidak ditemukan.</p>
                        <a href="produk.php" class="btn-back">
                            Kembali
                        </a>
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

    /*PRODUK*/
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

    /* Update khusus untuk tampilan smartphone */
    @media(max-width: 768px) {
        body {
            padding: 0;
            margin: 0;
        }

        .product-grid {
            grid-template-columns: repeat(2, 1fr); 
            gap: 6px; 
            padding: 8px 4px; 
            width: 100%;
            box-sizing: border-box;
        }

        .product-card {
            border-radius: 8px;
            border: 1px solid #f1f5f9; 
        }

        .product-img {
            height: auto;
            aspect-ratio: 1 / 1; 
        }

        .product-info {
            padding: 8px; 
        }

        .category-tag {
            font-size: 10px;
            padding: 1px 5px;
            margin-bottom: 4px;
        }

        .desc {
            font-size: 12px;
            line-height: 1.3;
            margin-bottom: 6px;
            display: -webkit-box;
            -webkit-line-clamp: 2; 
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 32px; 
        }

        .price-action {
            flex-direction: column;
            align-items: flex-start;
            gap: 6px;
        }

        .price {
            font-size: 14px;
            color: #000000; 
        }

        .btn-order {
            width: 100%;
            padding: 6px 0;
            font-size: 11px;
            justify-content: center;
        }

        .product-card:hover {
            transform: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
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