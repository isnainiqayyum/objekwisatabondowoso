<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container px-4">
    <h4>Daftar Penilaian per Alternatif</h4>

    <a href="<?= base_url('admin/penilaian/create') ?>" class="btn btn-primary mb-3">Tambah Penilaian</a>

    <?php
    // Kelompokkan penilaian per alternatif
    $penilaianByAlternatif = [];
    foreach ($penilaian as $p) {
        $penilaianByAlternatif[$p['id_alternatif']][] = $p;
    }
    ?>

    <?php if (!empty($penilaianByAlternatif)): ?>
        <?php $noAlt = 1; ?>
        <?php foreach ($penilaianByAlternatif as $id_alt => $penilaianList): ?>
            <?php
                // Cari nama alternatif
                $alt = array_filter($alternatif, fn($a) => $a['id_alternatif'] == $id_alt);
                $alt = reset($alt);
                $namaAlternatif = $alt['nama_alternatif'] ?? $alt['nama_wisata'] ?? '-';
            ?>
            <h5><?= $noAlt++ ?>. <?= esc($namaAlternatif) ?></h5>

            <table class="table table-bordered table-striped mb-4">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Kriteria</th>
                        <th style="width: 25%;">Subkriteria</th>
                        <th style="width: 10%;">Nilai</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($penilaianList as $p): ?>
                        <?php
                            $sub = array_filter($subkriteria, fn($s) => $s['id_subkriteria'] == $p['id_subkriteria']);
                            $sub = reset($sub);

                            $kriteriaNama = '-';
                            if ($sub && isset($sub['id_kriteria'])) {
                                $k = array_filter($kriteria, fn($k) => $k['id_kriteria'] == $sub['id_kriteria']);
                                $k = reset($k);
                                $kriteriaNama = $k['nama_kriteria'] ?? '-';
                            }
                            $nilai_sub = $sub['nilai'] ?? $p['nilai'];
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($kriteriaNama) ?></td>
                            <td><?= esc($sub['nama_subkriteria'] ?? '-') ?></td>
                            <td><?= esc($nilai_sub) ?></td>
                            <td>
                                <a href="<?= base_url('admin/penilaian/edit/'.$p['id_penilaian']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?= base_url('admin/penilaian/delete/'.$p['id_penilaian']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus?')">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Data penilaian kosong.</p>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
