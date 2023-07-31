<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pasien extends CI_Model {
    public function get_pasien_baru() {
        $this->db->where('tipe_pasien', 'Baru');
        return $this->db->get('tbpasien');
    }
    public function get_pasien_lama() {
        $this->db->where('tipe_pasien', 'Lama');
        return $this->db->get('tbpasien');
    }
    public function get_pasien($id_pasien) {
            $this->db->where('id_Pasien', $id_pasien);
            return $this->db->get('tbpasien');
    }
    public function delete($id_Pasien){
    $this->db->where('id_pasien',$id_Pasien);
    $this->db->delete('tbpasien');
    }
    public function update($id_Pasien, $data) {
        $this->db->where('id_pasien', $id_Pasien);
        $this->db->update('tbpasien', $data);
    }
    public function add($data){
        $this->db->insert('tbpasien', $data);
    }
    public function is_nik_unique($id_pasien,$nik_pasien){
        $this->db->where('id_pasien!=',$id_pasien);
        $this->db->where('nik_pasien',$nik_pasien);
        $query = $this->db->get('tbpasien');
        if($query->num_rows() > 0){
            return false;
        }else{
            return true;
        }
    }
    public function is_telp_unique($id_pasien,$telp_pasien){
        $this->db->where('id_pasien!=',$id_pasien);
        $this->db->where('telp_pasien',$telp_pasien);
        $query = $this->db->get('tbpasien');
        if($query->num_rows() > 0){
            return false;
        }else{
            return true;
        }
    }
}
