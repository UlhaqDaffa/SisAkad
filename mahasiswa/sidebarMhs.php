<?php
include "../template/header.php"; 
?>

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
                        <i class="nav-icon fa fa-calendar"></i> 
                        <p> 
                            Jadwal Perkuliahan
                        </p> 
                    </a> 
                </li> 

                <li class="nav-item"> 
                    <a href="profilMhs.php" class="nav-link  <?= $thisPage == "profil" ? "active" : '' ?> "> 
                        <i class="nav-icon fa fa-address-card"></i> 
                        <p> 
                            Profil
                        </p> 
                    </a> 
                </li> 

                <li class="nav-item"> 
                    <a href="nilaiMhs.php" class="nav-link  <?= $thisPage == "nilai" ? "active" : '' ?> "> 
                        <i class="nav-icon fas fa-table"></i> 
                        <p> 
                            Rangkuman Nilai
                        </p> 
                    </a> 
                </li>
                
                <li class="nav-item"> 
                    <a href="logout.php" class="nav-link" onclick="return confirm('Apakah Anda yakin ingin keluar?')"> 
                        <i class="nav-icon fa fa-outdent"></i> 
                        <p> 
                            Logout
                        </p> 
                    </a> 
                </li> 
            </ul> 
        </nav> 
        <!-- /.sidebar-menu --> 
    </div> 
    <!-- /.sidebar --> 
</aside>

<!-- Script untuk menampilkan alert saat logout -->
<script>
    $(document).ready(function() {
        // Menggunakan event click pada link Logout
        $('a[href="logout.php"]').click(function() {
            // Menampilkan alert konfirmasi menggunakan Bootstrap
            return confirm('Apakah Anda yakin ingin keluar?');
        });
    });
</script>
