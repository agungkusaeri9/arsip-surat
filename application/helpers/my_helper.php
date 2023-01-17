<?php

use Dompdf\Dompdf;

function gambar_profile()
{
	$ci = get_instance();
	$gambar = $ci->session->userdata('gambar');

	if($gambar)
	{
		return base_url('uploads/user/') . $gambar;
	}else{
		return base_url('assets/img/avatar/avatar-1.png');
	}
}

function generatePdfSuratMasuk($html,$nama_file = "document", $attachment = FALSE)
{
	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'landscape');

	// Render the HTML as PDF
	$dompdf->render();
	
	// Output the generated PDF to Browser
	$dompdf->stream($nama_file,['Attachment' => $attachment]);
}

function generatePdfSuratKeluar($html,$nama_file = "document", $attachment = FALSE)
{
	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'landscape');

	// Render the HTML as PDF
	$dompdf->render();
	
	// Output the generated PDF to Browser
	$dompdf->stream($nama_file,['Attachment' => $attachment]);
}
