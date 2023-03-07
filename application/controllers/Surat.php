<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_surat', 'surat');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/surat/index';
		$data['items'] = $this->surat->get();
		$this->load->view('layouts/master', $data);
	}

	public function tambah()
	{
		$data['content'] = 'pages/surat/tambah';
		$this->load->view('layouts/master', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('judul_surat', 'Judul', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('tempat_waktu', 'Tempat Waktu', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/surat/tambah';
			$this->load->view('layouts/master', $data);
		} else {

			$input = [
				'judul_surat' => $this->input->post('judul_surat'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'isi' => $this->input->post('isi'),
				'tempat_waktu' => $this->input->post('tempat_waktu'),
			];
			$this->surat->create($input);
			$this->session->set_flashdata('success', 'Data surat berhasil ditambahkan!');
			redirect('Surat');
		}
	}

	public function edit($id_surat = NULL)
	{
		if (!$id_surat) {
			redirect('Surat');
		}
		$surat = $this->surat->find($id_surat);
		if (!$surat) {
			redirect('Surat');
		}
		$data['content'] = 'pages/surat/edit';
		$data['item'] = $surat;
		$this->load->view('layouts/master', $data);
	}

	public function update($id_surat = NULL)
	{
		$this->form_validation->set_rules('judul_surat', 'Judul', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('tempat_waktu', 'Tempat Waktu', 'required');
		if ($this->form_validation->run() == FALSE) {
			if (!$id_surat) {
				redirect('Surat');
			}
			$surat = $this->surat->find($id_surat);
			if (!$surat) {
				redirect('Surat');
			}
			$data['content'] = 'pages/surat/edit';
			$data['item'] = $surat;
			$this->load->view('layouts/master', $data);
		} else {
			$input = [
				'judul_surat' => $this->input->post('judul_surat'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'isi' => $this->input->post('isi'),
				'tempat_waktu' => $this->input->post('tempat_waktu'),
			];
			$this->surat->update($id_surat, $input);
			$this->session->set_flashdata('success', 'Data surat berhasil disimpan!');
			redirect('Surat');
		}
	}

	public function print($id_surat)
	{
		$surat = $this->surat->find($id_surat);
		if (!$surat) {
			redirect('Surat');
		}

		$data['item'] = $surat;
		$this->load->view('pages/surat/print', $data);
	}

	public function delete($id_surat = NULL)
	{
		$this->surat->delete($id_surat);
		$this->session->set_flashdata('success', 'Data surat berhasil dihapus!');
		redirect('Surat');
	}
}
