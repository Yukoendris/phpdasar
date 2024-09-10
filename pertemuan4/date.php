<?php 
    // date
    // untuk menampilkan tanggal dengan format tertentu
    // echo date("D");

    // time
    // time boleh tidak memakai paarameter
    // UNIX Timestamp / EPOCH time
    // detik yg sudah berlalu sejak 1 januari 1970
    // echo time();

    // contoh cara mengetahui 100 hari lagi hari apa dari hari ini
    // echo date("l", time()+60*60*24*3);

    // mktime
    // membuat detik sendiri
    // mktime(0,0,0,0,0,0);
    // jam, menit, detik, bulan, tanggal, tahun
    // echo date("l", mktime(0,0,0,5,27,2002));

    // strtotime
    echo date("l", strtotime("27 may 2002"));



?>