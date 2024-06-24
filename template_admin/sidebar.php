<!-- Main Sidebar Container --> 
<aside class="main-sidebar sidebar-dark-white elevation-4" style="background-color: #3D8B48;"> 
    <!-- Brand Logo --> 
    <div class="brand-link text-center"  style="background-color: #3D8B48;"> 
        <span class="brand-text font-weight-light"><a >MyUncip </a></span> 
    </div> 
 
    <!-- Sidebar --> 
    <div class="sidebar"> 
        <!-- Sidebar Menu --> 
        <nav class="mt-2"> 
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
                <!-- Add icons to the links using the .nav-icon class 
                with font-awesome or any other icon font library --> 
                <li class="nav-item menu-open"> 
 
                    <!-- <ul class="nav nav-treeview"> --> 
                <li class="nav-item"> 
                    <a href="dashboardMhs.php" class="nav-link <?= $thisPage == "Dashboard" ? "active" : '' ?>"> 
                        <i class="nav-icon fas fa-tachometer-alt"></i> 
                        <p>Dashboard</p> 
                    </a> 
                </li> 
                <!-- </ul> --> 
                </li> 
 
                <li class="nav-item"> 
                    <a href="jadwal.php" class="nav-link <?= $thisPage == "jadwal" ? "active" : '' ?> "> 
                        <i class="nav-icon fa fa-address-card"></i> 
                        <p> 
                            Jadwal Perkuliahan
                        </p> 
                    </a> 
                </li> 

                <li class="nav-item"> 
                    <a href="mhs.php" class="nav-link  <?= $thisPage == "mahasiswa" ? "active" : '' ?> "> 
                        <i class="nav-icon fa fa-address-card"></i> 
                        <p> 
                            Data Mahasiswa
                        </p> 
                    </a> 
                </li> 

                <li class="nav-item"> 
                    <a href="nilai.php" class="nav-link  <?= $thisPage == "nilai" ? "active" : '' ?> "> 
                        <i class="nav-icon fas fa-table"></i> 
                        <p> 
                            Rangkuman Nilai
                        </p> 
                    </a> 
                </li> 
            </ul> 
        </nav> 
        <!-- /.sidebar-menu --> 
    </div> 
    <!-- /.sidebar --> 
</aside>