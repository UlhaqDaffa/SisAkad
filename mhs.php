<?php 
 
include "koneksi.php"; 
 
$thisPage = "Siswa"; 
 
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
                        <th>Opsi</th> 
                    </tr> 
                    </thead> 
                    <tbody> 
                    <?php 
                        $no = 1; 
                        $sql = "select * from mhs "; 
                        $hasil = mysqli_query($con, $sql); 
                        while($d = mysqli_fetch_array($hasil)){ 
                            ?> 
                            <tr> 
                                <td width="10px"><?php echo $no++; ?></td> 
                                <td><?php echo $d['NIM']; ?></td> 
                                <td><?php echo $d['Nama_Mhs']; ?></td> 
                                <td width="200px"> 
                                <a class="btn btn-primary" href="edit_mhs.php?id=<?php echo $d['id']; ?>">Edit</a> 
                                    <a class="btn btn-danger" href="hapus_siswa.php?id=<?php echo $d['id']; ?>">Hapus</a> 
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
    include "template_admin/footer.php"; 
    ?>