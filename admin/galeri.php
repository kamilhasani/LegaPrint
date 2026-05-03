<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";
?>

<style>
    /* ========== RESPONSIVE STYLES ========== */
    .admin-card {
        background: #fff;
        margin: 0px 30px 30px 310px; 
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
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
        transition: all 0.25s ease;
        white-space: nowrap;
    }

    .btn-tambah:hover {
        background: #0284c7;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(14,165,233,0.3);
    }

    /* Table Responsive Wrapper */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: 0 -4px;
        padding: 0 4px;
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

    .galeri-table tr:hover {
        background-color: #fafcff;
        transition: 0.2s;
    }

    /* Image Preview */
    .galeri-img {
        width: 100px;
        height: 70px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        transition: transform 0.2s;
    }

    .galeri-img:hover {
        transform: scale(1.05);
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
        transition: all 0.2s ease;
        border: 1px solid #fecaca;
    }

    .btn-hapus:hover {
        background: #ef4444;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(239,68,68,0.3);
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

    /* ========== RESPONSIVE BREAKPOINTS ========== */
    
    /* Tablet & Laptop Kecil */
    @media (max-width: 1024px) {
        .admin-card {
            margin: 20px 24px;
            padding: 24px 28px;
        }
        
        .galeri-img {
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

    /* Mobile (768px ke bawah) */
    @media (max-width: 768px) {
        .admin-card {
            margin: 12px 16px; /* Hapus margin 310px saat di mobile */
            padding: 18px 20px;
            border-radius: 12px;
        }
        
        .galeri-header {
            margin-top: 0 !important; /* Memastikan judul nempel ke atas kartu */
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
            width: 100%;
            justify-content: center;
        }
        
        .btn-tambah span {
            display: inline;
        }
        
        .galeri-table th,
        .galeri-table td {
            padding: 10px 12px;
        }
        
        .galeri-table th {
            font-size: 0.7rem;
        }
        
        .galeri-img {
            width: 70px;
            height: 55px;
        }
        
        .file-name {
            max-width: 130px;
            font-size: 0.7rem;
            padding: 4px 8px;
            word-break: break-all;
            white-space: normal;
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
    
    /* Mobile Kecil (480px ke bawah) */
    @media (max-width: 480px) {
        .admin-card {
            margin: 8px 12px;
            padding: 14px 16px;
        }
        
        .galeri-img {
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
        
        .galeri-table th:nth-child(3),
        .galeri-table td:nth-child(3) {
            max-width: 100px;
        }
        
        .btn-hapus {
            padding: 5px 10px;
        }
    }

    .content-wrapper {
        padding-top: 5px !important; /* Mengecilkan jarak dari topbar ke kartu */
    }
    
    /* Scrollbar styling untuk wrapper tabel */
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
    
    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>

<div class="admin-card">
    <div class="galeri-header">
        <div>
            <h2><i class="fas fa-images" style="color:#0ea5e9; margin-right: 10px;"></i> Kelola Galeri Produk</h2>
            <p><i class="fas fa-info-circle" style="font-size:0.8rem;"></i> Daftar foto hasil cetakan Lega DigiPrint.</p>
        </div>
        <a href="tambah_galeri.php" class="btn-tambah">
            <i class="fas fa-plus"></i> <span>Tambah Foto</span>
        </a>
    </div>

    <div class="table-responsive">
        <table class="galeri-table">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Pratinjau</th>
                    <th>Nama File</th>
                    <th width="120" style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
                if(mysqli_num_rows($query) > 0) {
                    while($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td style="font-weight: 600;"><?= $no++; ?></td>
                    <td>
                        <img src="../assets/images/galeri/<?= $row['gambar']; ?>" 
                             class="galeri-img" 
                             alt="Galeri Image"
                             loading="lazy"
                             onerror="this.src='../assets/images/no-image.png'">
                    </td>
                    <td>
                        <code class="file-name"><?= htmlspecialchars($row['gambar']); ?></code>
                    </td>
                    <td style="text-align:center;">
                        <a href="hapus_galeri.php?id=<?= $row['id']; ?>" 
                           class="btn-hapus" 
                           onclick="return confirm('Yakin ingin menghapus foto <?= htmlspecialchars($row['gambar']); ?>?')">
                            <i class="fas fa-trash-alt"></i> <span>Hapus</span>
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
                        <p>Belum ada foto galeri.</p>
                        <a href="tambah_galeri.php" class="btn-tambah" style="margin-top: 15px; display: inline-flex;">
                            <i class="fas fa-plus"></i> Tambah Foto Sekarang
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <?php if(mysqli_num_rows($query) > 0): ?>
    <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #eef2f6; text-align: right; font-size: 0.75rem; color: #94a3b8;">
        <i class="fas fa-chart-line"></i> Total <?= mysqli_num_rows($query); ?> foto dalam galeri
    </div>
    <?php endif; ?>
</div>