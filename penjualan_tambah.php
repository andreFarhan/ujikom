<?php 
    include 'functions.php';

    $query = mysqli_query($koneksi, "SELECT * FROM tb_barang_andre");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/Icon/logo-desa-dangdang.png">
    <title>Data Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4 mt-2">
                        <div class="card-header">
                            <h1 class="mt-1">MENU TOKO</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <div class="row">

                                <?php foreach($result as $result) : ?>
                                <div class="col-md-3 mt-4">
                                  <div class="card brder-dark">
                                    <div class="card-body">
                                      <h5 class="card-title font-weight-bold"><?= $result['NamaBarang'] ?></h5>
                                     <label class="card-text">Harga Satuan
                                        <strong>Rp. <?= number_format($result['HargaSatuan']); ?></strong>
                                     </label><br>
                                    <form action="beli.php" method="GET">
                                        <input type="hidden" name="ID_Barang" value="<?= $result['ID_Barang']; ?>">
                                        <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                                            </div>
                                            
                                            <input type="text" name="jumlah" class="form-control text-center quantity-amount" value="1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm btn-block">BELI</button>
                                    </form>
                                    </div>
                                  </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'footer.php'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="bootstrap/js/datatables-simple-demo.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/tiny-slider.js"></script>
    <script src="bootstrap/js/custom.js"></script>

</body>
</html>