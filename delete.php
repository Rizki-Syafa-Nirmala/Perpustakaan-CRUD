<?php
    session_start();
    if(isset($_GET["id"])){
    include  'connect.php';

    $connection->query("DELETE FROM Buku WHERE id_buku = ".$_GET["id"]);
    }
    header("location:view.php");
    exit();
?>