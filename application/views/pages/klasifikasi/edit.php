<section class="section">
	<div class="section-header">
		<h1>Edit Klasifikasi</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item "><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item active"><a href="<?= base_url('Klasifikasi') ?>">Klasifikasi</a></div>
			<div class="breadcrumb-item active">Edit</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('Klasifikasi/update/' . $item->id_klasifikasi) ?>" method="post">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input id="nama" type="text" class="form-control <?php if (form_error('nama')) : ?> is-invalid <?php endif; ?>" name="nama" tabindex="1" autofocus value="<?= $item->nama ?>">
								<?php if (form_error('nama')) : ?>
									<div class="invalid-feedback">
										<?= form_error('nama') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="jabatan">Jabatan</label>
								<input id="jabatan" type="text" class="form-control <?php if (form_error('jabatan')) : ?> is-invalid <?php endif; ?>" name="jabatan" tabindex="1" autofocus value="<?= $item->jabatan ?>">
								<?php if (form_error('jabatan')) : ?>
									<div class="invalid-feedback">
										<?= form_error('jabatan') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group d-flex justify-content-between">
								<a href="<?= base_url('Klasifikasi') ?>" class="btn btn-warning">Kembali</a>
								<button class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
</section>
