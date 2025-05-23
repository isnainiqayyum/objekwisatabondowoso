<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>


<div class="form-wrapper">
    <h2><?= esc($judul) ?></h2>
    <form action="<?= base_url('user/rekomendasi/hasil') ?>" method="post">
        <?= csrf_field() ?>

        <!-- Tambah input Nama Lengkap -->
        <div class="form-row">
            <label class="label-utama" for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required
                placeholder="Masukkan nama lengkap Anda"
                style="flex: 1; padding: 8px 10px; border-radius: 8px; border: 1.5px solid #ccc; font-size: 0.85rem;">
        </div>

        <div class="form-row">
            <label class="label-utama" for="objek">Objek Wisata</label>
            <select name="objek" id="objek" required>
                <option value="" disabled selected>Pilih Objek Wisata</option>
                <option value="Wisata Alam">Wisata Alam</option>
                <option value="Wisata Buatan">Wisata Buatan</option>
                <option value="Wisata Sejarah dan Budaya">Wisata Sejarah dan Budaya</option>
            </select>
        </div>

        <div class="form-row">
            <label class="label-utama" for="jarak">Jarak Tempuh</label>
            <select name="jarak" id="jarak" required>
                <option value="" disabled selected>Pilih Jarak Tempuh</option>
                <option value="0km - 15km">0-15 km</option>
                <option value="16km - 31km">16-31 km</option>
                <option value="32km - 47km">32-47 km</option>
                <option value="48km - 63km">48-63 km</option>
            </select>
        </div>

        <div class="form-row" style="align-items: flex-start;">
            <label class="label-utama">Fasilitas</label>
            <div class="checkbox-group">
                <?php
                $fasilitasList = ['Parkiran', 'Toilet', 'Musholla', 'Penginapan', "Papan Informasi", "Gazebo", 'Tempat Makan', 'Tempat Bermain', 'Spot Foto'];
                foreach ($fasilitasList as $f) {
                    echo "<label class='checkbox-label'><input type='checkbox' name='fasilitas[]' value='$f'> $f</label>";
                }
                ?>
            </div>
        </div>

        <div class="form-row">
            <label class="label-utama" for="harga">Harga Tiket</label>
            <select name="harga" id="harga" required>
                <option value="" disabled selected>Pilih Harga Tiket</option>
                <option value="Rp0 - Rp10.000">Rp0-10.000</option>
                <option value="Rp10.000 - Rp20.000">Rp10.000-20.000</option>
                <option value="Rp21.000 - Rp30.000">Rp21.000-30.000</option>
                <option value="Rp31.000 ke atas">Rp31.000 ke atas</option>
            </select>
        </div>

        <div class="form-row">
            <label class="label-utama" for="jam">Jam Kunjung</label>
            <select name="jam" id="jam" required>
                <option value="" disabled selected>Pilih Jam Kunjung</option>
                <option value="02.00 - 11.00">02.00-11.00</option>
                <option value="08.00 - 16.00">08.00-16.00</option>
                <option value="08.00 - 17.00">08.00-17.00</option>
            </select>
        </div>

        <div class="form-row" style="align-items: flex-start;">
            <label class="label-utama">Akses Kendaraan</label>
            <div class="checkbox-group">
                <?php
                $aksesList = ['Motor', 'Mobil', 'Mobil Elf', 'Bus'];
                foreach ($aksesList as $a) {
                    echo "<label class='checkbox-label'><input type='checkbox' name='akses[]' value='$a'> $a</label>";
                }
                ?>
            </div>
        </div>

        <button type="submit">Lihat Rekomendasi</button>
    </form>
</div>

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
        background-color: rgba(0, 0, 0, 0.5);
        /* 0.5 = 50% gelap */
        z-index: 0;
    }

    .form-wrapper {
        position: relative;
        z-index: 1;
        max-width: 600px;
        margin: 60px auto;
        padding: 30px 40px;
        background: rgba(255, 255, 255, 0.95);
        /* Sedikit transparan */
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(2px);
        /* efek kaca buram */
    }

    .form-wrapper h2 {
        text-align: center;
        margin-bottom: 40px;
        font-weight: 800;
        font-size: 2rem;
        color: #222;
    }

    form .form-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-bottom: 20px;
    }

    form .form-row label.label-utama {
        flex: 0 0 160px;
        font-weight: 700;
        font-size: 1.1rem;
        color: #222;
    }

    form .form-row select,
    .form-row input[type="text"] {
        flex: 1;
        padding: 8px 10px;
        font-size: 0.85rem;
        border: 1.5px solid #ccc;
        border-radius: 8px;
        outline: none;
        transition: border-color 0.3s ease;
        height: 38px;
    }

    form .form-row select:focus,
    .form-row input[type="text"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px #007bffaa;
    }

    .checkbox-group {
        flex: 1;
        display: flex;
        flex-wrap: wrap;
        gap: 10px 15px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        cursor: pointer;
        font-weight: 400;
        font-size: 12px;
        color: #333;
    }

    .checkbox-group input[type="checkbox"] {
        margin-right: 6px;
        width: 16px;
        height: 16px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 12px 0;
        background-color: #007bff;
        color: white;
        font-weight: 700;
        font-size: 1.15rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.25s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    @media(max-width: 480px) {
        form .form-row {
            flex-direction: column;
            align-items: flex-start;
        }

        form .form-row label.label-utama {
            margin-bottom: 8px;
        }

        .checkbox-group {
            gap: 8px 12px;
        }
    }
</style>
<?= $this->endSection() ?>
