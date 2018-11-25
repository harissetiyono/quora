<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProfil extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function profil($id_member)
	{
		$this->db->where('id_member', $id_member);
		return $this->db->get('member')->result_array();
	}

	public function pengikut($id_member)
	{
		$this->db->join('member', 'member.id_member = m_pengikut.id_following');
		$this->db->where('id_followed', $id_member);
		return $this->db->get('m_pengikut')->result_array();
	}

}

/* End of file ModelProfil.php */
/* Location: ./application/models/ModelProfil.php */