<?php
session_start();

if(isset($_SESSION['login'])){
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Admin</title>

<style>

body{
    font-family:Arial;
    background:#f1f5f9;
    display:flex;
    align-items:center;
    justify-content:center;
    height:100vh;
    margin:0;
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
    box-sizing:border-box;
}

button{
    width:100%;
    padding:10px;
    background:#0284c7;
    border:none;
    color:white;
    border-radius:5px;
    cursor:pointer;
    font-weight:bold;
}

button:hover{
    background:#0369a1;
}

</style>

</head>

<body>

<div class="login-box">

    <h2>Login Admin</h2>

    <form action="proses_login.php" method="POST" autocomplete="off">

        <input 
            type="text" 
            name="username" 
            placeholder="Username"
            maxlength="50"
            autocomplete="off"
            required
        >

        <input 
            type="password" 
            name="password" 
            placeholder="Password"
            maxlength="100"
            autocomplete="new-password"
            required
        >

        <button type="submit">Login</button>

    </form>

</div>

</body>
</html>