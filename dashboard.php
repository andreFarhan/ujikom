<?php 
    include 'functions.php';

    //cek login
    if ($_SESSION['login'] == 0) {
        header("Location: login_form.php");
    }

    if (isset($_SESSION['NamaKasir'])) {
        $nama = ucwords($_SESSION['NamaKasir']);
    }

    $sql = "SELECT * FROM tb_penjualan_andre   
    ORDER BY ID_Penjualan DESC";
    $eksekusi = mysqli_query($koneksi, $sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Management</title>
    <link rel="icon" href="img/logo-kasir.png">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="container mt-3">
        <h2></h2>
    <div class="alert alert-info text-center">
        <h4><b>Selamat Datang <b><?= $nama; ?></b></b></h4>
    </div>
        <div class="row" style="width: 25%;">
            <a href="shift_tambah.php">
                <div class="col mx-1 text-white bg-info rounded pt-2 pb-2">
                    <h1>
                        <i class="fa fa-clock"></i>
                        <span class="pull-right">
                            Buka Shift
                        </span>
                    </h1>
                </div>      
            </a>
        </div>
               
</div>
    
</body>

<?php include 'footer.php'; ?>

</html>