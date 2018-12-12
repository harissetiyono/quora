<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProfil extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function profil($id_member)
	{
		$this->db->where('id_member', $id_member);
		return $this->db->get('member')->result_array();
	}

	public function pengikut($id_member)
	{
		$this->db->join('member', 'member.id_member = m_pengikut.id_following');
		$this->db->where('id_followed', $id_member);
		return $this->db->get('m_pengikut')->result_array();
	}

	public function pengikut_profil($id_member)
	{
		$this->db->where('id_followed', $id_member);
		return $this->db->get('m_pengikut')->result_array();
	}

	public function get_member_by_keyword($keyword)
	{
		$this->db->like('nama', $keyword, 'both');
		return $this->db->get('member')->result_array();
	}

	public function mengikuti($id_member)
	{
		$this->db->join('member', 'member.id_member = m_pengikut.id_followed');
		$this->db->where('id_following', $id_member);
		return $this->db->get('m_pengikut')->result_array();
	}

	public function update_profil($datas, $id_member)
	{
		$this->db->where('id_member', $id_member);
		$this->db->update('member', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function get_pekerjaan($id_member)
	{
		$this->db->where('id_pekerjaan', $id_member);
		return $this->db->get('m_pekerjaan')->result_array();
	}

	public function get_pendidikan($id_member)
	{
		$this->db->where('id_pendidikan', $id_member);
		return $this->db->get('m_pendidikan')->result_array();
	}

	public function get_lokasi($id_member)
	{
		$this->db->where('id_lokasi', $id_member);
		return $this->db->get('m_lokasi')->result_array();
	}


	public function insert_pekerjaan($datas)
	{
		$this->db->replace('m_pekerjaan', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function insert_pendidikan($datas)
	{
		$this->db->replace('m_pendidikan', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function insert_lokasi($datas)
	{
		$this->db->replace('m_lokasi', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function update_pekerjaan($datas, $id_member)
	{
		$this->db->where('id_pekerjaan', $id_member);
		$this->db->update('m_pekerjaan', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function update_pendidikan($datas, $id_member)
	{
		$this->db->where('id_pekerjaan', $id_member);
		$this->db->update('m_pendidikan', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function update_lokasi($datas, $id_member)
	{
		$this->db->where('id_lokasi', $id_member);
		$this->db->update('m_lokasi', $datas);
		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function update_follow($datas,$id_member,$id)
	{
		$this->db->replace('m_pengikut', $datas);
		$this->db->where('id_following', $id_member);
		$this->db->where('id_followed', $id);

		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function update_unfollow($id_member, $id)
	{
		$this->db->where('id_following', $id_member);
		$this->db->where('id_followed', $id);
		$this->db->delete('m_pengikut');

		if($this->db->affected_rows() > 0)
		{
		    return true;
		}else{
			return false;
		}
	}

	public function add_topik_feed($datas)
	{
		$this->db->insert('m_feed', $datas);
	}

	public function delete_feed_member($id_member)
	{
		$this->db->where('id_member', $id_member);
		$this->db->delete('m_feed');
	}

}

/* End of file ModelProfil.php */
/* Location: ./application/models/ModelProfil.php */