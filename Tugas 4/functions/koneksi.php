<?php
$conn = mysqli_connect("localhost", "root", "", "digitalent_mahasiswa_baru");

// Memeriksa koneksi
echo "Koneksi ke database: " . $conn->host_info . "\n";
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
