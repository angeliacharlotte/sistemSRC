<?php

session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
  header("Location: ../../auth/login.php?pesan=belum_login");
} elseif ($_SESSION["level"] != '1') {
  header("Location: ../../error-page.php?pesan=tolak_akses");
}

require "../../config/config.php";
require "../../config/functions.php";

$title = "Update Piutang - Inventory";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php";

// if (!isset($_GET['no_jual'])) {
//     die('Nomor jual tidak ditemukan.');
// }

$no_jual = ($_GET['no_jual']);

$sql = "SELECT 
            jh.no_jual,
            jh.tgl_jual,
            jh.customer,
            jh.jml_bayar,
            jh.keterangan,
            SUM(jd.qty * jd.harga_jual) AS total_tagihan,
            GROUP_CONCAT(CONCAT(jd.kode_brg, ' - ', jd.nama_brg, ' (', jd.qty, ' x ', jd.harga_jual, ')') SEPARATOR '<br>') AS detail_barang
        FROM tbl_jual_head jh
        JOIN tbl_jual_detail jd ON jh.no_jual = jd.no_jual
        WHERE jh.no_jual = '$no_jual'
        GROUP BY jh.no_jual";

$data = mysqli_fetch_assoc(mysqli_query($koneksi, $sql));

if (isset($_POST['simpan'])) {
    $bayar_baru = intval($_POST['jml_bayar']);
    $keterangan = $_POST['keterangan'];

    $sql_update = "UPDATE tbl_jual_head 
                   SET jml_bayar = '$bayar_baru', keterangan = '$keterangan'
                   WHERE no_jual = '$no_jual'";

    if (mysqli_query($koneksi, $sql_update)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}
$total_tagihan = $data['total_tagihan'];
$sisa_tagihan = $total_tagihan - $data['jml_bayar'];


?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $main_url ?>user/data-user.php">Users</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-pen fa-sm"></i> Edit User</h3>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i>  Koreksi</button>
                <a href="index.php" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i>  Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">                    
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label >No Jual</label>
                            <input type="text" class="form-control" readonly value="<?= $data['no_jual'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="text" class="form-control" readonly value="<?= $data['tgl_jual'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Customer</label>
                            <input type="text" class="form-control" readonly value="<?= $data['customer'] ?>">
                          </div>
                          <div class="form-group">
                            <label>Detail Barang</label>
                            <p class="form-control" readonly style="height:auto; white-space:normal;"> <?= $data['detail_barang'] ?> </p>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">                            
                        <div class="form-group">
                          <label>Total</label>
                          <input type="text" class="form-control" readonly value="<?= number_format($total_tagihan, 0, ',', '.') ?>">
                        </div>
                        <div class="form-group">
                          <label>Total Tagihan</label>
                          <input type="text" class="form-control" readonly value="<?= number_format($sisa_tagihan, 0, ',', '.') ?>">
                        </div>
                        <div class="form-group">
                          <label>Total Dibayar</label>
                          <input type="number" class="form-control" name="jml_bayar" value="">
                        </div>
                        <div class="form-group">
                          <label>Keterangan</label>
                          <select name="keterangan" class="form-control">
                            <option value="Belum Lunas" <?= $data['keterangan'] === 'Belum Lunas' ? 'selected' : '' ?>>Belum Lunas</option>
                            <option value="Lunas" <?= $data['keterangan'] === 'Lunas' ? 'selected' : '' ?>>Lunas</option>
                          </select>
                        </div>
                      </div>
                </div>
            </div>
            </form>
        </div>
    </div>


</section>

<?php

require "../../template/footer.php";

?>