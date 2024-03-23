  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('backend/home') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bus"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Anadolu EXPRESS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>backend/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Panel </span></a>
          <a class="nav-link" href="<?= base_url() ?>backend/bus">
            <i class="fas fa fa-bus"></i>
            <span>Otobüs Yönetimi</span></a>
            <a class="nav-link" href="<?= base_url() ?>backend/rute">
              <i class="fas fa fa-compass"></i>
              <span>Otogar Yönetimi</span></a>
              <a class="nav-link" href="<?= base_url() ?>backend/jadwal">
                <i class="fas fa fa-clipboard-list"></i>
                <span>Seferleri Yönet</span></a>
        <a class="nav-link" href="<?= base_url() ?>backend/order">
          <i class="fas fa-bookmark"></i>
          <span>Rezervasyonları Listele</span></a>
        <a class="nav-link" href="<?= base_url() ?>backend/tiket">
          <i class="fas fa-ticket-alt"></i>
          <span>Biletler</span></a>
        <a class="nav-link" href="<?= base_url() ?>backend/konfirmasi">
          <i class="fa fa-dollar-sign"></i>
          <span>Ödeme Listesi</span></a>
        <?php if ($this->session->userdata('level') == '1') { ?>
           <a class="nav-link" href="<?= base_url() ?>backend/bank">
          <i class="fas fa fa-piggy-bank"></i>
          <span>Banka Listesi</span></a>
        <a class="nav-link" href="<?= base_url() ?>backend/laporan">
          <i class="fa fa fa-file"></i>
          <span>Şikayet Et</span></a>
             <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-users"></i>
              <span>Kullanıcı Yönetimi</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('backend/pelanggan') ?>">Müşteri Listesi</a>
                <a class="collapse-item" href="<?= base_url() ?>backend/admin">Yönetici</a>
              </div>
            </div>
          </li>
        <?php }else{ } ?>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?= base_url('backend/order/vieworder') ?>" method="GET">
            <div class="input-group">
              <input type="text" name="order" class="form-control bg-light border-0 small" placeholder="Arama" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-info" >
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

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

            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama_admin'); ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url($this->session->userdata('img_admin')) ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-info-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  Hakkında
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıkış
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
