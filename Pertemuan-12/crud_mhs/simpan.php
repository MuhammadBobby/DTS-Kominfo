<?php
include 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

$query = "INSERT INTO mahasiswa VALUES('$nim','', '$nama', '$jenis_kelamin', '$jurusan', '$alamat')";
mysqli_query($conn, $query);

header("location: index.php");
