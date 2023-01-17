<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Surat_Keluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_surat_keluar', 'surat_keluar');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/surat-keluar/index';
		$data['items'] = $this->surat_keluar->get();
		$this->load->view('layouts/master', $data);
	}

	public function tambah()
	{
		$data['content'] = 'pages/surat-keluar/tambah';
		$this->load->view('layouts/master', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('no_agenda','No. Agenda','required');
		$this->form_validation->set_rules('pengirim','Pengirim','required');
		$this->form_validation->set_rules('no_surat','No. Surat','required|is_unique[surat_keluar.no_surat]');
		$this->form_validation->set_rules('isi','Isi','required');
		$this->form_validation->set_rules('tanggal_surat','Tanggal Surat','required');
		$this->form_validation->set_rules('tanggal_diterima','Tanggal Diterima','required');
		// $this->form_validation->set_rules('file','File','required');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'pages/surat-keluar/tambah';
			$this->load->view('layouts/master', $data);
		}else{
			$post = [
				'no_agenda' => $this->input->post('no_agenda'),
				'pengirim' => $this->input->post('pengirim'),
				'no_surat' => $this->input->post('no_surat'),
				'isi' => $this->input->post('isi'),
				'tanggal_surat' => $this->input->post('tanggal_surat'),
				'tanggal_diterima' => $this->input->post('tanggal_diterima'),
				'keterangan' => $this->input->post('keterangan')
			];

			if ($_FILES['file']) {
				$config['upload_path']   = './uploads/surat_keluar/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|docx';
				$config['max_size']      = 2024;
				$this->load->library('upload', $config);
				//upload file to directory
				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$uploadedFile = $uploadData['file_name'];
					$post['file'] = $uploadData['file_name'];
				} else {
					$data['error'] = $this->upload->display_errors();
					$data['content'] = 'pages/surat-keluar/tambah';
					$this->load->view('layouts/master', $data);
				}
			
			}

			$this->surat_keluar->create($post);
			$this->session->set_flashdata('success','Surat Keluar berhasil ditambahkan!');
			redirect('Surat_Keluar');
		}
	}

	public function edit($id)
	{
		$item = $this->surat_keluar->find($id);
		$data['item'] = $item;
		$data['content'] = 'pages/surat-keluar/edit';
		$this->load->view('layouts/master', $data);
	}

	public function update($id_surat_keluar = NULL)
	{
		
		$this->form_validation->set_rules('no_agenda','No. Agenda','required');
		$this->form_validation->set_rules('pengirim','Pengirim','required');
		$this->form_validation->set_rules('no_surat','No. Surat',
		array(
			'callback_nosurat_check'
	));
		$this->form_validation->set_rules('isi','Isi','required');
		$this->form_validation->set_rules('tanggal_surat','Tanggal Surat','required');
		$this->form_validation->set_rules('tanggal_diterima','Tanggal Diterima','required');
		// $this->form_validation->set_rules('file','File','required');
		// var_dump($this->input->post());die;
		if($this->form_validation->run() == FALSE)
		{
			$item = $this->surat_keluar->find($id_surat_keluar);
			$data['item'] = $item;
			$data['content'] = 'pages/surat-keluar/edit';
			$this->load->view('layouts/master', $data);
		}else{
			$post = [
				'no_agenda' => $this->input->post('no_agenda'),
				'pengirim' => $this->input->post('pengirim'),
				'no_surat' => $this->input->post('no_surat'),
				'isi' => $this->input->post('isi'),
				'tanggal_surat' => $this->input->post('tanggal_surat'),
				'tanggal_diterima' => $this->input->post('tanggal_diterima'),
				'keterangan' => $this->input->post('keterangan')
			];

			if ($_FILES['file']) {
				$config['upload_path']   = './uploads/surat_keluar/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|docx';
				$config['max_size']      = 2024;
				$this->load->library('upload', $config);
				//upload file to directory
				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$uploadedFile = $uploadData['file_name'];
					$post['file'] = $uploadData['file_name'];
				} else {
					$data['error'] = $this->upload->display_errors();
					$data['content'] = 'pages/surat-keluar/tambah';
					$this->load->view('layouts/master', $data);
				}
			
			}

			$this->surat_keluar->update($id_surat_keluar,$post);
			$this->session->set_flashdata('success','Surat Keluar berhasil disimpan!');
			redirect('Surat_Keluar');
		}
	}


	public function nosurat_check()
	{
		$input = $this->input->post();
		$cekSuratKeluar = $this->surat_keluar->checknosurat($input['no_surat'],$input['id_surat_keluar']);
	
		if($cekSuratKeluar->num_rows() > 0)
		{
			$this->form_validation->set_message('nosurat_check', 'The {field} already exist');
			return FALSE;
		}
	}

	public function delete($id_surat_keluar = NULL)
	{
		$this->surat_keluar->delete($id_surat_keluar);
		$this->session->set_flashdata('success','Data Surat Keluar berhasil dihapus!');
		redirect('Surat_Keluar');
	}
	
	public function download($id_surat_keluar){		
		$this->load->helper('download');	
		$item = $this->surat_keluar->find($id_surat_keluar);		
		force_download('uploads/surat_keluar/' . $item->file,NULL);
	}

	public function print()
	{
		$from_date = $this->input->get('from_date');
		$to_date = $this->input->get('to_date');
		
		if ($from_date && $to_date) {
			$arr = [
				'tanggal_surat >=' => $from_date,
				'tanggal_surat <=' => $to_date
			];
		} elseif ($from_date && !$to_date) {
			$arr = [
				'tanggal_surat' => $from_date
			];
		} else {
			$arr = [
				'id_surat_keluar != ' => NULL,
			];
		}
		$data['items'] = $this->surat_keluar->filter($arr);
		$html = $this->load->view('pages/surat-keluar/print',$data,TRUE);
		$nama_file = "Laporan Surat Keluar";
		generatePdfSuratKeluar($html,$nama_file,TRUE);
	}

	public function excel()
	{
		$from_date = $this->input->get('from_date');
		$to_date = $this->input->get('to_date');

		if ($from_date && $to_date) {
			$arr = [
				'tanggal_surat >=' => $from_date,
				'tanggal_surat <=' => $to_date
			];
		} elseif ($from_date && !$to_date) {
			$arr = [
				'tanggal_surat' => $from_date
			];
		} else {
			$arr = [
				'id_surat_keluar != ' => NULL,
			];
		}

		$surat_keluar = $this->surat_keluar->filter($arr);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Laporan Surat Masuk');
		$sheet->mergeCells('A1:H1');
		$sheet->setCellValue('A2', 'No');
		$sheet->setCellValue('B2', 'No. Agenda');
		$sheet->setCellValue('C2', 'No. Surat');
		$sheet->setCellValue('D2', 'Pengirim');
		$sheet->setCellValue('E2', 'Isi');
		$sheet->setCellValue('F2', 'Tanggal Surat');
		$sheet->setCellValue('G2', 'Tanggal Diterima');
		$sheet->setCellValue('H2', 'Keterangan');
		$sheet->getStyle('A1:H1')->getAlignment()->setHorizontal('center');
		$baris = 3;
		$no = 1;
		foreach ($surat_keluar as $sm) {
			$sheet->setCellValue('A' . $baris, $no++);
			$sheet->setCellValue('B' . $baris, $sm->no_agenda);
			$sheet->setCellValue('C' . $baris, $sm->no_surat);
			$sheet->setCellValue('D' . $baris, $sm->pengirim);
			$sheet->setCellValue('E' . $baris, $sm->isi);
			$sheet->setCellValue('F' . $baris, $sm->tanggal_surat);
			$sheet->setCellValue('G' . $baris, $sm->tanggal_diterima);
			$sheet->setCellValue('H' . $baris, $sm->keterangan);
			$baris++;
		}
		

		$filename = "Laporan Surat Keluar";
		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

}
