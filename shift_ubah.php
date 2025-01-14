<?php  
	
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$ID_Shift = $_GET['ID_Shift'];
	$sql = "SELECT * FROM tb_shift_andre WHERE ID_Shift = $ID_Shift";
	$eksekusi = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_assoc($eksekusi);

	if (isset($_POST['submit'])) {
		if (ubahShift($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Diubah','success');
			header("Location: shift_tampil.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Diubah','error');
			header("Location: shift_tampil.php");
			die;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Shift</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #005082;">
				<form method="POST">
					<h3 class="mt-3">TUTUP SHIFT</h3>
					<div class="form-group">
						<label for="ID_Shift">ID Shift:</label>
						<input type="number" class="form-control" value="<?= $data['ID_Shift']; ?>" disabled>
						<input type="hidden" class="form-control" name="ID_Shift" value="<?= $data['ID_Shift']; ?>">
					</div>
					<div class="form-group">
						<label for="SaldoAwal">Saldo Awal</label>
						<input type="number" class="form-control" value="<?= $data['SaldoAwal']; ?>" disabled>
					</div>
					<div class="form-group">
						<label for="JumlahPenjualan">Jumlah Penjualan:</label>
						<input type="number" class="form-control" name="JumlahPenjualan" value="<?= $data['JumlahPenjualan']; ?>" required>
					</div>
					<div class="form-group">
						<label for="SaldoAkhir">Saldo Akhir</label>
						<input type="number" class="form-control" name="SaldoAkhir" value="<?= $data['SaldoAkhir']; ?>" required>
					</div>
					<input type="hidden" class="form-control" value="<?= date('Y-m-d\TH:i:s'); ?>" name="WaktuTutup" required>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">SIMPAN <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary" href="shift_tampil.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>