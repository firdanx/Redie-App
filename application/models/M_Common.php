<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Common extends CI_Model {
	public function get_profile_pic($username){
		$this->db->where('username', $username);
		$query = $this->db->get('tbaccount')->row();
		return $query->account_pic;
	}
	public function get_account(){
		$this->db->where('id_role', 1);
		return $this->db->get('tbaccount');
	}
	public function insert($data){
		$this->db->insert('tbaccount',$data);
	}
}
