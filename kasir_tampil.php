<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$sql = "SELECT * FROM tb_kasir_andre";
	$eksekusi = mysqli_query($koneksi, $sql);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kasir</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5">
		<h3 class="mt-3">Pengelolaan Kasir</h3>
		<table class="table table-striped" id="Table">
			<thead class="text-white" style="background-color: #0F67B1">
				<tr>
					<th>ID Kasir</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Nomor HP</th>
					<th>Nomor KTP</th>
					<th width="1%">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; while ($data = mysqli_fetch_array($eksekusi)) : ?>
				<tr>
					<td><?= $data['ID_Kasir']; ?></td>
					<td><?= $data['Username']; ?></td>
					<td><?= ucwords($data['NamaKasir']); ?></td>
					<td><?= $data['Alamat']; ?></td>
					<td><?= $data['NomorHP']; ?></td>
					<td><?= $data['NomorKTP']; ?></td>
					<td>
						<a href="kasir_ubah.php?ID_Kasir=<?= $data['ID_Kasir']; ?>" class="badge badge-success"><i class="fa fa-edit"></i></a>
						<a onclick="return confirm('Apakah Anda Ingin Menghapus <?= ucwords($data['NamaKasir']); ?> ?')" href="kasir_hapus.php?ID_Kasir=<?= $data['ID_Kasir']; ?>" class="badge badge-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php endwhile ?>
			</tbody>
		</table>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>
