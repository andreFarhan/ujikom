<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	if (isset($_POST['submit'])) {
		if (tambahKasir($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Ditambahkan','success');
			header("Location: kasir_tampil.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Ditambahkan','error');
			header("Location: kasir_tampil.php");
			die;
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Kasir</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-4 rounded" style="background-color: #005082;">
				<form method="POST">
					<h3 class="mt-3">TAMBAH KASIR</h3>
					<div class="form-group">
						<label for="Username">Username:</label>
						<input type="text" class="form-control" name="Username" placeholder="cth: andre" required>
						<p>* Username Tidak Dapat Diubah!</p>
					</div>
					<div class="form-group">
						<label for="Password">Password:</label>
						<input type="Password" class="form-control" name="Password" placeholder="Password" required>
					</div>
					<div class="form-group">
						<label for="Password2">Konfirmasi Password:</label>
						<input type="Password" class="form-control" name="Password2" placeholder="Konfirmasi Password" required>
					</div>
					<div class="form-group">
						<label for="NamaKasir">Nama kasir:</label>
						<input type="text" class="form-control" name="NamaKasir" placeholder="Nama Lengkap" required>
					</div>
					<div class="form-group">
						<label for="Alamat">Alamat:</label>
						<textarea name="Alamat" class="form-control" placeholder="Alamat Lengkap" required></textarea>
					</div>
					<div class="form-group">
						<label for="NomorHP">Nomor HP:</label>
						<input type="text" class="form-control" name="NomorHP" placeholder="Nomor Handphone" required>
					</div>
					<div class="form-group">
						<label for="NomorKTP">Nomor KTP:</label>
						<input type="number" class="form-control" name="NomorKTP" placeholder="NIK" required>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">TAMBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary" href="kasir_tampil.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>