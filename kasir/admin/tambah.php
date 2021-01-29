<!DOCTYPE html>
<html>
<head>
	<title>Admin | Tambah Item</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand mb-0 h1" href="#">Admin</a>
		<ul class="navbar-nav">
			<li class="nav-item ">
				<a class="nav-link " href="penjualan.php">Data Penjualan</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link text-white" href="#">Tambah Item<span class="sr-only">(current)</span></a>
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
	<div class="container">
		<br><br>
	<h3 align="center">Masukkan Item Baru</h3><br>
	<form action="../aksi/aksi_tambah.php" method="POST">
	
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="masukkan nama barang" name="nama" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Harga</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="masukkan harga barang" name="harga" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Kode</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="scan barcode" name="kode" id="kode" autocomplete="off">
			</div>
		</div>
		<div align="right">
			<button class="btn btn-info" type="submit">Tambah</button>
			<button class="btn btn-danger" type="reset">Reset</button>
		</div>
	</form>
	</div>
</body>
</html>