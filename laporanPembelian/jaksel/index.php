<?php

session_start();

if(!isset($_SESSION["ssLoginPOS"])) {
  header("location: ../auth/login.php");
  exit();
}

require "../../config/config.php";
require "../../config/functions.php";
require "../../module/mode-barang.php";

$title = "Laporan Pembelian - Inventory";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php";

if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg ='';
}

$alert = '';


if(empty($_GET['tanggal_dari'])) {  
  $tanggal_hari_ini = date('Y-m-d');
  $result = mysqli_query($koneksi,"SELECT tbl_beli_detail_jaksel.*, tbl_beli_head_jaksel.suplier, tbl_beli_head_jaksel.keterangan,  tbl_beli_head_jaksel.total
        FROM tbl_beli_detail_jaksel JOIN tbl_beli_head_jaksel ON tbl_beli_detail_jaksel.no_beli = tbl_beli_head_jaksel.no_beli WHERE tbl_beli_detail_jaksel.tgl_beli = '$tanggal_hari_ini' ORDER BY tbl_beli_detail_jaksel.tgl_beli DESC");
}else if(empty($_GET['tanggal_sampai'])){
  $tanggal_dari = $_GET['tanggal_dari'];
  $tanggal_hari_ini = date('Y-m-d');
//   $tanggal_sampai = $_GET['tanggal_sampai'];
  $result = mysqli_query($koneksi,"SELECT tbl_beli_detail_jaksel.*, tbl_beli_head_jaksel.suplier, tbl_beli_head_jaksel.keterangan,  tbl_beli_head_jaksel.total
        FROM tbl_beli_detail_jaksel JOIN tbl_beli_head_jaksel ON tbl_beli_detail_jaksel.no_beli = tbl_beli_head_jaksel.no_beli WHERE tbl_beli_detail_jaksel.tgl_beli BETWEEN '$tanggal_dari' AND '$tanggal_hari_ini' ORDER BY tbl_beli_detail_jaksel.tgl_beli DESC");
}else{
    $tanggal_dari = $_GET['tanggal_dari'];
  $tanggal_sampai = $_GET['tanggal_sampai'];
  $result = mysqli_query($koneksi,"SELECT tbl_beli_detail_jaksel.*, tbl_beli_head_jaksel.suplier, tbl_beli_head_jaksel.keterangan,  tbl_beli_head_jaksel.total
        FROM tbl_beli_detail_jaksel JOIN tbl_beli_head_jaksel ON tbl_beli_detail_jaksel.no_beli = tbl_beli_head_jaksel.no_beli WHERE tbl_beli_detail_jaksel.tgl_beli BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_beli_detail_jaksel.tgl_beli DESC");
}

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
            <h1 class="m-0">Laporan Pembelian Area Jakarta Selatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="<?= $main_url ?>pembelian/jaksel">Pembelian</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <?php if($alert != '') {
                    echo $alert;
                }?>
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Laporan Pembelian</h3>
                </div>
                <div class="row mt-2 m-3">
                    <div class="col-md-2">
                    <button type="button" class="btn btn-primary  " data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Ekspor Excel</button>
                    </div>
                    <div class="col-md-10">
                        <form method="GET">
                            <div class="input-group">
                                <input type="date" class="form-control" name="tanggal_dari">
                                <input type="date" class="form-control" name="tanggal_sampai">
                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-3">
                    <?php if(empty($_GET['tanggal_dari']) && empty($_GET['tanggal_sampai'])) : ?>
                        <span>Laporan Pembelian Tanggal : <?= date('d F Y') ?></span>
                        <?php elseif (!empty($_GET['tanggal_dari']) && empty($_GET['tanggal_sampai'])) : ?>
                        <span>Laporan Pembelian Tanggal : <?= date('d F Y', strtotime($_GET['tanggal_dari'])) . ' sampai ' . date('d F Y') ?></span>
                        <?php else : ?>
                        <span>Laporan Pembelian Tanggal : <?= date('d F Y', strtotime($_GET['tanggal_dari'])) . ' sampai ' . date('d F Y', strtotime($_GET['tanggal_sampai'])) ?></span>
                        <?php endif; ?>

                    <table class="table table-hover text-nowrap mt-2">
                        <thead>
                            <tr>
                                <th>No Nota</th>
                                <th>Tanggal</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>QTY</th>
                                <th>Supplier</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while($brg = mysqli_fetch_array($result)) :
                             ?>
                                <tr>
                                    <td><?= $brg['no_beli'] ?></td>
                                    <td><?= date('d F Y', strtotime($brg['tgl_beli'])) ?></td>
                                    <td><?= $brg['kode_brg'] ?></td>
                                    <td><?= $brg['nama_brg'] ?></td>
                                    <td><?= $brg['qty'] ?></td>
                                    <td><?= $brg['suplier'] ?></td>
                                    <td class="text-center"><?= number_format($brg['harga_beli'],0,',','.' )?></td>
                                    <td class="text-center"><?= number_format($brg['total'],0,',','.' )?></td>
                                    <td><?= $brg['keterangan'] ?></td>

                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="modal" id="exampleModal" tabindex="-1">
                        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Export Excel Presensi Harian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <form method="POST" action="<?= $main_url ?>laporanPembelian/jaksel/rekap_pembelian_excel.php">
        <div class="modal-body">
            <div class="mb-3">
                <label for="">Tanggal Awal</label>
                <input type="date" class="form-control" name="tanggal_dari">
            </div>
            <div class="mb-3">
                <label for="">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tanggal_sampai">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger me-auto"
            data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success"
            data-bs-dismiss="modal">Export</button>
        </div>
        </form>
        </div>
        </div>
        </div>
    </section>



<?php

require "../../template/footer.php";

?>