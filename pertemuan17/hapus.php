<?php
session_start(); 
// cek session
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require 'functions.php';

$id = $_GET["id"];

if(hapus($id) > 0 ){
    echo "
            <script>
                alert('Udh Diapus Brok!');
                document.location.href = 'index.php';
            </script>
            ";
}else{
    echo "
        <script>
            alert('Gagal Dihapus Brok!');
            document.location.href = 'index.php';
        </script>
            ";
}


?>