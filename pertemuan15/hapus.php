<?php
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