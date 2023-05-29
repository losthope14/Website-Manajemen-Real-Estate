<?php $this->load->view('include/header.php') ?>	

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url() ?>assets/image/real-estate.png" alt="Logo" height="60" width="60">
    <p>Memuat...</p>
</div>

<?php $this->load->view('include/sidebar.php') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Data Properti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item active">Report Data Properti</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Properti</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!--<div class="row">
                  <div class="col">
                    <a href="<?=base_url()?>reports/cetak_properti">Pdf</a>
                  </div>
                </div>-->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Properti</th>
                    <th>Harga</th>
                    <th>Tipe</th>
                    <th>Luas Kapling</th>
                    <th>Luas Area</th>
                    <th>Status</th>
                    <th>Pemilik</th>
                    <th>Alamat</th>
                  </tr>
                  </thead>
                  <tbody>
         				<?php $no=1; foreach ($properties as $property) : ?>
          					<tr>
          						<td><?= $no; ?></td>
          						<td><?= $property['nama_properti']; ?></td>
          						<td><?= $property['price']; ?></td>
                      <td><?= $property['property_type']; ?></td>
                      <td><?= $property['lot_size']; ?></td>
                      <td><?= $property['land_area']; ?></td>
          						<td><?= $property['sold']; ?></td>
                      <td><?= $property['property_owner']; ?></td>
                      <td><?= $property['address']; ?></td>
          					</tr>
          				<?php $no++; endforeach;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      "searching": false,
      "paging": false,
      "info": false,
      "ordering": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>