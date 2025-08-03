<?php 
session_start();
if(!isset($_SESSION["ssLoginPOS"])) {
  header("location: ../auth/login.php");
  exit();
}
require "../../config/config.php";
require "../../config/functions.php";
require "../../module/mode-barang.php";

$title = "Laporan Penjualan - Inventory";
// require "../../template/header.php";
// require "../../template/navbar.php";
// require "../../template/sidebar.php";
require '../../asset/vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Reader\Xls\Style\Border;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border as StyleBorder;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$tanggal_dari = $_POST['tanggal_dari'];
    $tanggal_sampai = $_POST['tanggal_sampai'];
    $result = mysqli_query($koneksi, "SELECT 
        t.tanggal,
        t.nama_brg,
        b.harga_jual,
        COALESCE(p.stock_masuk, 0) AS stock_masuk,
        COALESCE(j.stock_keluar, 0) AS stock_keluar,
        b.stock,
        bh.suplier,
        COALESCE('Area Tasikmalaya') AS area
    FROM (
        SELECT DISTINCT DATE(tgl_beli) AS tanggal, nama_brg 
        FROM tbl_beli_detail_tasik 
        WHERE DATE(tgl_beli) BETWEEN '$tanggal_dari' AND '$tanggal_sampai'
        UNION
        SELECT DISTINCT DATE(jh.tgl_jual) AS tanggal, jd.nama_brg
        FROM tbl_jual_head_tasik jh
        JOIN tbl_jual_detail_tasik jd ON jh.no_jual = jd.no_jual
        WHERE DATE(jh.tgl_jual) BETWEEN '$tanggal_dari' AND '$tanggal_sampai'
    ) t
    LEFT JOIN (
        SELECT DATE(tgl_beli) AS tanggal, nama_brg, SUM(qty) AS stock_masuk, no_beli
        FROM tbl_beli_detail_tasik
        WHERE DATE(tgl_beli) BETWEEN '$tanggal_dari' AND '$tanggal_sampai'
        GROUP BY DATE(tgl_beli), nama_brg, no_beli
    ) p ON p.tanggal = t.tanggal AND p.nama_brg = t.nama_brg
    LEFT JOIN tbl_beli_head_tasik bh ON bh.no_beli = p.no_beli
    LEFT JOIN (
        SELECT DATE(jh.tgl_jual) AS tanggal, jd.nama_brg, SUM(jd.qty) AS stock_keluar
        FROM tbl_jual_head_tasik jh
        JOIN tbl_jual_detail_tasik jd ON jh.no_jual = jd.no_jual
        WHERE DATE(jh.tgl_jual) BETWEEN '$tanggal_dari' AND '$tanggal_sampai'
        GROUP BY DATE(jh.tgl_jual), jd.nama_brg
    ) j ON j.tanggal = t.tanggal AND j.nama_brg = t.nama_brg
    LEFT JOIN tbl_barang_tasik b ON b.nama_barang = t.nama_brg
    ORDER BY t.tanggal ASC, t.nama_brg ASC
");

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'MUTASI STOCK AREA TASIKMALAYA');
$sheet->setCellValue('A2', 'Tanggal Awal');
$sheet->setCellValue('A3', 'Tanggal Akhir');
$sheet->setCellValue('C2', $tanggal_dari);
$sheet->setCellValue('C3', $tanggal_sampai);
$sheet->setCellValue('A5', 'NO');
$sheet->setCellValue('B5', 'TANGGAL');
$sheet->setCellValue('C5', 'NAMA BARANG');
$sheet->setCellValue('D5', 'AREA');
$sheet->setCellValue('E5', 'STOCK MASUK');
$sheet->setCellValue('F5', 'STOCK KELUAR');
$sheet->setCellValue('G5', 'STOCK SISA');
$sheet->setCellValue('H5', 'HARGA STOCK');

$sheet->getStyle('A1')->getFont()->setBold(true);
$sheet->getStyle('A2')->getFont()->setBold(true);
$sheet->getStyle('A3')->getFont()->setBold(true);
$sheet->getStyle('C2')->getFont()->setBold(true);
$sheet->getStyle('C3')->getFont()->setBold(true);
$sheet->getStyle('A5:H5')->getFont()->setBold(true);

$sheet->getStyle('A5:H10')->applyFromArray([
  'borders' => [
    'allborders' =>[
      'borderStyle' => StyleBorder::BORDER_THIN,
      'color' =>['argb' =>'FF000000']
    ],
  ],
]);

$sheet->mergeCells('A1:F1');
$sheet->mergeCells('A2:B2');
$sheet->mergeCells('A3:B3');

$no = 1;
 $row = 6;
 $stok_per_barang = [];
 $data_per_baris = [];

 while($data = mysqli_fetch_assoc($result)) {
     $nama_barang = $data['nama_brg']; 

     // Inisialisasi stok awal per barang
    if (!isset($stok_per_barang[$nama_barang])) {
        $stok_per_barang[$nama_barang] = [
            'sisa' => 0,
            'harga_jual' => $data['harga_jual']
        ];
    }

    // Update sisa stock
    $stok_per_barang[$nama_barang]['sisa'] += $data['stock_masuk'];
    $stok_per_barang[$nama_barang]['sisa'] -= $data['stock_keluar'];

     // Hitung harga stock berdasarkan sisa terbaru
    $sisa_stock = $stok_per_barang[$nama_barang]['sisa'];
    $harga_jual = $stok_per_barang[$nama_barang]['harga_jual'];
    $harga_stock = $sisa_stock * $harga_jual;

    $sheet->setCellValue('A'.$row, $no);
    $sheet->setCellValue('B'.$row, $data['tanggal']);
    $sheet->setCellValue('C'.$row, $data['nama_brg']);
    $sheet->setCellValue('D'.$row, $data['area']);
    $sheet->setCellValue('E'.$row, $data['stock_masuk']);
    $sheet->setCellValue('F'.$row, $data['stock_keluar']);
    $sheet->setCellValue('G'.$row, $sisa_stock);
    $sheet->setCellValue('H'.$row, $harga_stock);


    $no++;
    $row++;
}
// Tambahkan total harga stock hanya sekali per barang
$row++; // Kosongkan satu baris
$sheet->setCellValue('G' . $row, 'Total Harga Stock:');
$total_harga_stock = 0;

foreach ($stok_per_barang as $barang) {
    $total_harga_stock += $barang['sisa'] * $barang['harga_jual'];
}
$sheet->setCellValue('H' . $row, $total_harga_stock);

if (ob_get_length()) {
    ob_end_clean();
}
// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="mutasi_stock_tasik.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>
<?php

require "../../template/footer.php";

?>