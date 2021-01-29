<?php 
include "../function.php";
$kode = $_GET['kode'];
$sql = "DELETE FROM `beli` where kode = '$kode'";
$a = delete($sql);
if($a == true)
{
	header('location:kasir.php');
}

 ?>