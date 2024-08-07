<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">List Mahasiswa</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>GENDER</th>
                    <th>JURUSAN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('koneksi.php');
                $mahasiswa = mysqli_query($conn, "SELECT * from mahasiswa");
                $no = 1;
                foreach ($mahasiswa as $row) {
                    $jenis_kelamin = $row['jenis_kelamin'] == 'p' ? 'Perempuan' : 'Laki laki';
                    echo "<tr>
                            <td>$no</td>
                            <td>" . $row['nim'] . "</td>
                            <td>" . $row['nama'] . "</td>
                            <td>" . $jenis_kelamin . "</td>
                            <td>" . $row['jurusan'] . "</td>
                            <td>
                                <a href='form-edit.php?id=" . $row['id_mhs'] . "' class='btn btn-sm btn-primary'>Edit</a>
                                <a href='delete.php?id=" . $row['id_mhs'] . "' class='btn btn-sm btn-danger'>Delete</a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
        <div class="text-end">
            <a href="form-input.php" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>