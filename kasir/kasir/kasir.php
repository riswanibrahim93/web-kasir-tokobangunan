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
	<title>Kasir</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>
<body>
<style type="text/css">
	@media screen and (max-width: 700px) {
		.tb_barang {
			width: 100%;
		}

		.isi {
			width: 100%;
		}
	}
</style>
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand mb-0 h1" href="#">
			<img src="" width="30" height="30" class="d-inline-block align-top" alt="">
			Kasir
		</a>
		<span class="navbar-text">
			<a href="../">Log Out</a>
		</span>
	</nav>
	<div class="container" style="margin-top: 30px">
		<div>
			<h3>Pencarian Barang</h3>
			<div class="cari form-row">
				<div class="col-md-6 mb-3">
					<label>Nama</label>
					<input class="form-control" type="text" name="nama" autocomplete="off" id="key">
				</div>
			</div>

			<div class="tb_barang" id="barang" ></div>

			<div class="tb_beli" id="beli">
				<table class="table">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Nama</td>
						<td>Jumlah</td>
						<td>Tambah</td>
						<td>Kurang</td>
						<td>Harga</td>
						<td>Batal</td>
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
						<td id="kode"><?php echo $data['kode']; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><input type="text" name="jml" id="jml" value="<?php echo $data['jumlah']; ?>"></td>
						<td><button class="btn btn-info" onclick="window.location.href = 'update_tambah.php?kode=<?php echo $data['kode']; ?>';">+</button></td>
						<td><button class="btn btn-info" onclick="window.location.href = 'update_kurang.php?kode=<?php echo $data['kode']; ?>';">-</button></td>
						<td><input type="text" name="harga" id="harga" value="<?php echo $data['harga']; ?>"></td>
						<td><button class="btn btn-danger"onclick="window.location.href = 'hapus.php?kode=<?php echo $data['kode']; ?>';">X</button></td>

						<?php  
						$no++;
							}
						?>
					</tr>
				</table>
				<br><br>
			</div><br>
			<h3>Pembayaran</h3>
			<form action="cetak.php" method="POST">
				<div class="transaksi form-row">
				
						<div class="col-md-4 mb-3">
					
							<?php 
								$sql_sum = "SELECT SUM(harga) as total FROM `beli`";
								$a = select($sql_sum);
								$total;
								foreach ($a as $data)
								{
									$total = $data['total'];
								}
							 ?>
							<label>Total</label>
							<input class="form-control" type="text" id="total" name="total" autocomplete="off" value="<?php echo $total; ?>">
						</div>
						<div class="col-md-4 mb-3">
							<label>Bayar</label>
							<input class="form-control" type="text" id="bayar" name="bayar" autocomplete="off">
						</div>
						<div class="col-md-4 mb-3">
							<label>Kembalian</label>
							<input class="form-control" type="text" id="kembali" name="kembali" autocomplete="off">
						</div>
				</div>
				<div align="right">
					<button type="Submit" class="btn btn-info">Submit</button>
					<button id="reset" onclick="reset()" class="btn btn-danger">Reset</button>
				</div>
			</form>
		</div>
		<div class="footer">
		</div>
	</div>

<script type="text/javascript" src="../js/cari_nama.js"></script>
<script type="text/javascript">


	//script cari nama
	var key = document.getElementById('key');
	var barang = document.getElementById('barang');

	// event
	key.addEventListener('keyup', function()
		{
			//objek ajax
			var xhr = new XMLHttpRequest();

			//cek kesiapan ajax
			xhr.onreadystatechange = function()
			{
				if(xhr.readyState == 4 && xhr.status == 200)
				{
					barang.innerHTML = xhr.responseText;
				}
			}

			//eksekusi ajax
			xhr.open('GET','barang.php?keyword=' + key.value, true);
			xhr.send();

		});

	//script bayar
	var total = document.getElementById('total');
	var bayar = document.getElementById('bayar');
	var kembali = document.getElementById('kembali');
	
	kembali.addEventListener('keyup', function()
	{
		//objek ajax
		var xhr = new XMLHttpRequest();

		//cek kesiapan ajax
		xhr.onreadystatechange = function()
		{
			if(xhr.readyState == 4 && xhr.status == 200)
			{
				document.getElementById('kembali').value = bayar.value - total.value;
			}
		}

		//eksekusi ajax
		xhr.open('GET','kasir.php',true);
		xhr.send();
	});

	function reset()
	{
		window.location = 'reset.php';
	}
</script>
</body>
</html>