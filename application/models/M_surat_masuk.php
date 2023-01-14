<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat_masuk extends CI_Model {

	public function get()
	{
		return $this->db->get('surat_masuk')->result();
	}
	public function find($id_surat_masuk)
	{
		$this->db->where('id_surat_masuk',$id_surat_masuk);
		return $this->db->get('surat_masuk')->row();
	}

	public function checknosurat($no_surat,$id_surat_masuk)
	{
		$this->db->where('no_surat',$no_surat);
		$this->db->where('id_surat_masuk !=',$id_surat_masuk);
		return $this->db->get('surat_masuk');
	}

	public function create($input)
	{
		$this->db->insert('surat_masuk',$input);
	}

	public function update($id_surat_masuk,$data)
	{
		$this->db->where('id_surat_masuk',$id_surat_masuk);
		$this->db->update('surat_masuk',$data);
	}

	public function delete($id_surat_masuk)
	{
		$this->db->where('id_surat_masuk',$id_surat_masuk);
		$this->db->delete('surat_masuk');
	}
}
