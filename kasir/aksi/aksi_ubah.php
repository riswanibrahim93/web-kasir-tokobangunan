<?php 
include "../function.php";
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

$sql = "UPDATE `barang` SET `nama`= '$nama',`stok`= '$stok',`harga`= '$harga' WHERE kode = '$kode'";
$a = update($sql);
if($a == true)
{
	echo "<script>alert('berhasil diupdate');window.location = '../admin/daftar_barang.php';</script>";
}

 ?>