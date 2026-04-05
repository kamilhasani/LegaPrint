<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";

$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM produk WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if($gambar != ""){
        move_uploaded_file($tmp,"../assets/images/produk/".$gambar);
        mysqli_query($conn,"UPDATE produk SET 
            nama_produk='$nama', 
            harga='$harga', 
            deskripsi='$deskripsi', 
            gambar='$gambar' 
            WHERE id='$id'
        ");
    } else {
        mysqli_query($conn,"UPDATE produk SET 
            nama_produk='$nama', 
            harga='$harga', 
            deskripsi='$deskripsi' 
            WHERE id='$id'
        ");
    }
    header("Location: produk.php");
}
?>

<style>
    body {
        background-color: #f8fafc;
        font-family: 'Inter', sans-serif;
    }

    .edit-container {
        max-width: 700px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .edit-card {
        background: white;
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
    }

    .edit-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .edit-header h2 {
        font-size: 1.85rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 8px;
    }

    .edit-header p {
        color: #64748b;
        font-size: 0.95rem;
    }

    .input-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group.full {
        grid-column: span 2;
    }

    .input-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 700;
        color: #334155;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .input-group input, 
    .input-group textarea {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #f1f5f9;
        border-radius: 12px;
        font-size: 1rem;
        transition: 0.3s;
        box-sizing: border-box;
        background: #f8fafc;
    }

    .input-group input:focus, 
    .input-group textarea:focus {
        border-color: #38bdf8;
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
    }

    /* Preview Gambar */
    .image-preview-section {
        background: #f1f5f9;
        padding: 20px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .current-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 12px;
        border: 3px solid white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .image-info p {
        margin: 0;
        font-size: 0.85rem;
        color: #64748b;
        margin-bottom: 8px;
    }

    .btn-update {
        width: 100%;
        background: linear-gradient(135deg, #0ea5e9, #38bdf8);
        color: white;
        padding: 16px;
        border: none;
        border-radius: 14px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 10px 20px rgba(14, 165, 233, 0.3);
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(14, 165, 233, 0.4);
    }

    .btn-cancel {
        display: block;
        text-align: center;
        margin-top: 25px;
        color: #94a3b8;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
    }

    @media (max-width: 600px) {
        .input-grid { grid-template-columns: 1fr; }
        .input-group.full { grid-column: span 1; }
    }
</style>

<div class="edit-container">
    <div class="edit-card">
        <div class="edit-header">
            <h2>Perbarui Produk</h2>
            <p>Ubah informasi produk untuk menyesuaikan katalog terbaru</p>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="input-grid">
                <div class="input-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" value="<?php echo $d['nama_produk']; ?>" required>
                </div>

                <div class="input-group">
                    <label>Harga Produk</label>
                    <input type="text" name="harga" value="<?php echo $d['harga']; ?>" required>
                </div>
            </div>

            <div class="input-group full">
                <label>Deskripsi Detail</label>
                <textarea name="deskripsi" rows="5"><?php echo $d['deskripsi']; ?></textarea>
            </div>

            <div class="image-preview-section">
                <img src="../assets/images/produk/<?php echo $d['gambar']; ?>" class="current-img">
                <div class="image-info">
                    <p>Gambar saat ini yang ditampilkan di website.</p>
                    <label style="color: #0ea5e9; cursor: pointer; font-size: 0.9rem;">
                        <i class="fas fa-upload"></i> Ganti Gambar Baru
                        <input type="file" name="gambar" style="display: none;">
                    </label>
                    <small style="display: block; color: #94a3b8; margin-top: 5px;">*Kosongkan jika tidak ingin diganti</small>
                </div>
            </div>

            <button type="submit" name="update" class="btn-update">
                <i class="fas fa-sync-alt"></i> Simpan Perubahan
            </button>
            
            <a href="produk.php" class="btn-cancel">Batal dan Kembali</a>
        </form>
    </div>
</div>