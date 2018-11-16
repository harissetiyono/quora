<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_member($email){
		$this->db->where('email', $email);
		return $this->db->get('member')->result_array();
	}

	public function insert_member_new($data){
		$this->db->insert('member', $data);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	
}

/* End of file ModelBisnis.php */
/* Location: ./application/models/ModelBisnis.php */