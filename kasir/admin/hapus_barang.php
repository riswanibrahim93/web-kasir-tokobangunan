<?php 
include "../function.php";
$kode = $_GET['kode'];
$sql = "DELETE FROM `barang` where kode = '$kode'";
$a = delete($sql);
if($a == true)
{
	header('location:daftar_barang.php');
}

 ?>