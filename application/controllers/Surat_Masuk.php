<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Masuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_surat_masuk', 'surat_masuk');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/surat-masuk/index';
		$data['items'] = $this->surat_masuk->get();
		$this->load->view('layouts/master', $data);
	}

}
