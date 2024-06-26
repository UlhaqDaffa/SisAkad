<?php 
session_start();

if (!isset($_SESSION['idMahasiswa'])) {
    header("Location: ../login.php");
    exit();
}

include "../koneksi.php"; 

$thisPage = "Dashboard"; 

include "../template/header.php"; 
include "sidebarMhs.php"; 
include "topbar.php"; 

$id_mahasiswa = $_SESSION['idMahasiswa'];

// Query untuk mendapatkan data nilai
$query = "SELECT m.namaMK, n.nilaiAngka, n.sks, d.semester
          FROM nilai n
          INNER JOIN matakuliah m ON n.idMatakuliah = m.id
          INNER JOIN datamhs d ON n.idMahasiswa = d.id
          WHERE n.idMahasiswa = '$id_mahasiswa'";

$result = mysqli_query($con, $query);

// Menginisialisasi data untuk chart
$matakuliah = [];
$nilaiAngka = [];
$sks = 0;
$total_nilai = 0;
$semester = "";

while ($row = mysqli_fetch_assoc($result)) {
    $matakuliah[] = $row['namaMK'];
    $nilaiAngka[] = $row['nilaiAngka'];
    $total_nilai += $row['nilaiAngka'] * $row['sks'];
    $sks += $row['sks'];
    $semester = $row['semester'];
}

// Menghitung IPK
if ($sks > 0) {
    $ipk = number_format($total_nilai / $sks, 2);
} else {
    $ipk = 0.00;
}

// Aturan Kampus dan Visi Misi
$aturanKampus = '
<div class="container">
    <h2>Peraturan Kampus Universitas Ciputat</h2>
    <ol>
        <li>
            <strong>Pakaian dan Penampilan</strong>
            <ul>
                <li>Mahasiswa diharapkan untuk mengenakan seragam kampus atau berpakaian yang sopan dan layak di lingkungan akademik.</li>
                <li>Dilarang mengenakan pakaian yang provokatif, vulgar, atau tidak pantas yang dapat mengganggu ketertiban kampus.</li>
            </ul>
        </li>
        <li>
            <strong>Tata Tertib Akademik</strong>
            <ul>
                <li>Mahasiswa diharapkan untuk hadir tepat waktu dalam setiap kegiatan akademik seperti kuliah, seminar, dan ujian.</li>
                <li>Dilarang meninggalkan kelas tanpa izin dosen atau tanpa keadaan darurat yang diakui.</li>
            </ul>
        </li>
        <li>
            <strong>Kedisiplinan dan Tertib Sosial</strong>
            <ul>
                <li>Mahasiswa wajib menjaga ketertiban di lingkungan kampus termasuk ruang kelas, perpustakaan, dan fasilitas umum lainnya.</li>
                <li>Dilarang melakukan tindakan merusak atau merusak properti kampus serta melakukan tindakan yang mengganggu ketenangan dan kenyamanan orang lain.</li>
            </ul>
        </li>
        <li>
            <strong>Patriotisme dan Sikap Kebangsaan</strong>
            <ul>
                <li>Mahasiswa diharapkan untuk menghormati simbol-simbol nasional seperti Bendera dan Lagu Kebangsaan serta mengikuti upacara penghormatan bendera yang dijadwalkan.</li>
                <li>Dianjurkan untuk berpartisipasi dalam kegiatan-kegiatan yang mempromosikan semangat kebangsaan dan kesadaran sosial.</li>
            </ul>
        </li>
    </ol>
</div>';
$visiMisi = "
    <div class='container'>
        <h2>Visi dan Misi Universitas Ciputat</h2>
        <h3>Visi</h3>
        <p>
            Universitas Ciputat bercita-cita menjadi perguruan tinggi terkemuka yang menghasilkan lulusan berwawasan global dengan komitmen tinggi terhadap nilai-nilai kebangsaan dan keunggulan akademik. Kami bertekad untuk membangun komunitas akademik yang inklusif dan inovatif, di mana penelitian, pendidikan, dan pengabdian kepada masyarakat berjalan seiring untuk menciptakan solusi berkelanjutan bagi tantangan lokal maupun global. Dengan mengedepankan semangat patriotisme dan kedisiplinan, Universitas Ciputat berkomitmen untuk membentuk generasi muda yang siap menghadapi dinamika zaman dan berkontribusi secara nyata bagi kemajuan bangsa.
        </p>

        <h3>Misi</h3>
        <p>
            Universitas Ciputat memiliki misi untuk menyelenggarakan pendidikan tinggi yang bermutu, dengan kurikulum yang dinamis dan relevan serta metode pengajaran yang interaktif dan berorientasi pada pembelajaran sepanjang hayat. Kami berfokus pada pengembangan karakter mahasiswa yang berintegritas, kreatif, dan berdaya saing tinggi melalui berbagai kegiatan akademik dan non-akademik. Selain itu, Universitas Ciputat juga berkomitmen untuk melakukan penelitian yang inovatif dan aplikatif, serta mengimplementasikan hasilnya demi kemajuan ilmu pengetahuan, teknologi, dan seni. Pengabdian kepada masyarakat juga menjadi pilar utama dalam misi kami, di mana kami berupaya untuk berkontribusi secara aktif dalam pemberdayaan dan peningkatan kesejahteraan masyarakat sekitar.
        </p>
    </div>";


?>

<!-- Content Wrapper. Contains page content --> 
<div class="content-wrapper"> 
  <!-- Content Header (Page header) --> 
  <section class="content-header"> 
    <div class="container-fluid"> 
      <div class="row"> 
        <div class="col-sm-6"> 
          <h3>Dashboard</h3> 
        </div> 
      </div> 
    </div><!-- /.container-fluid --> 
  </section> 

  <section class="content"> 
      <div class="container-fluid"> 
        <div class="row"> 
          <div class="col"> 
            <div class="card"> 
              <div class="card-body"> 
                <h5 class="card-title">Selamat Datang</h5> 
                <p class="card-text"> 
                     Selamat Datang Di Halaman Website Akademik Universitas Negeri Ciputat
                </p> 
              </div> 
            </div> 
          </div> 
        </div> 
        <!-- /.row --> 
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Nilai, IPK, dan Posisi Semester</h5>
              </div>
              <div class="card-body">
                <canvas id="nilaiChart"></canvas>
                <p>IPK: <?php echo $ipk; ?></p>
                <p>Posisi Semester: <?php echo $semester; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Aturan Kampus</h5>
              </div>
              <div class="card-body">
                <p><?php echo $aturanKampus; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Visi dan Misi Kampus</h5>
              </div>
              <div class="card-body">
                <p><?php echo $visiMisi; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- JQuery dan Chart.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $(document).ready(function(){
    var ctx = document.getElementById('nilaiChart').getContext('2d');
    var nilaiChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($matakuliah); ?>,
        datasets: [{
          label: 'Nilai Angka',
          data: <?php echo json_encode($nilaiAngka); ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          x: {
            display: false
          },
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  });
</script>

<?php 
include "../template/footer.php"; 
?>
