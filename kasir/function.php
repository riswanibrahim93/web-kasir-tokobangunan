<?php 
include "koneksi.php";
function select($sql)
{
	global $koneksi;
	$a = mysqli_query($koneksi, $sql);
	$c = array();
	while($b = mysqli_fetch_array($a))
	{
		$c[] = $b;
	}
	return $c;
}
function insert($sql)
{
	global $koneksi;
	$a = mysqli_query($koneksi, $sql);
	return $a;
}
function update($sql)
{
	global $koneksi;
	$a = mysqli_query($koneksi, $sql);
	return $a;
}
function delete($sql)
{
	global $koneksi;
	$a = mysqli_query($koneksi, $sql);
	return $a;
}
 ?>