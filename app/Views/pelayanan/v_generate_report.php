<!-- v_generate_report.php -->

<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Generate Report</h1>

    <!-- Display the date range -->
    <p>Report for <?= date('d M Y', strtotime($tanggalAwal)); ?> to <?= date('d M Y', strtotime($tanggalAkhir)); ?></p>

    <!-- Display the report data in a table -->
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Month-Year</th>
                <th>Category</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reportData as $row): ?>
                <tr>
                    <td><?= $row['month_year']; ?></td>
                    <td><?= $row['kategori']; ?></td>
                    <td><?= $row['total']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
