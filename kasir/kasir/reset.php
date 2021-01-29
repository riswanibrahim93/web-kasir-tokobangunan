<?php 
session_start();
include "../function.php";

$sql = "DELETE FROM `beli`";
$a = delete($sql);
if($a == true)
{
	header('location:kasir.php');
}

 ?>