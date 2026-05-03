<?php
include "../config/koneksi.php";
include "../layout/admin_header.php"; 

if (isset($_POST['update_setting'])) {
    $nama_web = $_POST['nama_website'];
    $whatsapp = $_POST['whatsapp'];
    $email    = $_POST['email'];
    $alamat   = $_POST['alamat'];

    $update = mysqli_query($conn, "UPDATE pengaturan SET 
                nama_website = '$nama_web', 
                whatsapp = '$whatsapp', 
                email = '$email', 
                alamat = '$alamat' 
                WHERE id = 1");

    if ($update) {
        echo "<script>alert('Pengaturan Berhasil Diperbarui!'); window.location='pengaturan.php';</script>";
    }
}

// Ambil data pengaturan saat ini
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pengaturan WHERE id = 1"));
?>

<div class="dashboard-content">
    <div class="page-header">
        <h2><i class="fas fa-cog"></i> Pengaturan Website</h2>
        <p>Kelola informasi kontak dan identitas Lega DigiPrint</p>
    </div>

    <form action="" method="POST" class="setting-form">
        <div class="form-grid">
            <div class="form-card">
                <h4><i class="fas fa-id-card"></i> Identitas Toko</h4>
                <div class="input-group">
                    <label>Nama Website</label>
                    <input type="text" name="nama_website" value="<?= $data['nama_website'] ?>" required>
                </div>
                <div class="input-group">
                    <label>Email Resmi</label>
                    <input type="email" name="email" value="<?= $data['email'] ?>" required>
                </div>
            </div>

            <div class="form-card">
                <h4><i class="fas fa-share-alt"></i> Kontak & Lokasi</h4>
                <div class="input-group">
                    <label>WhatsApp (Format: 628xxx)</label>
                    <input type="text" name="whatsapp" value="<?= $data['whatsapp'] ?>" required>
                </div>
                <div class="input-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" rows="3"><?= $data['alamat'] ?></textarea>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" name="update_setting" class="btn-save">
                <i class="fas fa-check-circle"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<style>
    .dashboard-content { padding: 30px; font-family: 'Inter', sans-serif; }
    .page-header h2 { color: #0f172a; margin-bottom: 5px; }
    .page-header p { color: #64748b; margin-bottom: 30px; }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 25px;
    }

    .form-card {
        background: #fff;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
    }

    .form-card h4 {
        margin-bottom: 20px;
        color: #0ea5e9;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 10px;
    }

    .input-group { margin-bottom: 15px; }
    .input-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #334155; }
    
    .input-group input, .input-group textarea {
        width: 100%;
        padding: 12px;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        transition: 0.3s;
    }

    .input-group input:focus {
        border-color: #38bdf8;
        outline: none;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
    }

    .btn-save {
        margin-top: 30px;
        background: linear-gradient(135deg, #0ea5e9 0%, #38bdf8 100%);
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 10px 20px rgba(14, 165, 233, 0.2);
        transition: 0.3s;
    }

    .btn-save:hover { transform: translateY(-3px); box-shadow: 0 15px 30px rgba(14, 165, 233, 0.4); }
</style>