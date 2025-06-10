<?php

require "koneksi.php";

$sql = "SELECT username FROM admin";
$rows = $koneksi-> execute_query($sql) -> fetch_all(MYSQLI_ASSOC);

$no =0 ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pak sena</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="manage-container">
        <h2>daftar kader</h2>
        <div class="table-wrapper">
        <thead>
            <table>
            <tr>
                <th>No</th>
                <th>username</th>
            </tr>
        
        </thead>
        <tbody id="table-body">
            <?php foreach($rows as $row) { ?>

            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row['username'] ?></td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
    </div>
    <div class="manage-actions">
        <a href="admin1.php" class="btn-back">tambah</a>
        <a href="index.php" class="btn-back">kembali</a>
    </div>
    </div>
</body>
</html>