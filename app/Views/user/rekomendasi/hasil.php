<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<style>
  .hasil-wrapper {
    max-width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  }

  h2 {
    text-align: center;
    margin-bottom: 25px;
    font-weight: 700;
    color: #222;
  }

  .pesan {
    text-align: center;
    font-size: 1.15rem;
    color: #666;
    margin-bottom: 20px;
  }

  ol {
    padding-left: 20px;
  }

  ol li {
    margin-bottom: 12px;
    font-size: 1.1rem;
    color: #333;
  }

  .skor {
    font-weight: 700;
    color: #007bff;
    margin-left: 10px;
  }

  .btn-kembali {
    display: inline-block;
    margin-top: 30px;
    padding: 12px 25px;
    background-color: #007bff;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
  }

  .btn-kembali:hover {
    background-color: #0056b3;
  }

  @media(max-width: 480px){
    .hasil-wrapper {
      margin: 20px 15px;
      padding: 20px;
    }

    ol li {
      font-size: 1rem;
    }

    h2 {
      font-size: 1.5rem;
    }
  }
</style>

<div class="hasil-wrapper">
  <h2><?= esc($judul) ?></h2>

  <?php if (isset($pesan) && $pesan): ?>
      <p class="pesan"><?= esc($pesan) ?></p>
  <?php else: ?>
      <?php if (!empty($rekomendasi)): ?>
          <ol>
            <?php foreach ($rekomendasi as $r): ?>
              <li>
                <?= esc($r['nama']) ?> 
                <span class="skor">[Skor: <?= number_format($r['skor'], 4) ?>]</span>
              </li>
            <?php endforeach; ?>
          </ol>
      <?php else: ?>
          <p class="pesan">Maaf, tidak ada rekomendasi yang sesuai dengan kriteria Anda.</p>
      <?php endif; ?>
  <?php endif; ?>

  <a href="<?= base_url('user/rekomendasi') ?>" class="btn-kembali">Kembali ke Form</a>
</div>

<?= $this->endSection() ?>
