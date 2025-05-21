<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h2 class="mb-4 text-center">Hasil Perhitungan SAW</h2>

    <!-- Matriks Keputusan -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <strong>Matriks Keputusan (X)</strong>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered m-0">
                    <thead class="thead-light text-center">
                        <tr>
                            <th rowspan="2">Nama Wisata</th>
                            <?php foreach ($kriteriaLabels as $i => $label): ?>
                                <th><?= $label ?> (<?= $kriteria[$i]['bobot'] ?>)</th>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <?php foreach ($kriteria as $k): ?>
                                <th><?= ucfirst(esc($k['tipe'])) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matriksKeputusan as $row): ?>
                            <tr>
                                <td><?= esc($row['nama_wisata'] ?? 'N/A') ?></td>
                                <?php foreach ($row['nilai'] as $nilai): ?>
                                    <td><?= $nilai ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Matriks Normalisasi -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <strong>Matriks Normalisasi (R)</strong>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered m-0">
                    <thead class="thead-light text-center">
                        <tr>
                            <th rowspan="2">Nama Wisata</th>
                            <?php foreach ($kriteriaLabels as $i => $label): ?>
                                <th><?= $label ?> (<?= $kriteria[$i]['bobot'] ?>)</th>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <?php foreach ($kriteria as $k): ?>
                                <th><?= ucfirst(esc($k['tipe'])) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matriksNormalisasi as $row): ?>
                            <tr>
                                <td><?= esc($row['nama_wisata'] ?? 'N/A') ?></td>
                                <?php foreach ($row['nilai'] as $nilai): ?>
                                    <td><?= number_format($nilai, 4) ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Skor Akhir dan Ranking -->
    <div class="card mb-5">
        <div class="card-header bg-warning text-dark">
            <strong>Skor Akhir dan Ranking</strong>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped m-0">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>Ranking</th>
                            <th>Nama Wisata</th>
                            <th>Skor Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($skorAkhir as $rank => $row): ?>
                            <tr class="<?= $rank == 0 ? 'table-success' : '' ?>">
                                <td><strong><?= $rank + 1 ?></strong></td>
                                <td><?= esc($row['nama_wisata'] ?? 'N/A') ?></td>
                                <td><?= number_format($row['skor'], 4) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
