<?php

session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
  header("Location: ../../auth/login.php?pesan=belum_login");
} elseif ($_SESSION["level"] != '3' && $_SESSION["level"] != '1') {
  header("Location: ../../error-page.php?pesan=tolak_akses");
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-barang.php";

$title = "Barang - Inventory";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg ='';
}

$alert = '';
// jalankan fungsi hapus barang
if($msg =='deleted') {
    $id = $_GET['id'];
    $gbr = $_GET['gbr'];
    delete_cirebon($id, $gbr);
    $alert = "<script>
            $(document).ready(function(){
                $(document).Toasts('create',{
                        title : 'Sukses',
                        body : 'Data barang berhasil dihapus dari database..',
                        class : 'bg-success',
                        icon : 'fas fa-check-circle',
                 })

            });
            </script>";
}

if($msg =='updated') {
    $user = userLogin()['username'];
    $gbrUser = userLogin()['foto'];
    $alert = "<script>
            $(document).ready(function(){
                $(document).Toasts('create',{
                        title : '$user',
                        body : 'Data barang berhasil diperbarui ..',
                        class : 'bg-success',
                        image : '../asset/image/$gbrUser',
                        position : 'bottomRight',
                        autohide : true,
                        delay : 5000,
                 })

            });
            </script>";
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Area Cirebon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="<?= $main_url ?>operator/cirebon">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Barang</li>
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
                    <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Data Barang</h3>
                    <a href="<?= $main_url ?>barang/form-barang-cirebon.php" class="mr-2 btn btn-sm btn-primary float-right"><i class="fas fa-plus fa-sm"></i> Add Barang</a>
                </div>
                <div class="card-body table-responsive p-3">
                    <table class="table table-hover text-nowrap" id="tblData">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stock</th>
                                <th>Satuan</th>
                                <th style="width:10%;" class="text-center">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $barang = getData("SELECT * FROM tbl_barang_cirebon");
                            foreach($barang as $brg){ ?>
                                <tr>
                                    <td>
                                        <img src="../asset/image/<?= $brg['gambar']?>" alt="gambar barang" class="rounded-circle" width="60px">
                                    </td>
                                    <td><?= $brg['id_barang'] ?></td>
                                    <td><?= $brg['nama_barang'] ?></td>
                                    <td><?= number_format($brg['harga_beli'],0,',','.' )?></td>
                                    <td ><?= number_format($brg['harga_jual'],0,',','.' )?></td>
                                    <td><?= $brg['stock'] ?></td>
                                    <td><?= $brg['satuan'] ?></td>
                                    <td class="text-center">
                                        <a href="form-barang-cirebon.php?id=<?= $brg['id_barang'] ?>&msg=editing" class="btn btn-warning btn-sm" title="edit barang" ><i class="fas fa-pen"></i></a>
                                        <a href="?id=<?= $brg['id_barang'] ?>&gbr=<?= $brg['gambar']?>&msg=deleted" class="btn btn-danger btn-sm" title="hapus barang" onclick="return confirm('Anda yakin akan menghapus barang ini?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>



<?php

require "../template/footer.php";

?>