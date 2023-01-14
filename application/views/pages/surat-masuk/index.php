<section class="section">
	<div class="section-header">
		<h1>Data Surat Masuk</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item">Data Surat Masuk</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<a href="<?= base_url('Surat_Masuk/tambah') ?>" class="btn  btn-primary mb-3">Tambah Data</a>
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
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach($items as $item) : ?>
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
											<?php if($item->file) : ?>
												<a href="<?= base_url('Surat_Masuk/download/' . $item->id_surat_masuk) ?>" class="btn btn-success">Download</a>
											<?php else: ?>
												<a href="javascript:void(0)" class="btn btn-secondary">Tidak Ada</a>
											<?php endif; ?>
										</td>
										<td>
										<a href="" class="btn btn-warning">Disposisi</a>
											<a href="<?= base_url('Surat_Masuk/edit/')  . $item->id_surat_masuk ?>" class="btn  btn-info">Edit</a>
											<form action="javascript:void(0)" method="post" class="d-inline" id="formDelete">
												<button class="btn btnDelete btn-danger" data-url="<?= base_url('Surat_Masuk/delete/' . $item->id_surat_masuk) ?>">Hapus</button>
											</form>
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
