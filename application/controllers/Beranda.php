<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

		$this->load->model('ModelPertanyaan');	
		$this->load->model('ModelJawaban');	
		$this->load->model('ModelAds');	
		$this->load->model('ModelTopik');	
		$this->load->model('ModelBisnis');	
	}

	public function index()
	{
		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan();
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban();
		$datas['topik'] = $this->ModelTopik->get_topik()->result();

		$datas['adset'] = $this->ModelAds->get_ads_by();

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

		$this->load->view('header');
		$this->load->view('beranda', $datas);
		$this->load->view('footer');
	}

	public function feed($id_topik)
	{
		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_by_topik($id_topik);
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban();
		$datas['topik'] = $this->ModelTopik->get_topik()->result();

		$datas['adset'] = $this->ModelAds->get_ads_by();

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

		$this->load->view('header');
		$this->load->view('beranda', $datas);
		$this->load->view('footer');
	}

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */