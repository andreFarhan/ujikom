<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$sql = "SELECT * FROM tb_shift_andre
	INNER JOIN tb_kasir_andre ON tb_kasir_andre.ID_Kasir = tb_shift_andre.ID_Kasir
	ORDER BY tb_shift_andre.ID_Shift DESC";
	$eksekusi = mysqli_query($koneksi, $sql);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shift</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h3 class="mt-3">Pengelolaan Shift</h3>
				<table class="table table-striped" id="Table">
					<thead class="text-white" style="background-color: #0F67B1">
						<tr>
							<th>ID Shift</th>
							<th>Nama Kasir</th>
							<th>Waktu Buka</th>
							<th>Saldo Awal</th>
							<th>Jumlah Penjualan</th>
							<th>Saldo Akhir</th>
							<th>Waktu Tutup</th>
							<th>Status</th>
							<th width="1%">AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; while ($data = mysqli_fetch_array($eksekusi)) : ?>
						<tr>
							<td><?= $data['ID_Shift']; ?></td>
							<td><?= ucwords($data['NamaKasir']); ?></td>
							<td><?= $data['WaktuBuka']; ?></td>
							<td>Rp <?= str_replace(",", ".", number_format($data['SaldoAwal'])); ?></td>
							<td><?= $data['JumlahPenjualan']; ?></td>
							<td>Rp <?= str_replace(",", ".", number_format($data['SaldoAkhir'])); ?></td>
							<td><?= $data['WaktuTutup']; ?></td>
							<td><?= $data['Status']; ?></td>
							<td>
								<a onclick="return confirm('Apakah Anda ingin menutup Shift ini?')" href="shift_ubah.php?ID_Shift=<?= $data['ID_Shift']; ?>" class="badge badge-success"><i class="fa fa-edit"></i></a>
								<a onclick="return confirm('Apakah Anda ingin menghapus ID Shift <?= $data['ID_Shift']; ?> ?')" href="shift_hapus.php?ID_Shift=<?= $data['ID_Shift']; ?>" class="badge badge-danger"><i class="fa fa-trash"></i></a>
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