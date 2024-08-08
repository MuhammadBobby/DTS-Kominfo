<?php
include 'koneksi.php';

$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$asal_sekolah = $_POST['asal_sekolah'];

// simpan
$sql = "INSERT INTO siswa VALUES('', '$nama_lengkap', '$alamat', '$jenis_kelamin', '$agama', '$asal_sekolah')";

if ($conn->query($sql) === TRUE) {
    header("location: lihat_siswa.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
