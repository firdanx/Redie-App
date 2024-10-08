    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('dashboard');?>">
                <div class="sidebar-brand-icon my-4">
                    <img class="img-thumbnail bg-transparent border-0" src="<?=base_url('assets/img/RedieApp.png');?>" alt="">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class = "<?=($title == 'Dashboard')?'nav-item active':'nav-item'?>">
                <a class="nav-link" href="<?=base_url('dashboard');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Pasien
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapspendaftaran"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Pendaftaran</span>
                </a>
                <div id="collapspendaftaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Pendaftaran:</h6>
                        <a class="collapse-item" href="buttons.html">Antrian</a>
                        <a class="collapse-item" href="cards.html">Data Pendaftaran</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class = "<?=($title == 'Data Pasien Baru' || $title == 'Data Pasien Lama')?'nav-item active':'nav-item'?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapspasien"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Pasien</span>
                </a>
                <div id="collapspasien" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Pasien:</h6>
                        <a class="collapse-item <?=($title == 'Data Pasien Baru')?'active':''?>" href="<?=base_url('pasien/pasien_baru');?>">Data Pasien Baru</a>
                        <a class="collapse-item <?=($title == 'Data Pasien Lama')?'active':''?>" href="<?=base_url('pasien/pasien_lama');?>">Data Pasien Lama</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
               Dokter & Poliklinik
            </div>
            <li class = "<?=($title == 'Data Dokter')?'nav-item active':'nav-item'?>">
                <a class="nav-link" href="<?=base_url('dokter')?>">
                    <i class="fas fa-fw fa-user-md"></i>
                    <span>Data Dokter</span></a>
            </li>
            <li class = "<?=($title == 'Data Poliklinik')?'nav-item active':'nav-item'?>">
            <!-- <li class="nav-item"> -->
                <a class="nav-link" href="<?=base_url('poliklinik')?>">
                    <i class="fas fa-fw fa-clinic-medical"></i>
                    <span>Data Poliklinik</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Laporan
            </div>
            <li class = "<?=($title == 'Kunjungan')?'nav-item active':'nav-item'?>">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-wheelchair"></i>
                    <span>Kunjungan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
