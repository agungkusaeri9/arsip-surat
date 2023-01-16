<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_klasifikasi extends CI_Model {

	public function get()
	{
		return $this->db->get('klasifikasi')->result();
	}

	public function create($input)
	{
		$this->db->insert('klasifikasi',$input);
	}

	public function find($id_klasifikasi)
	{
		$this->db->where('id_klasifikasi',$id_klasifikasi);
		return $this->db->get('klasifikasi')->row();
	}

	public function update($id_klasifikasi,$data)
	{
		$this->db->where('id_klasifikasi',$id_klasifikasi);
		$this->db->update('klasifikasi',$data);
	}

	public function delete($id_klasifikasi)
	{
		$this->db->where('id_klasifikasi',$id_klasifikasi);
		$this->db->delete('klasifikasi');
	}

	public function count()
	{
		return $this->db->get('klasifikasi')->num_rows();
	}

}
