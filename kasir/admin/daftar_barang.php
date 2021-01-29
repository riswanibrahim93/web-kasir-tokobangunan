<?php 
session_start();
include "../function.php";
$name = $_SESSION['username'];
$pass = $_SESSION['password'];
if(!isset($name) || !isset($pass))
	{
		echo "<script>alert('anda belum login');history.back()</script>";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Data Barang</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand mb-0 h1" href="#">Admin</a>
		<ul class="navbar-nav">
			<li class="nav-item ">
				<a class="nav-link " href="penjualan.php">Data Penjualan<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link text-white" href="#">Data Barang<span class="sr-only">(current)</span></a>
			</li>
		</ul>
		<ul class="navbar-nav navbar-text ml-auto">
			<li>
				<a href="../">Log Out</a>
			</li>
		</ul>
	</nav>
	<div class="container">
		<br><br>
		<h3 align="center">Masukkan Item Baru</h3><br>
		<form action="../aksi/aksi_tambah.php" method="POST">
		
			
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Kode</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="scan barcode" name="kode" id="kode" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="masukkan nama barang" name="nama" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Stok</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="masukkan stok barang" name="stok" id="stok" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Harga/pcs</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="masukkan harga barang" name="harga" autocomplete="off">
			</div>
		</div>
			<div align="right">
				<button class="btn btn-info" type="submit">Tambah</button>
				<button class="btn btn-danger" type="reset">Reset</button>
			</div>
		</form>

		<div class="model" id="model" >
		<br><br>
		<h3 align="center">Data Barang</h3><br>
				<table class="table table-striped">
					<tr class="bg-dark text-white">
						<td><b>Kode</b></td>
						<td><b>Nama</b></td>
						<td><b>Stok</b></td>
						<td><b>Harga</b></td>
						<td></td>
					</tr>
						<?php 
							$sql = "SELECT * FROM `barang`";
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
						<td>  
							<input type="hidden" id="key" value="<?php echo $data['kode']; ?>"/>

							<button class="btn btn-primary" onclick="window.location.href = 'ubah_barang.php?kode=<?php echo $data['kode']; ?>';">Ubah</button>
							<button class="btn btn-danger" onclick="window.location.href = 'hapus_barang.php?kode=<?php echo $data['kode']; ?>';">Hapus</button>
						</td>

					</tr>
						<?php  
							}
						?>
				</table>
		</div>
	</div>
</body>

</html>