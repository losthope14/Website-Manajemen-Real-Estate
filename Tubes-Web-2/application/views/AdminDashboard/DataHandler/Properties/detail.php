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
            <h1>Detail Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?= base_url() ?>properties/view_property">Data Properti</a></li>
              <li class="breadcrumb-item active">Detail Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row mb-4">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $property['nama_properti'];?></h3>
              <div class="col-12">
              <?php if ($images == null) : ?>
              <div class="callout callout-info">
                <h5><i class="icon fas fa-info"></i> Info!</h5>
                <p>Belum ada gambar yang ditambahkan untuk properti ini.</p>
              </div>
              <a href="<?= base_url()?>properties/add_images" class="btn btn-info" style="width: 150px;">Tambah Gambar</a>
              <?php else : ?>
                <img src="<?= base_url() ?>assets/image/properties/<?php echo $images[0]['image'];?>" class="product-image" alt="Product Image">
              <?php endif; ?>
              </div>
              <div class="col-12 product-image-thumbs">
              <?php 
                foreach ($images as $image) :
              ?>
                <div class="product-image-thumb active"><img src="<?= base_url() ?>assets/image/properties/<?php echo $image['image']?>" alt="Product Image"></div>
              <?php endforeach;?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $property['nama_properti'];?></h3>

              <table class="table">
              	<tr>
              		<th>Status</th>
              		<td><?php echo $property['sold'];?></td>
              	</tr>
              	<tr>
              		<th>Tipe Properti</th>
              		<td><?php echo $property['property_type'];?></td>
              	</tr>
              	<tr>
              		<th>Harga</th>
              		<td>Rp. <?php echo $property['price'];?></td>
              	</tr>
              	<tr>
              		<th>Pemilik</th>
              		<td><?php echo $property['property_owner'];?></td>
              	</tr>
              	<tr>
              		<th>Alamat</th>
              		<td><?php echo $property['address'];?></td>
              	</tr>
              	<tr>
              		<th>Link Video</th>
              		<td><?php echo $property['link_video'];?></td>
              	</tr>
              	<tr>
              		<th>Link Lokasi</th>
              		<td><?php echo $property['link_lokasi'];?></td>
              	</tr>
              	<tr>
              		<th>Tanggal Ditambahkan</th>
              		<td>
              			<?php 
              			echo date('d-m-Y', $property['date_added']);
              			?>
              		</td>
              	</tr>

              <?php if($property['sold_date'] != 0):?>
                <tr>
                  <th>Tanggal Dijual</th>
                  <td>
                    <?php 
                    echo date('d-m-Y', $property['sold_date']);
                    ?>
                  </td>
                </tr>
              <?php endif;?>
              </table>
            </div>
          </div>

          <div class="row">
          	<div class="col">
          		<table class="table">
          			<tr>
	              		<th colspan="2" class="text-center bg-info">Kondisi</th>
	              	</tr>
	              	<tr>
	              		<th>Luas Kapling</th>
	              		<td><?php echo $property['lot_size'];?> meter</td>
	              	</tr>
	              	<tr>
	              		<th>Luas Tanah</th>
	              		<td><?php echo $property['land_area'];?> meter persegi (m<sup>2</sup>)</td>
	              	</tr>
	              	<tr>
	              		<th>Kamar Tidur</th>
	              		<td><?php echo $property['bedroom'];?> buah</td>
	              	</tr>
	              	<tr>
	              		<th>Kamar Mandi</th>
	              		<td><?php echo $property['bathroom'];?> buah</td>
	              	</tr>
	              	<tr>
	              		<th>Aula</th>
	              		<td><?php echo $property['hall'];?> buah</td>
	              	</tr>
	              	<tr>
	              		<th>Balkon</th>
	              		<td><?php echo $property['balcony'];?> buah</td>
	              	</tr>
	              	<tr>
	              		<th>Dapur</th>
	              		<td><?php echo $property['kitchen'];?> buah</td>
              		</tr>
          		</table>
          	</div>
          </div>

          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $property['description'];?></div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('include/footer.php') ?>

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>