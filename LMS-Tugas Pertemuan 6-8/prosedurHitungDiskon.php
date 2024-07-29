<?php
// Membuat prosedur untuk menghitung diskon
function hitungDiskon($totalBelanja, &$diskon, &$totalBayar)
{
    // Inisialisasi diskon
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.1 * $totalBelanja;
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja;
    }

    $totalBayar = $totalBelanja - $diskon;
}

// Contoh penggunaan prosedur untuk menghitung diskon
$totalBelanja = 120000;
$diskon = 0;
$totalBayar = 0;

// Memanggil prosedur untuk menghitung diskon
hitungDiskon($totalBelanja, $diskon, $totalBayar);


echo "Total belanja: Rp. " . $totalBelanja . "<br>";
echo "Diskon: Rp. " . $diskon . "<br>";
echo "Total yang harus dibayar: Rp. " . $totalBayar . "<br>";
