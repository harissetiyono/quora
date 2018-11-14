<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAds');
		$this->load->model('ModelBisnis');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$id_topik = 3;
		$datas['adset'] = $this->ModelAds->get_ads_by_topik($id_topik);

		$id_adset = $datas['adset'][0]['id_adset'];
		$tanggal = date("Y-m-d");

		$datas['adset_impression'] = $this->ModelAds->get_impression_log($id_adset, $tanggal);

		if (!empty($datas['adset_impression'])) {

			$jumlah = $datas['adset_impression'][0]['jumlah']+1;

			$this->ModelAds->update_impression_adset($id_adset, $tanggal, $jumlah);
		}else{
			$datas = array(
				'id_adset' => $id_adset, 
				'tanggal' => $tanggal, 
			);

			$this->ModelAds->insert_impression_adset($datas);
		}


		$datas['impression'] = $this->ModelAds->get_impression_by_adset($id_adset);

		$this->ModelBisnis->update_impression($id_adset, $datas['impression'][0]['impression']);

		$this->load->view('layouts/header');
		$this->load->view('welcome_message', $datas);
	}

	public function action_click()
	{
		$id_adset = $this->input->post('id_adset');
		$tanggal = date("Y-m-d");
		$url = $this->input->post('url');

		$datas['click_log'] = $this->ModelAds->get_click_log($id_adset, $tanggal);

		if (!empty($datas['click_log'])) {

			$jumlah = $datas['click_log'][0]['jumlah']+1;

			$this->ModelAds->update_click_adset($id_adset, $tanggal, $jumlah);

		}else{
			$datas = array(
				'id_adset' => $id_adset, 
				'tanggal' => $tanggal, 
			);

			$this->ModelAds->insert_click_adset($datas);
		}

		$datas['click'] = $this->ModelAds->get_click_by_adset($id_adset);
		
		$this->ModelBisnis->update_click($id_adset, $datas['click'][0]['click']);

		redirect($url,'refresh');
		
	}
}
