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
            <h1>Data Gambar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url()?>/admindash">Home</a></li>
              <li class="breadcrumb-item active">Data Gambar</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Gambar Properti</h4>
              </div>
              <div class="card-body">
                <div class="row">
                    <?php foreach($images as $image) {?>
                    <div class="col-sm-3" data-category="<?= $image['property_id'];?>">
                      <a 
                      href="<?= base_url() ?>assets/image/properties/<?= $image['image'];?>" data-toggle="lightbox" 
                      <?php foreach ($properties as $property):?>
                      <?php if ($property['id'] == $image['property_id']):?>
                      data-title="<?php echo "Gambar Properti - ".$property['nama_properti'];?>"
                      <?php endif;?>
                      <?php endforeach;?>
                      data-gallery="gallery">
                        <img src="<?= base_url() ?>assets/image/properties/<?= $image['image'];?>" class="img-fluid mb-4"/>
                      </a>
                    </div>
                    <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('include/footer.php') ?>
<!-- Ekko Lightbox -->
<script src="<?= base_url() ?>assets/AdminLTE/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Filterizr-->
<script src="<?= base_url() ?>assets/AdminLTE/plugins/filterizr/jquery.filterizr.min.js"></script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
</body>
</html>
