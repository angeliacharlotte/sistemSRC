<?php

session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
  header("Location: ../../auth/login.php?pesan=belum_login");
} elseif ($_SESSION["level"] != '1') {
  header("Location: ../../error-page.php?pesan=tolak_akses");
}

require "../../config/config.php";
require "../../config/functions.php";
require "../../module/mode-barang.php";

$title = "Laporan Piutang - Inventory";
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
  $result = mysqli_query($koneksi,"SELECT tbl_jual_detail_bandung.*, tbl_jual_head_bandung.customer, tbl_jual_head_bandung.keterangan,  tbl_jual_head_bandung.jml_bayar, tbl_jual_head_bandung.total
        FROM tbl_jual_detail_bandung JOIN tbl_jual_head_bandung ON tbl_jual_detail_bandung.no_jual = tbl_jual_head_bandung.no_jual WHERE tbl_jual_detail_bandung.tgl_jual = '$tanggal_hari_ini' ORDER BY tbl_jual_detail_bandung.tgl_jual DESC");
}else if(empty($_GET['tanggal_sampai'])){
  $tanggal_dari = $_GET['tanggal_dari'];
  $tanggal_hari_ini = date('Y-m-d');
//   $tanggal_sampai = $_GET['tanggal_sampai'];
  $result = mysqli_query($koneksi,"SELECT tbl_jual_detail_bandung.*, tbl_jual_head_bandung.customer, tbl_jual_head_bandung.keterangan,  tbl_jual_head_bandung.jml_bayar, tbl_jual_head_bandung.total
        FROM tbl_jual_detail_bandung JOIN tbl_jual_head_bandung ON tbl_jual_detail_bandung.no_jual = tbl_jual_head_bandung.no_jual WHERE tbl_jual_detail_bandung.tgl_jual BETWEEN '$tanggal_dari' AND '$tanggal_hari_ini' ORDER BY tbl_jual_detail_bandung.tgl_jual DESC");
}else{
    $tanggal_dari = $_GET['tanggal_dari'];
  $tanggal_sampai = $_GET['tanggal_sampai'];
  $result = mysqli_query($koneksi,"SELECT tbl_jual_detail_bandung.*, tbl_jual_head_bandung.customer, tbl_jual_head_bandung.keterangan,  tbl_jual_head_bandung.jml_bayar, tbl_jual_head_bandung.total
        FROM tbl_jual_detail_bandung JOIN tbl_jual_head_bandung ON tbl_jual_detail_bandung.no_jual = tbl_jual_head_bandung.no_jual WHERE tbl_jual_detail_bandung.tgl_jual BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_jual_detail_bandung.tgl_jual DESC");
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
            <h1 class="m-0">Laporan Piutang Area Bandung</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="<?= $main_url ?>penjualan/bandung">Penjualan</a></li>
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
                    <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Laporan Piutang</h3>
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
                                <th>No Nota</th>
                                <th>Tanggal</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Toko</th>
                                <th>QTY</th>
                                <th>Harga</th>
                                <th>Total Bayar</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while($brg = mysqli_fetch_array($result)) :
                             ?>
                                <tr>
                                    <td><?= $brg['no_jual'] ?></td>
                                    <td><?= date('d F Y', strtotime($brg['tgl_jual'])) ?></td>
                                    <td><?= $brg['kode_brg'] ?></td>
                                    <td><?= $brg['nama_brg'] ?></td>
                                    <td><?= $brg['customer'] ?></td>
                                    <td class="qty"><?= $brg['qty'] ?></td>
                                    <td class="text-center harga"><?= number_format($brg['total'],0,',','.' )?></td>
                                    <td class="text-center dibayar"><?= number_format($brg['jml_bayar'],0,',','.' )?></td>
                                    <td><?= $brg['keterangan'] ?></td>
                                    <td>
                                        <a href="edit-piutang.php?no_jual=<?= $brg['no_jual']?>" class="btn btn-sm btn-warning" title="edit user"><i class="fas fa-user-edit"></i></a>
                                    </td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>                    
                            <div style="display: flex; align-items: center; gap: 10px; margin-left: 980px; margin-right: 20px; margin-top: 20px;">
                                <label for="bayar">Total Piutang</label>
                                <input type="text" name="total-piutang" class="form-control text-right" id="total-piutang" readonly>
                            </div>
<script>
function hitungSisaPembayaran() {
  const rows = document.querySelectorAll('#tabel-piutang tbody tr');
  const transaksi = {}; // Kelompokkan per No Nota

  rows.forEach(row => {
    const noNota = row.querySelector('td:nth-child(1)')?.textContent.trim();
    const hargaText = row.querySelector('td:nth-child(7)')?.textContent.trim().replace(/\./g, '') || '0';
    const qtyText = row.querySelector('td:nth-child(6)')?.textContent.trim().replace(/\./g, '') || '0';
    const totalText = row.querySelector('td:nth-child(8)')?.textContent.trim().replace(/\./g, '') || '0';
    const keterangan = row.querySelector('td:nth-child(9)')?.textContent.trim();

    const harga = parseInt(hargaText);
    const qty = parseInt(qtyText);
    const totalBayar = parseInt(totalText);

    if (!transaksi[noNota]) {
      transaksi[noNota] = {
        totalTagihan: 0,
        totalBayar: 0,
        status: keterangan
      };
    }

    transaksi[noNota].totalTagihan += harga * qty;

    // Ambil total bayar hanya sekali per nota (karena baris barang bisa lebih dari 1)
    if (transaksi[noNota].totalBayar === 0) {
      transaksi[noNota].totalBayar = totalBayar;
    }
  });

  let totalPiutang = 0;
  for (const nota in transaksi) {
    const trx = transaksi[nota];
    if (trx.status === 'Belum Lunas') {
      const piutang = trx.totalTagihan - trx.totalBayar;
      totalPiutang += piutang;  
    }
  }

  // Tampilkan hasil
  const piutangElement = document.getElementById('total-piutang');
  if (piutangElement.tagName === 'INPUT') {
    piutangElement.value = totalPiutang.toLocaleString('id-ID');
  } else {
    piutangElement.textContent = totalPiutang.toLocaleString('id-ID');
  }
}

window.onload = hitungSisaPembayaran;
</script>
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
        <form method="POST" action="<?= $main_url ?>laporanPiutang/bandung/rekap_piutang_excel.php">
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