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
$namaBarang = ($_POST['namaBarang']);
$hargaBarang = $_POST['hargaBarang'];
$Stok = $_POST['Stok'];
$tambah = tambahBarang($kodeBarang,$namaBarang,$hargaBarang,$Stok);
//$data = mysqli_query($koneksi,$tambah);
echo "<script>alert('Tambah Produk Berhasil')</script>";
header("location:bacaBarang.php");
?>
</body>
</html>