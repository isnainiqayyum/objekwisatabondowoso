<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<style>
  body {
    position: relative;
    margin: 0;
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: url('<?= base_url("asset-user/images/bgrekomendasi.png") ?>') no-repeat center center fixed;
    background-size: cover;
  }

  /* Overlay untuk gelapkan background */
  body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* default 50% gelap */
      z-index: 0;
      transition: background-color 0.3s ease;
  }

  .hasil-wrapper {
    position: relative;
    z-index: 1;
    max-width: 800px;
    margin: 30px auto;
    background: rgba(255, 255, 255, 0.85); /* Lebih gelap dari putih murni */
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(2px); /* Efek blur halus jika didukung browser */
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

  .rekomendasi-item {
    background: #ffffff; /* Putih bersih untuk menonjolkan card */
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1); /* Lebih tajam dari sebelumnya */
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .rekomendasi-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); /* Efek hover sedikit terangkat */
  }

  .rekomendasi-content {
    display: flex;
    flex-direction: column;
  }

  @media (min-width: 768px) {
    .rekomendasi-content {
      flex-direction: row;
      align-items: center;
    }
  }

  .rekomendasi-img {
    width: 100%;
    max-width: 200px;
    height: 130px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
  }

  @media (min-width: 768px) {
    .rekomendasi-img {
      margin-right: 20px;
      margin-bottom: 0;
    }
  }

  .rekomendasi-text h5 {
    margin: 0 0 8px;
    font-size: 1.2rem;
    font-weight: 600;
  }

  .skor {
    font-weight: 700;
    color: #007bff;
    margin-left: 10px;
  }

  .rekomendasi-text p {
    margin: 0 0 10px;
    color: #555;
  }

  /* Tombol "Lihat Detail" dengan efek hover kuning */
.btn-lihat {
  display: inline-block;
  padding: 8px 15px;
  background-color: #007bff;
  color: #fff;
  font-weight: 500;
  text-decoration: none;
  border-radius: 6px;
  border: 2px solid transparent;
  transition: background-color 0.3s, color 0.3s, border-color 0.3s;
}

.btn-lihat:hover {
  background-color: #ffc107;     /* Warna hover kuning */
  color: #212529;                /* Teks lebih gelap agar terbaca di atas kuning */
  border-color: #e0a800;         /* Tambahan border agar lebih menonjol */
}

/* Tombol "Kembali" dengan dasar kuning dan hover biru */
.btn-kembali {
  display: inline-block;
  margin-top: 30px;
  padding: 12px 25px;
  background-color: #ffc107;
  color: #212529;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: background-color 0.3s, color 0.3s;
  text-align: center;
  border: 2px solid transparent;
}

.btn-kembali:hover {
  background-color: #007bff;
  color: #fff;
  border-color: #0056b3;
}


</style>

<div class="hasil-wrapper">
  <h2><?= esc($judul) ?></h2>

  <?php if (isset($pesan) && $pesan): ?>
    <p class="pesan"><?= esc($pesan) ?></p>
  <?php else: ?>
    <?php if (!empty($rekomendasi)): ?>
      <?php $no = 1; foreach ($rekomendasi as $r): ?>
        <div class="rekomendasi-item">
          <div class="rekomendasi-content">
            <img src="<?= base_url('asset-user/uploads/foto_wisata/' . $r['foto']) ?>" alt="<?= esc($r['nama']) ?>" class="rekomendasi-img">
            <div class="rekomendasi-text">
              <h5><?= $no++ . '. ' . esc($r['nama']) ?>
                <span class="skor">[Skor: <?= number_format($r['skor'], 4) ?>]</span>
              </h5>
              <p><?= mb_strimwidth(strip_tags($r['deskripsi']), 0, 100, '...') ?></p>
              <a href="<?= base_url('user/wisata/detail/' . $r['id_alternatif']) ?>" class="btn-lihat">Lihat Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="pesan">Maaf, tidak ada rekomendasi yang sesuai dengan kriteria Anda.</p>
    <?php endif; ?>
  <?php endif; ?>

  <a href="<?= base_url('user/rekomendasi') ?>" class="btn-kembali">Kembali ke Form</a>
</div>

<?= $this->endSection() ?>
