<?php
require 'functions.php';
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
                <button type="submit" name="login">Login!</button>
            </li>
        </ul>
    </form>
</body>
</html>