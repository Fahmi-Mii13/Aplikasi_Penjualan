<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	include 'koneksi.php';
	include 'crudBarang.php';
	$username=$_POST['username'];
	$password=$_POST['password'];

		if(otentikasi($username,$password)){
		$_SESSION['username']=$username;
		$dataUser=array();
		$dataUser=cariUserDariUsername($username);
		$_SESSION['namauser']=$dataUser['nama'];
		$data =cariUserDariUsername($username);

		if($data['role']=="admin"){
			$_SESSION['username'] = $username;
			$_SESSION['role'] = "admin";

			header("location:index.php");


		}else if($data['role']=="operator"){
			$_SESSION['username'] = $username;
			$_SESSION['role'] = "operator";

			header("location:index.php");


		}else if($data['role']=="superadmin"){

			$_SESSION['username'] = $username;
			$_SESSION['role'] = "superadmin";

			header("location:index.php");

		}else{
			
			echo("
			<script>
				alert('Username atau Password Anda SALAH!');
				window.location.replace('login.php')
			</script>
			");
		}	                   
		}else{
			header("location:login.php?error");
		}

?>
</body>
</html>