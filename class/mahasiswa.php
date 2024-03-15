<?php

class Mahasiswa 
{
    public $db;

    public function __construct()
    {
        require 'koneksi.php';
        $this->db = $conn;
    }

    public function tambah($id_mahasiswa, $nama, $jurusan, $tahun_masuk)
    {
        $query = $this->db->prepare("INSERT INTO mahasiswa (id_mahasiswa, nama, jurusan, tahun_masuk) VALUES (:id_mahasiswa, :nama, :jurusan, :tahun_masuk)");
        $query->bindParam(':id_mahasiswa', $id_mahasiswa);
        $query->bindParam(':nama', $nama);
        $query->bindParam(':jurusan', $jurusan);
        $query->bindParam(':tahun_masuk', $tahun_masuk);
        $query->execute();
    }

    public function lihat()
    {
        $query = $this->db->prepare("SELECT * FROM mahasiswa");
        $query->execute();
        return $query->fetchAll();
    }

    public function lihat_id($id)
    {
        $query = $this->db->prepare("SELECT * FROM mahasiswa WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    public function edit($id, $id_mahasiswa, $nama, $jurusan, $tahun_masuk)
    {
        $query = $this->db->prepare("UPDATE mahasiswa SET id_mahasiswa = :id_mahasiswa, nama = :nama, jurusan = :jurusan, tahun_masuk = :tahun_masuk WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':id_mahasiswa', $id_mahasiswa); // Corrected binding parameter name
        $query->bindParam(':nama', $nama);
        $query->bindParam(':jurusan', $jurusan);
        $query->bindParam(':tahun_masuk', $tahun_masuk);
        $query->execute();
    }

    public function hapus($id)
    {
        $query = $this->db->prepare("DELETE FROM mahasiswa WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }
}

?>