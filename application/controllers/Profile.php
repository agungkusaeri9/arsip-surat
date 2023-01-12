<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	public function index()
	{
		$data['content'] = 'pages/profile';
		$this->load->view('layouts/master',$data);
	}

	public function update()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('gambar','Gambar','file');
		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'pages/profile';
			$this->load->view('layouts/master',$data);
		}else{
			
		}
	}

}
