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
        <label for="tahun" class="form-label">Tahun</label>
        <select class="form-control" name="tahun" id="tahun" aria-label="tahun">
          <?php
          $tahunSekarang = date('Y');
          for ($i = 0; $i <= 44; $i++) :
            $tahunOption = $tahunSekarang - $i;
            $selected = ($tahunOption == $tahun) ? 'selected' : '';
          ?>
            <option value="<?= $tahunOption; ?>" <?= $selected; ?>><?= $tahunOption; ?></option>
          <?php endfor; ?>
        </select>
      </div>

      <!-- Dropdown Kategori Baru -->
      <div class="col-lg-3 mb-4">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-control" name="kategori" id="kategori" aria-label="kategori">
          <option value="semua" <?= (!isset($kategori) || $kategori == 'semua') ? 'selected' : ''; ?>>Semua Kategori</option>
          <?php if (isset($all_categories)) : ?>
            <?php foreach ($all_categories as $cat) : ?>
              <option value="<?= $cat; ?>" <?= (isset($kategori) && $kategori == $cat) ? 'selected' : ''; ?>>
                <?= $cat; ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-3 mb-4">
        <label class="form-label" style="visibility: hidden;">Action</label>
        <button type="submit" class="btn btn-sm btn-primary shadow-s d-block">
          <i class="fas fa-sm text-white-50"></i> Tampilkan Data
        </button>
      </div>
    </div>
  </form>

  <!-- Card Total Pengunjung -->
  <div class="row mb-4">
    <div class="col-xl-12 col-md-12">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Pengunjung Tahun <?= $tahun; ?></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                // Menghitung total pengunjung
                $totalPengunjung = 0;
                foreach ($data_pengunjung as $row) {
                  $totalPengunjung += $row['total'];
                }
                echo number_format($totalPengunjung, 0, ',', '.');
                ?> Orang
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-xl-12 col-md-12">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                <?php if (isset($kategori) && $kategori !== 'semua') : ?>
                  Total Pengunjung Kategori: <?= $kategori; ?> - Tahun <?= $tahun; ?>
                <?php else : ?>
                  Total Pengunjung Tahun <?= $tahun; ?>
                <?php endif; ?>
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                if (isset($kategori) && $kategori !== 'semua') {
                  // Tampilkan total kategori yang dipilih
                  echo number_format($total_per_kategori[$kategori] ?? 0, 0, ',', '.');
                } else {
                  // Tampilkan total keseluruhan
                  $totalPengunjung = 0;
                  foreach ($data_pengunjung as $row) {
                    $totalPengunjung += $row['total'];
                  }
                  echo number_format($totalPengunjung, 0, ',', '.');
                }
                ?> Orang
              </div>

              <?php if (!isset($kategori) || $kategori === 'semua') : ?>
                <!-- Tampilkan breakdown per kategori di bawah -->
                <div class="mt-3">
                  <small class="text-muted">Rincian per Kategori:</small>
                  <div class="row mt-2">
                    <?php foreach ($total_per_kategori as $cat => $total) : ?>
                      <div class="col-md-3 col-sm-6 mb-2">
                        <div class="border-left border-primary pl-2">
                          <small class="font-weight-bold text-dark"><?= $cat; ?></small><br>
                          <small class="text-muted"><?= number_format($total, 0, ',', '.'); ?> orang</small>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="m-0 font-weight-bold text-primary">
        Statistik Pengunjung Tahun <?= $tahun; ?>
        <?php if (isset($kategori) && $kategori !== 'semua') : ?>
          - Kategori: <?= $kategori; ?>
        <?php endif; ?>
      </h6>

      <div>
        <button onclick="downloadPDF()" type="button" class="btn btn-sm btn-danger shadow-s mr-2">
          <i class="fas fa-file-pdf fa-sm text-white-50"></i> Download PDF
        </button>
        <button onclick="printTable()" type="button" class="btn btn-sm btn-primary shadow-s">
          <i class="fas fa-print fa-sm text-white-50"></i> Print
        </button>
      </div>
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

  // Fungsi untuk print tabel biasa
  function printTable() {
    window.print();
  }

  // Fungsi untuk download PDF dengan grafik dan tabel
  async function downloadPDF() {
    const button = event.target.closest('button');
    const originalButtonText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-spinner fa-spin fa-sm"></i> Memproses...';
    button.disabled = true;

    try {
      const {
        jsPDF
      } = window.jspdf;
      const pdf = new jsPDF({
        orientation: 'landscape',
        unit: 'mm',
        format: 'a4'
      });

      const pageWidth = pdf.internal.pageSize.getWidth();
      const pageHeight = pdf.internal.pageSize.getHeight();

      // ===== HALAMAN 1: GRAFIK =====

      // Logo dan Header (jika ada)
      pdf.setFontSize(16);
      pdf.setFont(undefined, 'bold');
      pdf.text('LAPORAN DATA PENGUNJUNG', pageWidth / 2, 20, {
        align: 'center'
      });
      pdf.setFontSize(14);
      pdf.text('MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)', pageWidth / 2, 27, {
        align: 'center'
      });
      pdf.setFontSize(12);
      pdf.text('TAHUN <?= $tahun; ?>', pageWidth / 2, 33, {
        align: 'center'
      });

      // Garis pemisah
      pdf.setLineWidth(0.5);
      pdf.line(15, 36, pageWidth - 15, 36);

      // Grafik
      const canvas = document.getElementById('statistik');
      const imgData = canvas.toDataURL('image/png', 1.0);
      const imgWidth = 250;
      const imgHeight = (canvas.height * imgWidth) / canvas.width;
      pdf.addImage(imgData, 'PNG', (pageWidth - imgWidth) / 2, 42, imgWidth, imgHeight);

      // Total Pengunjung
      const totalPengunjung = <?php
                              $totalPengunjung = 0;
                              foreach ($data_pengunjung as $row) {
                                $totalPengunjung += $row['total'];
                              }
                              echo $totalPengunjung;
                              ?>;

      pdf.setFontSize(12);
      pdf.setFont(undefined, 'bold');
      const totalText = `Total Pengunjung: ${totalPengunjung.toLocaleString('id-ID')} Orang`;
      pdf.text(totalText, pageWidth / 2, imgHeight + 52, {
        align: 'center'
      });

      // Footer halaman 1
      pdf.setFontSize(8);
      pdf.setFont(undefined, 'normal');
      pdf.text(`Dicetak pada: ${new Date().toLocaleString('id-ID', { 
      day: '2-digit', 
      month: 'long', 
      year: 'numeric',
      hour: '2-digit',
      minute: '2-digit'
    })}`, 15, pageHeight - 10);
      pdf.text('Halaman 1 dari 2', pageWidth - 40, pageHeight - 10);

      // ===== HALAMAN 2: TABEL =====
      pdf.addPage();

      // Header halaman 2
      pdf.setFontSize(16);
      pdf.setFont(undefined, 'bold');
      pdf.text('LAPORAN DATA PENGUNJUNG', pageWidth / 2, 20, {
        align: 'center'
      });
      pdf.setFontSize(14);
      pdf.text('MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)', pageWidth / 2, 27, {
        align: 'center'
      });
      pdf.setFontSize(12);
      pdf.text('TAHUN <?= $tahun; ?>', pageWidth / 2, 33, {
        align: 'center'
      });
      pdf.setLineWidth(0.5);
      pdf.line(15, 36, pageWidth - 15, 36);

      // Capture tabel dari #report
      const reportElement = document.getElementById('report');
      const tableElement = reportElement.querySelector('.table');

      // Sementara tampilkan report untuk di-capture
      reportElement.style.display = 'block';

      const tableCanvas = await html2canvas(tableElement, {
        scale: 2,
        backgroundColor: '#ffffff',
        logging: false
      });

      // Sembunyikan lagi
      reportElement.style.display = 'none';

      const tableImgData = tableCanvas.toDataURL('image/png');
      const tableImgWidth = pageWidth - 30; // margin 15 kiri kanan
      const tableImgHeight = (tableCanvas.height * tableImgWidth) / tableCanvas.width;

      // Cek apakah tabel muat di satu halaman
      if (tableImgHeight > pageHeight - 60) {
        // Jika terlalu tinggi, scale down
        const scaledHeight = pageHeight - 60;
        const scaledWidth = (tableCanvas.width * scaledHeight) / tableCanvas.height;
        pdf.addImage(tableImgData, 'PNG', 15, 42, scaledWidth, scaledHeight);
      } else {
        pdf.addImage(tableImgData, 'PNG', 15, 42, tableImgWidth, tableImgHeight);
      }

      // Footer halaman 2
      pdf.setFontSize(8);
      pdf.text(`Dicetak pada: ${new Date().toLocaleString('id-ID', { 
      day: '2-digit', 
      month: 'long', 
      year: 'numeric',
      hour: '2-digit',
      minute: '2-digit'
    })}`, 15, pageHeight - 10);
      pdf.text('Halaman 2 dari 2', pageWidth - 40, pageHeight - 10);

      // Download PDF
      const fileName = `Statistik_Pengunjung_<?= $tahun; ?>${<?= isset($kategori) && $kategori !== 'semua' ? "true" : "false"; ?> ? '_<?= $kategori ?? ""; ?>' : ''}.pdf`;
      pdf.save(fileName);

    } catch (error) {
      console.error('Error generating PDF:', error);
      alert('Terjadi kesalahan saat membuat PDF: ' + error.message);
    } finally {
      button.innerHTML = originalButtonText;
      button.disabled = false;
    }
  }
</script>

<div class="container-fluid report" id="report">
  <!-- Judul -->
  <div class="">
    <div class="">
      <div class="container-fluid d-sm-flex align-items-center justify-content-center mt-4">
        <img src="img\download.png" alt="" id="logo" style="width: 56px; margin-right: 20px;">
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
            $totalByMonth = [];
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