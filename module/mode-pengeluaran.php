<?php

function generateId(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_pengeluaran) as maxid FROM tbl_pengeluaran");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "PCN-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdcirebon(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_pengeluaran) as maxid FROM tbl_pengeluaran_cirebon");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "PCB-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdbaksul(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_pengeluaran) as maxid FROM tbl_pengeluaran_baksul");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "PBS-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdtasik(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_pengeluaran) as maxid FROM tbl_pengeluaran_tasik");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 5, 4);
    $noUrut++;
    $maxid = "PTS-" . sprintf("%03s", $noUrut);

    return $maxid;
}


function insert($data) {
    global $koneksi;

   $id_pengeluaran = mysqli_real_escape_string($koneksi, $data['id_pengeluaran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $gaji = mysqli_real_escape_string($koneksi, $data['gaji']);
    $iqos = mysqli_real_escape_string($koneksi, $data['iqos']);
    $listrik = mysqli_real_escape_string($koneksi, $data['listrik']);
    $sewa = mysqli_real_escape_string($koneksi, $data['sewa']);
    $internet = mysqli_real_escape_string($koneksi, $data['internet']);
    $saldo_awal = mysqli_real_escape_string($koneksi, $data['saldo_awal']);
    $invoice = mysqli_real_escape_string($koneksi, $data['invoice']);
    $lainnya = mysqli_real_escape_string($koneksi, $data['lainnya']);

// Simpan ke database

$sqlBrg = "INSERT INTO tbl_pengeluaran (id_pengeluaran, tgl_pengeluaran, gaji, iqos, listrik, sewa, internet, saldo_awal, invoice, lainnya)
    VALUES ('$id_pengeluaran', '$tanggal', '$gaji', '$iqos', '$listrik', '$sewa', '$internet', '$saldo_awal', '$invoice','$lainnya')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);

}
function insert_tasik($data) {
    global $koneksi;

    $id_pengeluaran = mysqli_real_escape_string($koneksi, $data['id_pengeluaran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $gaji = mysqli_real_escape_string($koneksi, $data['gaji']);
    $iqos = mysqli_real_escape_string($koneksi, $data['iqos']);
    $listrik = mysqli_real_escape_string($koneksi, $data['listrik']);
    $sewa = mysqli_real_escape_string($koneksi, $data['sewa']);
    $internet = mysqli_real_escape_string($koneksi, $data['internet']);
    $saldo_awal = mysqli_real_escape_string($koneksi, $data['saldo_awal']);
    $invoice = mysqli_real_escape_string($koneksi, $data['invoice']);
    $lainnya = mysqli_real_escape_string($koneksi, $data['lainnya']);

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_pengeluaran_tasik (id_pengeluaran, tgl_pengeluaran, gaji, iqos, listrik, sewa, internet, saldo_awal, invoice, lainnya)
    VALUES ('$id_pengeluaran', '$tanggal', '$gaji', '$iqos', '$listrik', '$sewa', '$internet', '$saldo_awal', '$invoice', '$lainnya')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}

function insert_cirebon($data) {
    global $koneksi;

    $id_pengeluaran = mysqli_real_escape_string($koneksi, $data['id_pengeluaran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $gaji = mysqli_real_escape_string($koneksi, $data['gaji']);
    $iqos = mysqli_real_escape_string($koneksi, $data['iqos']);
    $listrik = mysqli_real_escape_string($koneksi, $data['listrik']);
    $sewa = mysqli_real_escape_string($koneksi, $data['sewa']);
    $internet = mysqli_real_escape_string($koneksi, $data['internet']);
    $saldo_awal = mysqli_real_escape_string($koneksi, $data['saldo_awal']);
    $invoice = mysqli_real_escape_string($koneksi, $data['invoice']);
    $lainnya = mysqli_real_escape_string($koneksi, $data['lainnya']);

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_pengeluaran_cirebon (id_pengeluaran, tgl_pengeluaran, gaji, iqos, listrik, sewa, internet, saldo_awal, invoice, lainnya)
    VALUES ('$id_pengeluaran', '$tanggal', '$gaji', '$iqos', '$listrik', '$sewa', '$internet', '$saldo_awal', '$invoice', '$lainnya')";

mysqli_query($koneksi, $sqlBrg);

return mysqli_affected_rows($koneksi);
}

function insert_baksul($data) {
    global $koneksi;

    $id_pengeluaran = mysqli_real_escape_string($koneksi, $data['id_pengeluaran']);
    $tanggal = mysqli_real_escape_string($koneksi, $data['tanggal']);
    $gaji = mysqli_real_escape_string($koneksi, $data['gaji']);
    $iqos = mysqli_real_escape_string($koneksi, $data['iqos']);
    $listrik = mysqli_real_escape_string($koneksi, $data['listrik']);
    $sewa = mysqli_real_escape_string($koneksi, $data['sewa']);
    $internet = mysqli_real_escape_string($koneksi, $data['internet']);
    $saldo_awal = mysqli_real_escape_string($koneksi, $data['saldo_awal']);
    $invoice = mysqli_real_escape_string($koneksi, $data['invoice']);
    $lainnya = mysqli_real_escape_string($koneksi, $data['lainnya']);

// Simpan ke database
$sqlBrg = "INSERT INTO tbl_pengeluaran_baksul (id_pengeluaran, tgl_pengeluaran, gaji, iqos, listrik, sewa, internet, saldo_awal, invoice, lainnya)
    VALUES ('$id_pengeluaran', '$tanggal', '$gaji', '$iqos', '$listrik', '$sewa', '$internet', '$saldo_awal', '$invoice', '$lainnya')";

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


