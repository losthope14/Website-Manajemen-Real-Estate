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
            <h1>Employee Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash/view_contacts">Contacts</a></li>
              <li class="breadcrumb-item active">Employee Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url() ?>assets/image/employee_profile/<?= $employee['image_profile'] ?>"
                       alt="User profile picture" style="width: 90px; height: 90px;">
                </div>

                <h3 class="profile-username text-center"><?= $employee['full_name'] ?></h3>

                <p class="text-muted text-center">Karyawan</p>

                <div class="row">
                  <div class="col-sm-6">
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Email:</b>
                      </li>
                      <li class="list-group-item">
                        <?= $employee['email'] ?>
                      </li>
                      <li class="list-group-item">
                        <b>Jabatan:</b>
                      </li>
                      <li class="list-group-item">
                        <?php
                          foreach ($positions as $position) 
                          {
                            if ($position['id'] == $employee['job_id'])
                              echo $position['position'];
                          }
                        ?>
                      </li>
                      <li class="list-group-item">
                        <b>No. Hp:</b>
                      </li>
                      <li class="list-group-item">
                        <?= $employee['phone'] ?>
                      </li>
                    </ul>
                  </div>

                  <div class="col-sm-6">
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Alamat:</b>
                      </li>
                      <li class="list-group-item">
                        <?= $employee['address'] ?>
                      </li>
                      <li class="list-group-item">
                        <b>Status:</b>
                      </li>
                      <li class="list-group-item">
                        <?php
                          if ($employee['is_active'] == 1)
                            echo "Active";
                          else
                            echo "Non-Active";
                        ?>
                      </li>
                      <li class="list-group-item">
                        <b>Tanggal Bergabung:</b>
                      </li>
                      <li class="list-group-item">
                        <?php 
                        echo date('d-m-Y', $employee['date_join']);
                        ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          
        </div>
      </div>
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('include/footer.php') ?>