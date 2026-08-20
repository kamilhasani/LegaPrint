<?php 
include "config/koneksi.php"; 
include "layout/header.php"; 
?>

<main class="gallery-page">
    <!-- ============================================================
    HERO SECTION - FULL BACKGROUND
    ============================================================ -->
    <section class="gallery-hero">
        <div class="hero-background">
            <div class="hero-bg-image">
                <img src="assets/images/bggaleri.jpg" alt="Galeri Background">
            </div>
        </div>
    </section>

    <!-- ============================================================
    FILTER SECTION
    ============================================================ -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-wrapper">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-th-large"></i>
                        <span>Semua</span>
                    </button>
                    <button class="filter-btn" data-filter="image">
                        <i class="fas fa-image"></i>
                        <span>Gambar</span>
                    </button>
                    <button class="filter-btn" data-filter="video">
                        <i class="fas fa-video"></i>
                        <span>Video</span>
                    </button>
                </div>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari galeri...">
                    <button class="search-clear" id="searchClear" style="display: none;">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    GALLERY GRID SECTION
    ============================================================ -->
    <section class="gallery-section" id="gallery">
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

    <!-- ============================================================
    CTA SECTION
    ============================================================ -->
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

<!-- ============================================================
LIGHTBOX MODAL
============================================================ -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close-btn">&times;</span>
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" style="display:none;">
        <video id="lightbox-video" controls autoplay style="display:none; max-width:90%; max-height:80vh; border-radius:10px;"></video>
        <div class="lightbox-caption" id="lightboxCaption"></div>
    </div>
</div>

