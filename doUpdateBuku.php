<?php
    session_start();
    if(isset($_POST["judul_buku"])){
    include  'connect.php';

    $id_buku = $_POST["id"];
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
    }else{

        if(!isset($gambar_buku["tmp_name"]) && $gambar_buku["tmp_name"]!==""){
        $message    = "Gambar buku harus dipilih!";
            $filePath = "upload/".basename($gambar_buku["name"]);
            move_uploaded_file($gambar_buku["tmp_name"], $filePath);

            $connection->query("UPDATE Buku SET gambar_buku='".$filePath."' WHERE id_buku = ".$id_buku);
    }    

        $connection->query("UPDATE Buku SET judul_buku='".$judul_buku."', penulis='".$penulis."', jenis_buku='".$jenis_buku."', WHERE id_buku=".$id_buku);

        $message = "Buku berhasil diupdate!";
    }
    $_SESSION["message"] = $message;

    header("location:update.php?id=".$id_buku);
    exit();

}

header("location:insert.php");
exit();
?>