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

	public function tambah()
	{
		$data['content'] = 'pages/surat-masuk/tambah';
		$this->load->view('layouts/master', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('no_agenda', 'No. Agenda', 'required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('no_surat', 'No. Surat', 'required|is_unique[surat_masuk.no_surat]');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'required');
		// $this->form_validation->set_rules('file','File','required');

		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/surat-masuk/tambah';
			$this->load->view('layouts/master', $data);
		} else {
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
				$config['upload_path']   = './uploads/surat_masuk/';
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
					$data['content'] = 'pages/surat-masuk/tambah';
					$this->load->view('layouts/master', $data);
				}
			}

			$this->surat_masuk->create($post);
			$this->session->set_flashdata('success', 'Surat masuk berhasil ditambahkan!');
			redirect('Surat_Masuk');
		}
	}

	public function edit($id)
	{
		$item = $this->surat_masuk->find($id);
		$data['item'] = $item;
		$data['content'] = 'pages/surat-masuk/edit';
		$this->load->view('layouts/master', $data);
	}

	public function update($id_surat_masuk = NULL)
	{

		$this->form_validation->set_rules('no_agenda', 'No. Agenda', 'required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules(
			'no_surat',
			'No. Surat',
			array(
				'callback_nosurat_check'
			)
		);
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'required');
		// $this->form_validation->set_rules('file','File','required');
		// var_dump($this->input->post());die;
		if ($this->form_validation->run() == FALSE) {
			$item = $this->surat_masuk->find($id_surat_masuk);
			$data['item'] = $item;
			$data['content'] = 'pages/surat-masuk/edit';
			$this->load->view('layouts/master', $data);
		} else {
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
				$config['upload_path']   = './uploads/surat_masuk/';
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
					$data['content'] = 'pages/surat-masuk/tambah';
					$this->load->view('layouts/master', $data);
				}
			}

			$this->surat_masuk->update($id_surat_masuk, $post);
			$this->session->set_flashdata('success', 'Surat masuk berhasil disimpan!');
			redirect('Surat_Masuk');
		}
	}


	public function nosurat_check()
	{
		$input = $this->input->post();
		$cekSuratmasuk = $this->surat_masuk->checknosurat($input['no_surat'], $input['id_surat_masuk']);

		if ($cekSuratmasuk->num_rows() > 0) {
			$this->form_validation->set_message('nosurat_check', 'The {field} already exist');
			return FALSE;
		}
	}

	public function delete($id_surat_masuk = NULL)
	{
		$this->surat_masuk->delete($id_surat_masuk);
		$this->session->set_flashdata('success', 'Data Surat masuk berhasil dihapus!');
		redirect('Surat_Masuk');
	}

	public function download($id_surat_masuk)
	{
		$this->load->helper('download');
		$item = $this->surat_masuk->find($id_surat_masuk);
		force_download('uploads/surat_masuk/' . $item->file, NULL);
	}

	public function print()
	{
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('pages/surat_masuk/print');
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
}
