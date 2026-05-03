<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$data = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$d = mysqli_fetch_array($data);

// Jika produk tidak ditemukan
if (!$d) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='produk.php';</script>";
    exit;
}

// Logika Hapus Gambar Galeri Satuan (via URL)
if (isset($_GET['hapus_foto'])) {
    $id_foto = $_GET['hapus_foto'];
    // Ambil nama file dulu untuk dihapus dari folder
    $cek_foto = mysqli_query($conn, "SELECT gambar_tambahan FROM produk_gambar WHERE id_gambar='$id_foto'");
    $f = mysqli_fetch_array($cek_foto);
    if ($f) {
        unlink("../assets/images/produk/" . $f['gambar_tambahan']);
        mysqli_query($conn, "DELETE FROM produk_gambar WHERE id_gambar='$id_foto'");
        echo "<script>alert('Foto galeri berhasil dihapus!'); window.location='edit_produk.php?id=$id';</script>";
    }
}

if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // 1. Update Gambar Utama
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if ($gambar != "") {
        $nama_gambar_baru = time() . "_update_" . str_replace(' ', '_', $gambar);
        move_uploaded_file($tmp, "../assets/images/produk/" . $nama_gambar_baru);
        // Hapus gambar lama jika perlu (opsional: unlink("../assets/images/produk/".$d['gambar']);)
        $query = "UPDATE produk SET nama_produk='$nama', harga='$harga', deskripsi='$deskripsi', gambar='$nama_gambar_baru' WHERE id='$id'";
    } else {
        $query = "UPDATE produk SET nama_produk='$nama', harga='$harga', deskripsi='$deskripsi' WHERE id='$id'";
    }
    mysqli_query($conn, $query);

    // 2. Tambah Gambar Galeri Baru (Jika ada yang diunggah)
    if (!empty($_FILES['gambar_tambahan']['name'][0])) {
        foreach ($_FILES['gambar_tambahan']['name'] as $key => $val) {
            $nama_file = $_FILES['gambar_tambahan']['name'][$key];
            $tmp_file = $_FILES['gambar_tambahan']['tmp_name'][$key];
            
            if ($_FILES['gambar_tambahan']['error'][$key] === 0) {
                $nama_galeri_baru = time() . "_" . rand(10, 99) . "_galeri_" . str_replace(' ', '_', $nama_file);
                if (move_uploaded_file($tmp_file, "../assets/images/produk/" . $nama_galeri_baru)) {
                    mysqli_query($conn, "INSERT INTO produk_gambar (id_produk, gambar_tambahan) VALUES ('$id', '$nama_galeri_baru')");
                }
            }
        }
    }

    echo "<script>alert('Data produk berhasil diperbarui!'); window.location.href='produk.php';</script>";
    exit;
}
?>

