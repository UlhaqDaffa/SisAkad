<?php 
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}
include "../koneksi.php"; 

$thisPage = "Dashboard"; 

include "sidebarAdmin.php"; 
include "../template/header.php"; 
include "topbar.php"; 

// Query untuk menghitung jumlah dosen
$query_dosen = "SELECT COUNT(*) as total_dosen FROM dosen";
$result_dosen = mysqli_query($con, $query_dosen);
$row_dosen = mysqli_fetch_assoc($result_dosen);
$total_dosen = $row_dosen['total_dosen'];

// Query untuk menghitung jumlah mahasiswa
$query_mahasiswa = "SELECT COUNT(*) as total_mahasiswa FROM datamhs";
$result_mahasiswa = mysqli_query($con, $query_mahasiswa);
$row_mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
$total_mahasiswa = $row_mahasiswa['total_mahasiswa'];
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
                    Dashboard admin Universitas Ciputat
                </p> 
              </div> 
            </div> 
          </div> 
        </div> 
        <!-- /.row --> 

        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jumlah Dosen</h3>
              </div>
              <div class="card-body">
                <h3 class="text-center"><?php echo $total_dosen; ?></h3>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jumlah Mahasiswa</h3>
              </div>
              <div class="card-body">
                <h3 class="text-center"><?php echo $total_mahasiswa; ?></h3>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row --> 
      </div><!-- /.container-fluid --> 
    </section>
</div>

<?php 
include "../template/footer.php"; 
?> 
