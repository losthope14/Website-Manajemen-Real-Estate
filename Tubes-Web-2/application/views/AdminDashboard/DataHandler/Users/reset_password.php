<?php $this->load->view('include/header.php') ?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url() ?>assets/image/real-estate.png" alt="Logo" height="60" width="60">
    <p>Memuat...</p>
</div>  

<?php $this->load->view('include/sidebar.php') ?>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<style>
  .defaultPassword
  {
    height: 60px;
    border: none;
    margin: 15px 0 20px;
    background: transparent;
    outline: none;
    padding: 0 20px;
    font-size: 24px;
    letter-spacing: 4px;
    box-sizing: border-box;
    border-radius: 8px;
    color: #333;
    box-shadow: -4px -4px 10px rgba(255,255,255,1),
                inset 4px 4px 10px rgba(0,0,0,0.05),
                inset -4px -4px 10px rgba(255,255,255,1),
                4px 4px 10px rgba(0,0,0,0.05);
  }

  .card-body {
    background-color: #f8f8f8;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reset User Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url() ?>users">View Users</a></li>
              <li class="breadcrumb-item active">Reset Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Reset Password</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <input class="defaultPassword w-100" type="text" id="defaultPassword" placeholder="Password: easyre123" readonly/>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <button onclick="generatePassword()" id="generateBtn" class="btn btn-block btn-secondary float-sm-left mt-2 mr-3" style="width: 200px;">Generate Password</button>
                    <button onclick="copyPassword()" id="copyBtn" class="btn btn-block btn-success float-sm-left mt-2 swalDefaultSuccess" style="width: 200px;">Copy Password</button>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <form method="post" method="<?= base_url()?>users/reset_user_password">
                <div class="row">
                  <div class="col">
                      <div class="form-group row">
                        <label for="newPassword" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="newPassword" id="newPassword" placeholder="Paste password di sini" value="<?= set_value('newPassword'); ?>">
                          <div class="form-text text-danger"><?php echo form_error('newPassword');?></div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <button type="submit" name="reset" value="reset" class="btn btn-primary float-sm-right" style="width: 150px;">Reset</button>
                  </div>
                </div>
                </form>
              </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php $this->load->view('include/footer.php') ?>
<script src="<?= base_url() ?>/assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
  });
  function generatePassword(){
    let password = "<?= $passwordDefault;?>";
    document.getElementById("defaultPassword").value = password;
  }

  function copyPassword()
  { 
    let copyPassText = document.getElementById("defaultPassword");
    copyPassText.select();
    copyPassText.setSelectionRange(0,9999);
    document.execCommand("copy");

    let check = copyPassText.value;

    if (check)
        {
          Toast.fire({
          icon: 'success',
          title: 'Pasword dicopy! Silahkan paste dikolom input!'
          });
        }
        else
        {
          Toast.fire({
          icon: 'error',
          title: 'Password belum digenerate! Klik tombol Generate Password!'
          });
        }
  }
</script>
