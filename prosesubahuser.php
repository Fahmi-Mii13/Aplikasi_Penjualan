<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include "crudBarang.php";
$username = $_POST['username'];
$password = md5($_POST['password']) ;
$nama = $_POST['nama'];
//$koneksi = koneksi();
$ubah = ubahUser($username,$password,$nama);
//$data = mysqli_query($koneksi,$ubah);
header("location:bacauser.php");
?>
</body>
</html>