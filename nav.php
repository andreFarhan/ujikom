  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="font-awesome/css/all.min.css">

<style type="text/css">
    .container {
        margin-top: 30px;
    }
    .dropdown-toggle,
    .dropdown-menu {
        border-radius: 0px !important;
    }
    .dropdown-item:hover {
        color: white;
        background-color: #3FA2F6;
    }
    .btn-danger {
        width: 55%;
    }
    .dropdown:hover>.dropdown-menu {
      display: block;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0f4c81">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
		<?php if ($_SERVER['REQUEST_URI'] == '/ujikom_08092024_andre/dashboard.php'): ?>
		<li class="nav-item active">
		  <a class="nav-link" href="dashboard.php"><i class="fa fa-home"></i> Home</a>
		</li>
		<?php else: ?>
		<li class="nav-item">
		  <a class="nav-link" href="dashboard.php"><i class="fa fa-home"></i> Home</a>
		</li>
		<?php endif ?>

	    <?php if ($_SERVER['REQUEST_URI'] == '/ujikom_08092024_andre/kasir_tampil.php' OR $_SERVER['REQUEST_URI'] == '/ujikom_08092024_andre/kasir_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/ujikom_08092024_andre/kasir_ubah.php'): ?>
	    <li class="nav-item dropdown active">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        <i class="fa fa-user"></i><i class="fa fa-cash-register"></i> Kasir
	      </a>
	      <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="kasir_tampil.php"><i class="fa fa-user"></i><i class="fa fa-cash-register"></i> Kasir</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="kasir_tambah.php"><i class="fa fa-user"></i><i class="fa fa-cash-register"></i><strong>+</strong> Tambah Kasir</a>
	      </div>
	    </li>
	    <?php else: ?>
	    <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        <i class="fa fa-user"></i><i class="fa fa-cash-register"></i> Kasir
	      </a>
	      <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="kasir_tampil.php"><i class="fa fa-user"></i><i class="fa fa-cash-register"></i> Kasir</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="kasir_tambah.php"><i class="fa fa-user"></i><i class="fa fa-cash-register"></i><strong>+</strong> Tambah Kasir</a>
	      </div>
	    </li>
	    <?php endif ?>

	    <?php if ($_SERVER['REQUEST_URI'] == '/ujikom_08092024_andre/barang_tampil.php' OR $_SERVER['REQUEST_URI'] == '/ujikom_08092024_andre/barang_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/ujikom_08092024_andre/barang_ubah.php'): ?>
	    <li class="nav-item dropdown active">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        <i class="fa fa-box"></i> Barang
	      </a>
	      <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="barang_tampil.php"><i class="fa fa-box"></i> Barang</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="barang_tambah.php"><i class="fa fa-box"></i><strong>+</strong> Tambah Barang</a>
	      </div>
	    </li>
	    <?php else: ?>
	    <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        <i class="fa fa-box"></i> Barang
	      </a>
	      <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="barang_tampil.php"><i class="fa fa-box"></i> Barang</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="barang_tambah.php"><i class="fa fa-box"></i><strong>+</strong> Tambah Barang</a>
	      </div>
	    </li>
	    <?php endif ?>
	    
	    <?php if ($_SERVER['REQUEST_URI'] == '/ujikom_08092024_andre/shift_tampil.php'): ?>
			<li class="nav-item active">
			  <a class="nav-link" href="shift_tampil.php"><i class="fa fa-clock"></i> Shift</a>
			</li>
			<?php else: ?>
			<li class="nav-item">
			  <a class="nav-link" href="shift_tampil.php"><i class="fa fa-clock"></i> Shift</a>
			</li>
			<?php endif ?>

	    <?php if ($_SERVER['REQUEST_URI'] == '/ujikom_08092024_andre/penjualan_tampil.php' OR $_SERVER['REQUEST_URI'] == '/ujikom_08092024_andre/penjualan_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/ujikom_08092024_andre/penjualan_ubah.php'): ?>
	    <li class="nav-item dropdown active">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        <i class="fa fa-shopping-cart"></i> Penjualan
	      </a>
	      <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="penjualan_tampil.php"><i class="fa fa-shopping-cart"></i> Penjualan</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="penjualan_tambah.php"><i class="fa fa-cart-plus"></i> Tambah Penjualan</a>
	      </div>
	    </li>
	    <?php else: ?>
	    <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        <i class="fa fa-shopping-cart"></i> Penjualan
	      </a>
	      <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="penjualan_tampil.php"><i class="fa fa-shopping-cart"></i> Penjualan</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="penjualan_tambah.php"><i class="fa fa-cart-plus"></i> Tambah Penjualan</a>
	      </div>
	    </li>
	    <?php endif ?>
  
      <li class="nav-item">
        <a onclick="return confirm('Apakah anda ingin keluar?')" class="nav-link" href="logout.php"><i class="fa fa-door-open"></i> Keluar</a>
      </li>
    </ul>
      <?php 
        $Username = ucwords($_SESSION['Username']);
       ?>
       <?php if (isset($_SESSION['id_user'])): ?>
          <b class="mr-sm-2 mb-n1 text-white">Admin, <?= $Username; ?></b>
        <?php else: ?>
          <b class="mr-sm-2 mb-n1 text-white"><?= $Username; ?></b>
       <?php endif ?>
  </div>
</nav>