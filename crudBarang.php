<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	
require_once "koneksi.php";
$role=$_SESSION['role'];
	
function bacaBarang($sql){
    $data = array();
    $koneksi = koneksi();
    $hasil = mysqli_query($koneksi, $sql);

    $i = 0;
    while ($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['kodeBarang'] = $baris['kodeBarang'];
        $data[$i]['namaBarang'] = $baris['namaBarang'];
        $data[$i]['hargaBarang'] = $baris['hargaBarang'];
        $data[$i]['Stok'] = $baris['Stok'];
        $i++;
    }
    mysqli_close($koneksi);
    return $data;
}

    
function bacaSemuaBarang(){
    $sql = "SELECT * FROM barang";
    $data = bacaBarang($sql);
    if($data == null){
        echo "No records have been made.";
    }
    return $data;
}

function cariBarang($kodeBarang){
    $koneksi = koneksi();
    $sql = "SELECT * FROM barang WHERE kodeBarang = '$kodeBarang'";
    $hasil = mysqli_query($koneksi, $sql);
    $jumlah = mysqli_num_rows($hasil);
    if($jumlah > 0){
        $baris = mysqli_fetch_assoc($hasil);
        $data['kodeBarang'] = $baris['kodeBarang'];
        $data['namaBarang'] = $baris['namaBarang'];
        $data['hargaBarang'] = $baris['hargaBarang'];
        mysqli_close($koneksi);
    }
    else{
        $data = null;
        mysqli_close($koneksi);
    }
    return $data;
}

function bacaDetailBarang($username){
    $data = array();
    $koneksi = koneksi();
    $sql = "SELECT * FROM detailbarang WHERE username = '$username'";
    $hasil = mysqli_query($koneksi, $sql);

    $i = 0;
    while ($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['Id'] = $baris['Id'];
        $data[$i]['username'] = $baris['username'];
        $data[$i]['kodeBarang'] = $baris['kodeBarang'];
        $data[$i]['namaBarang'] = $baris['namaBarang'];
        $data[$i]['hargaBarang'] = $baris['hargaBarang'];
        $data[$i]['jumlahBarang'] = $baris['jumlahBarang'];
        $data[$i]['subtotal'] = $baris['subtotal'];
        $i++;
    }
    mysqli_close($koneksi);
    return $data;
}

function bacaSemuaDetailBarang(){
    $data = array();
    $koneksi = koneksi();
    $sql = "SELECT * FROM detailbarang";
    $hasil = mysqli_query($koneksi, $sql);

    $i = 0;
    while ($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['Id'] = $baris['Id'];
        $data[$i]['username'] = $baris['username'];
        $data[$i]['kodeBarang'] = $baris['kodeBarang'];
        $data[$i]['namaBarang'] = $baris['namaBarang'];
        $data[$i]['hargaBarang'] = $baris['hargaBarang'];
        $data[$i]['jumlahBarang'] = $baris['jumlahBarang'];
        $data[$i]['subtotal'] = $baris['subtotal'];
        $i++;
    }
    // mysqli_close($koneksi);
    return $data;
}

function tambahDetail($username,$kodeBarang,$namaBarang,$hargaBarang,$jumlahBarang){
	$koneksi = koneksi();
	$subtotal = $hargaBarang * $jumlahBarang;
	$sql="insert into detailbarang (username, kodeBarang, namaBarang, hargaBarang, jumlahBarang, subtotal)values('$username','$kodeBarang','$namaBarang','$hargaBarang','$jumlahBarang','$subtotal')";
	$hasil = 0;
	if(mysqli_query($koneksi, $sql)){
		$hasil=1;
	mysqli_close($koneksi);
	return $hasil;
	}
}
	
