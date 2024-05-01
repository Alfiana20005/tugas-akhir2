<?php
// Array untuk memetakan nama bulan
$bulanMapping = [
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember',
];
?>

<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid statistik">
    <form action="/statistik" method="post" class="d-inline">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <input type="text" class="form-control" placeholder="Masukkan Tahun" aria-label="tahun" name="tahun" value="<?= $tahun; ?>">
            </div>
            <div class="col-lg-3 mb-4">
                <button type="submit" class="btn btn-sm btn-primary shadow-s"><i class="fas fa-sm text-white-50"></i>Tampilkan Data</button>
            </div>
        </div>
    </form>
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Pengunjung Tahun <?= $tahun; ?></h6>

            <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-s" id="print"><i class="fas fa-print fa-sm text-white-50"></i>Print</button>
        </div>
        
        <div class="card-body">
            <canvas width="600" height="400" id="statistik"></canvas>
        </div>
    </div>
</div>

<script>
    // Bar Chart Example
var ctx = document.getElementById("statistik");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [],
    datasets: <?= $data_grafik; ?>
  
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        type: 'time',
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        // ticks: {
        //   maxTicksLimit: 10
        // },
        // maxBarThickness: 5,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1500000,
          // maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
</script>

<div class="container-fluid report" id="report">
    <!-- Judul -->
    <div class="">                 
        <div class="">
            <div class="container-fluid d-sm-flex align-items-center justify-content-center mt-4">
              <img src="img\download.png" alt="" id="logo" style="width: 56px; margin-right: 20px;" >
              <div class="text-center">
                  <h6 class="m-0 font-weight-bold text-black">LAPORAN DATA PENGUNJUNG</h6>
                  <h6 class="m-0 font-weight-bold text-black">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
                  <h6 class="m-0 font-weight-bold text-black mb-4">TAHUN <?= $tahun; ?> </h6>
              </div>
              <img src="img\logo-.png" alt="" id="logo" style="width: 80px; margin-left: 20px;">
            </div>
            <hr>

            <div class="table text-center">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <?php 
                            // Inisialisasi array untuk menyimpan kategori unik
                            $uniqueCategories = [];
                            foreach ($data_pengunjung as $row) : 
                                // Menyimpan kategori unik
                                if (!in_array($row['kategori'], $uniqueCategories)) {
                                    $uniqueCategories[] = $row['kategori'];
                                }
                            endforeach;
                            // Menampilkan satu header untuk setiap kategori unik
                            foreach ($uniqueCategories as $category) : ?>
                                <th><?= $category; ?></th>
                            <?php endforeach; ?>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Inisialisasi array untuk menyimpan bulan unik
                        $uniqueMonths = [];
                        $dataByMonth = [];
                        $totalByMonth =[];
                        // 
                        foreach ($data_pengunjung as $row) : 
                            // Menyimpan bulan unik
                            if (!in_array($row['bulan'], $uniqueMonths)) {
                                $uniqueMonths[] = $row['bulan'];
                            }
                            // Menyimpan data berdasarkan bulan
                            if (!isset($dataByMonth[$row['bulan']])) {
                                $dataByMonth[$row['bulan']] = [];
                            }
                            $dataByMonth[$row['bulan']][$row['kategori']] = $row['total'];
                        endforeach;
                        // Menampilkan data
                        foreach ($uniqueMonths as $month) : ?> 
                            <tr>
                                <td><?= $bulanMapping[$month]; ?></td>
                                <?php foreach ($uniqueCategories as $category) : ?>
                                    <td><?= $dataByMonth[$month][$category] ?? 0; ?></td>
                                <?php endforeach; ?>
                                <td>
                                    <?php 
                                    // Menampilkan jumlah total untuk bulan tertentu
                                    $totalByMonth = array_sum($dataByMonth[$month]);
                                    echo $totalByMonth;
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <?php 
                            // Menampilkan total untuk setiap kategori
                            foreach ($uniqueCategories as $category) : ?>
                                <td>
                                    <?php 
                                    $totalByCategory = array_sum(array_column($dataByMonth, $category));
                                    echo $totalByCategory;
                                    ?>
                                </td>
                           
                            <?php endforeach; ?>
                            <td>
            <?php 
            // Menampilkan jumlah total untuk jumlah seluruh total setiap kategori
            $totalByTotal = 0; // Initialize totalByTotal to 0
            foreach ($uniqueCategories as $category) {
                $totalByTotal += array_sum(array_column($dataByMonth, $category));
            }
            echo $totalByTotal;
            ?>
        </td>
                        </tr>
                    </tfoot>                  
                </table>
            </div>
        </div>
    </div>
</div>


<?php
    // Set the $tahun value in the session
    session()->set('tahun', $tahun);
    ?>

<?= $this->endSection(); ?>
