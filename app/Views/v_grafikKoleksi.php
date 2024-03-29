
<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid statistik">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Koleksi Museum Negeri Nusa Tenggara Barat</h6>

        </div>
        
        <div class="card-body">
            <canvas width="600" height="400" id="statistik"></canvas>
        </div>
    </div>
</div>

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


<?= $this->endSection(); ?>
