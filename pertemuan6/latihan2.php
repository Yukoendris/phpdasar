<?php
// array associative
// key-nya adalah string yg kita buat sendiri

$mahasiswa = [
    [
        "nama" => "yuko",
        "nrp" => "09776",
        "email" => "blajf@gmail.com",
        "jurusan" => "teknik informatika"
    ],
    [
        "nama" => "yayat",
        "nrp" => "09998",
        "email" => "jsjsf@gmail.com",
        "jurusan" => "teknin industri"
    ],
];

echo $mahasiswa [1]["jurusan"];
?>