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

		$ql = $this->db->select('*')->from('m_dukungan')->where('id_member',$id_member)->where('id_jawaban', $id_jawaban)->get();

		if ($ql->num_rows() > 0) {
			$delete = $this->ModelDukungan->delete_dukungan($id_member,$id_jawaban, $dukungan);
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

		
		$ql = $this->db->select('*')->from('m_dukungan')->where('id_member',$id_member)->where('id_jawaban', $id_jawaban)->get();

		if ($ql->num_rows() > 0) {
			$delete = $this->ModelDukungan->delete_dukungan($id_member,$id_jawaban, $dukungan);
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