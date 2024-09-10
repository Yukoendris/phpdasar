<?php
session_start(); 
// cek session
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require 'functions.php';

// ambil data di url
$id = $_GET["id"];

//  query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
   
   
    // cek apakah data berhasil ditambahkan atau tidak
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('Berhasil diubah Brok!');
                document.location.href = 'index.php';
            </script>
            ";
    }else{
        echo "
            <script>
                alert('Yahh gagal diubah Brok!');
                document.location.href = 'index.php';
            </script>
            ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data mahasiswa</title>
</head>
<body>

<h1>Masukan Perubahan Data!</h1>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"];?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"];?>">
    <ul>
        <li>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?= $mhs["nama"];?>">
        </li>
        <li>
            <label for="nrp">Nrp</label>
            <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"];?>">
        </li>
        <li>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= $mhs["email"];?>" >
        </li>
        <li>
            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"];?>">
        </li>
        <li>
            <label for="gambar">Gambar</label>
            <img src="img/<?= $mhs["gambar"];?>" width="80">
            <input type="file" name="gambar" id="gambar" ?>
        </li>
        <li>
            <button type="submit" name="submit" >Ubah!</button>
        </li>
    </ul>
</form>

</body>
</html>