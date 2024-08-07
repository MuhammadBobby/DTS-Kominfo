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
    <div style="width: 50%; margin: 0 auto; padding-top: 50px;">
        <h2>Form Edit Barang</h2>
        <form method="POST" action="edit_proses.php">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <div style="margin-bottom: 10px;">
                <label for="nama_merek">Nama Merek:</label><br>
                <input type="text" name="nama_merek" id="nama_merek" value="<?= $row['nama_merek'] ?>" required>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="jumlah">Jumlah:</label><br>
                <input type="text" name="jumlah" id="jumlah" value="<?= $row['jumlah'] ?>" required>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="warna">Warna:</label><br>
                <input type="text" name="warna" id="warna" value="<?= $row['warna'] ?>" required>
            </div>

            <div style="margin-top: 20px;">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>