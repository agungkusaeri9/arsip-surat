<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat_keluar extends CI_Model {

	public function get()
	{
		return $this->db->get('surat_keluar')->result();
	}
	public function find($id_surat_keluar)
	{
		$this->db->where('id_surat_keluar',$id_surat_keluar);
		return $this->db->get('surat_keluar')->row();
	}

	public function checknosurat($no_surat,$id_surat_keluar)
	{
		$this->db->where('no_surat',$no_surat);
		$this->db->where('id_surat_keluar !=',$id_surat_keluar);
		return $this->db->get('surat_keluar');
	}

	public function create($input)
	{
		$this->db->insert('surat_keluar',$input);
	}

	public function update($id_surat_keluar,$data)
	{
		$this->db->where('id_surat_keluar',$id_surat_keluar);
		$this->db->update('surat_keluar',$data);
	}

	public function delete($id_surat_keluar)
	{
		$this->db->where('id_surat_keluar',$id_surat_keluar);
		$this->db->delete('surat_keluar');
	}
}
