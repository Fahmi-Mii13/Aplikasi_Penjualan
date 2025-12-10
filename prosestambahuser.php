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
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$role = $_POST['role'];
$tambah = tambahUser($username,$password,$nama,$role);
//$data = mysqli_query($koneksi,$tambah);
header("location:bacauser.php");
?>
</body>
</html>