<?php

session_start();

if(!isset($_SESSION["ssLoginPOS"])) {
  header("location: ../auth/login.php");
  exit();
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
$cabang = $_GET['cabang'] ?? '';

// Query berdasarkan select
if ($cabang === 'Purwakarta') {
    $query = "SELECT * FROM tbl_barang";
} elseif($cabang === 'Bekasi') {
    $query = "SELECT * FROM tbl_barang_bekasi";
}elseif($cabang === 'Bandung') {
    $query = "SELECT * FROM tbl_barang_bandung";
}elseif($cabang === 'Bandung2') {
    $query = "SELECT * FROM tbl_barang_bandung2";
}elseif($cabang === 'Cirebon') {
    $query = "SELECT * FROM tbl_barang_cirebon";
}elseif($cabang === 'Garut') {
    $query = "SELECT * FROM tbl_barang_garut";
}elseif($cabang === 'JakartaBarat') {
    $query = "SELECT * FROM tbl_barang_jakbar";
}elseif($cabang === 'JakartaSelatan') {
    $query = "SELECT * FROM tbl_barang_jaksel";
}elseif($cabang === 'JakartaPusat') {
    $query = "SELECT * FROM tbl_barang_jakpus";
}elseif($cabang === 'JakartaTimur') {
    $query = "SELECT * FROM tbl_barang_jaktim";
}elseif($cabang === 'Tangerang') {
    $query = "SELECT * FROM tbl_barang_tangerang";
}elseif($cabang === 'Tasikmalaya') {
    $query = "SELECT * FROM tbl_barang_tasik";
} else {
    $query = "";
}

$result = $query ? mysqli_query($koneksi, $query) : null;
// jalankan fungsi hapus barang
if($msg =='deleted') {
    $id = $_GET['id'];
    $gbr = $_GET['gbr'];
    delete($id, $gbr);
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
            <h1 class="m-0">Area Purwakarta</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="<?= $main_url ?>barang">Barang</a></li>
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
                    <a href="<?= $main_url ?>barang/form-barang.php" class="mr-2 btn btn-sm btn-primary float-right"><i class="fas fa-plus fa-sm"></i> Add Barang</a>
                </div>
                <div class="card-body table-responsive p-3">
                  <form method="GET" class="d-flex align-items-center gap-2 mb-3 ">
            <div class="col-md-2">
            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Add Barang</button></div>
            <select class="form-select" name="cabang" required>
              <option value="" disabled <?= $cabang == '' ? 'selected' : '' ?>>Pilih Area Cabang</option>
              <option value="Purwakarta" <?= $cabang == 'Purwakarta' ? 'selected' : '' ?>>Purwakarta</option>
              <option value="Bekasi" <?= $cabang == 'Bekasi' ? 'selected' : '' ?>>Bekasi</option>
              <option value="Bandung" <?= $cabang == 'Bandung' ? 'selected' : '' ?>>Bandung</option>
              <option value="Bandung2" <?= $cabang == 'Bandung2' ? 'selected' : '' ?>>Bandung2</option>
              <option value="Cirebon" <?= $cabang == 'Cirebon' ? 'selected' : '' ?>>Cirebon</option>
              <option value="Garut" <?= $cabang == 'Garut' ? 'selected' : '' ?>>Garut</option>
              <option value="JakartaBarat" <?= $cabang == 'JakartaBarat' ? 'selected' : '' ?>>Jakarta Barat</option>
              <option value="JakartaPusat" <?= $cabang == 'JakartaPusat' ? 'selected' : '' ?>>Jakarta Pusat</option>
              <option value="JakartaSelatan" <?= $cabang == 'JakartaSelatan' ? 'selected' : '' ?>>Jakarta Selatan</option>
              <option value="JakartaTimur" <?= $cabang == 'JakartaTimur' ? 'selected' : '' ?>>Jakarta Timur</option>
              <option value="Tangerang" <?= $cabang == 'Tangerang' ? 'selected' : '' ?>>Tangerang</option>
              <option value="Tasikmalaya" <?= $cabang == 'Tasikmalaya' ? 'selected' : '' ?>>Tasikmalaya</option>
              <!-- Tambah area lain di sini -->
            </select>
            <button type="submit" class="btn btn-primary">Tampilkan</button>
          </form>

          <?php if ($cabang !== '') : ?>
            <span>Laporan Setoran Area: <strong><?= htmlspecialchars($cabang) ?></strong></span>
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
                            if ($result && mysqli_num_rows($result) > 0) :
                  while($str = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td>
                                        <img src="../asset/image/<?= $str['gambar']?>" alt="gambar barang" class="rounded-circle" width="60px">
                                    </td>
                                    <td style="vertical-align: middle;"><?= $str['id_barang'] ?></td>
                                    <td style="vertical-align: middle;"><?= $str['nama_barang'] ?></td>
                                    <td style="vertical-align: middle;" class="text-center"><?= number_format($str['harga_beli'],0,',','.' )?></td>
                                    <td style="vertical-align: middle;" class="text-center"><?= number_format($str['harga_jual'],0,',','.' )?></td>
                                    <td style="vertical-align: middle;"><?= $str['stock'] ?></td>
                                    <td style="vertical-align: middle;"><?= $str['satuan'] ?></td>
                                    <td style="vertical-align: middle;">
                                        <a href="form-barang.php?id=<?= $str['id_barang'] ?>&msg=editing" class="btn btn-warning btn-sm" title="edit barang" ><i class="fas fa-pen"></i></a>
                                        <a href="?id=<?= $str['id_barang'] ?>&gbr=<?= $str['gambar']?>&msg=deleted" class="btn btn-danger btn-sm" title="hapus barang" onclick="return confirm('Anda yakin akan menghapus barang ini?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                        </tbody>
                        <?php endwhile; else: ?>
                  <tr><td colspan="11" class="text-center">Tidak ada data ditemukan.</td></tr>
                <?php endif; ?>
                    </table>
                      <?php else : ?>
            <div class="alert alert-warning">Silakan pilih area cabang terlebih dahulu untuk menampilkan laporan.</div>
          <?php endif; ?>
                </div>
            </div>

<!-- Modal Export -->
    <div class="modal" id="exampleModal" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Export Excel Presensi Harian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="<?= $main_url ?>laporanSetoran/rekap_setoran_excel.php">
            <div class="modal-body">              
              <select class="form-select" name="cabang" required>
              <option value="" disabled <?= $cabang == '' ? 'selected' : '' ?>>Pilih Area Cabang</option>
              <option value="Purwakarta" <?= $cabang == 'Purwakarta' ? 'selected' : '' ?>>Purwakarta</option>
              <option value="Bekasi" <?= $cabang == 'Bekasi' ? 'selected' : '' ?>>Bekasi</option>
              <option value="Bandung" <?= $cabang == 'Bandung' ? 'selected' : '' ?>>Bandung</option>
              <option value="Bandung2" <?= $cabang == 'Bandung2' ? 'selected' : '' ?>>Bandung2</option>
              <option value="Cirebon" <?= $cabang == 'Cirebon' ? 'selected' : '' ?>>Cirebon</option>
              <option value="Garut" <?= $cabang == 'Garut' ? 'selected' : '' ?>>Garut</option>
              <option value="JakartaBarat" <?= $cabang == 'JakartaBarat' ? 'selected' : '' ?>>Jakarta Barat</option>
              <option value="JakartaPusat" <?= $cabang == 'JakartaPusat' ? 'selected' : '' ?>>Jakarta Pusat</option>
              <option value="JakartaSelatan" <?= $cabang == 'JakartaSelatan' ? 'selected' : '' ?>>Jakarta Selatan</option>
              <option value="JakartaTimur" <?= $cabang == 'JakartaTimur' ? 'selected' : '' ?>>Jakarta Timur</option>
              <option value="Tangerang" <?= $cabang == 'Tangerang' ? 'selected' : '' ?>>Tangerang</option>
              <option value="Tasikmalaya" <?= $cabang == 'Tasikmalaya' ? 'selected' : '' ?>>Tasikmalaya</option>
              <!-- Tambah area lain di sini -->
            </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger me-auto" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Export</button>
            </div>
          </form>
        </div>
      </div>
    </div>

        </div>
    </section>



<?php

require "../template/footer.php";

?>