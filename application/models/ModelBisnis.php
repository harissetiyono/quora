<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelBisnis extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_member($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('member_bisnis')->result_array();
	}

	public function get_id_member_bisnis($id)
	{
		$this->db->where('id_member_bisnis', $id);
		$query = $this->db->get('mb_bisnis_detail');

		if (!empty($query->result_array())){
        	return 1;
	    }
	    else{
	        return 0;
	    }
	}

	public function insert_member($data)
	{
		$this->db->insert('member_bisnis', $data);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function insert_detail_member($data)
	{
		$this->db->insert('mb_bisnis_detail', $data);
	}

	public function update_saldo($id, $saldo)
	{
		$this->db->where('id', $id);
		$this->db->set('saldo', $saldo);
		$this->db->update('member_bisnis');
	}
}

/* End of file ModelBisnis.php */
/* Location: ./application/models/ModelBisnis.php */