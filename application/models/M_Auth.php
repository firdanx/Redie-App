<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {

	public function get_Account()
	{
        return $this->db->get('tbaccount');
	}
	public function insert($data){
		$this->db->insert('tbaccount',$data);
	}
	public function user_availabilites($username){
		$this->db->where('username',$username);
        $query = $this->db->get('tbaccount');
		if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
	}
	public function pass_check($username, $password){
		$this->db->where('username',$username);
		$query = $this->db->get('tbaccount')->row();
		return password_verify($password, $query->password);
	}
}
