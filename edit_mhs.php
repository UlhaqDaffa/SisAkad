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
                 <h3 class="card-title">Edit Data Mahasiswa</h3> 
               </div> 
               <?php 
                 $id = $_GET['id']; 
                 $data = mysqli_query($con, "select * from datamhs where id='$id'"); 
                 while($d = mysqli_fetch_array($data)){ 
                 ?> 
                
               <!-- /.card-header --> 
               <!-- form start --> 
               <form method="post" action="edit_aksi_mhs.php"> 
                 <div class="card-body"> 
                   <div class="form-group"> 
                     <label for="exampleInputEmail1">NIM</label>
                     <input type="hidden" class="form-control" name="id" id="id"value="<?php echo $d['id']; ?>"> 
                    <input type="number" class="form-control" name="NIM" id="NIM" value="<?php echo $d['NIM']; ?>"  required>  
                  </div> 
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Nama Mahasiswa</label> 
                    <input type="text" class="form-control" name="namaMhs" id="namaMhs" value="<?php echo $d['namaMhs']; ?>"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Jurusan</label> 
                    <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?php echo $d['jurusan']; ?>"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Reguler</label> 
                    <input type="text" class="form-control" name="reguler" id="reguler" value="<?php echo $d['reguler']; ?>"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Semester</label> 
                    <input type="text" class="form-control" name="semester" id="semester" value="<?php echo $d['semester']; ?>"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Tanggal Lahir</label> 
                    <input type="text" class="form-control" name="tglLahir" id="tglLahir" value="<?php echo $d['tglLahir']; ?>"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Email</label> 
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $d['email']; ?>"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">No Telp</label> 
                    <input type="text" class="form-control" name="noTlp" id="noTlp" value="<?php echo $d['noTlp']; ?>"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Status Mahasiswa</label> 
                    <input type="text" class="form-control" name="statusMhs" id="statusMhs" value="<?php echo $d['statusMhs']; ?>"  required> 
                  </div>
                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Kelas</label> 
                    <input type="text" class="form-control" name="kelas" id="kelas" value="<?php echo $d['kelas']; ?>"  required> 
                  </div>
                </div> 
                <div class="card-footer"> 
                  <button type="submit" class="btn btn-primary">Submit</button> 
                </div> 
              </form> 
              <?php 
            } 
          ?> 
            </div> 
 
          </div> 
        </div> 
      </div> 
   
<?php 
  include "template_admin/footer.php"; 
?>