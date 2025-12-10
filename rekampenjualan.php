<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Riwayat Penjualan</title>
    <link rel="stylesheet" href="tampilan.css">
</head>

<body>
    <?php
    session_start();
    include "crudBarang.php";

    if ($role == "operator") {
        echo "<script>alert('Hak akses anda kurang')</script>";
        echo "<script> window.location='index.php' </script>";
        exit;
    }
    ?>

    <center>
        <h2>Riwayat Penjualan</h2>

        <?php
        echo ("<h3 class='info'>User : $_SESSION[namauser] <a href='logoutuser.php' class='btn'>LOGOUT</a></h3>");
        ?>

        <?php
        $koneksi = koneksi();

        $sql = "SELECT * FROM penjualan ORDER BY idPenjualan DESC";
        $hasil = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($hasil) == 0) {
            echo "<p>Tidak ada data penjualan.</p>";
        } else {
        ?>
            <table border="1">
                <tr>
                    <th>ID Penjualan</th>
                    <th>Tanggal</th>
                    <th>Username</th>
                    <th>Total</th>
                    <th>Detail Barang</th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($hasil)) {

                    $id = $row['idPenjualan'];
                    $tanggal = $row['tanggalPenjualan'];
                    $username = $row['username'];
                    $total = $row['total'];

                    $detail = mysqli_query(
                        $koneksi,
                        "SELECT * FROM detailpenjualan WHERE idPenjualan='$id'"
                    );
                ?>

                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo rupiah($total); ?></td>

                        <td>
                            <table border="1" style="font-size: 11px;">
                                <tr>
                                    <th>Kode</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>

                                <?php
                                while ($d = mysqli_fetch_assoc($detail)) {
                                    $sub = $d['harga'] * $d['jumlah'];
                                    echo "
                <tr>
                    <td>{$d['kodeBarang']}</td>
                    <td>" . rupiah($d['harga']) . "</td>
                    <td>{$d['jumlah']}</td>
                    <td>" . rupiah($sub) . "</td>
                </tr>";
                                }
                                ?>
                            </table>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </table>

        <?php
        }
        ?>

        <br>
        <a href="index.php" class="btn">KEMBALI</a>
        <a href="#" class="footeruser">@TrianandaFahmi</a>
    </center>

</body>

</html>