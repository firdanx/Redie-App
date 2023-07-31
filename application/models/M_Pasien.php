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
}
