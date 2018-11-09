<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelTopik');
		$this->load->model('ModelSpam');
		$this->load->model('ModelTopup');
		$this->load->model('ModelBisnis');
	}

	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/footer');
	}

	public function spam()
	{
		$datas['spam_pertanyaan'] = $this->ModelSpam->get_spam_pertanyaan()->result();
		$datas['spam_jawaban'] = $this->ModelSpam->get_spam_jawaban()->result();

		$this->load->view('layouts/header');
		$this->load->view('admin/index', $datas);
		$this->load->view('layouts/footer');
	}

	public function spam_pertanyaan_update($id){
		$id = $this->uri->segment(3);
		$status = $this->input->post('status');
		$data = array(
			'status' => $status, 
		);

		$data = $this->ModelSpam->update_spam_pertanyaan($id, $data);
	}

	public function spam_jawaban_update($id){
		$id = $this->uri->segment(3);
		$data = array(
			'status' => $status, 
		);

		$data = $this->ModelSpam->update_spam_jawaban($id, $data);
	}

	public function konfirmasi()
	{
		$datas['topup'] = $this->ModelTopup->get_topup()->result();

		$this->load->view('layouts/header');
		$this->load->view('admin/konfirmasi', $datas);
		$this->load->view('layouts/footer');
	}

	public function update_konfirmasi()
	{
		$id 		= $this->input->post('id_transaksi');
		$id_member 	= $this->input->post('id_member');
		$saldo 		= $this->input->post('saldo');
		$nominal 	= $this->input->post('nominal');
		$status 	= $this->input->post('submit');

		if ($status == 'konfirmasi') {
			$status = '1';
		}else{
			$status = '0';
		}

		$saldo = $saldo + $nominal;

		$topup = $this->ModelTopup->update_topup($id, $status);

		if ($status == 1) {
			$this->ModelBisnis->update_saldo($id_member, $saldo);
		}

		redirect('admin/konfirmasi','refresh');
	}

	public function topik()
	{
		$datas['topik'] = $this->ModelTopik->get_topik()->result();

		$this->load->view('layouts/header');
		$this->load->view('admin/topik', $datas);
		$this->load->view('layouts/footer');
	}

	public function get_topik()
	{
		$id = $this->uri->segment(3);
		$data = $this->ModelTopik->get_topik_by_id($id)->result();
		
		echo json_encode($data);
	}


	public function store_topik()
	{
		$id = $this->input->post('id_topik');
		$topik = $this->input->post('topik');
		$status = $this->input->post('status');

		$data = array(
			'id_topik' => $id,
			'nama_topik' => $topik,
			'status' => $status, 
		);

		if (isset($id)) {
			$this->ModelTopik->update_topik($id, $data);
		}else{
			$this->ModelTopik->insert_topik($data);
		}

		redirect('admin/topik','refresh');
	}

	public function delete_topik(){
		$id_topik = $this->input->get('id_topik');

		$this->ModelTopik->delete_topik($id_topik);
		redirect('admin/topik','refresh');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */