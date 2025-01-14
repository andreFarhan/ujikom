<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$sql = "SELECT * FROM tb_barang_andre";
	$eksekusi = mysqli_query($koneksi, $sql);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Barang</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h3 class="mt-3">Pengelolaan Barang</h3>
				<table class="table table-striped" id="Table">
					<thead class="text-white" style="background-color: #0F67B1">
						<tr>
							<th>ID Barang</th>
							<th>Nama Barang</th>
							<th>Satuan</th>
							<th>Harga Satuan</th>
							<th width="1%">AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; while ($data = mysqli_fetch_array($eksekusi)) : ?>
						<tr>
							<td><?= $data['ID_Barang']; ?></td>
							<td><?= ucwords($data['NamaBarang']); ?></td>
							<td><?= $data['Satuan']; ?></td>
							<td>Rp <?= str_replace(",", ".", number_format($data['HargaSatuan'])); ?></td>
							<td>
								<a href="barang_ubah.php?ID_Barang=<?= $data['ID_Barang']; ?>" class="badge badge-success"><i class="fa fa-edit"></i></a>
								<a onclick="return confirm('Apakah anda ingin menghapus barang <?= $data['NamaBarang']; ?> ?')" href="barang_hapus.php?ID_Barang=<?= $data['ID_Barang']; ?>" class="badge badge-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php endwhile ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>