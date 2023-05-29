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
            <h1>Ubah Data Properti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url() ?>properties/view_property">Data Properti</a></li>
              <li class="breadcrumb-item active">Ubah Properti</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Properti</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                <div class="card-body">
                  <div class="row">
                    <!--kolom 1-->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="namaProperti">Nama Properti</label>
                        <input type="text" class="form-control" name="namaProperti" id="namaProperti" placeholder="Masukkan nama properti" value="<?= $property['nama_properti'] ?>">
                        <div class="form-text text-danger"><?php echo form_error('namaProperti');?></div>
                      </div>
                      <div class="form-group">
                        <label for="tipeProperti">Tipe Properti</label>
                        <input type="text" class="form-control" name="tipeProperti" id="tipeProperti" placeholder="Masukkan tipe properti" value="<?= $property['property_type'] ?>">
                        <div class="form-text text-danger"><?php echo form_error('tipeProperti');?></div>
                      </div>
                      <div class="form-group">
                        <label style="margin-right: 15px">Status : </label>
                        <div class="icheck-success d-inline">
                          <?php if ($property['sold'] != 'Terjual') { ?>
                          <input type="radio" name="status" id="status1" value="Terjual">
                          <?php } else { ?>
                          <input type="radio" name="status" id="status1" value="Terjual" checked>
                          <?php } ?>
                          <label for="status1">Terjual
                          </label>
                        </div>
                        <div class="icheck-danger d-inline">
                          <?php if ($property['sold'] != 'Belum Terjual') { ?>
                          <input type="radio" name="status" id="status2" value="Belum Terjual">
                          <?php } else { ?>
                          <input type="radio" name="status" id="status2" value="Belum Terjual" checked>
                          <?php } ?>
                          <label for="status2">Belum Terjual
                          </label>
                        </div>
                        <div class="form-text text-danger"><?php echo form_error('status');?></div>
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan jumlah harga" value="<?= $property['price'] ?>">
                        <div class="form-text text-danger"><?php echo form_error('harga');?></div>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan lokasi properti" value="<?= $property['address'] ?>">
                        <div class="form-text text-danger"><?php echo form_error('alamat');?></div>
                      </div>
                      <div class="form-group">
                        <label for="link_video">Link Video</label>
                        <input type="text" class="form-control" name="link_video" id="link_video" placeholder="Masukkan link video" value="<?= $property['link_video'] ?>">
                        <div class="form-text text-danger"><?php echo form_error('link_video');?></div>
                      </div>
                    </div>

                    <!--kolom 2-->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pemilikProperti">Pemilik Properti</label>
                        <input type="text" class="form-control" name="pemilikProperti" id="pemilikProperti" placeholder="Masukkan nama pemilik properti" value="<?= $property['property_owner'] ?>">
                        <div class="form-text text-danger"><?php echo form_error('pemilikProperti');?></div>
                      </div>
                      <div class="form-group">
                        <label for="lot_size">Ukuran Kaveling</label>
                        <input type="text" class="form-control" name="lot_size" id="lot_size" placeholder="Masukkan ukuran kaveling (panjang x lebar)" value="<?= $property['lot_size'] ?>">
                        <div class="form-text text-danger"><?php echo form_error('lot_size');?></div>
                      </div>
                      <div class="form-group">
                        <label for="land_area">Luas Lahan</label>
                        <input type="text" class="form-control" name="land_area" id="land_area" placeholder="Masukkan luas lahan (meter persegi)" value="<?= $property['land_area'] ?>">
                        <div class="form-text text-danger"><?php echo form_error('land_area');?></div>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi mengenai properti" rows="3" cols="50"><?= $property['description'] ?></textarea>
                        <div class="form-text text-danger"><?php echo form_error('deskripsi');?></div>
                      </div>
                      <div class="form-group">
                        <label for="link_lokasi">Link Lokasi</label>
                        <input type="text" class="form-control" name="link_lokasi" id="link_lokasi" placeholder="Masukkan link lokasi" value="<?= $property['link_lokasi'] ?>">
                        <div class="form-text text-danger"><?php echo form_error('link_lokasi');?></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="card card-outline card-secondary">
                        <div class="card-header text-center">
                          <h3>Kondisi</h3>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <!-- kolom 1 -->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="kitchen">Dapur</label>
                                <input type="number" class="form-control" name="kitchen" id="kitchen" value="<?= $property['kitchen'] ?>">
                                <div class="form-text text-danger"><?php echo form_error('kitchen');?></div>
                              </div>
                              <div class="form-group">
                                <label for="bedroom">Kamar Tidur</label>
                                <input type="number" class="form-control" name="bedroom" id="bedroom" value="<?= $property['bedroom'] ?>">
                                <div class="form-text text-danger"><?php echo form_error('bedroom');?></div>
                              </div>
                              <div class="form-group">
                                <label for="number">Balkon</label>
                                <input type="text" class="form-control" name="balcony" id="balcony" value="<?= $property['balcony'] ?>">
                                <div class="form-text text-danger"><?php echo form_error('balcony');?></div>
                              </div>
                            </div>

                            <!--kolom 2-->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="hall">Aula</label>
                                <input type="number" class="form-control" name="hall" id="hall" value="<?= $property['hall'] ?>">
                                <div class="form-text text-danger"><?php echo form_error('hall');?></div>
                              </div>
                              <div class="form-group">
                                <label for="bathroom">Kamar Mandi</label>
                                <input type="number" class="form-control" name="bathroom" id="bathroom" value="<?= $property['bathroom'] ?>">
                                <div class="form-text text-danger"><?php echo form_error('bathroom');?></div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <!-- end card body-->
                      </div>
                    </div>
                  </div>

                </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" name="submit" value="submit" class="btn btn-primary float-sm-right" style="width: 150px;">Ubah</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>
<!--content wrapper-->

<?php $this->load->view('include/footer.php') ?>	