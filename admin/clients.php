<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";

// Logika Tambah Client
if(isset($_POST['tambah'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $foto = $_FILES['logo']['name'];
    $tmp = $_FILES['logo']['tmp_name'];
    
    // Sanitasi nama file agar tidak ada spasi
    $nama_baru = time() . "_" . str_replace(' ', '_', $foto);

    if(move_uploaded_file($tmp, "../assets/images/clients/" . $nama_baru)){
        mysqli_query($conn, "INSERT INTO clients (nama_client, logo) VALUES ('$nama', '$nama_baru')");
        echo "<script>alert('Client berhasil ditambahkan!'); window.location='clients.php';</script>";
    }
}

// Logika Hapus Client
if(isset($_GET['hapus'])){
    $id_hapus = $_GET['hapus'];
    $cek = mysqli_query($conn, "SELECT logo FROM clients WHERE id='$id_hapus'");
    $d = mysqli_fetch_array($cek);
    
    if($d){
        $path = "../assets/images/clients/" . $d['logo'];
        if(file_exists($path)){ unlink($path); }
        mysqli_query($conn, "DELETE FROM clients WHERE id='$id_hapus'");
        echo "<script>alert('Client berhasil dihapus!'); window.location='clients.php';</script>";
    }
}
?>

<style>
    body { background-color: #f8fafc; font-family: 'Inter', sans-serif; color: #1e293b; }
    .main-container { max-width: 1000px; margin: 40px auto; padding: 0 20px; }
    
    /* Card Style */
    .card { background: white; padding: 35px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #f1f5f9; }
    .card-header { margin-bottom: 30px; }
    .card-header h2 { font-size: 1.7rem; font-weight: 800; color: #0f172a; margin-bottom: 5px; }
    .card-header p { color: #64748b; font-size: 0.95rem; }

    /* Form Styling */
    .form-box { background: #f8fafc; padding: 25px; border-radius: 15px; border: 1.5px dashed #e2e8f0; margin-bottom: 40px; }
    .input-row { display: grid; grid-template-columns: 2fr 2fr 1fr; gap: 20px; align-items: flex-end; }
    
    .input-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #334155; font-size: 0.85rem; text-transform: uppercase; }
    .input-group input { width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 0.95rem; transition: 0.3s; box-sizing: border-box; }
    .input-group input:focus { border-color: #38bdf8; outline: none; box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1); background: white; }

    .btn-add { background: linear-gradient(135deg, #0ea5e9, #38bdf8); color: white; padding: 13px; border: none; border-radius: 10px; font-weight: 700; cursor: pointer; transition: 0.3s; width: 100%; }
    .btn-add:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(14, 165, 233, 0.3); }

    /* Table Styling */
    table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 10px; }
    th { background: #f1f5f9; color: #475569; font-weight: 700; text-transform: uppercase; font-size: 0.75rem; padding: 15px; text-align: left; letter-spacing: 0.5px; }
    td { padding: 15px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; color: #334155; font-size: 0.95rem; }
    tr:hover td { background: #fcfdfe; }
    
    .client-logo { width: 80px; height: 50px; object-fit: contain; background: #fff; padding: 5px; border-radius: 8px; border: 1px solid #f1f5f9; }
    .btn-delete { color: #ef4444; text-decoration: none; font-weight: 600; font-size: 0.85rem; padding: 8px 12px; border-radius: 8px; transition: 0.2s; }
    .btn-delete:hover { background: #fef2f2; }

    @media (max-width: 768px) {
        .input-row { grid-template-columns: 1fr; }
    }
</style>

<div class="main-container">
    <div class="card">
        <div class="card-header">
            <h2>Kelola Client</h2>
            <p>Tambahkan logo perusahaan atau brand yang telah bekerja sama.</p>
        </div>

        <div class="form-box">
            <form method="POST" enctype="multipart/form-data">
                <div class="input-row">
                    <div class="input-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" name="nama" placeholder="Misal: PT. Maju Jaya" required>
                    </div>
                    <div class="input-group">
                        <label>Logo Client (PNG/JPG)</label>
                        <input type="file" name="logo" accept="image/*" required>
                    </div>
                    <div class="input-group">
                        <button type="submit" name="tambah" class="btn-add">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 50px; border-radius: 10px 0 0 0;">No</th>
                    <th>Logo</th>
                    <th>Nama Client</th>
                    <th style="text-align: center; border-radius: 0 10px 0 0;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $res = mysqli_query($conn, "SELECT * FROM clients ORDER BY id DESC");
                if(mysqli_num_rows($res) > 0) {
                    while($c = mysqli_fetch_array($res)){
                ?>
                <tr>
                    <td><strong><?php echo $no++; ?></strong></td>
                    <td>
                        <img src="../assets/images/clients/<?php echo $c['logo']; ?>" class="client-logo" alt="Logo">
                    </td>
                    <td><?php echo $c['nama_client']; ?></td>
                    <td style="text-align: center;">
                        <a href="clients.php?hapus=<?php echo $c['id']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus client ini?')">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='4' style='text-align:center; padding: 30px; color: #94a3b8;'>Belum ada data client.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
// Pastikan footer di-include jika file-nya ada
if(file_exists("../layout/admin_footer.php")) {
    include "../layout/admin_footer.php";
} else {
    echo "</body></html>";
}
?>