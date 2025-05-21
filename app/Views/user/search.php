<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>


<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold"><?php echo lang('Blog.btnsearchresult'); ?></h4>
                        </div>
                    </div>
                    <?php if (!empty($artikel)): ?>
                        <?php foreach ($artikel as $row) : ?>
                            <div class="col-lg-4 mb-3">
                                <div class="artikel-card position-relative d-flex flex-column h-100 mb-3">
                                    <a class="artikel-link" href="<?= base_url(
                                                                        $lang . '/' .
                                                                            ($lang === 'en' ? 'article' : 'artikel') . '/' .
                                                                            strtolower(str_replace(' ', '-', ($lang === 'en' ? $row['slug_kategori_en'] : $row['slug_kategori']))) . '/' .
                                                                            ($lang === 'en' ? $row['slug_en'] : $row['slug'])
                                                                    )  ?>">
                                        <?php
                                        // Set the default image path
                                        $defaultImage = base_url('assets-baru/img/error_logo.png');

                                        // Check if the article image exists, use the default image if it doesn't
                                        $imagePath = 'assets-baru/img/foto_artikel/' . $row['foto_artikel'];
                                        $imageToDisplay = file_exists(FCPATH . '/' . $imagePath) && !empty($row['foto_artikel']) ? base_url($imagePath) : $defaultImage;
                                        ?>

                                        <img class="img-fluid w-100" style="height: 150px; object-fit: cover; border-radius: 15px 15px 0 0;" src="<?= $imageToDisplay ?>" loading="lazy">

                                        <div class="bg-white border border-top-0 p-4 flex-grow-1">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2 
        <?= current_url() === base_url($lang . ($lang === 'en' ? '/categories/' : '/kategori/') .
                                ($lang === 'en' ? ($row['slug_kategori_en'] ?? '') : ($row['slug_kategori'] ?? ''))) ? 'active' : '' ?>"
                                                    href="<?= base_url($lang . ($lang === 'en' ? '/categories/' : '/kategori/') .
                                                                ($lang === 'en' ? ($row['slug_kategori_en'] ?? '') : ($row['slug_kategori'] ?? ''))) ?>">
                                                    <?= esc($lang === 'en' ? ($row['nama_kategori_en'] ?? 'Unknown Category') : ($row['nama_kategori'] ?? 'Unknown Category')) ?>
                                                </a>

                                            </div>
                                            <p class="text-body"><small><?= date('d F Y', strtotime($row['tgl_publish'])); ?></small></p>

                                            <?php
                                            // Check the current language
                                            $currentLang = session('lang');
                                            ?>

                                            <a class="h4 d-block mb-3 text-secondary font-weight-bold" href="<?= base_url(
                                                                                                                    $lang . '/' .
                                                                                                                        ($lang === 'en' ? 'article' : 'artikel') . '/' .
                                                                                                                        strtolower(str_replace(' ', '-', ($lang === 'en' ? $row['slug_kategori_en'] : $row['slug_kategori']))) . '/' .
                                                                                                                        ($lang === 'en' ? $row['slug_en'] : $row['slug'])
                                                                                                                ) ?>">
                                                <?php if ($currentLang === 'en'): ?>
                                                    <?= $row['judul_artikel_en']; ?>
                                                <?php else: ?>
                                                    <?= $row['judul_artikel']; ?>
                                                <?php endif; ?>
                                            </a>

                                            <p style="margin-bottom: -65px;">
                                                <?php if ($currentLang === 'en'): ?>
                                                    <?= substr(strip_tags($row['deskripsi_artikel_en']), 0, 100); ?>...
                                                <?php else: ?>
                                                    <?= substr(strip_tags($row['deskripsi_artikel']), 0, 100); ?>...
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4" style="border-radius: 0 0 15px 15px;">
                                            <!-- Optional footer for author and views -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <style>
                            /* Styling card article */
                            .artikel-card {
                                border-radius: 15px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                transition: transform 0.3s, box-shadow 0.3s;
                            }

                            .artikel-card:hover {
                                transform: translateY(-10px);
                                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                            }

                            /* Make the entire card a link */
                            .artikel-link {
                                display: block;
                                text-decoration: none;
                                color: inherit;
                            }

                            /* Views counter styling */
                            .views-counter {
                                color: #0091EA;
                                transition: color 0.3s;
                            }
                        </style>
                    <?php else : ?>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <div class="bg-white border border-top-0 p-4">
                                    <p>Tidak ada artikel terkait.</p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold"><?php echo lang('Blog.btnReadmore'); ?></h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <?php if (!empty($artikel)): ?>
                            <?php foreach ($artikel as $row) : ?>
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <?php
                                    // Set the default image path
                                    $defaultImage = base_url('assets-baru/img/error_logo1.png');

                                    // Check if the article image exists, use the default image if it doesn't
                                    $imagePath = 'assets-baru/img/foto_artikel/' . $row['foto_artikel'];
                                    $imageToDisplay = file_exists(FCPATH . '/' . $imagePath) && !empty($row['foto_artikel']) ? base_url($imagePath) : $defaultImage;
                                    ?>

                                    <img class="img-fluid" style="width: 110px; height: 110px; object-fit: cover;" src="<?= $imageToDisplay ?>" alt="" loading="lazy">

                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-1">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2 
        <?= current_url() === base_url($lang . ($lang === 'en' ? '/categories/' : '/kategori/') .
                                    ($lang === 'en' ? ($row['slug_kategori_en'] ?? '') : ($row['slug_kategori'] ?? ''))) ? 'active' : '' ?>"
                                                href="<?= base_url($lang . ($lang === 'en' ? '/categories/' : '/kategori/') .
                                                            ($lang === 'en' ? ($row['slug_kategori_en'] ?? '') : ($row['slug_kategori'] ?? ''))) ?>">
                                                <?= esc($lang === 'en' ? ($row['nama_kategori_en'] ?? 'Unknown Category') : ($row['nama_kategori'] ?? 'Unknown Category')) ?>
                                            </a>

                                        </div>

                                        <a class="h6 m-0 text-secondary font-weight-bold" href="<?= base_url(
                                                                                                    $lang . '/' .
                                                                                                        ($lang === 'en' ? 'article' : 'artikel') . '/' .
                                                                                                        strtolower(str_replace(' ', '-', ($lang === 'en' ? $row['slug_kategori_en'] : $row['slug_kategori']))) . '/' .
                                                                                                        ($lang === 'en' ? $row['slug_en'] : $row['slug'])
                                                                                                ) ?>">
                                            <?php if ($currentLang === 'en'): ?>
                                                <?= $row['judul_artikel_en']; ?>
                                            <?php else: ?>
                                                <?= $row['judul_artikel']; ?>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Tidak ada artikel terkait.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Popular News End -->

                <!-- Tags Start -->
                <?php
                // Pastikan variabel $lang sudah didefinisikan sebelumnya atau beri nilai default.
                $lang = $lang ?? 'id'; // Misalnya, 'id' sebagai default jika tidak ada bahasa yang dipilih.
                ?>

                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <div class="d-flex flex-wrap m-n1">
                            <?php
                            // Tentukan tags berdasarkan bahasa yang dipilih
                            $uniqueTags = [];

                            foreach ($artikel as $row) {
                                // Ambil tags berdasarkan bahasa yang dipilih
                                $tags = preg_split('/#/', $lang === 'en' ? $row['tags_en'] : $row['tags'], -1, PREG_SPLIT_NO_EMPTY);
                                foreach ($tags as $tag) {
                                    $trimmedTag = trim($tag);
                                    // Cek apakah tag sudah ada di array uniqueTags
                                    if (!in_array($trimmedTag, $uniqueTags)) {
                                        $uniqueTags[] = $trimmedTag;
                                    }
                                }
                            }

                            // Loop untuk menampilkan tags yang unik
                            foreach ($uniqueTags as $tag) : ?>
                                <a href="<?= base_url($lang === 'en' ? $lang . '/article/search?q=' . urlencode($tag) : $lang . '/artikel/search?q=' . urlencode($tag)) ?>"
                                    class="btn btn-sm btn-outline-secondary m-1">
                                    #<?= htmlspecialchars($tag) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>

                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<?= $this->endSection('content'); ?>