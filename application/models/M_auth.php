<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function checkLogin($username,$password)
	{
		$user = $this->db->where('username',$username)->get('users')->row();
		if($user)
		{
			// cek password
			if(password_verify($password,$user->password))
			{
				$this->session->set_userdata(['id_user' => $user->id_user]);
				$this->session->set_userdata(['nama' => $user->nama]);
				$this->session->set_userdata(['username' => $user->username]);
				$this->session->set_userdata(['gambar' => $user->gambar]);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

}
