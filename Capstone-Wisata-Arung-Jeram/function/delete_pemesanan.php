<?php
require 'koneksi.php'; // Pastikan koneksi database sudah benar

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query SQL untuk menghapus data
    $sql = "DELETE FROM pemesanan WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Pemesanan berhasil dihapus!');
                window.location.href = '../modifikasi-pemesanan.php';
              </script>";
    } else {
        // Pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Jika tidak ada ID yang diterima, redirect ke halaman daftar pemesanan
    echo "<script>
                alert('id pemesanan tidak ditemukan!');
                window.location.href = '../modifikasi-pemesanan.php';
              </script>";
}
