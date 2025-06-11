<?php

require 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = $_GET['id'];
    $sql = "DELETE FROM bayi WHERE id=?";
    $row = $koneksi -> execute_query($sql,[$id]);
}

if ($row){
    header('Location:data.php');
}

?>