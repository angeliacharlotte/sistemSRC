<?php

session_start();

if(!isset($_SESSION["ssLoginPOS"])) {
  header("location: ../auth/login.php");
  exit();
}

require "../../config/config.php";
require "../../config/functions.php";
require "../../module/mode-barang.php";

$title = "Mutasi Stock - Inventory";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php";

if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg ='';
}

$alert = '';


if (empty($_GET['tanggal_dari'])) {
    $tanggal_awal_bulan = date('Y-m-01');
    $tanggal_akhir_bulan = date('Y-m-t');
    $result = mysqli_query($koneksi,"SELECT 
        t.tanggal,
        t.nama_brg,
        b.harga_jual,
        COALESCE(p.stock_masuk, 0) AS stock_masuk,
        COALESCE(j.stock_keluar, 0) AS stock_keluar,
        b.stock,
        j.customer,  
        bh.suplier,
        COALESCE(c.deskripsi, 'Area Bandung 2') AS area
    FROM (
        SELECT DISTINCT DATE(tgl_beli) AS tanggal, nama_brg FROM tbl_beli_detail_bandung2 WHERE DATE(tgl_beli) BETWEEN '$tanggal_awal_bulan' AND '$tanggal_akhir_bulan'
        UNION
        SELECT DISTINCT DATE(jh.tgl_jual) AS tanggal, jd.nama_brg
        FROM tbl_jual_head_bandung2 jh
        JOIN tbl_jual_detail_bandung2 jd ON jh.no_jual = jd.no_jual
        WHERE DATE(jh.tgl_jual) BETWEEN '$tanggal_awal_bulan' AND '$tanggal_akhir_bulan'
    ) t
    LEFT JOIN (
        SELECT DATE(tgl_beli) AS tanggal, nama_brg, SUM(qty) AS stock_masuk, no_beli
        FROM tbl_beli_detail_bandung2
        WHERE DATE(tgl_beli) BETWEEN '$tanggal_awal_bulan' AND '$tanggal_akhir_bulan'
        GROUP BY DATE(tgl_beli), nama_brg, no_beli
    ) p ON p.tanggal = t.tanggal AND p.nama_brg = t.nama_brg
    LEFT JOIN tbl_beli_head_bandung2 bh ON bh.no_beli = p.no_beli
    LEFT JOIN (
        SELECT DATE(jh.tgl_jual) AS tanggal, jd.nama_brg, SUM(jd.qty) AS stock_keluar, jh.customer
        FROM tbl_jual_head_bandung2 jh
        JOIN tbl_jual_detail_bandung2 jd ON jh.no_jual = jd.no_jual
        WHERE DATE(jh.tgl_jual) BETWEEN '$tanggal_awal_bulan' AND '$tanggal_akhir_bulan'
        GROUP BY DATE(jh.tgl_jual), jd.nama_brg, jh.customer
    ) j ON j.tanggal = t.tanggal AND j.nama_brg = t.nama_brg
    LEFT JOIN tbl_barang_bandung2 b ON b.nama_barang = t.nama_brg
    LEFT JOIN tbl_customer_bandung2 c ON j.customer = c.nama
    ORDER BY t.tanggal ASC, t.nama_brg ASC
");

} elseif (empty($_GET['tanggal_sampai'])) {
    $tanggal_dari = $_GET['tanggal_dari'];
    $tanggal_hari_ini = date('Y-m-d');
    $result = mysqli_query($koneksi, "SELECT 
        t.tanggal,
        t.nama_brg,
        b.harga_jual,
        COALESCE(p.stock_masuk, 0) AS stock_masuk,
        COALESCE(j.stock_keluar, 0) AS stock_keluar,
        b.stock,
        j.customer, 
        bh.suplier,
        COALESCE(c.deskripsi, 'Area Bandung 2') AS area
    FROM (
        SELECT DISTINCT DATE(tgl_beli) AS tanggal, nama_brg 
        FROM tbl_beli_detail_bandung2 
        WHERE DATE(tgl_beli) BETWEEN '$tanggal_dari' AND '$tanggal_hari_ini'
        UNION
        SELECT DISTINCT DATE(jh.tgl_jual) AS tanggal, jd.nama_brg
        FROM tbl_jual_head_bandung2 jh
        JOIN tbl_jual_detail_bandung2 jd ON jh.no_jual = jd.no_jual
        WHERE DATE(jh.tgl_jual) BETWEEN '$tanggal_dari' AND '$tanggal_hari_ini'
    ) t
    LEFT JOIN (
        SELECT DATE(tgl_beli) AS tanggal, nama_brg, SUM(qty) AS stock_masuk, no_beli
        FROM tbl_beli_detail_bandung2
        WHERE DATE(tgl_beli) BETWEEN '$tanggal_dari' AND '$tanggal_hari_ini'
        GROUP BY DATE(tgl_beli), nama_brg, no_beli
    ) p ON p.tanggal = t.tanggal AND p.nama_brg = t.nama_brg
    LEFT JOIN tbl_beli_head_bandung2 bh ON bh.no_beli = p.no_beli
    LEFT JOIN (
        SELECT DATE(jh.tgl_jual) AS tanggal, jd.nama_brg, SUM(jd.qty) AS stock_keluar, jh.customer
        FROM tbl_jual_head_bandung2 jh
        JOIN tbl_jual_detail_bandung2 jd ON jh.no_jual = jd.no_jual
        WHERE DATE(jh.tgl_jual) BETWEEN '$tanggal_dari' AND '$tanggal_hari_ini'
        GROUP BY DATE(jh.tgl_jual), jd.nama_brg, jh.customer
    ) j ON j.tanggal = t.tanggal AND j.nama_brg = t.nama_brg
    LEFT JOIN tbl_barang_bandung2 b ON b.nama_barang = t.nama_brg
    LEFT JOIN tbl_customer_bandung2 c ON j.customer = c.nama
    ORDER BY t.tanggal ASC, t.nama_brg ASC
");

} else {
    $tanggal_dari = $_GET['tanggal_dari'];
    $tanggal_sampai = $_GET['tanggal_sampai'];
    $result = mysqli_query($koneksi, "SELECT 
        t.tanggal,
        t.nama_brg,
        b.harga_jual,
        COALESCE(p.stock_masuk, 0) AS stock_masuk,
        COALESCE(j.stock_keluar, 0) AS stock_keluar,
        b.stock,
        j.customer, 
        bh.suplier,
        COALESCE(c.deskripsi, 'Area Bandung 2') AS area
    FROM (
        SELECT DISTINCT DATE(tgl_beli) AS tanggal, nama_brg 
        FROM tbl_beli_detail_bandung2 
        WHERE DATE(tgl_beli) BETWEEN '$tanggal_dari' AND '$tanggal_sampai'
        UNION
        SELECT DISTINCT DATE(jh.tgl_jual) AS tanggal, jd.nama_brg
        FROM tbl_jual_head_bandung2 jh
        JOIN tbl_jual_detail_bandung2 jd ON jh.no_jual = jd.no_jual
        WHERE DATE(jh.tgl_jual) BETWEEN '$tanggal_dari' AND '$tanggal_sampai'
    ) t
    LEFT JOIN (
        SELECT DATE(tgl_beli) AS tanggal, nama_brg, SUM(qty) AS stock_masuk, no_beli
        FROM tbl_beli_detail_bandung2
        WHERE DATE(tgl_beli) BETWEEN '$tanggal_dari' AND '$tanggal_sampai'
        GROUP BY DATE(tgl_beli), nama_brg, no_beli
    ) p ON p.tanggal = t.tanggal AND p.nama_brg = t.nama_brg
    LEFT JOIN tbl_beli_head_bandung2 bh ON bh.no_beli = p.no_beli
    LEFT JOIN (
        SELECT DATE(jh.tgl_jual) AS tanggal, jd.nama_brg, SUM(jd.qty) AS stock_keluar, jh.customer
        FROM tbl_jual_head_bandung2 jh
        JOIN tbl_jual_detail_bandung2 jd ON jh.no_jual = jd.no_jual
        WHERE DATE(jh.tgl_jual) BETWEEN '$tanggal_dari' AND '$tanggal_sampai'
        GROUP BY DATE(jh.tgl_jual), jd.nama_brg, jh.customer
    ) j ON j.tanggal = t.tanggal AND j.nama_brg = t.nama_brg
    LEFT JOIN tbl_barang_bandung2 b ON b.nama_barang = t.nama_brg
    LEFT JOIN tbl_customer_bandung2 c ON j.customer = c.nama
    ORDER BY t.tanggal ASC, t.nama_brg ASC
");
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
            <h1 class="m-0">Mutasi Stock Area Bandung2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="<?= $main_url ?>pembelian/purwakarta">Pembelian</a></li>
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
                    <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Mutasi Stock</h3>
                </div>
                <div class="row mt-2 m-3">
                    <div class="col-md-2">
                    <button type="button" class="btn btn-primary  " data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Ekspor Excel</button>
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
                        <span>Mutasi Stock Tanggal : <?= date('01 F Y') ?></span>
                        <span> Sampai <?= date('d F Y') ?></span>
                        <?php elseif (!empty($_GET['tanggal_dari']) && empty($_GET['tanggal_sampai'])) : ?>
                        <span>Mutasi Stock Tanggal : <?= date('d F Y', strtotime($_GET['tanggal_dari'])) . ' sampai ' . date('d F Y') ?></span>
                        <?php else : ?>
                        <span>Mutasi Stock Tanggal : <?= date('d F Y', strtotime($_GET['tanggal_dari'])) . ' sampai ' . date('d F Y', strtotime($_GET['tanggal_sampai'])) ?></span>
                        <?php endif; ?>

                    <table class="table table-hover text-nowrap mt-2 text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Area</th>
                                <th>Stock Masuk</th>
                                <th>Stock Keluar</th>
                                <th>Stock Sisa</th>
                                <th>Harga Stock</th>
                            </tr>
                            <?php if(mysqli_num_rows($result) === 0) {?>
                            <tr>
                                <td colspan="8">Data Mutasi Stock Kosong</td>
                            </tr>
                            <?php } else { ?>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $stok_per_barang = [];
                            $data_tampil = [];

                            // Proses data dari $result
                            while ($brg = mysqli_fetch_assoc($result)) :
                                $nama_barang = $brg['nama_brg'];
                                $harga_jual = (int)$brg['harga_jual'];

                                if (!isset($stok_per_barang[$nama_barang])) {
                                    $stok_per_barang[$nama_barang] = [
                                        'sisa_stock' => 0,
                                        'harga_jual' => $harga_jual
                                    ];
                                }

                                // Update stok
                                $stok_per_barang[$nama_barang]['sisa_stock'] += $brg['stock_masuk'];
                                $stok_per_barang[$nama_barang]['sisa_stock'] -= $brg['stock_keluar'];

                                // Simpan data untuk ditampilkan di tabel
                                $sisa_stock = $stok_per_barang[$nama_barang]['sisa_stock'];
                                $harga_stock = $harga_jual * $sisa_stock;

                                $data_tampil[] = [
                                    'no' => $no++,
                                    'tanggal' => $brg['tanggal'],
                                    'nama_brg' => $nama_barang,
                                    'area' => $brg['area'],
                                    'stock_masuk' => $brg['stock_masuk'],
                                    'stock_keluar' => $brg['stock_keluar'],
                                    'sisa_stock' => $sisa_stock,
                                    'harga_stock' => $harga_jual * $sisa_stock
                                ];
                            endwhile;

                            // Hitung total harga stock hanya 1x per barang
                            $total_harga_stock = 0;
                            foreach ($stok_per_barang as $barang) {
                                $total_harga_stock += $barang['sisa_stock'] * $barang['harga_jual'];
                            }
                             ?>
                             <?php foreach ($data_tampil as $brg): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d F Y', strtotime($brg['tanggal'])) ?></td>
                                    <!-- <td><?= $nama_customer ?></td> -->
                                    <td><?= $brg['nama_brg'] ?></td>
                                    <td><?= $brg['area'] ?></td>
                                    <td><?= number_format($brg['stock_masuk'], 0, ',', '.') ?></td>
                                    <td><?= number_format($brg['stock_keluar'], 0, ',', '.') ?></td>
                                    <td><?= number_format($brg['sisa_stock'], 0, ',', '.') ?></td>
                                    <td><?= number_format($brg['harga_stock'], 0, ',', '.') ?></td>

                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" style="text-align: right;"><strong>Total Harga Stock</strong></td>
                                <td><strong><?= number_format($total_harga_stock, 0, ',', '.') ?></strong></td>
                            </tr>
                        </tfoot>
                        <?php } ?>
                    </table>
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
        <form method="POST" action="<?= $main_url ?>stock/bandung2/mutasiStock_bandung2_excel.php">
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