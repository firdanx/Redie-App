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
    public function edit_Dokter($id_dokter, $data){
        $this->db->where('id_dokter',$id_dokter);
        $this->db->update('tbdokter',$data);
    }
    public function is_nip_unique($id_dokter, $nip_dokter){
        $this->db->where('id_dokter!=', $id_dokter);
        $this->db->where('nip_dokter', $nip_dokter);
        $query = $this->db->get('tbdokter');
        if($query->num_rows() > 0){
            return false;
        }else{
            return true;
        }
    }
}