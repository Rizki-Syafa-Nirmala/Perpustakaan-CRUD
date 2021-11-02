<!DOCTYPE html>
<html>
    <head>
        <title>PERPUSTAKAAN</title>
    </head>
    <body>
        <center><h1>View Buku</h1></center>
        <hr>
        <?php
            include 'connect.php';
            $getBuku = $connection->query("SELECT * FROM Buku");
            while($fetchBuku = $getBuku->fetch_assoc()){
        ?>

        <table style="display:inline-table;width:200px">
        <tr>
        <td><img style="width:100%" src="<?=$fetchBuku["gambar_buku"]?>"></td>
        </tr>
        <tr>
            <td>
                <strong><?=$fetchBuku["judul_buku"]?></strong><br /><br />
                <strong>Penulis :<?=$fetchBuku["penulis"]?><strong><br />
                <strong>Jenis Buku :<?=$fetchBuku["jenis_buku"]?><strong><br />
            </td>
        </tr>
        <tr>
            <td>
               <a href="update.php?id=<?=$fetchBuku["id_buku"]?>"><button>Update</button></a>
               <a href="delete.php?id=<?=$fetchBuku["id_buku"]?>"><button>Delete</button></a>
            </td>
        </tr>
            </table>

        <?php
            }
        ?>

    </body>
</html>