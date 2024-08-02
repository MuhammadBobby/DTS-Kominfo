<?php
function hitung_umur($tahun_lahir)
{
    $thn_sekarang = date("Y");
    $umur = $thn_sekarang - $tahun_lahir;
    return $umur;
}

$umur = hitung_umur(2004);

echo "Umur Saya : " . $umur . " Tahun";
