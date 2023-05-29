<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Real-Estate Management | <?= $title ?></title>

  <!-- favicon -->
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/image/real-estate.png?v=2"/>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <p>Access Forbidden</p>
  </div>
  <?php 
    if (form_error('password'))
    {
      $this->session->set_flashdata('message', 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>Password belum diisi!
        </div>');
    }
    echo $this->session->flashdata('message'); 
  ?>
  <!-- User name -->
  <div class="lockscreen-name"><?= $user['full_name'] ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?= base_url() ?>assets/image/users_profile/<?= $user['image_profile'] ?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="<?= base_url('auth/account_retrieve') ?>" method="post">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="Masukkan password" name="password">

        <div class="input-group-append">
          <button type="submit" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>

  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Masukkan password untuk kembali ke akun anda
  </div>
  <div class="text-center">
    <a href="<?= base_url() ?>auth/logout">Atau Sign In sebagai user lain <?php $this->session->unset_userdata('sign'); ?></a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2021 <b><a href="#" class="text-black">First Group</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
