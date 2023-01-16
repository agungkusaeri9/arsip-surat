<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_disposisi', 'disposisi');
		$this->load->model('M_surat_masuk', 'surat_masuk');
		$this->load->model('M_klasifikasi', 'klasifikasi');
		$this->load->model('M_sifat_surat', 'sifat');
		auth();
	}

	public function surat_masuk($id_surat_masuk = NULL)
	{
		if (!$id_surat_masuk) {
			redirect('Surat_Masuk');
		}
		$item = $this->disposisi->get($id_surat_masuk)->result();
		$data['content'] = 'pages/disposisi/index';
		$data['items'] = $item;
		$data['surat_masuk'] = $this->surat_masuk->find($id_surat_masuk);
		$this->load->view('layouts/master', $data);
	}

	public function tambah($id_surat_masuk = NULL)
	{
		if (!$id_surat_masuk) {
			redirect('Surat_Masuk');
		}

		$data['content'] = 'pages/disposisi/tambah';
		$data['id_surat_masuk'] = $id_surat_masuk;
		$data['klasifikasi'] = $this->klasifikasi->get();
		$data['sifat_surat'] = $this->sifat->get();
		$this->load->view('layouts/master', $data);
	}

	public function store($id_surat_masuk = NULL)
	{
		if (!$id_surat_masuk) {
			redirect('Surat_Masuk');
		}

		$this->form_validation->set_rules('id_klasifikasi', 'Tujuan', 'required');
		$this->form_validation->set_rules('id_sifat_surat', 'Sifat Surat', 'required');
		$this->form_validation->set_rules('catatan', 'Catatan', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('batas_waktu', 'Batas Waktu', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/disposisi/tambah';
			$data['id_surat_masuk'] = $id_surat_masuk;
			$data['klasifikasi'] = $this->klasifikasi->get();
			$data['sifat_surat'] = $this->sifat->get();
			$this->load->view('layouts/master', $data);
		} else {
			$input = [
				'id_surat_masuk' => $id_surat_masuk,
				'id_klasifikasi' => $this->input->post('id_klasifikasi'),
				'id_sifat_surat' => $this->input->post('id_sifat_surat'),
				'catatan' => $this->input->post('catatan'),
				'isi' => $this->input->post('isi'),
				'batas_waktu' => $this->input->post('batas_waktu') 
			];
			$this->disposisi->create($input);
			$this->session->set_flashdata('success','Disposisi berhasil ditambahkan!');
			redirect('Disposisi/surat_masuk/' . $id_surat_masuk);
		}

	}

	public function delete($id_disposisi = NULL)
	{
		$disposisi = $this->disposisi->find($id_disposisi);
		$this->disposisi->delete($id_disposisi);
		$this->session->set_flashdata('success', 'Disposisi berhasil dihapus!');
		redirect('Disposisi/surat_masuk/' . $disposisi->id_surat_masuk);
	}

	public function edit($id_disposisi = NULL, $id_surat_masuk = NULL)
	{
		if (!$id_disposisi) {
			redirect('Surat_Masuk');
		}

		$data['content'] = 'pages/disposisi/edit';
		$data['disposisi'] = $this->disposisi->find($id_disposisi);
		$data['klasifikasi'] = $this->klasifikasi->get();
		$data['sifat_surat'] = $this->sifat->get();
		$data['id_surat_masuk'] = $id_surat_masuk;
		$this->load->view('layouts/master', $data);
	}

	public function update($id_disposisi = NULL, $id_surat_masuk = NULL)
	{
		// if (!$id_surat_masuk || $id_disposisi) {
		// 	redirect('Surat_Masuk');
		// }

		$this->form_validation->set_rules('id_klasifikasi', 'Tujuan', 'required');
		$this->form_validation->set_rules('id_sifat_surat', 'Sifat Surat', 'required');
		$this->form_validation->set_rules('catatan', 'Catatan', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('batas_waktu', 'Batas Waktu', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/disposisi/edit';
			$data['id_surat_masuk'] = $id_surat_masuk;
			$data['disposisi'] = $this->disposisi->find($id_disposisi);
			$data['klasifikasi'] = $this->klasifikasi->get();
			$data['sifat_surat'] = $this->sifat->get();
			$this->load->view('layouts/master', $data);
		} else {
			$input = [
				'id_surat_masuk' => $id_surat_masuk,
				'id_klasifikasi' => $this->input->post('id_klasifikasi'),
				'id_sifat_surat' => $this->input->post('id_sifat_surat'),
				'catatan' => $this->input->post('catatan'),
				'isi' => $this->input->post('isi'),
				'batas_waktu' => $this->input->post('batas_waktu') 
			];
			$this->disposisi->update($id_disposisi,$input);
			$this->session->set_flashdata('success','Disposisi berhasil diupdate!');
			redirect('Disposisi/surat_masuk/' . $id_surat_masuk);
		}
	}

}
