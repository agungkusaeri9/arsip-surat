<section class="section">
	<div class="section-header">
		<h1>Data Surat</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item">Data Surat</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<a href="<?= base_url('Surat/tambah') ?>" class="btn  btn-primary mb-3">Buat Surat</a>
						<div class="table-responsive">
							<table class="table nowrap table-hover" id="dTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Nomor Surat</th>
										<th>Tanggal Dibuat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach($items as $item) : ?>
									 <tr>
										 <td><?= $i++; ?></td>
										<td><?= $item->judul_surat ?></td>
										<td><?= $item->nomor_surat ?></td>
										<td><?= $item->tanggal_dibuat ?></td>
										<td>
											<a href="<?= base_url('Surat/print/')  . $item->id_surat ?>" target="_blank" class="btn  btn-secondary">Cetak</a>
											<a href="<?= base_url('Surat/edit/')  . $item->id_surat ?>" class="btn  btn-info">Edit</a>
											<form action="javascript:void(0)" method="post" class="d-inline" id="formDelete">
												<button class="btn btnDelete btn-danger" data-url="<?= base_url('Surat/delete/' . $item->id_surat) ?>">Hapus</button>
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
