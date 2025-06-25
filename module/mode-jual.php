<?php

// GENERRATE NO
function generateNo(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_bandung(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_bandung");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_bandung2(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_bandung2");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_bekasi(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_bekasi");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_cirebon(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_cirebon");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_garut(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_garut");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_jakbar(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_jakbar");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_jakpus(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_jakpus");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_jaktim(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_jaktim");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_jaksel(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_jaksel");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_tangerang(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_tangerang");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

    return $maxno;
}
function generateNo_tasik(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_jual) as maxno FROM tbl_jual_head_tasik");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PJ' . sprintf("%04s", $noUrut);

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
function totalJual_bandung($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_bandung WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_bandung2($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_bandung2 WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_bekasi($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_bekasi WHERE no_jual = '$nojual'");
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
function totalJual_garut($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_garut WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_jakbar($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_jakbar WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_jakpus($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_jakpus WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_jaksel($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_jaksel WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_jaktim($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_jaktim WHERE no_jual = '$nojual'");
    $data = mysqli_fetch_assoc($totalJual);

    $total = $data["total"];
    return $total;
}
function totalJual_tangerang($nojual){
    global $koneksi;

    $totalJual = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_jual_detail_tangerang WHERE no_jual = '$nojual'");
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
function insert_bandung($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_bandung WHERE no_jual = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_jual_detail_bandung VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_bandung SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_bandung2($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_bandung2 WHERE no_jual = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_jual_detail_bandung2 VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_bandung2 SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_bekasi($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_bekasi WHERE no_jual = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_jual_detail_bekasi VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_bekasi SET stock = stock - $qty WHERE id_barang = '$kode'");

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
function insert_garut($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_garut WHERE no_jual = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_jual_detail_garut VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_garut SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_jakbar($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_jakbar WHERE no_jual = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_jual_detail_jakbar VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_jakbar SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_jakpus($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_jakpus WHERE no_jual = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_jual_detail_jakpus VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_jakpus SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_jaksel($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_jaksel WHERE no_jual = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_jual_detail_jaksel VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_jaksel SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_jaktim($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_jaktim WHERE no_jual = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_jual_detail_jaktim VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_jaktim SET stock = stock - $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_tangerang($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nojual']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_jual_detail_tangerang WHERE no_jual = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_jual_detail_tangerang VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_tangerang SET stock = stock - $qty WHERE id_barang = '$kode'");

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
function delete_bandung($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_bandung WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_bandung SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_bandung2($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_bandung2 WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_bandung2 SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_bekasi($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_bekasi WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_bekasi SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_cirebon($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_cirebon WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_cirebon SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_garut($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_garut WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_garut SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_jakbar($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_jakbar WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_jakbar SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_jakpus($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_jakpus WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_jakpus SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_jaksel($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_jaksel WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_jaksel SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_jaktim($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_jaktim WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_jaktim SET stock = stock + $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_tangerang($idbrg, $idjual, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_jual_detail_tangerang WHERE kode_brg ='$idbrg' AND no_jual = '$idjual'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_tangerang SET stock = stock + $qty WHERE id_barang = '$idbrg'");

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
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_bandung($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_bandung VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_bandung2($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_bandung2 VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_bekasi($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_bekasi VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_cirebon($data){ 
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_cirebon VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_garut($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_garut VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_jakbar($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_jakbar VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_jakpus($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_jakpus VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_jaksel($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_jaksel VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_jaktim($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_jaktim VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_tangerang($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_tangerang VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_tasik($data){
    global $koneksi;

    $nojual = mysqli_real_escape_string($koneksi, $data['nojual']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $customer = mysqli_real_escape_string($koneksi, $data['customer']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['status']);     
    $bayar = mysqli_real_escape_string($koneksi, $data['bayar']); 
    $tipe = mysqli_real_escape_string($koneksi, $data['tipe']); 

    $sqlbeli = "INSERT INTO tbl_jual_head_tasik VALUES ('$nojual', '$tgl', '$customer', '$total', '$keterangan', '$tipe', '$bayar')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}

?>