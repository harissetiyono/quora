<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSpam extends CI_Model {

	public function get_spam_pertanyaan(){
		$this->db->select('*');
		$this->db->from('m_spam_pertanyaan');
		$this->db->join('m_pertanyaan', 'm_spam_pertanyaan.id_pertanyaan = m_pertanyaan.id_pertanyaan');
		return $this->db->get();
	}

	public function get_spam_jawaban(){
		$this->db->select('*');
		$this->db->from('m_spam_jawaban');
		$this->db->join('m_jawaban', 'm_spam_jawaban.id_jawaban = m_jawaban.id_jawaban');
		return $this->db->get();
	}

	public function update_spam_pertanyaan($id, $data){
		$this->db->where('id_spam', $id);
		$this->db->update('m_spam_pertanyaan', $data);
	}

	public function update_spam_jawaban($id){
		$this->db->where('id_spam', $id);
		$this->db->update('m_spam_jawaban', $data);
	}

}

/* End of file ModelSpam.php */
/* Location: ./application/models/ModelSpam.php */