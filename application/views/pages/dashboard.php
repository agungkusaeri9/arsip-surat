<section class="section">
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-primary">
					<i class="far fa-user"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>User</h4>
					</div>
					<div class="card-body">
						<?= $count['user'] ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-danger">
					<i class="far fa-newspaper"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Surat Masuk</h4>
					</div>
					<div class="card-body">
						<?= $count['surat_masuk'] ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-warning">
					<i class="far fa-file"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Surat Keluar</h4>
					</div>
					<div class="card-body">
						<?= $count['surat_keluar'] ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-success">
					<i class="fas fa-circle"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Klasifikasi</h4>
					</div>
					<div class="card-body">
						<?= $count['klasifikasi'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>Laporan Surat Masuk dan Keluar (<?= Date('Y') ?>)</h4>
				</div>
				<div class="card-body">
					<canvas id="myChart2" height="100"></canvas>
				</div>
			</div>
		</div>
	</div>

</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	$(function() {
		$.ajax({
			url: '<?= base_url('Dashboard/chart') ?>',
			type: 'POST',
			dataType: 'JSON',
			async: false,
			success: function(data) {
				console.log(data);
				let month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
				const ctx2 = document.getElementById('myChart2');
				new Chart(ctx2, {
					type: 'bar',
					data: {
						labels: month,
						datasets: [{
								label: 'Surat Masuk',
								data: data.surat_masuk,
								borderWidth: 1
							},
							{
								label: 'Surat Keluar',
								data: data.surat_keluar,
								borderWidth: 1
							}
						]
					},
					options: {
							scales: {
								y: {
									ticks: {
										stepSize: 1,
										// Include a dollar sign in the ticks
										callback: function(value, index, ticks) {
											return parseInt(value);
										}
									}
								}
							}
						}
				});
			}
		})
	})
</script>
