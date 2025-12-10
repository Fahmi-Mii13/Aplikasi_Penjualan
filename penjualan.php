<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Penjualan</title>
	<link rel="stylesheet" href="tampilan.css">
</head>
<?php
session_start();
include 'crudBarang.php';
if ($role == "superadmin") {
	echo "<script>alert('Hak Akses anda tidak sesuai')</script>";
	echo "<script> window.location = 'index.php' </script>";
} else {
	$username = $_SESSION['username'];
	$detailBarang = bacaSemuaBarang();
	$jmlDetailBarang = count($detailBarang);
	if (!array_key_exists('hasil', $_SESSION)) {
		$hasil['kodeBarang'] = "";
		$hasil['namaBarang'] = "";
		$hasil['hargaBarang'] = "";
		$_SESSION['hasil'] = $hasil;
	} else {
		$hasil = $_SESSION['hasil'];
	}
	$tanggal = date('d/m/Y');

?>

	<body class="bg1">
		<h1>Transaksi Penjualan </h1>
		<h3 class="info"><?php echo "Username : " . $_SESSION['username'] . " | Akses :  " . $_SESSION['role'] . " | " ?>Tanggal Transaksi : <?php echo $tanggal; ?> | <a href="logoutuser.php" class="btn">Logout!</a></h3>
		<hr>
		<center><b>
				<table>
					<form action="prosespenjualan.php" method="post">
						<tr>
							<td>Kode Barang</td>
							<td><input type="text" name="kodeBarang" value="<?php echo "$hasil[kodeBarang]"; ?>">
								<input type="submit" name="btnCari" value="Cari Barang!">
							</td>
						</tr>
						<tr>
							<td>Nama Barang</td>
							<td><?php echo $hasil['namaBarang']; ?></td>
						</tr>
						<tr>
							<td>Harga</td>
							<td><?php echo $hasil['hargaBarang']; ?></td>
						</tr>
						<tr>
							<td>Jumlah</td>
							<td><input type="text" name="jumlahBarang" value="" size="4">
								<?php if ($role == "operator") {
									echo "<input type='submit' name='btnTambah' value='Tambah!'>";
								} ?></td>
						</tr>
					</form>
				</table>
				<hr>
				<table class="detil">
					<tr>
						<td>Kode Barang</td>
						<td>Username</td>
						<td>Nama Barang</td>
						<td>Harga Barang</td>
						<td>Jumlah Barang</td>
						<td>Subtotal</td>
						<?php if ($role == "admin") {
							echo "<th>Aksi</th>";
						} ?>
					</tr>
					<?php
					if ($role == "operator") {
						$data = bacaDetailBarang($username);
					} else if ($role == "admin") {
						$data = BacaSemuaDetailBarang();
					}
					foreach ($data as $barang) {
						$kodeBarang = $barang['kodeBarang'];
						$user = $barang['username'];
						$namaBarang = $barang['namaBarang'];
						$hargaBarang = rupiah($barang['hargaBarang']);
						$jumlahBarang = $barang['jumlahBarang'];
						$subtotal = $barang['subtotal'];
						$rupiah = rupiah($subtotal);

						echo
						"
	<tr>
		<td>$kodeBarang</td>
		<td>$user</td>
		<td>$namaBarang</td>
		<td>$hargaBarang</td>
		<td>$jumlahBarang</td>
		<td>$rupiah</td>";
						if ($role == "admin" || $role == "superadmin") {
							echo "
		<td><a href = 'hapusbarang.php?Id=$barang[Id]';> Hapus </a></td>
	</tr>";
						}
					}

					?>
					<tr>
						<td><b>Total</b></td>
						<td colspan="5" align="center"><b><?php echo rupiah(total()); ?></b></td>
					</tr>
			</b>
			</table>
		</center>
		<form action="prosespenjualan.php" method="post">
			<?php if ($role == "operator") {
				echo "<br><input type='submit' name='btnSimpan' value='Simpan!' class='btn'>";
			} ?>
		</form>
		<!--
	<?php if ($role == "admin" || $role == "superadmin") {
		echo ("<br><a href = 'bacaBarang.php'> Liat Produk </a>");
	}
	?>
	<?php if ($role == "admin" || $role == "superadmin") {
		echo ("<br><br><a href = 'bacaUser.php'> Liat User </a>");
	}
	?>
-->
		<br><a href="index.php" class="btn">KEMBALI</a>
		<a href="#" class="footer">@TrianandaFahmi</a>
	<?php
}
	?>
	</body>

</html>