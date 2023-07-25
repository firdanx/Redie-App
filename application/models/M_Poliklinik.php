<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Poliklinik extends CI_Model {
    public function get_poliklinik(){
        return $this->db->get('tbpoliklinik');
    }
    public function delete_poliklinik($id_poliklinik){
        $this->db->where('id_poliklinik',$id_poliklinik);
        $this->db->delete('tbpoliklinik');
    }
}
