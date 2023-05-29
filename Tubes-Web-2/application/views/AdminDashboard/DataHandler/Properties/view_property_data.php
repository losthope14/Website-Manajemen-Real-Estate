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
            <h1>Data Properti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item active">Data Properti</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <section class="container-fluid">
        <div class="row">
          <div class="col">
            <?php if ($this->session->flashdata('flash') ) :?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data properti berhasil <strong><?php echo $this->session->flashdata('flash');?></strong>!
            </div>
           <?php endif;?>
          </div>
        </div>
      </section>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Properti</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Properti</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
         				<?php $no=1; foreach ($properties as $property) : ?>
          					<tr>
          						<td><?= $no; ?></td>
          						<td><?= $property['nama_properti']; ?></td>
          						<td><?= $property['price']; ?></td>
          						<td><?= $property['sold']; ?></td>
          						<td colspan="3">
          							<a href="<?= base_url() ?>properties/view_details/<?php echo $property['id']?>" class="btn btn-block btn-info">Detail</a>
          							<a href="<?= base_url() ?>properties/update_property/<?php echo $property['id']?>" class="btn btn-block btn-warning">Ubah</a>
          							<a href="<?= base_url() ?>properties/delete_property/<?php echo $property['id']?>" class="btn btn-block btn-danger">Hapus</a>
          						</td>
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
      "buttons": ["colvis"],
      "paging": true,
      "info": true,
      "pageLength": 10
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>