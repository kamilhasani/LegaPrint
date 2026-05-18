<?php
session_start();

include "../config/koneksi.php";

// Cegah akses langsung tanpa POST
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: login.php");
    exit;
}

// Ambil input
$username = trim($_POST['username']);
$password = $_POST['password'];

// Validasi kosong
if(empty($username) || empty($password)){
    echo "<script>
        alert('Username dan password wajib diisi!');
        window.location='login.php';
    </script>";
    exit;
}

// Prepared Statement
$stmt = $conn->prepare(
    "SELECT * FROM admin WHERE username = ? LIMIT 1"
);

$stmt->bind_param("s", $username);

$stmt->execute();

$result = $stmt->get_result();

// Cek username
if($result->num_rows > 0){

    $admin = $result->fetch_assoc();

    // Verifikasi password hash
    if(password_verify($password, $admin['password'])){

        // Regenerate session
        session_regenerate_id(true);

        // Simpan session
        $_SESSION['login'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];

        header("Location: dashboard.php");
        exit;

    }else{

        echo "<script>
            alert('Password salah!');
            window.location='login.php';
        </script>";
    }

}else{

    echo "<script>
        alert('Username tidak ditemukan!');
        window.location='login.php';
    </script>";
}

$stmt->close();
$conn->close();
?>