<style>
    /* ============================================================
               VARIABLES
               ============================================================ */
    :root {
        --primary: #1a3a5c;
        --primary-dark: #0f2640;
        --primary-light: #2d6a9f;
        --primary-blue: #004ea2;
        --primary-blue-light: #3b82f6;
        --primary-blue-dark: #003d82;
        --dark: #1a1a2e;
        --dark-soft: #2d2d44;
        --gray: #6b6b7b;
        --gray-light: #94a3b8;
        --light-gray: #f0ece4;
        --white: #ffffff;
        --bg-light: #f8f6f3;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        --shadow-hover: 0 20px 50px rgba(0, 0, 0, 0.15);
        --radius: 12px;
    }

    /* ============================================================
               RESET
               ============================================================ */
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

    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    /* ============================================================
               HERO SECTION - FULL BACKGROUND (TIDAK TERPOTONG)
               ============================================================ */
    .gallery-hero {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 30%;
        min-height: 350px;
        max-height: 500px;
        overflow: hidden;
        background: #0f172a;
    }

    .hero-background {
        position: absolute;
        inset: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
    }

    .hero-bg-image {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .hero-bg-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        object-position: center;
    }

    /* ============================================================
               FILTER SECTION
               ============================================================ */
    .filter-section {
        position: relative;
        margin-top: -30px;
        padding: 20px 0;
        background: var(--white);
        border-bottom: 1px solid #e8e4dc;
        z-index: 10;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
    }

    .filter-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .filter-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .filter-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        border: 1px solid #e8e4dc;
        padding: 8px 20px;
        border-radius: 4px;
        font-weight: 500;
        font-size: 0.85rem;
        color: var(--gray);
        cursor: pointer;
        transition: var(--transition);
    }

    .filter-btn i {
        font-size: 0.8rem;
    }

    .filter-btn.active,
    .filter-btn:hover {
        background: var(--primary-blue);
        border-color: var(--primary-blue);
        color: var(--white);
    }

    .search-box {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-box i {
        position: absolute;
        left: 14px;
        color: var(--gray);
        font-size: 0.8rem;
        z-index: 1;
    }

    .search-box input {
        padding: 9px 15px 9px 38px;
        border: 1px solid #e8e4dc;
        border-radius: 4px;
        width: 240px;
        font-size: 0.85rem;
        transition: var(--transition);
        background: var(--white);
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(0, 78, 162, 0.08);
        width: 280px;
    }

    .search-clear {
        position: absolute;
        right: 10px;
        background: none;
        border: none;
        color: var(--gray);
        cursor: pointer;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4px;
    }

    .search-clear:hover {
        color: var(--primary-blue);
    }

    /* ============================================================
               SECTION HEADER
               ============================================================ */
    .section-header {
        text-align: center;
        margin-bottom: 45px;
    }

    .section-tag {
        display: inline-block;
        color: var(--primary-blue);
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 10px;
        border-left: 3px solid var(--primary-blue);
        padding-left: 12px;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .section-title span {
        color: var(--primary-blue);
    }

    .section-divider {
        width: 50px;
        height: 3px;
        background: var(--primary-blue);
        border-radius: 2px;
        margin: 0 auto 15px;
    }

    .section-desc {
        color: var(--gray);
        font-size: 0.9rem;
        max-width: 550px;
        margin: 0 auto;
    }

    /* ============================================================
               GALLERY GRID
               ============================================================ */
    .gallery-section {
        padding: 60px 0 80px;
        background: var(--bg-light);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .gallery-item {
        opacity: 1;
        transform: scale(1);
        transition: all 0.4s ease;
    }

    .gallery-item.hide {
        display: none;
    }

    .gallery-card {
        background: var(--white);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: var(--transition);
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .gallery-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-hover);
    }

    .gallery-img-wrapper {
        position: relative;
        height: 260px;
        overflow: hidden;
        background: #e8e4dc;
    }

    .gallery-img-wrapper img,
    .gallery-img-wrapper video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .gallery-card:hover .gallery-img-wrapper img,
    .gallery-card:hover .gallery-img-wrapper video {
        transform: scale(1.05);
    }

    .media-badge {
        position: absolute;
        top: 14px;
        right: 14px;
        padding: 4px 14px;
        border-radius: 3px;
        font-size: 0.6rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        z-index: 2;
        backdrop-filter: blur(8px);
    }

    .video-badge {
        background: rgba(0, 78, 162, 0.9);
        color: var(--white);
    }

    .image-badge {
        background: rgba(26, 58, 92, 0.9);
        color: var(--white);
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 61, 130, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.35s ease;
        cursor: pointer;
        z-index: 3;
        backdrop-filter: blur(3px);
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .overlay-content {
        color: var(--white);
        text-align: center;
        transform: translateY(15px);
        transition: all 0.4s ease;
    }

    .gallery-card:hover .overlay-content {
        transform: translateY(0);
    }

    .overlay-content i {
        font-size: 2.4rem;
        margin-bottom: 8px;
        display: block;
        color: var(--primary-blue-light);
    }

    .overlay-content span {
        display: block;
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .gallery-info {
        padding: 18px 22px 22px;
        border-top: 1px solid #f0ece4;
    }

    .gallery-info h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 3px;
    }

    .gallery-info p {
        font-size: 0.8rem;
        color: var(--gray);
        line-height: 1.5;
    }

    /* ============================================================
               EMPTY STATE
               ============================================================ */
    .empty-gallery {
        text-align: center;
        padding: 60px 20px;
        background: var(--white);
        border-radius: var(--radius);
        border: 1px solid #e8e4dc;
    }

    .empty-gallery i {
        font-size: 3.5rem;
        color: #d0ccc4;
        margin-bottom: 15px;
    }

    .empty-gallery h3 {
        font-size: 1.3rem;
        color: var(--dark);
        margin-bottom: 8px;
    }

    .empty-gallery p {
        color: var(--gray);
        font-size: 0.9rem;
    }

    /* ============================================================
               CTA SECTION
               ============================================================ */
    .cta-section {
        padding: 60px 0;
        background: var(--primary-blue-dark);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 30% 50%, rgba(59, 130, 246, 0.08) 0%, transparent 60%);
    }

    .cta-content {
        text-align: center;
        color: var(--white);
        position: relative;
        z-index: 1;
    }

    .cta-icon {
        width: 70px;
        height: 70px;
        background: rgba(59, 130, 246, 0.15);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .cta-icon i {
        font-size: 2rem;
        color: var(--primary-blue-light);
    }

    .cta-content h3 {
        font-size: 1.8rem;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .cta-content p {
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 25px;
        font-size: 0.95rem;
    }

    .cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
        color: var(--white);
        padding: 12px 32px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
        font-size: 0.9rem;
    }

    .cta-btn:hover {
        background: linear-gradient(135deg, var(--primary-blue-dark), #002a5e);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 78, 162, 0.3);
        gap: 15px;
    }

    /* ============================================================
               LIGHTBOX
               ============================================================ */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.92);
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
        border-radius: 4px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .lightbox-caption {
        text-align: center;
        color: rgba(255, 255, 255, 0.7);
        margin-top: 12px;
        font-size: 0.85rem;
    }

    .close-btn {
        position: absolute;
        top: 20px;
        right: 30px;
        color: rgba(255, 255, 255, 0.6);
        font-size: 36px;
        font-weight: 300;
        cursor: pointer;
        z-index: 10000;
        transition: var(--transition);
        line-height: 1;
    }

    .close-btn:hover {
        color: var(--white);
        transform: rotate(90deg);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* ============================================================
               RESPONSIVE
               ============================================================ */

    /* Desktop Laptop - Tampilkan Gambar Hero Utuh */
    @media (min-width: 993px) {
        .gallery-hero {
            width: 100%;
            height: auto;
            aspect-ratio: 16 / 9;
            padding-bottom: 0;
            min-height: 0;
            max-height: none;
            overflow: hidden;
        }

        .hero-background,
        .hero-bg-image {
            width: 100%;
            height: 100%;
        }

        .hero-bg-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center center;
            background: #0f172a;
        }
    }

    /* Tablet */
    @media (max-width: 992px) {
        .gallery-hero {
            height: 0;
            padding-bottom: 30%;
            min-height: 250px;
            max-height: 350px;
        }

        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
    }

    /* Mobile - Tetap Seperti Awal */
    @media (max-width: 768px) {
        .gallery-hero {
            height: auto;
            padding-bottom: 0;
            min-height: 200px;
            max-height: none;
        }

        .filter-section {
            margin-top: 0;
            padding: 15px 0;
        }

        .filter-wrapper {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-buttons {
            justify-content: center;
        }

        .search-box input {
            width: 100%;
        }

        .search-box input:focus {
            width: 100%;
        }

        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .gallery-img-wrapper {
            height: 180px;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .cta-content h3 {
            font-size: 1.3rem;
        }
    }

    /* Mobile Kecil */
    @media (max-width: 480px) {
        .gallery-hero {
            min-height: 150px;
        }

        .container {
            padding: 0 15px;
        }

        .filter-btn {
            padding: 6px 14px;
            font-size: 0.75rem;
        }

        .filter-btn span {
            display: inline;
        }

        .search-box input {
            padding: 8px 12px 8px 32px;
            font-size: 0.8rem;
        }

        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .gallery-img-wrapper {
            height: 150px;
        }

        .gallery-info {
            padding: 12px 14px 14px;
        }

        .gallery-info h4 {
            font-size: 0.8rem;
        }

        .gallery-info p {
            font-size: 0.7rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .overlay-content i {
            font-size: 1.8rem;
        }

        .overlay-content span {
            font-size: 0.65rem;
        }

        .section-title {
            font-size: 1.3rem;
        }

        .section-desc {
            font-size: 0.8rem;
            padding: 0 10px;
        }
    }

    /* HP Sangat Kecil */
    @media (max-width: 380px) {
        .gallery-hero {
            min-height: 120px;
        }

        .gallery-grid {
            gap: 10px;
        }

        .gallery-img-wrapper {
            height: 120px;
        }

        .gallery-info h4 {
            font-size: 0.7rem;
        }

        .gallery-info p {
            font-size: 0.6rem;
        }

        .filter-btn {
            padding: 4px 10px;
            font-size: 0.65rem;
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
    const searchClear = document.getElementById('searchClear');

    function filterGallery() {
        const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';

        let visibleCount = 0;
        
        galleryItems.forEach(item => {
            const itemType = item.getAttribute('data-type');
            const itemTitle = item.getAttribute('data-title').toLowerCase();
            
            let typeMatch = activeFilter === 'all' || itemType === activeFilter;
            let searchMatch = searchTerm === '' || itemTitle.includes(searchTerm);
            
            if (typeMatch && searchMatch) {
                item.classList.remove('hide');
                visibleCount++;
            } else {
                item.classList.add('hide');
            }
        });
        
        if (totalCountSpan && visibleCount !== totalItems) {
            totalCountSpan.textContent = visibleCount;
        } else if (totalCountSpan) {
            totalCountSpan.textContent = totalItems;
        }
        
        if (searchClear) {
            searchClear.style.display = searchTerm !== '' ? 'flex' : 'none';
        }
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
    
    if (searchClear) {
        searchClear.addEventListener('click', function() {
            searchInput.value = '';
            filterGallery();
            searchInput.focus();
        });
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
</script>

<?php include "layout/footer.php"; ?>