<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center my-1">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink text-light"></i>
  </div>
  <div class="sidebar-brand-text text-light mx-2"><i>Aplikasi Ajuan Kerja Lembur</i></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= site_url('member'); ?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Beranda</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Pegawai
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="<?php echo site_url('member/pegawai'); ?>">
    <i class="fas fa-fw fa-users"></i>
    <span>Data Pegawai</span>
  </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Ajuan Lembur
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo site_url('member/form'); ?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Daftar Ajuan Lembur</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link tombol-logout" href="<?php echo site_url('authentication/auth/logout'); ?>">
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->