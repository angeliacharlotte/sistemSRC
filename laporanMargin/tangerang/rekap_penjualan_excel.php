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

// Ambil filter bulan dan tahun dari POST
if (empty($_POST['filter_bulan']) || empty($_POST['filter_tahun'])) {
    $bulan = date('Y-m');
    $filter_bulan = date('m');
    $filter_tahun = date('Y');
} else {
    $filter_bulan = $_POST['filter_bulan'];
    $filter_tahun = $_POST['filter_tahun'];
    $bulan = $filter_tahun . '-' . $filter_bulan;
}

// Konversi angka bulan ke nama bulan (Bahasa Indonesia)
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


// Query Margin berdasarkan Bulan
$result = mysqli_query($koneksi, " SELECT 
        tanggal,
        SUM(total_pendapatan) AS total_pendapatan,
        SUM(total_pengeluaran) AS total_pengeluaran,
        SUM(total_pendapatan) - SUM(total_pengeluaran) AS margin
    FROM (
        SELECT 
            tgl_jual AS tanggal,
            SUM(jml_harga) AS total_pendapatan,
            0 AS total_pengeluaran
        FROM tbl_jual_detail_tangerang
        WHERE DATE_FORMAT(tgl_jual, '%Y-%m') = '$bulan'
        GROUP BY tgl_jual

        UNION ALL

        SELECT 
            tgl_beli AS tanggal,
            0 AS total_pendapatan,
            SUM(jml_harga) AS total_pengeluaran
        FROM tbl_beli_detail_tangerang
        WHERE DATE_FORMAT(tgl_beli, '%Y-%m') = '$bulan'
        GROUP BY tgl_beli
    ) AS gabungan
    GROUP BY tanggal
    ORDER BY tanggal;
");

// Generate Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'REKAP PENJUALAN AREA TANGERANG');
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

// Apply border style ke data sampai baris ke-100 secara default (atau bisa kamu sesuaikan)
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
$total_pendapatan = 0;
$total_pengeluaran = 0;
$total_margin = 0;

while($data = mysqli_fetch_array($result)){
    $sheet->setCellValue('A'.$row, $no);
    $sheet->setCellValue('B'.$row, $data['tanggal']);
    $sheet->setCellValue('C'.$row, $data['total_pendapatan']);
    $sheet->setCellValue('D'.$row, $data['total_pengeluaran']);
    $sheet->setCellValue('E'.$row, $data['margin']);

    $total_margin += $data['margin'];

    $no++;
    $row++;
}

// Total akhir
$sheet->setCellValue('A'.$row, 'TOTAL');
$sheet->mergeCells("A$row:D$row");
$sheet->setCellValue('E'.$row, $total_margin);
$sheet->getStyle("A$row:E$row")->getFont()->setBold(true);

if (ob_get_length()) {
    ob_end_clean();
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="laporan_margin_tangerang.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();
?>
