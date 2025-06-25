<?php

// Purwakarta
function insert($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
// Bandung
function insert_bandung($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_bandung VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
// Bandung2
function insert_bandung2($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_bandung2 VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
// Bekasi
function insert_bekasi($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_bekasi VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function insert_cirebon($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_cirebon VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function insert_garut($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_garut VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function insert_jakbar($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_jakbar VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function insert_jakpus($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_jakpus VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function insert_jaksel($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_jaksel VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function insert_jaktim($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_jaktim VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function insert_tangerang($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_tangerang VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function insert_tasik($data) {
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "INSERT INTO tbl_customer_tasik VALUES (null, '$nama', '$telpon', '$ketr', '$alamat')";
    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}

function delete($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_bandung($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_bandung WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_bandung2($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_bandung2 WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_bekasi($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_bekasi WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_cirebon($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_cirebon WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_garut($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_garut WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_jakbar($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_jakbar WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_jakpus($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_jakpus WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_jaksel($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_jaksel WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_jaktim($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_jaktim WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_tangerang($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_tangerang WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}
function delete_tasik($id){
    global $koneksi;
    $sqlDelete = "DELETE FROM tbl_customer_tasik WHERE id_customer = $id";
    mysqli_query($koneksi, $sqlDelete);
    return mysqli_affected_rows($koneksi);
}

function update ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_bandung ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_bandung SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_bandung2 ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_bandung2 SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_bekasi ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_bekasi SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_cirebon ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_cirebon SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_garut ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_garut SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_jakbar ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_jakbar SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_jakpus ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_jakpus SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_jaksel ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_jaksel SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_jaktim ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_jaktim SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_tangerang ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_tangerang SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}
function update_tasik ($data){
    global $koneksi;

    $id =  mysqli_real_escape_string($koneksi, $data['id']); 
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
    $ketr = mysqli_real_escape_string($koneksi, $data['ketr']);

    $sqlCustomer = "UPDATE tbl_customer_tasik SET 
                    nama = '$nama',
                    telpon = '$telpon',
                    deskripsi = '$ketr',
                    alamat = '$alamat'
                    WHERE id_customer = '$id'";

    mysqli_query($koneksi, $sqlCustomer);

    return mysqli_affected_rows($koneksi);
}

?>