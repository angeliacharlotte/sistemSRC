<?php

// GENERATE NOMOR
function generateNo(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_bandung(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_bandung");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_bandung2(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_bandung2");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_bekasi(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_bekasi");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_cirebon(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_cirebon");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_garut(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_garut");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_jakbar(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_jakbar");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_jakpus(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_jakpus");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_jaktim(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_jaktim");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_jaksel(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_jaksel");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_tangerang(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_tangerang");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

    return $maxno;
} 
function generateNo_tasik(){
    global $koneksi;

    $queryNo = mysqli_query($koneksi, "SELECT max(no_beli) as maxno FROM tbl_beli_head_tasik");
    $row = mysqli_fetch_assoc($queryNo);
    $maxno = $row["maxno"];

    $noUrut = (int) substr($maxno, 2, 4);
    $noUrut++;
    $maxno = 'PB' . sprintf("%04s", $noUrut);

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
function totalBeliBandung($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_bandung WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliBandung2($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_bandung2 WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliBekasi($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_bekasi WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliGarut($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_garut WHERE no_beli = '$nobeli'");
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
function totalBeliJakpus($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_jakpus WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliJakbar($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_jakbar WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliJaktim($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_jaktim WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliJaksel($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_jaksel WHERE no_beli = '$nobeli'");
    $data = mysqli_fetch_assoc($totalBeli);

    $total = $data["total"];
    return $total;
}
function totalBeliTangerang($nobeli){
    global $koneksi;

    $totalBeli = mysqli_query($koneksi, "SELECT sum(jml_harga) AS total FROM tbl_beli_detail_tangerang WHERE no_beli = '$nobeli'");
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
function insert_bandung($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_bandung WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_bandung VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_bandung SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_bandung2($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_bandung2 WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_bandung2 VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_bandung2 SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_bekasi($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_bekasi WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_bekasi VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_bekasi SET stock = stock + $qty WHERE id_barang = '$kode'");

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
function insert_garut($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_garut WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_garut VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_garut SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_jakbar($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_jakbar WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_jakbar VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_jakbar SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_jakpus($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_jakpus WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_jakpus VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_jakpus SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_jaktim($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_jaktim WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_jaktim VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_jaktim SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_jaksel($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_jaksel WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_jaksel VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_jaksel SET stock = stock + $qty WHERE id_barang = '$kode'");

    return mysqli_affected_rows($koneksi);
}
function insert_tangerang($data){
    global $koneksi;

    $no = mysqli_real_escape_string($koneksi, $data['nobeli']);
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']);
    $kode = mysqli_real_escape_string($koneksi, $data['kodeBrg']);
    $nama = mysqli_real_escape_string($koneksi, $data['namaBrg']);
    $qty = mysqli_real_escape_string($koneksi, $data['qty']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $jmlharga = mysqli_real_escape_string($koneksi, $data['jmlHarga']);

    $cekbrg = mysqli_query($koneksi, "SELECT * FROM tbl_beli_detail_tangerang WHERE no_beli = '$no' AND kode_brg = '$kode'");
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
        $sqlbeli = "INSERT INTO tbl_beli_detail_tangerang VALUES (null, '$no', '$tgl', '$kode', '$nama', $qty, $harga, $jmlharga)";
        mysqli_query($koneksi, $sqlbeli);
        
    }
    mysqli_query($koneksi, "UPDATE tbl_barang_tangerang SET stock = stock + $qty WHERE id_barang = '$kode'");

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
function delete_bandung($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_bandung WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_bandung SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_bandung2($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_bandung2 WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_bandung2 SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_bekasi($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_bekasi WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_bekasi SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_cirebon($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_cirebon WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_cirebon SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_garut($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_garut WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_garut SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_jakpus($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_jakpus WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_jakpus SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_jakbar($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_jakbar WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_jakbar SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_jaktim($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_jaktim WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_jaktim SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_jaksel($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_jaksel WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_jaksel SET stock = stock - $qty WHERE id_barang = '$idbrg'");

    return mysqli_affected_rows($koneksi);
}
function delete_tangerang($idbrg, $idbeli, $qty) {
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_beli_detail_tangerang WHERE kode_brg ='$idbrg' AND no_beli = '$idbeli'";
    mysqli_query($koneksi, $sqlDel);

    mysqli_query($koneksi, "UPDATE tbl_barang_tangerang SET stock = stock - $qty WHERE id_barang = '$idbrg'");

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
function simpan_bandung($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_bandung VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_bandung2($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_bandung2 VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_bekasi($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_bekasi (no_beli, tgl_beli, suplier, total, keterangan) VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
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
function simpan_garut($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_garut VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_jakpus($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_jakpus VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_jakbar($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_jakbar VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_jaktim($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_jaktim VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_jaksel($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_jaksel VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
    mysqli_query($koneksi, $sqlbeli);

    return mysqli_affected_rows($koneksi);
}
function simpan_tangerang($data){
    global $koneksi;

    $nobeli = mysqli_real_escape_string($koneksi, $data['nobeli']); 
    $tgl = mysqli_real_escape_string($koneksi, $data['tglNota']); 
    $total = mysqli_real_escape_string($koneksi, $data['total']); 
    $suplier = mysqli_real_escape_string($koneksi, $data['suplier']); 
    $keterangan = mysqli_real_escape_string($koneksi, $data['ketr']); 

    $sqlbeli = "INSERT INTO tbl_beli_head_tangerang VALUES ('$nobeli', '$tgl', '$suplier', $total, '$keterangan')";
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