<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Mahasiswa</title>
</head>
<body>
    <!-- lihat -->
    <h1>Daftar Mahasiswa</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>ID Mahasiswa</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Tahun Masuk</th>
            <th>Aksi</th>
        </tr>
        <?php
        require 'class/mahasiswa.php';
        $mahasiswa = new Mahasiswa();
        $data = $mahasiswa->lihat();
        $no = 1;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['id_mahasiswa']."</td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['jurusan']."</td>";
            echo "<td>".$row['tahun_masuk']."</td>";
            echo "<td><a href='edit_mahasiswa.php?id=".$row['id']."'>Edit</a> | <a href='hapus_mahasiswa.php?id=".$row['id']."'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <!-- tambah -->
    <h1>Tambah Mahasiswa</h1>
    <form action="tambah_mahasiswa.php" method="post">
        <label for="id_mahasiswa">ID Mahasiswa</label><br>
        <input type="number" name="id_mahasiswa" id="id_mahasiswa"><br>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama"><br>
        <label for="jurusan">Jurusan</label><br>
        <input type="text" name="jurusan" id="jurusan"><br>
        <label for="tahun_masuk">Tahun Masuk</label><br>
        <input type="number" name="tahun_masuk" id="tahun_masuk"><br>
        <br>
        <input type="submit" value="Tambah" name="tambah_mahasiswa">
    </form>
</body>
</html>