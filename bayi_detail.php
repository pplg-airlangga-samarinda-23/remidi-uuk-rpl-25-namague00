<?php 


require 'koneksi.php';

if (!isset($_GET['id_bayi'])) {
    die("ID bayi tidak ditemukan di URL.");
}

$id = $_GET['id_bayi'];

$sql_bayi = "SELECT * FROM bayi WHERE id_bayi = ?";
$bayi = $koneksi->execute_query($sql_bayi, [$id])->fetch_assoc();

$sql = "SELECT 
        c.id, 
        p.username AS kader, 
        c.tinggi, 
        c.berat,
        c.tannggal 
        FROM catatan c 
        INNER JOIN kader p ON c.id_kader = p.id_kader 
        WHERE c.id_bayi = ? 
        ORDER BY c.id DESC";
$details = $koneksi->execute_query($sql, [$id])->fetch_all(MYSQLI_ASSOC);
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
        <h2>DATA CATATAN</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>tanggal </th>
                        <th>tinggi</th>
                        <th>berat</th>
                        <th>kader</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $no = 1;
                        foreach ($details as $detail) :
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $detail["tannggal"]; ?></td>
                        <td><?php echo $detail["tinggi"]; ?></td>
                        <td><?php echo $detail["berat"]; ?></td>
                        <td><?php echo $detail["kader"]; ?></td>
                        <td> 
                            <a href="edit_data.php?id_bayi=<?= $id ?>" class="btn-back">Edit</a>
                            <a href="hapus_data.php?id_bayi=<?= $id ?>" class="btn-back">Hapus</a>
                            
                        </td>
                    </tr>
                        <?php
                            $no +=1;
                            endforeach;
                        ?>
                </tbody>
            </table>
        </div>
        <div class="manage-actions">
            <a href="index.php" class="btn-back">Kembali</a>
            <a href="catat.php?id_bayi=<?= $id ?>" class="btn-back">Tambah Detail</a>
        </div>
    </div>
</body>
</html>
