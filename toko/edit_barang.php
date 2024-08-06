<?php
require 'koneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM printer WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>

<body>
    <h2>Form edit Barang</h2>
    <form method="POST" action="edit_proses.php">
        <br>
        <label for="nama_merek">Nama Merek:</label><br>
        <input type="text" name="nama_merek" id="nama_merek" value="<?= $row['nama_merek'] ?>"><br>

        <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">

        <br>
        <label for="jumlah">Jumlah :</label><br>
        <input type="text" name="jumlah" id="jumlah" value="<?= $row['jumlah'] ?>"><br>

        <br>
        <label for="warna">Warna:</label><br>
        <input type="text" name="warna" id="warna" value="<?= $row['warna'] ?>"><br>

        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>