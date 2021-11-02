<?php
    $kolom = $_POST['kolom'];
    $cari = $_POST['Cari'];
    $connect = mysqli_connect("localhost","root","","db_bukuperpus");
    $hasil = mysqli_query($connect, "SELECT * FROM Buku WHERE $kolom LIKE '%$cari%'");
    $jumlah = mysqli_num_rows($hasil);
    echo "<br>";
    echo "Ditemukan: $jumlah";
    echo "<br>";
    while ($baris = mysqli_fetch($hasil)){
        echo "judul_buku    :";
        echo $baris[1];
        echo "<br>";
        echo "penulis       :";
        echo $baris[2];
        echo "<br>";
        echo "jenis_buku    :";
        echo $baris[3];
        echo "gambar_buku   :";
        echo $baris[4];
    }
?>