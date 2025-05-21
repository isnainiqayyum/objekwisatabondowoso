<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Alternatif</th>
            <?php foreach ($kriteriaLabels as $label): ?>
                <th><?= esc($label) ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($matriksNormalisasi as $row): ?>
            <tr>
                <td><?= esc($row['nama_wisata']) ?></td>
                <?php foreach ($row['nilai'] as $nilai): ?>
                    <td><?= esc($nilai) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
