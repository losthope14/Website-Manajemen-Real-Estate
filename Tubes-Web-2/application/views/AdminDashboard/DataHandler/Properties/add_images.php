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
            <h1>Tambah Gambar Properti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url()?>admindash">Home</a></li>
              <li class="breadcrumb-item active">Tambah Gambar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <section class="container-fluid">
        <div class="row">
          <div class="col">
            <div class='alert alert-danger' role='alert' id="pesan" style="display: none;"></div>
          </div>
        </div>
      </section>
    </section>

    <!-- Main content -->
    <section class="container">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col">

    				<div class="card card-primary">
	    				<div class="card-header">
		                	<h3 class="card-title">Tambahkan Gambar</h3>
		              	</div>
		              	<!-- /.card-header -->

		              	<div class="card-body">
		              		<div class="row">
		              			<div class="col">
		              				<form class="dropzone" style="border: 2px dashed gray;">
		              				<div>
		              					<div>
						                  <label>Pilih Nama Properti</label>
						                </div>
						                <div>
						                  <select class="form-control select2" name="property_id" style="width: 100%;">
						                	<?php foreach ($properties as $property) : ?>
						                    <option id = "get-id" value="<?= $property['id'] ?>"><?= $property['nama_properti'] ?></option>
						                	<?php endforeach;?>
						                  </select>
						                  <hr>
						                </div>
                            <div class="dz-message">
                              <p>Klik atau drop gambar di sini</p>
                            </div>
						              </div>
		              				</form>	
		              			</div>
		              		</div>
		              	</div>
		              	

		              	<div class="card-footer text-right">
		              		<button type="button" class="btn btn-primary" id="submit-all" style="width: 150px">Tambah</button>
		              	</div>
    				</div>

    			</div>
    		</div>
    	</div>
    </section>
    <!-- end main content -->
</div>

<?php $this->load->view('include/footer.php') ?>

<!-- dropzonejs -->
<script src="<?= base_url() ?>assets/AdminLTE/plugins/dropzone/min/dropzone.min.js"></script>

<!-- spesific script -->
<script>
  Dropzone.autoDiscover = false;
  
    let myDropzone = new Dropzone(".dropzone", {
       url: "<?php echo base_url()?>properties/proses_upload",
       method: "post",
       autoProcessQueue: false,
       acceptedFiles: "image/*",
       paramName: "userfile",
       dictInvalidFileType: "Tipe file ini tidak diizinkan",
       parallelUploads: 20,
       timeout: 1000,
       addRemoveLinks: true,
    });
  
    $('#submit-all').click(function(){
      if (myDropzone.getQueuedFiles().length == 0)
      {
        let pesan = document.getElementById("pesan");
        pesan.classList = "alert alert-danger";
        pesan.innerHTML = "File gambar belum ditambahkan";
        pesan.style.display = "block";
      } else {
        myDropzone.processQueue();
      }
    });

    myDropzone.on("complete", function(file) {
      if (myDropzone.getQueuedFiles().length == 0 && myDropzone.getUploadingFiles().length == 0)
      {
        let pesan = document.getElementById("pesan");
        myDropzone.removeAllFiles(file);
        pesan.style.display = "block";
        pesan.classList = "alert alert-success";
        pesan.innerHTML = "File gambar berhasil ditambahkan";
      }
      
  });

</script>