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
$result = mysqli_query($koneksi,"SELECT tbl_jual_detail.*, tbl_jual_head.customer, tbl_jual_head.keterangan,  tbl_jual_head.jml_bayar
        FROM tbl_jual_detail JOIN tbl_jual_head ON tbl_jual_detail.no_jual = tbl_jual_head.no_jual WHERE tbl_jual_detail.tgl_jual BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_jual_detail.tgl_jual DESC");

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'REKAP PIUTANG AREA PURWAKARTA');
$sheet->setCellValue('A2', 'Tanggal Awal');
$sheet->setCellValue('A3', 'Tanggal Akhir');
$sheet->setCellValue('C2', $tanggal_dari);
$sheet->setCellValue('C3', $tanggal_sampai);
$sheet->setCellValue('A5', 'NO');
$sheet->setCellValue('B5', 'NO NOTA');
$sheet->setCellValue('C5', 'TANGGAL');
$sheet->setCellValue('D5', 'KODE BARANG');
$sheet->setCellValue('E5', 'NAMA BARANG');
$sheet->setCellValue('F5', 'TOKO');
$sheet->setCellValue('G5', 'QTY');
$sheet->setCellValue('H5', 'HARGA');
$sheet->setCellValue('I5', 'TOTAL BAYAR');
$sheet->setCellValue('J5', 'KETERANGAN');

$sheet->getStyle('A1')->getFont()->setBold(true);
$sheet->getStyle('A2')->getFont()->setBold(true);
$sheet->getStyle('A3')->getFont()->setBold(true);
$sheet->getStyle('C2')->getFont()->setBold(true);
$sheet->getStyle('C3')->getFont()->setBold(true);
$sheet->getStyle('A5:J5')->getFont()->setBold(true);

$sheet->getStyle('A5:J10')->applyFromArray([
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
$piutang_per_nota = [];
$transaksi_data = [];

while($data = mysqli_fetch_array($result)) {
    $no_jual = $data['no_jual'];
    $qty = (int)$data['qty'];
    $harga_jual = (int)$data['harga_jual'];
    $jml_bayar = (int)$data['jml_bayar'];
    $keterangan = $data['keterangan'];

    if (!isset($transaksi_data[$no_jual])) {
        $transaksi_data[$no_jual] = [
            'total_tagihan' => 0,
            'total_bayar' => $jml_bayar, // diasumsikan sama tiap baris
            'keterangan' => $keterangan
        ];
    }

    $transaksi_data[$no_jual]['total_tagihan'] += ($qty * $harga_jual);

    // Tulis baris per barang ke Excel
    $sheet->setCellValue('A' . $row, $no);
    $sheet->setCellValue('B' . $row, $data['no_jual']);
    $sheet->setCellValue('C' . $row, $data['tgl_jual']);
    $sheet->setCellValue('D' . $row, $data['kode_brg']);
    $sheet->setCellValue('E' . $row, $data['nama_brg']);
    $sheet->setCellValue('F' . $row, $data['customer']);
    $sheet->setCellValue('G' . $row, $qty);
    $sheet->setCellValue('H' . $row, $harga_jual);
    $sheet->setCellValue('I' . $row, $jml_bayar);
    $sheet->setCellValue('J' . $row, $keterangan);

    $no++;
    $row++;
}

// Hitung total piutang hanya dari nota "Belum Lunas"
$total_piutang = 0;
foreach ($transaksi_data as $trx) {
    if (strtolower($trx['keterangan']) === 'belum lunas') {
        $piutang = $trx['total_tagihan'] - $trx['total_bayar'];
        $total_piutang += $piutang;
    }
}

// Output total piutang di akhir
$sheet->setCellValue('H' . $row, 'Total Piutang');
$sheet->setCellValue('I' . $row, $total_piutang);


if (ob_get_length()) {
    ob_end_clean();
}
// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="rekap_piutang_purwakarta.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>
<?php

require "../../template/footer.php";

?>