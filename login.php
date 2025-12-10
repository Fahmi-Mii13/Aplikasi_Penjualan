<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
	
body {
    width: 100%;
    min-height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("image/wallpaperflare.com_wallpaper.jpg");
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    width: 400px;
    min-height: 400px;
    background: #FFA77E;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,.3);
    padding: 40px 30px;
}
	
.btn {
    display: block;
    width: 40%;
    padding: 10px 10px;
    text-align: center;
    border: none;
    background: #FF9D5C;
    outline: #FF7422 double;
    border-radius: 30px;
    font-size: 1.2rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
}

input {
    width: 80%;
    height: 20%;
	color: #000000;
    border: 2px solid #e7e7e7;
    padding: 13px 10px;
    font-size: 1rem;
    border-radius: 30px;
    background: #FFE3CD;
    outline: none;
    transition: .3s;
}

.login-register-text {
    color: #000000;
    font-weight: 600;
}
 
.login-register-text a {
    text-decoration: none;
    color: #6c5ce7;
}
</style>
</head>
<?php
session_start();
if(array_key_exists('error',$_GET)){
	echo "<script>alert('Password atau Username SALAH!')</script>";
}

if (isset($_SESSION['username'])) {
            echo "<script>alert('Anda Sudah terlogin')</script>";
			echo "<script> window.location = 'penjualan.php' </script>";
        }
?>

<body>
    <div class="container">
        <form action="proseslogin.php" method="POST" class="login-email">
            <center><p class="login-text" style="font-size: 2rem; font-weight: 800; ">Login</p><br>
			<div class="input-group">
                <input type="text" placeholder="Username" name="username" required><br><br>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required><br><br><br>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div><br>
			</center>
        </form>
    </div>
</body>
</html>