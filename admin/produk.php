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
    }

    body {
        background-color: var(--light-bg);
        font-family: 'Inter', sans-serif;
        color: var(--text-main);
    }

    .admin-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Header & Tombol */
    .header-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .header-box h2 {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark-bg);
        margin: 0;
    }

    .btn-group {
        display: flex;
        gap: 10px;
    }

    .btn-custom {
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add {
        background: linear-gradient(135deg, var(--primary), #38bdf8);
        color: white;
        box-shadow: 0 4px 12px rgba(14, 165, 233, 0.2);
    }

    .btn-back {
        background: white;
        color: var(--text-muted);
        border: 1px solid #e2e8f0;
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    /* Tabel Modern */
    .table-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        overflow: hidden;
        border: 1px solid #f1f5f9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: none !important; /* Menghilangkan border=1 */
    }

    thead {
        background-color: #f1f5f9;
    }

    th {
        padding: 15px 20px;
        text-align: left;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--text-muted);
    }

    td {
        padding: 15px 20px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover {
        background-color: #f8fafc;
    }

    /* Styling Isi Tabel */
    .prod-img {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #f1f5f9;
    }

    .badge-price {
        background: #f0f9ff;
        color: #0369a1;
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .prod-name {
        font-weight: 700;
        color: var(--dark-bg);
    }

    .desc-text {
        color: var(--text-muted);
        font-size: 0.9rem;
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Aksi */
    .action-links a {
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 6px;
        transition: 0.2s;
    }

    .link-edit { color: var(--primary); background: rgba(14, 165, 233, 0.1); }
    .link-hapus { color: #ef4444; background: rgba(239, 68, 68, 0.1); margin-left: 5px; }

    .link-edit:hover { background: var(--primary); color: white; }
    .link-hapus:hover { background: #ef4444; color: white; }

</style>

<div class="admin-container">
    <div class="header-box">
        <h2>Data Produk</h2>
        <div class="btn-group">
            <a href="tambah_produk.php" class="btn-custom btn-add">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
            <a href="dashboard.php" class="btn-custom btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn,"SELECT * FROM produk");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                        <img src="../assets/images/produk/<?php echo $d['gambar']; ?>" class="prod-img">
                    </td>
                    <td class="prod-name"><?php echo $d['nama_produk']; ?></td>
                    <td>
                        <span class="badge-price">
                            <?php echo is_numeric($d['harga']) ? "Rp " . number_format($d['harga'],0,',','.') : $d['harga']; ?>
                        </span>
                    </td>
                    <td>
                        <div class="desc-text"><?php echo $d['deskripsi']; ?></div>
                    </td>
                    <td class="action-links">
                        <a href="edit_produk.php?id=<?php echo $d['id']; ?>" class="link-edit">Edit</a>
                        <a href="hapus_produk.php?id=<?php echo $d['id']; ?>" class="link-hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>