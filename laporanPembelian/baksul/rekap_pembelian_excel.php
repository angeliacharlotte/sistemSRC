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
$tanggal_dari = $_POST['tanggal_dari'];
$tanggal_sampai = $_POST['tanggal_sampai'];
$result = mysqli_query($koneksi,"SELECT tbl_beli_detail_baksul.*, tbl_beli_head_baksul.suplier, tbl_beli_head_baksul.keterangan,  tbl_beli_head_baksul.total
        FROM tbl_beli_detail_baksul JOIN tbl_beli_head_baksul ON tbl_beli_detail_baksul.no_beli = tbl_beli_head_baksul.no_beli WHERE tbl_beli_detail_baksul.tgl_beli BETWEEN '$tanggal_dari' AND '$tanggal_sampai' ORDER BY tbl_beli_detail_baksul.tgl_beli DESC");
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'REKAP PEMBELIAN AREA BAKSUL');
$sheet->setCellValue('A2', 'Tanggal Awal');
$sheet->setCellValue('A3', 'Tanggal Akhir');
$sheet->setCellValue('C2', $tanggal_dari);
$sheet->setCellValue('C3', $tanggal_sampai);
$sheet->setCellValue('A5', 'NO');
$sheet->setCellValue('B5', 'NO NOTA');
$sheet->setCellValue('C5', 'TANGGAL');
$sheet->setCellValue('D5', 'KODE BARANG');
$sheet->setCellValue('E5', 'NAMA BARANG');
$sheet->setCellValue('F5', 'QTY');
$sheet->setCellValue('G5', 'SUPPLIER');
$sheet->setCellValue('H5', 'HARGA');
$sheet->setCellValue('I5', 'TOTAL');
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
while($data = mysqli_fetch_array($result)){
    $sheet->setCellValue('A'.$row, $no);
    $sheet->setCellValue('B'.$row, $data['no_beli']);
    $sheet->setCellValue('C'.$row, $data['tgl_beli']);
    $sheet->setCellValue('D'.$row, $data['kode_brg']);
    $sheet->setCellValue('E'.$row, $data['nama_brg']);
    $sheet->setCellValue('F'.$row, $data['qty']);
    $sheet->setCellValue('G'.$row, $data['suplier']);
    $sheet->setCellValue('H'.$row, $data['harga_beli']);
    $sheet->setCellValue('I'.$row, $data['total']);
    $sheet->setCellValue('J'.$row, $data['keterangan']);
    $no++;
    $row++;
}
if (ob_get_length()) {
    ob_end_clean();
}
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="laporan_pembelian_tangerang.xlsx"');
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();
?>
<?php
require "../../template/footer.php";
?>