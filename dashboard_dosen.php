<?php 
 
include "koneksi.php"; 
 
$thisPage = "Dashboard"; 
 
include "template_admin/header.php"; 
include "template_admin/sidebar.php"; 
include "template_admin/topbar.php"; 
 
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
                     Selamat Datang Di Halaman Website Akademik Universitas Negeri Ciputat
                </p> 
              </div> 
            </div> 
 
            
          </div> 
        </div> 
        <!-- /.row --> 
      </div><!-- /.container-fluid --> 
    </div>
    <?php 
    include "template_admin/footer.php"; 
    ?> 