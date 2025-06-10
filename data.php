<?php

require "koneksi.php";

$sql = "SELECT * FROM kader";
$rows = $koneksi-> execute_query($sql,[]);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pak sena</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="manage-container">
        <h2>Kelola data bayi</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>berat</th>
                        <th>tinggi</th>
                        <th>tanggal lahir</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $no = 1;
                        foreach ($rows as $item) :
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $item["nama"]; ?></td>
                        <td><?php echo $item["berat"]; ?></td>
                        <td><?php echo $item["tinggi"]; ?></td>
                        <td><?php echo $item["tanggal"]; ?></td>
                        <td> 
                            <a href="edit_data.php?id=<?=$item['id']?>>" class="btn-back">Edit</a>
                            <a href="hapus_data.php?id=<?=$item['id']?>>" class="btn-back">Hapus</a>
                        </td>
                    </tr>
                        <?php
                            $no +=1;
                            endforeach;
                        ?>
                        <?php foreach ($rows as $row) : ?>
                        <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="manage-actions">
            <a href="index.php" class="btn-back">Kembali</a>
            <a href="tambah_data.php" class="btn-back">Tambah</a>
        </div>
    </div>
</body>
</html>
