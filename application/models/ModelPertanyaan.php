<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPertanyaan extends CI_Model {

public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_pertanyaan()
	{	
		$this->db->where('m_pertanyaan.status', 1);
		$this->db->join('topik', 'topik.id_topik = m_pertanyaan.id_topik');
		$this->db->order_by('tanggal', 'desc');
		return $this->db->get('m_pertanyaan')->result_array();
	}

	public function get_pertanyaan_by_id($id_pertanyaan)
	{
		$this->db->where('m_pertanyaan.status', 1);
		$this->db->where('id_pertanyaan', $id_pertanyaan);
		return $this->db->get('m_pertanyaan')->result_array();
	}

	public function get_pertanyaan_by_topik($id_topik)
	{
		$this->db->where('m_pertanyaan.status', 1);
		$this->db->join('topik', 'topik.id_topik = m_pertanyaan.id_topik');
		$this->db->where('topik.id_topik', $id_topik);
		return $this->db->get('m_pertanyaan')->result_array();
	}

	public function get_pertanyaan_by_member($id_member)
	{
		$this->db->join('topik', 'topik.id_topik = m_pertanyaan.id_topik');
		$this->db->where('id_member', $id_member);
		return $this->db->get('m_pertanyaan')->result_array();
	}


	public function insert_pertanyaan($datas)
	{
		$this->db->insert('m_pertanyaan', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function update_pertanyaan($id_pertanyaan, $datas)
	{
		$this->db->where('id_pertanyaan', $id_pertanyaan);
		$this->db->update('m_pertanyaan', $datas);

		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function delete_pertanyaan($id_pertanyaan)
	{
		$this->db->where('id_pertanyaan', $id_pertanyaan);
		$this->db->delete('m_pertanyaan');
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function ikuti_pertanyaan($datas)
	{
		$this->db->insert('m_pengikut_pertanyaan', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function laporakan_spam($datas)
	{
		$this->db->insert('m_spam_pertanyaan', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

}

/* End of file ModelPertanyaan.php */
/* Location: ./application/models/ModelPertanyaan.php */