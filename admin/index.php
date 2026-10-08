<?php
session_start();

require_once 'db.php';
require_once 'clean.php';
$msg = '';
// Basic Form Handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = clean_input($_POST['name']);
$password = $_POST['password'];


$query = $pdo->prepare("SELECT * FROM `admin` WHERE `name` = '".$name."' AND `password` = '".md5($password)."' "); 
$query->execute();
if ($query->rowCount() > 0) { 

$fetch_user = $query->fetch(PDO::FETCH_ASSOC);

$_SESSION['id'] = $fetch_user['id'];
$_SESSION['user'] = $fetch_user['name'];
session_write_close(); 

header("Location: home.php");

}else{
$msg ='Please Check Your Name And Password.';
}

}

  


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:rgb(255, 255, 255);
}

.container{
    width:380px;
    background:white;
    padding:40px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,.3);
}

.container h2{
    text-align:center;
    margin-bottom:25px;
    color:#1e293b;
}

.input-group{
    margin-bottom:18px;
}

.input-group label{
    display:block;
    margin-bottom:6px;
    font-weight:600;
    color:#374151;
}

.input-group input{
    width:100%;
    padding:12px;
    border:1px solid #d1d5db;
    border-radius:8px;
    outline:none;
    transition:.3s;
}

.input-group input:focus{
    border-color:#2563eb;
    box-shadow:0 0 8px rgba(37,99,235,.3);
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#2563eb;
    color:white;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    background:#1d4ed8;
}


</style>
</head>
<body>

<div class="container">
    <h2>Admin Login</h2>

    <form method="POST">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="name" placeholder="Enter Username">
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password">
        </div>
        <p><?= $msg; ?></p>
        <button type="submit">Login</button>

    </form>
</div>

</body>
</html>