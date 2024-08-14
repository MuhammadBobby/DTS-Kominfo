<?php
require 'function/koneksi.php'; // Pastikan koneksi database sudah benar

// Ambil ID pemesanan dari URL
$id = $_GET['id'];

// Query untuk mengambil data pemesanan berdasarkan ID
$sql = "SELECT * FROM pemesanan WHERE id = $id";
$result = mysqli_query($conn, $sql);
$pemesanan = mysqli_fetch_assoc($result);

// Tentukan harga awal paket
$harga = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="dist/css/style.css">
</head>

<body class="bg-form">
    <?php include 'element/navbar.php'; ?>

    <div class="container form-pemesanan mx-auto w-50">
        <div class="card border-success bg-white">
            <div class="card-header bg-success text-white">
                <h1 class="text-center">Edit Pemesanan</h1>
            </div>
            <div class="card-body">
                <form action="function/proses_edit_pemesanan.php" method="POST">
                    <!-- ID (hidden) -->
                    <input type="hidden" name="id" value="<?= $pemesanan['id']; ?>">

                    <!-- NAMA -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= htmlspecialchars($pemesanan['nama']); ?>" required>
                    </div>

                    <!-- No HP -->
                    <div class="mb-3">
                        <label for="nohp" class="form-label">Nomor HP/Telp</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" value="<?= htmlspecialchars($pemesanan['no_hp']); ?>" required>
                    </div>

                    <!-- Tanggal Pesan -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pesan</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= htmlspecialchars($pemesanan['tanggal_pesan']); ?>" required>
                    </div>

                    <!-- Paket -->
                    <div class="mb-3">
                        <label for="paket" class="form-label">Paket</label>
                        <select name="paket" id="paket" class="form-control">
                            <?php
                            $sql = 'SELECT * FROM paket';
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) :
                            ?>
                                <option value="<?= $row['id'] ?>"
                                    data-harga="<?= $row['harga_paket'] ?>"
                                    <?= $pemesanan['paket_id'] == $row['id'] ? 'selected' : '' ?>>
                                    <?= $row['nama_paket'] ?> - Rp <?= number_format($row['harga_paket'], 0, ',', '.') ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>


                    <!-- Layanan Paket Perjalanan -->
                    <div class="mb-3">
                        <label class="form-label">Pilihan Layanan</label>
                        <div class="form-check">
                            <input class="form-check-input layanan" type="checkbox" value="1000000" id="penginapan" name="penginapan" <?= $pemesanan['penginapan'] == 'ya' ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="penginapan">
                                Penginapan (Rp 1.000.000)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input layanan" type="checkbox" value="1200000" id="transportasi" name="transportasi" <?= $pemesanan['transportasi'] == 'ya' ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="transportasi">
                                Transportasi (Rp 1.200.000)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input layanan" type="checkbox" value="500000" id="makan" name="makan" <?= $pemesanan['makan'] == 'ya' ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="makan">
                                Makan (Rp 500.000)
                            </label>
                        </div>
                    </div>

                    <!-- HARGA -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Paket</label>
                        <input type="number" class="form-control" name="harga" id="harga" value="<?= $pemesanan['harga']; ?>" readonly>
                    </div>

                    <!-- TOTAL -->
                    <div class="mb-3">
                        <label for="total" class="form-label">Total Tagihan</label>
                        <input type="number" class="form-control" name="total" id="total" value="<?= $pemesanan['total_tagihan']; ?>" readonly>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update</button>
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