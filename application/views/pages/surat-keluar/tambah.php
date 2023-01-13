<section class="section">
	<div class="section-header">
		<h1>Tambah User</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item "><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item active"><a href="<?= base_url('Sifat_Surat') ?>">User</a></div>
			<div class="breadcrumb-item active">Tambah</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('Sifat_Surat/store') ?>" method="post">
							<div class="form-group">
								<label for="sifat_surat">Sifat Surat</label>
								<input id="sifat_surat" type="text" class="form-control <?php if (form_error('sifat_surat')) : ?> is-invalid <?php endif; ?>" name="sifat_surat" tabindex="1" autofocus>
								<?php if (form_error('sifat_surat')) : ?>
									<div class="invalid-feedback">
										<?= form_error('sifat_surat') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group d-flex justify-content-between">
								<a href="<?= base_url('Sifat_Surat') ?>" class="btn btn-warning">Kembali</a>
								<button class="btn btn-primary">Tambah</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
</section>
