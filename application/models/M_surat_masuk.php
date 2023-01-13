<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat_masuk extends CI_Model {

	public function get()
	{
		return $this->db->get('surat_masuk')->result();
	}

	public function create($input)
	{
		$this->db->insert('surat_masuk',$input);
	}

}
