<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <form action="/statistik" method="post" class="d-inline">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <input type="text" class="form-control" placeholder="Masukkan Tahun" aria-label="tahun" name="tahun" value="<?= date('Y'); ?>">
            </div>
            <div class="col-lg-3 mb-4">
                <button type="submit" class="btn btn-sm btn-primary shadow-s"><i class="fas fa-sm text-white-50"></i>Tampilkan Data</button>
            </div>
        </div>
    </form>
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Pengunjung Tahun <?= $tahun; ?></h6>
            <a href="<?= base_url('/laporan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
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
    // labels: ["January", "February", "March", "April", "May", "June", "Agustus", "September", "November", "December"],
    labels: <?= $bulan_labels; ?>,
    datasets: <?= $data_grafik; ?>
  //   datasets: [
  //     {
  //     label: "TK",
  //     backgroundColor: "#4e73df",
  //     hoverBackgroundColor: "#2e59d9",
  //     borderColor: "#4e73df",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  //   {
  //     label: "SD",
  //     backgroundColor: "#EE99C2",
  //     hoverBackgroundColor: "#FB88B4",
  //     borderColor: "#EE99C2",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  //   {
  //     label: "SMP",
  //     backgroundColor: "#7E6363",
  //     hoverBackgroundColor: "#503C3C",
  //     borderColor: "#7E6363",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  //   {
  //     label: "SMA",
  //     backgroundColor: "#AC7D88",
  //     hoverBackgroundColor: "#85586F",
  //     borderColor: "#AC7D88",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  //   {
  //     label: "Mahasiswa",
  //     backgroundColor: "#F6D776",
  //     hoverBackgroundColor: "#FAEF9B",
  //     borderColor: "#F6D776",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  //   {
  //     label: "Peneliti",
  //     backgroundColor: "#7FC7D9",
  //     hoverBackgroundColor: "#DCF2F1",
  //     borderColor: "#7FC7D9",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  //   {
  //     label: "Wisatawan Asing",
  //     backgroundColor: "#43766C",
  //     hoverBackgroundColor: "#AAD9BB",
  //     borderColor: "#43766C",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  //   {
  //     label: "Rombongan Tamu Daerah",
  //     backgroundColor: "#B19470",
  //     hoverBackgroundColor: "#76453B",
  //     borderColor: "#B19470",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  //   {
  //     label: "Rombongan Tamu Negara",
  //     backgroundColor: "#AC87C5",
  //     hoverBackgroundColor: "#756AB6",
  //     borderColor: "#AC87C5",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  //   {
  //     label: "Umum",
  //     backgroundColor: "#9A031E",
  //     hoverBackgroundColor: "#750E21",
  //     borderColor: "#9A031E",
  //     data: [4215, 5312, 6251, 7841, 9821, 14984,4215,4215,4215,2000],
  //   },
  // ],
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
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5,
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

<div class="container-fluid">
    <!-- Judul -->
    <div class="card shadow mb-4">                 
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Data Pengunjung Tahun <?= $tahun; ?></h6>
        </div>
        <div class="card-body">
            <div class="container-fluid text-center">
                <h6 class="m-0 font-weight-bold text-black mb-4">Museum Negeri Nusa Tenggara Barat</h6>
            </div>
            <div class="table-responsive text-center">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <td><?= $month; ?></td>
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
