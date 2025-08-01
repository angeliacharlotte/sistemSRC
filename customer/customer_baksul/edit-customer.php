<?php

session_start();

if(!isset($_SESSION["ssLoginPOS"])) {
  header("location: ../auth/login.php");
  exit();
}

require "../../config/config.php";
require "../../config/functions.php";
require "../../module/mode-customer.php";

$title = "Edit Customer - Inventory";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php";

// jalankan fungsi  update data
if(isset($_POST['update'])){
    if (update_tangerang($_POST)) {
        echo "<script>
            document.location.href = 'data-customer.php?msg=updated';
        </script>";
    }
}
$id = $_GET['id'];

$sqlEdit = "SELECT * FROM tbl_customer_tangerang WHERE id_customer = $id";
$customer = getData($sqlEdit)[0];


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $main_url ?>customer/customer_tangerang/data-customer.php">Customer</a></li>
              <li class="breadcrumb-item active">Edit Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="" method="post">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus fa-sm"></i> Edit Customer</h3>
                <button type="submit" name="update" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i>  Update</button>
                <button type="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i>  Reset</button>
            </div>
            <div class="card-body">
              <div class="row">
                <input type="hidden" name="id" value="<?= $customer['id_customer'] ?>">
                <div class="col-lg-8 mb-3">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="nama customer"autofocus value="<?= $customer['nama'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="telpon">Telpon</label>
                    <input type="text" name="telpon" class="form-control" id="telpon" placeholder="no telpon customer" pattern="[0-9]{9,}" title="minimal 9 angka" value="<?= $customer['telpon'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="telpon">Area</label>
                    <textarea name="ketr" id="ketr" rows="1" class="form-control" placeholder="Keterangan customer" required><?= $customer['deskripsi'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Alamat customer" required><?= $customer['alamat'] ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            </form>
        </div>
    </div>
</section>

<?php

require "../../template/footer.php"

?>