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
?>