<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bisnis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelBisnis');
		// if ($this->session->userdata('logged_in') == null) {
		// 	redirect('bisnis');
		// }
		
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}

	public function index()
	{
		$this->load->view('bisnis/index');
		$this->load->view('layouts/footer');
	}

	public function manage()
	{

		$id_member_bisnis = $this->session->userdata('id');
		$id_member_bisnis = $this->ModelBisnis->get_id_member_bisnis($id_member_bisnis);

		if ($id_member_bisnis == 0) {
			redirect('bisnis/home');
		};

		$datas['kampanye'] = $this->ModelBisnis->get_kampanye_by_id_bisnis($id_member_bisnis);
		$datas['member_bisnis'] = $this->ModelBisnis->get_id_member_bisnis_detail($id_member_bisnis);

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/dashboard', $datas);
		$this->load->view('layouts/footer');
	}

	public function manage_adset($id_kampanye)
	{

		$id_member_bisnis = $this->session->userdata('id');
		$id_member_bisnis = $this->ModelBisnis->get_id_member_bisnis($id_member_bisnis);

		if ($id_member_bisnis == 0) {
			redirect('bisnis/home');
		};

		$datas['adset'] = $this->ModelBisnis->get_kampanye_adset($id_kampanye);

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/adset_data', $datas);
		$this->load->view('layouts/footer');
	}

	public function audience()
	{
		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/audiences');
		$this->load->view('layouts/footer');
	}

	public function report()
	{
		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/report');
		$this->load->view('layouts/footer');
	}

	public function billing()
	{
		$id = $this->session->userdata('id');
		$datas['member_bisnis'] = $this->ModelBisnis->get_id_member_bisnis_detail($id);
		$datas['transaction'] = $this->ModelBisnis->get_transaction($id);
		$datas['bank'] = $this->ModelBisnis->get_bank();

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/billing', $datas);
		$this->load->view('layouts/footer');
	}

	public function home()
	{

		$id_member_bisnis = $this->session->userdata('id');
		$id_member_bisnis = $this->ModelBisnis->get_id_member_bisnis($id_member_bisnis);

		if ($this->session->userdata('logged_in') == null) {
			redirect('bisnis');
		}
		
		if ($id_member_bisnis == 1) {
			redirect('bisnis/manage');
		}

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/home');
		$this->load->view('layouts/footer');
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$member = $this->ModelBisnis->get_member($email);
		
		if (password_verify($password, $member[0]['password'])) {
			$newdata = array(
		        'id'  => $member[0]['id'],
		        'nama'  => $member[0]['nama'],
		        'email'  => $email,
		        'logged_in' => TRUE
			);

			$this->session->set_userdata($newdata);

			$message 	= $this->session->set_flashdata('message', 'Selamat datang di member bisnis');
			redirect('bisnis/home', $message);
		}else{
			$message = $this->session->set_flashdata('message', 'Maaf email / password salah');
			redirect('bisnis', $message);
		}
	}

	public function account_setting($id_member_bisnis)
	{
		$datas['account'] = $this->ModelBisnis->get_id_bisnis($id_member_bisnis);

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/account', $datas);
		$this->load->view('layouts/footer');
	}

	public function store_member(){
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = array(
			'nama' => $nama_depan.' '.$nama_belakang, 
			'email' => $email, 
			'password' => password_hash($password,PASSWORD_DEFAULT),
		);

		$insert = $this->ModelBisnis->insert_member($data);

		if ($insert) {
			redirect('bisnis','refresh');
		}else{
			$this->output->enable_profiler(TRUE);
		}
	}

	public function store_detail_member(){
		$id_bisnis = $this->input->post('id_bisnis');
		$nama_bisnis = $this->input->post('nama_bisnis');
		$alamat_bisnis = $this->input->post('alamat_bisnis');
		$telepon_bisnis = $this->input->post('telepon_bisnis');
		$tax_id_bisnis = $this->input->post('tax_id_bisnis');
		$logo = $this->input->post('logo');
		$website = $this->input->post('website');
		$industri_kategori = $this->input->post('industri_kategori');
		$deskripsi_bisnis = $this->input->post('deskripsi_bisnis');
		$cp_bisnis = $this->input->post('cp_bisnis');

		$datas = array(
			'id_member_bisnis' => $id_bisnis,
			'nama_bisnis' => $nama_bisnis,
			'alamat_bisnis' => $alamat_bisnis,
			'telepon_bisnis' => $telepon_bisnis,
			'tax_id_bisnis' => $tax_id_bisnis,
			'logo' => $logo,
			'website' => $website,
			'industri_kategori' => $industri_kategori,
			'deskripsi_bisnis' => $deskripsi_bisnis,
			'cp_bisnis' => $cp_bisnis,
		);

		$insert = $this->ModelBisnis->insert_detail_member($datas);
		
		if ($insert) {
			redirect('bisnis','refresh');
		}else{
			echo "data duplikat";
		}
	}

	public function update_detail_member()
	{
		$id_member_bisnis = $this->input->post('id_member_bisnis');
		$id_bisnis = $this->input->post('id_bisnis');
		$nama_bisnis = $this->input->post('nama_bisnis');
		$alamat_bisnis = $this->input->post('alamat_bisnis');
		$telepon_bisnis = $this->input->post('telepon_bisnis');
		$tax_id_bisnis = $this->input->post('tax_id_bisnis');
		$website = $this->input->post('website');
		$industri_kategori = $this->input->post('industri_kategori');
		$deskripsi_bisnis = $this->input->post('deskripsi_bisnis');
		$cp_bisnis = $this->input->post('cp_bisnis');

		$config['upload_path'] = './assets/logo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '5000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$config['file_name']  = $id_bisnis;
		$config['overwrite']  = TRUE;
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('logo'))
	    {
	      $data = array('data' => $this->upload->display_errors());
	      $message 	= $this->session->set_flashdata('message', $this->upload->display_errors());
	    }
	    else
	    {
	      $data = array('data' => $this->upload->data());
	      $message 	= $this->session->set_flashdata('message', 'data account berhasil diubah');
	    }

	  if (empty($_FILES['logo']['name'])) {
			$datas = array(
				'id_member_bisnis' => $id_member_bisnis,
				'id_bisnis' => $id_bisnis,
				'nama_bisnis' => $nama_bisnis,
				'alamat_bisnis' => $alamat_bisnis,
				'telepon_bisnis' => $telepon_bisnis,
				'tax_id_bisnis' => $tax_id_bisnis,
				'website' => $website,
				'industri_kategori' => $industri_kategori,
				'deskripsi_bisnis' => $deskripsi_bisnis,
				'cp_bisnis' => $cp_bisnis,
			);
		}else{
			$datas = array(
				'id_member_bisnis' => $id_member_bisnis,
				'id_bisnis' => $id_bisnis,
				'nama_bisnis' => $nama_bisnis,
				'alamat_bisnis' => $alamat_bisnis,
				'telepon_bisnis' => $telepon_bisnis,
				'tax_id_bisnis' => $tax_id_bisnis,
				'logo' => $data['data']['file_name'],
				'website' => $website,
				'industri_kategori' => $industri_kategori,
				'deskripsi_bisnis' => $deskripsi_bisnis,
				'cp_bisnis' => $cp_bisnis,
			);
		}
		
		$update = $this->ModelBisnis->update_detail_member($id_bisnis, $datas);

		if ($update) {

			redirect('bisnis/account_setting/'.$id_bisnis, $message);
		}else{
			echo "data gagal update";
		}

	}

	public function add_campaign()
	{
		$this->session->set_userdata('referred_from', current_url());

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/add_campaign');
		$this->load->view('layouts/footer');
	}

	public function add_adset($id_kampanye)
	{
		$this->load->model('ModelTopik');

		$datas['kampanye'] = $this->ModelBisnis->get_kampanye($id_kampanye);
		$datas['topik'] = $this->ModelTopik->get_topik()->result();

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/add_adset', $datas);
		$this->load->view('layouts/footer');
	}

	public function store_campaign()
	{
		$m=microtime(true);
		$id = sprintf("%8x%05x",floor($m),($m-floor($m))*1000000);

		$id_kampanye = $id;
		$id_bisnis = $this->session->userdata('id');
		$nama_kampanye	= $this->input->post('nama_kampanye');
		$tipe	= $this->input->post('tipe');
		$anggaran_perhari	= $this->input->post('anggaran_perhari');
		$anggaran_selamanya	= $this->input->post('anggaran_selamanya');
		$tipe_jadwal	= $this->input->post('tipe_jadwal');
		$tanggal_mulai	= $this->input->post('tanggal_mulai');
		$tanggal_selesai	= $this->input->post('tanggal_selesai');

		$datas = array(
			'id_kampanye' => $id_kampanye, 
			'id_bisnis' => $id_bisnis, 
			'nama_kampanye' => $nama_kampanye, 
			'tipe' => $tipe, 
			'anggaran_perhari' => $anggaran_perhari, 
			// 'anggaran_selamanya' => $anggaran_selamanya, 
			'tipe_jadwal' => $tipe_jadwal, 
			'tanggal_mulai' => $tanggal_mulai, 
			'tanggal_selesai' => $tanggal_selesai, 
			'status' => 'aktif', 
		);

		$insert = $this->ModelBisnis->insert_campaign($datas);

		if ($insert) {
			redirect('bisnis/add_adset/'.$id_kampanye,'refresh');
		}else{
			echo "gagal";
		}
	}

	public function store_adset()
	{
		$id_kampanye 	= $this->input->post('id_kampanye');
		$nama_bisnis	= $this->input->post('nama_bisnis');
		$nama_adset		= $this->input->post('nama_adset');
		$judul			= $this->input->post('judul');
		$deskripsi		= $this->input->post('deskripsi');
		$topik			= $this->input->post('topik');
		$url			= $this->input->post('url');
		$cpc			= $this->input->post('cpc');
		$status			= 'aktif';

		$datas = array(
			'id_kampanye' => $id_kampanye,
			'nama_bisnis' => $nama_bisnis,
			'nama_adset' => $nama_adset,
			'judul' => $judul,
			'deskripsi' => $deskripsi,
			'topik' => $topik,
			'url' => $url,
			'cpc' => $cpc,
			'status' => $status,
		);
		
		$insert = $this->ModelBisnis->insert_adset($datas);
		$message 	= $this->session->set_flashdata('message', 'Selamat Iklan sudah siap ditampilkan !');

		if ($insert) {
			redirect('bisnis/manage', $message);
		}else{
			echo "gagal";
		}
	}

	public function store_topup()
	{
		$id_member_bisnis 	= $this->session->userdata('id');
		$metode_pembayaran 	= $this->input->post('id_metode_pembayaran');
		$nominal	= $this->input->post('nominal');
		$tanggal = date("Y-m-d H:i:s");

		$datas = array(
			'id_member_bisnis' => $id_member_bisnis, 
			'id_metode_pembayaran' => $metode_pembayaran, 
			'nominal' => $nominal, 
			'tanggal' => $tanggal, 
		);

		$insert = $this->ModelBisnis->insert_topup($datas);

		$message 	= $this->session->set_flashdata('message', 'Silahkan melakukan pembayaran');
		if ($insert) {
			redirect('bisnis/billing', $message);
		}else{
			echo "gagal";
		}
	}

	public function cara_pembayaran($id)
	{
		$datas['transaction'] = $this->ModelBisnis->get_transaction_by_id($id);
		
		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/cara_pembayaran', $datas);
	}

	public function edit_adset($id_adset)
	{
		$this->load->model('ModelTopik');
		$datas['adset'] = $this->ModelBisnis->get_adset_by_id($id_adset);
		$datas['topik'] = $this->ModelTopik->get_topik()->result();

		$this->load->view('bisnis/layout/header');
		$this->load->view('bisnis/edit_adset', $datas);
		$this->load->view('layouts/footer');
	}

	public function update_adset()
	{
		$id_adset 		= $this->input->post('id_adset');
		$id_kampanye 	= $this->input->post('id_kampanye');
		$nama_bisnis	= $this->input->post('nama_bisnis');
		$nama_adset		= $this->input->post('nama_adset');
		$judul			= $this->input->post('judul');
		$deskripsi		= $this->input->post('deskripsi');
		$topik			= $this->input->post('topik');
		$url			= $this->input->post('url');
		$cpc			= $this->input->post('cpc');

		$datas = array(
			'nama_bisnis' => $nama_bisnis,
			'nama_adset' => $nama_adset,
			'judul' => $judul,
			'deskripsi' => $deskripsi,
			'topik' => $topik,
			'url' => $url,
			'cpc' => $cpc,
		);

		$update = $this->ModelBisnis->update_adset($id_adset,$datas);

		$message 	= $this->session->set_flashdata('message', 'Data adset berhasil diubah !');

		if ($update) {
			redirect('bisnis/manage_adset/'.$id_kampanye, $message);
		}else{
			echo "gagal";
		}
	}

	public function delete_adset($id_adset)
	{
		$delete = $this->ModelBisnis->delete_adset($id_adset);
		$message 	= $this->session->set_flashdata('message', 'Data adset berhasil dihapus !');
		
		$referred_from = $this->session->userdata('referred_from');
		
		if ($delete) {
			redirect('bisnis/manage', $message);
		}else{
			echo "gagal";
		}
	}

	public function status_adset($id_adset, $status)
	{	
		if ($status == "aktif") {
			$update_status = $this->ModelBisnis->update_status_adset($id_adset,"deaktif");
		}else{
			$update_status = $this->ModelBisnis->update_status_adset($id_adset,"aktif");
		}

		$message 	= $this->session->set_flashdata('message', 'status adset berhasil diubah !');

		if ($update_status) {
			redirect('bisnis/manage', $message);
		}else{
			echo "gagal";
		}

	}

	public function upload_bukti()
	{
		$id_transaksi					= $this->input->post('id_transaksi');
		$config['upload_path']          = './assets/bukti/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 10000;
	    $config['max_width']            = 10240;
	    $config['max_height']           = 7680;
	    $config['overwrite']           	= true;
	    $config['file_name'] 			= $id_transaksi;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('bukti'))
    {
            $data = array('data' => $this->upload->display_errors());

            redirect('bisnis/billing', $data);
    }
    else
    {
            $data = array('data' => $this->upload->data());

            $this->ModelBisnis->upload_bukti($id_transaksi,$data['data']['file_name']);

            redirect('bisnis/billing', $data);
    }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('bisnis/login','refresh');
	}

}

/* End of file Member_bisnis.php */
/* Location: ./application/controllers/Member_bisnis.php */