<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if($username == "boba" && $password == "boba58"){

$_SESSION['login'] = true;

header("Location: dashboard.php");

}else{

echo "Login gagal. Username atau password salah.";

}
?>