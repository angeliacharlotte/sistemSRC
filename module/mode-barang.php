<?php

function generateId(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "PRW-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdBandung(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_bandung");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "BDG-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdBandung2(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_bandung2");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "SMD-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdbekasi(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_bekasi");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "BKS-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdcirebon(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_cirebon");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "CRB-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdgarut(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_garut");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "GRT-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdjakbar(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_jakbar");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "JKB-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdjakpus(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_jakpus");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "JKP-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdjaksel(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_jaksel");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "JKS-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdjaktim(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_jaktim");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "JKT-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdtangerang(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_tangerang");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "TRG-" . sprintf("%03s", $noUrut);

    return $maxid;
}
function generateIdtasik(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_tasik");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "TSK-" . sprintf("%03s", $noUrut);

    return $maxid;
}



function insert($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_bekasi($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_bekasi VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_bandung($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_bandung VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);   
}
function insert_bandung2($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_bandung2 VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_garut($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_garut VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_tasik($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_tasik VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_cirebon($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_cirebon VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_tangerang($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_tangerang VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_jaksel($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_jaksel VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_jakpus($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_jakpus VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_jaktim($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_jaktim VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}
function insert_jakbar($data) {
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    //upload gambar barang
    if($gambar != null) {
        $gambar = uploadimg(null, $id);
    } else {
        $gambar = 'default-brg.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == '') {
        return false;
    }

    $sqlBrg = "INSERT INTO tbl_barang_jakbar VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
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


