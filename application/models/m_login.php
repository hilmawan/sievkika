<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_login extends CI_Model{

	function cek_user($user, $pass){
		$this->db->select('*')
					->from('tbl_user_login a')
					->join('tbl_karyawan b','a.userid = b.nik')
					->where(array(
									'a.username' => $user,
									'a.password' => sha1(md5($pass))
							));
		return $this->db->get();
	}

	function cekuser($user,$pass)

	{

		// $this->db2 = $this->load->database('sia', TRUE);

		$this->db->select('*');

		$this->db->from('tbl_user_login');

		$this->db->where('username', $user);

		$this->db->where('password', sha1(md5($pass)));

		// $this->db->where('status',1);

		$q = $this->db->get();

		return $q;

	}
}