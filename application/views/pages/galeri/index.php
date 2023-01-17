<section class="section">
	<div class="section-header">
		<h1>Galeri File</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item">Galeri File</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h6>Filter Data</h6>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group row">
										<label for="from_date" class="col-sm-2 col-form-label">Tipe</label>
										<div class="col-sm-10">
											<select name="tipe" id="tipe" class="form-control">
												<option <?php if ($tipe === 'surat_masuk') : ?> selected <?php endif; ?> value="surat_masuk">Surat Masuk</option>
												<option <?php if ($tipe === 'surat_keluar') : ?> selected <?php endif; ?> value="surat_keluar">Surat Keluar</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-1">
									<button class="btn btn-block py-2 btn-info">Filter</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($items as $item) : ?>
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<img src="<?= base_url() ?>/assets/img/icon-pdf.svg" class="img-fluid" alt="" style="max-height:320px;width:100%">
							<h4 class="my-3"><?= $item->pengirim ?></h4>
							<p><?= $item->isi ?></p>
							<?php if ($tipe === 'surat_masuk') : ?>
								<div class="d-flex justify-content-between">
									<a href="<?= base_url() ?>uploads/surat_masuk/<?= $item->file ?>" class="btn px-4 btn-info" target="_blank">Preview</a>
									<a href="<?= base_url('Surat_Masuk/download/') ?><?= $item->id_surat_masuk ?>" class="btn px-4 btn-success" target="_blank">Donwload</a>
								</div>
							<?php else : ?>
								<div class="d-flex justify-content-between">
									<a href="<?= base_url() ?>uploads/surat_keluar/<?= $item->file ?>" class="btn px-4 btn-info" target="_blank">Preview</a>
									<a href="<?= base_url('Surat_Keluar/download/') ?><?= $item->id_surat_keluar ?>" class="btn px-4 btn-success" target="_blank">Donwload</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
