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
                 $data = mysqli_query($con, "select * from mhs where id='$id'"); 
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
                    <input type="text" class="form-control" name="Nama_Mhs" id="Nama_Mhs" value="<?php echo $d['Nama_Mhs']; ?>"  required> 
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