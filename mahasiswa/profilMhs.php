<?php
session_start();
include "../koneksi.php";

$thisPage = "profil";

// Pastikan mahasiswa telah login
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'mahasiswa') {
    header("Location: login.php");
    exit();
}

// Ambil data mahasiswa dari session
$idMahasiswa = $_SESSION['idMahasiswa'];

// Query untuk mengambil data mahasiswa berdasarkan ID
$query_mahasiswa = "SELECT * FROM datamhs WHERE id = '$idMahasiswa'";
$result_mahasiswa = mysqli_query($con, $query_mahasiswa);

if ($result_mahasiswa && mysqli_num_rows($result_mahasiswa) == 1) {
    $data_mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
} else {
    echo "Data mahasiswa tidak ditemukan!";
    exit();
}

// Query untuk mengambil nilai mahasiswa dari tabel nilai
$query_nilai = "SELECT m.kodeMK, m.namaMK, n.nilaiHuruf, n.nilaiAngka, m.jumlahSks
          FROM nilai n
          INNER JOIN matakuliah m ON n.idMatakuliah = m.id
          WHERE n.idMahasiswa = '$idMahasiswa'";
$result_nilai = mysqli_query($con, $query_nilai);

// Menghitung IPK berdasarkan nilai yang didapatkan
$total_sks = 0;
$total_nilai = 0;

while ($row_nilai = mysqli_fetch_assoc($result_nilai)) {
    $total_nilai += ($row_nilai['nilaiAngka'] * $row_nilai['jumlahSks']);
    $total_sks += $row_nilai['jumlahSks'];
}

// Menghitung IPK
if ($total_sks > 0) {
    $ipk = number_format($total_nilai / $total_sks, 2);
} else {
    $ipk = 0.00;
}

include "../template/header.php"; // Header template
include "sidebarMhs.php"; // Sidebar template
include "topbar.php"; // Topbar template
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil Mahasiswa</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Biodata</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" value="<?php echo $data_mahasiswa['NIM']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="namaMhs" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namaMhs" value="<?php echo $data_mahasiswa['namaMhs']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jurusan" value="<?php echo $data_mahasiswa['jurusan']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="reguler" class="col-sm-2 col-form-label">Reguler</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="reguler" value="<?php echo $data_mahasiswa['reguler']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="semester" value="<?php echo $data_mahasiswa['semester']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tglLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tglLahir" value="<?php echo $data_mahasiswa['tglLahir']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="<?php echo $data_mahasiswa['email']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="noTlp" class="col-sm-2 col-form-label">No. Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="noTlp" value="<?php echo $data_mahasiswa['noTlp']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="statusMhs" class="col-sm-2 col-form-label">Status Mahasiswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="statusMhs" value="<?php echo $data_mahasiswa['statusMhs']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kelas" value="<?php echo $data_mahasiswa['kelas']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="IPK" class="col-sm-2 col-form-label">IPK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="IPK" value="<?php echo $ipk; ?>" readonly>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
include "../template/footer.php"; // Footer template
?>
