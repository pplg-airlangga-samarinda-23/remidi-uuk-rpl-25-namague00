<?php 

require "koneksi.php";

if ($_SERVER ["REQUEST_METHOD"] === "GET") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM bayi WHERE id=?";
    $row = $koneksi -> execute_query($sql,[$id]) -> fetch_assoc();
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["nama"];
    $ortu = $_POST["ortu"];
    $tanggal_lahir =$_POST["tanggal_lahir"];
    $id = $_GET["id"];

    $sql = "UPDATE bayi SET nama=? , ortu=?, tanggal_lahir=? WHERE id=?";
    $row = $koneksi ->execute_query($sql,[$nama,$ortu,$tanggal_lahir,$id]);

    header("location:data.php");
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
            <input type="text" name="nama" id="nama" value="<?= $row['nama']; ?>">
            <input type="text" name="ortu" id="ortu" value="<?= $row['ortu']; ?>">
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $row['tanggal_lahir']; ?>">
            <button type="submit" class="btn-submit">submit</button>
            <a href="data.php" class="btn-submit">keluar</a>
        </form>
    </div>
</body>
</html>