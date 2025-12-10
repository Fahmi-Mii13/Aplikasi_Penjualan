<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include "crudbarang.php";
$username = $_GET['username'];
$delete = hapusUser($username);
$koneksi = koneksi();
$data =  mysqli_query($koneksi,$delete);
if($data){header("location:bacauser.php");}
else {echo"gagal hapus";}
?>
</body>
</html>