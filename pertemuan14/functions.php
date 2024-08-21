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

    // upload gambar
    $gambar = upload();
    if( !$gambar ){
        return false;
    }

     // query insert data
     $query = "INSERT INTO mahasiswa
                 VALUE
                ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
            ";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFIle = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah ada gambar yg diupload
    if($error === 4){
        echo "<script>
            alert('silahkan upload gambar!');
            </script>";
        return false;
    }

    // cek apakah yg diupload file gambar atau bukan 
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiValid)){
        echo "<script>
            alert('file harus berbentuk foto!');
            </script>";
        return false;
    }

    // cek jika ukuran file terlalu besar
    if($ukuranFIle > 1000000){
        echo "<script>
            alert('ukuran file harus dibawah 1 mb!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
    return $namaFileBaru;

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
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    
    // cek apakah user pilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4 ){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

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

function regis($data){
    global $db;

    // ambil data yg dikirimkan user
    $username = strtolower(stripslashes($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($db, $data["password"]);
    $confirmPassword = mysqli_real_escape_string($db, $data["conpass"]);

    // cek username sudak ada atau belum
    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");

    if( empty(trim($username)) ){
        return false;
    }

    if(mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Username sudah terdaftar!');
            </script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $confirmPassword ){
        echo "<script>
            alert('Password tidak sesuai!');
            </script>";
        return false;
    }

    // enkripsi password
                    // variabel password, algoritma yg ingin dipakai
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan data ke database
    mysqli_query($db, "INSERT INTO users VALUES('', '$username', '$email', '$password')");

    return mysqli_affected_rows($db);
}
?>