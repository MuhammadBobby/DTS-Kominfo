<?php
include('koneksi.php');
$id = $_POST['id'];

// update
if (isset($_POST['submit'])) {
    $nama_merek = $_POST['nama_merek'];
    $jumlah = $_POST['jumlah'];
    $warna = $_POST['warna'];

    $sql = "UPDATE printer SET nama_merek='$nama_merek', jumlah='$jumlah', warna='$warna' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("location: index.php?status=update");
    } else {
        var_dump("Error updating record: " . $conn->error);
    }
}
