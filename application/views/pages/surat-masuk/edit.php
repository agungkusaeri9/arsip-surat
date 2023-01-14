<section class="section">
	<div class="section-header">
		<h1>Edit Surat Masuk</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item "><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item active"><a href="<?= base_url('Surat_Masuk') ?>">Surat Masuk</a></div>
			<div class="breadcrumb-item active">Edit</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
					<form action="<?= base_url('Surat_Masuk/update/' . $item->id_surat_masuk) ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_surat_masuk" value="<?= $item->id_surat_masuk ?>">
							<div class="form-group">
								<label for="no_agenda">No. Agenda</label>
								<input id="no_agenda" type="number" class="form-control <?php if (form_error('no_agenda')) : ?> is-invalid <?php endif; ?>" name="no_agenda" tabindex="1" required value="<?= $item->no_agenda ?>">
								<?php if (form_error('no_agenda')) : ?>
									<div class="invalid-feedback">
										<?= form_error('no_agenda') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="pengirim">Pengirim</label>
								<input id="pengirim" type="text" class="form-control <?php if (form_error('pengirim')) : ?> is-invalid <?php endif; ?>" name="pengirim" tabindex="1" required value="<?= $item->pengirim ?>">
								<?php if (form_error('pengirim')) : ?>
									<div class="invalid-feedback">
										<?= form_error('pengirim') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="no_surat">No. Surat</label>
								<input id="no_surat" type="text" class="form-control <?php if (form_error('no_surat')) : ?> is-invalid <?php endif; ?>" name="no_surat" tabindex="1" required value="<?= $item->no_surat ?>">
								<?php if (form_error('no_surat')) : ?>
									<div class="invalid-feedback">
										<?= form_error('no_surat') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="isi">Isi</label>
								<textarea name="isi" id="isi" cols="30" rows="5"class="form-control <?php if (form_error('isi')) : ?> is-invalid <?php endif; ?>"><?= $item->isi ?></textarea>
								<?php if (form_error('isi')) : ?>
									<div class="invalid-feedback">
										<?= form_error('isi') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="tanggal_surat">Tanggal Surat</label>
								<input id="tanggal_surat" type="date" class="form-control <?php if (form_error('tanggal_surat')) : ?> is-invalid <?php endif; ?>" name="tanggal_surat" tabindex="1" required value="<?= $item->tanggal_surat ?>">
								<?php if (form_error('tanggal_surat')) : ?>
									<div class="invalid-feedback">
										<?= form_error('tanggal_surat') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="tanggal_diterima">Tanggal Diterima</label>
								<input id="tanggal_diterima" type="date" class="form-control <?php if (form_error('tanggal_diterima')) : ?> is-invalid <?php endif; ?>" name="tanggal_diterima" tabindex="1" required value="<?= $item->tanggal_diterima ?>">
								<?php if (form_error('tanggal_diterima')) : ?>
									<div class="invalid-feedback">
										<?= form_error('tanggal_diterima') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<textarea name="keterangan" id="keterangan" cols="30" rows="5"class="form-control <?php if (form_error('keterangan')) : ?> is-invalid <?php endif; ?>"><?= $item->keterangan ?></textarea>
								<?php if (form_error('keterangan')) : ?>
									<div class="invalid-feedback">
										<?= form_error('keterangan') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="file">File</label>
								<input id="file" type="file" class="form-control <?php if (form_error('file')) : ?> is-invalid <?php endif; ?>" name="file" tabindex="1" >
								<?php if (form_error('file')) : ?>
									<div class="invalid-feedback">
										<?= form_error('file') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group d-flex justify-content-between">
								<a href="<?= base_url('Surat_Masuk') ?>" class="btn btn-warning">Kembali</a>
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
