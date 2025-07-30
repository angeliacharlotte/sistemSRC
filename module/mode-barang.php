<?php

function generateId(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "CNN-" . sprintf("%03s", $noUrut);

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
function generateIdbaksul(){
    global $koneksi;

    $queryId = mysqli_query($koneksi, "SELECT max(id_barang) as maxid FROM tbl_barang_baksul");
    $data = mysqli_fetch_array($queryId);
    $maxid = $data['maxid'];

    $noUrut = (int) substr($maxid, 4, 3);
    $noUrut++;
    $maxid = "BKS-" . sprintf("%03s", $noUrut);

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
function insert_baksul($data) {
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

    $sqlBrg = "INSERT INTO tbl_barang_baksul VALUE ( '$id', '$name', '$harga_beli', '$harga_jual', 0, '$satuan', '$stockmin', '$gambar')";
    mysqli_query($koneksi, $sqlBrg);

    return mysqli_affected_rows($koneksi);
}

function delete($id, $gbr) {
     global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tbl_barang WHERE id_barang='$id'");
    if($gbr != 'default-brg.png'){
        @unlink('../asset/image/'.$gbr);
    }
}
function delete_cirebon($id, $gbr) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tbl_barang_cirebon WHERE id_barang='$id'");
    if($gbr != 'default-brg.png'){
        @unlink('../asset/image/'.$gbr);
    }
}
function delete_baksul($id, $gbr) {
     global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tbl_barang_baksul WHERE id_barang='$id'");
    if($gbr != 'default-brg.png'){
        @unlink('../asset/image/'.$gbr);
    }
}
function delete_tasik($id, $gbr) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tbl_barang_tasik WHERE id_barang='$id'");
    if($gbr != 'default-brg.png'){
        @unlink('../asset/image/'.$gbr);
    }
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
    

   //cek gambar
    if(!empty($_FILES['image']['name'])) {
        $imgBrg = uploadimg(null, $id);
        if($imgBrg && $gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
        // Jika upload gagal, pakai gambar lama
        if(!$imgBrg) $imgBrg = $gbrLama;
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

     //cek gambar
    if(!empty($_FILES['image']['name'])) {
        $imgBrg = uploadimg(null, $id);
        if($imgBrg && $gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
        // Jika upload gagal, pakai gambar lama
        if(!$imgBrg) $imgBrg = $gbrLama;
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
function update_cirebon($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);

     //cek gambar
    if(!empty($_FILES['image']['name'])) {
        $imgBrg = uploadimg(null, $id);
        if($imgBrg && $gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
        // Jika upload gagal, pakai gambar lama
        if(!$imgBrg) $imgBrg = $gbrLama;
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
function update_baksul($data){
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $name = mysqli_real_escape_string($koneksi, $data['name']);
    $satuan = mysqli_real_escape_string($koneksi, $data['satuan']);
    $harga_beli = mysqli_real_escape_string($koneksi, $data['harga_beli']);
    $harga_jual = mysqli_real_escape_string($koneksi, $data['harga_jual']);
    $stockmin = mysqli_real_escape_string($koneksi, $data['stock_minimal']);
    $gbrLama = mysqli_real_escape_string($koneksi, $data['oldImg']);
    

   //cek gambar
    if(!empty($_FILES['image']['name'])) {
        $imgBrg = uploadimg(null, $id);
        if($imgBrg && $gbrLama != 'default-brg.png'){
            @unlink('../asset/image/'.$gbrLama);
        }
        // Jika upload gagal, pakai gambar lama
        if(!$imgBrg) $imgBrg = $gbrLama;
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


