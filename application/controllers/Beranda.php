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
		$this->load->model('ModelProfil');	
		
	}

	public function index()
	{
		$id_member = $this->session->userdata('id_member');
		$ql = $this->db->select('*')->from('m_feed')->where('id_member',$id_member)->get();

		if ($ql->num_rows() < 5) {
			redirect('beranda/add_feed','refresh');
		}
		
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

		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan($id_member);
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban();
		$datas['topik'] = $this->ModelTopik->get_topik_feed($id_member)->result();

		$this->load->view('header');
		$this->load->view('beranda', $datas);
		$this->load->view('footer');
	}

	public function feed($id_topik)
	{
		$id_member = $this->session->userdata('id_member');
		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_by_topik($id_topik);
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban();
		$datas['topik'] = $this->ModelTopik->get_topik_feed($id_member)->result();

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

	public function cari()
	{

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

		$keyword = $this->input->get('search');
		$datas['topik'] = $this->ModelTopik->get_topik()->result();
		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_by_keyword($keyword);
		$datas['member'] = $this->ModelProfil->get_member_by_keyword($keyword);

		$this->load->view('header');
		$this->load->view('cari', $datas);
		$this->load->view('footer');

	}

	public function jawab()
	{
		$id_member = $this->session->userdata('id_member');
		$ql = $this->db->select('*')->from('m_feed')->where('id_member',$id_member)->get();

		if ($ql->num_rows() < 5) {
			redirect('beranda/add_feed','refresh');
		}
		
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

		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_feed($id_member);
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban();
		$datas['topik'] = $this->ModelTopik->get_topik_feed($id_member)->result();

		$this->load->view('header');
		$this->load->view('beranda', $datas);
		$this->load->view('footer');
	}

	public function add_feed()
	{	
		$datas['topik'] = $this->ModelTopik->get_topik()->result();

		$this->load->view('header');
		$this->load->view('tambah_topik', $datas);
		$this->load->view('footer');
	}

	public function add_feed_action_one()
	{	
		$id_member = $this->session->userdata('id_member');
		$topik_feed = $this->input->post('topik');

		$datas = array('id_member' => $id_member, 'id_topik' => $topik_feed);
		$this->ModelProfil->add_topik_feed($datas);
		redirect('beranda','refresh');
	}

	public function add_feed_action()
	{
		$id_member = $this->session->userdata('id_member');
		$topik_feed = $this->input->post('topik');

		$ql = $this->db->select('*')->from('m_feed')->where('id_member',$id_member)->get();
		if ($ql->num_rows() > 0) {
			$this->ModelProfil->delete_feed_member($id_member);
		}

		foreach ($topik_feed as $key) {
			$datas = array('id_member' => $id_member, 'id_topik' => $key);
			$this->ModelProfil->add_topik_feed($datas);
		}
		redirect('beranda','refresh');
	}

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */