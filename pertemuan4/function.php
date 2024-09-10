<?php
//  if ( $waktu >= 5 && $waktu <= 11 ) {
//     echo "Pagi";
// } else if ( $waktu >= 12 && $waktu <= 18 ) {
//     echo "Siang";
// } else if ( $waktu >= 19 || $waktu <= 4 ) {
//     echo "Malam";
// }
function salam($waktu = "pagi", $nama = "admin") {
    $waktu = date('G');
    if ( $waktu >= 5 && $waktu <= 11 ) {
         $waktu = "Pagi";
    } else if ( $waktu >= 12 && $waktu <= 18 ) {
         $waktu = "Siang";
    } else if ( $waktu >= 19 || $waktu <= 4 ) {
         $waktu = "Malam";
    };
    return "Selamat $waktu, $nama!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan function</title>
</head>
<body>
    <h1><?= salam(); ?></h1>
</body>
</html>