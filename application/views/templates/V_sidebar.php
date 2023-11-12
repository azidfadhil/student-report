<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Laporan MT</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false) { echo 'active'; } ?>">
    <a class="nav-link" href="<?= base_url('dashboard') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">Data</div>
  <?php if ($_SESSION['role'] == 'admin') : ?>
  <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'user') !== false) { echo 'active'; } ?>">
    <a class="nav-link" href="<?= base_url('data-user') ?>">
      <i class="fas fa-fw fa-user"></i>
      <span>User</span>
    </a>
  </li>
  <?php endif; ?>
  <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'presensi') !== false) { echo 'active'; } ?>">
    <a class="nav-link" href="<?= base_url('data-presensi') ?>">
      <i class="fas fa-file-excel"></i>
      <span>Presensi</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Lainnya
  </div>
  <hr class="sidebar-divider d-none d-md-block">
</ul>