<section class="section">
	<div class="section-header">
		<h1>Edit Disposisi</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item "><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item active"><a href="<?= base_url('Disposisi/surat_masuk',$id_surat_masuk) ?>">Disposisi</a></div>
			<div class="breadcrumb-item active">Edit</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('Disposisi/update/' . $disposisi->id_disposisi . '/' . $id_surat_masuk) ?>" method="post">
							<div class="form-group">
								<label for="id_klasifikasi">Tujuan</label>
								<select name="id_klasifikasi" id="id_klasifikasi" class="form-control <?php if (form_error('id_klasifikasi')) : ?> is-invalid <?php endif; ?>">
									<option value="" selected disabled>Pilih Tujuan</option>
									<?php foreach($klasifikasi as $klas) : ?>
									<option <?php if($klas->id_klasifikasi == $disposisi->id_klasifikasi) : ?>
									selected
									<?php endif; ?> value="<?= $klas->id_klasifikasi ?>"><?= $klas->nama . ' - ' . $klas->jabatan ?></option>
									<?php endforeach; ?>
								</select>
								<?php if (form_error('id_klasifikasi')) : ?>
									<div class="invalid-feedback">
										<?= form_error('id_klasifikasi') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="id_sifat_surat">Sifat Surat</label>
								<select name="id_sifat_surat" id="id_sifat_surat" class="form-control <?php if (form_error('id_sifat_surat')) : ?> is-invalid <?php endif; ?>">
									<option value="" selected disabled>Pilih Sifat Surat</option>
									<?php foreach($sifat_surat as $sifat) : ?>
									<option <?php if($sifat->id_sifat_surat == $disposisi->id_sifat_surat) : ?>
									selected
									<?php endif; ?> value="<?= $sifat->id_sifat_surat ?>"><?= $sifat->sifat_surat ?></option>
									<?php endforeach; ?>
								</select>
								<?php if (form_error('id_sifat_surat')) : ?>
									<div class="invalid-feedback">
										<?= form_error('id_sifat_surat') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="catatan">Catatan</label>
								<textarea name="catatan" id="catatan" cols="30" rows="5"class="form-control <?php if (form_error('catatan')) : ?> is-invalid <?php endif; ?>"><?= $disposisi->catatan ?></textarea>
								<?php if (form_error('catatan')) : ?>
									<div class="invalid-feedback">
										<?= form_error('catatan') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="isi">Isi</label>
								<textarea name="isi" id="isi" cols="30" rows="5"class="form-control <?php if (form_error('isi')) : ?> is-invalid <?php endif; ?>"><?= $disposisi->isi ?></textarea>
								<?php if (form_error('isi')) : ?>
									<div class="invalid-feedback">
										<?= form_error('isi') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="batas_waktu">Batas Waktu</label>
								<input id="batas_waktu" type="date" class="form-control <?php if (form_error('batas_waktu')) : ?> is-invalid <?php endif; ?>" name="batas_waktu" tabindex="1" value="<?= $disposisi->batas_waktu ?>">
								<?php if (form_error('batas_waktu')) : ?>
									<div class="invalid-feedback">
										<?= form_error('batas_waktu') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group d-flex justify-content-between">
								<a href="<?= base_url('Disposisi/surat_masuk/' . $id_surat_masuk) ?>" class="btn btn-warning">Kembali</a>
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
