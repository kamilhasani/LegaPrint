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
                    <a href="produk.php">Produk</a> / <span><?php echo $p['kategori']; ?></span>
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
    .detail-page { background: #fff; padding: 40px 0; }
    .detail-grid { display: grid; grid-template-columns: 1.2fr 1fr; gap: 50px; align-items: start; }
    
    /* Image Styling */
    .detail-image img { 
        width: 100%; 
        height: 500px; 
        object-fit: cover; 
        border-radius: 20px; 
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: 0.3s;
    }
    
    /* Thumbnail Styling */
    .thumbnail-gallery { 
        display: flex; 
        gap: 15px; 
        margin-top: 20px; 
        overflow-x: auto; 
        padding-bottom: 10px;
    }
    
    .thumb-item { 
        width: 80px; 
        height: 80px; 
        border-radius: 10px; 
        overflow: hidden; 
        cursor: pointer; 
        border: 2px solid transparent;
        transition: 0.2s;
        flex-shrink: 0;
    }
    
    .thumb-item img { width: 100%; height: 100%; object-fit: cover; }
    
    .thumb-item:hover { border-color: var(--primary); }
    .thumb-item.active { border-color: #0284c7; box-shadow: 0 4px 10px rgba(2, 132, 199, 0.2); }

    /* Info Styling */
    .breadcrumb { margin-bottom: 20px; font-size: 0.9rem; color: #64748b; }
    .detail-info h1 { font-size: 2.5rem; color: #0f172a; margin-bottom: 15px; }
    .detail-price { font-size: 2.2rem; font-weight: 800; color: #0284c7; margin-bottom: 30px; }

    .detail-desc { margin-top: 30px; padding-top: 30px; border-top: 1px solid #f1f5f9; }
    .section-title { font-size: 1.3rem; margin-bottom: 15px; color: #334155; }
    .description-content { line-height: 1.8; color: #475569; font-size: 1.05rem; }
    
    .detail-action { display: flex; gap: 15px; margin-top: 40px; }
    .btn-wa { background: #f1f5f9; color: #1e293b; padding: 15px 25px; border-radius: 12px; text-decoration: none; font-weight: 600; flex: 1; text-align: center; }
    .btn-order-now { background: #22c55e; color: #fff; padding: 15px 25px; border-radius: 12px; text-decoration: none; font-weight: 700; flex: 1.5; text-align: center; }
    
    .btn-order-now:hover { background: #16a34a; transform: translateY(-3px); box-shadow: 0 10px 20px rgba(34, 197, 94, 0.3); }

    @media (max-width: 992px) {
        .detail-grid { grid-template-columns: 1fr; gap: 30px; }
        .detail-image img { height: 400px; }
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