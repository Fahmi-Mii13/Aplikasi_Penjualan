<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="tampilan   .css">
</head>

<body>
    <h1>TAMBAH PRODUK</h1>
    <?php
    session_start();
    include "crudBarang.php";
    if ($role == "operator") {
        echo "<script>alert('Hak Akses anda tidak sesuai')</script>";
        echo "<script> window.location = 'index.php' </script>";
    } else {
        echo ("<h3 class='info'>User : $_SESSION[namauser]  <a href='logoutuser.php' class='btn'>Logout</a></h3><br>");

    ?>
        <center>
            <table>
                <form action="prosestambah.php" method="POST">
                    <tr>
                        <td>Kode Barang</td>
                        <td><input type="text" name="kodeBarang" /></td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td><input type="text" name="namaBarang" /></td>
                    </tr>
                    <tr>
                        <td>Harga Barang</td>
                        <td><input type="text" name="hargaBarang" /></td>
                    </tr>
                    <tr>
                        <td>Stok Barang</td>
                        <td><input type="number" name="Stok" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Tambah" /></td>
                    </tr>
                </form>
            </table>
            <br><br><a href="bacabarang.php" class="btn">KEMBALI</a>
            <a href="#" class="footer">@TrianandaFahmi</a>
        </center>
    <?php } ?>
</body>

</html>