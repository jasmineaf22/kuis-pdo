<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>Edit Mahasiswa</h1>
    <?php
require 'class/mahasiswa.php';
$mahasiswa = new Mahasiswa();
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $data = $mahasiswa->lihat_id($id);
    if ($data) { // Check if data exists
?>
    <form action="edit_mahasiswa.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label for="id_mahasiswa">ID Mahasiswa</label><br>
        <input type="number" name="id_mahasiswa" id="id_mahasiswa" value="<?php echo htmlspecialchars($data['id_mahasiswa']); ?>"><br>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($data['nama']); ?>"><br>
        <label for="jurusan">Jurusan</label><br>
        <input type="text" name="jurusan" id="jurusan" value="<?php echo htmlspecialchars($data['jurusan']); ?>"><br>
        <label for="tahun_masuk">Tahun Masuk</label><br>
        <input type="number" name="tahun_masuk" id="tahun_masuk" value="<?php echo htmlspecialchars($data['tahun_masuk']); ?>"><br>
        <br>
        <input type="submit" value="Edit" name="edit_mahasiswa">
    
        </form>
        <?php
            } else {
                echo "Mahasiswa not found!";
            }
        }
        ?>
    <?php
    if (isset($_POST['edit_mahasiswa'])) {
        $id = $_POST['id'];
        $id_mahasiswa = $_POST['id_mahasiswa'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $tahun_masuk = $_POST['tahun_masuk'];

        // Sanitize data before updating
        $id = htmlspecialchars($id);
        $id_mahasiswa = htmlspecialchars($id_mahasiswa);
        $nama = htmlspecialchars($nama);
        $jurusan = htmlspecialchars($jurusan);
        $tahun_masuk = htmlspecialchars($tahun_masuk);

        $mahasiswa->edit($id, $id_mahasiswa, $nama, $jurusan, $tahun_masuk);
        header('location: index.php');
    }
    ?>
</body>
</html>
