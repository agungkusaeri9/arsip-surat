<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_klasifikasi', 'klasifikasi');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/klasifikasi/index';
		$data['items'] = $this->klasifikasi->get();
		$this->load->view('layouts/master', $data);
	}

	public function tambah()
	{
		$data['content'] = 'pages/klasifikasi/tambah';
		$this->load->view('layouts/master', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/klasifikasi/tambah';
			$this->load->view('layouts/master', $data);
		} else {

			// cek gambar
			if ($this->input->post('gambar')) {
				$config['upload_path']          = './uploads/user/';
				$config['allowed_types']        = 'jpeg|jpg|png';
				$config['max_size']             = 1024;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('upload_form', $error);
				} else {
					$data = array('upload_data' => $this->upload->data());

					$this->load->view('upload_success', $data);
				}
			}
			$input = [
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan')
			];
			$this->klasifikasi->create($input);
			$this->session->set_flashdata('success', 'Data klasifikasi berhasil ditambahkan!');
			redirect('Klasifikasi');
		}
	}

	public function edit($id_Klasifikasi = NULL)
	{
		if (!$id_Klasifikasi) {
			redirect('Klasifikasi');
		}
		$klasifikasi = $this->klasifikasi->find($id_Klasifikasi);
		if (!$klasifikasi) {
			redirect('Klasifikasi');
		}
		$data['content'] = 'pages/klasifikasi/edit';
		$data['item'] = $klasifikasi;
		$this->load->view('layouts/master', $data);
	}

	public function update($id_Klasifikasi = NULL)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		if ($this->form_validation->run() == FALSE) {
			if (!$id_Klasifikasi) {
				redirect('Klasifikasi');
			}
			$klasifikasi = $this->klasifikasi->find($id_Klasifikasi);
			if (!$klasifikasi) {
				redirect('Klasifikasi');
			}
			$data['content'] = 'pages/klasifikasi/edit';
			$data['item'] = $klasifikasi;
			$this->load->view('layouts/master', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
			];
			$this->klasifikasi->update($id_Klasifikasi, $data);
			$this->session->set_flashdata('success', 'Data klasifikasi berhasil disimpan!');
			redirect('Klasifikasi');
		}
	}

	public function delete($id_Klasifikasi = NULL)
	{
		$this->klasifikasi->delete($id_Klasifikasi);
		$this->session->set_flashdata('success', 'Data klasifikasi berhasil dihapus!');
		redirect('Klasifikasi');
	}
}
