<?php
require 'function/koneksi.php'; // Pastikan koneksi database sudah benar

// Ambil data pemesanan dari database
$sql = "SELECT * FROM pemesanan";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifikasi Pemesanan</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <!-- mycss -->
    <link rel="stylesheet" href="dist/css/style.css">
</head>

<body>
    <?php include 'element/navbar.php'; ?>

    <div class="container form-pemesanan min-vh-100 overflow-x-hidden">
        <div class="row mx-3">
            <div class="col-6 col-md-3 mt-3">
                <img src="dist/images/paketSmall.jpg" alt="Paket Small" class="w-100 h-75 object-fit-cover rounded-3 shadow-lg">
            </div>
            <div class="col-6 col-md-3 mt-3">
                <img src="dist/images/paketMedium.jpg" alt="Paket Medium" class="w-100 h-75 object-fit-cover rounded-3 shadow-lg">
            </div>
            <div class="col-6 col-md-3 mt-3">
                <img src="dist/images/paketParty.jpg" alt="Paket Party" class="w-100 h-75 object-fit-cover rounded-3 shadow-lg">
            </div>
            <div class="col-6 col-md-3 mt-3">
                <img src="dist/images/tentang.jpg" alt="Arung Jeram" class="w-100 h-75 object-fit-cover rounded-3 shadow-lg">
            </div>
        </div>



        <h1 class="mb-4 mx-3">Daftar Pemesanan</h1>

        <div class="table-responsive mx-3">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="bg-dark text-white">ID</th>
                        <th class="bg-dark text-white">Nama Pemesan</th>
                        <th class="bg-dark text-white">Nomor HP</th>
                        <th class="bg-dark text-white">Tanggal Pesan</th>
                        <th class="bg-dark text-white">Paket</th>
                        <th class="bg-dark text-white">max. Pengunjung</th>
                        <th class="bg-dark text-white">Penginapan</th>
                        <th class="bg-dark text-white">Transportasi</th>
                        <th class="bg-dark text-white">Makan</th>
                        <th class="bg-dark text-white">Harga Paket</th>
                        <th class="bg-dark text-white">Total Tagihan</th>
                        <th class="bg-dark text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (mysqli_num_rows($result) > 0) {
                        // Output data dari setiap baris
                        while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                            <tr class="text-center text-capitalize">
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['no_hp'] ?></td>
                                <td><?= date_format(new DateTime($row['tanggal_pesan']), 'd M Y') ?></td>

                                <?php
                                $paket_id = $row['paket_id'];
                                $sql_paket = "SELECT * FROM paket WHERE id = $paket_id";
                                $result_paket = mysqli_query($conn, $sql_paket);
                                $row_paket = mysqli_fetch_assoc($result_paket);
                                ?>
                                <td class="fw-bold"><?= $row_paket['nama_paket'] ?></td>
                                <td><?= $row_paket['max_orang'] ?></td>

                                <td><?= $row['penginapan'] ?></td>
                                <td><?= $row['transportasi'] ?></td>
                                <td><?= $row['makan'] ?></td>
                                <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($row['total_tagihan'], 0, ',', '.') ?></td>
                                <td class="d-flex justify-content-center gap-1">
                                    <a href="edit-pemesanan.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="function/delete_pemesanan.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                    <?php
                        endwhile;
                    } else {
                        echo "<tr><td colspan='12' class='text-center'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'element/footer.php'; ?>

    <script src="dist/js/bootstrap.js"></script>
</body>

</html>