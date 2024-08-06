<?php
// array numerik
$mahasiswa = ["Andi", "Budi", "Caca"];
$jus = array("apel", "anggur", "mangga");
// array asosiatif
$produk = [
    "Komik" => "Naruto",
    "Game" => "Uncharted",
    "Cerita" => "One Piece"
];

// memasukkan data ke array
$mahasiswa[] = "Deni";


// menampilkan array
var_dump($mahasiswa[0]);
echo '<br><hr><br>';

// menampilkan array dengan for
for ($i = 0; $i < count($mahasiswa); $i++) {
    echo $mahasiswa[$i] . '<br>';
}
echo '<br><hr><br>';

// menampilkan array dengan foreach
foreach ($jus as $j) {
    echo $j . '<br>';
}
echo '<br><hr><br>';

// menampilkan array dngan while
$i = 0;
while ($i < count($mahasiswa)) {
    echo $mahasiswa[$i] . '<br>';
    $i++;
}
echo '<br><hr><br>';

// menghapus data array
unset($mahasiswa[1]);
echo '<pre>';
print_r($mahasiswa);
echo '</pre>';
echo '<br><hr><br>';

// menambahkan kembali
$mahasiswa[1] = "Dona";
var_dump($mahasiswa);
echo '<br><hr><br>';


// menampilkan array asosiatif
foreach ($produk as $p) {
    echo $p . '<br>';
}
echo $produk["Komik"];
echo '<br><hr><br>';


// array multidimensi
$matrik = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
echo $matrik[2][1]; //indeks baris 2 kolom 1 maka mencetak 8
echo '<br><hr><br>';

// array multidinensi dengan array asosiatif
$artikel = [
    [
        "Judul" => "Judul 1",
        "Isi" => "Isi 1"
    ],
    [
        "Judul" => "Judul 2",
        "Isi" => "Isi 2"
    ],
    [
        "Judul" => "Judul 3",
        "Isi" => "Isi 3"
    ]
];

// menampilkan array multidimensi dengan foreach
foreach ($artikel as $a) {
    echo $a["Judul"] . '<br>';
    echo $a["Isi"] . '<br>';
    echo '<hr>';
}
