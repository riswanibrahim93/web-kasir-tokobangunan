<?php 
session_start();

$name = $_SESSION['username'];
$pass = $_SESSION['password'];
if(!isset($name) || !isset($pass))
	{
		echo "<script>alert('anda belum login');history.back()</script>";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<button id="penjualan" onclick="window.location.href = 'penjualan.php';">Data Penjualan</button>
	<button id="tambah" onclick="window.location.href = 'tambah.php';">Tambah Item</button>
	<a href="../">Log Out</a>
</body>
</html>