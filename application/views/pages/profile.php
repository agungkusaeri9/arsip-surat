<section class="section">
	<div class="section-header">
		<h1>Profile</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
			<div class="breadcrumb-item">Profile</div>
		</div>
	</div>
	<div class="section-body">
		<h2 class="section-title">Hi, <?= $this->session->userdata('username') ?></h2>
		<p class="section-lead">
			Change information about yourself on this page.
		</p>

		<div class="row mt-sm-4">
			<div class="col-12 col-md-12">
				<div class="card">
					<form method="post" class="needs-validation" action="<?= base_url('profile/update') ?>">
						<div class="card-header">
							<h4>Edit Profile</h4>
						</div>
						<div class="card-body">
							<div class="form-group ">
								<label>Nama</label>
								<input id="nama" type="text" class="form-control <?php if (form_error('nama')) : ?> is-invalid <?php endif; ?>" name="nama" tabindex="1" value="<?= $this->session->userdata('nama') ?>">
								<?php if (form_error('nama')) : ?>
									<div class="invalid-feedback">
										<?= form_error('nama') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group ">
								<label>Username</label>
								<input id="username" type="text" class="form-control <?php if (form_error('username')) : ?> is-invalid <?php endif; ?>" name="username" tabindex="1" value="<?= $this->session->userdata('username') ?>" readonly>
								<?php if (form_error('username')) : ?>
									<div class="invalid-feedback">
										<?= form_error('username') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group ">
								<label>Gambar</label>
								<input id="gambar" type="file" class="form-control <?php if (form_error('gambar')) : ?> is-invalid <?php endif; ?>" name="gambar" tabindex="1" value="<?= $this->session->userdata('gambar') ?>">
										<?php if (form_error('gambar')) : ?>
											<div class="invalid-feedback">
												<?= form_error('gambar') ?>
											</div>
										<?php endif; ?>
							</div>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
