<?php 
 
include "../koneksi.php"; 
 
$thisPage = "Dashboard"; 
 
include "sidebarAdmin.php"; 
include "../template/header.php"; 
include "topbar.php"; 
 
?> 
<!-- Content Wrapper. Contains page content --> 
<div class="content-wrapper"> 
  <!-- Content Header (Page header) --> 
  <section class="content-header"> 
    <div class="container-fluid"> 
      <div class="row"> 
        <div class="col-sm-6"> 
          <h3>Dashboard</h3> 
        </div> 
      </div> 
    </div><!-- /.container-fluid --> 
  </section> 
 
  <section class="content"> 
      <div class="container-fluid"> 
        <div class="row"> 
          <div class="col"> 
            <div class="card"> 
              <div class="card-body"> 
                <h5 class="card-title">Selamat Datang</h5> 
 
                <p class="card-text"> 
                    Dashboard admin 
                </p> 
              </div> 
            </div> 
 
            
          </div> 
        </div> 
        <!-- /.row --> 
      </div><!-- /.container-fluid --> 
    </div>
    <?php 
    include "../template/footer.php"; 
    ?> 