<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}


	$sql = "SELECT * FROM tb_penjualan_andre
	INNER JOIN tb_shift_andre ON tb_shift_andre.ID_Shift = tb_penjualan_andre.ID_Shift
	INNER JOIN tb_kasir_andre ON tb_kasir_andre.ID_Kasir = tb_shift_andre.ID_Kasir
	ORDER BY tb_penjualan_andre.ID_Penjualan DESC";
	$eksekusi = mysqli_query($koneksi, $sql);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Penjualan</title>
	<link rel="icon" href="img/logo-kasir.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h3 class="mt-3">Pengelolaan Penjualan</h3>
				<table class="table table-striped" id="Table">
					<thead class="text-white" style="background-color: #0F67B1">
						<tr>
							<th>ID Shift</th>
							<th>ID Penjualan</th>
							<th>Tanggal</th>
							<th>Jam</th>
							<th>Total</th>
							<th>Nama Kasir</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; while ($data = mysqli_fetch_array($eksekusi)) : ?>
						<tr>
							<td><?= $data['ID_Shift']; ?></td>
							<td><?= $data['ID_Penjualan']; ?></td>
							<td><?= date("Y-m-d",strtotime($data['WaktuTransaksi'])); ?></td>
							<td><?= date("H:i:s",strtotime($data['WaktuTransaksi'])); ?></td>
							<td>Rp <?= str_replace(",", ".", number_format($data['Total'])); ?></td>
							<td><?= ucwords($data['NamaKasir']); ?></td>
							<td>
								<a href="detail_penjualan_tampil.php?ID_Penjualan=<?= $data['ID_Penjualan']; ?>" class="badge badge-success">Detail</a>
								<a onclick="return confirm('Apakah Anda Ingin Menghapus ID Penjualan <?= $data['ID_Penjualan']; ?> ?')" href="penjualan_hapus.php?ID_Penjualan=<?= $data['ID_Penjualan']; ?>" class="badge badge-danger"><i class="fa fa-trash"></i></a>
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