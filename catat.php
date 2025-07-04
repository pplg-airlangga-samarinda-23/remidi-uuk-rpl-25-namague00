<?php 
session_start();


require 'koneksi.php';

$sql1 = "SELECT * FROM bayi";
$babies = $koneksi->execute_query($sql1)->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kader = $_SESSION['id_kader'];
    $id_bayi = $_POST['bayi'];
    $tinggi = $_POST['tinggi'];
    $berat = $_POST['berat'];


    $sql = "INSERT INTO catatan (id_kader, id_bayi, tinggi, berat, tannggal) VALUES (?,?,?,?,CURRENT_DATE)";
    $row = $koneksi -> execute_query($sql, [$id_kader,$id_bayi,$tinggi,$berat]);

    if($row){
        header("Location:bayi_detail.php");
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
        <h2>masukkan detail bayi</h2>
        <form action="" method="POST" class="pinjam-form">

            <label for="bayi">bayi</label>
            <select name="bayi" id="bayi">
                <?php foreach ($babies as $baby) : ?>
                <option value="<?=$baby['id_bayi']?>"><?=$baby['nama']?></option>
                <?php endforeach ?>
            </select>

            <input type="text" name="tinggi" id="tinggi" placeholder="masukkan tinggi bayi" required step="any">
            <input type="text" name="berat" id="berat" placeholder="masukkan berat bayi" required step="any">
            <button type="submit" class="btn-submit">catat</button>
            <a href="data.php" class="btn-submit">keluar</a>
        </form>
    </div>
</body>
</html>