<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profile extends CI_Model {
	public function pass_check($username, $password){
		$this->db->where('username',$username);
		$query = $this->db->get('tbaccount')->row();
		return password_verify($password, $query->password);
	}
    public function get_id($username){
        $this->db->where('username',$username);
        $query = $this->db->get('tbaccount')->row();
        return $query->id_account;
    }
    public function update_pass($id_account, $password){
        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );
        $this->db->where('id_account', $id_account);
        $this->db->update('tbaccount', $data);
    }
}
