<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // tanpa md5

    // Ambil data kader berdasarkan username
    $sql = "SELECT * FROM kader WHERE username = ?";
    $stmt = $koneksi->execute_query($sql, [$username]);
    $row = $stmt->fetch_assoc();

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['id_kader'] = $row['id_kader'];
        header("Location: data.php");
        exit;
    } else {
        echo "<p style='color:red;'>❌ Login gagal. Username atau password salah.</p>";
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
        <h2>Login kader</h2>
        <form action="" method="POST" class="login-form">
            <input type="hidden" name="role" value="admin">
            <input type="text" name="username" placeholder="Username" >
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="login" class="btn-login">Login</button>
        </form>
    </div>
</body>

</html>