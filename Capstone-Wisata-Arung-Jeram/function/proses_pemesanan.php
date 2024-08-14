<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data dari form
  $nama = $_POST['nama'];
  $no_hp = $_POST['nohp'];
  $tanggal_pesan = $_POST['tanggal'];
  $paket = $_POST['paket'];
  $penginapan = isset($_POST['penginapan']) ? 'ya' : 'tidak';
  $transportasi = isset($_POST['transportasi']) ? 'ya' : 'tidak';
  $makan = isset($_POST['makan']) ? 'ya' : 'tidak';
  $jumlah_peserta = $_POST['jumlah'];
  $harga = $_POST['harga'];
  $total_tagihan = $_POST['total'];
  $nama_paket = $_POST['nama_paket'];

  // validasi tanggal
  $tanggalInputObj = new DateTime($tanggal_pesan);
  $tanggalSekarang = new DateTime();

  // Bandingkan tanggal input dengan tanggal hari ini
  if ($tanggalInputObj < $tanggalSekarang) {
    echo "<script>
                alert('Input tanggal tidak valid!');
                window.location.href = '../form-pemesanan.php?paket=$nama_paket';
              </script>";
    exit();
  }

  // Query SQL untuk menyimpan data
  $sql = "INSERT INTO pemesanan (nama, no_hp, tanggal_pesan, paket_id, penginapan, transportasi, makan, harga, total_tagihan)
            VALUES ('$nama', '$no_hp', '$tanggal_pesan', $paket, '$penginapan', '$transportasi', '$makan', $harga, $total_tagihan)";


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
