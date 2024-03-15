<?php

require 'class/mahasiswa.php';
$mahasiswa = new Mahasiswa();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $mahasiswa->hapus($id);
    header('location: index.php');
}

?>