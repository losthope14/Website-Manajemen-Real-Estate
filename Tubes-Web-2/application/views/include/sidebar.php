<!-- jQuery -->
<script src="<?= base_url() ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>admindash" class="brand-link">
      <img src="<?= base_url() ?>assets/image/real-estate.png" alt="Real-Estate Logo" class="brand-image img-circle elevation-3" style="opacity: .8;">
      <span class="brand-text font-weight-light">Real - Estate</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>/assets/image/users_profile/<?= $user['image_profile'] ?>" class="img-circle elevation-2" alt="User Image" style="width:35px; height: 35px;">
        </div>
        <div class="info">
          <a href="<?= base_url() ?>admindash/view_admin_profile/<?= $user['id'] ?>" class="d-block"><?= $user['full_name'] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url() ?>admindash" id="dash" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item" id="property_manage">
            <a href="#" class="nav-link" id="manage_data">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Manajemen Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>properties/add_property" id="manage_data_add_properti" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Properti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>properties/add_images" id="manage_data_add_image" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Gambar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>properties/view_property" id="manage_data_show" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Properti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>properties/view_property_images" id="manage_data_show_image" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Gambar</p>
                </a>
              </li>
            </ul>
          </li>

          <li id="employee_manage" class="nav-item">
            <a href="#" id="manage_employee" class="nav-link">
              <i class="nav-icon far fas fa-user"></i>
              <p>
                Data Karyawan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>employees/add_employee" id="manage_employee_add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>employees/view_data" id="manage_employee_show" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Data</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?= base_url() ?>users" id="user_manage" class="nav-link">
              <i class="nav-icon fas fa-user-edit"></i>
              <p>
                Manajemen User
              </p>
            </a>
          </li>

          <li id="report_manage" class="nav-item">
            <a href="#" id="manage_report" class="nav-link">
              <i class="nav-icon far fas fa-file"></i>
              <p>
                Report Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>reports/properties_report" id="manage_report_properti" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Properti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>reports/employees_report" id="manage_report_employee" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>reports/users_report" id="manage_report_user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
            </ul>
          </li>

          <hr class="sidebar-divider d-none d-md-block">

          <li class="nav-header">AKTIVITAS</li>
          <li class="nav-item">
            <a href="<?= base_url() ?>admindash/view_contacts" id="contact" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Kontak
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>admindash/view_calendar" id="calendar-sidebar" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Kalender
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admindash/view_mailbox') ?>" id="mailbox" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<script>
  switch(window.location.href)
  {
    case "http://localhost/tubes_web2/admindash":
      $('#dash').addClass("active");
      break;
    // Manage Data Properti
    case "http://localhost/tubes_web2/properties/add_property":
      $('#property_manage').addClass("menu-open");
      $('#manage_data').addClass("active");
      $('#manage_data_add_properti').addClass("active");
      break;
    case "http://localhost/tubes_web2/properties/add_images":
      $('#property_manage').addClass("menu-open");
      $('#manage_data').addClass("active");
      $('#manage_data_add_image').addClass("active");
      break;
    case "http://localhost/tubes_web2/properties/view_property":
      $('#property_manage').addClass("menu-open");
      $('#manage_data').addClass("active");
      $('#manage_data_show').addClass("active");
      break;
    case "http://localhost/tubes_web2/properties/view_property_images":
      $('#property_manage').addClass("menu-open");
      $('#manage_data').addClass("active");
      $('#manage_data_show_image').addClass("active");
      break;
    // Manage Data Employee
    case "http://localhost/tubes_web2/employees/add_employee":
      $('#employee_manage').addClass("menu-open");
      $('#manage_employee').addClass("active");
      $('#manage_employee_add').addClass("active");
      break;
    case "http://localhost/tubes_web2/employees/view_data":
      $('#employee_manage').addClass("menu-open");
      $('#manage_employee').addClass("active");
      $('#manage_employee_show').addClass("active");
      break;
    // user manage
    case "http://localhost/tubes_web2/users":
      $('#user_manage').addClass("active");
      break;
    // report manage
    case "http://localhost/tubes_web2/reports/properties_report":
      $('#report_manage').addClass("menu-open");
      $('#manage_report').addClass("active");
      $('#manage_report_properti').addClass("active");
      break;
    case "http://localhost/tubes_web2/reports/employees_report":
      $('#report_manage').addClass("menu-open");
      $('#manage_report').addClass("active");
      $('#manage_report_employee').addClass("active");
      break;
    case "http://localhost/tubes_web2/reports/users_report":
      $('#report_manage').addClass("menu-open");
      $('#manage_report').addClass("active");
      $('#manage_report_user').addClass("active");
      break;
    // activity
    case "http://localhost/tubes_web2/admindash/view_contacts":
      $('#contact').addClass("active");
      break;
    case "http://localhost/tubes_web2/admindash/view_calendar":
      $('#calendar-sidebar').addClass("active");
      break;
    case "http://localhost/tubes_web2/admindash/view_mailbox":
      $('#mailbox').addClass("active");
      break;
  }
</script>