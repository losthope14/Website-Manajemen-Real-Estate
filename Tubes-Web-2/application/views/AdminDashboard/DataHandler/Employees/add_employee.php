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
            <h1>Tambah Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Karyawan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <section class="container-fluid">
        <div class="row">
          <div class="col">
            <?= $this->session->flashdata('flash'); ?>
          </div>
        </div>
      </section>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	<div class="row">
          <div class="col">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Karyawan</h3>
              </div>

              <?= form_open_multipart('employees/add_employee'); ?>
	            <div class="card-body">
	              <div class="row">
	              	<div class="col">
	              	    <div class="form-group row">
                        <label for="namaKaryawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="namaKaryawan" id="namaKaryawan" placeholder="Masukkan nama karyawan" value="<?= set_value('namaKaryawan'); ?>">
                          <?= form_error('namaKaryawan', '<div class="text-danger small">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="emailKaryawan" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="emailKaryawan" id="emailKaryawan" placeholder="Masukkan email" value="<?= set_value('emailKaryawan'); ?>">
                          <?= form_error('emailKaryawan', '<div class="text-danger small">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="jabatan" id="jabatan" style="width: 100%;">
                          <option></option>
                          <?php foreach ($positions as $position) : ?>
                            <option id = "get-id" value="<?= $position['id'] ?>" <?php echo set_select('jabatan', $position['id'], (!empty($jabatanData) && $data == $position['id'] ? TRUE : FALSE)); ?>><?= $position['position'] ?></option>
                          <?php endforeach;?>
                        </select>
                        <?= form_error('jabatan', '<div class="text-danger small">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamatKaryawan" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="alamatKaryawan" id="alamatKaryawan" placeholder="Masukkan alamat" value="<?= set_value('alamatKaryawan'); ?>">
                          <?= form_error('alamatKaryawan', '<div class="text-danger small">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="telpKaryawan" class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="telpKaryawan" id="telpKaryawan" placeholder="Masukkan nomor telepon" value="<?= set_value('telpKaryawan'); ?>">
                          <?= form_error('telpKaryawan', '<div class="text-danger small">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Foto profile</label>
                        <div class="col-sm-10">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image" id="image">
                              <label class="custom-file-label" for="image">Pilih file</label>
                          </div>
                        </div>
                      </div>
	              	</div>
	              </div>
	            </div>
              <div class="card-footer">
                  <button type="submit" name="submit" value="submit" class="btn btn-primary float-sm-right" style="width: 150px;">Tambah</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('include/footer.php') ?>
  <script>
    $('.custom-file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  </script>