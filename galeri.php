<?php 
include "config/koneksi.php"; 
include "layout/header.php"; 
?>

<main class="gallery-page">
    <section class="gallery-hero" style="background-image: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.8)), url('assets/images/about/percetakan.jpg');">
        <div class="container">
            <span class="badge">Portofolio Kerja</span>
            <h1>Galeri <span>Hasil Cetakan</span></h1>
            <p>Klik pada gambar untuk melihat detail dalam ukuran penuh.</p>
        </div>
    </section>

    <section class="gallery-section section-padding">
        <div class="container">
            <div class="gallery-grid">
    <?php
    $data = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
    while($g = mysqli_fetch_array($data)){
        $file_name = $g['gambar'];
        $ekstensi = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $video_ext = array('mp4', 'mov', 'webm', 'avi');
    ?>
    
    <div class="gallery-item">
        <div class="gallery-img-wrapper">
            <?php if(in_array($ekstensi, $video_ext)): ?>
                <video src="assets/images/galeri/<?php echo $file_name; ?>" muted loop autoplay style="width:100%; height:100%; object-fit:cover;"></video>
                <div class="gallery-overlay" onclick="openLightboxVideo('assets/images/galeri/<?php echo $file_name; ?>')">
                    <div class="overlay-content">
                        <i class="fas fa-play-circle"></i>
                        <span>Putar Video</span>
                    </div>
                </div>
            <?php else: ?>
                <img src="assets/images/galeri/<?php echo $file_name; ?>" alt="Koleksi LegaPrint">
                <div class="gallery-overlay" onclick="openLightbox('assets/images/galeri/<?php echo $file_name; ?>')">
                    <div class="overlay-content">
                        <i class="fas fa-search-plus"></i>
                        <span>Perbesar</span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <?php } ?>
</div>
    </section>
</main>

<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close-btn">&times;</span>
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" style="display:none;">
        
        <video id="lightbox-video" controls autoplay style="display:none; max-width:100%; max-height:80vh; border-radius:10px;"></video>
    </div>
</div>

<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close-btn">&times;</span>
    <img id="lightbox-img" src="" alt="Full View">
</div>

<style>
    /* Grid & Item Styling */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        padding: 40px 0;
    }

    .gallery-item {
        height: 250px;
        border-radius: 15px;
        overflow: hidden;
        cursor: pointer;
        position: relative;
    }

    .gallery-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: rgba(2, 132, 199, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s;
    }

    .gallery-item:hover .gallery-overlay { opacity: 1; }
    .gallery-item:hover img { transform: scale(1.1); }

    .overlay-content { color: white; text-align: center; }

    /* CSS UNTUK LIGHTBOX (FULL SCREEN) */
    .lightbox {
        display: none; /* Sembunyi */
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s;
    }

    .lightbox img {
        max-width: 90%;
        max-height: 80%;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0,0,0,0.5);
        transform: scale(0.9);
        transition: 0.3s ease;
    }

    .lightbox.active img { transform: scale(1); }

    .close-btn {
        position: absolute;
        top: 30px;
        right: 40px;
        color: white;
        font-size: 50px;
        font-weight: bold;
        cursor: pointer;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<script>
    function openLightbox(src) {
        const lightbox = document.getElementById('lightbox');
        const img = document.getElementById('lightbox-img');
        const video = document.getElementById('lightbox-video');

        // Sembunyikan keduanya dulu
        img.style.display = 'none';
        video.style.display = 'none';
        video.pause(); // Pastikan video berhenti jika sebelumnya ada yang diputar

        // Cek ekstensi file
        const ekstensi = src.split('.').pop().toLowerCase();
        const videoExt = ['mp4', 'webm', 'ogg', 'mov'];

        if (videoExt.includes(ekstensi)) {
            // Jika Video
            video.src = src;
            video.style.display = 'block';
        } else {
            // Jika Gambar
            img.src = src;
            img.style.display = 'block';
        }

        lightbox.style.display = 'flex';
        setTimeout(() => { lightbox.classList.add('active'); }, 10);
    }

    // Fungsi tambahan agar tombol 'Putar Video' juga mengarah ke fungsi yang sama
    function openLightboxVideo(src) {
        openLightbox(src);
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        const video = document.getElementById('lightbox-video');
        
        lightbox.classList.remove('active');
        video.pause(); // Matikan suara/video saat modal ditutup
        
        setTimeout(() => {
            lightbox.style.display = 'none';
        }, 300);
    }

    // Tutup dengan ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") closeLightbox();
    });
</script>

<?php include "layout/footer.php"; ?>