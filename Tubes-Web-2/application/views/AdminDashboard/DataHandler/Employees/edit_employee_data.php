<?php $this->load->view('include/header.php') ?> 
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> 

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
            <h1>Update Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admindash">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url() ?>employees/view_data">View Data</a></li>
              <li class="breadcrumb-item active">Update Data Karyawan</li>
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

              <?= form_open_multipart('employees/edit_employee_data/'.$employee['id']); ?>
	            <div class="card-body">
	              <div class="row">
	              	<div class="col">
	              	    <div class="form-group row">
                        <label for="namaKaryawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="namaKaryawan" id="namaKaryawan" placeholder="Masukkan nama karyawan" value="<?= $employee['full_name']?>">
                          <div class="form-text text-danger"><?php echo form_error('namaKaryawan');?></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="emailKaryawan" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="emailKaryawan" id="emailKaryawan" placeholder="Masukkan email" value="<?= $employee['email']?>">
                          <div class="form-text text-danger"><?php echo form_error('emailKaryawan');?></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="jabatan" id="jabatan" style="width: 100%;">
                          <option></option>
                          <?php foreach ($positions as $position) : ?>
                            <?php if ($employee['job_id'] == $position['id']) { ?>
                              <option id = "get-id" value="<?= $position['id'] ?>" <?php echo set_select('jabatan', $position['id'], (!empty($jabatanData) && $data == $position['id'] ? TRUE : FALSE)); ?> selected><?= $position['position'] ?></option>
                            <?php } else {?>
                              <option id = "get-id" value="<?= $position['id'] ?>" <?php echo set_select('jabatan', $position['id'], (!empty($jabatanData) && $data == $position['id'] ? TRUE : FALSE)); ?>><?= $position['position'] ?></option>
                            <?php }?>
                          <?php endforeach;?>
                        </select>
                        <div class="form-text text-danger"><?php echo form_error('jabatan');?></div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="status" id="status" style="width: 100%;">
                          <option></option>
                          <?php if ($employee['is_active'] == 1) { ?>
                          <option id = "get-id" value="1" selected>Active</option>
                          <option id = "get-id" value="0">Non-Active</option>
                          <?php } else {?>
                          <option id = "get-id" value="1">Active</option>
                          <option id = "get-id" value="0" selected>Non-Active</option>
                          <?php }?>
                        </select>
                        <div class="form-text text-danger"><?php echo form_error('status');?></div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="alamatKaryawan" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="alamatKaryawan" id="alamatKaryawan" placeholder="Masukkan alamat" value="<?= $employee['address']?>">
                          <div class="form-text text-danger"><?php echo form_error('alamatKaryawan');?></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="telpKaryawan" class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="telpKaryawan" id="telpKaryawan" placeholder="Masukkan nomor telepon" value="<?= $employee['phone']?>">
                          <div class="form-text text-danger"><?php echo form_error('telpKaryawan');?></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Foto profile</label>
                        <div class="col-sm-10">
                          <div class="row">
                            <div class="col-sm-3">
                              <img src="<?= base_url('assets/image/employee_profile/').$employee['image_profile']?>" class="img-thumbnail">
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
	              	</div>
	              </div>
	            </div>
              <div class="card-footer">
                  <button type="submit" name="update" value="update" class="btn btn-primary float-sm-right" style="width: 150px;">Update</button>
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