<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
</head>

<body>
    <h2>Form Input Barang</h2>
    <form action="proses_input.php" method="POST">
        <br>
        <label for="nama_merek">Nama Merek:</label><br>
        <input type="text" name="nama_merek" id="nama_merek"><br>

        <br>
        <label for="jumlah">Jumlah :</label><br>
        <input type="text" name="jumlah" id="jumlah"><br>

        <br>
        <label for="warna">Warna:</label><br>
        <input type="text" name="warna" id="warna"><br>

        <br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>