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

    <div class="container form-pemesanan min-vh-100">
        <h1 class="mb-4">Daftar Pemesanan</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pemesan</th>
                    <th>Nomor HP</th>
                    <th>Tanggal Pesan</th>
                    <th>Waktu Pelaksanaan (Hari)</th>
                    <th>Penginapan</th>
                    <th>Transportasi</th>
                    <th>Makan</th>
                    <th>Jumlah Peserta</th>
                    <th>Harga Paket</th>
                    <th>Total Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    // Output data dari setiap baris
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>{$row['nama']}</td>";
                        echo "<td>{$row['no_hp']}</td>";
                        echo "<td>{$row['tanggal_pesan']}</td>";
                        echo "<td>{$row['waktu_pelaksanaan']}</td>";
                        echo "<td>{$row['penginapan']}</td>";
                        echo "<td>{$row['transportasi']}</td>";
                        echo "<td>{$row['makan']}</td>";
                        echo "<td>{$row['jumlah_peserta']}</td>";
                        echo "<td>Rp " . number_format($row['harga_paket'], 0, ',', '.') . "</td>";
                        echo "<td>Rp " . number_format($row['total_tagihan'], 0, ',', '.') . "</td>";
                        echo "<td>
                            <a href='edit-pemesanan.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='function/delete_pemesanan.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?');\">Delete</a>
                          </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12' class='text-center'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include 'element/footer.php'; ?>
</body>

</html>