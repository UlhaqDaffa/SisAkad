<?php 
 
include "koneksi.php"; 
 
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
          <h3>Data Mahasiswa</h3> 
        </div> 
      </div> 
    </div><!-- /.container-fluid --> 
  </section> 
 
  <section class="content"> 
    <div class="container-fluid"> 
        <div class="row"> 
          <!-- left column --> 
          <div class="col-md-6"> 
            <!-- general form elements --> 
            <div class="card card-primary"> 
              <div class="card-header"> 
                <h3 class="card-title">Tambah Data Mahasiswa</h3> 
              </div> 
               
              <!-- /.card-header --> 
              <!-- form start --> 
              <form method="post" action="tambah_aksi_mhs.php"> 
                <div class="card-body"> 
                  <div class="form-group"> 
                    <label for="exampleInputEmail1">NIM</label> 
                    <input type="number" class="form-control" name="NIM" id="NIM" placeholder="Nomor NIM"  required> 
                  </div> 
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Nama Mahasiswa</label> 
                    <input type="text" class="form-control" name="Nama_Mhs" id="Nama_Mhs" placeholder="Nama Mahasiswa"  required> 
                  </div> 
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Jurusan</label> 
                    <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Reguler</label> 
                    <input type="text" class="form-control" name="reguler" id="reguler" placeholder="Reguler"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Semester</label> 
                    <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Tanggal Lahir</label> 
                    <input type="text" class="form-control" name="tglLahir" id="tglLahir" placeholder="Tanggal Lahir"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Email</label> 
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">No Telp</label> 
                    <input type="text" class="form-control" name="noTlp" id="noTlp" placeholder="No Telp"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Status Mahasiswa</label> 
                    <input type="text" class="form-control" name="statusMhs" id="statusMhs" placeholder="Status Mahasiswa"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Kelas</label> 
                    <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas"  required> 
                  </div>
                </div> 
                <div class="card-footer"> 
                  <button type="submit" class="btn btn-primary">Submit</button> 
                </div> 
              </form> 
            </div> 
 
          </div> 
        </div> 
      </div> 
   
<?php 
  include "template_admin/footer.php"; 
?> 