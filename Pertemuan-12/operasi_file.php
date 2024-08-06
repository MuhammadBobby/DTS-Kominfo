<?php
// // buka file
// $handle = fopen("test.txt", "r");

// // baca file
// echo fgets($handle) . "<br>";

// // menutup file
// fclose($handle);


// tingkat lanjut
$bukafile = fopen("test.txt", "r");

if (!$bukafile) {
    echo "File tidak ditemukan";
    exit;
}

// baca file
while (!feof($bukafile)) {
    echo fgets($bukafile) . "<br>";
}

fclose($bukafile);
