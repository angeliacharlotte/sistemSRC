<?php

function generateId(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STCN-" . sprintf("%03s", $noUrut);

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
function generateIdbaksul(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_setoran) as maxid FROM tbl_setoran_baksul");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "STBS-" . sprintf("%03s", $noUrut);

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
function insert_baksul($data) {
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
$sqlBrg = "INSERT INTO tbl_setoran_baksul (id_setoran, tgl_setoran, transaksi, pengirim, penerima, periode, pemasukan, pengeluaran, keterangan, bukti)
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
function delete_cirebon($id, $gbr) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_barang_cirebon WHERE id_barang = '$id'";
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
function update_baksul($data){
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

    mysqli_query($koneksi, "UPDATE tbl_barang_baksul SET 
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


