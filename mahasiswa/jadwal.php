<?php
include "../koneksi.php";

$thisPage = "jadwal";

include "../template/header.php";
include "sidebarMhs.php";
include "topbar.php";

// Query untuk mengambil data jadwal matakuliah
$query = "SELECT m.kodeMK, m.namaMK AS namaMatakuliah, d.namaDosen AS namaDosen, j.hari, j.jamMulai, j.jamSelesai, j.ruang
          FROM jadwal j
          JOIN matakuliah m ON j.idMatakuliah = m.id
          JOIN dosen d ON j.idDosen = d.id";
$result = mysqli_query($con, $query);

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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['kodeMK'] . "</td>"; // Menampilkan kodeMK
                    echo "<td>" . $row['namaMatakuliah'] . "</td>";
                    echo "<td>" . $row['namaDosen'] . "</td>";
                    echo "<td>" . $row['hari'] . "</td>";
                    echo "<td>" . $row['jamMulai'] . "</td>";
                    echo "<td>" . $row['jamSelesai'] . "</td>";
                    echo "<td>" . $row['ruang'] . "</td>";
                    echo "</tr>";
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
