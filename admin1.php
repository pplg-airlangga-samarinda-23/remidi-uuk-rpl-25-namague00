<?php 

require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    var_dump($_POST);
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "INSERT INTO admin(username,password)values (?,?)";
    $row = $koneksi ->execute_query($sql,[$username,$password]);

    if ($row) {
        header("location:admin2.php");
    }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="login-container">
        <h2>tambah kader</h2>
        <form action="" method="POST" class="login-form">
            <input type="hidden" name="role" value="admin">
            <input type="text" name="username" placeholder="Username" >
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="login" class="btn-login">tambah</button>
            <a href="index.php" class="btn-submit">keluar</a>
        </form>
    </div>
    </form>

</body>
</html>