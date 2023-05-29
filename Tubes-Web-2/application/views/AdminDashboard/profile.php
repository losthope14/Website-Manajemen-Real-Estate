<?php $this->load->view('include/header.php') ?> 

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url() ?>assets/image/real-estate.png" alt="Logo" height="60" width="60">
    <p>Memuat...</p>
</div>

<?php $this->load->view('include/sidebar.php') ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item active">Admin Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url() ?>assets/image/users_profile/<?= $user['image_profile'] ?>"
                       alt="User profile picture" style="width: 90px; height: 90px;">
                </div>

                <h3 class="profile-username text-center"><?= $user['full_name'] ?></h3>

                <p class="text-muted text-center">Admin</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email:</b>
                  </li>
                  <li class="list-group-item">
                    <?= $user['email'] ?>
                  </li>
                  <li class="list-group-item">
                    <b>No. Hp:</b>
                  </li>
                  <li class="list-group-item">
                    <?= $user['phone'] ?>
                  </li>
                  <li class="list-group-item">
                    <b>Tanggal Ditambahkan:</b>
                  </li>
                  <li class="list-group-item">
                    <?php 
                    echo date('d-m-Y', $user['date_created']);
                    ?>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h3 class="card-title">Pengaturan Akun</h3>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div id="settings">
                    <div class="row">
                      <div class="col">
                        <?= $this->session->flashdata('flash'); ?>
                      </div>
                    </div>
                    <?= form_open_multipart('admindash/view_admin_profile/'.$user['id']); ?>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="nama" placeholder="Nama...">
                          <div class="form-text text-danger"><?php echo form_error('nama');?></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email...">
                          <div class="form-text text-danger"><?php echo form_error('email');?></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">No. Hp</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor hp..">
                          <div class="form-text text-danger"><?php echo form_error('phone');?></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Foto Profile</label>
                        <div class="col-sm-10">
                          <div class="row">
                            <div class="col-sm-3">
                              <img src="<?= base_url('assets/image/users_profile/').$user['image_profile']?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image">Pilih file</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('include/footer.php') ?>
 <script>
    $('.custom-file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  </script>