<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sifat_Surat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_sifat_surat', 'sifat');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/sifat-surat/index';
		$data['items'] = $this->sifat->get();
		$this->load->view('layouts/master', $data);
	}

	public function tambah()
	{
		$data['content'] = 'pages/sifat-surat/tambah';
		$this->load->view('layouts/master', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('sifat_surat', 'Sifat Surat', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/sifat-surat/tambah';
			$this->load->view('layouts/master', $data);
		} else {
			$this->sifat->create($this->input->post());
			$this->session->set_flashdata('success', 'Data Sifat Surat berhasil ditambahkan!');
			redirect('Sifat_Surat');
		}
	}

	public function edit($id_sifat_surat = NULL)
	{
		if (!$id_sifat_surat) {
			redirect('Sifat_Surat');
		}
		$sifat = $this->sifat->find($id_sifat_surat);
		if (!$sifat) {
			redirect('Sifat_Surat');
		}
		$data['content'] = 'pages/sifat-surat/edit';
		$data['item'] = $sifat;
		$this->load->view('layouts/master', $data);
	}

	public function update($id_sifat_surat = NULL)
	{
		$this->form_validation->set_rules('sifat_surat', 'Sifat Surat', 'required');
		if ($this->form_validation->run() == FALSE) {
			if (!$id_sifat_surat) {
				redirect('Sifat_Surat');
			}
			$sifat = $this->sifat->find($id_sifat_surat);
			if (!$sifat) {
				redirect('Sifat_Surat');
			}
			$data['content'] = 'pages/sifat-surat/edit';
			$data['item'] = $sifat;
			$this->load->view('layouts/master', $data);
		} else {
			$data = [
				'sifat_surat' => $this->input->post('sifat_surat')
			];
			$this->sifat->update($id_sifat_surat, $data);
			$this->session->set_flashdata('success','Data Sifat Surat berhasil disimpan!');
			redirect('Sifat_Surat');
		}
	}

	public function delete($id_sifat_surat = NULL)
	{
		$this->sifat->delete($id_sifat_surat);
		$this->session->set_flashdata('success','Data Sifat berhasil dihapus!');
		redirect('Sifat_Surat');
	}
}
