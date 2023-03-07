<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat extends CI_Model {

	public function get()
	{
		return $this->db->order_by('id_surat','DESC')->get('surat')->result();
	}

	public function create($input)
	{
		$this->db->insert('surat',$input);
	}

	public function find($id_surat)
	{
		$this->db->where('id_surat',$id_surat);
		return $this->db->get('surat')->row();
	}

	public function update($id_surat,$data)
	{
		$this->db->where('id_surat',$id_surat);
		$this->db->update('surat',$data);
	}

	public function delete($id_surat)
	{
		$this->db->where('id_surat',$id_surat);
		$this->db->delete('surat');
	}

}
