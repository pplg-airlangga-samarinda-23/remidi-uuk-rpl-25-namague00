<?php 

require 'koneksi.php';

$sql1 = "SELECT * FROM bayi";
$babies = $koneksi -> execute_query($sql1) -> fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $id_kader = $_SESSION['id_kader2'];
    $id_bayi = $_POST['bayi'];
    $tinggi = $_POST['tinggi'];
    $berat = $_POST['berat'];

    $sql = "INSERT INTO catat (id_kader, id_bayi, tinggi, berat, tanggal) VALUES (?,?,?,?,CURRENT_DATE)";
    $row = $koneksi -> execute_query($sql, [$id_kader,$id_bayi,$tinggi,$berat]);

    if($row){
        header("Location:catat.php");
    }
}

?>