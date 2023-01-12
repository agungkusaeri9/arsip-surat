<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_user', 'user');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/user/index';
		$data['items'] = $this->user->get();
		$this->load->view('layouts/master', $data);
	}

	public function tambah()
	{
		$data['content'] = 'pages/user/tambah';
		$data['items'] = $this->user->get();
		$this->load->view('layouts/master', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/user/tambah';
			$data['items'] = $this->user->get();
			$this->load->view('layouts/master', $data);
		} else {
			$this->user->create($this->input->post());
			$this->session->set_flashdata('success','Data User berhasil ditambahkan!');
			redirect('user');
		}
	}

	public function edit($id_user = NULL)
	{
		if (!$id_user) {
			redirect('user');
		}
		$user = $this->user->find($id_user);
		if (!$user) {
			redirect('user');
		}
		$data['content'] = 'pages/user/edit';
		$data['item'] = $user;
		$this->load->view('layouts/master', $data);
	}

	public function update($id_user = NULL)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');
		}
		if ($this->form_validation->run() == FALSE) {
			if (!$id_user) {
				redirect('user');
			}
			$user = $this->user->find($id_user);
			if (!$user) {
				redirect('user');
			}
			$data['content'] = 'pages/user/edit';
			$data['item'] = $user;
			$this->load->view('layouts/master', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'gambar' => $this->input->post('gambar')
			];
			if ($this->input->post('password')) {
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			}
			$this->user->update($id_user, $data);
			$this->session->set_flashdata('success','Data User berhasil disimpan!');
			redirect('user');
		}
	}

	public function delete($id_user = NULL)
	{
		$this->user->delete($id_user);
		$this->session->set_flashdata('success','Data User berhasil dihapus!');
		redirect('user');
	}
}
