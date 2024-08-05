<?php 
// array multi dimensi

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array multi dimensi</title>
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

    </style>
</head>
<body>
    
<?php 
$angka = [
    [1,2,3], 
    [4,5,6], 
    [7,8,9]
];
?>
<?php foreach($angka as $mother) :?>
    <?php foreach($mother as $child) : ?>
    <div class="kotak"><?= $child ?></div>
    <?php endforeach; ?>
<?php endforeach; ?>



</body>
</html>