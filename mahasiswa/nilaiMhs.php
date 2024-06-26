<?php
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['idMahasiswa'])) {
    header("Location: ../login.php");
    exit();
}

include "../koneksi.php";

// ID Mahasiswa dari session
$id_mahasiswa = $_SESSION['idMahasiswa'];

// Query untuk mengambil data nilai, matakuliah, dan mahasiswa sesuai ID mahasiswa yang login
$query = "SELECT m.kodeMK, m.namaMK, n.nilaiHuruf, n.nilaiAngka, m.jumlahSks
          FROM nilai n
          INNER JOIN matakuliah m ON n.idMatakuliah = m.id
          WHERE n.idMahasiswa = '$id_mahasiswa'";

$result = mysqli_query($con, $query);

// Menghitung jumlah baris hasil query
$num_rows = mysqli_num_rows($result);

// Menginisialisasi total SKS dan total nilai untuk perhitungan IPK
$total_sks = 0;
$total_nilai = 0;

// Memulai output HTML
$thisPage = "nilai";
include "../template/header.php"; // Header template
include "sidebarMhs.php"; // Sidebar template
include "topbar.php"; // Topbar template
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Rangkuman Nilai</h3>
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
                        <div class="row-sm-6 mt-4">
                            <h3 class="text-center">Rangkuman Nilai</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Mata Kuliah</th>
                                            <th>Nilai Huruf</th>
                                            <th>Nilai Angka</th>
                                            <th>SKS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Fetching data dari hasil query
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>{$row['namaMK']} ({$row['kodeMK']})</td>";
                                            echo "<td>{$row['nilaiHuruf']}</td>";
                                            echo "<td>{$row['nilaiAngka']}</td>";
                                            echo "<td>{$row['jumlahSks']}</td>";
                                            echo "</tr>";

                                            // Menambahkan nilai angka dan total SKS
                                            $total_nilai += ($row['nilaiAngka'] * $row['jumlahSks']);
                                            $total_sks += $row['jumlahSks'];
                                        }

                                        // Menghitung IPK
                                        if ($total_sks > 0) {
                                            $ipk = $total_nilai / $total_sks;
                                            // Validasi IPK tidak melebihi 4.00
                                            if ($ipk > 4.00) {
                                                $ipk = 4.00;
                                            }
                                            $ipk = number_format($ipk, 2);
                                        } else {
                                            $ipk = 0.00;
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total SKS</th>
                                            <td><?php echo $total_sks; ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">IPK</th>
                                            <td><?php echo $ipk; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-right mt-1 mb-2 mr-4">
                                <a class="btn btn-info" href="cetak_nilai.php">Cetak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include "../template/footer.php"; // Footer template
?>
