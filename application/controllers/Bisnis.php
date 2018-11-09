<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bisnis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelBisnis');

		// if ($this->session->userdata('logged_in') == null) {
		// 	redirect('bisnis');
		// }
	}

	public function index()
	{
		$this->load->view('bisnis/index');
		$this->load->view('layouts/footer');
	}

	public function manage()
	{

		$id_member_bisnis = $this->session->userdata('id');
		$id_member_bisnis = $this->ModelBisnis->get_id_member_bisnis($id_member_bisnis);

		if ($id_member_bisnis == 0) {
			redirect('bisnis/home');
		}

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/dashboard');
		$this->load->view('layouts/footer');
	}

	public function audience()
	{
		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/audiences');
		$this->load->view('layouts/footer');
	}

	public function report()
	{
		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/report');
		$this->load->view('layouts/footer');
	}

	public function home()
	{

		$id_member_bisnis = $this->session->userdata('id');
		$id_member_bisnis = $this->ModelBisnis->get_id_member_bisnis($id_member_bisnis);

		if ($this->session->userdata('logged_in') == null) {
			redirect('bisnis');
		}
		
		if ($id_member_bisnis == 1) {
			redirect('bisnis/manage');
		}

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/home');
		$this->load->view('layouts/footer');
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$member = $this->ModelBisnis->get_member($email);
		
		if (password_verify($password, $member[0]['password'])) {
			$newdata = array(
		        'id'  => $member[0]['id'],
		        'nama'  => $member[0]['nama'],
		        'email'  => $email,
		        'logged_in' => TRUE
			);

			$this->session->set_userdata($newdata);

			$message 	= $this->session->set_flashdata('message', 'Selamat datang di member bisnis');
			redirect('bisnis/home', $message);
		}else{
			$message = $this->session->set_flashdata('message', 'Maaf email / password salah');
			redirect('bisnis', $message);
		}
	}

	public function store_member(){
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = array(
			'nama' => $nama_depan.' '.$nama_belakang, 
			'email' => $email, 
			'password' => password_hash($password,PASSWORD_DEFAULT),
		);

		$insert = $this->ModelBisnis->insert_member($data);

		if ($insert) {
			redirect('bisnis','refresh');
		}else{
			$this->output->enable_profiler(TRUE);
		}
	}

	public function store_detail_member(){
		$id_bisnis = $this->input->post('id_bisnis');
		$nama_bisnis = $this->input->post('nama_bisnis');
		$alamat_bisnis = $this->input->post('alamat_bisnis');
		$telepon_bisnis = $this->input->post('telepon_bisnis');
		$tax_id_bisnis = $this->input->post('tax_id_bisnis');
		$logo = $this->input->post('logo');
		$website = $this->input->post('website');
		$industri_kategori = $this->input->post('industri_kategori');
		$deskripsi_bisnis = $this->input->post('deskripsi_bisnis');
		$cp_bisnis = $this->input->post('cp_bisnis');

		$datas = array(
			'id_member_bisnis' => $id_bisnis,
			'nama_bisnis' => $nama_bisnis,
			'alamat_bisnis' => $alamat_bisnis,
			'telepon_bisnis' => $telepon_bisnis,
			'tax_id_bisnis' => $tax_id_bisnis,
			'logo' => $logo,
			'website' => $website,
			'industri_kategori' => $industri_kategori,
			'deskripsi_bisnis' => $deskripsi_bisnis,
			'cp_bisnis' => $cp_bisnis,
		);

		$insert = $this->ModelBisnis->insert_detail_member($datas);
		
		if ($insert) {
			redirect('bisnis','refresh');
		}else{
			echo "data duplikat";
		}
	}

	public function add_campaign()
	{

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/add_campaign');
		$this->load->view('layouts/footer');
	}

}

/* End of file Member_bisnis.php */
/* Location: ./application/controllers/Member_bisnis.php */