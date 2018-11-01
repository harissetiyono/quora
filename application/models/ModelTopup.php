<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTopup extends CI_Model {

	public function get_topup()
	{
		$this->db->select('*');
		$this->db->from('mb_topup_transaksi');
		$this->db->join('mb_metode_pembayaran', 'mb_topup_transaksi.id_metode_pembayaran = mb_metode_pembayaran.id_metode_pembayaran');
		$this->db->join('member_bisnis', 'member_bisnis.id = mb_topup_transaksi.id_member_bisnis');
		return $this->db->get();
	}	

	public function update_topup($id,$status){
		$this->db->where('id_transaksi', $id);
		$this->db->set('status', $status);
		$this->db->update('mb_topup_transaksi');
	}

}

/* End of file ModelTopup.php */
/* Location: ./application/models/ModelTopup.php */