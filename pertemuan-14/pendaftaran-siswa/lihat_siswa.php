<?php
include 'koneksi.php';
$sql = "SELECT * FROM siswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- nav -->
    <?php include 'navbar.php'; ?>


    <div class="container mt-5">
        <h2 class="text-center mb-3">Data Siswa</h2>

        <a href="daftar.php" class="btn btn-primary mb-3">Tambahkan Data</a>
        <p>Jumlah Siswa: <?= $result->num_rows ?></p>

        <!-- table siswa -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Sekolah Asal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_lengkap'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['jenis_kelamin'] ?></td>
                            <td><?= $row['agama'] ?></td>
                            <td><?= $row['asal_sekolah'] ?></td>
                            <td>
                                <a href="edit_siswa.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_siswa.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7">Tidak ada data</td>
                    </tr>
                <?php
                }
                $conn->close();
                ?>
            </tbody>
        </table>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>