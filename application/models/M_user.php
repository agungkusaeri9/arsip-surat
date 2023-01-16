<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function get()
	{
		return $this->db->get('users')->result();
	}

	public function create($input)
	{
		$this->db->insert('users',[
			'nama' => $input['nama'],
			'username' => $input['username'],
			'password' => password_hash($input['password'],PASSWORD_BCRYPT),
			'gambar' => $input['gambar']
		]);
	}

	public function find($id_user)
	{
		$this->db->where('id_user',$id_user);
		return $this->db->get('users')->row();
	}

	public function update($id_user,$data)
	{
		$this->db->where('id_user',$id_user);
		$this->db->update('users',$data);
	}

	public function checkUser($id_user,$arr)
	{
		$this->db->where('id_user',$id_user);
		$this->db->where($arr);
		$user = $this->db->get('users');
		return $user->row();
	}

	public function delete($id_user)
	{
		$this->db->where('id_user',$id_user);
		$this->db->delete('users');
	}

	public function count()
	{
		return $this->db->get('users')->num_rows();
	}

}
