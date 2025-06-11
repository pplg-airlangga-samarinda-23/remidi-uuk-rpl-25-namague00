<?php

require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    var_dump($_POST);
    $nama = $_POST["nama"];
    $ortu = $_POST["ortu"];
    $tanggal_lahir = $_POST["tanggal_lahir"];

    $sql = "INSERT INTO bayi(nama,ortu,tanggal_lahir)values (?,?,?)";
    $row = $koneksi ->execute_query($sql,[$nama,$ortu,$tanggal_lahir]);

    if ($row) {
        header("Location:data.php");
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
    <div class="pinjam-container">
        <h2>masukkan data bayi</h2>
        <form action="" method="POST" class="pinjam-form">
            <input type="text" name="nama" id="nama" placeholder="masukkan nama bayi" required>
            <input type="text" name="ortu" id="ortu" placeholder="masukkan nama ortu" required>
            <input type="date" name="tanggal" id="tanggal">
            <button type="submit" class="btn-submit">submit</button>
            <a href="data.php" class="btn-submit">keluar</a>
        </form>
    </div>
</body>
</html>