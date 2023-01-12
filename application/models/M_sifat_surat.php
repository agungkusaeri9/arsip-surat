<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sifat_surat extends CI_Model {

	public function get()
	{
		return $this->db->get('sifat_surat')->result();
	}

	public function create($input)
	{
		$this->db->insert('sifat_surat',[
			'sifat_surat' => $input['sifat_surat']
		]);
	}

	public function find($id_sifat_surat)
	{
		$this->db->where('id_sifat_surat',$id_sifat_surat);
		return $this->db->get('sifat_surat')->row();
	}

	public function update($id_sifat_surat,$data)
	{
		$this->db->where('id_sifat_surat',$id_sifat_surat);
		$this->db->update('sifat_surat',$data);
	}

	public function delete($id_sifat_surat)
	{
		$this->db->where('id_sifat_surat',$id_sifat_surat);
		$this->db->delete('sifat_surat');
	}

}
