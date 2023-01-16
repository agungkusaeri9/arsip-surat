<section class="section">
	<div class="section-header">
		<h1>Data Disposisi Surat</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item">Data Disposisi Surat</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h6 class="mb-3">Detail Surat Masuk</h6>
						<ul class="list-inline">
							<li class="list-inline-item mb-2 d-flex justify-content-between">
								<span>No. Agenda</span>
								<span><?= $surat_masuk->no_agenda ?></span>
							</li>
							
							<li class="list-inline-item mb-2 d-flex justify-content-between">
								<span>Pengirim</span>
								<span><?= $surat_masuk->pengirim ?></span>
							</li>
							
							<li class="list-inline-item mb-2 d-flex justify-content-between">
								<span>No Surat</span>
								<span><?= $surat_masuk->no_surat ?></span>
							</li>

							<li class="list-inline-item mb-2 d-flex justify-content-between">
								<span>Tanggal Surat</span>
								<span><?= $surat_masuk->tanggal_surat ?></span>
							</li>

							<li class="list-inline-item mb-2 d-flex justify-content-between">
								<span>Tanggal Diterima</span>
								<span><?= $surat_masuk->tanggal_diterima ?></span>
							</li>
							
							<li class="list-inline-item mb-2 d-flex justify-content-between">
								
							</li>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<a href="<?= base_url('Disposisi/tambah/' . $surat_masuk->id_surat_masuk) ?>" class="btn  btn-primary mb-3">Tambah Data</a>
						<div class="table-responsive">
							<table class="table table-hover" id="dTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Tujuan</th>
										<th>Isi</th>
										<th>Catatan</th>
										<th>Sifat</th>
										<th>Batas Waktu</th>
										<th style="min-width: 120px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach($items as $item) : ?>
									 <tr>
										 <td><?= $i++; ?></td>
										<td><?= $item->klasifikasi . ' - ' . $item->jabatan ?></td>
										<td><?= $item->isi ?></td>
										<td><?= $item->catatan ?></td>
										<td><?= $item->sifat ?></td>
										<td><?= $item->batas_waktu ?></td>
										<td>
											<a href="<?= base_url('Disposisi/edit/')  . $item->id_disposisi . '/' . $item->id_surat_masuk ?>" class="btn  btn-info">Edit</a>
											<form action="javascript:void(0)" method="post" class="d-inline" id="formDelete">
												<button class="btn btnDelete btn-danger" data-url="<?= base_url('Disposisi/delete/' . $item->id_disposisi) ?>">Hapus</button>
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
