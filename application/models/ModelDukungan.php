<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDukungan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function check_dukung($id_member, $id_jawaban)
	{
		$this->db->where('id_member', $id_member);
		$this->db->where('id_jawaban', $id_jawaban);
		$query = $this->db->get('m_dukungan');

		if (!empty($query->result_array())){
        	return 1;
	    }
	    else{
	        return 0;
	    }
	}

	public function insert_dukung($datas)
	{
		$this->db->insert('m_dukungan', $datas);
	}

	public function update_dukung($id_jawaban, $datas)
	{
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->update('m_dukungan', $datas);
	}

	public function delete_dukung()
	{
		
	}	

}

/* End of file ModelDukungan.php */
/* Location: ./application/models/ModelDukungan.php */