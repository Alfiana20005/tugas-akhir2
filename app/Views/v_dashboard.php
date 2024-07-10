<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Petugas Terdaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPetugas; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Koleksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKoleksi; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Progress Perawatan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <?php 
                                
                                    $progressPerJenis = 100 / 3; // Persentase progress per jenis perawatan
                                    $totalProgress = 0; // Total progress keseluruhan
                                    $tahunSekarang = date("Y");
                                    

                                    $preventifFound = false; // Inisialisasi variabel penanda apakah data preventif yang sedang berlangsung ditemukan
                                        foreach($jadwalPrw as $j): 
                                            $tahunBerakhir = date("Y", strtotime($j['berakhir']));
                                            if($j['kode_jenisprw'] == '01' && $j['status'] == 'Selesai' && $tahunBerakhir==$tahunSekarang):
                                                
                                                $totalProgress += $progressPerJenis;
                                                $preventifFound = true; // Menandai bahwa data preventif yang sedang berlangsung ditemukan
                                                break; // Menghentikan iterasi setelah menemukan item preventif yang sedang berlangsung    
                                            endif; 
                                        endforeach;
                                        if ($preventifFound): 
                                            $totalProgress;
                                        endif; 

                                    $kuratifFound = false; 
                                        foreach($jadwalPrw as $j): 
                                            $tahunBerakhir = date("Y", strtotime($j['berakhir']));
                                            if($j['kode_jenisprw'] == '02' && $j['status'] == 'Selesai' && $tahunBerakhir==$tahunSekarang):
                                                $totalProgress += $progressPerJenis;
                                                $kuratifFound = true; 
                                                break; 
                                            endif; 
                                        endforeach;
                                        if (!$kuratifFound): 
                                            $totalProgress;
                                        endif; 
                                    $restorasiFound = false; 
                                        foreach($jadwalPrw as $j): 
                                            $tahunBerakhir = date("Y", strtotime($j['berakhir']));
                                            if($j['kode_jenisprw'] == '03' && $j['status'] == 'Selesai' && $tahunBerakhir==$tahunSekarang):
                                                
                                                    $totalProgress += $progressPerJenis;
                                                    
                                                    $restorasiFound = true; 
                                                    break; 
                                                
                                            endif; 
                                        endforeach;
                                        if ($restorasiFound): 
                                            $totalProgress;
                                        endif; 
                                ?>
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?= round($totalProgress) . "%"; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: <?= round($totalProgress) . "%"; ?>" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Perawatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPerawatan; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4" style="height: 400px;">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Pengunjung Tahun Ini</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="StatistikHariIni"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4" style="height: 400px;">
                
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Koleksi</h6>
                </div>
                
                <div class="card-body">
                    <canvas width="600" height="360" id="statistik"></canvas>
                </div>
            </div>
        </div>

        
    </div>

    <!-- Perawatan Koleksi -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4" style="height: 400px;">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Perawatan Tahun Ini</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="statistikPerawatan"></canvas>
                    </div>
                </div>
            </div>
        </div>

        
    </div>


</div>

<!-- script statistik pengunjung -->
<script>
    var datasets = <?= json_encode($datasets); ?>;
    var ctx = document.getElementById("StatistikHariIni");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?= $bulan_labels; ?>,
    
    datasets: datasets
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
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
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
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
</script>
<!-- script grafik koleksi -->
<script>
var ctx = document.getElementById("statistik");
var kategori_labels = <?= $kategori_labels ?>;
var data_grafik = <?= $data_grafik; ?>;
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: kategori_labels,
    datasets: data_grafik,
  
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


<script>
    // Bar Chart Example
var ctx = document.getElementById("statistikPerawatan");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [],
    datasets: <?= $data_grafik2; ?>
  
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

<?= $this-> endSection(); ?>
