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
          <h3>Input Nilai Mahasiswa</h3> 
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
              <h3 class="card-title">Input Nilai</h3> 
            </div> 
             
            <!-- /.card-header --> 
            <!-- form start --> 
            <form method="post" action="simpan_nilai.php"> 
              <div class="card-body"> 
                <div class="form-group"> 
                  <label for="mahasiswa">Pilih Mahasiswa</label> 
                  <select class="form-control" name="mahasiswa" id="mahasiswa" required>
                    <option value="">--Pilih Mahasiswa--</option>
                    <?php
                      $query = "SELECT id, NIM, namaMhs FROM datamhs ORDER BY namaMhs";
                      $result = mysqli_query($con, $query);
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='{$row['id']}'>{$row['NIM']} - {$row['namaMhs']}</option>";
                      }
                    ?>
                  </select>
                </div> 
                <div class="form-group"> 
                  <label for="matakuliah">Pilih Mata Kuliah</label> 
                  <select class="form-control" name="matakuliah" id="matakuliah" required>
                    <option value="">--Pilih Mata Kuliah--</option>
                    <?php
                      $query = "SELECT id, kodeMK, namaMK FROM matakuliah ORDER BY namaMK";
                      $result = mysqli_query($con, $query);
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='{$row['id']}'>{$row['kodeMK']} - {$row['namaMK']}</option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group"> 
                  <label for="nilaiHuruf">Nilai Huruf</label> 
                  <input type="text" class="form-control" name="nilaiHuruf" id="nilaiHuruf" placeholder="Nilai Huruf (A, B, C, D, E)" required> 
                </div>
                <div class="form-group"> 
                  <label for="nilaiAngka">Nilai Angka</label> 
                  <input type="decimal" class="form-control" name="nilaiAngka" id="nilaiAngka" placeholder="Nilai Angka (0-5)" required> 
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

<?php 
include "../template/footer.php"; 
?>

