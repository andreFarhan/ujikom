<?php  
	
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$ID_Barang = $_GET['ID_Barang'];
	$sql = "SELECT * FROM tb_barang_andre WHERE ID_Barang = $ID_Barang";
	$eksekusi = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_assoc($eksekusi);

	if (isset($_POST['submit'])) {
		if (ubahBarang($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Diubah','success');
			header("Location: barang_tampil.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Diubah','error');
			header("Location: barang_tampil.php");
			die;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Barang</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #005082;">
				<form method="POST">
					<h3 class="mt-3">UBAH DATA BARANG</h3>
					<div class="form-group">
						<label for="ID_Barang">ID Barang:</label>
						<input type="number" class="form-control" value="<?= $data['ID_Barang']; ?>" disabled>
						<input type="hidden" class="form-control" name="ID_Barang" value="<?= $data['ID_Barang']; ?>">
					</div>
					<div class="form-group">
						<label for="NamaBarang">Nama Barang:</label>
						<input type="text" class="form-control" name="NamaBarang" value="<?= $data['NamaBarang']; ?>" required>
					</div>
					<div class="form-group">
						<label for="NamaBarang">Nama Barang:</label>
						<input type="text" class="form-control" name="NamaBarang" value="<?= $data['NamaBarang']; ?>" required>
					</div>
					<div class="form-group">
						<label for="Satuan">Satuan:</label>
						<input type="text" class="form-control" name="Satuan" value="<?= $data['Satuan']; ?>" required>
					</div>
					<div class="form-group">
						<label for="HargaSatuan">Harga Satuan</label>
						<input type="number" class="form-control" name="HargaSatuan" value="<?= $data['HargaSatuan']; ?>" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">UBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary" href="barang_tampil.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>