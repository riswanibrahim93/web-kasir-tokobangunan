<?php 
	session_start();
	include "../function.php";

	$user = $_POST['username'];
	$pass = $_POST['password'];
	$notif;

	$sql = "SELECT * FROM `akun`";
	$a = select($sql);
	foreach ($a as $data) {
		if( $data['password'] == $pass && $data['username'] == $user )
		{
			$notif = $data['kategori'];
			$_SESSION['username'] = $user;
			$_SESSION['password'] = $pass;
		}
	}
	if($notif == "admin")
	{
		header("location:../admin/penjualan.php");
	}
	else if($notif == "kasir")
	{
		header("location:../kasir/kasir.php");
	}
	else
	{
		echo "<script>alert('username atau password salah');history.back()</script>";
	}
?>
