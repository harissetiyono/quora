<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAds extends CI_Model {

	public function get_ads_by_topik($id_topik)
	{
		$this->db->where('topik', $id_topik);
		$this->db->limit(1);
		$this->db->order_by('cpc', 'desc');
		return $this->db->get('mb_ad_set')->result_array();
	}

	public function get_impression_by_adset($id_adset)
	{
		$this->db->select('SUM(jumlah) as impression');
		$this->db->where('id_adset', $id_adset);
		return $this->db->get('ad_impression_log')->result_array();
	}

	public function get_click_by_adset($id_adset)
	{
		$this->db->select('SUM(jumlah) as click');
		$this->db->where('id_adset', $id_adset);
		return $this->db->get('ad_click_log')->result_array();
	}

	public function get_impression_log($id_adset, $tanggal)
	{
		$this->db->where('id_adset', $id_adset);
		$this->db->where('tanggal', $tanggal);
		$this->db->limit(1);
		return $this->db->get('ad_impression_log')->result_array();
	}

	public function get_click_log($id_adset, $tanggal)
	{
		$this->db->where('id_adset', $id_adset);
		$this->db->where('tanggal', $tanggal);
		$this->db->limit(1);
		return $this->db->get('ad_click_log')->result_array();
	}

	public function insert_impression_adset($datas)
	{
		$this->db->insert('ad_impression_log', $datas);
	}

	public function update_impression_adset($id_adset,$tanggal,$jumlah)
	{
		$this->db->where('id_adset', $id_adset);
		$this->db->where('tanggal', $tanggal);
		$this->db->set('jumlah', $jumlah);
		$this->db->update('ad_impression_log');
	}

	public function insert_click_adset($datas)
	{
		$this->db->insert('ad_click_log', $datas);
	}

	public function update_click_adset($id_adset,$tanggal,$jumlah)
	{
		$this->db->where('id_adset', $id_adset);
		$this->db->where('tanggal', $tanggal);
		$this->db->set('jumlah', $jumlah);
		$this->db->update('ad_click_log');
	}

}

/* End of file ModelAds.php */
/* Location: ./application/models/ModelAds.php */