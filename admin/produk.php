<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";
?>

<style>
    :root {
        --primary: #0ea5e9;
        --primary-dark: #0284c7;
        --dark-bg: #0f172a;
        --light-bg: #f8fafc;
        --text-main: #1e293b;
        --text-muted: #64748b;
        --border-light: #e2e8f0;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: var(--light-bg);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: var(--text-main);
        line-height: 1.5;
    }

    /* Container Responsif */
    .admin-container {
        max-width: 1400px;
        /* Ubah margin-left agar tidak tertutup sidebar */
        margin: 30px 30px 30px 310px; 
        padding: 0 24px;
        transition: all 0.3s ease;
    }

    /* Header & Tombol */
    .header-box {
        margin-top: 0 !important;
        padding-top: 5px !important; /* Beri sedikit napas agar tidak menempel banget */
        margin-bottom: 10px !important;
    }

    .header-box h2 {
        margin-top: 0 !important;
    }

    .btn-group {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-custom {
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .btn-add {
        background: linear-gradient(135deg, var(--primary), #38bdf8);
        color: white;
        box-shadow: 0 4px 12px rgba(14, 165, 233, 0.25);
        border: none;
    }

    .btn-back {
        background: white;
        color: var(--text-muted);
        border: 1px solid var(--border-light);
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    /* Card Tabel Modern + Responsif */
    .table-card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.05);
        overflow-x: auto;
        border: 1px solid #f0f2f5;
        position: relative;
    }

    /* Tabel styling - scroll horizontal untuk mobile */
    .table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scroll-behavior: smooth;
        width: 100%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 600px;
    }

    thead {
        background: linear-gradient(to bottom, #f8fafc, #f1f5f9);
        border-bottom: 2px solid var(--border-light);
    }

    th {
        padding: 16px 20px;
        text-align: left;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--text-muted);
        white-space: nowrap;
    }

    td {
        padding: 16px 20px;
        border-bottom: 1px solid #f0f2f5;
        vertical-align: middle;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover {
        background-color: #fafcff;
        transition: 0.2s;
    }

    /* Gambar produk responsive */
    .prod-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 14px;
        border: 2px solid #f1f5f9;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        transition: transform 0.2s;
    }
    .prod-img:hover {
        transform: scale(1.05);
    }

    .badge-price {
        background: linear-gradient(135deg, #e0f2fe, #bae6fd);
        color: #0369a1;
        padding: 6px 12px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.85rem;
        display: inline-block;
        white-space: nowrap;
    }

    .prod-name {
        font-weight: 700;
        color: var(--dark-bg);
        font-size: 1rem;
    }

    .desc-text {
        color: var(--text-muted);
        font-size: 0.85rem;
        max-width: 280px;
        white-space: normal;
        word-break: break-word;
        line-height: 1.4;
    }

    /* Aksi Buttons */
    .action-links {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .action-links a {
        text-decoration: none;
        font-weight: 600;
        font-size: 0.8rem;
        padding: 6px 14px;
        border-radius: 30px;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .link-edit {
        color: var(--primary);
        background: rgba(14, 165, 233, 0.1);
        border: 1px solid rgba(14, 165, 233, 0.2);
    }

    .link-hapus {
        color: #ef4444;
        background: rgba(239, 68, 68, 0.08);
        border: 1px solid rgba(239, 68, 68, 0.15);
    }

    .link-edit:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-1px);
    }

    .link-hapus:hover {
        background: #ef4444;
        color: white;
        transform: translateY(-1px);
    }

    /* Empty state */
    .empty-row td {
        text-align: center;
        padding: 48px 20px;
        color: var(--text-muted);
        font-size: 1rem;
    }

    /* Responsive: Tablet & Mobile */
    @media (max-width: 768px) {
        .admin-container {
            margin: 20px auto; /* Kembali ke tengah di mobile */
            padding: 0 16px;
        }

        .header-box {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-box h2 {
            font-size: 1.5rem;
        }

        .btn-group {
            width: 100%;
            justify-content: flex-start;
        }

        .btn-custom {
            padding: 8px 16px;
            font-size: 0.85rem;
        }

        th, td {
            padding: 12px 14px;
        }

        .prod-img {
            width: 50px;
            height: 50px;
        }

        .prod-name {
            font-size: 0.9rem;
        }

        .badge-price {
            font-size: 0.75rem;
            padding: 4px 10px;
            white-space: nowrap;
        }

        .desc-text {
            max-width: 180px;
            font-size: 0.8rem;
        }

        .action-links a {
            padding: 5px 10px;
            font-size: 0.7rem;
        }
    }

    /* Untuk laptop kecil (1024px) tampilan tetap rapi */
    @media (max-width: 1024px) and (min-width: 769px) {
        .admin-container {
            padding: 0 28px;
        }
        .desc-text {
            max-width: 220px;
        }
    }

    /* Styling scrollbar untuk wrapper tabel */
    .table-wrapper::-webkit-scrollbar {
        height: 6px;
    }
    .table-wrapper::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .table-wrapper::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    /* Info jumlah data */
    .table-footer-info {
        padding: 16px 20px;
        border-top: 1px solid var(--border-light);
        font-size: 0.8rem;
        color: var(--text-muted);
        background: #fefefe;
        display: flex;
        justify-content: flex-end;
    }
</style>

<div class="admin-container">
    <div class="header-box">
        <h2>
            <i class="fas fa-boxes" style="color: var(--primary); margin-right: 8px;"></i> 
            Manajemen Produk
        </h2>
        <div class="btn-group">
            <a href="tambah_produk.php" class="btn-custom btn-add">
                <i class="fas fa-plus-circle"></i> Tambah Produk
            </a>
            <a href="dashboard.php" class="btn-custom btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="table-card">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($conn, "
                    SELECT produk.*, kategori.nama_kategori 
                    FROM produk 
                    LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori 
                    ORDER BY produk.id DESC
                    ");
                    
                    if(mysqli_num_rows($data) > 0){
                        while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td style="font-weight: 600;"><?php echo $no++; ?></td>
                        <td>
                            <?php if(!empty($d['gambar']) && file_exists("../assets/images/produk/".$d['gambar'])): ?>
                                <img src="../assets/images/produk/<?php echo htmlspecialchars($d['gambar']); ?>" class="prod-img" alt="product image">
                            <?php else: ?>
                                <div style="width:60px; height:60px; background:#f1f5f9; border-radius:14px; display:flex; align-items:center; justify-content:center;">
                                    <i class="fas fa-image" style="color:#94a3b8; font-size:1.4rem;"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="prod-name"><?php echo htmlspecialchars($d['nama_produk']); ?></td>
                        <td class="prod-name"><?php echo htmlspecialchars($d['nama_kategori'] ?? '-'); ?></td>
                        <td>
                            <span class="badge-price">
                                <?php echo is_numeric($d['harga']) ? "Rp " . number_format($d['harga'],0,',','.') : htmlspecialchars($d['harga']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="desc-text">
                                <?php 
                                    $desc = htmlspecialchars($d['deskripsi']);
                                    echo strlen($desc) > 80 ? substr($desc, 0, 80) . '...' : $desc;
                                ?>
                            </div>
                        </td>
                        <td class="action-links">
                            <a href="edit_produk.php?id=<?php echo $d['id']; ?>" class="link-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="hapus_produk.php?id=<?php echo $d['id']; ?>" class="link-hapus" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else { 
                    ?>
                    <tr class="empty-row">
                        <td colspan="6">
                            <div style="display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 30px 0;">
                                <i class="fas fa-database" style="font-size: 3rem; color: #cbd5e1;"></i>
                                <p style="color: #64748b;">Belum ada data produk. Silakan tambah produk pertama Anda.</p>
                                <a href="tambah_produk.php" class="btn-custom btn-add" style="margin-top: 8px;">
                                    <i class="fas fa-plus"></i> Tambah Produk Sekarang
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php if(mysqli_num_rows($data) > 0): ?>
        <div class="table-footer-info">
            <span><i class="fas fa-chart-line"></i> Total <?php echo mysqli_num_rows($data); ?> produk tersedia</span>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php 
// Tidak merubah apapun dari metode asli, hanya styling responsif dan perbaikan kecil pada error gambar & deskripsi
?>