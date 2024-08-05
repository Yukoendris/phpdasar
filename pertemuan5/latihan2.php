<?php
// pengulangan pada array
// for / foreach =>(pengulangan khusus array)

$angka = [3,2,11,21,44,555,66,8];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
    <style>
        .kotak{
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            float: left;
            margin: 3px;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <!-- count() untuk menghitung jumlah dalam array -->
    <?php for ( $i = 0; $i < count($angka); $i++ ) { ?>
    <div class="kotak"><?php echo $angka[$i]; ?></div>
    <?php } ?>

    <div class="clear"></div>
    
    <?php foreach( $angka as $a ) { ?>
        <div class="kotak"><?php echo $a; ?></div>
    <?php } ?>
        
    <div class="clear"></div>
        
    <?php foreach($angka as $a) : ?>
        <div class="kotak"><?= $a ?></div>
    <?php endforeach; ?>



</body>
</html>