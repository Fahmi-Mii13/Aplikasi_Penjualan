<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include "crudBarang.php";
$kodeBarang = $_POST['kodeBarang'];
$namaBarang = $_POST['namaBarang'];
$hargaBarang = $_POST['hargaBarang'];
$Stok = $_POST['Stok'];
$ubah = ubahproduk($kodeBarang,$namaBarang,$hargaBarang,$Stok);
//$data = mysqli_query($koneksi,$tambah);
echo "<script>alert('Edit Barang Berhasil')</script>";
header("location:bacaBarang.php");
?>
</body>
</html>