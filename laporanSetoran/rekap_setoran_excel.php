<?php
session_start();
if(!isset($_SESSION["ssLoginPOS"])) {
  header("location: ../auth/login.php");
  exit();
}
require "../config/config.php";
require "../config/functions.php";
require "../module/mode-barang.php";
require '../asset/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border as StyleBorder;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Ambil filter
$tanggal_dari = $_POST['tanggal_dari'];
$tanggal_sampai = $_POST['tanggal_sampai'];
$cabang = $_POST['cabang'] ?? '';

if ($cabang === 'Cinunuk') {
    $query = "SELECT * FROM tbl_setoran WHERE tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tgl_setoran DESC";
} elseif($cabang === 'Cirebon') {
    $query = "SELECT * FROM tbl_setoran_cirebon WHERE tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tgl_setoran DESC";
} elseif($cabang === 'Baksul') {
    $query = "SELECT * FROM tbl_setoran_baksul WHERE tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tgl_setoran DESC";
} elseif($cabang === 'Tasikmalaya') {
    $query = "SELECT * FROM tbl_setoran_tasik WHERE tgl_setoran BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tgl_setoran DESC";
} else {
    $query = "";
}
$result = $query ? mysqli_query($koneksi, $query) : null;

// Buat spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Judul dan filter
$sheet->setCellValue('A1', 'LAPORAN SETORAN');
$sheet->mergeCells('A1:K1');
$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
$sheet->setCellValue('A2', 'Tanggal Awal');
$sheet->setCellValue('B2', $tanggal_dari);
$sheet->setCellValue('A3', 'Tanggal Akhir');
$sheet->setCellValue('B3', $tanggal_sampai);

// Header kolom (samakan dengan index laporanSetoran)
$sheet->setCellValue('A5', 'No');
$sheet->setCellValue('B5', 'Kode Setoran');
$sheet->setCellValue('C5', 'Tanggal');
$sheet->setCellValue('D5', 'Penjualan');
$sheet->setCellValue('E5', 'Admin QRIS');
$sheet->setCellValue('F5', 'Pembelian');
$sheet->setCellValue('G5', 'Insentive');
$sheet->setCellValue('H5', 'Penggantian Promo');
$sheet->setCellValue('I5', 'Total');

$sheet->getStyle('A5:I5')->getFont()->setBold(true);

// Data
$row = 6;
$no = 1;
$total_saldo = 0;
if ($result) {
    while($data = mysqli_fetch_assoc($result)){
        $penjualan = (int)str_replace('.', '', $data['penjualan']);
        $qris = (int)str_replace('.', '', $data['qris']);
        $pembelian = (int)str_replace('.', '', $data['pembelian'] ?? 0);
        $insentive = (int)str_replace('.', '', $data['insentive'] ?? 0);
        $penggantian_promo = (int)str_replace('.', '', $data['penggantian_promo'] ?? 0);

        $total = $penjualan - $qris;

        $sheet->setCellValue('A'.$row, $no++);
        $sheet->setCellValue('B'.$row, $data['id_setoran']);
        $sheet->setCellValue('C'.$row, date('d-m-Y', strtotime($data['tgl_setoran'])));
        $sheet->setCellValue('D'.$row, 'Rp ' . number_format($penjualan,0,',','.'));
        $sheet->setCellValue('E'.$row, 'Rp ' . number_format($qris,0,',','.'));
        $sheet->setCellValue('F'.$row, 'Rp ' . number_format($pembelian,0,',','.'));
        $sheet->setCellValue('G'.$row, 'Rp ' . number_format($insentive,0,',','.'));
        $sheet->setCellValue('H'.$row, 'Rp ' . number_format($penggantian_promo,0,',','.'));
        $sheet->setCellValue('I'.$row, 'Rp ' . number_format($total,0,',','.'));
        $total_saldo += $total;
        $row++;
    }
}

// Baris Total Saldo
$sheet->setCellValue('H'.$row, 'Total Saldo');
$sheet->setCellValue('I'.$row, 'Rp ' . number_format($total_saldo,0,',','.'));
$sheet->getStyle('H'.$row.':I'.$row)->getFont()->setBold(true);

// Border
$lastRow = $row;
$sheet->getStyle("A5:I$lastRow")->applyFromArray([
    'borders' => [
        'allborders' => [
            'borderStyle' => StyleBorder::BORDER_THIN,
            'color' => ['argb' => 'FF000000']
        ],
    ],
]);

// Output Excel
if (ob_get_length()) ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="rekap_setoran.xlsx"');
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();
?>
<?php
require "../template/footer.php";
?>