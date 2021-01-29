<!DOCTYPE html>
<html>
<head>
	<title>Admin | Data Penjualan</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand mb-0 h1" href="#">Admin</a>
			
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link text-white" href="">Data Penjualan<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="daftar_barang.php">Data Barang<span class="sr-only">(current)</span></a>
			</li>
		</ul>
		<ul class="navbar-nav navbar-text ml-auto">
			<li>
				<a href="../">Log Out</a>
			</li>
		</ul>
	</nav>
	<div class="container"><br>
	<div style="text-align: center;">
		<h2>Data Penjualan</h2>
		<h4><small><?php echo date('l, d M Y') ?></small></h4>
	</div>
	<br><br>
	<div class="row mb-2">
          <div class="col-sm-2">
            <h5>Total Penjualan :</h5>
          </div>
          <div class="col-sm-2">
          	<?php 
				include '../function.php';
				$sql = "SELECT SUM(harga) as total FROM data_penjualan WHERE tanggal=DATE(NOW())";
				$a = select($sql);
				foreach ($a as $data)
				{
					$total = $data['total'];
				}
			 ?>
            <h5><?php echo $total; ?></h5>
          </div>
  	</div>
  	<br>
  	<div class="row mb-2">
          <div class="col-sm-4">
            <button class="btn btn-primary" onclick="window.location.href = 'export_excel.php'">EXPORT EXCEL</button>
          </div>
  	</div>
	<br>
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