<?php

require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $nama = $_POST["nama"];
    $ortu = $_POST["ortu"];
    $tanggal_lahir = $_POST["tanggal"];
    $sql = "INSERT INTO bayi(nama, ortu, tanggal_lahir) VALUES (?, ?, ?)";
    $row = $koneksi->execute_query($sql, [$nama, $ortu, $tanggal_lahir]);

    if ($row) {
        header("Location: data.php");
        exit;
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
    <title>Form Tambah Data Bayi</title>
</head>
<body>
    <div class="pinjam-container">
        <h2>Masukkan Data Bayi</h2>
        <form action="" method="POST" class="pinjam-form">
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama bayi" required>
            <input type="text" name="ortu" id="ortu" placeholder="Masukkan nama ortu" required>
            <input type="date" name="tanggal" id="tanggal" required>
            <button type="submit" class="btn-submit">Submit</button>
            <a href="data.php" class="btn-submit">Keluar</a>
        </form>
    </div>
</body>
</html>
