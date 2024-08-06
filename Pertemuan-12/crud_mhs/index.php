<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
</head>

<body>
    <h2>List Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>GENDER</th>
            <th>JURUSAN</th>
            <th>ACTION</th>
        </tr>
        <?php
        include('koneksi.php');
        $mahasiswa = mysqli_query($conn, "SELECT * from mahasiswa");
        $no = 1;
        foreach ($mahasiswa as $row) {
            $jenis_kelamin = $row['jenis_kelamin'] == 'p' ? 'Perempuan' : 'Laki laki';
            echo "<tr>
<td>$no</td>
<td>" . $row['nim'] . "</td>
<td>" . $row['nama'] . "</td> <td>" . $jenis_kelamin . "</td>
<td>" . $row['jurusan'] . "</td>
<td><a href='form-edit.php?id=" . $row['id_mhs'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id_mhs'] . "'>Delete</a></td>
</tr>";
            $no++;
        }
        ?>
    </table>
</body>

</html>