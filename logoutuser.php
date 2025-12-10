<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logout</title>
</head>

<body>
<?php 
 
session_start();
session_destroy();
 
header("Location: login.php");
 
?>
</body>
</html>