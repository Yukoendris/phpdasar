<?php 
// $mahasiswa = [ "yuko", "19874892", "teknik informatika", "hsjefh@gmail.com" ]

// array multi dimensi (array didalam array)
$mahasiswa = [[ "yuko", "19874892", "teknik informatika", "hsjefh@gmail.com"],
            ["endri", "19378173", "teknik informatika", "ajhfjbf@gmail.com"]];


?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan3</title>
</head>
<body>
    <h1>data mahasiswa</h1>
    <?php foreach($mahasiswa as $mhs): ?>
    <ul>
        <li><?php echo $mhs[0]; ?></li>
        <li><?php echo $mhs[1]; ?></li>
        <li><?php echo $mhs[2]; ?></li>
        <li><?php echo $mhs[3]; ?></li>
    </ul>
    <?php endforeach ?>
</body>
</html>