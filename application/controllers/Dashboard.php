<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_surat_masuk', 'surat_masuk');
		$this->load->model('M_surat_keluar', 'surat_keluar');
		$this->load->model('M_klasifikasi', 'klasifikasi');
		$this->load->model('M_user', 'user');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/dashboard';
		$data['count'] = [
			'surat_masuk' => $this->surat_masuk->count(),
			'surat_keluar' => $this->surat_keluar->count(),
			'klasifikasi' => $this->klasifikasi->count(),
			'file_surat_masuk' => $this->surat_masuk->countFile(),
			'file_surat_keluar' => $this->surat_keluar->countFile(),
			'user' => $this->user->count()
		];
		$this->load->view('layouts/master', $data);
	}

	public function chart()
	{
		$surat_masuk = [
			$this->surat_masuk->getChart(1),
			$this->surat_masuk->getChart(2),
			$this->surat_masuk->getChart(3),
			$this->surat_masuk->getChart(4),
			$this->surat_masuk->getChart(5),
			$this->surat_masuk->getChart(6),
			$this->surat_masuk->getChart(7),
			$this->surat_masuk->getChart(8),
			$this->surat_masuk->getChart(9),
			$this->surat_masuk->getChart(10),
			$this->surat_masuk->getChart(11),
			$this->surat_masuk->getChart(12)
		];

		$surat_keluar = [
			$this->surat_keluar->getChart(1),
			$this->surat_keluar->getChart(2),
			$this->surat_keluar->getChart(3),
			$this->surat_keluar->getChart(4),
			$this->surat_keluar->getChart(5),
			$this->surat_keluar->getChart(6),
			$this->surat_keluar->getChart(7),
			$this->surat_keluar->getChart(8),
			$this->surat_keluar->getChart(9),
			$this->surat_keluar->getChart(10),
			$this->surat_keluar->getChart(11),
			$this->surat_keluar->getChart(12)
		];
		// $surat_keluar = $this->surat_keluar->getChart();
		$data = [
			'surat_masuk' => $surat_masuk,
			'surat_keluar' => $surat_keluar
		];
		echo json_encode($data);
	}
}
