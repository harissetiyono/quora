<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDukungan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function dukungan()
	{
		// $this->db->where('id_jawaban', $id_jawaban);
		return $this->db->get('m_dukungan')->result_array();
	}

	public function check_dukung($id_member, $id_jawaban)
	{
		$this->db->where('id_member', $id_member);
		$this->db->where('id_jawaban', $id_jawaban);
		$query = $this->db->get('m_dukungan');

		if (!empty($query->result_array())){
        	return true;
	    }
	    else{
	        return false;
	    }
	}

	public function insert_dukung($datas)
	{
		$this->db->insert('m_dukungan', $datas);
	}

	public function delete_dukungan($id_member, $id_jawaban,$dukungan)
	{
		$this->db->where('id_member', $id_member);
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->where('dukungan', $dukungan);
		$this->db->delete('m_dukungan');
	}

	public function update_dukung($id_jawaban, $datas)
	{
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->update('m_dukungan', $datas);
	}	

}

/* End of file ModelDukungan.php */
/* Location: ./application/models/ModelDukungan.php */