function cariUserDariUsername($username){
	$koneksi=koneksi();
	$sql="select * from user where username='$username'";
	$hasil = mysqli_query($koneksi,$sql);
	if(mysqli_num_rows($hasil)>0){
		$baris=mysqli_fetch_assoc($hasil);
		$data['username']=$baris['username'];
		$data['password']=$baris['password'];
		$data['nama']=$baris['nama'];
		$data['role']=$baris['role'];
		mysqli_close($koneksi);
		return $data;
	}else{
		mysqli_close($koneksi);
		return null;
	}
}
	
function otentikasi($username,$password){
	$dataUser=array();
	$passmd5=md5($password);
	$dataUser=cariUserDariUsername($username);
	if($dataUser!=null){
		if($passmd5==$dataUser['password']){	
		return true;
		}else{
		return false;
		}
	}else{
		return false;
	}
}
	
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}


function total(){
    $koneksi = koneksi();
    $sql = "SELECT SUM(subtotal) AS total FROM detailbarang ";
    $hasil = mysqli_query($koneksi, $sql);
    if($hasil){
        $row = mysqli_fetch_assoc($hasil);
        $total = $row['total'];
        return $total;
    }else{
        return null;
    }
}


function getNomorPenjualan(){
	$koneksi = koneksi();
	$sql="SELECT idPenjualan from penjualan order by idPenjualan desc limit 1";
	$hasil=mysqli_query($koneksi,$sql);
	$jumlah=mysqli_num_rows($hasil);
	if($jumlah>0){
		$baris=mysqli_fetch_assoc($hasil);
		$nomorPenjualan=$baris['idPenjualan'];
	}else{
		$nomorPenjualan=0;
	}
	return $nomorPenjualan;
	mysqli_close($koneksi);
}
	
function getTotalPenjualan($username){
	$total=0;
	$sql="SELECT subtotal from detailbarang where username='$username'";
	$koneksi=koneksi();
	$hasil=mysqli_query($koneksi,$sql);
	$baris=mysqli_fetch_assoc($hasil);
	$subtotal=$baris['subtotal'];
	$total=$subtotal+$total;
	if($total==NULL){
		$total=0;
	}
	mysqli_close($koneksi);
	return $total;
}
	
function tambahPenjualan ($idPenjualan,$tanggal,$total,$username){
	$koneksi=koneksi();
	$tanggal=date("Y/m/d");
	$sql="INSERT INTO penjualan (idPenjualan,tanggalpenjualan,total,username)VALUES('$idPenjualan','$tanggal','$total','$username')";
	$hasil=0;
	if(mysqli_query($koneksi,$sql)){
		$hasil=1;
		mysqli_close($koneksi);
		return $hasil;
	}
}
	
