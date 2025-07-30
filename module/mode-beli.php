<?php

// GENERATE NOMOR
function generateNo(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 3, 4);
    $noUrut++;
    $maxno = 'CNB' . sprintf("%04s", $noUrut);

    return $maxno;
}  
function generateNo_cirebon(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_cirebon");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 3, 4);
    $noUrut++;
    $maxno = 'CRB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_baksul(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_baksul");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 3, 4);
    $noUrut++;
    $maxno = 'BSB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_tasik(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_tasik");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 3, 4);
    $noUrut++;
    $maxno = 'TSB' . sprintf("%04s", $noUrut);

    return $maxno;
} 

// TOTAL BELI
function totalBeli($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliCirebon($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_cirebon WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliBaksul($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_baksul WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliTasik($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_tasik WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}

// INSERT
function insert($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_cirebon($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_cirebon WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_cirebon VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_cirebon SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_baksul($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_baksul WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_baksul VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_baksul SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_tasik($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_tasik WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_tasik VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_tasik SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}

// DELETE
function delete($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_cirebon($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_cirebon WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_cirebon SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_baksul($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_baksul WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_baksul SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_tasik($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_tasik WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_tasik SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}

// SIMPAN
function simpan($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_cirebon($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_cirebon VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_baksul($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_baksul VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_tasik($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_tasik VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}

?>