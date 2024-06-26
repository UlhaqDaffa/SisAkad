<?php
include "../koneksi.php";

// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

$thisPage = "jadwal";

include "../template/header.php";
include "sidebarAdmin.php";
include "topbar.php";

// Fungsi untuk mendapatkan daftar dosen
function getDosenOptions($con, $selected_id = null) {
    $options = '';
    $query = "SELECT * FROM dosen";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row['id'] == $selected_id) ? 'selected' : '';
        $options .= "<option value='{$row['id']}' $selected>{$row['namaDosen']}</option>";
    }
    return $options;
}

// Fungsi untuk mendapatkan daftar matakuliah
function getMatakuliahOptions($con, $selected_id = null) {
    $options = '';
    $query = "SELECT * FROM matakuliah";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row['id'] == $selected_id) ? 'selected' : '';
        $options .= "<option value='{$row['id']}' $selected>{$row['namaMK']} ({$row['kodeMK']})</option>";
    }
    return $options;
}

// Handling Edit and Update Logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_jadwal = $_POST['id_jadwal'];
    $idMatakuliah = $_POST['idMatakuliah'];
    $idDosen = $_POST['idDosen'];
    $hari = $_POST['hari'];
    $jamMulai = $_POST['jamMulai'];
    $jamSelesai = $_POST['jamSelesai'];
    $ruang = $_POST['ruang'];

    $query_update = "UPDATE jadwal SET idMatakuliah = '$idMatakuliah', idDosen = '$idDosen', hari = '$hari', jamMulai = '$jamMulai', jamSelesai = '$jamSelesai', ruang = '$ruang' WHERE id = $id_jadwal";
    $result_update = mysqli_query($con, $query_update);

    if ($result_update) {
        // Redirect or show success message
        header("Location: jadwal.php");
        exit();
    } else {
        echo "Failed to update data.";
    }
}

// Query untuk mengambil data jadwal matakuliah
$query_jadwal = "SELECT j.id, m.id AS idMatakuliah, m.kodeMK, m.namaMK AS namaMatakuliah, d.id AS idDosen, d.namaDosen, j.hari, j.jamMulai, j.jamSelesai, j.ruang
                 FROM jadwal j
                 JOIN matakuliah m ON j.idMatakuliah = m.id
                 JOIN dosen d ON j.idDosen = d.id";
$result_jadwal = mysqli_query($con, $query_jadwal);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Jadwal Matakuliah</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Kode Matakuliah</th>
                      <th>Matakuliah</th>
                      <th>Dosen Pengampu</th>
                      <th>Hari</th>
                      <th>Jam Mulai</th>
                      <th>Jam Selesai</th>
                      <th>Ruang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_jadwal)) {
                      echo "<tr>";
                      echo "<td>" . $row['kodeMK'] . "</td>";
                      echo "<td>" . $row['namaMatakuliah'] . "</td>";
                      echo "<td>" . $row['namaDosen'] . "</td>";
                      echo "<td>" . $row['hari'] . "</td>";
                      echo "<td>" . $row['jamMulai'] . "</td>";
                      echo "<td>" . $row['jamSelesai'] . "</td>";
                      echo "<td>" . $row['ruang'] . "</td>";
                      echo "<td><a href='#' data-toggle='modal' data-target='#editModal{$row['id']}' class='btn btn-sm btn-primary'>Edit</a></td>";
                      echo "</tr>";

                      // Modal untuk Edit Jadwal
                      echo "<div class='modal fade' id='editModal{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>";
                      echo "<div class='modal-dialog' role='document'>";
                      echo "<div class='modal-content'>";
                      echo "<div class='modal-header'>";
                      echo "<h5 class='modal-title' id='editModalLabel'>Edit Jadwal</h5>";
                      echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                      echo "<span aria-hidden='true'>&times;</span>";
                      echo "</button>";
                      echo "</div>";
                      echo "<form action='jadwal.php' method='POST'>";
                      echo "<div class='modal-body'>";
                      echo "<input type='hidden' name='id_jadwal' value='{$row['id']}'>";
                      echo "<div class='form-group'>";
                      echo "<label>Matakuliah</label>";
                      echo "<select class='form-control' name='idMatakuliah'>";
                      echo getMatakuliahOptions($con, $row['idMatakuliah']);
                      echo "</select>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label>Dosen Pengampu</label>";
                      echo "<select class='form-control' name='idDosen'>";
                      echo getDosenOptions($con, $row['idDosen']);
                      echo "</select>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label>Hari</label>";
                      echo "<input type='text' class='form-control' name='hari' value='{$row['hari']}'>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label>Jam Mulai</label>";
                      echo "<input type='text' class='form-control' name='jamMulai' value='{$row['jamMulai']}'>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label>Jam Selesai</label>";
                      echo "<input type='text' class='form-control' name='jamSelesai' value='{$row['jamSelesai']}'>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label>Ruang</label>";
                      echo "<input type='text' class='form-control' name='ruang' value='{$row['ruang']}'>";
                      echo "</div>";
                      echo "</div>";
                      echo "<div class='modal-footer'>";
                      echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>";
                      echo "<button type='submit' class='btn btn-primary'>Simpan Perubahan</button>";
                      echo "</div>";
                      echo "</form>";
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include "../template/footer.php";
?>
