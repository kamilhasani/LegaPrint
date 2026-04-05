<?php

include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM hero WHERE id='$id'");
$d = mysqli_fetch_array($data);

unlink("../assets/images/hero/".$d['gambar']);

mysqli_query($conn,"DELETE FROM hero WHERE id='$id'");

header("Location: hero.php");

?>