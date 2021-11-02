<?php
    $connection = new mysqli("localhost","root","","db_bukuperpus");
    if(!$connection){
        echo "Koneksi gagal";
        exit();
    }
?>