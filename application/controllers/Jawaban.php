<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawaban extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

		$this->load->model('ModelJawaban');
	}

	public function index()
	{
		
	}

	public function id($id_jawaban)
	{
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban_by_id_pertanyaan($id_jawaban);

		$this->load->view('header');
		$this->load->view('jawaban', $datas);
		$this->load->view('footer');
	}

	public function tambah_jawaban()
	{
		$id_member = $this->session->userdata('id_member');
		$id_pertanyaan = $this->input->post('id_pertanyaan');
		$jawaban = $this->input->post('jawaban');
		$link = $this->input->post('link');
		$tanggal = date('Y-m-d');
		$status = 1;


		$datas = array(
			'id_member' => $id_member, 
			'id_pertanyaan' => $id_pertanyaan, 
			'jawaban' => $jawaban, 
			'tanggal' => $tanggal, 
			'status' => $status, 
		);

		$insert = $this->ModelJawaban->insert_jawaban($datas);

		if ($insert) {
			$message = $this->session->set_flashdata('message', 'pertanyaan berhasil ditambahkan !');
			
		}else{
			$message = $this->session->set_flashdata('message', 'pertanyaan gagal ditambahkan !');
		}

		redirect('pertanyaan/id/'.$id_pertanyaan,$message);
	}

	public function laporkan_jawaban($id_jawaban)
	{
		$tanggal = date('Y-m-d');
		$datas = array(
			'id_member' => $this->session->userdata('id_member'), 
			'id_jawaban' => $id_jawaban, 
			'tanggal' => $tanggal, 
			'keterangan' => '-', 
		);

		$insert = $this->ModelJawaban->laporakan_spam($datas);

		redirect($_SERVER['HTTP_REFERER']);
	}

}

/* End of file Jawaban.php */
/* Location: ./application/controllers/Jawaban.php */