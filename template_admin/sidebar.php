<!-- Main Sidebar Container --> 
<aside class="main-sidebar sidebar-dark-white elevation-4" style="background-color: 
#3D8B48;"> 
    <!-- Brand Logo --> 
    <div class="brand-link text-center"  style="background-color: #3D8B48;"> 
        <span class="brand-text font-weight-light"><a >Akademik </a></span> 
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
                    <a href="Dashboard.php" class="nav-link <?= $thisPage == "Dashboard" ? "active" : '' ?>"> 
                        <i class="nav-icon fas fa-tachometer-alt"></i> 
                        <p>Dashboard</p> 
                    </a> 
                </li> 
                <!-- </ul> --> 
                </li> 
 
                <li class="nav-item"> 
                    <a href="jadwal.php" class="nav-link nav-link  <?= $thisPage == "Siswa" ? "active" : '' ?> "> 
                        <i class="nav-icon fa fa-address-card"></i> 
                        <p> 
                            Jadwal Perkuliahan
                        </p> 
                    </a> 
                </li> 

                <li class="nav-item"> 
                    <a href="jadwal.php" class="nav-link nav-link  <?= $thisPage == "Siswa" ? "active" : '' ?> "> 
                        <i class="nav-icon fa fa-address-card"></i> 
                        <p> 
                            Jadwal Perkuliahan
                        </p> 
                    </a> 
                </li> 
                <li class="nav-item"> 
                    <a href="khs.php" class="nav-link nav-link  <?= $thisPage == "Menu" ? "active" : '' ?> "> 
                        <i class="nav-icon fas fa-table"></i> 
                        <p> 
                            Data Nilai KHS
                        </p> 
                    </a> 
                </li> 
                </ul> 
        </nav> 
        <!-- /.sidebar-menu --> 
    </div> 
    <!-- /.sidebar --> 
</aside>