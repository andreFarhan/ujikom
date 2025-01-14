<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	if (isset($_POST['submit'])) {
		if (tambahBarang($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Ditambahkan','success');
			header("Location: barang_tampil.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Ditambahkan','error');
			header("Location: barang_tampil.php");
			die;
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Barang</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #005082;">
				<form method="POST">
					<h3 class="mt-3">TAMBAH BARANG</h3>									
					<div class="form-group">
						<label for="NamaBarang">Nama Barang:</label>
						<input type="text" class="form-control" name="NamaBarang" placeholder="cth: Indomie Goreng" required>
					</div>
					<div class="form-group">
						<label for="Satuan">Satuan:</label>
						<input type="text" class="form-control" name="Satuan" placeholder="cth: Bungkus" required>
					</div>
					<div class="form-group">
						<label for="HargaSatuan">Harga Satuan:</label>
						<input type="number" class="form-control" name="HargaSatuan" placeholder="cth: 2500" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">TAMBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary" href="barang_tampil.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>