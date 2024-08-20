<?php

require 'functions.php';

// cek jika tombol register sudah ditekan
if(isset($_POST["register"])){

    if(regis($_POST) > 0){
        echo "
            <script>
                alert('Registrasi Berhasil');
                document.location.href = 'registrasi.php';
            </script>
            ";
    }else {
        echo mysqli_error($db);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
</head>
<body>
    <h1>Register Here.</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="conpass">Confirm Password</label>
                <input type="password" name="conpass" id="conpass">
            </li>
            <li>
                <button type="submit" name="register">Register!</button>
            </li>
        </ul>
    </form>
</body>
</html>