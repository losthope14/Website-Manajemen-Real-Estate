<?php $this->load->view('include/header.php') ?>  

<?php $this->load->view('include/sidebar.php') ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
          	<?php
          		foreach($employees as $employee)
              {
          	?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-3">
              <div class="card card-widget widget-user shadow">
                <div class="widget-user-header bg-info">
                  <h3 class="widget-user-username"><?= $employee['full_name'] ?></h3>
                  <h5 class="widget-user-desc">
                    <?php
                      foreach ($job_positions as $position)
                      {
                        if ($employee['job_id'] == $position['id'])
                        {
                          echo $position['position'];
                        }
                      }
                    ?>
                  </h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="<?= base_url() ?>/assets/image/employee_profile/<?= $employee['image_profile'] ?>" alt="User Avatar" style="width: 90px; height: 90px;">
                </div>
                
                <div class="card-footer">
                  <div class="row">
                    <div class="col">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?= $employee['address'] ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : <?= $employee['phone'] ?></li>
                      </ul>
                    </div>

                    <div class="text-right">
                      <a href="<?= base_url('admindash/send_specific_email/'.$employee['id']) ?>" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a>
                      <a href="<?= base_url('employees/viewEmployeeProfile/'.$employee['id']) ?>" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View Profile
                      </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('include/footer.php') ?>