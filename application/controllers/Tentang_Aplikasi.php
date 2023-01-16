<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_Aplikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/tentang-aplikasi'; 
		$this->load->view('layouts/master',$data);
	}

}