function tambahDetailPenjualan($idpenjualan, $username){
    $koneksi = koneksi();
    $sql = "select * from detailbarang where username = '$username'";
    $hasil1 = mysqli_query($koneksi,$sql);
    foreach($hasil1 as $data){
        $kodebarang = $data['kodeBarang'];
        $hargabarang = $data['hargaBarang'];
        $jumlahbarang  = $data['jumlahBarang'];
        $username= $data['username'];
        $hasil = mysqli_query($koneksi,"insert into detailpenjualan (username, idpenjualan, kodebarang, harga, jumlah) 
        values('$username','$idpenjualan','$kodebarang','$hargabarang','$jumlahbarang')");
    }
		$delete = "delete from detailbarang where username = '$username'";
	 	mysqli_query($koneksi,$delete);
        mysqli_close($koneksi);
        return $hasil;
}

function hapusbarang($id){
	$koneksi = koneksi();
    $sql = "delete from detailbarang where Id = '$id'";
	$data =  mysqli_query($koneksi,$sql);
    return $data;
}	

function hapusproduk($kodeBarang){
    $sql = "delete from barang where kodeBarang = '$kodeBarang'";
    return $sql;
}	

function UpdateStokKurang($kodeBarang, $namaBarang, $hargaBarang, $jumlahBarang){
    $koneksi = koneksi();
    $sql = "select Stok from barang where kodeBarang = '$kodeBarang'";
    $caristok = mysqli_query($koneksi,$sql); 
    foreach($caristok as $data){
        $stok = $data['Stok'];
    }
    $hasilupdate = $stok - $jumlahBarang;
    $sql1 = "update barang set 
                                namaBarang = '$namaBarang',
                                hargaBarang = '$hargaBarang',
                                Stok = $hasilupdate
                                WHERE kodeBarang  = '$kodeBarang'";
    $hasil = mysqli_query($koneksi,$sql1);
    return $hasil;
}
	
function UpdateStokTambah($kodeBarang, $namaBarang, $hargaBarang, $jumlahBarang){
    $koneksi = koneksi();
    $sql = "select Stok from barang where kodeBarang = '$kodeBarang'";
    $caristok = mysqli_query($koneksi,$sql); 
    foreach($caristok as $data){
        $stok = $data['Stok'];
    }
    $hasilupdate = $stok + $jumlahBarang;
    $sql1 = "update barang set 
                                namaBarang = '$namaBarang',
                                hargaBarang = '$hargaBarang',
                                Stok = $hasilupdate
                                WHERE kodeBarang  = '$kodeBarang'";
    $hasil = mysqli_query($koneksi,$sql1);
    return $hasil;
}

function tambahBarang($kodeBarang,$namaBarang,$hargaBarang,$Stok){
$koneksi = koneksi();
$sql = "insert into barang values('$kodeBarang','$namaBarang','$hargaBarang','$Stok')";
$hasil=0;
if(mysqli_query($koneksi,$sql))
$hasil=1;
mysqli_close($koneksi);
return $hasil;
}
	
function ubahproduk($kodeBarang,$namaBarang,$hargaBarang,$Stok){
$koneksi = koneksi();
$sql = "UPDATE barang set Stok = '$Stok',namaBarang = '$namaBarang',hargaBarang='$hargaBarang' WHERE kodeBarang='$kodeBarang'";
if(mysqli_query($koneksi,$sql)){
	$hasil=true;
}else{
	$hasil="Gagal Mengubah Data...".mysqli_error($koneksi);
}
mysqli_close($koneksi);
return $hasil;
}
	
function bacauser($username){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi,$username);
		if(mysqli_num_rows($hasil)==0){
			mysqli_close($koneksi);
			return null;
		}
		$i=0;
		while ($baris=mysqli_fetch_assoc($hasil)){
			$data[$i]['username']=$baris['username'];
			$data[$i]['password']=$baris['password'];
			$data[$i]['nama']=$baris['nama'];
			$data[$i]['role']=$baris['role'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	
function bacauseroperator($username){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi,$username);
		if(mysqli_num_rows($hasil)==0){
			mysqli_close($koneksi);
			return null;
		}
		$i=0;
		while ($baris=mysqli_fetch_assoc($hasil)){
			$data[$i]['username']=$baris['username'];
			$data[$i]['password']=$baris['password'];
			$data[$i]['nama']=$baris['nama'];
			$data[$i]['role']=$baris['role'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	
function hapusUser($username){
    $sql = "delete from user where username = '$username'";
    return $sql;
}

function ubahUser($username, $password, $nama)
{
    $koneksi = koneksi();
    if (trim($password) == "") {
        $sql = "UPDATE user SET nama='$nama' WHERE username='$username'";
    }
    else {
        $sql = "UPDATE user SET password='$password', nama='$nama' WHERE username='$username'";
    }

    if (mysqli_query($koneksi, $sql)) {
        $hasil = true;
    } else {
        $hasil = "Gagal Mengubah Data." . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
    return $hasil;
}


function tambahUser($username, $password, $nama, $role){
$koneksi = koneksi();
$sql = "insert into user values('$username','$password','$nama','$role')";
$hasil=0;
if(mysqli_query($koneksi,$sql))
$hasil=1;
mysqli_close($koneksi);
return $hasil;
}
?>
<body>
	
</body>
</html>