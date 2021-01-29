<!DOCTYPE html>
<html>
<head>
	<title>Admin | Data Penjualan</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container"><br>
	<div style="text-align: center;">
		<h2>Data Penjualan</h2>
		<h4><small><?php echo date('l, d M Y') ?></small></h4>
	</div>
	<table  class="table">
		<tr class="thead-dark">
			<th>No</th>
			<th>Kode</th>
			<th>Nama</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Tanggal</th>
		</tr>
		<?php
			include '../function.php';
			$sql = "SELECT * FROM `data_penjualan` WHERE tanggal=DATE(NOW())";
			$a = select($sql);
			$no = 1;
			foreach ($a as $data)
			{
		 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['kode']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td><?php echo $data['harga']; ?></td>
			<td><?php echo $data['tanggal']; ?></td>

		<?php  
				$no++;
			}
		?>
		</tr>
	</table>
	</div>
</body>
</html>