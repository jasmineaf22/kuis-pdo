<?php

require 'class/mahasiswa.php';
$mahasiswa = new Mahasiswa();

if (isset($_POST['tambah_mahasiswa'])){
    $id_mahasiswa = $_POST['id_mahasiswa'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $tahun_masuk = $_POST['tahun_masuk'];

    $mahasiswa->tambah($id_mahasiswa, $nama, $jurusan, $tahun_masuk);
    header('location: index.php');
}

?>