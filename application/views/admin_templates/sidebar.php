<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('c_admin/dashboard_petugas') ?>">
        <div class="sidebar-brand-icon">
          KSM SUKA JERNIH
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard_petugas' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('c_admin/dashboard_petugas') ?>">
          <i class="fas fa-fw fa-desktop"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'data_pemakaian' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('c_admin/data_pemakaian') ?>">
          <i class="fas fa-fw fa-tint"></i>
          <span>Data Pemakaian Air</span></a>
      </li>

      <li class="nav-item <?php echo $this->uri->segment(2) == 'data_pelanggan' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('c_admin/data_pelanggan') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pelanggan</span></a>
      </li>      

      <li class="nav-item <?php echo $this->uri->segment(2) == 'data_tagihan' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('c_admin/data_tagihan') ?>">
          <i class="fas fa-fw fa-credit-card"></i>
          <span>Data Tagihan</span></a>
      </li>

      <li class="nav-item <?php echo $this->uri->segment(2) == 'laporan_pembayaran' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('c_admin/laporan_pembayaran') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Laporan Pembayaran</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
 
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <ul class="na navbar-nav navbar-right">
              <span>Selamat Datang, <?php echo $this->session->userdata('nama_petugas');?></span>
            </ul>
            <div class="topbar-divider d-none d-sm-block"></div>
            <ul class="na navbar-nav navbar-right">
              <a class="nav-link" onClick="logoutConfirm('<?php echo base_url('login_petugas/logout');?>')" href="#">
              <i class="fas fa-power-off"></i>
              <span>&nbsp Logout</span>
            </a>
            </ul>
          </ul>
        </nav>
        <!-- End of Topbar -->
<?php $this->load->view('/partials/modal'); ?>
<script>
	function logoutConfirm(url){
		$('#btn-logout').attr('href', url);
		$('#logoutModal').modal();
	}
</script>