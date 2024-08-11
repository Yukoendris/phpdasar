<?php
// koneksi ke database
            // hostname, username, password, nama database
$db = mysqli_connect("localhost", "root", "", "phpdasar");


// ambil data atau query data dari database
//      ada 2 parameter koneksi, string query
// $result = mysqli_query( $db, "SELECT * FROM mahasiswa" );

// ambil data (fetch) mahasiswa dari object result
// msqli_fetch_row()   => mengembalikan array numerik
// msqli_fetch_assoc() => mengembalikan array associative
// msqli_fetch_array() => mengembalikan keduanya
// msqli_fetch_object() => mengembailikan object menggunakan arrow

// while($mhs = mysqli_fetch_assoc($result)){
//     var_dump($mhs);
// }

function query($query){
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data){
    global $db;
    // ambil data dari tiap elemen dalam form
    // tambahkan simpel keamanan html dengan function
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

     // query insert data
     $query = "INSERT INTO mahasiswa
                 VALUE
                ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
            ";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapus($id){
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($db);
}

function ubah($data){
    global $db;
    // ambil data dari tiap elemen dalam form
    // tambahkan simpel keamanan html dengan function
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

     // query insert data
     $query = "UPDATE mahasiswa SET
                 nama = '$nama',
                 nrp = '$nrp',
                 email = '$email',
                 jurusan = '$jurusan',
                 gambar = '$gambar'
                WHERE id = $id;
            ";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function cari($keyword){
    // global $db;
    $query = "SELECT * FROM mahasiswa
                WHERE
              nama LIKE '%$keyword%' OR
              nrp LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'    
            ";
            // LIKE adalah string query khusus untuk mencari pola tertentu dalam keyword
    return query($query);
}
?>