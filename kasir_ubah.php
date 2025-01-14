<?php  
	
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$ID_Kasir = $_GET['ID_Kasir'];
	$sql = "SELECT * FROM tb_kasir_andre WHERE ID_Kasir = $ID_Kasir";
	$eksekusi = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_assoc($eksekusi);

	if (isset($_POST['submit'])) {
		if (ubahKasir($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Diubah','success');
			header("Location: kasir_tampil.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Diubah','error');
			header("Location: kasir_tampil.php");
			die;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Kasir</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #005082;">
				<form method="POST">
					<h3 class="mt-3">UBAH DATA KASIR</h3>
					<div class="form-group">
						<label for="ID_Kasir">ID Kasir:</label>
						<input type="number" class="form-control" value="<?= $data['ID_Kasir']; ?>" disabled>
						<input type="hidden" class="form-control" name="ID_Kasir" value="<?= $data['ID_Kasir']; ?>">
					</div>
					<div class="form-group">
						<label for="Username">Username:</label>
						<input type="text" class="form-control" value="<?= $data['Username']; ?>" disabled>
						<input type="hidden" class="form-control" name="Username" value="<?= $data['Username']; ?>">
					</div>
					<div class="form-group">
						<label for="Password_lama">PASSWORD LAMA</label>
						<input type="Password" class="form-control" name="Password_lama" placeholder="Masukkan Password Lama" required>
					</div>
					<div class="form-group">
						<label for="Password">PASSWORD</label>
						<input type="Password" class="form-control" name="Password" placeholder="Masukkan Password Baru" required>
					</div>
					<div class="form-group">
						<label for="Password2">KONFIRMASI PASSWORD</label>
						<input type="Password" class="form-control" name="Password2" placeholder="Masukkan Konfirmasi Password Baru" required>
					</div>
					<div class="form-group">
						<label for="NamaKasir">Nama kasir:</label>
						<input type="text" class="form-control" name="NamaKasir" value="<?= $data['NamaKasir']; ?>" required>
					</div>
					<div class="form-group">
						<label for="Alamat">Alamat:</label>
						<textarea name="Alamat" class="form-control" required><?= $data['Alamat']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="NomorHP">Nomor HP:</label>
						<input type="text" class="form-control" name="NomorHP" value="<?= $data['NomorHP']; ?>" required>
					</div>
					<div class="form-group">
						<label for="NomorKTP">Nomor KTP:</label>
						<input type="number" class="form-control" name="NomorKTP" value="<?= $data['NomorKTP']; ?>" required>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">UBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary" href="kasir_tampil.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>