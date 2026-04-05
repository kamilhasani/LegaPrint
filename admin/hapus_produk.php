<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM produk WHERE id='$id'");
$d = mysqli_fetch_array($data);

unlink("../assets/images/produk/".$d['gambar']);

mysqli_query($conn,"DELETE FROM produk WHERE id='$id'");

header("Location: produk.php");
?>