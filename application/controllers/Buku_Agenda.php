<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_Agenda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_surat_masuk', 'surat_masuk');
		$this->load->model('M_surat_keluar', 'surat_keluar');
		$this->load->model('M_sifat_surat', 'sifat_surat');
		auth();
	}

	public function surat_masuk()
	{
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');

		if ($this->input->post()) {
			if($from_date && $to_date)
			{
				$arr = [
					'tanggal_surat >=' => $from_date,
					'tanggal_surat <=' => $to_date
				];
				
			}elseif($from_date && !$to_date)
			{
				$arr = [
					'tanggal_surat' => $from_date
				];
			}else{
				$arr = [
					'id_surat_masuk != ' => NULL,
				];
			}
			$data['items'] = $this->surat_masuk->filter($arr);
		}else{
			$data['items'] = [];
		}
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		$data['content'] = 'pages/buku-agenda/surat_masuk';
		$data['sifat_surat'] = $this->sifat_surat->get();
		$this->load->view('layouts/master', $data);
	}

	public function surat_keluar()
	{
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');

		if ($this->input->post()) {
			if($from_date && $to_date)
			{
				$arr = [
					'tanggal_surat >=' => $from_date,
					'tanggal_surat <=' => $to_date
				];
				
			}elseif($from_date && !$to_date)
			{
				$arr = [
					'tanggal_surat' => $from_date
				];
			}else{
				$arr = [
					'id_surat_keluar != ' => NULL,
				];
			}
			$data['items'] = $this->surat_keluar->filter($arr);
		}else{
			$data['items'] = [];
		}
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		$data['content'] = 'pages/buku-agenda/surat_keluar';
		$data['sifat_surat'] = $this->sifat_surat->get();
		$this->load->view('layouts/master', $data);
	}
}
