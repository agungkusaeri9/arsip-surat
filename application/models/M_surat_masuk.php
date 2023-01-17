<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat_masuk extends CI_Model {

	public function get()
	{
		$this->db->order_by('id_surat_masuk','DESC');
		return $this->db->get('surat_masuk')->result();
	}

	public function filter($arr)
	{
		$this->db->where($arr);
		$this->db->order_by('id_surat_masuk','DESC');
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

	public function count()
	{
		return $this->db->get('surat_masuk')->num_rows();
	}
	public function countFile()
	{	
		$this->db->where('file !=', NULL);
		return $this->db->get('surat_masuk')->num_rows();
	}

	public function getChart($bulan)
	{
		$year = date('Y');
		$this->db->where('month(tanggal_surat)',$bulan);
		$this->db->where('year(tanggal_surat)',$year);
		$this->db->from('surat_masuk');
		return $this->db->get()->num_rows();
	}
}
