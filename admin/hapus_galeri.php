<?php
include "../config/koneksi.php";

$id = $_GET['id'];

// 1. Cari nama file gambarnya
$data = mysqli_query($conn, "SELECT gambar FROM galeri WHERE id='$id'");
$row = mysqli_fetch_array($data);
$nama_file = $row['gambar'];

// 2. Hapus file fisik di folder
if(file_exists("../assets/images/galeri/".$nama_file)){
    unlink("../assets/images/galeri/".$nama_file);
}

// 3. Hapus data di database
$delete = mysqli_query($conn, "DELETE FROM galeri WHERE id='$id'");

if($delete){
    header("location: galeri.php?pesan=terhapus");
    exit();
}
?>