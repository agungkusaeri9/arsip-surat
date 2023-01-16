<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_disposisi extends CI_Model {

	public function get($id_surat_masuk)
	{
		$this->db->select('ds.*,sm.no_surat as no_surat, kl.nama as klasifikasi, sf.sifat_surat as sifat, kl.jabatan as jabatan');
		$this->db->where('ds.id_surat_masuk',$id_surat_masuk);
		$this->db->from('disposisi_surat ds');
		$this->db->join('surat_masuk sm','sm.id_surat_masuk = ds.id_surat_masuk');
		$this->db->join('klasifikasi kl','kl.id_klasifikasi = ds.id_klasifikasi');
		$this->db->join('sifat_surat sf','sf.id_sifat_surat = ds.id_sifat_surat');
		return $this->db->get();
	}

	public function create($input)
	{
		$this->db->insert('disposisi_surat',$input);
	}

	public function find($id_disposisi)
	{
		$this->db->where('id_disposisi',$id_disposisi);
		return $this->db->get('disposisi_surat')->row();
	}

	public function update($id_disposisi,$data)
	{
		$this->db->where('id_disposisi',$id_disposisi);
		$this->db->update('disposisi_surat',$data);
	}

	public function delete($id_disposisi)
	{
		$this->db->where('id_disposisi',$id_disposisi);
		$this->db->delete('disposisi_surat');
	}

}
