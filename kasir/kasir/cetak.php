<?php 
session_start();
include "../function.php";
$kode;
$nama;
$harga;

$bayar = $_POST['bayar'];

if($bayar == '')
{
	echo "<script>alert('pembayaran belum diinputkan');history.back()</script>";
}
else
{
$sql = "SELECT * FROM `beli`";
$a = select($sql);
$no = 1;
foreach ($a as $data)
{
	$kode = $data['kode'];
	$nama = $data['nama'];
	$jumlah = $data['jumlah'];
	$harga = $data['harga'];

	$sql_barang = "SELECT * FROM `barang` WHERE kode = '$kode'";
	$a = update($sql_barang);
	$data = mysqli_fetch_array($a);
	$stok_awal = $data['stok'];

	if($stok_awal < $jumlah)
	{
		echo "<script>alert('stok $nama kurang');history.back()</script>";
	}
	else
	{
		$stok_akhir = $stok_awal - $jumlah;
		$sqlstok = "UPDATE `barang` SET `stok`= '$stok_akhir' WHERE kode = '$kode'";
		$a = update($sqlstok);

		
		$sql_insert_pembeli = "INSERT INTO `data_penjualan`(`kode`, `nama`, `jumlah`, `harga`,`tanggal`) VALUES ('$kode','$nama','$jumlah','$harga',now())";
		$insert = insert($sql_insert_pembeli);
	}
}

$total = $_POST['total'];
$bayar = $_POST['bayar'];
$kembali = $_POST['kembali'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table class="table">
		<tr>
			<td>No</td>
			<td>Nama</td>
			<td>Jumlah</td>
			<td>Harga</td>
		</tr>
			<?php 
				$sql = "SELECT * FROM `beli`";
				$a = select($sql);
				$no = 1;
				foreach ($a as $data)
				{
			 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td><?php echo $data['harga']; ?></td>

			<?php  
			$no++;
				}
			?>
		</tr>
	</table>
	<table>
		<tr>
			<td>Total :</td>
			<td><?php echo $total; ?></td>
		</tr>
		<tr>
			<td>Bayar :</td>
			<td><?php echo $bayar; ?></td>
		</tr>
		<tr>
			<td>Kembali :</td>
			<td><?php echo $kembali; ?></td>
		</tr>
	</table>
	<a href="reset.php">Terimakasih</a>
	<script type="text/javascript">
		// window.print();

		// console.log($bayar)
	</script>
</body>
</html>

<?php 
}
 ?>
