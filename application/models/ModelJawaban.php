<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJawaban extends CI_Model {

public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_jawaban()
	{
		$this->db->where('m_jawaban.status', 1);
		return $this->db->get('m_jawaban')->result_array();
	}

	public function get_jawaban_by_topik($id_topik)
	{
		$this->db->where('id_topik', $id_topik);
		return $this->db->get('m_jawaban')->result_array();
	}

	public function get_jawaban_by_id_pertanyaan($id_pertanyaan)
	{
		$this->db->where('m_jawaban.status', 1);
		$this->db->where('id_pertanyaan', $id_pertanyaan);
		// $this->db->join('m_dukungan', 'm_dukungan.id_jawaban = m_jawaban.id_jawaban');
		return $this->db->get('m_jawaban')->result_array();
	}

	public function get_jawaban_by_member($id_member)
	{
		$this->db->join('m_pertanyaan', 'm_pertanyaan.id_pertanyaan = m_jawaban.id_pertanyaan');
		$this->db->where('m_pertanyaan.id_member', $id_member);
		return $this->db->get('m_jawaban')->result_array();
	}

	public function insert_jawaban($datas)
	{
		$this->db->insert('m_jawaban', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function update_jawaban($id_jawaban, $datas)
	{
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->update('m_jawaban', $datas);

		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function delete_jawaban($id_jawaban)
	{
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->delete('m_jawaban');
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function laporakan_spam($datas)
	{
		$this->db->insert('m_spam_jawaban', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}
}

/* End of file ModelJawaban.php */
/* Location: ./application/models/ModelJawaban.php */