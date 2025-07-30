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
if ($cabang === 'Cinunuk') {
    $query = "SELECT * FROM tbl_barang";
}elseif($cabang === 'Cirebon') {
    $query = "SELECT * FROM tbl_barang_cirebon";
}elseif($cabang === 'Tasikmalaya') {
    $query = "SELECT * FROM tbl_barang_tasik";
}elseif($cabang === 'Baksul') {
    $query = "SELECT * FROM tbl_barang_baksul";
} else {
    $query = "";
}

$result = $query ? mysqli_query($koneksi, $query) : null;
// jalankan fungsi hapus barang
if($msg =='deleted') {
    $id = $_GET['id'];
    $gbr = $_GET['gbr'];
    if ($cabang === 'Cinunuk') {
        delete($id, $gbr);
    } elseif ($cabang === 'Cirebon') {
        delete_cirebon($id, $gbr);
    } elseif ($cabang === 'Tasikmalaya') {
        delete_tasik($id, $gbr);
    } elseif ($cabang === 'Baksul') {
        delete_baksul($id, $gbr);
    }
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
            <h1 class="m-0">Data Barang</h1>
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
                    </div>
                <div class="card-body table-responsive p-3">
                  <form method="GET" class="d-flex align-items-center gap-2 mb-3 ">
            <div class="col-md-2">
            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Add Barang</button></div>
            <select class="form-select" name="cabang" required>
              <option value="" disabled <?= $cabang == '' ? 'selected' : '' ?>>Pilih Area Cabang</option>
              <option value="Cinunuk" <?= $cabang == 'Cinunuk' ? 'selected' : '' ?>>Cinunuk</option>
              <option value="Cirebon" <?= $cabang == 'Cirebon' ? 'selected' : '' ?>>Cirebon</option>
              <option value="Tasikmalaya" <?= $cabang == 'Tasikmalaya' ? 'selected' : '' ?>>Tasikmalaya</option>
              <option value="Baksul" <?= $cabang == 'Baksul' ? 'selected' : '' ?>>Baksul</option>
              <!-- Tambah area lain di sini -->
            </select>
            <button type="submit" class="btn btn-primary">Tampilkan</button>
          </form>

          <?php if ($cabang !== '') : ?>
            <span>Laporan Barang Area: <strong><?= htmlspecialchars($cabang) ?></strong></span>
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
                                    <?php
                                    // Tentukan file form sesuai cabang
                                    $formFile = 'form-barang.php';
                                    if ($cabang === 'Cirebon') {
                                        $formFile = 'form-barang-cirebon.php';
                                    } elseif ($cabang === 'Tasikmalaya') {
                                        $formFile = 'form-barang-tasik.php';
                                    } elseif ($cabang === 'Baksul') {
                                        $formFile = 'form-barang-baksul.php';
                                    }
                                    ?>
                                    <a href="<?= $formFile ?>?id=<?= $str['id_barang'] ?>&msg=editing&cabang=<?= urlencode($cabang) ?>" class="btn btn-warning btn-sm" title="edit barang" ><i class="fas fa-pen"></i></a>
                                    <a href="?id=<?= $str['id_barang'] ?>&gbr=<?= $str['gambar']?>&msg=deleted&cabang=<?= urlencode($cabang) ?>" class="btn btn-danger btn-sm" title="hapus barang" onclick="return confirm('Anda yakin akan menghapus barang ini?')"><i class="fas fa-trash"></i></a>
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
            <h5 class="modal-title">Pilih Area</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="formCabangModal">
          <div class="modal-body">              
            <select class="form-select" name="cabang" id="selectCabangModal" required>
              <option value="" disabled <?= $cabang == '' ? 'selected' : '' ?>>Pilih Area Cabang</option>
              <option value="Cinunuk" <?= $cabang == 'Cinunuk' ? 'selected' : '' ?>>Cinunuk</option>
              <option value="Cirebon" <?= $cabang == 'Cirebon' ? 'selected' : '' ?>>Cirebon</option>
              <option value="Tasikmalaya" <?= $cabang == 'Tasikmalaya' ? 'selected' : '' ?>>Tasikmalaya</option>
              <option value="Baksul" <?= $cabang == 'Baksul' ? 'selected' : '' ?>>Baksul</option>
              <!-- Tambah area lain di sini -->
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Tambah Data</button>
          </div>
        </form>
        </div>
      </div>
    </div>

        </div>
    </section>

<script>
document.getElementById('formCabangModal').addEventListener('submit', function(e) {
  e.preventDefault();
  var cabang = document.getElementById('selectCabangModal').value;
  // Ganti sesuai kebutuhan redirect
  if (cabang === 'Cinunuk') {
    window.location.href = '<?= $main_url ?>barang/form-barang.php?cabang=Cinunuk';
  } else if (cabang === 'Cirebon') {
    window.location.href = '<?= $main_url ?>barang/form-barang-cirebon.php?cabang=Cirebon';
  } else if (cabang === 'Tasikmalaya') {
    window.location.href = '<?= $main_url ?>barang/form-barang-tasik.php?cabang=Tasikmalaya';
  } else if (cabang === 'Baksul') {
    window.location.href = '<?= $main_url ?>barang/form-barang-baksul.php?cabang=Baksul';
  }
});
</script>

<?php

require "../template/footer.php";

?>