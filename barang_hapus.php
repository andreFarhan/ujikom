<?php 
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$ID_Barang = $_GET['ID_Barang'];

	if (hapusBarang($ID_Barang) > 0) {
		setAlert('Berhasil!','Data Berhasil Dihapus','success');
		header("Location: barang_tampil.php");
		die;
	}
	else{
		setAlert('Gagal!','Data Gagal Dihapus','error');
		header("Location: barang_tampil.php");
		die;
	}
 ?>