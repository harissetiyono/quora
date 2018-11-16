<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelPertanyaan');
		$this->load->model('ModelJawaban');
		$this->load->model('ModelTopik');

		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}

	public function index()
	{

	}

	public function id($id_pertanyaan)
	{
		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_by_id($id_pertanyaan);
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban_by_id_pertanyaan($id_pertanyaan);
		$datas['topik'] = $this->ModelTopik->get_topik()->result();

		$this->load->view('header');
		$this->load->view('pertanyaan', $datas);
		$this->load->view('footer');
	}

	public function tambah_pertanyaan()
	{
		$id_member = $this->session->userdata('id_member');
		$pertanyaan = $this->input->post('pertanyaan');
		$id_topik = $this->input->post('id_topik');
		$link = $this->input->post('link');
		$tanggal = date('Y-m-d');
		$status = 1;

		$datas = array(
			'id_member' => $id_member, 
			'pertanyaan' => $pertanyaan, 
			'link' => $link, 
			'id_topik' => $id_topik, 
			'tanggal' => $tanggal, 
			'status' => $status, 
		);

		$insert = $this->ModelPertanyaan->insert_pertanyaan($datas);

		if ($insert) {
			$message = $this->session->set_flashdata('message', 'pertanyaan berhasil ditambahkan !');
			
		}else{
			$message = $this->session->set_flashdata('message', 'pertanyaan gagal ditambahkan !');
		}

		redirect('beranda',$message);
	}

	public function ikuti_pertanyaan($id_pertanyaan)
	{
		$datas = array(
			'id_member' => $this->session->userdata('id_member'), 
			'id_pertanyaan' => $id_pertanyaan, 
		);

		$insert = $this->ModelPertanyaan->ikuti_pertanyaan($datas);

		if ($insert) {
			$message = $this->session->set_flashdata('message', 'Anda berhasil mengikuti pertanyaan !');
			
		}else{
			$message = $this->session->set_flashdata('message', 'Anda gagal mengikuti pertanyaan!');
		}

		redirect('beranda',$message);
	}

	public function laporkan_pertanyaan($id_pertanyaan)
	{
		$tanggal = date('Y-m-d');
		$datas = array(
			'id_member' => $this->session->userdata('id_member'), 
			'id_pertanyaan' => $id_pertanyaan, 
			'tanggal' => $tanggal, 
			'keterangan' => '-', 
		);

		$insert = $this->ModelPertanyaan->laporakan_spam($datas);

		redirect($_SERVER['HTTP_REFERER']);
	}

}

/* End of file Pertanyaan.php */
/* Location: ./application/controllers/Pertanyaan.php */