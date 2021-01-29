<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		session_start();
		$_SESSION['kode'] = $_GET['kode'];
		// echo $_GET['kode'];
	 ?>
<script type="text/javascript">
	var jml = prompt('Jumlah');
	window.location = "../kasir/beli.php?jml="+jml;
</script>
</body>
</html>