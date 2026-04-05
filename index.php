<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lega DigiPrint | Percetakan Digital Profesional</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <nav class="container">
        <a href="index.php" class="logo">
            Lega<span>DigiPrint</span>
        </a>

        <ul class="nav-links" id="nav-menu">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="kontak.php">Kontak</a></li>
        </ul>

        <div class="nav-btns">
            <a href="admin/login.php" class="login-btn">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <div class="mobile-toggle" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
</header>

<section class="hero">
    <div class="container hero-grid">
        <div class="hero-content">
            <span class="badge"><i class="fas fa-check-circle"></i> Percetakan Digital Terpercaya</span>
            <h1>Butuh Jasa<span>Percetakan</span><br>Di Jakarta?</h1>
            <p>
                Lega DigiPrint hadir sebagai mitra percetakan digital profesional dengan kualitas premium dan pengerjaan kilat untuk segala kebutuhan bisnis Anda.
            </p>
            <div class="buttons">
                <a class="btn-primary" href="#produk">Eksplor Produk</a>
                <a class="btn-outline" href="https://wa.me/6281234567890">Konsultasi Gratis</a>
            </div>
        </div>
        <div class="hero-image">
        <div class="hero-gallery">

            <?php
            include "config/koneksi.php";

            $data = mysqli_query($conn,"SELECT * FROM hero ORDER BY id DESC LIMIT 3");

            while($d = mysqli_fetch_array($data)){
            ?>

            <img src="assets/images/hero/<?php echo $d['gambar']; ?>" alt="Hero Image">

            <?php } ?>

            </div>
        </div>
    </div>
</section>

<section id="tentang" class="bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Tentang Kami</h2>
            <div class="line"></div>
        </div>
        <div class="about-grid">
            <div class="about-img">
                <img src="https://picsum.photos/500/350" alt="Workshop Kami">
            </div>
            <div class="about-text">
                <h3>Kualitas Adalah Prioritas Kami</h3>
                <p>
                    Lega DigiPrint merupakan pusat percetakan digital yang mengedepankan presisi warna dan ketajaman hasil cetak. Kami melayani berbagai skala kebutuhan, mulai dari personal hingga korporat.
                </p>
                <ul class="about-features">
                    <li><i class="fas fa-check"></i> Teknologi Mesin Terbaru</li>
                    <li><i class="fas fa-check"></i> Tim Desain Profesional</li>
                    <li><i class="fas fa-check"></i> Kontrol Kualitas Berlapis</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="produk">
    <div class="container">
        <div class="section-title">
            <h2>Produk Kami</h2>
            <p>Solusi cetak lengkap untuk media promosi Anda</p>
        </div>
        <div class="produk-grid">
            
            <?php
            // Pastikan koneksi database sudah ada (biasanya di paling atas index.php)
            // include "config/koneksi.php"; 
            
            $query_produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
            
            if(mysqli_num_rows($query_produk) > 0) {
                while($row = mysqli_fetch_array($query_produk)) {
                    $nama_produk = $row['nama_produk'];
                    $deskripsi   = $row['deskripsi'];
                    $harga       = $row['harga'];
                    $gambar      = $row['gambar'];
                    
                    $pesan_wa = "Halo Lega DigiPrint, saya ingin tanya tentang produk " . $nama_produk;
                    $link_wa  = "https://wa.me/62821177773741?text=" . urlencode($pesan_wa);
            ?>
            
            <div class="produk-card">
                <div class="produk-img">
                    <img src="assets/images/produk/<?php echo $gambar; ?>" alt="<?php echo $nama_produk; ?>">
                </div>
                <div class="produk-info">
                    <h3><?php echo $nama_produk; ?></h3>
                    <p><?php echo $deskripsi; ?></p>
                    
                    <div class="price-tag">
                        Mulai 
                        <?php 
                        if (is_numeric($harga)) {
                            echo "Rp " . number_format((float)$harga, 0, ',', '.');
                        } else {
                            echo $harga;
                        }
                        ?>
                    </div>

                    <a href="<?php echo $link_wa; ?>" target="_blank" class="btn-wa">
                        <i class="fab fa-whatsapp"></i> Pesan Sekarang
                    </a>
                </div>
            </div> <?php 
                } // Penutup while
            } else {
                echo "<p style='text-align:center; grid-column: 1/-1;'>Belum ada produk tersedia.</p>";
            } // Penutup if
            ?>

        </div> </div> </section>

<section id="layanan">
    <div class="container">
        <div class="section-title text-white">
            <h2 style="color: white;">Mengapa Memilih Kami?</h2>
        </div>
        <div class="layanan-grid">
            <div class="layanan-item">
                <i class="fas fa-bolt"></i>
                <h4>Proses Kilat</h4>
                <p>Sistem antrean efisien, cetak bisa ditunggu atau selesai dalam 24 jam.</p>
            </div>
            <div class="layanan-item">
                <i class="fas fa-medal"></i>
                <h4>High Definition</h4>
                <p>Resolusi tinggi hingga 2400 DPI untuk detail yang sangat halus.</p>
            </div>
            <div class="layanan-item">
                <i class="fas fa-wallet"></i>
                <h4>Harga Kompetitif</h4>
                <p>Kualitas bintang lima dengan harga yang tetap ramah di kantong.</p>
            </div>
        </div>
    </div>
</section>

<section id="tenaga-kerja">
    <div class="container">
        <div class="section-title">
            <span class="subtitle">Keahlian & Dedikasi</span>
            <h2>Tenaga Kerja Profesional</h2>
            <div class="divider"></div>
        </div>
        <div class="tim-grid">
            <div class="tim-item">
                <div class="icon-box">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h4>Desainer Ahli</h4>
                <p>Tim kreatif yang siap mewujudkan ide Anda menjadi desain visual yang menjual dan estetik.</p>
            </div>
            <div class="tim-item">
                <div class="icon-box">
                    <i class="fas fa-print"></i>
                </div>
                <h4>Operator Senior</h4>
                <p>Tenaga teknis berpengalaman yang memastikan setiap hasil cetak tajam, presisi, dan sempurna.</p>
            </div>
            <div class="tim-item">
                <div class="icon-box">
                    <i class="fas fa-check-double"></i>
                </div>
                <h4>Quality Control</h4>
                <p>Proses pengecekan ketat pada setiap pesanan sebelum sampai ke tangan Anda.</p>
            </div>
        </div>
    </div>
</section>

<script>
        const menuToggle = document.getElementById('menu-toggle');
        const navMenu = document.getElementById('nav-menu');
        const overlay = document.getElementById('overlay');
        const icon = menuToggle.querySelector('i');

        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            overlay.classList.toggle('active');
            
            // Animasi ganti icon bars ke times (X)
            if (navMenu.classList.contains('active')) {
                icon.classList.replace('fa-bars', 'fa-times');
            } else {
                icon.classList.replace('fa-times', 'fa-bars');
            }
        });

        // Tutup menu saat overlay diklik
        overlay.addEventListener('click', () => {
            navMenu.classList.remove('active');
            overlay.classList.remove('active');
            icon.classList.replace('fa-times', 'fa-bars');
        });

        // Tutup menu saat salah satu link diklik (opsional)
        document.querySelectorAll('.nav-links li a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                overlay.classList.remove('active');
                icon.classList.replace('fa-times', 'fa-bars');
            });
        });
    </script>

</body>
</html>

<?php include "layout/footer.php"; ?>