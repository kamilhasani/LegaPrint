<?php 
include "config/koneksi.php"; 
include "layout/header.php"; 
?>

<main class="product-page">
    <section class="product-hero" style="background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('assets/images/about/percetakan.jpg');">
        <div class="container">
            <span class="badge">Katalog Lega DigiPrint</span>
            <h1>Solusi Cetak <span>Terbaik</span></h1>
            <p>Temukan berbagai kebutuhan cetak digital dan percetakan offset dengan kualitas premium.</p>
        </div>
    </section>

    <section class="product-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2>Produk <span>Layanan Kami</span></h2>
                <p>Kualitas tajam, proses cepat, dan harga kompetitif untuk bisnis Anda.</p>
            </div>

            <div class="product-grid">
                <?php
                // Perbaikan: Menggunakan 'id' sesuai struktur tabel kamu
                $query = "SELECT * FROM produk ORDER BY id DESC";
                $data = mysqli_query($conn, $query);

                // Cek apakah query berhasil
                if ($data) {
                    if (mysqli_num_rows($data) > 0) {
                        while ($p = mysqli_fetch_array($data)) {
                ?>
                <div class="product-card">
                    <div class="product-img">
                        <img src="assets/images/produk/<?php echo $p['gambar']; ?>" alt="<?php echo $p['nama_produk']; ?>">
                        <div class="product-overlay">
                            <span class="view-text">Lihat Detail</span>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="category-tag">Digital Printing</div>
                        <h3><?php echo $p['nama_produk']; ?></h3>
                        <p class="desc"><?php echo substr($p['deskripsi'], 0, 80); ?>...</p>
                        <div class="price">
                            <?php 
                            // Cek apakah isi kolom harga adalah angka
                            if (is_numeric($p['harga'])) {
                                echo "Rp " . number_format($p['harga'], 0, ',', '.');
                            } else {
                                // Jika isinya teks (seperti 'permeter'), tampilkan apa adanya
                                echo $p['harga']; 
                            }
                            ?>
                        </div>
                        
                        <a href="https://wa.me/628123456789?text=Halo Farhan, saya ingin pesan produk: <?php echo $p['nama_produk']; ?>" class="btn-order">
                            <i class="fab fa-whatsapp"></i> Pesan via WA
                        </a>
                    </div>
                </div>
                <?php 
                        }
                    } else {
                        echo "<div class='alert'>Maaf, saat ini belum ada produk yang ditampilkan.</div>";
                    }
                } else {
                    // Jika query gagal, tampilkan pesan error database
                    echo "<div class='alert error'>Terjadi kesalahan: " . mysqli_error($conn) . "</div>";
                }
                ?>
            </div>
        </div>
    </section>
</main>

<style>
    /* CSS STYLE PRODUK */
    .product-page { background: #fdfdfd; }
    .section-padding { padding: 80px 0; }
    
    .product-hero {
        height: 350px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        text-align: center;
        color: white;
    }

    .section-title h2 { font-size: 2.5rem; font-weight: 800; margin-bottom: 40px; }
    .section-title h2 span { color: var(--primary); }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    .product-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #eee;
        transition: 0.3s;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .product-img {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .product-img img { width: 100%; height: 100%; object-fit: cover; }

    .product-info { padding: 20px; }
    .product-info h3 { font-size: 1.3rem; margin-bottom: 8px; color: #333; }
    .product-info .desc { font-size: 0.9rem; color: #777; margin-bottom: 15px; }
    .product-info .price { font-size: 1.5rem; font-weight: 800; color: #0f172a; margin-bottom: 20px; }
    
    .category-tag { font-size: 0.75rem; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 5px; }

    .btn-order {
        display: block;
        width: 100%;
        padding: 12px;
        background: #25D366;
        color: white;
        text-align: center;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s;
    }

    .btn-order:hover { background: #128c7e; }
    
    .alert { text-align: center; grid-column: 1 / -1; padding: 20px; background: #f1f5f9; border-radius: 10px; }
    .alert.error { background: #fee2e2; color: #b91c1c; }
</style>

<?php include "layout/footer.php"; ?>