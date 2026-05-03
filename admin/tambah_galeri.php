<?php
include "../config/koneksi.php";

if(isset($_POST['submit'])){
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    
    // Ambil ekstensi file
    $ekstensi = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
    
    // Daftar ekstensi yang diperbolehkan (Gambar & Video)
    $ekstensi_allowed = array('jpg', 'jpeg', 'png', 'gif', 'mp4', 'mov', 'webm', 'avi');

    if(in_array($ekstensi, $ekstensi_allowed)){
        // Buat nama unik
        $nama_baru = "galeri_" . time() . "." . $ekstensi;
        $folder = '../assets/images/galeri/';

        if(move_uploaded_file($source, $folder.$nama_baru)){
            $insert = mysqli_query($conn, "INSERT INTO galeri (gambar) VALUES ('$nama_baru')");
            if($insert){
                header("location: galeri.php?pesan=berhasil");
                exit();
            }
        } else {
            $error = "Gagal mengupload file ke server.";
        }
    } else {
        $error = "Format file tidak didukung! Gunakan JPG, PNG, atau MP4.";
    }
}

include "../layout/admin_header.php";
?>

<div style="max-width:500px; margin:50px auto; background:#fff; padding:30px; border-radius:15px; box-shadow:0 10px 30px rgba(0,0,0,0.05);">
    <h3 style="margin-top:0;">Upload Foto/Video Baru</h3>
    <?php if(isset($error)) echo "<p style='color:red; font-size:0.9rem; margin-bottom:15px;'>$error</p>"; ?>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div style="margin:20px 0;">
            <label style="display:block; margin-bottom:10px; font-weight:600;">Pilih File (Gambar/Video)</label>
            <input type="file" name="gambar" required style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px;">
            <small style="color:#64748b; display:block; margin-top:5px;">Format: JPG, PNG, MP4, WEBM (Maks. 20MB)</small>
        </div>
        <button type="submit" name="submit" style="width:100%; background:#0ea5e9; color:#fff; border:none; padding:12px; border-radius:10px; font-weight:bold; cursor:pointer;">Mulai Upload</button>
        <a href="galeri.php" style="display:block; text-align:center; margin-top:15px; color:#64748b; text-decoration:none;">Kembali</a>
    </form>
</div>