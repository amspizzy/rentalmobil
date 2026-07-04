<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-tools"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SEWELAS<sup>APP</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= ($this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Data Induk</div>

    <li class="nav-item <?= ($this->uri->segment(1) == 'MasterHpp') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('MasterHpp'); ?>">
            <i class="fas fa-fw fa-coins"></i>
            <span>Daftar Harga HPP</span>
        </a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(1) == 'Inventory') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('Inventory'); ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Stok Gudang</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Operasional</div>

    <li class="nav-item <?= ($this->uri->segment(1) == 'Orders' && $this->uri->segment(2) == '') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('Orders'); ?>">
            <i class="fas fa-fw fa-plus-circle"></i>
            <span>Input Pesanan</span>
        </a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(1) == 'Orders' && $this->uri->segment(2) == 'list') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('Orders/list'); ?>">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Production Monitoring</span>
        </a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(1) == 'Orders' && $this->uri->segment(2) == 'history') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('Orders/history'); ?>">
            <i class="fas fa-fw fa-history"></i> <span>Riwayat Selesai</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Laporan</div>

    <li class="nav-item <?= ($this->uri->segment(1) == 'Laporan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Laporan'); ?>">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Laporan Profit</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/logout'); ?>" onclick="return confirm('Apakah Anda yakin ingin logout?');">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">