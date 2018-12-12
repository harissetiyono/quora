<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelLogin');

	}

	public function index()
	{
		if (!empty($this->session->userdata('id_member'))) {
			redirect('beranda','refresh');
		}
		
		$this->load->view('login');
	}


	public function check_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$remember = $this->input->post('remember_me');

		$member = $this->ModelLogin->get_member($email);
		
		if (password_verify($password, $member[0]['password'])) {
			$message = $this->session->set_flashdata('message', 'Selamat datang di Quora');
			$session = array(
				'id_member' => $member[0]['id_member'], 
				'nama' => $member[0]['nama'], 
				'email' => $member[0]['email'], 
			);

			if ($remember == 1) {
				set_cookie($session);
			}

			$this->session->set_userdata($session);
			redirect('beranda', $message);
		}else{
			$message = $this->session->set_flashdata('message', 'Maaf email / password salah');
			redirect('login', $message);
		}
	}

	public function register()
	{
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = array(
			'nama' => $nama_depan.' '.$nama_belakang, 
			'email' => $email, 
			'password' => password_hash($password,PASSWORD_DEFAULT),
		);

		$insert = $this->ModelLogin->insert_member_new($data);

		if ($insert) {
			$message = $this->session->set_flashdata('message', 'Pendaftaran berhasil, silahkan login');
			redirect('login',$message);
		}else{
			$this->output->enable_profiler(TRUE);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}

