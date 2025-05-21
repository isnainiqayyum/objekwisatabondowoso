<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		<h1 class="app-page-title">Tentang</h1>
		<div class="row gy-4">
			<div class="col-12 col-lg-6 mb-4">
				<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start mb-4 mt-4">
					<div class="app-card-body px-4 w-100">

						<?php if (!empty(session()->getFlashdata('error'))) : ?>
							<div class="alert alert-danger" role="alert">
								<h4>Error</h4>
								<p><?= session()->getFlashdata('error'); ?></p>
							</div>
						<?php endif; ?>

						<form action="<?= base_url('admin/tentang/edit'); ?>" method="post" enctype="multipart/form-data">
							<?= csrf_field() ?>
							<div class="mb-3">
								<label for="nama_tentang" class="form-label mt-4">Nama Tentang</label>
								<input type="text" class="form-control" id="nama_tentang" name="nama_tentang" value="<?= esc($tentang_pengguna->nama_tentang ?? '') ?>">
							</div>
							<div class="mb-3">
								<label for="slogan" class="form-label mt-4">Slogan</label>
								<input type="text" class="form-control" id="slogan" name="slogan" value="<?= esc($tentang_pengguna->slogan ?? '') ?>">
							</div>
							<div class="mb-3">
								<label for="deskripsi_tentang" class="form-label">Deskripsi Tentang</label>
								<textarea class="form-control tiny" id="deskripsi_tentang" name="deskripsi_tentang" rows="5"><?= esc($tentang_pengguna->deskripsi_tentang ?? '') ?></textarea>
							</div>
							<div class="mb-3">
								<label for="deskripsi_tentang_en" class="form-label">Deskripsi Tentang (English)</label>
								<textarea class="form-control tiny" id="deskripsi_tentang_en" name="deskripsi_tentang_en" rows="5"><?= esc($tentang_pengguna->deskripsi_tentang_en ?? '') ?></textarea>
							</div>
							<div class="mb-3">
								<label for="footer" class="form-label mt-4">Footer</label>
								<input type="text" class="form-control" id="footer" name="footer" value="<?= esc($tentang_pengguna->footer ?? '') ?>">
								<small>*Template ini gratis selama Anda tetap menyimpan credit link/attribution link/backlink penulis footernya. Jika Anda ingin menggunakan templat tanpa tautan kredit/tautan atribusi/tautan balik penulis footer, Anda dapat membeli Lisensi Penghapusan Kredit dari <a href="https://htmlcodex.com/credit-removal">htmlcodex.com</a>. Terima kasih atas dukungan Anda.</small>
							</div>
							<div class="mb-3">
								<label for="username" class="form-label mt-4">User Name</label>
								<input type="text" class="form-control" id="username" name="username" value="<?= esc($tentang_pengguna->username ?? '') ?>">
								<small class="text-muted">* Jika Anda merubah username, silakan login kembali.</small>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label mt-4">Password</label>
								<input type="text" class="form-control" id="password" name="password" value="<?= esc($tentang_pengguna->password ?? '') ?>">
							</div>
							<div class="mb-3">
								<label for="foto_tentang" class="form-label">Foto Tentang</label>
								<input type="hidden" name="old_foto_tentang" value="<?= esc($tentang_pengguna->foto_tentang ?? '') ?>">
								<input type="file" class="form-control" id="foto_tentang" name="foto_tentang">
								<?php if (!empty($tentang_pengguna->foto_tentang) && file_exists(FCPATH . 'assets-baru/img/bondowoso.jpg' . $tentang_pengguna->foto_tentang)) : ?>
									<img width="150px" class="img-thumbnail mt-2" src="<?= base_url('assets-baru/img/bondowoso.jpg' . $tentang_pengguna->foto_tentang); ?>">
								<?php endif; ?>
							</div>
							<div class="mt-4">
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div><!--//app-card-body-->
				</div><!--//app-card-->
			</div><!--//col-->
		</div><!--//row-->
	</div><!--//container-xl-->
</div><!--//app-content-->

<?= $this->endSection() ?>
