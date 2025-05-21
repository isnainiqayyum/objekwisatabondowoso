<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Ranking</th>
            <th>Alternatif</th>
            <th>Skor Akhir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($skorAkhir as $item): ?>
            <tr>
                <td><?= esc($item['ranking']) ?></td>
                <td><?= esc($item['nama_wisata']) ?></td>
                <td><?= esc($item['skor']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
