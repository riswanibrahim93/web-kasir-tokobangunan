<?php 
session_start();
include "../function.php";
$key = $_GET['keyword'];
?>
<br>
<table class="table table-striped">

	 <tr>
	 	<th>Kode</th>
	 	<th>Nama</th>
	 	<th>Stok</th>
	 	<th>Harga</th>
	 	<th></th>
	 </tr>
		<?php 
			$sql = "SELECT * FROM `barang` where nama LIKE '%$key%'";
			$a = select($sql);
			$no = 1;
			foreach ($a as $data)
			{	
		 ?>
	<tr>
		<td><?php echo $data['kode']; ?></td>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['stok']; ?></td>
		<td><?php echo $data['harga']; ?></td>
		<td><a href="beli.php?kode=<?php echo $data['kode']; ?>">Pilih</a></td>

		<?php  
			}
		?>
	</tr>
</table>

	<br><br><br>