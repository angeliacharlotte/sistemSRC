<?php 

function update($data){
    global $koneksi;

    $curPass = trim(mysqli_real_escape_string($koneksi, $_POST['curPass']));
    $newPass = trim(mysqli_real_escape_string($koneksi, $_POST['newPass']));
    $confPass = trim(mysqli_real_escape_string($koneksi, $_POST['confPass']));
    
     $userActive = userLogin()['username'];
    $currentPasswordInDB = userLogin()['password']; // diasumsikan plain text

    if($newPass !== $confPass){
        echo "<script>
            alert('Password gagal diperbarui. Konfirmasi tidak cocok.');
            document.location='?msg=err1';
        </script>";
        return false;
    }

    if($curPass !== $currentPasswordInDB) {
        echo "<script>
            alert('Password gagal diperbarui. Password lama salah.');
            document.location='?msg=err2';
        </script>";
        return false;
    } else {
        $pass = mysqli_real_escape_string($koneksi, $newPass);
        $query = "UPDATE tbl_user SET password = '$pass' WHERE username = '$userActive'";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
}
?>