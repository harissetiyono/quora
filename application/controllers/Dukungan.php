<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dukungan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelDukungan');	
		//Do your magic here
	}

	public function index()
	{
		
	}

	public function dukung_naik($id_jawaban)
	{
		$id_member = $this->session->userdata('id_member');
		$dukungan = 'naik';

		$datas = array(
			'id_member' => $id_member, 
			'id_jawaban' => $id_jawaban, 
			'dukungan' => $dukungan, 
		);

		$check_dukung = $this->ModelDukungan->check_dukung($id_jawaban, $id_member);

		if ($check_dukung == 1) {
			$update = $this->ModelDukungan->update_dukung($id_jawaban,$datas);
		}else{
			$insert = $this->ModelDukungan->insert_dukung($datas);	
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function dukung_turun($id_jawaban)
	{
		$id_member = $this->session->userdata('id_member');
		$dukungan = 'turun';

		$datas = array(
			'id_member' => $id_member, 
			'id_jawaban' => $id_jawaban, 
			'dukungan' => $dukungan, 
		);

		$check_dukung = $this->ModelDukungan->check_dukung($id_jawaban, $id_member);

		if ($check_dukung == 1) {
			$update = $this->ModelDukungan->update_dukung($id_jawaban, $datas);
		}else{
			$insert = $this->ModelDukungan->insert_dukung($datas);	
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function dukung_netral($id_jawaban)
	{
		$id_member = $this->session->userdata('id_member');
		$dukungan = null;

		$datas = array(
			'id_member' => $id_member, 
			'id_jawaban' => $id_jawaban, 
			'dukungan' => $dukungan, 
		);

		$insert = $this->ModelDukungan->update_dukung($id_jawaban,$datas);

		if ($insert) {
			$message = $this->session->set_flashdata('message', 'pertanyaan berhasil ditambahkan !');
			
		}else{
			$message = $this->session->set_flashdata('message', 'pertanyaan gagal ditambahkan !');
		}
	}

}

/* End of file Dukungan.php */
/* Location: ./application/controllers/Dukungan.php */