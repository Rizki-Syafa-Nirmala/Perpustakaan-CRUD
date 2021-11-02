<?php
    session_start();
    if(isset($_POST["judul_buku"])){
    include  'connect.php';

    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $jenis_buku = $_POST['jenis_buku'];
    $gambar_buku = $_FILES['gambar_buku'];

    $message        = "";

    if($judul_buku==""){
        $message    = "Judul buku harus di isi!";
    }else if($penulis==""){
        $message    = "Penulis harus di isi!";
    }else if($jenis_buku==""){
        $message    = "Jenis buku harus di isi!";
    }else if(!isset($gambar_buku["tmp_name"]) || $gambar_buku["tmp_name"]==""){
        $message    = "Gambar buku harus dipilih!";
    }else{
        
        $filePath = "upload/".basename($gambar_buku["name"]);
        move_uploaded_file($gambar_buku["tmp_name"], $filePath);

        $connection->query("INSERT INTO Buku VALUES (null, '".$judul_buku."' , '".$penulis."' , '".$jenis_buku."' , '".$filePath."')");

        $message = "Buku berhasil ditambahkan!";
    }
    $_SESSION["message"] = $message;
}

header("location:insert.php");
exit();
?>