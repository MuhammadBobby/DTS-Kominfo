<?php
require 'koneksi.php';

$sql = "SELECT * FROM printer";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Barang</title>
</head>

<body>
    <h2>Data Barang</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Merek</th>
            <th>Jumlah</th>
            <th>Warna</th>
            <th>Aksi</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
        ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_merek'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['warna'] ?></td>
                    <td>
                        <a href="edit_barang.php?id=<?= $row['id'] ?>">Edit</a>
                        |
                        <a href="delete_barang.php?id=<?= $row['id'] ?>">Delete</a>

                    </td>
                </tr>

        <?php
            }
        } else {
            echo "Tidak ada data";
        }
        ?>

    </table>
    <br>
    <a href="input_barang.php">Input Barang</a>
</body>

</html>