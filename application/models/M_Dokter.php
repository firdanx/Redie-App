<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dokter extends CI_Model {
    public function get_dokter(){
        $this->db->select('*');
        $this->db->from('tbdokter');
        $this->db->join('tbpoliklinik', 'tbpoliklinik.id_poliklinik = tbdokter.id_poliklinik');
        return $this->db->get();
    }
    public function add_Dokter($data){
        $this->db->insert('tbdokter', $data);
    }
    public function delete_Dokter($id_Dokter){
    $this->db->where('id_dokter',$id_Dokter);
    $this->db->delete('tbdokter');
    }
}