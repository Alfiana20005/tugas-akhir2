<!-- Sesuaikan dengan namespace yang benar -->
<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php
    // Retrieve the $tahun value from the session
    $tahun = session()->get('tahun');
    ?>
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


<?= $this->endSection(); ?>
