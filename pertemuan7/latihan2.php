<?php 
// cek apakah tidak ada data di $_GET
if( !isset($_GET["nama"])||
    !isset($_GET["gambar"])||
    !isset($_GET["nrp"])||
    !isset($_GET["email"])||
    !isset($_GET["jurusan"])
) {
    // redirect = menolak request paksa user
    header("Location: latihan1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail mahasiswa</title>
    <style>
        img{
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body>

<ul>
    <li><img src="img/<?=$_GET["gambar"];?>"></li>
    <li><?= $_GET["nama"]; ?></li>
    <li><?= $_GET["nrp"]; ?></li>
    <li><?= $_GET["email"]; ?></li>
    <li><?= $_GET["jurusan"]; ?></li>
</ul>
<a href="latihan1.php">kembali <<</a>
</body>
</html>