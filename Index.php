<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Aplikasi Penjualan</title>
	<link href='tampilan.css' rel='stylesheet' type='text/css'>
</head>
<?php
session_start();
include "crudBarang.php";
if (!isset($_SESSION['username'])) {
	echo "<script>alert('Masukan Username/Password terlebih dahulu')</script>";
	echo "<script> window.location = 'Login.php' </script>";
}
?>

<body>

	<link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>

	<h1>Aplikasi Penjualan</h1>

	<a href="#" class="btn">Home</a>

	<?php if ($role == "operator") {
		echo ("<a href='penjualan.php' class='btn'>Penjualan </a>");
	}
	?>
	&nbsp;
	<?php if ($role == "admin" || $role == "superadmin") {
		echo ("<a href='rekampenjualan.php' class='btn'>Riwayat Penjualan</a>");
	}
	?>
	&nbsp;
	<?php if ($role == "admin" || $role == "superadmin") {
		echo ("<a href='bacaBarang.php' class='btn'>Daftar Produk </a>");
	}
	?>
	&nbsp;
	<?php if ($role == "admin" || $role == "superadmin") {
		echo ("<a href='bacauser.php' class='btn'> Daftar User </a>");
	}
	?>
	<h2><?php echo "Selamat Datang, " . $_SESSION['namauser'] . "!" . " | Hak Akses : " . $_SESSION['role']; ?> </h2>
	<br><a href="logoutuser.php" class="btn">Logout</a>
	<a href="#" class="footermenu">@TrianandaFahmi</a>

</body>

</html>