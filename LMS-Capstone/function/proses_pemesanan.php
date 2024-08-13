<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data dari form
  $nama = $_POST['nama'];
  $no_hp = $_POST['nohp'];
  $tanggal_pesan = $_POST['tanggal'];
  $waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
  $penginapan = isset($_POST['penginapan']) ? 'ya' : 'tidak';
  $transportasi = isset($_POST['transportasi']) ? 'ya' : 'tidak';
  $makan = isset($_POST['makan']) ? 'ya' : 'tidak';
  $jumlah_peserta = $_POST['jumlah'];
  $harga_paket = $_POST['harga'];
  $total_tagihan = $_POST['total'];

  // Query SQL untuk menyimpan data
  $sql = "INSERT INTO pemesanan (nama, no_hp, tanggal_pesan, waktu_pelaksanaan, penginapan, transportasi, makan, jumlah_peserta, harga_paket, total_tagihan)
            VALUES ('$nama', '$no_hp', '$tanggal_pesan', $waktu_pelaksanaan, '$penginapan', '$transportasi', '$makan', $jumlah_peserta, $harga_paket, $total_tagihan)";


  // Eksekusi query
  if (mysqli_query($conn, $sql)) {
    // Jika berhasil, redirect ke halaman index dengan alert
    echo "<script>
                alert('Pemesanan berhasil disimpan!');
                window.location.href = '../modifikasi-pemesanan.php';
              </script>";
  } else {
    echo "<script>
                alert('Pemesanan Gagal!');
                window.location.href = '../modifikasi-pemesanan.php';
              </script>";
  }
}
