<?php

session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
  header("Location: ../../auth/login.php?pesan=belum_login");
} elseif ($_SESSION["level"] != '1') {
  header("Location: ../../error-page.php?pesan=tolak_akses");
}

require "../../config/config.php";
require "../../config/functions.php";
require "../../module/mode-user.php";

$title = "Update User - Inventory";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php";

$id = $_GET['id'];

$sqlEdit = "SELECT * FROM tbl_user WHERE userid = $id";
$user = getData($sqlEdit)[0];
$level = $user['level'];

if (isset($_POST['koreksi'])) {
    if(update($_POST)) {
        echo '<script>
    alert("Data user berhasil diupdate !");
    document.location.href = "data-user.php";
    </script>';
    }
}


?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $main_url ?>user/data-user.php">Users</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-pen fa-sm"></i> Edit User</h3>
                <button type="submit" name="koreksi" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i>  Koreksi</button>
                <button type="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i>  Reset</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <input type="hidden" value="<?= $user['userid'] ?>" name="id">
                    <div class="col-lg-8 mb-3">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="masukkan username" autofocus autocomplete="off" value="<?= $user['username'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="masukkan nama lengkap" value="<?= $user['fullname'] ?>" required>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="">--Level User--</option>
                                <option value="1" <?= selectUser1($level) ?>>Administrator</option>
                                <option value="2" <?= selectUser2($level) ?>>Operator Bandung</option>
                                <option value="3" <?= selectUser3($level) ?>>Operator Purwakarta</option> 
                                <option value="4" <?= selectUser4($level) ?>>Operator Bandung2</option>
                                <option value="5" <?= selectUser5($level) ?>>Operator Bekasi</option> 
                                <option value="6" <?= selectUser6($level) ?>>Operator Cirebon</option>
                                <option value="7" <?= selectUser7($level) ?>>Operator Garut</option> 
                                <option value="8" <?= selectUser8($level) ?>>Operator Jakarta Barat</option>
                                <option value="9" <?= selectUser9($level) ?>>Operator Jakarta Pusat</option> 
                                <option value="10" <?= selectUser10($level) ?>>Operator Jakarta Selatan</option>
                                <option value="11" <?= selectUser11($level) ?>>Operator Jakarta Timur</option> 
                                <option value="12" <?= selectUser12($level) ?>>Operator Tangerang</option>
                                <option value="13" <?= selectUser13($level) ?>>Operator Tasikmalaya</option> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" cols="" rows="3" class="form-control" placeholder="masukkan alamat" required><?= $user['address'] ?></textarea>
                           
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <input type="hidden" name="oldImg" value="<?= $user['foto'] ?>">
                        <img src="<?= $main_url ?>asset/image/<?= $user['foto'] ?>" class="profile-user-img img-circle mb-3" alt="">
                        <input type="file" class="form-control" name="image">
                        <span class="text-sm">Type file gambar JPG | PNG | GIF</span>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>


</section>

<?php

require "../../template/footer.php";

?>