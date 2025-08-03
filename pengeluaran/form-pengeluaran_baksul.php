<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["ssLoginPOS"])) {
  header("Location: ../../auth/login.php?pesan=belum_login");
} elseif ($_SESSION["level"] != '1') {
  header("Location: ../../error-page.php?pesan=tolak_akses");
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-pengeluaran.php";

$title = "Form pengeluaran - Inventory";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";



if (empty($_GET['tanggal_dari'])) {
    $tanggal = date('Y-m-d');
}else{
    $tanggal = $_GET['tanggal_dari'] . '-' . $_GET['tanggal_sampai'];
}


if(isset($_POST['simpan'])){  
    if (insert_baksul($_POST)) {
         $alert = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Barang berhasil ditambahkan ..
                </div>';
    }
} 

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Area Baksul</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $main_url ?>pengeluaran/">Pengeluaran</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                     <h3 class="card-title"><i class="fas fa-pen fa-sm"></i> Input Laporan Pengeluaran</h3>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i>  Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i>  Reset</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 mb-3 pr-3">
                            <div class="form-group"> 
                            <label for="kode">Kode Setoran</label>
                            <input type="text" class="form-control" id="id_pengeluaran" name="id_pengeluaran" value="<?=  generateIdbaksul()  ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Tanggal *</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" value="" >
                        </div>
                        <div class="form-group">
                            <label for="gaji">Gaji Pegawai *</label>
                            <input type="number" name="gaji" class="form-control" id="gaji" value="" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="iqos">Initial Support Iqos *</label>
                            <input type="number" name="iqos" class="form-control" id="iqos" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="listrik">Biaya Listrik *</label>
                            <input type="number" name="listrik" class="form-control" id="listrik" value="" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        </div>
                        <div class="col-lg-5 px-3 ml-5 ">
                          <div class="form-group">
                            <label for="sewa">Biaya Sewa Iqos *</label>
                            <input type="number" name="sewa" class="form-control" id="sewa" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="internet">Internet&Pulsa *</label>
                            <input type="number" name="internet" class="form-control" id="internet" value="" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="saldo_awal">Saldo Awal Rekening Baru *</label>
                            <input type="number" name="saldo_awal" class="form-control" id="saldo_awal" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="invoice">Pembayaran Invoice *</label>
                            <input type="number" name="invoice" class="form-control" id="invoice" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="lainnya">Biaya Operasional Lainnya *</label>
                            <input type="number" name="lainnya" class="form-control" id="lainnya" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

<?php


require "../template/footer.php";

?>