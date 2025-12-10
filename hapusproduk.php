<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include "crudBarang.php";
$kodeBarang = $_GET['kodeBarang'];
$delete = hapusproduk($kodeBarang);
$koneksi = koneksi();
$data =  mysqli_query($koneksi,$delete);
header("location:bacaBarang.php");
//else {echo"gagal hapus";}
?>
</body>
</html>