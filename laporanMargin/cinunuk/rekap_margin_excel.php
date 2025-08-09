<?php 
session_start();
if(!isset($_SESSION["ssLoginPOS"])) {
  header("location: ../auth/login.php");
  exit();
}
require "../../config/config.php";
require "../../config/functions.php";
require "../../module/mode-barang.php";
require '../../asset/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border as StyleBorder;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$title = "Laporan Penjualan - Inventory";
if (empty($_POST['filter_bulan']) || empty($_POST['filter_tahun'])) {
    $bulan = date('Y-m');
    $filter_bulan = date('m');
    $filter_tahun = date('Y');
} else {
    $filter_bulan = $_POST['filter_bulan'];
    $filter_tahun = $_POST['filter_tahun'];
    $bulan = $filter_tahun . '-' . $filter_bulan;
}
$nama_bulan = [
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
];
$nama_bulan_indo = isset($nama_bulan[$filter_bulan]) ? $nama_bulan[$filter_bulan] : $filter_bulan;
$result = mysqli_query($koneksi, "
    SELECT s.id_setoran, s.tgl_setoran AS tanggal,
        IFNULL(s.qris,0) AS total_qris,
        (
            SELECT IFNULL(SUM(jml_harga),0) FROM tbl_beli_detail
            WHERE tgl_beli LIKE '$bulan%'
        ) AS total_pembelian,
        (
            SELECT IFNULL(SUM(invoice),0) FROM tbl_pengeluaran
            WHERE DATE_FORMAT(tgl_pengeluaran, '%Y-%m-%d') = DATE_FORMAT(s.tgl_setoran, '%Y-%m-%d')
        ) AS total_invoice,
        (IFNULL(s.penjualan,0) - IFNULL(s.qris,0)) AS total_penjualan
    FROM tbl_setoran s
    WHERE s.tgl_setoran LIKE '$bulan%'
    ORDER BY s.tgl_setoran ASC
");
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'REKAP PENJUALAN AREA CINUNUK');
$sheet->mergeCells('A1:E1');
$sheet->setCellValue('A2', 'Bulan');
$sheet->setCellValue('C2', $nama_bulan_indo);
$sheet->setCellValue('A3', 'Tahun');
$sheet->setCellValue('C3', $filter_tahun);
$sheet->mergeCells('A2:B2');
$sheet->mergeCells('A3:B3');
$sheet->setCellValue('A5', 'NO');
$sheet->setCellValue('B5', 'TANGGAL');
$sheet->setCellValue('C5', 'PENDAPATAN');
$sheet->setCellValue('D5', 'PENGELUARAN');
$sheet->setCellValue('E5', 'MARGIN');
$sheet->getStyle('A1')->getFont()->setBold(true);
$sheet->getStyle('A2')->getFont()->setBold(true);
$sheet->getStyle('A3')->getFont()->setBold(true);
$sheet->getStyle('C2')->getFont()->setBold(true);
$sheet->getStyle('C3')->getFont()->setBold(true);
$sheet->getStyle('A5:E5')->getFont()->setBold(true);
$sheet->getStyle('A5:E100')->applyFromArray([
  'borders' => [
    'allborders' => [
      'borderStyle' => StyleBorder::BORDER_THIN,
      'color' => ['argb' => 'FF000000']
    ],
  ],
]);
$no = 1;
$row = 6;
$total_penjualan = 0;
$total_pengeluaran = 0;
$total_invoice = 0;
$total_pembelian = 0;
while($data = mysqli_fetch_array($result)){
    $sheet->setCellValue('A'.$row, $no);
    $sheet->setCellValue('B'.$row, $data['tanggal']);
    $sheet->setCellValue('C'.$row, $data["total_penjualan"]);
    $sheet->setCellValue('D'.$row, $data["total_pembelian"]);
    $sheet->setCellValue('E'.$row, $data["total_invoice"]);
    $total_penjualan += $data['total_penjualan'];
    $total_pembelian += $data['total_pembelian'];
    $total_invoice += $data['total_invoice'];
    $no++;
    $row++;
}
$sheet->setCellValue('A'.$row, 'TOTAL');
$sheet->mergeCells("A$row:B$row");
$sheet->setCellValue('C'.$row, $total_penjualan);
$sheet->setCellValue('D'.$row, $total_pembelian);
$sheet->setCellValue('E'.$row, $total_invoice);
$sheet->getStyle("A$row:E$row")->getFont()->setBold(true);
if (ob_get_length()) {
    ob_end_clean();
}
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="laporan_margin_cinunuk.xlsx"');
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();
?>
