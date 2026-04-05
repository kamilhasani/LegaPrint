<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";
?>

<div class="admin-card" style="background:#fff; margin:30px; padding:30px; border-radius:15px; box-shadow:0 10px 25px rgba(0,0,0,0.05);">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
        <div>
            <h2 style="margin:0; color:#0f172a;">Kelola Galeri Produk</h2>
            <p style="color:#64748b; font-size:0.9rem;">Daftar foto hasil cetakan Lega DigiPrint.</p>
        </div>
        <a href="tambah_galeri.php" style="background:#0ea5e9; color:#fff; padding:12px 20px; border-radius:10px; text-decoration:none; font-weight:bold; display:inline-flex; align-items:center; gap:8px;">
            <i class="fas fa-plus"></i> Tambah Foto
        </a>
    </div>

    <table style="width:100%; border-collapse:collapse;">
        <thead style="background:#f8fafc; color:#64748b; text-align:left; font-size:0.8rem; text-transform:uppercase;">
            <tr>
                <th style="padding:15px;">No</th>
                <th style="padding:15px;">Pratinjau</th>
                <th style="padding:15px;">Nama File</th>
                <th style="padding:15px; text-align:center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
            while($row = mysqli_fetch_array($query)) {
            ?>
            <tr style="border-bottom:1px solid #f1f5f9;">
                <td style="padding:15px;"><?= $no++; ?></td>
                <td style="padding:15px;">
                    <img src="../assets/images/galeri/<?= $row['gambar']; ?>" style="width:120px; height:80px; object-fit:cover; border-radius:8px; border:1px solid #e2e8f0;">
                </td>
                <td style="padding:15px; font-family:monospace; color:#475569;"><?= $row['gambar']; ?></td>
                <td style="padding:15px; text-align:center;">
                    <a href="hapus_galeri.php?id=<?= $row['id']; ?>" style="color:#ef4444; background:#fee2e2; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:0.8rem;" onclick="return confirm('Hapus foto ini?')">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>