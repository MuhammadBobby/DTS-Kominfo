<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek post</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        echo "Nama: " . $_POST['nama'] . "<br>";
        echo "Alamat: " . $_POST['alamat'] . "<br>";
        echo "Tempat Lahir: " . $_POST['tempat'] . "<br>";
        echo "Jenis Kelamin: " . $_POST['jenis_kelamin'] . "<br>";
        echo "Usia: " . $_POST['usia'] . "<br>";
    } else {
        echo "Tidak ada data yang dikirim";
    }
    ?>
</body>

</html>