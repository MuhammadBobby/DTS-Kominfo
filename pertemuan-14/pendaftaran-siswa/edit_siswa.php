<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM siswa WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// membuat function untuk set aktif radio button
function active_radio_button($value, $input)
{
    // apabila value dari radio sama dengan yang di input
    $result = ($value == $input) ? 'checked' : '';
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form update Pendaftaran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Update Data</h2>
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $row['nama_lengkap'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label><br>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" <?php echo active_radio_button("laki-laki", $row['jenis_kelamin']); ?>>
                        <label class="form-check-label" for="laki-laki">Laki Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" <?php echo active_radio_button("perempuan", $row['jenis_kelamin']); ?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-select" id="agama" name="agama" required>
                    <option selected value="<?= $row['agama'] ?>"><?= $row['agama'] ?></option>
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katholik">Katholik</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="asal_sekolah" class="form-label">Sekolah Asal</label>
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= $row['asal_sekolah'] ?>" required>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="lihat_siswa.php" class="btn btn-primary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>