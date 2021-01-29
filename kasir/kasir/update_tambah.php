<?php 
include "../function.php";
$kode = $_GET['kode'];
$jml;
$harga;

$sql = "SELECT * FROM `beli` where kode = $kode";
$a = select($sql);
foreach ($a as $data)
{
	$jml = $data['jumlah']+1;
}
$sql = "SELECT * FROM `barang` where kode = $kode";
$a = select($sql);
foreach ($a as $data)
{
	$harga = $data['harga']*$jml;
}
echo $harga;
$sql = "UPDATE `beli` SET `jumlah`= '$jml',`harga`= '$harga' WHERE kode = $kode";
$a = update($sql);
if($a == true)
{
	header('location:kasir.php');
}

 ?>