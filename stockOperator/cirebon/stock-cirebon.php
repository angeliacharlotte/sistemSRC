<?php

session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
  header("Location: ../../auth/login.php?pesan=belum_login");
} elseif ($_SESSION["level"] != '6' && $_SESSION["level"] != '1') {
  header("Location: ../../error-page.php?pesan=tolak_akses");
}

require "../../config/config.php";
require "../../config/functions.php";
require "../../module/mode-barang.php";


$title = "Mutasi Stock - Inventory";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php"; 

$stockBrg = getData("SELECT * FROM  tbl_barang_cirebon");




if (empty($_GET['tanggal_dari'])) {
    $tanggal = date('Y-m-d');
}else{
    $tanggal = $_GET['tanggal_dari'] . '-' . $_GET['tanggal_sampai'];
    
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Stock Area Cirebon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="<?= $main_url ?>pembelian/cirebon">Pembelian</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Stock</h3>
                </div>
                
                <div class="card-body table-responsive p-3">                    
                    <table class="table table-hover text-nowrap mt-2 text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Jumlah Stock</th>
                                <th>Minimal Stock</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($stockBrg as $stock){
                             ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $stock['id_barang'] ?></td>
                                    <td><?= $stock['nama_barang'] ?></td>
                                    <td><?= $stock['satuan'] ?></td>
                                    <td><?= $stock['stock'] ?></td>
                                    <td><?= $stock['stock_minimal'] ?></td>
                                    <td>
                                        <?php
                                        if($stock['stock'] < $stock['stock_minimal']){
                                            echo '<span class="text-danger">Stock Kurang</span>';
                                        }else{
                                            echo'<span class="text-success">Stock Cukup</span>';
                                        }
                                        
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            };
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>

<?php

require "../../template/footer.php";

?>