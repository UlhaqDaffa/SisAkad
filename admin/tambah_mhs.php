<?php 
include "../koneksi.php"; 
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
                  <label for="NIM">NIM</label> 
                  <input type="number" class="form-control" name="NIM" id="NIM" placeholder="Nomor NIM" required> 
                </div> 
                <div class="form-group"> 
                  <label for="namaMhs">Nama Mahasiswa</label> 
                  <input type="text" class="form-control" name="namaMhs" id="namaMhs" placeholder="Nama Mahasiswa" required> 
                </div> 
                <div class="form-group"> 
                  <label for="jurusan">Jurusan</label> 
                  <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" required> 
                </div>
                <div class="form-group"> 
                  <label for="reguler">Reguler</label> 
                  <input type="text" class="form-control" name="reguler" id="reguler" placeholder="Reguler" required> 
                </div>
                <div class="form-group"> 
                  <label for="semester">Semester</label> 
                  <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" required> 
                </div>
                <div class="form-group"> 
                  <label for="tglLahir">Tanggal Lahir</label> 
                  <input type="text" class="form-control" name="tglLahir" id="tglLahir" placeholder="Tanggal Lahir" required> 
                </div>
                <div class="form-group"> 
                  <label for="email">Email</label> 
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email" required> 
                </div>
                <div class="form-group"> 
                  <label for="noTlp">No Telp</label> 
                  <input type="text" class="form-control" name="noTlp" id="noTlp" placeholder="No Telp" required> 
                </div>
                <div class="form-group"> 
                  <label for="statusMhs">Status Mahasiswa</label> 
                  <input type="text" class="form-control" name="statusMhs" id="statusMhs" placeholder="Status Mahasiswa" required> 
                </div>
                <div class="form-group"> 
                  <label for="kelas">Kelas</label> 
                  <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" required> 
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
  </section>
</div> 

<!-- JQuery DatePicker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function() {
    $("#tglLahir").datepicker({
      dateFormat: "yy-mm-dd"
    });
  });
</script>

<?php 
include "../template/footer.php"; 
?>
