<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";
?>

<style>
    * {
        box-sizing: border-box;
    }

    .content-wrapper {
        padding: 20px !important;
        margin-left: 0 !important;
        width: 100% !important;
    }

    /* CARD UTAMA - TANPA TRANSISI YANG MENGGERAKKAN */
    .admin-card {
        background: #fff;
        margin: 0 30px 30px 310px;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        transition: none;
        width: auto;
    }

    /* Header Section */
    .galeri-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .galeri-header h2 {
        margin: 0;
        color: #0f172a;
        font-size: 1.6rem;
    }

    .galeri-header p {
        color: #64748b;
        font-size: 0.9rem;
        margin-top: 6px;
    }

    .btn-tambah {
        background: #0ea5e9;
        color: #fff;
        padding: 12px 20px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background 0.2s ease, transform 0.2s ease;
        white-space: nowrap;
        border: none;
        cursor: pointer;
    }

    .btn-tambah:hover {
        background: #0284c7;
        transform: translateY(-2px);
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        width: 100%;
    }

    .galeri-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 500px;
    }

    .galeri-table thead {
        background: #f8fafc;
        color: #64748b;
        text-align: left;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .galeri-table th {
        padding: 15px;
        font-weight: 700;
        border-bottom: 2px solid #eef2f6;
    }

    .galeri-table td {
        padding: 15px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .galeri-table tr:last-child td {
        border-bottom: none;
    }

    .galeri-table tbody tr:hover {
        background-color: #fafcff;
    }

    /* ========== MEDIA PREVIEW (GAMBAR & VIDEO) ========== */
    .media-preview {
        width: 100px;
        height: 70px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        display: block;
        background: #f1f5f9;
    }

    .video-preview {
        position: relative;
        width: 100px;
        height: 70px;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        overflow: hidden;
        background: #0f172a;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .video-preview video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .video-preview .play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 1.5rem;
        background: rgba(0, 0, 0, 0.6);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
    }

    .media-badge {
        display: inline-block;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 0.65rem;
        font-weight: 600;
        margin-left: 8px;
    }

    .badge-image {
        background: #38bdf8;
        color: white;
    }

    .badge-video {
        background: #ef4444;
        color: white;
    }

    /* File Name */
    .file-name {
        font-family: 'Courier New', 'SF Mono', monospace;
        font-size: 0.8rem;
        color: #475569;
        word-break: break-all;
        background: #f8fafc;
        padding: 5px 10px;
        border-radius: 8px;
        display: inline-block;
        max-width: 220px;
    }

    /* Action Button */
    .btn-hapus {
        color: #ef4444;
        background: #fee2e2;
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: background 0.2s ease;
        border: 1px solid #fecaca;
    }

    .btn-hapus:hover {
        background: #ef4444;
        color: #fff;
    }

    .btn-hapus:hover i {
        color: #fff;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #94a3b8;
    }

    .empty-state i {
        font-size: 3.5rem;
        margin-bottom: 15px;
        opacity: 0.5;
        display: block;
    }

    .galeri-footer {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #eef2f6;
        text-align: right;
        font-size: 0.75rem;
        color: #94a3b8;
    }

    /* Lightbox untuk Preview Video */
    .lightbox-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(15, 23, 42, 0.95);
        backdrop-filter: blur(8px);
        cursor: pointer;
    }

    .lightbox-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 90%;
        max-height: 85vh;
        object-fit: contain;
        border-radius: 12px;
    }

    .lightbox-close {
        position: fixed;
        top: 30px;
        right: 40px;
        color: white;
        font-size: 45px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.2s;
        z-index: 10000;
    }

    .lightbox-close:hover {
        color: #38bdf8;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 1024px) {
        .admin-card {
            margin: 20px 24px 20px 290px;
            padding: 24px 28px;
        }
        
        .media-preview, .video-preview {
            width: 85px;
            height: 60px;
        }
        
        .file-name {
            max-width: 180px;
            font-size: 0.75rem;
        }
        
        .galeri-header h2 {
            font-size: 1.4rem;
        }
    }

    @media (max-width: 768px) {
        .admin-card {
            margin: 12px 16px;
            padding: 18px 20px;
            border-radius: 12px;
        }
        
        .galeri-header {
            flex-direction: column;
            align-items: stretch;
        }
        
        .galeri-header h2 {
            font-size: 1.25rem;
        }
        
        .galeri-header p {
            font-size: 0.8rem;
        }
        
        .btn-tambah {
            padding: 10px 18px;
            font-size: 0.85rem;
            justify-content: center;
            width: 100%;
        }
        
        .galeri-table th,
        .galeri-table td {
            padding: 10px 12px;
        }
        
        .galeri-table th {
            font-size: 0.7rem;
        }
        
        .media-preview, .video-preview {
            width: 70px;
            height: 55px;
        }
        
        .file-name {
            max-width: 130px;
            font-size: 0.7rem;
            padding: 4px 8px;
        }
        
        .btn-hapus {
            padding: 6px 12px;
            font-size: 0.7rem;
        }
        
        .btn-hapus span {
            display: none;
        }
        
        .btn-hapus i {
            margin: 0;
            font-size: 0.85rem;
        }
    }
    
    @media (max-width: 480px) {
        .admin-card {
            margin: 8px 12px;
            padding: 14px 16px;
        }
        
        .media-preview, .video-preview {
            width: 55px;
            height: 45px;
        }
        
        .file-name {
            max-width: 100px;
            font-size: 0.65rem;
        }
        
        .galeri-table th,
        .galeri-table td {
            padding: 8px 8px;
        }
        
        .btn-hapus {
            padding: 5px 10px;
        }
        
        .btn-hapus i {
            font-size: 0.75rem;
        }
    }

    .table-responsive::-webkit-scrollbar {
        height: 5px;
    }
    
    .table-responsive::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }
    
    .table-responsive::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
