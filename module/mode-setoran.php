<?php

function generateId(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STPR-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdBandung(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_bandung2");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STBG-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdBandung2(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_bandung2");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STBS-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdbekasi(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_bekasi");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STBK-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdcirebon(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_cirebon");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STCB-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdgarut(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_garut");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STGT-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdjakbar(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_jakbar");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STJB-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdjakpus(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_jakpus");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STJP-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdjaksel(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_jaksel");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STJS-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdjaktim(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_jaktim");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STJT-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdtangerang(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_tangerang");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STTG-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdtasik(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_tasik");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STTS-" . sprintf("%03s", $noUrut);

    return $maxid;
}


function insert($data) {
    global $koneksi;

   $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Upload file (PDF, DOCX, XLSX)
// $file_ktr = '';
// if ($_FILES['ktr']['name'] != '') {
//     $allowed_extensions = ['pdf', 'docx', 'doc', 'xlsx', 'xls'];
//     $file_ext = strtolower(pathinfo($_FILES['ktr']['name'], PATHINFO_EXTENSION));
//     $file_tmp = $_FILES['ktr']['tmp_name'];

//     if (in_array($file_ext, $allowed_extensions)) {
//         $new_name = 'ktr_' . $id_setoran . '.' . $file_ext;
//         $upload_path = '../asset/keteranganPengeluaran/' . $new_name;

//         if (move_uploaded_file($file_tmp, $upload_path)) {
//             $file_ktr = $new_name;
//         } else {
//             return false; // gagal upload
//         }
//     } else {
//         return false; // ekstensi tidak diizinkan
//     }
// } else {
//     $file_ktr = null;
// }

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);

}
function insert_bekasi($data) {
    global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_bekasi (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);

}
function insert_bandung($data) {
     global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_bandung (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}
function insert_bandung2($data) {
      global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_bandung2 (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}
function insert_garut($data) {
     global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_garut (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}
function insert_tasik($data) {
      global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_tasik (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}
function insert_cirebon($data) {
      global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_cirebon (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}
function insert_tangerang($data) {
      global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_tangerang (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}
function insert_jaksel($data) {
      global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_jaksel (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}
function insert_jakpus($data) {
      global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_jakpus (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}
function insert_jaktim($data) {
      global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_jaktim (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}
function insert_jakbar($data) {
      global $koneksi;
    $id_setoran = mysqli_real_escape_string($koneksi, $data['id_setoran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $transaksi = mysqli_real_escape_string($koneksi, $data['transaksi']);
    $pengirim = mysqli_real_escape_string($koneksi, $data['pengirim']);
    $penerima = mysqli_real_escape_string($koneksi, $data['penerima']);
    $periode = mysqli_real_escape_string($koneksi, $data['periode']);
    $pemasukan = mysqli_real_escape_string($koneksi, $data['pemasukan']);
    $pengeluaran = mysqli_real_escape_string($koneksi, $data['pengeluaran']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $keterangan = mysqli_real_escape_string($koneksi, $data['ktr']);

// Upload gambar
if ($gambar != null) {
    $gambar = uploadimg(null, $id_setoran); // pastikan fungsi uploadimg ada
} else {
    $gambar = 'transaction.png';
}

// Gambar tidak sesuai validasi
if ($gambar == '') {
    return false;
}

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_setoran_jakbar (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
    VALUES ('$id_setoran', '$tanggal', '$transaksi', '$pengirim', '$penerima', '$periode', '$pemasukan', '$pengeluaran', '$keterangan', '$gambar')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}

function delete($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_bekasi($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_bekasi WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_bandung($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_bandung WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_bandung2($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_bandung2 WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_garut($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_garut WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_cirebon($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_cirebon WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_tangerang($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_tangerang WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_jaksel($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_jaksel WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_jakpus($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_jakpus WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_jaktim($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_jaktim WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_jakbar($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_jakbar WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}
function delete_tasik($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_tasik WHERE id_barang = '$id'";
    mysqli_query($koneksi, $sqlDel);
    if ($gbr != 'default-brg.png'){
        unlink('../asset/image/' . $gbr);
    }
    return mysqli_affected_rows($koneksi);
}


function update($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_bekasi($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_bekasi SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_bandung2($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_bandung2 SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_garut($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_garut SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_tasik($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_tasik SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_cirebon($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_cirebon SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_tangerang($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_tangerang SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_jaksel($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_jaksel SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_jakpus($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_jakpus SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_jaktim($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_jaktim SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_jakbar($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_jakbar SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}
function update_bandung($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    

    //cek gambar
    if($gambar != null) {
        $url = "index.php";
        if($gbrLama == 'default-brg.png'){
            $nmgbr = $id;
        } else {
            $nmgbr = $id . '-' . rand(10, 1000);
        }
        $imgBrg = uploadimg(null, $id);
        if($gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
    } else {
        $imgBrg = $gbrLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_barang_bandung SET 
                    nama_barang = '$name',
                    harga_beli = $harga_beli,
                    harga_jual = $harga_jual,
                    satuan = '$satuan',
                    stock_minimal = $stockmin,
                    gambar = '$imgBrg'
                    WHERE id_barang = '$id'
                ");
    return mysqli_affected_rows($koneksi);

}


