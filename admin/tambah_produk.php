<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp,"../assets/images/produk/".$gambar);

    mysqli_query($conn,"INSERT INTO produk VALUES(NULL,'$nama','$harga','$deskripsi','$gambar')");

    header("Location: produk.php");
}
?>

<style>
    body {
        background-color: #f8fafc;
        font-family: 'Inter', sans-serif;
        color: #1e293b;
    }

    .form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .form-card {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
    }

    .form-header {
        margin-bottom: 30px;
        text-align: center;
    }

    .form-header h2 {
        font-size: 1.8rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 10px;
    }

    .form-header p {
        color: #64748b;
        font-size: 0.95rem;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #334155;
        font-size: 0.9rem;
    }

    .input-group input, 
    .input-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: 0.3s;
        box-sizing: border-box; /* Agar padding tidak merusak lebar */
    }

    .input-group input:focus, 
    .input-group textarea:focus {
        border-color: #38bdf8;
        outline: none;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
    }

    /* Khusus Input File */
    .input-group input[type="file"] {
        padding: 10px;
        background: #f8fafc;
        cursor: pointer;
    }

    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #0ea5e9, #38bdf8);
        color: white;
        padding: 14px;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);
        margin-top: 10px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
    }

    .btn-cancel {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #94a3b8;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .btn-cancel:hover {
        color: #64748b;
    }
</style>

<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h2>Tambah Produk</h2>
            <p>Masukkan detail produk baru untuk katalog website</p>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label>Nama Produk</label>
                <input type="text" name="nama" placeholder="Contoh: Banner Spanduk" required>
            </div>

            <div class="input-group">
                <label>Harga (Angka atau teks)</label>
                <input type="text" name="harga" placeholder="Contoh: 25000 atau Per Meter" required>
            </div>

            <div class="input-group">
                <label>Deskripsi Produk</label>
                <textarea name="deskripsi" rows="4" placeholder="Jelaskan detail bahan atau ukuran..."></textarea>
            </div>

            <div class="input-group">
                <label>Gambar Produk (Format JPG/PNG)</label>
                <input type="file" name="gambar" required>
            </div>

            <button type="submit" name="simpan" class="btn-submit">
                <i class="fas fa-save"></i> Simpan Produk
            </button>
            
            <a href="produk.php" class="btn-cancel">Batal dan Kembali</a>
        </form>
    </div>
</div>