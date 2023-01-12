<section class="section">
	<div class="section-header">
		<h1>Data Klasifikasi</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item">Data Klasifikasi</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<a href="<?= base_url('Klasifikasi/tambah') ?>" class="btn  btn-primary mb-3">Tambah Data</a>
						<div class="table-responsive">
							<table class="table table-hover" id="dTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach($items as $item) : ?>
									 <tr>
										 <td><?= $i++; ?></td>
										<td><?= $item->nama ?></td>
										<td><?= $item->jabatan ?></td>
										<td>
											<a href="<?= base_url('Klasifikasi/edit/')  . $item->id_klasifikasi ?>" class="btn  btn-info">Edit</a>
											<form action="javascript:void(0)" method="post" class="d-inline" id="formDelete">
												<button class="btn btnDelete btn-danger" data-url="<?= base_url('Klasifikasi/delete/' . $item->id_klasifikasi) ?>">Hapus</button>
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
