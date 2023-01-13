<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Keluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_surat_keluar', 'surat_keluar');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/surat-keluar/index';
		$data['items'] = $this->surat_keluar->get();
		$this->load->view('layouts/master', $data);
	}

	public function tambah()
	{
		$data['content'] = 'pages/surat-keluar/tambah';
		$this->load->view('layouts/master', $data);
	}

}
