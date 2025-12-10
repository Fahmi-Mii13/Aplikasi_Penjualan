<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	include('crudBarang.php');
	$tanggal=date('d/m/Y');
	$username=$_SESSION['username'];
	
	if(array_key_exists('btnCari', $_POST)){
		$kodeBarang=trim($_POST['kodeBarang']);
		$hasil=array();
		$hasil=cariBarang($kodeBarang);
		if($hasil!=null){
			$_SESSION['kodeBarang']=$kodeBarang;
			$_SESSION['hasil']=$hasil;
		}else{
			$_SESSION['kodeBarang']='';
			unset($_SESSION['hasil']);
		}
		header("location:penjualan.php");
	}
	if(array_key_exists('btnTambah',$_POST)){
		$kodeBarang=$_SESSION['kodeBarang'];
		$koneksi=koneksi();
		$sql = "select Stok from barang where kodeBarang = '$kodeBarang'";
		$caristok=mysqli_query($koneksi,$sql);
		foreach($caristok as $data){
			$stok = $data ['Stok'];
		}
		if(!empty($kodeBarang)){
			$hasil = $_SESSION['hasil'];
			$namaBarang = $hasil['namaBarang'];
			$hargaBarang = $hasil['hargaBarang'];
			$jumlahBarang = $_POST['jumlahBarang'];
			
		if($jumlahBarang > $stok){
			echo "<script>alert('Stok tidak mencukupi')</script>";
			echo "<script> window.location = 'penjualan.php' </script>";
		}else if($jumlahBarang <= $stok){
			tambahDetail($username,$kodeBarang,$namaBarang,$hargaBarang,$jumlahBarang);
			UpdateStokKurang($kodeBarang, $namaBarang, $hargaBarang, $jumlahBarang);
			header("location:penjualan.php");
		}
		}else{
		$_SESSION['$kodeBarang']="";
		unset($_SESSION['hasil']);
		header("location:penjualan.php");
		}
	}
	if(array_key_exists('btnSimpan',$_POST)){
		$idPenjualan = getNomorPenjualan()+1;
		$total = total($username);
		if($total !=0){
			tambahPenjualan ($idPenjualan, $tanggal, $total, $username);
			tambahDetailPenjualan($idPenjualan, $username);
		}
		header("location:penjualan.php");
	}
?>
</body>
</html>