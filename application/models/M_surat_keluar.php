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

	public function count()
	{
		return $this->db->get('surat_keluar')->num_rows();
	}
	public function countFile()
	{	
		$this->db->where('file !=', NULL);
		return $this->db->get('surat_keluar')->num_rows();
	}

	public function filter($arr)
	{
		$this->db->where($arr);
		$this->db->order_by('id_surat_keluar','DESC');
		return $this->db->get('surat_keluar')->result();
	}

	public function getChart($bulan)
	{
		$year = date('Y');
		$this->db->where('month(tanggal_surat)',$bulan);
		$this->db->where('year(tanggal_surat)',$year);
		$this->db->from('surat_keluar');
		return $this->db->get()->num_rows();
	}
}
