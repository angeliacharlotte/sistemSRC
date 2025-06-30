<?php

session_start();

if(!isset($_SESSION["ssLoginPOS"])) {
  header("location: ../auth/login.php");
  exit();
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-setoran.php";

$title = "Form Setoran - Inventory";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";



if(isset($_POST['simpan'])){  
    if (insert_bandung2($_POST)) {
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
            <h1 class="m-0">Area Bandung2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $main_url ?>barang">Barang</a></li>
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
                     <h3 class="card-title"><i class="fas fa-pen fa-sm"></i> Input Setoran</h3>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i>  Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i>  Reset</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 mb-3 pr-3">
                            <div class="form-group">
                            <label for="kode">Kode Setoran</label>
                            <input type="text" class="form-control" id="id_setoran" name="id_setoran" value="<?=  generateIdBandung2()  ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Tanggal *</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" value="" >
                        </div>
                        <div class="form-group">
                            <label for="name">Transaksi *</label>
                            <input type="text" name="transaksi" class="form-control" id="transaksi" placeholder="transaksi" value="" autocomplete="off" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="name">Pengirim *</label>
                            <input type="text" name="pengirim" class="form-control" id="pengirim" placeholder="Pengirim" value="" autocomplete="off" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="name">Penerima *</label>
                            <input type="text" name="penerima" class="form-control" id="penerima" placeholder="Penerima" value="" autocomplete="off" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="periode">Periode *</label>
                            <input type="text" name="periode" class="form-control" id="periode" placeholder="Periode" value="" autocomplete="off" autofocus required>
                        </div>
                        </div>
                        <div class="col-lg-5 px-3 ml-5 ">
                        <div class="form-group">
                            <label for="pemasukan">Pemasukan *</label>
                            <input type="number" name="pemasukan" class="form-control" id="pemasukan" value="" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="pengeluaran">Pengeluaran *</label>
                            <input type="number" name="pengeluaran" class="form-control" id="pengeluaran" placeholder="Rp 0" autocomplete="off" required>
                        </div>
                        <div class="form-group text-center">
                            <label for="pengeluaran">Keterangan Pengeluaran *</label>
                            <textarea name="ktr" id="ktr" rows="5" class="form-control" placeholder="Masukkan keterangan lengkap..."></textarea>
                        </div>
                        <div class="text-center">
                            <img src="<?= $main_url ?>asset/image/transaction.png  ?>" class="profile-user-img mb-3 mt-4" alt="">
                            <input type="file" class="form-control" name="image">
                            <span class="text-sm">Type file gambar JPG | JPEG | PNG </span>
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