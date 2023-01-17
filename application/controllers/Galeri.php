<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_surat_masuk', 'surat_masuk');
		$this->load->model('M_surat_keluar', 'surat_keluar');
		auth();
	}

	public function index()
	{
		$tipe = $this->input->post('tipe');
		if ($this->input->post()) {
		
			if ($tipe === 'surat_masuk') {
				$itm = $this->surat_masuk->filter($arr = [
					'file !=' => ''
				]);
			} else {
				$itm = $this->surat_keluar->filter($arr = [
					'file !=' => ''
				]);
			}
		}else{
			$itm = $this->surat_masuk->filter($arr = [
				'file !=' => ''
			]);
			$tipe = 'surat_masuk';
		}
		// var_dump($itm);die;
		$data['content'] = 'pages/galeri/index';
		$data['items'] = $itm;
		$data['tipe'] = $tipe;
		$this->load->view('layouts/master', $data);
	}
}
