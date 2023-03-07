<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cetak Surat <?= $item->judul_surat ?></title>
	<style>
		body {
			padding: 10px 50px;
		}

		.tengah {
			text-align: center;
			line-height: 5px;
		}

		table.kop-surat {
			border-bottom: 5px solid #000;
			padding: 2px;
		}

		.isi {
			font-size: 12px !important;
		}
	</style>
</head>

<body onload="window.print()">
	<table class="kop-surat" width="100%">
		<tr>
			<td>
				<img src="<?= base_url('assets/img/logo-sd.png') ?>" width="120px" />
			</td>
			<td class="tengah">
				<h3>PEMERINTAH KABUPATEN KEDIRI</h3>
				<h3>DINAS PENDIDIKAN</h3>
				<h3>SEKOLAH DASAR NEGERI KALIPANG 4</h3>
				<div>
					Dusun Krampyang Desa Kalipang Kecamatan Grogol <br>
					<div style="margin-top:10px">
						Email : sdnegerikalipang4@gmail.com
					</div>
				</div>
				<div style="text-align:right;margin-top:20px;">
					Kode Pos : 64151
				</div>
				<div style="text-align:center;margin-top:20px;margin-bottom:10px;">
					KEDIRI
				</div>
			</td>
		</tr>
	</table>
	<div style="text-align:center">
		<h3 style="font-weight:700"><?= $item->judul_surat ?></h3>
		<h4 style="font-weight:500;text-decoration:underline">No Surat : <?= $item->nomor_surat ?></h4>
	</div>
	<div class="isi">
		<?= $item->isi ?>
	</div>

	<table style="margin-top:30px;">
		<tr>
			<td style="width:65%"></td>
			<td style="justify-content:end">
				<div>
					<?= $item->tempat_waktu ?>
				</div>
				<div>
				Kepala SDN Kalipang 4
				</div>
				<br><br><br><br><br>
				<div style="text-decoration:underline">
				DIDIK KRISDIANTO,S.Pd.SD
				</div>
				<div>
				NIP.19810508 201001 1 021
				</div>
			</td>
		</tr>
	</table>
</body>

</html>
