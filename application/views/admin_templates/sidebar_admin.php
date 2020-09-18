<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('c_admin/dashboard_admin') ?>">
        <div class="sidebar-brand-icon">
          KSM SUKA JERNIH
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard_admin' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('c_admin/dashboard_admin') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Petugas</span></a>
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
            <ul class="na navbar-nav navbar-right">
              <a class="nav-link" onClick="logoutConfirm('<?php echo base_url('login_admin/logout');?>')" href="#">
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