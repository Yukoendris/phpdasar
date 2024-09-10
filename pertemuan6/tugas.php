<?php 
// jualan mobil dot com


// array mobil yg dijual
$mobilbekas = [
    [
     "nama" => "creta prime",
     "merk" => "hyundai",
     "tahun-produksi" => "2023",
     "kilometer" => "12.000",
     "harga" => "289 jt",
     "gambar" => "creta.jpg"
    ],
    [
     "nama" => "innova G",
     "merk" => "toyota",
     "tahun-produksi" => "2019",
     "kilometer" => "100.000",
     "harga" => "312 jt",
     "gambar" => "innova.jpg"
    ],
    [
     "nama" => "city hach",
     "merk" => "honda",
     "tahun-produksi" => "2022",
     "kilometer" => "67.000",
     "harga" => "299 jt",
     "gambar" => "city.jpg"
    ],
    [
     "nama" => "fortuner",
     "merk" => "toyota",
     "tahun-produksi" => "2021",
     "kilometer" => "212.000",
     "harga" => "300 jt",
     "gambar" => "fortuner.jpg"
    ],
    [
     "nama" => "brio RS",
     "merk" => "honda",
     "tahun-produksi" => "2020",
     "kilometer" => "222.000",
     "harga" => "119 jt",
     "gambar" => "brio.jpg"
    ],
    [
     "nama" => "march",
     "merk" => "nissan",
     "tahun-produksi" => "2016",
     "kilometer" => "219.000",
     "harga" => "160 jt",
     "gambar" => "march.jpg"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mobil murah</title>
</head>
<body>
    <h1>MOBIL BEKAS BERKUALITAS!</h1>
    <?php foreach($mobilbekas as $dijual) : ?>
        <ul>
                <!-- jika mencari data spesifik gunakan dua kurung kotak [][] -->
                <li>Nama :<?=$dijual["nama"]; ?></li>
                <li>Merk :<?=$dijual["merk"]; ?></li>
                <li>Tahun produksi :<?=$dijual["tahun-produksi"]; ?></li>
                <li>Kilometer :<?=$dijual["kilometer"]; ?></li>
                <li>Harga :<?=$dijual["harga"]; ?></li>

        </ul>
    <?php endforeach; ?>
</body>
</html>