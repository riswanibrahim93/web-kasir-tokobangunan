<?php 
session_start();
include "../function.php";
$name = $_SESSION['username'];
$pass = $_SESSION['password'];
$kode = $_GET['kode'];
if(!isset($name) || !isset($pass))
{
	echo "<script>alert('anda belum login');history.back()</script>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Tambah Item</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
		<br><br>
	<h3 align="center">Update Barang</h3><br>
	<form action="../aksi/aksi_ubah.php" method="POST">
		<?php 
			$sql = "SELECT * FROM `barang` WHERE kode = '$kode'";
			$a = update($sql);
			$data = mysqli_fetch_array($a);
		 ?>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Kode</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="scan barcode" name="kode" id="kode" autocomplete="off" readonly value="<?php echo $data['kode']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="masukkan nama barang" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Stok</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="masukkan stok barang" name="stok" id="stok" autocomplete="off" value="<?php echo $data['stok']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Harga/pcs</label>
			<div class="col-sm-10">
				<input type="input" class="form-control" placeholder="masukkan harga barang" name="harga" autocomplete="off" value="<?php echo $data['harga']; ?>">
			</div>
		</div>
		<div align="right">
			<button class="btn btn-info" type="submit">Ubah</button>
			<button class="btn btn-danger" type="reset">Reset</button>
		</div>

	</form>
	</div>
</body>
</html>