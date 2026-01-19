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
      <div class="col-lg-2 mb-4">
        <label for="tahun" class="form-label">Tahun Awal</label>
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

      <div class="col-lg-2 mb-4">
        <label for="tahun_akhir" class="form-label">Tahun Akhir</label>
        <select class="form-control" name="tahun_akhir" id="tahun_akhir" aria-label="tahun_akhir">
          <?php
          $tahunSekarang = date('Y');
          for ($i = 0; $i <= 44; $i++) :
            $tahunOption = $tahunSekarang - $i;
            $selected = ($tahunOption == ($tahun_akhir ?? $tahun)) ? 'selected' : '';
          ?>
            <option value="<?= $tahunOption; ?>" <?= $selected; ?>><?= $tahunOption; ?></option>
          <?php endfor; ?>
        </select>
      </div>

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

      <div class="col-lg-2 mb-4">
        <label class="form-label" style="visibility: hidden;">Action</label>
        <button type="submit" class="btn btn-sm btn-primary shadow-s d-block w-100">
          <i class="fas fa-search fa-sm text-white-50"></i> Tampilkan Data
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
                <?php if (isset($kategori) && $kategori !== 'semua') : ?>
                  Total Pengunjung Kategori: <?= $kategori; ?>
                  <?php if ($tahun == $tahun_akhir) : ?>
                    - Tahun <?= $tahun; ?>
                  <?php else : ?>
                    - Tahun <?= $tahun; ?> s/d <?= $tahun_akhir; ?>
                  <?php endif; ?>
                <?php else : ?>
                  Total Pengunjung
                  <?php if ($tahun == $tahun_akhir) : ?>
                    Tahun <?= $tahun; ?>
                  <?php else : ?>
                    Tahun <?= $tahun; ?> s/d <?= $tahun_akhir; ?>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                if (isset($kategori) && $kategori !== 'semua') {
                  echo number_format($total_per_kategori[$kategori] ?? 0, 0, ',', '.');
                } else {
                  $totalPengunjung = 0;
                  foreach ($data_pengunjung as $row) {
                    $totalPengunjung += $row['total'];
                  }
                  echo number_format($totalPengunjung, 0, ',', '.');
                }
                ?> Orang
              </div>

              <?php if (!isset($kategori) || $kategori === 'semua') : ?>
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
        Statistik Pengunjung
        <?php if ($tahun == $tahun_akhir) : ?>
          Tahun <?= $tahun; ?>
        <?php else : ?>
          Tahun <?= $tahun; ?> s/d <?= $tahun_akhir; ?>
        <?php endif; ?>
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
  var ctx = document.getElementById("statistik");
  var chartLabels = <?= $chart_labels; ?>;
  var datasets = <?= $data_grafik; ?>;

  console.log('Chart Labels:', chartLabels);
  console.log('Datasets:', datasets);

  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: chartLabels,
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
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 20
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            padding: 10,
            callback: function(value, index, values) {
              return value.toLocaleString('id-ID');
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
        display: <?= (isset($kategori) && $kategori !== 'semua') ? 'false' : 'true'; ?>
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
        displayColors: true,
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + tooltipItem.yLabel.toLocaleString('id-ID') + ' orang';
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
          <h6 class="m-0 font-weight-bold text-black mb-4">
            <?php if ($tahun == $tahun_akhir) : ?>
              TAHUN <?= $tahun; ?>
            <?php else : ?>
              TAHUN <?= $tahun; ?> - <?= $tahun_akhir; ?>
            <?php endif; ?>
          </h6>
        </div>
        <img src="img\logo-.png" alt="" id="logo" style="width: 80px; margin-left: 20px;">
      </div>
      <hr>

      <div class="table text-center">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><?= ($is_year_range) ? 'Tahun' : 'Bulan'; ?></th>
              <?php
              // Inisialisasi array untuk menyimpan kategori unik
              $uniqueCategories = [];
              foreach ($data_pengunjung as $row) :
                if (!in_array($row['kategori'], $uniqueCategories)) {
                  $uniqueCategories[] = $row['kategori'];
                }
              endforeach;

              foreach ($uniqueCategories as $category) : ?>
                <th><?= $category; ?></th>
              <?php endforeach; ?>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($is_year_range) {
              // Untuk rentang tahun - group by tahun
              $uniquePeriods = [];
              $dataByPeriod = [];

              foreach ($data_pengunjung as $row) :
                if (!in_array($row['tahun'], $uniquePeriods)) {
                  $uniquePeriods[] = $row['tahun'];
                }
                if (!isset($dataByPeriod[$row['tahun']])) {
                  $dataByPeriod[$row['tahun']] = [];
                }
                $dataByPeriod[$row['tahun']][$row['kategori']] = $row['total'];
              endforeach;

              sort($uniquePeriods);

              foreach ($uniquePeriods as $period) : ?>
                <tr>
                  <td><?= $period; ?></td>
                  <?php foreach ($uniqueCategories as $category) : ?>
                    <td><?= number_format($dataByPeriod[$period][$category] ?? 0, 0, ',', '.'); ?></td>
                  <?php endforeach; ?>
                  <td>
                    <?= number_format(array_sum($dataByPeriod[$period]), 0, ',', '.'); ?>
                  </td>
                </tr>
              <?php endforeach;
            } else {
              // Untuk tahun tunggal - group by bulan
              $uniqueMonths = [];
              $dataByMonth = [];

              foreach ($data_pengunjung as $row) :
                if (!in_array($row['bulan'], $uniqueMonths)) {
                  $uniqueMonths[] = $row['bulan'];
                }
                if (!isset($dataByMonth[$row['bulan']])) {
                  $dataByMonth[$row['bulan']] = [];
                }
                $dataByMonth[$row['bulan']][$row['kategori']] = $row['total'];
              endforeach;

              foreach ($uniqueMonths as $month) : ?>
                <tr>
                  <td><?= $bulanMapping[$month]; ?></td>
                  <?php foreach ($uniqueCategories as $category) : ?>
                    <td><?= number_format($dataByMonth[$month][$category] ?? 0, 0, ',', '.'); ?></td>
                  <?php endforeach; ?>
                  <td>
                    <?= number_format(array_sum($dataByMonth[$month]), 0, ',', '.'); ?>
                  </td>
                </tr>
            <?php endforeach;

              $dataByPeriod = $dataByMonth; // Untuk tfoot
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Total</th>
              <?php foreach ($uniqueCategories as $category) : ?>
                <td>
                  <?php
                  $totalByCategory = array_sum(array_column($dataByPeriod, $category));
                  echo number_format($totalByCategory, 0, ',', '.');
                  ?>
                </td>
              <?php endforeach; ?>
              <td>
                <?php
                $totalByTotal = 0;
                foreach ($uniqueCategories as $category) {
                  $totalByTotal += array_sum(array_column($dataByPeriod, $category));
                }
                echo number_format($totalByTotal, 0, ',', '.');
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