<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


	public function index()
	{
		$data['content'] = 'pages/profile';
		$this->load->view('layouts/master', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/profile';
			$this->load->view('layouts/master', $data);
		} else {
			$data = $this->input->post();
			if ($this->input->post('gambar')) {
				$config['upload_path']   = 'uploads/user/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 2024;
				$this->load->library('upload', $config);
				//upload file to directory
				if ($this->upload->do_upload('gambar')) {
					$uploadData = $this->upload->data();
					$uploadedFile = $uploadData['file_name'];
				} else {
					$data['error'] = $this->upload->display_errors();
				}
				$data['content'] = 'pages/profile';
				$this->load->view('layouts/master', $data);
			}
	
		}
	}
}
