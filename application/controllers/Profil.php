<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelProfil');
		$this->load->model('ModelPertanyaan');
		$this->load->model('ModelJawaban');
	}

	public function index()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_by_member($id_member);

		$this->load->view('header');
		$this->load->view('profil', $datas);
		$this->load->view('footer');
	}

	public function id($id)
	{
		$datas['profil'] = $this->ModelProfil->profil($id);
		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_by_member($id);
		// $datas['jawaban'] = $this->ModelJawaban->get_jawaban_by_member($id);

		$this->load->view('header');
		$this->load->view('profil_member_lain', $datas);
		$this->load->view('footer');
	}

	public function id_jawaban($id)
	{
		$datas['profil'] = $this->ModelProfil->profil($id);
		// $datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_by_member($id);
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban_by_member($id);

		$this->load->view('header');
		$this->load->view('profil_member_lain_jawaban', $datas);
		$this->load->view('footer');
	}

	public function jawaban()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban_by_member($id_member);

		$this->load->view('header');
		$this->load->view('profil-jawaban', $datas);
		$this->load->view('footer');
	}

	public function pengikut()
	{

		$id_member = $this->session->userdata('id_member');
		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pengikut'] = $this->ModelProfil->pengikut($id_member);

		$this->load->view('header');
		$this->load->view('pengikut', $datas);
		$this->load->view('footer');
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */