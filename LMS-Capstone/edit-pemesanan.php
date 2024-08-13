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
                    <input type="hidden" name="id" value="<?php echo $pemesanan['id']; ?>">

                    <!-- NAMA -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?php echo htmlspecialchars($pemesanan['nama']); ?>" required>
                    </div>

                    <!-- No HP -->
                    <div class="mb-3">
                        <label for="nohp" class="form-label">Nomor HP/Telp</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" value="<?php echo htmlspecialchars($pemesanan['no_hp']); ?>" required>
                    </div>

                    <!-- Tanggal Pesan -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pesan</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo $pemesanan['tanggal_pesan']; ?>" required>
                    </div>

                    <!-- Waktu Pelaksanaan -->
                    <div class="mb-3">
                        <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan</label>
                        <input type="number" class="form-control" name="waktu_pelaksanaan" id="waktu_pelaksanaan" value="<?php echo $pemesanan['waktu_pelaksanaan']; ?>" required>
                    </div>

                    <!-- Layanan Paket Perjalanan -->
                    <div class="mb-3">
                        <label class="form-label">Pilihan Layanan</label>
                        <div class="form-check">
                            <input class="form-check-input layanan" type="checkbox" value="1000000" id="penginapan" name="penginapan" <?php echo $pemesanan['penginapan'] == 'ya' ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="penginapan">
                                Penginapan (Rp 1.000.000)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input layanan" type="checkbox" value="1200000" id="transportasi" name="transportasi" <?php echo $pemesanan['transportasi'] == 'ya' ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="transportasi">
                                Transportasi (Rp 1.200.000)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input layanan" type="checkbox" value="500000" id="makan" name="makan" <?php echo $pemesanan['makan'] == 'ya' ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="makan">
                                Makan (Rp 500.000)
                            </label>
                        </div>
                    </div>

                    <!-- JUMLAH -->
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Peserta</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?php echo $pemesanan['jumlah_peserta']; ?>" required>
                    </div>

                    <!-- HARGA -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Paket</label>
                        <input type="number" class="form-control" name="harga" id="harga" value="<?php echo $pemesanan['harga_paket']; ?>" readonly>
                    </div>

                    <!-- TOTAL -->
                    <div class="mb-3">
                        <label for="total" class="form-label">Total Tagihan</label>
                        <input type="number" class="form-control" name="total" id="total" value="<?php echo $pemesanan['total_tagihan']; ?>" readonly>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-primary">Hitung</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'element/footer.php'; ?>

    <script src="dist/js/bootstrap.js"></script>
    <script>
        document.querySelector('.btn-primary').addEventListener('click', function() {
            calculatePrice();
        });

        document.querySelectorAll('.layanan').forEach(function(checkbox) {
            checkbox.addEventListener('change', calculatePrice);
        });

        function calculatePrice() {
            // Mengambil nilai awal dari harga paket yang sudah dideklarasikan menggunakan PHP
            let hargaPaket = <?php echo $harga; ?>

            // Menghitung total harga berdasarkan layanan tambahan yang dipilih
            document.querySelectorAll('.layanan:checked').forEach(function(checkbox) {
                hargaPaket += parseInt(checkbox.value);
            });

            document.getElementById('harga').value = hargaPaket;

            let jumlahPeserta = parseInt(document.getElementById('jumlah').value) || 0;
            let waktuPelaksanaan = parseInt(document.getElementById('waktu_pelaksanaan').value) || 0;
            let totalTagihan = hargaPaket * jumlahPeserta * waktuPelaksanaan;

            document.getElementById('total').value = totalTagihan;
        }
    </script>
</body>

</html>