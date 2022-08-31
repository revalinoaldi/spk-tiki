<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/admin" class="brand-link">
                <img src="/lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SPK TIKI</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
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
                                <a href="/admin" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/karyawan" class="nav-link">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>
                                        Data Karyawan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/#" class="nav-link">
                                    <i class="nav-icon fa fa-file-alt"></i>
                                    <p>
                                        Laporan Penilaian
                                    </p>
                                </a>
                            </li>
                            @direktur
                              <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-user-tie"></i>
                                  <p>
                                    Menu Direktur
                                    <i class="fas fa-angle-left right"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <a href="/admin/user" class="nav-link">
                                        <i class="nav-icon fa fa-user"></i>
                                      <p>User</p>
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="/admin/jabatan" class="nav-link">
                                        <i class="nav-icon fa fa-briefcase"></i>
                                      <p>Jabatan</p>
                                    </a>
                                  </li>
                                </ul>
                              </li>             
                            @enddirektur
                            @manager
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon fa fa-user-tie"></i>
                                <p>
                                  Menu Manager
                                  <i class="fas fa-angle-left right"></i>
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="/admin/kriteria-nilai" class="nav-link">
                                      <i class="nav-icon fa fa-clipboard"></i>
                                    <p>Kriteria Penilaian</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="/admin/bobot-nilai" class="nav-link">
                                      <i class="nav-icon fa fa-balance-scale"></i>
                                    <p>Bobot Penilaian</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/penilaian" class="nav-link">
                                        <i class="nav-icon fa fa-star-half-alt"></i>
                                      <p>Penilaian</p>
                                    </a>
                                  </li>
                              </ul>
                            </li>
                            @endmanager
                            <li class="nav-item">
                                <form action="/logout" method="POST" id="formLogout">
                                    @csrf
                                    <a href="javascript:;" onclick="document.getElementById('formLogout').submit();" class="nav-link form-logout">
                                        <i class="nav-icon fa fa-sign-out-alt"></i>
                                        <p>
                                            Logout
                                        </p>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
