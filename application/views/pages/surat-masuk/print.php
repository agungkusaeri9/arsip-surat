<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Surat Masuk</title>
	<style>
		body{
			font-size: 12px;
		}
		table{
			width: 100%;
		}
		.styled-table {
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			font-family: sans-serif;
			min-width: 400px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		.styled-table thead tr {
			background-color: #000000;
			color: #ffffff;
			text-align: left;
		}

		.styled-table th,
		.styled-table td {
			padding: 12px 15px;
		}

		.styled-table tbody tr {
			border-bottom: 1px solid #dddddd;
		}

		.styled-table tbody tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}

		.styled-table tbody tr:last-of-type {
			border-bottom: 2px solid #000000;
		}

		.styled-table tbody tr.active-row {
			font-weight: bold;
			color: #000000;
		}
	</style>
</head>

<body>
	<h3 style="text-align: center;">Laporan Surat Masuk</h3>
	<table class="styled-table">
		<thead>
			<tr>
				<th>No</th>
				<th>No. Agenda</th>
				<th>No. Surat</th>
				<th>Pengirim</th>
				<th>Isi</th>
				<th>Tanggal Surat</th>
				<th>Tanggal Diterima</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
			foreach ($items as $item) : ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $item->no_agenda ?></td>
					<td><?= $item->no_surat ?></td>
					<td><?= $item->pengirim ?></td>
					<td><?= $item->isi ?></td>
					<td><?= $item->tanggal_surat ?></td>
					<td><?= $item->tanggal_diterima ?></td>
					<td><?= $item->keterangan ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>


</body>

</html>
