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
    public function add_poliklinik($data){
        $this->db->insert('tbpoliklinik',$data);
    }
    public function edit_poliklinik($data,$id_poliklinik){
            $this->db->where('id_poliklinik',$id_poliklinik);
            $this->db->update('tbpoliklinik',$data);
    }

    public function is_kp_unique($id_poliklinik,$kodePoliklinik){
        $this->db->where('id_poliklinik!=',$id_poliklinik);
        $this->db->where('kode_poliklinik',$kodePoliklinik);
        $query = $this->db->get('tbpoliklinik');
        if($query->num_rows() > 0){
            return false;
        }else{
            return true;
        }
    }
}
