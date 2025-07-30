<?php

session_start();

require "../config/config.php";

if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST ['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST ['password']);

    $queryLogin = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'");

    if(mysqli_num_rows($queryLogin) === 1) {
        $row = mysqli_fetch_assoc($queryLogin);
        if($password === $row['password']) {
        // set session
          $_SESSION["ssLoginPOS"] = true;
          $_SESSION['userid'] = $row['userid'];
          $_SESSION['fullname'] = $row['fullname'];
          $_SESSION['address'] = $row['address'];
          $_SESSION['level'] = $row['level'];
          $_SESSION['foto'] = $row['foto'];
          $_SESSION['username'] = $row['username'];

              if ($row['level'] == '1') {
                    header("Location: ../dashboard.php");
                    exit();
                }else if($row['level'] == '2'){
                    header("Location: ../operator/cinunuk/");
                    exit();
                }else if($row['level'] == '3'){
                    header("Location: ../operator/cirebon/");
                    exit();
                }else if($row['level'] == '4'){
                    header("Location: ../operator/tasikmalaya/");
                    exit();              
                } else {
                  header("Location: ../operator/tasikmalaya/");
                    exit();
                }
        } else {
            echo "<script>alert('Password salah..');</script>";
        }
    } else {
        echo "<script>alert('Username tidak terdaftar..');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Inventory </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $main_url ?>asset/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= $main_url ?>asset/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $main_url ?>asset/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!--favicon  -->
  <link rel="shortcut icon" href="<?= $main_url ?>asset/image/cart.png" type="image/icon">
  <link rel="stylesheet" href="style.css">
</head>

<body class="hold-transition login-page" id="bg-login">
<div class="login-box slide-down" style="margin-top : -70px;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#l" class="h1"><b>Inventory</b>MP</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-4">
          <input type="text" name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-uer"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="mb-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
      </form>

      <p class="my-3 text-center">
        <strong>Copyright &copy; 2025 <span class="text-info">PT. Mega Production Corp.</span></strong>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= $main_url ?>asset/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $main_url ?>asset/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $main_url ?>asset/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>
