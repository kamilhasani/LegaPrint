<?php
include "../config/koneksi.php";
include "../layout/admin_header.php"; // Pastikan path ../ sudah benar
?>

<div class="admin-card">
    <div class="card-header">
        <div>
            <h2 class="title">Kelola Visual Hero</h2>
            <p class="subtitle">Kelola gambar utama yang muncul di bagian depan website.</p>
        </div>
        <div class="header-actions">
            <a href="dashboard.php" class="btn-secondary">
                <i class="fas fa-arrow-left"></i> Dashboard
            </a>
            <a href="tambah_hero.php" class="btn-primary">
                <i class="fas fa-plus"></i> Tambah Hero
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th width="80">No</th>
                    <th>Pratinjau Gambar</th>
                    <th>Nama File</th>
                    <th width="200" style="text-align: center;">Aksi</th>
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
                            <img src="../assets/images/hero/<?php echo $d['gambar']; ?>" alt="Hero Image">
                        </div>
                    </td>
                    <td>
                        <code class="file-code"><?php echo $d['gambar']; ?></code>
                    </td>
                    <td>
                        <div class="action-group">
                            <a href="edit_hero.php?id=<?php echo $d['id']; ?>" class="btn-edit" title="Edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="hapus_hero.php?id=<?php echo $d['id']; ?>" class="btn-delete" title="Hapus" onclick="return confirm('Hapus gambar ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='4' style='text-align:center; padding:50px; color:#94a3b8;'>Belum ada gambar hero.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Container Utama */
    .admin-card {
        background: #ffffff;
        margin: 30px;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        border: 1px solid #f1f5f9;
    }

    /* Header */
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .title { font-size: 1.6rem; color: #0f172a; font-weight: 800; margin-bottom: 5px; }
    .subtitle { color: #64748b; font-size: 0.95rem; }

    /* Buttons */
    .header-actions { display: flex; gap: 12px; }
    
    .btn-primary, .btn-secondary {
        padding: 12px 20px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: 0.3s;
    }

    .btn-primary { background: #0ea5e9; color: white; }
    .btn-primary:hover { background: #0284c7; transform: translateY(-2px); }
    
    .btn-secondary { background: #f1f5f9; color: #475569; }
    .btn-secondary:hover { background: #e2e8f0; }

    /* Table Styling */
    .table-responsive { overflow-x: auto; }
    .modern-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    .modern-table th {
        background: #f8fafc;
        padding: 18px 20px;
        text-align: left;
        color: #64748b;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid #f1f5f9;
    }

    .modern-table td {
        padding: 20px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        vertical-align: middle;
    }

    /* Hero Image Preview */
    .hero-img-container {
        width: 180px;
        height: 100px;
        border-radius: 12px;
        overflow: hidden;
        border: 3px solid #f1f5f9;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .hero-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Badges & Codes */
    .badge-no {
        background: #eff6ff;
        color: #3b82f6;
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .file-code {
        background: #f1f5f9;
        padding: 5px 10px;
        border-radius: 6px;
        font-family: 'Courier New', Courier, monospace;
        font-size: 0.85rem;
        color: #475569;
    }

    /* Action Buttons */
    .action-group { 
        display: flex; 
        gap: 10px; 
        justify-content: center; 
        align-items: center;
    }

    .btn-edit, .btn-delete {
        padding: 10px 18px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid transparent; /* Border halus */
    }

    /* Tombol Edit - Biru LegaPrint */
    .btn-edit { 
        color: #0ea5e9; 
        background: rgba(14, 165, 233, 0.1); /* Background Biru Transparan */
    }

    .btn-edit:hover { 
        background: #0ea5e9; 
        color: #ffffff !important; 
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
    }

    /* Tombol Delete - Merah Tegas */
    .btn-delete { 
        color: #ef4444; 
        background: rgba(239, 68, 68, 0.1); /* Background Merah Transparan */
    }

    .btn-delete:hover { 
        background: #ef4444; 
        color: #ffffff !important; 
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    /* MEMAKSA IKON IKUT BERUBAH WARNA */
    .btn-edit:hover i, 
    .btn-delete:hover i {
        color: #ffffff !important;
    }

    /* Ukuran Ikon agar Proporsional */
    .btn-edit i, 
    .btn-delete i {
        font-size: 0.95rem;
        transition: 0.2s;
    }

    /* Responsive mobile */
    @media (max-width: 768px) {
        .admin-card { margin: 15px; padding: 20px; }
        .hero-img-container { width: 120px; height: 70px; }
        .header-actions span { display: none; }
    }
</style>
