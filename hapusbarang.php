<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include "crudBarang.php";
$id = $_GET['Id'];
$koneksi = koneksi();
$sql = "select * from detailbarang where Id = '$id'";
$hasil1 = mysqli_query($koneksi, $sql);
            foreach($hasil1 as $barang){               
                $kodeBarang = $barang['kodeBarang'];
                $namaBarang = $barang['namaBarang'];
                $hargaBarang = $barang['hargaBarang'];
                $jumlahBarang = $barang['jumlahBarang'];
}
UpdateStokTambah($kodeBarang, $namaBarang, $hargaBarang, $jumlahBarang);
hapusbarang($id);
if(hapusbarang($id)){
    
    header("location:penjualan.php");
}
else {echo"gagal hapus";}
?>

</body>
</html>