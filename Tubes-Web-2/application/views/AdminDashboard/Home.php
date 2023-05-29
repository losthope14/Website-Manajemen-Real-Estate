<?php $this->load->view('include/header.php') ?>	

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url() ?>assets/image/real-estate.png" alt="Logo" height="60" width="60">
    <p>Memuat...</p>
</div>

<?php $this->load->view('include/sidebar.php') ?>
<!-- Toastr -->
<link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/plugins/toastr/toastr.min.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 style="color: white;"><?= count($properties); ?></h3>

                <p>Jumlah Properti</p>
              </div>
              <div class="icon">
                <i class="fas fa-database"></i>
              </div>
              <a href="<?= base_url()?>properties/view_property" class="small-box-footer">
                Lihat Data <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 style="color: white;"><?= count($propertyImagesCount); ?></h3>

                <p>Gambar Properti</p>
              </div>
              <div class="icon">
                <i class="fas fa-images"></i>
              </div>
              <a href="<?= base_url() ?>properties/view_property_images" class="small-box-footer">
                Lihat Data <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 style="color: white;"><?= count($employeesCount); ?></h3>

                <p>Jumlah Karyawan</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="<?= base_url() ?>employees/view_data" class="small-box-footer">
                Lihat Data <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 style="color: white;"><?= count($usersCount); ?></h3>

                <p>Jumlah Akun User</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="<?= base_url() ?>users" class="small-box-footer">
                Lihat Data <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Tipe Properti</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Status Penjualan</h3>
                  <a href="<?= base_url()?>reports/properties_report">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="anotherDChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('include/footer.php') ?>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
<script>

  // Donut Tipe Properti
  var PropertiesTypeData = <?php echo json_encode($propertyTypeData);?>;
  var DataSize = Object.keys(PropertiesTypeData).length;
  var PropertyType = [];
  var PropertyCount = [];

  for (i = 0; i < DataSize; i++)
  {
    PropertyType[i] = PropertiesTypeData[i].property_type;
    PropertyCount[i] = PropertiesTypeData[i].property_count;
  }

  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: PropertyType,
      datasets: [
        {
          data: PropertyCount,
          backgroundColor : ['#20B2AA', '#045F5F', '#1589FF', '#87CEEB'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    // Donut Status Penjualan
    var SoldStatusData = <?php echo json_encode($propertiesSoldStatus);?>;
    var DataSize = Object.keys(SoldStatusData).length;
    var SoldStatus = [];
    var StatusCount = [];

    for (i = 0; i < DataSize; i++)
    {
      SoldStatus[i] = SoldStatusData[i].sold;
      StatusCount[i] = SoldStatusData[i].sold_count;
    }

    var donutChartCanvas = $('#anotherDChart').get(0).getContext('2d')
    var donutData        = {
      labels: SoldStatus,
      datasets: [
        {
          data: StatusCount,
          backgroundColor : ['#228B22', '#254117'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

  // welcome toast
  welcome_id = "<?php echo $this->session->userdata('id');?>";
  if (welcome_id)
  {
    toastr.success('Welcome, <?php echo $user['full_name']; echo '<br>';?>Happy nice day!');
  }
  
</script>
<?php $this->session->unset_userdata('id');?>