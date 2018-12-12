<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelProfil');
		$this->load->model('ModelPertanyaan');
		$this->load->model('ModelJawaban');
	}

	public function index()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_by_member($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('profil');
		$this->load->view('footer',$datas);
	}

	public function update_profil()
	{
		$id_member 		= $this->session->userdata('id_member');
		$nama		= $this->input->post('nama');
		$kredensial		= $this->input->post('kredensial');
		$deskripsi		= $this->input->post('deskripsi');

		$config['upload_path'] = './assets/images/profil';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
		$config['overwrite']  = true;
		$config['file_name'] = $id_member;
		
		$this->load->library('upload', $config);

		if (!empty($_FILES["foto"])) {
			if ( ! $this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
				var_dump ($error);
				die();
			}
			else{
				$data = array('upload_data' => $this->upload->data());

				$datas = array(
					'nama' => $nama,
					'kredensial' => $kredensial,
					'deskripsi' => $deskripsi,
					'foto' => $data['upload_data']['file_name'],
				);

				$update = $this->ModelProfil->update_profil($datas, $id_member);

				if ($update) {
					redirect('profil','refresh');
				}else{
					echo "error";
				}
			}
		}else{
			$datas = array(
				'nama' => $nama,
				'kredensial' => $kredensial,
				'deskripsi' => $deskripsi,
			);

			$update = $this->ModelProfil->update_profil($datas, $id_member);

			if ($update) {
				redirect('profil','refresh');
			}else{
				echo "error";
			}
		}
	}

	public function id($id)
	{
		$datas['profil'] = $this->ModelProfil->profil($id);
		$datas['pertanyaan'] = $this->ModelPertanyaan->get_pertanyaan_by_member($id);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id);
		$datas['pengikut'] = $this->ModelProfil->pengikut($id);

		$this->load->view('header');
		$this->load->view('profil_header_lain', $datas);
		$this->load->view('profil_member_lain', $datas);
		$this->load->view('footer', $datas);
	}

	public function pekerjaan()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('pekerjaan', $datas);
		$this->load->view('footer');
	}

	public function pekerjaan_edit()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('pekerjaan_edit', $datas);
		$this->load->view('footer');
	}

	public function pendidikan()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('pendidikan');
		$this->load->view('footer');
	}

	public function pendidikan_edit()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('pendidikan_edit', $datas);
		$this->load->view('footer');
	}

	public function lokasi()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('lokasi');
		$this->load->view('footer');
	}

	public function lokasi_edit()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('lokasi_edit');
		$this->load->view('footer');
	}

	public function pekerjaan_action()
	{
		$id_member 		= $this->session->userdata('id_member');
		$posisi			= $this->input->post('posisi');
		$perusahaan		= $this->input->post('perusahaan');
		$mulai_tahun	= $this->input->post('mulai_tahun');
		$selesai_tahun	= $this->input->post('selesai_tahun');

		$datas = array(
			'id_pekerjaan' => $id_member,
			'posisi' => $posisi,
			'perusahaan' => $perusahaan,
			'mulai_tahun' => $mulai_tahun,
			'selesai_tahun' => $selesai_tahun,
		);

		$insert = $this->ModelProfil->insert_pekerjaan($datas);

		if ($insert == false) {
			$update = $this->ModelProfil->update_pekerjaan($datas, $id_member);
		}
			$update = $this->ModelProfil->update_profil(['id_pekerjaan' => $id_member], $id_member);
		redirect('profil','refresh');
	}

	public function pendidikan_action()
	{
		$id_member		= $this->session->userdata('id_member');
		$sekolah		= $this->input->post('sekolah');
		$konsen			= $this->input->post('konsen');
		$konsen_kedua	= $this->input->post('konsen_kedua');
		$gelar			= $this->input->post('gelar');
		$tahun_lulus	= $this->input->post('tahun_lulus');

		$datas = array(
			'id_pendidikan' => $id_member, 
			'sekolah' => $sekolah, 
			'konsen' => $konsen, 
			'konsen_kedua' => $konsen_kedua, 
			'gelar' => $gelar, 
			'tahun_lulus' => $tahun_lulus, 
		);

		$insert = $this->ModelProfil->insert_pendidikan($datas);
		if ($insert == false) {
			$update = $this->ModelProfil->update_pendidikan($datas, $id_member);
		}
		$update = $this->ModelProfil->update_profil(['id_pendidikan' => $id_member], $id_member);

		redirect('profil','refresh');
	}

	public function lokasi_action()
	{
		$id_member 		= $this->session->userdata('id_member');
		$lokasi			= $this->input->post('lokasi');
		$mulai_tahun	= $this->input->post('mulai_tahun');
		$sampai_tahun	= $this->input->post('sampai_tahun');

		$datas = array(
			'id_lokasi' => $id_member, 
			'lokasi' => $lokasi, 
			'mulai_tahun' => $mulai_tahun, 
			'sampai_tahun' => $sampai_tahun, 
		);

		$insert = $this->ModelProfil->insert_lokasi($datas);

		if ($insert == false) {
			$update = $this->ModelProfil->update_lokasi($datas, $id_member);
		}
		$update = $this->ModelProfil->update_profil(['id_lokasi' => $id_member], $id_member);

		redirect('profil','refresh');
	}

	public function id_jawaban($id)
	{
		$datas['profil'] = $this->ModelProfil->profil($id);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id);
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban_by_member($id);

		$this->load->view('header');
		$this->load->view('profil_header_lain', $datas);
		$this->load->view('profil_member_lain_jawaban', $datas);
		$this->load->view('footer');
	}

	public function jawaban()
	{
		$id_member = $this->session->userdata('id_member');

		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['jawaban'] = $this->ModelJawaban->get_jawaban_by_member($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('profil-jawaban');
		$this->load->view('footer');
	}

	public function pengikut()
	{
		$id_member = $this->session->userdata('id_member');
		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pengikut'] = $this->ModelProfil->pengikut($id_member);
		$datas['mengikuti'] = $this->ModelProfil->mengikuti($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('pengikut');
		$this->load->view('footer');
	}

	public function mengikuti()
	{
		$id_member = $this->session->userdata('id_member');
		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['mengikuti'] = $this->ModelProfil->mengikuti($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header', $datas);
		$this->load->view('mengikuti');
		$this->load->view('footer');
	}

	public function pengikut_member($id_member)
	{
		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['pengikut'] = $this->ModelProfil->pengikut($id_member);
		$datas['mengikuti'] = $this->ModelProfil->mengikuti($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header_lain', $datas);
		$this->load->view('pengikut');
		$this->load->view('footer');
	}

	public function mengikuti_member($id_member)
	{
		$datas['profil'] = $this->ModelProfil->profil($id_member);
		$datas['mengikuti'] = $this->ModelProfil->mengikuti($id_member);
		$datas['pekerjaan'] = $this->ModelProfil->get_pekerjaan($id_member);
		$datas['pendidikan'] = $this->ModelProfil->get_pendidikan($id_member);
		$datas['lokasi'] = $this->ModelProfil->get_lokasi($id_member);

		$this->load->view('header');
		$this->load->view('profil_header_lain', $datas);
		$this->load->view('mengikuti');
		$this->load->view('footer');
	}

	public function follow($id,$status)
	{
		$id_member = $this->session->userdata('id_member');
		$ql = $this->db->select('*')->from('m_pengikut')->where('id_following',$id_member)->where('id_followed', $id)->get();

		if( $ql->num_rows() > 0 || $status == 0){
			$action = $this->ModelProfil->update_unfollow($id_member, $id);
		}else{
			
			$datas = array(
				'id_following' => $id_member, 
				'id_followed' => $id, 
				'pengikut_status' => $status, 
			);

			$action = $this->ModelProfil->update_follow($datas,$id_member,$id);	
		}

		if ($action) {
			redirect('profil/id/'.$id,'refresh');
		}else{
			echo "masih salah";
		}
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */