<?php
// variabel super global
// di php ada 7
// yg dibahas
// $_GET mengirim data menggunakan url
// $_POST
// $_SESSION
// $_COOKIE

// var_dump($_SERVER);

// var_dump($_GET);
$mahasiswa = [
    [
        "nama" => "yuko",
        "nrp" => "09776",
        "email" => "blajf@gmail.com",
        "jurusan" => "teknik informatika",
        "gambar" => "yuko.jpg"
    ],
    [
        "nama" => "yayat",
        "nrp" => "09998",
        "email" => "jsjsf@gmail.com",
        "jurusan" => "teknin industri",
        "gambar" => "yayat.jpg"
    ],
];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
    <style>
        img{
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body>
    <h1>data mahasiswa</h1>
    <ul>
        <?php foreach( $mahasiswa as $mhs ) : ?>
            <li>
                <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"];?>&email=<?= $mhs["email"];?>&jurusan=<?= $mhs["jurusan"];?>&gambar=<?= $mhs["gambar"];?>"><?= $mhs["nama"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    
</body>
</html>