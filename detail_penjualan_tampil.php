<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}
	$ID_Penjualan = $_GET['ID_Penjualan'];

	$sql = "SELECT * FROM tb_detail_penjualan_andre
	INNER JOIN tb_barang_andre ON tb_barang_andre.ID_Barang = tb_detail_penjualan_andre.ID_Barang
	INNER JOIN tb_penjualan_andre ON tb_penjualan_andre.ID_Penjualan = tb_detail_penjualan_andre.ID_Penjualan
	INNER JOIN tb_shift_andre ON tb_shift_andre.ID_Shift = tb_penjualan_andre.ID_Shift
	INNER JOIN tb_kasir_andre ON tb_kasir_andre.ID_Kasir = tb_shift_andre.ID_Kasir
	WHERE tb_penjualan_andre.ID_Penjualan = '$ID_Penjualan'
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
							<th>ID Penjualan</th>
							<th>Nama Barang</th>
							<th>Kuantitas</th>
							<th>Harga Satuan</th>
							<th>Sub Total</th>
							<th>Nama Kasir</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; $Total=0; while ($data = mysqli_fetch_array($eksekusi)) : ?>
						<tr>
							<td><?= $data['ID_Penjualan']; ?></td>
							<td><?= $data['NamaBarang']; ?></td>
							<td><?= $data['Kuantitas']; ?></td>
							<td>Rp <?= str_replace(",", ".", number_format($data['HargaSatuan'])); ?></td>
							<?php $Sub_total = $data['Kuantitas']*$data['HargaSatuan']; ?>
							<td>Rp <?= str_replace(",", ".", number_format($Sub_total)); ?></td>
							<td><?= ucwords($data['NamaKasir']); ?></td>
						</tr>
							<?php $Total+=$Sub_total; ?>
						<?php endwhile ?>
						<tr>
							<td colspan="3"></td>
							<td style="text-align: right; background-color: #0F67B1; color: white;"><strong>Total: </strong></td>
							<td><strong>Rp <?= str_replace(",", ".", number_format($Total)); ?></strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>