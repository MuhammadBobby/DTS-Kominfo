<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM mahasiswa WHERE id_mhs=$id";

mysqli_query($conn, $query);
header("location: index.php");
