<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php 

function koneksi(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tokobaru";
    $koneksi = mysqli_connect($servername, $username, $password, $dbname);
    if(!$koneksi){
        die("Connection Failed! " . mysqli_connect_error());
    }
    return $koneksi;
}


?>
</html>