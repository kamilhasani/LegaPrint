<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";

$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM hero WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp,"../assets/images/hero/".$gambar);
    mysqli_query($conn,"UPDATE hero SET gambar='$gambar' WHERE id='$id'");

    header("Location: hero.php");
}
?>

<style>
    body {
        background-color: #f8fafc;
        font-family: 'Inter', sans-serif;
    }

    .hero-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .hero-card {
        background: white;
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
        text-align: center;
    }

    .hero-header {
        margin-bottom: 30px;
    }

    .hero-header h2 {
        font-size: 1.8rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 10px;
    }

    .hero-header p {
        color: #64748b;
    }

    /* Frame Preview Gambar Hero */
    .hero-preview-wrapper {
        background: #f1f5f9;
        padding: 15px;
        border-radius: 20px;
        margin-bottom: 30px;
        border: 2px dashed #e2e8f0;
    }

    .hero-current-img {
        width: 100%;
        max-height: 350px;
        object-fit: cover;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .upload-box {
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 25px;
        transition: 0.3s;
    }

    .upload-box:hover {
        border-color: #38bdf8;
        background: #f0f9ff;
    }

    .upload-box i {
        font-size: 2rem;
        color: #0ea5e9;
        margin-bottom: 15px;
        display: block;
    }

    .file-input {
        font-size: 0.9rem;
        color: #64748b;
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
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(14, 165, 233, 0.4);
    }

    .btn-cancel {
        display: inline-block;
        margin-top: 20px;
        color: #94a3b8;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .btn-cancel:hover {
        color: #64748b;
    }
</style>

<div class="hero-container">
    <div class="hero-card">
        <div class="hero-header">
            <h2>Edit Banner Hero</h2>
            <p>Gambar ini akan muncul di bagian paling atas halaman utama</p>
        </div>

        <div class="hero-preview-wrapper">
            <small style="display:block; margin-bottom: 10px; color: #94a3b8; font-weight: 600;">PREVIEW SAAT INI</small>
            <img src="../assets/images/hero/<?php echo $d['gambar']; ?>" class="hero-current-img">
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="upload-box">
                <i class="fas fa-cloud-upload-alt"></i>
                <label style="display:block; margin-bottom: 10px; font-weight: 700; color: #334155;">Pilih Gambar Baru</label>
                <input type="file" name="gambar" accept="image/*" class="file-input" required>
                <p style="font-size: 0.75rem; color: #94a3b8; margin-top: 10px;">Rekomendasi ukuran: 1920x1080 px agar tidak pecah</p>
            </div>

            <button type="submit" name="update" class="btn-update">
                <i class="fas fa-save"></i> Perbarui Banner Hero
            </button>
            
            <a href="hero.php" class="btn-cancel">Batal dan Kembali</a>
        </form>
    </div>
</div>