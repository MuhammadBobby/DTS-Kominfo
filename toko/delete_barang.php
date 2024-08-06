<?php
include('koneksi.php');

$id = $_GET['id'];
$sql = "DELETE FROM printer WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
