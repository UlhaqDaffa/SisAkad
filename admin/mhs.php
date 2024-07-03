<?php 
 
include "../koneksi.php"; 

// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}
 
$thisPage = "mahasiswa"; 
 
include "../template/header.php"; 
include "sidebarAdmin.php"; 
include "topbar.php"; 
 
?> 
<!-- Content Wrapper. Contains page content --> 
<div class="content-wrapper"> 
  <!-- Content Header (Page header) --> 
  <section class="content-header">
  <div class="container-fluid"> 
      <div class="row"> 
        <div class="col-sm-6"> 
          
        </div> 
      </div> 
    </div><!-- /.container-fluid --> 
  </section> 
 
  <section class="content"> 
    <div class="container-fluid"> 
        <div class="row"> 
          <div class="col-12"> 
            <div class="card"> 
              <div class="card-header"> 
                <h3 class="card-title">Data Mahasiswa </h3> 
                <div class="float-sm-right"> 
                        <a class="btn btn-primary" href="tambah_mhs.php">Tambah Data</a> 
                        <a class="btn btn-info" href="cetak_mhs.php">Cetak</a> 
                </div> 
              </div> 
 
              <!-- /.card-header --> 
              <div class="card-body"> 
                <table id="example1" class="table table-bordered table-hover"> 
                    <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>NIM</th> 
                        <th>Nama Mahasiswa</th> 
                        <th>Jurusan</th> 
                        <th>Reguler</th> 
                        <th>Semester</th> 
                        <th>Tanggal Lahir</th> 
                        <th>Email</th> 
                        <th>No Telp</th> 
                        <th>Status</th> 
                        <th>Kelas</th> 
                        <th>Opsi</th>
                    </tr> 
                    </thead> 
                    <tbody> 
                    <?php 
                        $no = 1; 
                        $sql = "select * from datamhs "; 
                        $hasil = mysqli_query($con, $sql); 
                        while($d = mysqli_fetch_array($hasil)){ 
                            ?> 
                            <tr> 
                                <td width="10px"><?php echo $no++; ?></td> 
                                <td><?php echo $d['NIM']; ?></td> 
                                <td><?php echo $d['namaMhs']; ?></td> 
                                <td><?php echo $d['jurusan']; ?></td> 
                                <td><?php echo $d['reguler']; ?></td> 
                                <td><?php echo $d['semester']; ?></td> 
                                <td><?php echo $d['tglLahir']; ?></td> 
                                <td><?php echo $d['email']; ?></td> 
                                <td><?php echo $d['noTlp']; ?></td> 
                                <td><?php echo $d['statusMhs']; ?></td> 
                                <td><?php echo $d['kelas']; ?></td> 
                                <td width="200px"> 
                                  <a class="btn btn-primary" href="edit_mhs.php?id=<?php echo $d['id']; ?>">Edit</a> 
                                  <a class="btn btn-danger btn-delete" href="hapus_mhs.php?id=<?php echo $d['id']; ?>">Hapus</a> 
                                </td> 
                            </tr> 
                    <?php 
                        } 
                    ?> 
                </table> 
              </div> 
              <!-- /.card-body --> 
            </div> 
            <!-- /.card --> 
 
             
            <!-- /.card --> 
          </div> 
          <!-- /.col --> 
        </div> 
        <!-- /.row --> 
      </div> 
 
    <?php 
    include "../template/footer.php"; 
    ?> 

<script>
document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.querySelectorAll('.btn-delete');
    
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });
});
</script>
