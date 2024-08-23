<?php
session_start();
require 'functions.php';
// cek cookie
if(isset( $_COOKIE['nama']) && isset($_COOKIE['key']) ){
    $id = $_COOKIE['nama'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($db, "SELECT * FROM users WHERE id = '$id'");
    mysqli_fetch_assoc($result);
    
    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }


}
// cek session
if(isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}


// cek tombol apakah sudah dipencet atau belum
if(isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

        // parameter pertama adalah nama database yg mau dicek, kedua adalah sting querynya
    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify( $password, $row["password"]) ){

            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if(isset($_POST['remember'])){
                // set cookie
                setcookie('nama', $row['id'], time()+60); 
                setcookie('key', hash('sha256', $row['username']), time()+60); 
            }

            header("location: index.php");
            exit;
        }
    }
    $error = true;

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login.</h1>
    <?php if(isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username/Password Salah!</p>
    <?php endif; ?>
    
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" style="font-weight: bold;">Remember Me</label>
            </li>
            <li>
                <button type="submit" name="login">Login!</button>
            </li>
        </ul>
    </form>
</body>
</html>