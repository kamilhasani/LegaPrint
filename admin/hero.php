<?php
include "../config/koneksi.php";
include "../layout/admin_header.php"; // Pastikan path ../ sudah benar
?>

<div class="sidebar">
    <div class="sidebar-brand">
        <i class="fas fa-print"></i> <span>Lega DigiPrint</span>
    </div>
    
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="produk.php" class="nav-link">
                <i class="fas fa-box"></i> Kelola Produk
            </a>
        </li>
        <li class="nav-item">
            <a href="hero.php" class="nav-link active"> <i class="fas fa-image"></i> Kelola Hero
            </a>
        </li>
        <li class="nav-item">
            <a href="galeri.php" class="nav-link">
                <i class="fas fa-images"></i> Kelola Galeri
            </a>
        </li>
        <li class="nav-item">
            <a href="client.php" class="nav-link">
                <i class="fas fa-user-tie"></i> Kelola Client
            </a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a href="../index.php" class="nav-link">
                <i class="fas fa-external-link-alt"></i> Lihat Website
            </a>
        </li>
    </ul>
</div>
<div class="main-content">
    
    <div class="dashboard-header">
        </div>
    
    <div class="container-fluid">
        
        <div class="admin-card">
            <div class="card-header">
                <div>
                    <h2 class="title">Kelola Visual Hero</h2>
                    <p class="subtitle">Kelola gambar utama yang muncul di bagian depan website.</p>
                </div>
                <div class="header-actions">
                    <a href="dashboard.php" class="btn-secondary">
                        <i class="fas fa-arrow-left"></i> <span>Dashboard</span>
                    </a>
                    <a href="tambah_hero.php" class="btn-primary">
                        <i class="fas fa-plus"></i> <span>Tambah Hero</span>
                    </a>
                </div>
            </div>

    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Pratinjau Gambar</th>
                    <th>Nama File</th>
                    <th width="160" style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM hero ORDER BY id DESC");
                if(mysqli_num_rows($data) > 0) {
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><span class="badge-no"><?php echo $no++; ?></span></td>
                    <td>
                        <div class="hero-img-container">
                            <img src="../assets/images/hero/<?php echo $d['gambar']; ?>" alt="Hero Image" loading="lazy">
                        </div>
                    </td>
                    <td>
                        <code class="file-code"><?php echo $d['gambar']; ?></code>
                    </td>
                    <td>
                        <div class="action-group">
                            <a href="edit_hero.php?id=<?php echo $d['id']; ?>" class="btn-edit" title="Edit">
                                <i class="fas fa-edit"></i> <span>Edit</span>
                            </a>
                            <a href="hapus_hero.php?id=<?php echo $d['id']; ?>" class="btn-delete" title="Hapus" onclick="return confirm('Hapus gambar ini?')">
                                <i class="fas fa-trash"></i> <span>Hapus</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='4' style='text-align:center; padding:60px 20px; color:#94a3b8;'><i class='fas fa-image' style='font-size:3rem; margin-bottom:12px; display:block; opacity:0.5;'></i>Belum ada gambar hero. Silakan tambah hero pertama Anda.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    /* ========== RESET & VARIABEL ========== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Container Utama - Responsif */
    .admin-card {
        background: #ffffff;
        margin: 24px 28px;
        padding: 28px 32px;
        border-radius: 24px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.04);
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
    }

    /* Header */
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 28px;
    }

    .title { 
        font-size: 1.6rem; 
        color: #0f172a; 
        font-weight: 800; 
        margin-bottom: 6px; 
        letter-spacing: -0.3px;
    }
    .subtitle { 
        color: #64748b; 
        font-size: 0.9rem; 
        line-height: 1.4;
    }

    /* Buttons */
    .header-actions { 
        display: flex; 
        gap: 12px; 
        flex-wrap: wrap;
    }
    
    .btn-primary, .btn-secondary {
        padding: 10px 20px;
        border-radius: 14px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.25s ease;
        white-space: nowrap;
    }

    .btn-primary { 
        background: #0ea5e9; 
        color: white; 
        box-shadow: 0 2px 8px rgba(14,165,233,0.2);
    }
    .btn-primary:hover { 
        background: #0284c7; 
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(14,165,233,0.25);
    }
    
    .btn-secondary { 
        background: #f1f5f9; 
        color: #475569; 
        border: 1px solid #e2e8f0;
    }
    .btn-secondary:hover { 
        background: #e2e8f0; 
        transform: translateY(-1px);
    }

    /* ========== TABLE RESPONSIF ========== */
    .table-responsive { 
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: 0 -4px;
        padding: 0 4px;
    }
    
    .modern-table { 
        width: 100%; 
        border-collapse: collapse; 
        min-width: 520px;
    }
    
    .modern-table th {
        background: #f8fafc;
        padding: 16px 18px;
        text-align: left;
        color: #64748b;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #f1f5f9;
    }

    .modern-table td {
        padding: 18px 16px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        vertical-align: middle;
    }

    .modern-table tr:last-child td {
        border-bottom: none;
    }

    .modern-table tr:hover {
        background-color: #fafcff;
        transition: 0.2s;
    }

    /* Hero Image Preview - Responsif */
    .hero-img-container {
        width: 160px;
        height: 90px;
        border-radius: 14px;
        overflow: hidden;
        border: 2px solid #f1f5f9;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        background: #f8fafc;
    }

    .hero-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.2s;
    }
    
    .hero-img-container img:hover {
        transform: scale(1.02);
    }

    /* Badges & Codes */
    .badge-no {
        background: #eff6ff;
        color: #3b82f6;
        padding: 6px 12px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.85rem;
        display: inline-block;
        text-align: center;
        min-width: 40px;
    }

    .file-code {
        background: #f1f5f9;
        padding: 6px 12px;
        border-radius: 10px;
        font-family: 'Courier New', 'SF Mono', monospace;
        font-size: 0.8rem;
        color: #475569;
        word-break: break-all;
        display: inline-block;
        max-width: 220px;
        white-space: normal;
        word-wrap: break-word;
        line-height: 1.3;
    }

    /* Action Buttons - tidak terpotong */
    .action-group { 
        display: flex; 
        gap: 8px; 
        justify-content: flex-start;
        align-items: center;
        flex-wrap: wrap;
    }

    .btn-edit, .btn-delete {
        padding: 8px 16px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.25s ease;
        border: 1px solid transparent;
    }

    /* Tombol Edit - Biru */
    .btn-edit { 
        color: #0ea5e9; 
        background: rgba(14, 165, 233, 0.1);
        border-color: rgba(14, 165, 233, 0.2);
    }

    .btn-edit:hover { 
        background: #0ea5e9; 
        color: #ffffff !important; 
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(14, 165, 233, 0.3);
    }

    /* Tombol Delete - Merah */
    .btn-delete { 
        color: #ef4444; 
        background: rgba(239, 68, 68, 0.08);
        border-color: rgba(239, 68, 68, 0.15);
    }

    .btn-delete:hover { 
        background: #ef4444; 
        color: #ffffff !important; 
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3);
    }

    .btn-edit:hover i, 
    .btn-delete:hover i {
        color: #ffffff !important;
    }

    .btn-edit i, 
    .btn-delete i {
        font-size: 0.85rem;
    }

    /* ========== RESPONSIVE DESIGN ========== */
    
    /* Tablet & Laptop Kecil (1024px kebawah) */
    @media (max-width: 1024px) {
        .admin-card {
            margin: 20px 24px;
            padding: 24px 28px;
        }
        .hero-img-container {
            width: 130px;
            height: 75px;
        }
        .file-code {
            max-width: 180px;
            font-size: 0.75rem;
            white-space: normal;
            word-break: break-word;
        }
    }

    /* Mobile (768px ke bawah) */
    @media (max-width: 768px) {
        .admin-card { 
            margin: 12px 16px; 
            padding: 18px 20px;
            border-radius: 20px;
        }
        
        .card-header {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .title { 
            font-size: 1.35rem; 
        }
        
        .subtitle { 
            font-size: 0.8rem; 
        }
        
        .header-actions {
            width: 100%;
            justify-content: flex-start;
        }
        
        .btn-primary, .btn-secondary {
            padding: 8px 16px;
            font-size: 0.8rem;
        }
        
        .btn-primary span, .btn-secondary span {
            display: inline-block;
        }
        
        /* Tabel tetap scroll horizontal, tidak terpotong */
        .table-responsive {
            margin: 0 -8px;
            padding: 0 8px;
        }
        
        .modern-table th, 
        .modern-table td {
            padding: 12px 12px;
        }
        
        .modern-table th {
            font-size: 0.7rem;
            white-space: nowrap;
        }
        
        .hero-img-container {
            width: 100px;
            height: 60px;
        }
        
        .badge-no {
            padding: 4px 10px;
            font-size: 0.75rem;
            min-width: 35px;
        }
        
        .file-code {
            max-width: 140px;
            font-size: 0.7rem;
            padding: 4px 8px;
            white-space: normal;
            word-break: break-all;
        }
        
        .action-group {
            gap: 6px;
        }
        
        .btn-edit, .btn-delete {
            padding: 6px 12px;
            font-size: 0.7rem;
        }
        
        .btn-edit span, .btn-delete span {
            display: inline-block;
        }
        
        .btn-edit i, .btn-delete i {
            font-size: 0.75rem;
        }
    }
    
    /* Mobile kecil (480px ke bawah) - ekstra aman */
    @media (max-width: 480px) {
        .admin-card {
            margin: 8px 12px;
            padding: 16px;
        }
        
        .hero-img-container {
            width: 80px;
            height: 50px;
        }
        
        .file-code {
            max-width: 110px;
            font-size: 0.65rem;
        }
        
        .btn-edit span, .btn-delete span {
            display: none; /* Sembunyikan teks, hanya ikon di hp sangat kecil */
        }
        
        .btn-edit, .btn-delete {
            padding: 8px 12px;
        }
        
        .btn-edit i, .btn-delete i {
            margin: 0;
            font-size: 0.9rem;
        }
        
        .action-group {
            gap: 5px;
        }
        
        .badge-no {
            padding: 3px 8px;
            font-size: 0.7rem;
        }
        
        .modern-table td, .modern-table th {
            padding: 10px 8px;
        }
    }
    
    /* Untuk layar sangat lebar (laptop besar) tetap rapi */
    @media (min-width: 1400px) {
        .admin-card {
            margin: 32px auto;
            max-width: 1300px;
        }
        .hero-img-container {
            width: 180px;
            height: 100px;
        }
    }
    
    /* Scrollbar styling untuk table */
    .table-responsive::-webkit-scrollbar {
        height: 6px;
    }
    .table-responsive::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }
    .table-responsive::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    
    /* Empty state styling */
    .modern-table td[colspan] {
        text-align: center;
    }
</style>