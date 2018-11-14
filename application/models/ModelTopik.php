<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTopik extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_topik(){
		$this->db->order_by("nama_topik", "asc");
		return $this->db->get('topik');
	}

	public function get_topik_by_id($id){
		$this->db->where('id_topik', $id);
		return $this->db->get('topik');
	}

	public function insert_topik($data){
		$this->db->insert('topik', $data);
		return true;
	}

	public function delete_topik($id){
		$this->db->where('id_topik', $id);
		$this->db->delete('topik');
	}

	public function update_topik($id,$data){
		$this->db->where('id_topik', $id);
		$this->db->update('topik', $data);

		return true;
	}
}

/* End of file modelTopik.php */
/* Location: ./application/models/modelTopik.php */