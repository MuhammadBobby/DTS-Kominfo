<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$asal_sekolah = $_POST['asal_sekolah'];

// update
$sql = "UPDATE siswa SET nama_lengkap = '$nama_lengkap', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', agama = '$agama', asal_sekolah = '$asal_sekolah' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("location: lihat_siswa.php");
    exit;
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
