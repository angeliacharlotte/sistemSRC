<?php

session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
  header("Location: ../../auth/login.php?pesan=belum_login");
} elseif ($_SESSION["level"] != '1') {
  header("Location: ../../error-page.php?pesan=tolak_akses");
}

require "../../config/config.php";
require "../../config/functions.php";
require "../../module/mode-pengeluaran.php";

$title = "Laporan Penjualan - Inventory";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php";

if (empty($_GET['filter_bulan']) && empty($_GET['filter_tahun'])) {
    $bulan = date('Y-m');
}else{
    $bulan = $_GET['filter_tahun'] . '-' . $_GET['filter_bulan'];
}

$result = mysqli_query($koneksi, "
    SELECT p.*, 
        (
            SELECT IFNULL(SUM(penjualan),0) FROM tbl_setoran_tasik
            WHERE tgl_setoran LIKE '$bulan%'
        ) AS total_penjualan
    FROM tbl_pengeluaran_tasik p
    WHERE p.tgl_pengeluaran LIKE '$bulan%'
    ORDER BY p.tgl_pengeluaran ASC
");

// Ambil data setoran, penjualan, qris, pengeluaran, dan pembelian
$result_1 = mysqli_query($koneksi, "
    SELECT s.*, 
        (IFNULL(s.penjualan,0) - IFNULL(s.qris,0)) AS total_penjualan,
        IFNULL(s.qris,0) AS total_qris,
        (
            SELECT IFNULL(SUM(jml_harga),0) FROM tbl_beli_detail_tasik
            WHERE tgl_beli LIKE '$bulan%'
        ) AS total_pembelian,
        (
            SELECT IFNULL(SUM(invoice),0) FROM tbl_pengeluaran_tasik
            WHERE DATE_FORMAT(tgl_pengeluaran, '%Y-%m-%d') = DATE_FORMAT(s.tgl_setoran, '%Y-%m-%d')
        ) AS total_invoice
    FROM tbl_setoran_tasik s
    WHERE s.tgl_setoran LIKE '$bulan%'
    ORDER BY s.tgl_setoran ASC
");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Margin Area Tasikmalaya</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="<?= $main_url ?>setoran/form-setoran_tasik.php">Setoran</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Laporan Margin</h3>
                </div>
                <div class="row mt-2 m-3">
                    <div class="col-md-2">
                    <button type="button" class="btn btn-primary  " data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Eksport Excel</button>
                    </div>
                    <div class="col-md-10">
                        <form method="GET">
                            <div class="input-group">
                                <select name="filter_bulan" class="form-control">
                                    <option value="">---Pilih Bulanan---</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="11">Desember</option>
                                </select>
                                <select name="filter_tahun" class="form-control">
                                    <option value="">---Pilih Tahun---</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-3">
                    <span>Rekap Presensi Bulan : <?= date('F Y', strtotime($bulan)) ?> </span>

                    <table class="table table-hover text-nowrap mt-2 text-center" id="tabel-penjualan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Setoran</th>
                                <th>Tanggal</th>
                                <th>Admin QRIS</th>
                                <th>Pembelian</th>
                                <th>Insentive</th>
                                <th>Penggantian Promo</th>
                                <th>Pembayaran Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($result_1 && mysqli_num_rows($result_1) > 0) :
                            while($str = mysqli_fetch_assoc($result_1)) :
                             ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $str['id_setoran']?></td>
                                    <td><?= date('d F Y', strtotime($str['tgl_setoran'])) ?></td>
                                    <td class="text-center"><?= number_format($str['total_qris'],0,',','.' )?></td>
                                    <td class="text-center"><?= number_format($str['total_pembelian'],0,',','.' )?></td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center"><?= number_format($str['total_invoice'],0,',','.' )?></td>
                            <?php endwhile; else: ?>
                        <tr><td colspan="11" class="text-center">Tidak ada data ditemukan.</td></tr>
                        <?php endif; ?>
                        </tbody>
                        <?php
                        // Hitung total saldo dari semua kolom per baris
                        $total_saldo = 0;
                        
                        if ($result_1 && mysqli_num_rows($result_1) > 0) {
                            mysqli_data_seek($result_1, 0);
                            while($str = mysqli_fetch_assoc($result_1)) {
                                $total_saldo += (int)$str['total_qris'] + (int)$str['total_pembelian'] + (int)$str['total_invoice'];
                                
                            }
                        }
                        ?>
                        </table>                    
                            <div style="display: flex; align-items: center; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                                <label for="bayar" style="font-weight:bold; font-size:1.1em;">Total Pengeluaran</label>
                                <input type="text" name="total-saldo" class="form-control text-right" id="total-saldo" value="<?= number_format($total_saldo,0,',','.') ?>" readonly style="width:200px; font-size:1.2em; font-weight:bold; background:#ffdddd; color:#b71c1c;">
                            </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Laporan Margin</h3>
                </div>
                <div class="row mt-2 m-3">
                    <div class="col-md-2">
                    <button type="button" class="btn btn-primary  " data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Eksport Excel</button>
                    </div>
                    <div class="col-md-10">
                        <!-- <form method="GET">
                            <div class="input-group">
                                <select name="filter_bulan" class="form-control">
                                    <option value="">---Pilih Bulanan---</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="11">Desember</option>
                                </select>
                                <select name="filter_tahun" class="form-control">
                                    <option value="">---Pilih Tahun---</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                            </div>
                        </form> -->
                    </div>
                </div>
                <div class="card-body table-responsive p-3">
                    <span>Rekap Presensi Bulan : <?= date('F Y', strtotime($bulan)) ?> </span>

                    <table class="table table-hover text-nowrap mt-2 text-center" id="tabel-penjualan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pengeluaran</th>
                                <th>Tanggal</th>
                                <th>Gaji Pegawai</th>
                                <th>Initial Support</th>
                                <th>Biaya Listrik</th>
                                <th>Biaya Sewa</th>
                                <th>Internet&Pulsa</th>
                                <th>Saldo Awal</th>
                                <th>Lainnya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($result && mysqli_num_rows($result) > 0) :
                            while($str = mysqli_fetch_assoc($result)) :
                             ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $str['id_pengeluaran']?></td>
                                    <td><?= date('d F Y', strtotime($str['tgl_pengeluaran'])) ?></td>
                                    <td class="text-center"><?= number_format($str['gaji'],0,',','.' )?></td>
                                    <td class="text-center"><?= number_format($str['iqos'],0,',','.' )?></td>
                                    <td class="text-center"><?= number_format($str['listrik'],0,',','.' )?></td>
                                    <td class="text-center"><?= number_format($str['sewa'],0,',','.' )?></td>
                                    <td class="text-center"><?= number_format($str['internet'],0,',','.' )?></td>
                                    <td class="text-center"><?= number_format($str['saldo_awal'],0,',','.' )?></td>
                                    <td class="text-center"><?= number_format($str['lainnya'],0,',','.' )?></td>
                            <?php endwhile; else: ?>
                        <tr><td colspan="11" class="text-center">Tidak ada data ditemukan.</td></tr>
                        <?php endif; ?>
                        </tbody>
                        <?php
                        // Hitung total saldo dari semua kolom per baris
                        $total_pengeluaran = 0;
                        $total_penjualan_all = 0;
                        if ($result && mysqli_num_rows($result) > 0) {
                            mysqli_data_seek($result, 0);
                            $str = mysqli_fetch_assoc($result);
                            // Hitung total pengeluaran dari semua baris
                            do {
                                $total_pengeluaran += (int)$str['gaji'] + (int)$str['iqos'] + (int)$str['listrik'] + (int)$str['sewa'] + (int)$str['internet'] + (int)$str['saldo_awal'] + (int)$str['lainnya'];
                            } while($str = mysqli_fetch_assoc($result));
                            // Ambil total_penjualan dari baris pertama
                            $result_first = mysqli_query($koneksi, "SELECT IFNULL(SUM(penjualan),0) AS total_penjualan FROM tbl_setoran_tasik WHERE tgl_setoran LIKE '$bulan%'");
                            $row_first = mysqli_fetch_assoc($result_first);
                            $total_penjualan_all = (int)$row_first['total_penjualan'];
                        } else {
                            // Jika tidak ada data pengeluaran, ambil total_penjualan dari query manual
                            $q = mysqli_query($koneksi, "SELECT IFNULL(SUM(penjualan),0) AS total_penjualan FROM tbl_setoran_tasik WHERE tgl_setoran LIKE '$bulan%'");
                            $d = mysqli_fetch_assoc($q);
                            $total_penjualan_all = (int)$d['total_penjualan'];
                        }
                        $keuntungan_bersih = $total_penjualan_all - $total_pengeluaran - $total_saldo;
                        ?>
                        </table>                    
                            <div style="display: flex; align-items: center; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                                <label for="bayar" style="font-weight:bold; font-size:1.1em;">Total Pengeluaran</label>
                                <input type="text" name="total-saldo" class="form-control text-right" id="total-saldo" value="<?= number_format($total_pengeluaran,0,',','.') ?>" readonly style="width:200px; font-size:1.2em; font-weight:bold; background:#ffdddd; color:#b71c1c;">
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                                <label for="total-penjualan" style="font-weight:bold; font-size:1.1em;">Total Penjualan</label>
                                <input type="text" name="total-penjualan" class="form-control text-right" id="total-penjualan" value="<?= number_format($total_penjualan_all,0,',','.') ?>" readonly style="width:200px; font-size:1.2em; font-weight:bold; background:#eaffea;">
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                                <label for="keuntungan-bersih" style="font-weight:bold; font-size:1.1em;">Keuntungan Bersih</label>
                                <input type="text" name="keuntungan-bersih" class="form-control text-right" id="keuntungan-bersih" value="<?= number_format($keuntungan_bersih,0,',','.') ?>" readonly style="width:200px; font-size:1.2em; font-weight:bold; background:#eaffea;">
                            </div>
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
        <form method="POST" action="<?= $main_url ?>laporanMargin/tasik/rekap_margin_excel.php">
        <div class="modal-body">
            <div class="mb-3">
                <label for="">Bulan</label>
                <select name="filter_bulan" class="form-control">
                    <option value="">---Pilih Bulanan---</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="11">Desember</option>
                  </select>
            </div>
            <div class="mb-3">
                <label for="">Tahun</label>
                <select name="filter_tahun" class="form-control">
                    <option value="">---Pilih Tahun---</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
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

<script>
    function hitungSisaPembayaran() {
  const rows = document.querySelectorAll('#tabel-piutang tbody tr');
  let totalSaldo = 0;

  rows.forEach(row => {
    // Total di kolom ke-5
    const totalText = row.querySelector('td:nth-child(5)')?.textContent.trim().replace(/\./g, '') || '0';
    const total = parseInt(totalText) || 0;
    totalSaldo += total;
  });

  document.getElementById('totalHasil').value = totalSaldo.toLocaleString('id-ID');
}
</script>

<?php

require "../../template/footer.php";

?>