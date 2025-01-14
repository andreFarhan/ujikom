<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	if (isset($_POST['submit'])) {
		if (tambahShift($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Ditambahkan','success');
			header("Location: shift_tampil.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Ditambahkan','error');
			header("Location: shift_tampil.php");
			die;
		}
	}

	$ID_Kasir = $_SESSION['ID_Kasir'];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Shift</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #005082;">
				<form method="POST">
					<h3 class="mt-3">TAMBAH SHIFT</h3>
					<input type="hidden" name="ID_Kasir" value="<?= $ID_Kasir; ?>">
					<div class="form-group">
						<label for="SaldoAwal">Saldo Awal:</label>
						<input type="number" class="form-control" name="SaldoAwal" required>
					</div>
					<input type="hidden" name="WaktuBuka" value="<?= date('Y-m-d\TH:i:s'); ?>">
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">TAMBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary" href="shift_tampil.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>