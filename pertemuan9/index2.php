<?php
// koneksi ke database
            // hostname, username, password, nama database
$db = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data atau query data dari database
// 
$result = mysqli_query( $db, "SELECT * FROM mahasiswa" );

// ambil data (fetch) mahasiswa dari object result
// msqli_fetch_row()   => mengembalikan array numerik
// msqli_fetch_assoc() => mengembalikan array associative
// msqli_fetch_array() => mengembalikan keduanya
// msqli_fetch_object() => mengembailikan object menggunakan arrow

// while($mhs = mysqli_fetch_assoc($result)){
//     var_dump($mhs);
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0" >
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $i++; ?></td>
            <td>
                <a href="">Ubah</a> | 
                <a href="">Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="60" ></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php endwhile; ?>
        
    </table>

</body>
</html>