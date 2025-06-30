<?php 
session_start();
if(!isset($_SESSION["ssLoginPOS"])) {
  header("location: ../auth/login.php");
  exit();
}
require "../config/config.php";
require "../config/functions.php";
require "../module/mode-barang.php";

$title = "Laporan Penjualan - Inventory";
// require "../../template/header.php";
// require "../../template/navbar.php";
// require "../../template/sidebar.php";
require '../asset/vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Reader\Xls\Style\Border;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border as StyleBorder;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$tanggal_dari = $_POST['tanggal_dari'];
$tanggal_sampai = $_POST['tanggal_sampai'];
$cabang = $_POST['cabang'] ?? '';

// Query berdasarkan select
if ($cabang === 'Purwakarta') {
    $query = "SELECT * FROM tbl_setoran WHERE tbl_setoran.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran.tgl_setoran DESC";
} elseif($cabang === 'Bekasi') {
    $query = "SELECT * FROM tbl_setoran_bekasi WHERE tbl_setoran_bekasi.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_bekasi.tgl_setoran DESC";
} elseif($cabang === 'Bandung') {
    $query = "SELECT * FROM tbl_setoran_bandung WHERE tbl_setoran_bandung.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_bandung.tgl_setoran DESC";
} elseif($cabang === 'Bandung 2') {
    $query = "SELECT * FROM tbl_setoran_bandung2 WHERE tbl_setoran_bandung2.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_bandung2.tgl_setoran DESC";
} elseif($cabang === 'Garut') {
    $query = "SELECT * FROM tbl_setoran_garut WHERE tbl_setoran_garut.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_garut.tgl_setoran DESC";
} elseif($cabang === 'JakartaBarat') {
    $query = "SELECT * FROM tbl_setoran_jakbar WHERE tbl_setoran_jakbar.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_jakbar.tgl_setoran DESC";
} elseif($cabang === 'JakartaPusat') {
    $query = "SELECT * FROM tbl_setoran_jakpus WHERE tbl_setoran_jakpus.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_jakpus.tgl_setoran DESC";
} elseif($cabang === 'JakartaSelatan') {
    $query = "SELECT * FROM tbl_setoran_jaksel WHERE tbl_setoran_jaksel.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_jaksel.tgl_setoran DESC";
} elseif($cabang === 'JakartaTimur') {
    $query = "SELECT * FROM tbl_setoran_jaktim WHERE tbl_setoran_jaktim.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_jaktim.tgl_setoran DESC";
} elseif($cabang === 'Tangerang') {
    $query = "SELECT * FROM tbl_setoran_tangerang WHERE tbl_setoran_tangerang.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_tangerang.tgl_setoran DESC";
} elseif($cabang === 'Tasikmalaya') {
    $query = "SELECT * FROM tbl_setoran_tasik WHERE tbl_setoran_tasik.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran_tasik.tgl_setoran DESC";
} else {
    $query = "";
}
$result = $query ? mysqli_query($koneksi, $query) : null;
// $result = mysqli_query($koneksi,"SELECT * FROM tbl_setoran WHERE tbl_setoran.tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_setoran.tgl_setoran DESC");

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'DATA SETORAN');
$sheet->setCellValue('A2', 'Tanggal Awal');
$sheet->setCellValue('A3', 'Tanggal Akhir');
$sheet->setCellValue('C2', $tanggal_dari);
$sheet->setCellValue('C3', $tanggal_sampai);
$sheet->setCellValue('A5', 'NO');
$sheet->setCellValue('B5', 'KODE SETORAN');
$sheet->setCellValue('C5', 'TANGGAL');
$sheet->setCellValue('D5', 'TRANSAKSI');
$sheet->setCellValue('E5', 'PENGIRIM');
$sheet->setCellValue('F5', 'PENERIMA');
$sheet->setCellValue('G5', 'PERIODE');
$sheet->setCellValue('H5', 'KETERANGAN');
$sheet->setCellValue('I5', 'PEMASUKAN');
$sheet->setCellValue('J5', 'PENGELUARAN');
$sheet->setCellValue('K5', 'SALDO');
// $sheet->setCellValue('L5', 'PENGELUARAN');

$sheet->getStyle('A1')->getFont()->setBold(true);
$sheet->getStyle('A2')->getFont()->setBold(true);
$sheet->getStyle('A3')->getFont()->setBold(true);
$sheet->getStyle('C2')->getFont()->setBold(true);
$sheet->getStyle('C3')->getFont()->setBold(true);
$sheet->getStyle('A5:K5')->getFont()->setBold(true);

$sheet->getStyle('A5:K10')->applyFromArray([
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

while($data = mysqli_fetch_array($result)){

    $sheet->setCellValue('A'.$row, $no);
    $sheet->setCellValue('B'.$row, $data['id_setoran']);
    $sheet->setCellValue('C'.$row, $data['tgl_setoran']);
    $sheet->setCellValue('D'.$row, $data['transaksi']);
    $sheet->setCellValue('E'.$row, $data['pengirim']);
    $sheet->setCellValue('F'.$row, $data['penerima']);
    $sheet->setCellValue('G'.$row, $data['periode']);
    $sheet->setCellValue('H'.$row, $data['keterangan']);
    $sheet->setCellValue('I'.$row, $data['pemasukan']);
    $sheet->setCellValue('J'.$row, $data['pengeluaran']);
    $sheet->setCellValue('K'.$row, $data['saldo']);

    $no++;
    $row++;
}

if (ob_get_length()) {
    ob_end_clean();
}
// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="rekap_setoran.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>
<?php

require "../template/footer.php";

?>