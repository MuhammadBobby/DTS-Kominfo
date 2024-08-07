<?php
include 'koneksi.php';
$id = $_GET['id'];
$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mhs='$id'");
$row = mysqli_fetch_array($mahasiswa);

// membuat data jurusan menjadi dinamis dalam bentuk array
$jurusan = array('TEKNIK INFORMATIKA', 'TEKNIK ELEKTRO', 'REKAMEDIS');

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
    <title>Update Data Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Form Edit Data Mahasiswa</h2>
        <form method="post" action="update.php">
            <input type="hidden" value="<?php echo $row['id_mhs']; ?>" name="id_mhs">
            <div class="row mb-3">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $row['nim']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="l" <?php echo active_radio_button("l", $row['jenis_kelamin']); ?>>
                        <label class="form-check-label" for="laki-laki">Laki Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="p" <?php echo active_radio_button("p", $row['jenis_kelamin']); ?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <select class="form-select" id="jurusan" name="jurusan">
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?php echo $j; ?>" <?php echo ($row['jurusan'] == $j) ? 'selected' : ''; ?>><?php echo $j; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary" value="simpan">SIMPAN PERUBAHAN</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>