<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('admin/index');
		$this->load->view('layouts/footer');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */