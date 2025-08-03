<?php
session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
  header("Location: ../../auth/login.php?pesan=belum_login");
} elseif ($_SESSION["level"] != '1') {
  header("Location: ../../error-page.php?pesan=tolak_akses");
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-pengeluaran.php";

$title = "Laporan Pengeluaran - Inventory";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

$msg = $_GET['msg'] ?? '';
$alert = '';
$cabang = $_GET['cabang'] ?? '';

// Query berdasarkan select
if ($cabang === 'Cinunuk') {
    $query = "SELECT * FROM tbl_setoran";
}elseif($cabang === 'Cirebon') {
    $query = "SELECT * FROM tbl_setoran_cirebon";
}elseif($cabang === 'Tangerang') {
    $query = "SELECT * FROM tbl_setoran_tangerang";
}elseif($cabang === 'Tasikmalaya') {
    $query = "SELECT * FROM tbl_setoran_tasik";
} else {
    $query = "";
}

$result = $query ? mysqli_query($koneksi, $query) : null;
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengeluaran Area</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <?php if($alert != '') echo $alert; ?>
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Pengeluaran</h3>
        </div>

        <div class="card-body table-responsive p-3">

            <!-- Pilihan Form pengeluaran Area -->
            <form method="GET" action="" class="mb-3">
              <label for="area">Pilih Form Pengeluaran Area:</label>
              <select name="area" id="area" class="form-select" onchange="redirectToForm(this.value)">
                <option value="">-- Pilih Area --</option>
                <option value="baksul">Baksul</option>
                <option value="cirebon">Cirebon</option>
                <option value="cinunuk">Cinunuk</option>
                <option value="tasik">Tasik</option>
              </select>
            </form>
            <script>
            function redirectToForm(area) {
              if (!area) return;
              var url = '';
              switch(area) {
                case 'baksul': url = '../pengeluaran/form-pengeluaran_baksul.php'; break;
                case 'cirebon': url = '../pengeluaran/form-pengeluaran_cirebon.php'; break;
                case 'cinunuk': url = '../pengeluaran/form-pengeluaran_cinunuk.php'; break;
                case 'tasik': url = '../pengeluaran/form-pengeluaran_tasik.php'; break;
              }
              if (url) window.location.href = url;
            }
            </script>

            <?php
            if (!empty($_GET['area'])) {
              $formFile = "../pengeluaran/form-pengeluaran_" . $_GET['area'] . ".php";
              if (file_exists($formFile)) {
                include $formFile;
              } else {
                echo '<div class="alert alert-danger">Form area tidak ditemukan.</div>';
              }
            } else {
              echo '<div class="alert alert-warning">Silakan pilih area cabang terlebih dahulu untuk membuat laporan.</div>';
            }
            ?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php require "../template/footer.php"; ?>
