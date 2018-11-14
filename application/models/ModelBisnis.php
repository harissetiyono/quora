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

	public function get_id_bisnis($id)
	{
		$this->db->where('id_member_bisnis', $id);
		return $this->db->get('mb_bisnis_detail')->result_array();
	}

	public function get_id_member_bisnis_detail($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('member_bisnis')->result_array();
	}

	public function get_all_kampanye()
	{
		return $this->db->get('mb_kampanye')->result_array();
	}

	public function get_kampanye_by_id_bisnis($id)
	{
		$this->db->select('mb_kampanye.id_kampanye, nama_kampanye, SUM(impressions) as impression, SUM(click) as click, mb_kampanye.status');
		$this->db->where('id_bisnis', $id);
		$this->db->join('mb_ad_set', 'mb_ad_set.id_kampanye = mb_kampanye.id_kampanye');
		$this->db->group_by('id_kampanye');
		return $this->db->get('mb_kampanye')->result_array();
	}

	public function get_bank()
	{
		return $this->db->get('mb_metode_pembayaran')->result_array();
	}

	public function get_adset_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('mb_ad_set');
		$this->db->join('mb_kampanye', 'mb_ad_set.id_kampanye = mb_kampanye.id_kampanye');
		$this->db->where('id_adset', $id);
		return $this->db->get()->result_array();
	}

	public function get_kampanye_adset($id)
	{
		// $this->db->select('mb_ad_set.id_adset,nama_adset, SUM(ad_impression_log.jumlah) as impression, SUM(ad_click_log.jumlah) as click, cpc, status');
		$this->db->select('*');
		$this->db->from('mb_ad_set');
		// $this->db->join('ad_click_log', 'ad_click_log.id_adset = mb_ad_set.id_adset');
		// $this->db->join('ad_impression_log', 'ad_impression_log.id_adset = mb_ad_set.id_adset');
		$this->db->where('id_kampanye', $id);
		return $this->db->get()->result_array();
	}

	public function get_kampanye($id)
	{
		$this->db->where('id_kampanye', $id);
		return $this->db->get('mb_kampanye')->result_array();
	}

	public function get_transaction($id)
	{
		$this->db->select('*');
		$this->db->from('mb_topup_transaksi');
		$this->db->join('mb_metode_pembayaran', 'mb_metode_pembayaran.id_metode_pembayaran = mb_topup_transaksi.id_metode_pembayaran');
		$this->db->where('id_member_bisnis', $id);
		return $this->db->get()->result_array();
	}

	public function get_transaction_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('mb_topup_transaksi');
		$this->db->join('mb_metode_pembayaran', 'mb_metode_pembayaran.id_metode_pembayaran = mb_topup_transaksi.id_metode_pembayaran');
		$this->db->where('id_transaksi', $id);
		return $this->db->get()->result_array();
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

	public function update_detail_member($id_bisnis, $datas)
	{
		$this->db->where('id_bisnis', $id_bisnis);
		$this->db->update('mb_bisnis_detail', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function update_saldo($id, $saldo)
	{
		$this->db->where('id', $id);
		$this->db->set('saldo', $saldo);
		$this->db->update('member_bisnis');
	}

	public function insert_campaign($datas)
	{
		$this->db->insert('mb_kampanye', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function insert_adset($datas)
	{
		$this->db->insert('mb_ad_set', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}
	public function insert_topup($datas)
	{
		$this->db->insert('mb_topup_transaksi', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function update_adset($id_adset, $datas)
	{
		$this->db->where('id_adset', $id_adset);
		$this->db->update('mb_ad_set', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function update_status_adset($id_adset, $status)
	{
		$this->db->where('id_adset', $id_adset);
		$this->db->set('status', $status);
		$this->db->update('mb_ad_set');

		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function upload_bukti($id_transaksi, $bukti)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->set('bukti', $bukti);
		$this->db->set('status', 0);
		$this->db->update('mb_topup_transaksi');

		if($this->db->affected_rows() > 0)
		{
		    return true;
		}
	}

	public function delete_adset($id_adset)
	{
		$this->db->where('id_adset', $id_adset);
		$this->db->delete('mb_ad_set');
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function update_impression($id_adset, $impression)
	{
		$this->db->where('id_adset', $id_adset);
		$this->db->set('impressions', $impression);
		$this->db->update('mb_ad_set');
	}

	public function update_click($id_adset, $click)
	{
		$this->db->where('id_adset', $id_adset);
		$this->db->set('click', $click);
		$this->db->update('mb_ad_set');
	}
}

/* End of file ModelBisnis.php */
/* Location: ./application/models/ModelBisnis.php */