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
}