</style>

<div class="content-wrapper">
    <div class="admin-card">
        <div class="galeri-header">
            <div>
                <h2><i class="fas fa-images"></i> Kelola Galeri Produk</h2>
                <p><i class="fas fa-info-circle" style="font-size:0.75rem;"></i> Daftar foto/video hasil cetakan Lega DigiPrint</p>
            </div>
            <a href="tambah_galeri.php" class="btn-tambah">
                <i class="fas fa-plus"></i> 
                <span>Tambah Media</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="galeri-table">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th width="120">Pratinjau</th>
                        <th>Nama File</th>
                        <th width="100" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
                    if(mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_array($query)) {
                            $file_name = $row['gambar'];
                            $ekstensi = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                            $video_ext = array('mp4', 'mov', 'webm', 'avi', 'mkv', '3gp');
                            $is_video = in_array($ekstensi, $video_ext);
                    ?>
                    <tr>
                        <td style="font-weight: 600;"><?= $no++; ?></td>
                        <td>
                            <?php if($is_video): ?>
                            <div class="video-preview" onclick="openVideoLightbox('../assets/images/galeri/<?= $file_name; ?>')">
                                <video src="../assets/images/galeri/<?= $file_name; ?>" muted preload="metadata"></video>
                                <div class="play-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <?php else: ?>
                            <img src="../assets/images/galeri/<?= $file_name; ?>" 
                                 class="media-preview" 
                                 alt="Galeri"
                                 loading="lazy"
                                 onerror="this.src='../assets/images/no-image.png'"
                                 onclick="openImageLightbox('../assets/images/galeri/<?= $file_name; ?>')">
                            <?php endif; ?>
                        </td>
                        <td>
                            <code class="file-name"><?= htmlspecialchars($file_name); ?></code>
                            <?php if($is_video): ?>
                                <span class="media-badge badge-video"><i class="fas fa-video"></i> Video</span>
                            <?php else: ?>
                                <span class="media-badge badge-image"><i class="fas fa-image"></i> Gambar</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align:center;">
                            <a href="hapus_galeri.php?id=<?= $row['id']; ?>" 
                               class="btn-hapus" 
                               onclick="return confirm('Yakin ingin menghapus <?= htmlspecialchars($file_name); ?>?')">
                                <i class="fas fa-trash-alt"></i> 
                                <span>Hapus</span>
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else { 
                    ?>
                    <tr>
                        <td colspan="4" class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <p>Belum ada foto/video galeri.</p>
                            <a href="tambah_galeri.php" class="btn-tambah" style="display: inline-flex; width: auto;">
                                <i class="fas fa-plus"></i> Tambah Media Sekarang
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <?php if(mysqli_num_rows($query) > 0): ?>
        <div class="galeri-footer">
            <i class="fas fa-chart-line"></i> Total <?= mysqli_num_rows($query); ?> media dalam galeri
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- LIGHTBOX MODAL UNTUK PREVIEW -->
<div id="lightboxModal" class="lightbox-modal" onclick="closeLightbox()">
    <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
    <img class="lightbox-content" id="lightboxImage" style="display:none;">
    <video class="lightbox-content" id="lightboxVideo" controls style="display:none;"></video>
</div>

<script>
    // PASTIKAN TIDAK ADA SCRIPT YANG MEMBUAT LAYOUT BERUBAH
    (function() {
        const style = document.createElement('style');
        style.textContent = `
            .content-wrapper {
                margin-left: 0 !important;
                transition: none !important;
            }
            .admin-card {
                transition: none !important;
            }
        `;
        document.head.appendChild(style);
    })();

    // Fungsi untuk membuka gambar di lightbox
    function openImageLightbox(src) {
        const modal = document.getElementById('lightboxModal');
        const img = document.getElementById('lightboxImage');
        const video = document.getElementById('lightboxVideo');
        
        img.style.display = 'none';
        video.style.display = 'none';
        if(video.pause) video.pause();
        
        img.src = src;
        img.style.display = 'block';
        
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    // Fungsi untuk membuka video di lightbox
    function openVideoLightbox(src) {
        const modal = document.getElementById('lightboxModal');
        const img = document.getElementById('lightboxImage');
        const video = document.getElementById('lightboxVideo');
        
        img.style.display = 'none';
        video.style.display = 'none';
        if(video.pause) video.pause();
        
        video.src = src;
        video.style.display = 'block';
        video.load();
        video.play();
        
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    // Fungsi tutup lightbox
    function closeLightbox() {
        const modal = document.getElementById('lightboxModal');
        const video = document.getElementById('lightboxVideo');
        
        if(video.pause) video.pause();
        video.src = '';
        
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Tutup dengan tombol ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
</script>
