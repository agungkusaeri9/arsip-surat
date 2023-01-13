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

	public function store()
	{
		$this->form_validation->set_rules('no_agenda','No. Agenda','required');
		$this->form_validation->set_rules('pengirim','Pengirim','required');
		$this->form_validation->set_rules('no_surat','No. Surat','required|is_unique[surat_keluar.no_surat]');
		$this->form_validation->set_rules('isi','Isi','required');
		$this->form_validation->set_rules('tanggal_surat','Tanggal Surat','required');
		$this->form_validation->set_rules('tanggal_diterima','Tanggal Diterima','required');
		// $this->form_validation->set_rules('file','File','required');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'pages/surat-keluar/tambah';
			$this->load->view('layouts/master', $data);
		}else{
			$post = [
				'no_agenda' => $this->input->post('no_agenda'),
				'pengirim' => $this->input->post('pengirim'),
				'no_surat' => $this->input->post('no_surat'),
				'isi' => $this->input->post('isi'),
				'tanggal_surat' => $this->input->post('tanggal_surat'),
				'tanggal_diterima' => $this->input->post('tanggal_diterima'),
				'keterangan' => $this->input->post('keterangan')
			];

			if ($_FILES['file']) {
				$config['upload_path']   = './uploads/surat_keluar/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|docx';
				$config['max_size']      = 2024;
				$this->load->library('upload', $config);
				//upload file to directory
				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$uploadedFile = $uploadData['file_name'];
					$post['file'] = $uploadData['file_name'];
				} else {
					$data['error'] = $this->upload->display_errors();
					$data['content'] = 'pages/surat-keluar/tambah';
					$this->load->view('layouts/master', $data);
				}
			
			}

			$this->surat_keluar->create($post);
			$this->session->set_flashdata('success','Surat Keluar berhasil ditambahkan!');
			redirect('Surat_Keluar');
		}
	}

	public function edit($id)
	{
		$item = $this->surat_keluar->find($id);
		$data['item'] = $item;
		$data['content'] = 'pages/surat-keluar/edit';
		$this->load->view('layouts/master', $data);
	}

	public function update($id_surat_keluar = NULL)
	{
		$this->form_validation->set_rules('no_agenda','No. Agenda','required');
		$this->form_validation->set_rules('pengirim','Pengirim','required');
		$this->form_validation->set_rules('no_surat','No. Surat','required|callback_nosurat_check');
		$this->form_validation->set_rules('isi','Isi','required');
		$this->form_validation->set_rules('tanggal_surat','Tanggal Surat','required');
		$this->form_validation->set_rules('tanggal_diterima','Tanggal Diterima','required');
		// $this->form_validation->set_rules('file','File','required');

		if($this->form_validation->run() == FALSE)
		{
			$item = $this->surat_keluar->find($id_surat_keluar);
			$data['item'] = $item;
			$data['content'] = 'pages/surat-keluar/edit';
			$this->load->view('layouts/master', $data);
		}else{
			$post = [
				'no_agenda' => $this->input->post('no_agenda'),
				'pengirim' => $this->input->post('pengirim'),
				'no_surat' => $this->input->post('no_surat'),
				'isi' => $this->input->post('isi'),
				'tanggal_surat' => $this->input->post('tanggal_surat'),
				'tanggal_diterima' => $this->input->post('tanggal_diterima'),
				'keterangan' => $this->input->post('keterangan')
			];

			if ($_FILES['file']) {
				$config['upload_path']   = './uploads/surat_keluar/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|docx';
				$config['max_size']      = 2024;
				$this->load->library('upload', $config);
				//upload file to directory
				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$uploadedFile = $uploadData['file_name'];
					$post['file'] = $uploadData['file_name'];
				} else {
					$data['error'] = $this->upload->display_errors();
					$data['content'] = 'pages/surat-keluar/tambah';
					$this->load->view('layouts/master', $data);
				}
			
			}

			$this->surat_keluar->update($id_surat_keluar,$post);
			$this->session->set_flashdata('success','Surat Keluar berhasil disimpan!');
			redirect('Surat_Keluar');
		}
	}


	public function nosurat_check()
	{
		$input = $this->input->post();
		$cekSuratKeluar = $this->surat_keluar->check(array('no_surat',$input['no_surat']),$input['id_surat_keluar']);
		if($cekSuratKeluar->num_rows() > 0)
		{
			die('no surat ada');
		}else{
			die('tidak ada');
		}
	}

	public function delete($id_surat_keluar = NULL)
	{
		$this->surat_keluar->delete($id_surat_keluar);
		$this->session->set_flashdata('success','Data Surat Keluar berhasil dihapus!');
		redirect('Surat_Keluar');
	}

}
