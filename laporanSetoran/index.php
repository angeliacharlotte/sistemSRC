<?php
session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
  header("Location: ../../auth/login.php?pesan=belum_login");
} elseif ($_SESSION["level"] != '1') {
  header("Location: ../../error-page.php?pesan=tolak_akses");
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-barang.php";

$title = "Laporan Setoran - Inventory";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

$msg = $_GET['msg'] ?? '';
$alert = '';
$cabang = $_GET['cabang'] ?? '';

// Query berdasarkan select
if ($cabang === 'Purwakarta') {
    $query = "SELECT * FROM tbl_setoran";
} elseif($cabang === 'Bekasi') {
    $query = "SELECT * FROM tbl_setoran_bekasi";
}elseif($cabang === 'Bandung') {
    $query = "SELECT * FROM tbl_setoran_bandung";
}elseif($cabang === 'Bandung2') {
    $query = "SELECT * FROM tbl_setoran_bandung2";
}elseif($cabang === 'Cirebon') {
    $query = "SELECT * FROM tbl_setoran_cirebon";
}elseif($cabang === 'Garut') {
    $query = "SELECT * FROM tbl_setoran_garut";
}elseif($cabang === 'JakartaBarat') {
    $query = "SELECT * FROM tbl_setoran_jakbar";
}elseif($cabang === 'JakartaSelatan') {
    $query = "SELECT * FROM tbl_setoran_jaksel";
}elseif($cabang === 'JakartaPusat') {
    $query = "SELECT * FROM tbl_setoran_jakpus";
}elseif($cabang === 'JakartaTimur') {
    $query = "SELECT * FROM tbl_setoran_jaktim";
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
          <h1 class="m-0">Laporan Area</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Setoran</a></li>
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
          <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Laporan Setoran</h3>
        </div>

        <div class="card-body table-responsive p-3">
          <!-- Form Pilih Area -->
          <form method="GET" class="d-flex align-items-center gap-2 mb-3 ">
            <div class="col-md-2">
            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Ekspor Excel</button></div>
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

            <table class="table table-hover text-nowrap mt-2" id="tabel-piutang">
              <thead>
                <tr>
                  <th>Kode Setoran</th>
                  <th>Tanggal</th>
                  <th>Transaksi</th>
                  <th>Pengirim</th>
                  <th>Penerima</th>
                  <th>Periode</th>
                  <th>Keterangan</th>
                  <th>Pemasukan</th>
                  <th>Pengeluaran</th>
                  <th>Saldo</th>
                  <th>Bukti</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) :
                  while($str = mysqli_fetch_assoc($result)) :
                ?>
                  <tr>
                    <td><?= $str['id_setoran']?></td>
                    <td><?= date('d F Y', strtotime($str['tgl_setoran'])) ?></td>
                    <td><?= $str['transaksi'] ?></td>
                    <td><?= $str['pengirim'] ?></td>
                    <td><?= $str['penerima'] ?></td>
                    <td><?= $str['periode'] ?></td>
                    <td class="keterangan"><?= $str['keterangan'] ?></td>
                    <td class="text-center harga"><?= number_format($str['pemasukan'],0,',','.') ?></td>
                    <td class="text-center dibayar"><?= number_format($str['pengeluaran'],0,',','.') ?></td>
                    <td class="text-center harga"><?= number_format($str['pemasukan'],0,',','.') ?></td>
                    <td><img style="width: 75px; height: 75px;" src="../asset/image/<?= $str['bukti'] ?>" alt=""></td>
                    <td>
                      <a href="edit-piutang.php?id=<?= $str['id_setoran'] ?>" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-user-edit"></i></a>
                      <a target="_blank" href="<?= $main_url ?>asset/image/<?= $str['bukti']  ?>" download class="btn btn-sm bg-primary ti ti-download"><i class="fas fa-file-download"></i></a>
                    </td>
                  </tr>
                <?php endwhile; else: ?>
                  <tr><td colspan="11" class="text-center">Tidak ada data ditemukan.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>

            <div style="display: flex; align-items: center; gap: 10px; margin-left: auto; margin-top: 20px; width: 250px;">
              <label for="totalSaldo">Total Saldo</label>
              <input type="text" name="totalHasil" class="form-control text-right" id="totalHasil" readonly>
            </div>
          <?php else : ?>
            <div class="alert alert-warning">Silakan pilih area cabang terlebih dahulu untuk menampilkan laporan.</div>
          <?php endif; ?>
        </div>
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
              <div class="mb-3">
                <label for="">Tanggal Awal</label>
                <input type="date" class="form-control" name="tanggal_dari">
              </div>
              <div class="mb-3">
                <label for="">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tanggal_sampai">
              </div>
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
    <!-- End Modal -->
  </section>
</div>

<script>
function hitungSisaPembayaran() {
  const rows = document.querySelectorAll('#tabel-piutang tbody tr');
let totalSaldo = 0;
let totalPengeluaran = 0;

rows.forEach(row => {
  const saldoText = row.querySelector('td:nth-child(10')?.textContent.trim().replace(/\./g, '') || '0';
  const pengeluaranText = row.querySelector('td:nth-child(9)')?.textContent.trim().replace(/\./g, '') || '0';

  const saldo = parseInt(saldoText) || 0;
  const pengeluaran = parseInt(pengeluaranText) || 0;

  totalSaldo += saldo;
  totalPengeluaran += pengeluaran;
});

const totalHasil = totalSaldo - totalPengeluaran;

// Tampilkan hasil ke input
document.getElementById('totalHasil').value = totalHasil.toLocaleString('id-ID');

}

window.onload = hitungSisaPembayaran;
</script>

<?php require "../template/footer.php"; ?>
