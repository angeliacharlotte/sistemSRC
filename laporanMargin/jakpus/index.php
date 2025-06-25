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

$title = "Laporan Penjualan - Inventory";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php";

if (empty($_GET['filter_bulan']) && empty($_GET['filter_tahun'])) {
    $bulan = date('Y-m');
}else{
    $bulan = $_GET['filter_tahun'] . '-' . $_GET['filter_bulan'];
}

$result = mysqli_query($koneksi,"SELECT 
        tanggal,
        SUM(total_pendapatan) AS total_pendapatan,
        SUM(total_pengeluaran) AS total_pengeluaran,
        SUM(total_pendapatan) - SUM(total_pengeluaran) AS margin
    FROM (
        SELECT 
            tgl_jual AS tanggal,
            SUM(jml_harga) AS total_pendapatan,
            0 AS total_pengeluaran
        FROM tbl_jual_detail_jakpus
        WHERE DATE_FORMAT(tgl_jual, '%Y-%m') = '$bulan'
        GROUP BY tgl_jual

        UNION ALL

        SELECT 
            tgl_beli AS tanggal,
            0 AS total_pendapatan,
            SUM(jml_harga) AS total_pengeluaran
        FROM tbl_beli_detail_jakpus
        WHERE DATE_FORMAT(tgl_beli, '%Y-%m') = '$bulan'
        GROUP BY tgl_beli
    ) AS gabungan
    GROUP BY tanggal
    ORDER BY tanggal;
");

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Margin Area Jakarta Pusat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="<?= $main_url ?>penjualan/jakpus">Penjualan</a></li>
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

                    <table class="table table-hover text-nowrap mt-2" id="tabel-penjualan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pendapatan</th>
                                <th>Pengeluaran</th>
                                <th>Margin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while($brg = mysqli_fetch_array($result)) :
                                $margin = $brg['margin'];
                                    $formattedMargin = $margin < 0 
                                    ? '(' . number_format(abs($margin), 0, ',', '.') . ')' 
                                    : number_format($margin, 0, ',', '.');
                             ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d F Y', strtotime($brg['tanggal'])) ?></td>
                                    <td class="text-center"><?= number_format($brg['total_pendapatan'],0,',','.' )?></td>
                                    <td class="text-center"><?= number_format($brg['total_pengeluaran'],0,',','.' )?></td>
                                    <td class="text-center"><?= $formattedMargin ?></td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>                    
                            <div style="display: flex; align-items: center; gap: 10px; margin-left: 980px; margin-right: 20px; margin-top: 20px;">
                                <label for="bayar">Total</label>
                                <input type="text" name="total-margin" class="form-control text-right" id="total-margin" readonly>
                            </div>
<script>
function hitungTotalMargin() {
  const rows = document.querySelectorAll('#tabel-penjualan tbody tr');
  let totalMargin = 0;

  rows.forEach(row => {
    const pendapatanText = row.querySelector('td:nth-child(3)')?.textContent || '0';
    const pengeluaranText = row.querySelector('td:nth-child(4)')?.textContent || '0';

    const pendapatan = parseInt(pendapatanText.replace(/\./g, '')) || 0;
    const pengeluaran = parseInt(pengeluaranText.replace(/\./g, '')) || 0;

    const margin = pendapatan - pengeluaran;
    totalMargin += margin;
  });

  const formattedMargin = totalMargin < 0
    ? `(${Math.abs(totalMargin).toLocaleString('id-ID')})`
    : totalMargin.toLocaleString('id-ID');

  document.getElementById('total-margin').value = formattedMargin;
}

window.onload = hitungTotalMargin;
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
        <form method="POST" action="<?= $main_url ?>laporanMargin/jakpus/rekap_penjualan_excel.php">
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



<?php

require "../../template/footer.php";

?>