<?php 
include "config/koneksi.php"; 
include "layout/header.php"; 
?>

<main class="gallery-page">
    <!-- Hero Section Galeri -->
    <section class="gallery-hero">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="hero-badge">Portofolio Kami</div>
            <h1 class="hero-title">Galeri <span>Karya</span></h1>
            <p class="hero-subtitle">Hasil cetakan terbaik dari berbagai project yang telah kami kerjakan untuk pelanggan setia Lega DigiPrint</p>
            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number" id="totalCount">0</span>
                    <span class="stat-label">Karya Terbaik</span>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <div class="hero-wave">
            <div class="hero-wave-container">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#ffffff" fill-opacity="0.85" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,208C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-wrapper">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">Semua</button>
                    <button class="filter-btn" data-filter="image">Gambar</button>
                    <button class="filter-btn" data-filter="video">Video</button>
                </div>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari galeri...">
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Grid Section -->
    <section class="gallery-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Koleksi Kami</span>
                <h2 class="section-title">Hasil <span>Produk Terbaik</span></h2>
                <div class="section-divider"></div>
                <p class="section-desc">Berbagai macam project percetakan digital yang telah kami selesaikan dengan hasil memuaskan</p>
            </div>

            <div class="gallery-grid" id="galleryGrid">
                <?php
                $data = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
                $total = 0;
                while($g = mysqli_fetch_array($data)){
                    $file_name = $g['gambar'];
                    $ekstensi = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    $video_ext = array('mp4', 'mov', 'webm', 'avi', 'mkv');
                    $total++;
                ?>
                
                <div class="gallery-item" data-type="<?php echo in_array($ekstensi, $video_ext) ? 'video' : 'image'; ?>" data-title="<?php echo htmlspecialchars($g['judul'] ?? 'Karya Lega DigiPrint'); ?>">
                    <div class="gallery-card">
                        <div class="gallery-img-wrapper">
                            <?php if(in_array($ekstensi, $video_ext)): ?>
                                <video src="assets/images/galeri/<?php echo $file_name; ?>" muted loop autoplay style="width:100%; height:100%; object-fit:cover;"></video>
                                <div class="media-badge video-badge">
                                    <i class="fas fa-play"></i> Video
                                </div>
                            <?php else: ?>
                                <img src="assets/images/galeri/<?php echo $file_name; ?>" alt="<?php echo htmlspecialchars($g['judul'] ?? 'Koleksi LegaPrint'); ?>">
                                <div class="media-badge image-badge">
                                    <i class="fas fa-image"></i> Foto
                                </div>
                            <?php endif; ?>
                            <div class="gallery-overlay" onclick="<?php echo in_array($ekstensi, $video_ext) ? "openLightboxVideo('assets/images/galeri/$file_name')" : "openLightbox('assets/images/galeri/$file_name')"; ?>">
                                <div class="overlay-content">
                                    <?php if(in_array($ekstensi, $video_ext)): ?>
                                        <i class="fas fa-play-circle"></i>
                                        <span>Putar Video</span>
                                    <?php else: ?>
                                        <i class="fas fa-search-plus"></i>
                                        <span>Perbesar</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="gallery-info">
                            <h4><?php echo htmlspecialchars($g['judul'] ?? 'Lega DigiPrint'); ?></h4>
                            <p><?php echo htmlspecialchars($g['deskripsi'] ?? 'Hasil cetakan digital berkualitas tinggi'); ?></p>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
            </div>

            <?php if($total == 0): ?>
            <div class="empty-gallery">
                <i class="fas fa-images"></i>
                <h3>Belum Ada Konten</h3>
                <p>Galeri masih kosong. Silakan tambahkan karya terbaik Anda.</p>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-icon">
                    <i class="fas fa-print"></i>
                </div>
                <h3>Butuh Cetakan Berkualitas?</h3>
                <p>Konsultasikan kebutuhan cetak digital Anda dengan tim profesional kami</p>
                <a href="kontak.php" class="cta-btn">Hubungi Kami <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
</main>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close-btn">&times;</span>
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" style="display:none;">
        <video id="lightbox-video" controls autoplay style="display:none; max-width:90%; max-height:80vh; border-radius:10px;"></video>
        <div class="lightbox-caption" id="lightboxCaption"></div>
    </div>
</div>

<style>
    /* ==================== VARIABLES ==================== */
    :root {
        --primary: #004ea2;
        --primary-dark: #0284c7;
        --primary-light: #7dd3fc;
        --dark: #0f172a;
        --darker: #020617;
        --gray: #64748b;
        --light-gray: #f1f5f9;
        --white: #ffffff;
        --transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .gallery-page {
        overflow-x: hidden;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        width: 100%;
    }

    /* ==================== HERO SECTION ==================== */
    .gallery-hero {
        position: relative;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        
        /* 1. PINDAHKAN & SETUP BACKGROUND GAMBAR DI SINI */
        background-image: url('assets/images/logo/logo.jpeg'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow: hidden;
    }

    .gallery-hero .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* 2. OVERLAY DIUBAH AGAR AGAK GELAP: Supaya teks putih di depannya kontras dan terbaca jelas */
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(30, 41, 59, 0.75) 100%);
        z-index: 1;
    }

    .gallery-hero .hero-content {
        position: relative;
        /* 3. PASTIKAN CONTENT DI ATAS OVERLAY */
        z-index: 2; 
        padding: 60px 0;
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
        font-size: 2.5rem;
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
        padding: 0 15px;
    }

    .hero-stats {
        display: flex;
        justify-content: center;
        gap: 30px;
    }

    .hero-stats .stat {
        text-align: center;
    }

    .stat-number {
        display: block;
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary);
    }

    .stat-label {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.7);
    }

    /* 4. KONTENIR OMBAK DIKEMBALIKAN MENJADI TRANSPARAN KEMBALI */
    .hero-wave-container {
        width: 100%;
        position: absolute; /* Ubah ke absolute agar menempel pas di dasar .gallery-hero */
        bottom: 0;
        left: 0;
        z-index: 3; /* Ombak berada di atas overlay dan background */
        pointer-events: none; /* Supaya tidak mengganggu klik elemen lain */
    }

    .hero-wave-container svg {
        width: 100%;
        height: 80px; /* Dioptimalkan agar liukan ombak tidak terlalu memakan space teks */
        display: block;
    }

    /* Penyesuaian responsif otomatis saat dibuka di HP */
    @media (max-width: 768px) {
        .gallery-hero {
            min-height: 320px; /* Sedikit lebih pendek di HP agar compact */
        }
        .hero-title {
            font-size: 1.8rem; /* Ukuran teks judul mengecil agar pas di layar HP */
        }
        .hero-wave-container svg {
            height: 40px; /* Tinggi liukan gelombang di HP diperkecil */
        }
    }
    /* ==================== FILTER SECTION ==================== */
    .filter-section {
        padding: 30px 0;
        background: var(--white);
        border-bottom: 1px solid var(--light-gray);
        position: sticky;
        top: 80px;
        z-index: 99;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
    }

    .filter-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .filter-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .filter-btn {
        background: transparent;
        border: 2px solid var(--light-gray);
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--gray);
        cursor: pointer;
        transition: var(--transition);
    }

    .filter-btn.active,
    .filter-btn:hover {
        background: var(--primary);
        border-color: var(--primary);
        color: var(--white);
    }

    .search-box {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-box i {
        position: absolute;
        left: 15px;
        color: var(--gray);
    }

    .search-box input {
        padding: 10px 15px 10px 40px;
        border: 2px solid var(--light-gray);
        border-radius: 40px;
        width: 250px;
        font-size: 0.85rem;
        transition: var(--transition);
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
    }

    /* ==================== SECTION HEADER ==================== */
    .section-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-tag {
        display: inline-block;
        background: rgba(56, 189, 248, 0.1);
        color: var(--primary);
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 12px;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 12px;
    }

    .section-title span {
        color: var(--primary);
    }

    .section-divider {
        width: 60px;
        height: 3px;
        background: var(--primary);
        border-radius: 3px;
        margin: 0 auto 15px;
    }

    .section-desc {
        color: var(--gray);
        font-size: 0.9rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* ==================== GALLERY GRID ==================== */
    .gallery-section {
        padding: 60px 0;
        background: var(--light-gray);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
    }

    .gallery-item {
        opacity: 1;
        transform: scale(1);
        transition: all 0.3s ease;
    }

    .gallery-item.hide {
        display: none;
    }

    .gallery-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        transition: var(--transition);
    }

    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .gallery-img-wrapper {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .gallery-img-wrapper img,
    .gallery-img-wrapper video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .gallery-img-wrapper img,
    .gallery-card:hover .gallery-img-wrapper video {
        transform: scale(1.08);
    }

    .media-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        z-index: 2;
        backdrop-filter: blur(5px);
    }

    .video-badge {
        background: rgba(239, 68, 68, 0.9);
        color: white;
    }

    .image-badge {
        background: rgba(56, 189, 248, 0.9);
        color: white;
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: rgba(15, 23, 42, 0.85);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s;
        cursor: pointer;
        z-index: 3;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .overlay-content {
        color: white;
        text-align: center;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .gallery-card:hover .overlay-content {
        transform: translateY(0);
    }

    .overlay-content i {
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    .overlay-content span {
        display: block;
        font-size: 0.85rem;
    }

    .gallery-info {
        padding: 15px 20px 20px;
    }

    .gallery-info h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 5px;
    }

    .gallery-info p {
        font-size: 0.8rem;
        color: var(--gray);
        line-height: 1.5;
    }

    /* ==================== EMPTY STATE ==================== */
    .empty-gallery {
        text-align: center;
        padding: 80px 20px;
        background: var(--white);
        border-radius: 20px;
    }

    .empty-gallery i {
        font-size: 4rem;
        color: var(--gray);
        margin-bottom: 20px;
    }

    .empty-gallery h3 {
        font-size: 1.5rem;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .empty-gallery p {
        color: var(--gray);
    }

    /* ==================== CTA SECTION ==================== */
    .cta-section {
        padding: 60px 0;
        background: linear-gradient(135deg, var(--dark) 0%, #1e293b 100%);
    }

    .cta-content {
        text-align: center;
        color: var(--white);
    }

    .cta-icon {
        width: 80px;
        height: 80px;
        background: rgba(56, 189, 248, 0.15);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .cta-icon i {
        font-size: 2.5rem;
        color: var(--primary);
    }

    .cta-content h3 {
        font-size: 1.8rem;
        margin-bottom: 15px;
    }

    .cta-content p {
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 25px;
    }

    .cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--primary);
        color: var(--white);
        padding: 12px 30px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
    }

    .cta-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
        gap: 15px;
    }

    /* ==================== LIGHTBOX ==================== */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.95);
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s;
    }

    .lightbox.active {
        display: flex;
    }

    .lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
    }

    .lightbox img {
        max-width: 100%;
        max-height: 80vh;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0,0,0,0.5);
    }

    .lightbox-caption {
        text-align: center;
        color: white;
        margin-top: 15px;
        font-size: 0.9rem;
    }

    .close-btn {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        z-index: 10000;
        transition: 0.3s;
    }

    .close-btn:hover {
        color: var(--primary);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* ==================== ANIMATION ==================== */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .gallery-item {
        animation: fadeInUp 0.6s ease forwards;
        animation-delay: calc(var(--delay, 0) * 0.05s);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (min-width: 768px) {
        .hero-title { font-size: 3.5rem; }
        .hero-subtitle { font-size: 1.1rem; }
        .hero-wave svg { height: 50px; }
        .section-title { font-size: 2.2rem; }
        .gallery-grid { gap: 30px; }
    }

    @media (min-width: 992px) {
        .container { padding: 0 40px; }
        .hero-title { font-size: 4rem; }
        .hero-wave svg { height: 60px; }
        .section-title { font-size: 2.5rem; }
        .gallery-section { padding: 80px 0; }
    }

    /* TABLET & HP SECARA UMUM */
    @media (max-width: 768px) {
        .filter-wrapper {
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }
        .filter-buttons {
            justify-content: center;
            flex-wrap: wrap; /* Mencegah tombol meluber keluar layar */
            gap: 10px;
        }
        .search-box input {
            width: 100%;
        }
        .gallery-grid {
            /* SOLUSI: Mengubah tampilan tablet/HP tanggung menjadi 2 kolom ke samping */
            grid-template-columns: repeat(2, 1fr);
            gap: 12px; /* Jarak antar kotak dirapatkan agar pas di layar kecil */
        }
        .gallery-img-wrapper {
            /* Menurunkan sedikit tinggi gambar agar proporsional dengan 2 kolom */
            height: 160px; 
        }
        .cta-content h3 {
            font-size: 1.3rem;
        }
        .section-title {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
    }

    /* KHUSUS SMARTPHONE / LAYAR SANGAT KECIL */
    @media (max-width: 480px) {
        .hero-title { 
            font-size: 2.2rem; /* Sedikit disesuaikan agar kokoh namun pas */
            line-height: 1.2;
        }
        .hero-subtitle {
            font-size: 0.9rem;
        }
        
        .gallery-grid {
            /* TETAP PERTAHANKAN: 2 kolom ke samping di HP */
            grid-template-columns: repeat(2, 1fr);
            gap: 8px; /* Jarak antar item lebih tipis agar estetik di layar sempit */
        }
        
        .gallery-img-wrapper {
            height: 130px; /* Tinggi gambar diatur ulang supaya tidak terlalu jangkung */
            border-radius: 12px; /* Menyelaraskan kelembutan sudut di HP */
        }

        /* Mengoptimalkan komponen teks di dalam kartu galeri (jika ada) agar tidak berantakan */
        .gallery-item h4 {
            font-size: 0.85rem !important;
            margin: 6px 0 2px 0;
        }
        .gallery-item p {
            font-size: 0.75rem !important;
        }

        .filter-buttons {
            gap: 6px;
        }
        .filter-btn {
            padding: 6px 12px;
            font-size: 0.75rem;
            border-radius: 20px;
        }
        
        /* Tombol CTA atau konten info disesuaikan */
        .cta-content h3 {
            font-size: 1.15rem;
        }
    }
</style>

<script>
// Menghitung total item untuk ditampilkan di hero
document.addEventListener('DOMContentLoaded', function() {
    const totalItems = document.querySelectorAll('.gallery-item').length;
    const totalCountSpan = document.getElementById('totalCount');
    if (totalCountSpan) {
        totalCountSpan.textContent = totalItems;
    }

    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const searchInput = document.getElementById('searchInput');

    function filterGallery() {
        const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';

        galleryItems.forEach(item => {
            const itemType = item.getAttribute('data-type');
            const itemTitle = item.getAttribute('data-title').toLowerCase();
            
            let typeMatch = activeFilter === 'all' || itemType === activeFilter;
            let searchMatch = searchTerm === '' || itemTitle.includes(searchTerm);
            
            if (typeMatch && searchMatch) {
                item.classList.remove('hide');
            } else {
                item.classList.add('hide');
            }
        });
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filterGallery();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('keyup', filterGallery);
    }
});

// Lightbox functions
function openLightbox(src) {
    const lightbox = document.getElementById('lightbox');
    const img = document.getElementById('lightbox-img');
    const video = document.getElementById('lightbox-video');

    img.style.display = 'none';
    video.style.display = 'none';
    if (video.pause) video.pause();

    const ekstensi = src.split('.').pop().toLowerCase();
    const videoExt = ['mp4', 'webm', 'ogg', 'mov', 'avi', 'mkv'];

    if (videoExt.includes(ekstensi)) {
        video.src = src;
        video.style.display = 'block';
    } else {
        img.src = src;
        img.style.display = 'block';
    }

    lightbox.style.display = 'flex';
    setTimeout(() => { lightbox.classList.add('active'); }, 10);
}

function openLightboxVideo(src) {
    openLightbox(src);
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    const video = document.getElementById('lightbox-video');
    
    lightbox.classList.remove('active');
    if (video.pause) video.pause();
    
    setTimeout(() => {
        lightbox.style.display = 'none';
    }, 300);
}

document.addEventListener('keydown', function(e) {
    if (e.key === "Escape") closeLightbox();
});

// Tambahkan delay animation yang berbeda untuk setiap item
document.querySelectorAll('.gallery-item').forEach((item, index) => {
    item.style.setProperty('--delay', index);
});
</script>

<?php include "layout/footer.php"; ?>