<?php
require 'koneksi.php';

// Mengambil data dari form input
$nama_merek = $_POST['nama_merek'];
$jumlah = $_POST['jumlah'];
$warna = $_POST['warna'];

// Memasukkan data ke database
$sql = "INSERT INTO printer (nama_merek, jumlah, warna) VALUES ('$nama_merek', '$jumlah', '$warna')";


if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan<br>";
    echo "<a href='input_barang.php'>Input Data Lagi</a><br>";
    echo "<a href='tampil_barang.php'>Lihat Data</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
