<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="tampilan.css">
</head>

<body>

    <h1>EDIT PRODUK</h1>

    <?php
    session_start();
    include "crudbarang.php";

    $kodeBarang = $_GET['kodeBarang'];
    $sql = "SELECT * FROM barang WHERE kodeBarang='$kodeBarang'";
    $data = bacaBarang($sql);

    echo ("<h3 class='info'>User : $_SESSION[namauser] <a href='logoutuser.php' class='btn'>Logout</a></h3><br>");
    ?>

    <center>
        <table>
            <form action="prosesubah.php" method="POST">

                <?php foreach ($data as $barang) { ?>

                    <tr>
                        <td>Kode Barang</td>
                        <td><input type="text" name="kodeBarang" value="<?= $barang['kodeBarang'] ?>" readonly /></td>
                    </tr>

                    <tr>
                        <td>Nama Barang</td>
                        <td><input type="text" name="namaBarang" value="<?= $barang['namaBarang'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Harga Barang</td>
                        <td><input type="text" name="hargaBarang" value="<?= $barang['hargaBarang'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Stok</td>
                        <td><input type="number" name="Stok" value="<?= $barang['Stok'] ?>" /></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <center><input type="submit" value="Ubah" class="btn"></center>
                        </td>
                    </tr>

                <?php } ?>

            </form>
        </table>

        <br>
        <a href="bacabarang.php" class="btn">KEMBALI</a>
        <a href="#" class="footer">@TrianandaFahmi</a>

    </center>

</body>

</html>