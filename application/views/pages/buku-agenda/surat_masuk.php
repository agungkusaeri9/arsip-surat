<section class="section">
	<div class="section-header">
		<h1>Buku Agenda Surat Masuk</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item">Buku Agenda Surat Masuk</div>
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
										<label for="from_date" class="col-sm-2 col-form-label">Dari</label>
										<div class="col-sm-10">
											<input type="date" class="form-control" id="from_date" name="from_date" <?php if($from_date) : ?>
											value="<?= $from_date ?>"
											<?php endif; ?>>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group row">
										<label for="to_date" class="col-sm-3 col-form-label">Sampai</label>
										<div class="col-sm-9">
											<input type="date" class="form-control" id="to_date" name="to_date" <?php if($to_date) : ?>
											value="<?= $to_date ?>"
											<?php endif; ?>>
										</div>
									</div>
								</div>
								<div class="col-md-1">
									<button class="btn btn-block py-2 btn-info">Filter</button>
								</div>
								<?php if($from_date || $to_date) : ?>
									<div class="col-md-1">
									<a href="<?= base_url('Surat_Masuk/print') ?>?from_date=<?= $from_date ?>&&to_date=<?= $to_date ?>" class="btn btn-block py-2 btn-danger mb-3"><i class="fas fa-print"></i> PDF</a>
									</div>
								<?php endif; ?>
								<?php if($from_date || $to_date) : ?>
									<div class="col-md-1">
									<a href="<?= base_url('Surat_Masuk/excel') ?>?from_date=<?= $from_date ?>&&to_date=<?= $to_date ?>" class="btn btn-block py-2 btn-info mb-3"><i class="fas fa-file-excel"></i> Excel</a>
									</div>
								<?php endif; ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dTable">
								<thead>
									<tr>
										<th>No</th>
										<th>No Agenda</th>
										<th>Pengirim</th>
										<th>No Surat</th>
										<th>Isi</th>
										<th>Tanggal Surat</th>
										<th>Tanggal Diterima</th>
										<th>Keterangan</th>
										<th>File</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($items as $item) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $item->no_agenda ?></td>
											<td><?= $item->pengirim ?></td>
											<td><?= $item->no_surat ?></td>
											<td><?= $item->isi ?></td>
											<td><?= $item->tanggal_surat ?></td>
											<td><?= $item->tanggal_diterima ?></td>
											<td><?= $item->keterangan ?></td>
											<td>
												<?php if ($item->file) : ?>
													<a href="<?= base_url('Surat_Masuk/download/' . $item->id_surat_masuk) ?>" class="btn btn-success">Download</a>
												<?php else : ?>
													<a href="javascript:void(0)" class="btn btn-secondary">Tidak Ada</a>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
