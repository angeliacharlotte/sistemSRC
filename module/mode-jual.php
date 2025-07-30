<?php

// GENERRATE NO
function generateNo(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 3, 4);
    $noUrut++;
    $maxno = 'CNJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_cirebon(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_cirebon");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 3, 4);
    $noUrut++;
    $maxno = 'CRJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_baksul(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_baksul");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 3, 4);
    $noUrut++;
    $maxno = 'BSJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_tasik(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_tasik");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 3, 4);
    $noUrut++;
    $maxno = 'TSJ' . sprintf("%04s", $noUrut);

    return $maxno;
}

// TOTAL JUAL
function totalJual($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(qty * harga_jual) AS total FROM tbl_jual_detail WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_cirebon($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_cirebon WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_baksul($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_baksul WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_tasik($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_tasik WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}

// INSERT
function insert($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);

    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail WHERE no_jual = '$no' AND kode_brg = '$kode'");
    if(mysqli_num_rows($cekbrg)){
        echo "<script>
                alert('barang sudah ada, anda harus menghapus dulu jika ingin mengubah qty nya')
                 </script>";
                 return false;
    }
    if(empty($qty)){
        echo "<script>
                alert('Qty tidak boleh kosong')
                 </script>";
                 return false;
    }else {
        $sqlbeli = "INSERT INTO tbl_jual_detail VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_cirebon($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_cirebon WHERE no_jual = '$no' AND kode_brg = '$kode'");
    if(mysqli_num_rows($cekbrg)){
        echo "<script>
                alert('barang sudah ada, anda harus menghapus dulu jika ingin mengubah qty nya')
                 </script>";
                 return false;
    }
    if(empty($qty)){
        echo "<script>
                alert('Qty tidak boleh kosong')
                 </script>";
                 return false;
    }else {
        $sqlbeli = "INSERT INTO tbl_jual_detail_cirebon VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_cirebon SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_baksul($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_baksul WHERE no_jual = '$no' AND kode_brg = '$kode'");
    if(mysqli_num_rows($cekbrg)){
        echo "<script>
                alert('barang sudah ada, anda harus menghapus dulu jika ingin mengubah qty nya')
                 </script>";
                 return false;
    }
    if(empty($qty)){
        echo "<script>
                alert('Qty tidak boleh kosong')
                 </script>";
                 return false;
    }else {
        $sqlbeli = "INSERT INTO tbl_jual_detail_baksul VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_baksul SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_tasik($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_tasik WHERE no_jual = '$no' AND kode_brg = '$kode'");
    if(mysqli_num_rows($cekbrg)){
        echo "<script>
                alert('barang sudah ada, anda harus menghapus dulu jika ingin mengubah qty nya')
                 </script>";
                 return false;
    }
    if(empty($qty)){
        echo "<script>
                alert('Qty tidak boleh kosong')
                 </script>";
                 return false;
    }else {
        $sqlbeli = "INSERT INTO tbl_jual_detail_tasik VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_tasik SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}

// DELETE
function delete($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_cirebon($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_cirebon WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_cirebon SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_baksul($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_baksul WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_baksul SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_tasik($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_tasik WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_tasik SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}

// SIMPAN
function simpan($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    // $customer = mysqli_real_escape_string($koneksi, $data['customer']);      
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 

    $sqlbeli = "INSERT INTO tbl_jual_head VALUES ('$nojual', '$tgl', '$total', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_cirebon($data){ 
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    // $customer = mysqli_real_escape_string($koneksi, $data['customer']);      
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_cirebon VALUES ('$nojual', '$tgl', '$total', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_baksul($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    // $customer = mysqli_real_escape_string($koneksi, $data['customer']);      
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_baksul VALUES ('$nojual', '$tgl', '$total', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_tasik($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    // $customer = mysqli_real_escape_string($koneksi, $data['customer']);      
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_tasik VALUES ('$nojual', '$tgl', '$total', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}

?>