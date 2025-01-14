<?php 
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$ID_Shift = $_GET['ID_Shift'];

	if (hapusShift($ID_Shift) > 0) {
		setAlert('Berhasil!','Data Berhasil Dihapus','success');
		header("Location: shift_tampil.php");
		die;
	}
	else{
		setAlert('Gagal!','Data Gagal Dihapus','error');
		header("Location: shift_tampil.php");
		die;
	}
 ?>