<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth','auth');	
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function login()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() == FALSE)
		{

			$this->load->view('auth/login');
		}else{
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		// cek username
		$checkLogin = $this->auth->checkLogin($username,$password);
		if($checkLogin == FALSE)
		{
			$this->session->set_flashdata('error','Username atau password salah!');
			return redirect('Auth');
		}

		$session = array([
			'username' => $username
		]);

		return redirect('dashboard');
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('success','Anda berhasil logout!');
		return redirect('auth');
	}

}
