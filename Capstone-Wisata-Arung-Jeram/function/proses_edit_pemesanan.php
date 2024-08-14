<?php
require 'koneksi.php'; // Pastikan koneksi database sudah benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
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
                window.location.href = '../edit-pemesanan.php?id=$id';
              </script>";
        exit();
    }


    // Query SQL untuk memperbarui data
    $sql = "UPDATE pemesanan SET 
                nama = '$nama',
                no_hp = '$no_hp',
                tanggal_pesan = '$tanggal_pesan',
                paket_id = $paket,
                penginapan = '$penginapan',
                transportasi = '$transportasi',
                makan = '$makan',
                harga = $harga,
                total_tagihan = $total_tagihan
            WHERE id = $id";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, redirect ke halaman index dengan alert
        echo "<script>
                alert('Pemesanan berhasil diperbarui!');
                window.location.href = '../modifikasi-pemesanan.php';
              </script>";
    } else {
        echo "<script>
                alert('Pemesanan Gagal diperbarui!');
                window.location.href = '../modifikasi-pemesanan.php';
              </script>";
    }

    mysqli_close($conn);
}
