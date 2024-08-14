<?php
require 'function/koneksi.php';

$paket = $_GET['paket'];
$harga = 0;

if ($paket == 'small') {
    $harga = 900000;
} elseif ($paket == 'medium') {
    $harga = 1000000;
} elseif ($paket == 'large') {
    $harga = 1100000;
}


$sql = 'SELECT * FROM paket';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <!-- mycss -->
    <link rel="stylesheet" href="dist/css/style.css">
</head>

<body class="bg-form">
    <?php include 'element/navbar.php'; ?>

    <div class="container form-pemesanan mx-auto w-50">
        <div class="card border-success bg-white">
            <div class="card-header bg-success text-white">
                <h1 class="text-center">Form Pemesanan</h1>
            </div>
            <div class="card-body">
                <form action="function/proses_pemesanan.php" method="POST">
                    <input type="hidden" name="nama_paket" value="<?= $paket ?>">
                    <!-- NAMA -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>

                    <!-- No HP -->
                    <div class="mb-3">
                        <label for="nohp" class="form-label">Nomor HP/Telp</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" required>
                    </div>

                    <!-- Tanggal Pesan -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pesan</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>

                    <!-- Paket -->
                    <div class="mb-3">
                        <label for="paket" class="form-label">Paket</label>
                        <select name="paket" id="paket" class="form-control">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) :
                            ?>
                                <option value="<?= $row['id'] ?>"
                                    data-harga="<?= $row['harga_paket'] ?>"
                                    <?= $paket == $row['nama_paket'] ? 'selected' : '' ?>>
                                    <?= $row['nama_paket'] ?> - Rp <?= number_format($row['harga_paket'], 0, ',', '.') ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <!-- Layanan Paket Perjalanan -->
                    <div class="mb-3">
                        <label class="form-label">Pilihan Layanan</label>
                        <div class="form-check">
                            <input class="form-check-input layanan" type="checkbox" value="1000000" id="penginapan" name="penginapan">
                            <label class="form-check-label" for="penginapan">
                                Penginapan (Rp 1.000.000)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input layanan" type="checkbox" value="1200000" id="transportasi" name="transportasi">
                            <label class="form-check-label" for="transportasi">
                                Transportasi (Rp 1.200.000)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input layanan" type="checkbox" value="500000" id="makan" name="makan">
                            <label class="form-check-label" for="makan">
                                Makan (Rp 500.000)
                            </label>
                        </div>
                    </div>


                    <!-- HARGA -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Paket</label>
                        <input type="number" class="form-control" name="harga" id="harga" value="<?= $harga ?>" readonly>
                    </div>

                    <!-- TOTAL -->
                    <div class="mb-3">
                        <label for="total" class="form-label">Total Tagihan</label>
                        <input type="number" class="form-control" name="total" id="total" value="0" readonly>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include 'element/footer.php'; ?>


    <script src="dist/js/bootstrap.js"></script>
    <script src="dist/js/form_pemesanan.js"></script>
</body>

</html>