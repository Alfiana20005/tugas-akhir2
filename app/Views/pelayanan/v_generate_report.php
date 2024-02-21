<!-- v_generate_report.php -->

<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Judul -->
    
    
    <div class="card shadow mb-4">                 
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Data Pengunjung Tahun</h6>
        </div>
        <div class="card-body">
            <div class="container-fluid text-center">
                <h6 class="m-0 font-weight-bold text-black mb-4">Museum Negeri Nusa Tenggara Barat</h6>
            </div>
            <div class="table-responsive text-center">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>Bulan</th>
                        <th>TK</th>
                        <th>SD</th>
                        <th>SMP</th>
                        <th>SMA</th>
                        <th>MHS</th>
                        <th>Peneliti</th>
                        <th>WTA</th>
                        <th>RTD</th>
                        <th>RTN</th>
                        <th>PER</th>
                        <th>Jumlah</th>
                    </tr>

                    <tr>
                        <td>januari</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>100</td>
                    </tr>
                    
                    <!-- Total -->
                    <tr>
                        <th>Total</th>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>100</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