<style>
    body { background-color: #f8fafc; font-family: 'Inter', sans-serif; }
    .edit-container { max-width: 850px; margin: 50px auto; padding: 0 20px; }
    .edit-card { background: white; padding: 40px; border-radius: 24px; box-shadow: 0 15px 35px rgba(0,0,0,0.05); border: 1px solid #f1f5f9; }
    .edit-header { text-align: center; margin-bottom: 35px; }
    .edit-header h2 { font-size: 1.85rem; font-weight: 800; color: #0f172a; }
    .input-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
    .input-group label { display: block; margin-bottom: 10px; font-weight: 700; color: #334155; font-size: 0.85rem; text-transform: uppercase; }
    .input-group input, .input-group textarea { width: 100%; padding: 14px 16px; border: 2px solid #f1f5f9; border-radius: 12px; font-size: 1rem; box-sizing: border-box; background: #f8fafc; }
    .input-group textarea { min-height: 200px; }
    
    /* Image Section */
    .section-title { font-size: 1rem; font-weight: 700; margin: 30px 0 15px; color: #0f172a; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px; }
    .image-preview-section { background: #f8fafc; padding: 20px; border-radius: 16px; display: flex; align-items: center; gap: 20px; margin-bottom: 25px; border: 1px dashed #e2e8f0; }
    .current-img { width: 100px; height: 100px; object-fit: cover; border-radius: 12px; border: 3px solid white; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    
    /* Galeri Grid */
    .galeri-manage { display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 15px; margin-bottom: 20px; }
    .galeri-item { position: relative; border-radius: 12px; overflow: hidden; height: 120px; border: 2px solid #f1f5f9; }
    .galeri-item img { width: 100%; height: 100%; object-fit: cover; }
    .btn-delete-foto { position: absolute; top: 5px; right: 5px; background: rgba(239, 68, 68, 0.9); color: white; border: none; padding: 5px 8px; border-radius: 6px; cursor: pointer; font-size: 10px; text-decoration: none; }
    
    .btn-update { width: 100%; background: linear-gradient(135deg, #0ea5e9, #38bdf8); color: white; padding: 16px; border: none; border-radius: 14px; font-weight: 700; font-size: 1rem; cursor: pointer; transition: 0.3s; margin-top: 20px; }
    .btn-update:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(14, 165, 233, 0.3); }
</style>

<div class="edit-container">
    <div class="edit-card">
        <div class="edit-header">
            <h2>Edit Produk</h2>
            <p>Kelola informasi produk dan galeri foto</p>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="input-grid">
                <div class="input-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" value="<?php echo $d['nama_produk']; ?>" required>
                </div>
                <div class="input-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" value="<?php echo $d['harga']; ?>" required>
                </div>
            </div>

            <div class="input-group">
                <label>Deskripsi Detail</label>
                <textarea name="deskripsi" required><?php echo $d['deskripsi']; ?></textarea>
            </div>

            <h3 class="section-title">Gambar Utama</h3>
            <div class="image-preview-section">
                <img src="../assets/images/produk/<?php echo $d['gambar']; ?>" class="current-img">
                <div class="image-info">
                    <p style="margin: 0; font-size: 0.85rem; font-weight: 600;">Ganti Gambar Utama?</p>
                    <input type="file" name="gambar" accept="image/*" style="margin-top: 10px; font-size: 0.8rem;">
                </div>
            </div>

            <h3 class="section-title">Galeri Foto Produk</h3>
            <div class="galeri-manage">
                <?php
                $galeri = mysqli_query($conn, "SELECT * FROM produk_gambar WHERE id_produk='$id'");
                if (mysqli_num_rows($galeri) > 0) {
                    while ($g = mysqli_fetch_array($galeri)) {
                ?>
                        <div class="galeri-item">
                            <img src="../assets/images/produk/<?php echo $g['gambar_tambahan']; ?>">
                            <a href="edit_produk.php?id=<?php echo $id; ?>&hapus_foto=<?php echo $g['id_gambar']; ?>" 
                               class="btn-delete-foto" 
                               onclick="return confirm('Hapus foto ini dari galeri?')">
                               <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                <?php
                    }
                } else {
                    echo "<p style='color:#94a3b8; font-size:0.8rem; grid-column: span 4;'>Belum ada foto galeri tambahan.</p>";
                }
                ?>
            </div>

            <div class="input-group" style="margin-top: 20px;">
                <label>Tambah Foto Galeri Baru (Bisa pilih banyak)</label>
                <input type="file" name="gambar_tambahan[]" accept="image/*" multiple>
                <span class="hint">*Pilih foto tambahan jika ingin menambah koleksi galeri.</span>
            </div>

            <button type="submit" name="update" class="btn-update">
                <i class="fas fa-save"></i> Simpan Perubahan Produk
            </button>
            
            <a href="produk.php" style="display: block; text-align: center; margin-top: 20px; color: #94a3b8; text-decoration: none; font-size: 0.9rem;">Batal</a>
        </form>
    </div>
</div>

<?php include "../layout/footer.php"; ?>