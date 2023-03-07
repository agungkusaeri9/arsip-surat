<section class="section">
	<div class="section-header">
		<h1>Buat Surat</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item "><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item active"><a href="<?= base_url('Surat') ?>">Surat</a></div>
			<div class="breadcrumb-item active">Buat</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('Surat/store') ?>" method="post">
							<div class="form-group">
								<label for="judul_surat">Judul</label>
								<input id="judul_surat" type="text" class="form-control <?php if (form_error('judul_surat')) : ?> is-invalid <?php endif; ?>" name="judul_surat" tabindex="1" autofocus>
								<?php if (form_error('judul_surat')) : ?>
									<div class="invalid-feedback">
										<?= form_error('judul_surat') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="nomor_surat">Nomor Surat</label>
								<input id="nomor_surat" type="text" class="form-control <?php if (form_error('nomor_surat')) : ?> is-invalid <?php endif; ?>" name="nomor_surat" tabindex="1" autofocus>
								<?php if (form_error('nomor_surat')) : ?>
									<div class="invalid-feedback">
										<?= form_error('nomor_surat') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="isi">Isi</label>
							<textarea name="isi" id="isi" cols="30" rows="5" class="form-control <?php if (form_error('isi')) : ?> is-invalid <?php endif; ?>"></textarea>
								<?php if (form_error('isi')) : ?>
									<div class="invalid-feedback">
										<?= form_error('isi') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="tempat_waktu">Tempat Waktu</label>
								<input id="tempat_waktu" type="text" class="form-control <?php if (form_error('tempat_waktu')) : ?> is-invalid <?php endif; ?>" name="tempat_waktu" tabindex="1" placeholder="Contoh : Kediri, 12 Desember 2023">
								<?php if (form_error('tempat_waktu')) : ?>
									<div class="invalid-feedback">
										<?= form_error('tempat_waktu') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group d-flex justify-content-between">
								<a href="<?= base_url('Surat') ?>" class="btn btn-warning">Kembali</a>
								<button class="btn btn-primary">Buat</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi');
</script>
