<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Daftar Barang</title>
	<link rel="stylesheet" href="tampilan.css">
</head>

<body>
	<?php
	session_start();
	include('crudBarang.php');
	if ($role == "operator") {
		echo "<script>alert('Hak Akses anda kurang')</script>";
		echo "<script> window.location.replace('index.php') </script>";
	} else

	?>
	<h2>Daftar Barang</h2>

	<?php
echo ("<h3 class='info'>User : $_SESSION[namauser] <a href='logoutuser.php' class='btn'>LOGOUT</a></h3><br> ");
$sql = "SELECT * from barang";
$data = bacaBarang($sql);
if ($data == null) {
	echo "Record tidak ditemukan";
}
	?>
	</a><?php if ($role == "admin" || $role == "superadmin") {
			echo "<a href='tambahbarang.php' class='btn'><b>Tambah</b></a>";
		} ?>
	<center><b>
			<table style="margin: 30px;">

				<tr>
					<th>Kode barang</th>
					<th>Nama barang</th>
					<th>Harga barang</th>
					<th>Stok</th>
					<?php if ($role == "superadmin") {
						echo "<th>Aksi</th>";
					} ?>
				</tr>
				<?php
				foreach ($data as $barang) {
					$kodeBarang = $barang['kodeBarang'];
					$namaBarang = $barang['namaBarang'];
					$hargaBarang = rupiah($barang['hargaBarang']);
					$Stok = $barang['Stok'];

					echo "
		<tr>
			<td>$kodeBarang</td>
			<td>$namaBarang</td>
			<td>$hargaBarang</td>
			<td>$Stok</td>";
					if ($role == "superadmin") {
						echo "
			<td><a href = 'hapusproduk.php?kodeBarang=$barang[kodeBarang]';> Hapus </a>
			|<a href = 'ubahproduk.php?kodeBarang=$barang[kodeBarang]';> Ubah </a>
			</td>
		</tr>
		";
					}
				}
				?>
			</table>
		</b>
	</center>
	<a href="index.php" class='btn'>KEMBALI</a>
	<a href="#" class="footer">@TrianandaFahmi</a>
</body>

</html>