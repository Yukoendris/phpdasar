<?php
session_start(); 
// cek session
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require 'functions.php';
// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
   
   

    // cek apakah data berhasil ditambahkan atau tidak
                            // if(mysqli_affected_rows($db)>0){
                            //     echo "berhasil!";
                            // }else{
                            //     echo "gagal";
                            //     echo "<br>";
                            //     echo mysqli_error($db);
                            // };
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('Berhasil Brok!');
                document.location.href = 'index.php';
            </script>
            ";
    }else{
        echo "
            <script>
                alert('Yahh gagal Brok!');
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
    <title>Tambah Data Baru!</title>
</head>
<body>

<h1>Masukan Data Baru!</h1>
<!-- attribute enctype untuk mengelola file -->
<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </li>
        <li>
            <label for="nrp">Nrp</label>
            <input type="text" name="nrp" id="nrp">
        </li>
        <li>
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
        </li>
        <li>
            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan">
        </li>
        <li>
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit" >Tambah!</button>
        </li>
    </ul>
</form>

</body>
</html>