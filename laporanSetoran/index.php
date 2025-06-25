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

if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg ='';
}

$alert = '';
$cabang = $_GET['cabang'] ?? '';

// Query berdasarkan select
if ($cabang === 'Purwakarta') {
    $query = "SELECT * FROM tbl_setoran";
} elseif($cabang === 'Bekasi') {
    $query = "SELECT * FROM tbl_setoran_bekasi";
}else{
  $query = "SELECT * FROM tbl_setoran";
}

$result = mysqli_query($koneksi, $query);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Setoran Area</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="">Setoran</a></li>
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
                    <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Laporan Setoran</h3>
                </div>
                <div class="row mt-2 m-3">
                    <div class="col-md-2">
                    <button type="button" class="btn btn-primary  " data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Eksport Excel</button>
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
                  <div class="form-group">
                    <form action="GET">
                  <label for="" class="col-sm-3 col-form-label col-form-label-sm">Pilih Area</label>
                  <div class="col-sm-2">
                  <Select name="cabang" id="cabang" class="form-control form-control-sm">
                    <option value="">Pilih Cabang Area</option>
                    <option value="Purwakarta">Purwakarta</option>
                    <option value="Bekasi">Bekasi</option>
                  </Select>
                  <button type="submit">Tampilkan</button>
                  </div>
                  </form>
                  </div>                
                    <?php if(empty($_GET['tanggal_dari']) && empty($_GET['tanggal_sampai'])) : ?>
                        <span>Laporan Piutang Tanggal : <?= date('d F Y') ?></span>
                        <?php elseif (!empty($_GET['tanggal_dari']) && empty($_GET['tanggal_sampai'])) : ?>
                        <span>Laporan Piutang Tanggal : <?= date('d F Y', strtotime($_GET['tanggal_dari'])) . ' sampai ' . date('d F Y') ?></span>
                        <?php else : ?>
                        <span>Laporan Piutang Tanggal : <?= date('d F Y', strtotime($_GET['tanggal_dari'])) . ' sampai ' . date('d F Y', strtotime($_GET['tanggal_sampai'])) ?></span>
                        <?php endif; ?>

                    <table class="table table-hover text-nowrap mt-2" id="tabel-piutang">
                        <thead>
                            <tr>
                                <th>Kode Setoran</th>
                                <th>Tanggal</th>
                                <th>Transaksi</th>
                                <th>Pengirim</th>
                                <th>Penerima</th>
                                <th>Periode</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Saldo</th>
                                <th>Bukti</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while($str = mysqli_fetch_assoc($result)) :
                             ?>
                                <tr>
                                  <td><?= $str['id_setoran']?></td>
                                    <td><?= date('d F Y', strtotime($str['tgl_setoran'])) ?></td>
                                    <td><?= $str['transaksi'] ?></td>
                                    <td><?= $str['pengirim'] ?></td>
                                    <td><?= $str['penerima'] ?></td>
                                    <td><?= $str['periode'] ?></td>
                                    <td class="text-center harga"><?= number_format($str['pemasukan'],0,',','.' )?></td>
                                    <td class="text-center dibayar"><?= number_format($str['pengeluaran'],0,',','.' )?></td>
                                    <td class="text-center harga"><?= number_format($str['pemasukan'],0,',','.' )?></td>
                                    <td><img style="width: 75px; height: 75px;" src="../asset/image/<?= $str['bukti'] ?>" alt=""></td>
                                    <td>
                                        <a href="edit-piutang.php?" class="btn btn-sm btn-warning" title="edit user"><i class="fas fa-user-edit"></i></a>
                                    </td>

                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>                    
                            <div style="display: flex; align-items: center; gap: 10px; margin-left: 980px; margin-right: 20px; margin-top: 20px;">
                                <label for="bayar">Total Saldo</label>
                                <input type="text" name="totalSaldo" class="form-control text-right" id="totalSaldo" readonly>
                            </div>
                </div>
                <script>
function hitungSisaPembayaran() {
  const rows = document.querySelectorAll('#tabel-piutang tbody tr');
  const transaksi = {}; // Kelompokkan per No Nota
  let totalSaldo = 0;

  rows.forEach(row => {    
    const saldoText = row.querySelector('td:nth-child(9)')?.textContent.trim().replace(/\./g, '') || '0';

    const saldo = parseInt(saldoText) || 0;
     totalSaldo += saldo;

    
  });

  // Ini yang benar:
  document.getElementById('totalSaldo').value = totalSaldo.toLocaleString('id-ID');
}

window.onload = hitungSisaPembayaran;
</script>
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
        <form method="POST" action="<?= $main_url ?>laporanPiutang/purwakarta/rekap_piutang_excel.php">
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

require "../template/footer.php";

?>