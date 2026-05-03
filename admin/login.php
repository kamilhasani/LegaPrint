<?php
session_start();

if(isset($_SESSION['login'])){
header("Location: dashboard.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login Admin</title>

<style>

body{
font-family:Arial;
background:#f1f5f9;
display:flex;
align-items:center;
justify-content:center;
height:100vh;
}

.login-box{
background:white;
padding:40px;
border-radius:10px;
width:300px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h2{
text-align:center;
margin-bottom:20px;
}

input{
width:100%;
padding:10px;
margin-bottom:15px;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:10px;
background:#0284c7;
border:none;
color:white;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#0369a1;
}

</style>

</head>

<body>

<div class="login-box">

<h2>Login Admin</h2>

<form action="proses_login.php" method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>

</form>

</div>

</body>
</html>