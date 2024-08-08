<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM siswa WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("location: lihat_siswa.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
