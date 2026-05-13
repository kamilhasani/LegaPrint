<?php 
include "config/koneksi.php"; 
include "layout/header.php"; 

// Ambil ID dari URL
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$id'");
$p = mysqli_fetch_array($query);

// Ambil Galeri Foto Tambahan
$query_galeri = mysqli_query($conn, "SELECT * FROM produk_gambar WHERE id_produk = '$id'");

// Jika produk tidak ditemukan
if (!$p) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='produk.php';</script>";
    exit;
}
?>

<main class="detail-page">
    <div class="container section-padding">
        <div class="detail-grid">
            <div class="product-visuals">
                <div class="detail-image">
                    <img id="main-img" src="assets/images/produk/<?php echo $p['gambar']; ?>" alt="<?php echo $p['nama_produk']; ?>">
                </div>
                
                <?php if (mysqli_num_rows($query_galeri) > 0): ?>
                <div class="thumbnail-gallery">
                    <div class="thumb-item active" onclick="changeImage('assets/images/produk/<?php echo $p['gambar']; ?>', this)">
                        <img src="assets/images/produk/<?php echo $p['gambar']; ?>">
                    </div>
                    
                    <?php while($g = mysqli_fetch_array($query_galeri)): ?>
                    <div class="thumb-item" onclick="changeImage('assets/images/produk/<?php echo $g['gambar_tambahan']; ?>', this)">
                        <img src="assets/images/produk/<?php echo $g['gambar_tambahan']; ?>">
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="detail-info">
                <nav class="breadcrumb">
                    <a href="produk.php">Produk</a> / <span><?php echo $p['id_kategori']; ?></span>
                </nav>
                
                <h1><?php echo $p['nama_produk']; ?></h1>
                
                <div class="detail-price">
                    <?php echo is_numeric($p['harga']) ? "Rp " . number_format($p['harga'], 0, ',', '.') : $p['harga']; ?>
                </div>

                <div class="detail-desc">
                    <h2 class="section-title">Deskripsi Produk</h2>
                    <div class="description-content">
                        <?php echo nl2br($p['deskripsi']); ?>
                    </div>
                </div>

                <div class="detail-action">
                    <a href="https://wa.me/628123456789?text=Halo, saya ingin bertanya tentang produk: <?php echo urlencode($p['nama_produk']); ?>" class="btn-wa">
                        <i class="fab fa-whatsapp"></i> Tanya Stok
                    </a>
                    <a href="https://wa.me/628123456789?text=Halo, saya ingin order: <?php echo urlencode($p['nama_produk']); ?>" class="btn-order-now">
                        Order Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* DETAIL PAGE */
        .detail-page {
            background: #fff;
            padding: 30px 0 60px;
            overflow: hidden;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 50px;
            align-items: start;
        }

        /* =========================
        IMAGE
        ========================= */

        .detail-image {
            width: 100%;
            overflow: hidden;
        }

        .detail-image img {
            width: 100%;
            height: auto;
            max-height: 300px;
            object-fit: cover;
            border-radius: 14px;
            display: block;
        }

        /* THUMBNAIL */
        .thumbnail-gallery {
            display: flex;
            gap: 12px;
            margin-top: 18px;
            overflow-x: auto;
            padding-bottom: 5px;
            scrollbar-width: none;
        }

        .thumbnail-gallery::-webkit-scrollbar {
            display: none;
        }

        .thumb-item {
            width: 75px;
            height: 75px;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: 0.3s;
            flex-shrink: 0;
            background: #f1f5f9;
        }

        .thumb-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumb-item:hover {
            border-color: #0284c7;
        }

        .thumb-item.active {
            border-color: #0284c7;
            box-shadow: 0 4px 12px rgba(2,132,199,0.2);
        }

        /* ========== INFO ============= */
        .detail-info {
            width: 100%;
        }

        .breadcrumb {
            margin-bottom: 15px;
            font-size: 14px;
            color: #64748b;
            word-break: break-word;
        }

        .detail-info h1 {
            font-size: 38px;
            line-height: 1.3;
            color: #0f172a;
            margin-bottom: 15px;
            font-weight: 800;
            word-break: break-word;
        }

        .detail-price {
            font-size: 36px;
            font-weight: 800;
            color: #0284c7;
            margin-bottom: 25px;
            word-break: break-word;
        }

        /* =========================
        DESCRIPTION
        ========================= */

        .detail-desc {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e2e8f0;
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 15px;
            color: #1e293b;
            font-weight: 700;
        }

        .description-content {
            line-height: 1.8;
            color: #475569;
            font-size: 15px;
            word-break: break-word;
        }

        /* =========================
        BUTTON ACTION
        ========================= */

        .detail-action {
            display: flex;
            gap: 15px;
            margin-top: 35px;
        }

        .btn-wa,
        .btn-order-now {
            padding: 14px 20px;
            border-radius: 12px;
            text-decoration: none;
            text-align: center;
            font-weight: 700;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-wa {
            background: #f1f5f9;
            color: #1e293b;
            flex: 1;
        }

        .btn-wa:hover {
            background: #e2e8f0;
        }

        .btn-order-now {
            background: #22c55e;
            color: #fff;
            flex: 1.5;
        }

        .btn-order-now:hover {
            background: #16a34a;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(34,197,94,0.25);
        }

    /* =========================
    TABLET
    ========================= */

    @media (max-width: 992px) {

        .detail-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .detail-image img {
            height: 420px;
        }

        .detail-info h1 {
            font-size: 30px;
        }

        .detail-price {
            font-size: 30px;
        }
    }

    /* =========================
    MOBILE
    ========================= */

    /* =========================
   FIX DETAIL PRODUK MOBILE
========================= */

    @media (max-width: 576px) {

        /* CONTAINER */
        .container {
            width: 100%;
            max-width: 100%;
            padding-left: 12px;
            padding-right: 12px;
            margin: 0 auto;
            overflow: hidden;
        }

        /* DETAIL GRID */
        .detail-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            overflow: hidden;
        }

        /* IMAGE */
        .detail-image {
            width: 100%;
            overflow: hidden;
        }

        .detail-image img {
            width: 100%;
            height: auto;
            max-height: 300px;
            object-fit: cover;
            border-radius: 14px;
            display: block;
        }

        /* THUMBNAIL */
        .thumbnail-gallery {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            padding-bottom: 5px;
            margin-top: 12px;
            width: 100%;
        }

        .thumb-item {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
            border-radius: 10px;
        }

        .thumb-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* INFO */
        .detail-info {
            width: 100%;
            overflow: hidden;
        }

        .detail-info h1 {
            font-size: 18px;
            line-height: 1.4;
            margin-bottom: 10px;
            word-break: break-word;
        }

        .detail-price {
            font-size: 18px;
            margin-bottom: 18px;
        }

        .section-title {
            font-size: 16px;
        }

        .description-content {
            font-size: 13px;
            line-height: 1.7;
            word-break: break-word;
        }

        /* BUTTON */
        .detail-action {
            display: flex;
            gap: 10px;
            width: 100%;
            margin-top: 25px;
        }

        .btn-wa,
        .btn-order-now {
            flex: 1;
            width: 100%;
            min-width: 0;
            padding: 12px 10px;
            font-size: 13px;
            border-radius: 10px;
            text-align: center;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-order-now {
            background: #22c55e;
            color: white;
        }

        .btn-wa {
            background: #f1f5f9;
            color: #1e293b;
        }
    }
        /* KHUSUS DETAIL PRODUK MOBILE */

    @media (max-width: 576px) {
        html,
        body {
            overflow-x: hidden;
            max-width: 100%;
        }

        * {
            box-sizing: border-box;
        }

        .detail-page {
            overflow-x: hidden;
            width: 100%;
        }

        .container {
            width: 100%;
            max-width: 100%;
            padding-left: 15px;
            padding-right: 15px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .detail-grid {
            width: 100%;
            max-width: 100%;
            overflow: hidden;
        }

        .detail-image,
        .detail-info {
            width: 100%;
            max-width: 100%;
        }

        .detail-image img {
            width: 100%;
            max-width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }

        .thumbnail-gallery {
            width: 100%;
            overflow-x: auto;
        }

        .detail-info h1,
        .description-content,
        .detail-price {
            word-break: break-word;
        }

        .detail-action {
            width: 100%;
        }

        .btn-wa,
        .btn-order-now {
            min-width: 0;
        }
    }
</style>

<script>
    // Fungsi untuk mengganti gambar utama saat thumbnail diklik
    function changeImage(src, element) {
        // Ganti src gambar utama
        document.getElementById('main-img').src = src;
        
        // Reset class active pada semua thumbnail
        const thumbs = document.querySelectorAll('.thumb-item');
        thumbs.forEach(thumb => thumb.classList.remove('active'));
        
        // Tambahkan class active pada yang sedang diklik
        element.classList.add('active');
    }
</script>

<?php include "layout/footer.php"; ?>