<?php 
include "../function.php";
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

$sql = "INSERT INTO `barang`(`kode`, `nama`, `stok`, `harga`) VALUES ('$kode','$nama','$stok','$harga')";
$a = update($sql);
if($a == true)
{
	echo "<script>alert('berhasil ditambahkan');history.back()</script>";
}

 ?>