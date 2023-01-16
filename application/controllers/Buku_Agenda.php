<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_Agenda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_surat_masuk', 'surat_masuk');
		auth();
	}

	public function surat_masuk()
	{
		$data['content'] = 'pages/buku-agenda/surat_masuk';
		$data['items'] = $this->surat_masuk->get();
		$this->load->view('layouts/master', $data);
	}

}
