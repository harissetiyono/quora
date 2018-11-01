<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bisnis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelBisnis');
	}

	public function index()
	{
		$this->load->view('bisnis/index');
		$this->load->view('layouts/footer');
	}

	public function home()
	{
		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/home');
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$member = $this->ModelBisnis->get_member($email);
		
		if (password_verify($password, $member[0]['password'])) {
			$message = $this->session->set_flashdata('message', 'Selamat datang di member bisnis');
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

}

/* End of file Member_bisnis.php */
/* Location: ./application/controllers/Member_bisnis.php */