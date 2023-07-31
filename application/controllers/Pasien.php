<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_Common');
        $this->load->model('M_Pasien');
    }
    public function pasien_baru(){
        $username = $this->session->userdata('username');
        $data['title'] = 'Data Pasien Baru';
        $data['username'] = $username;
        $data['pasien_baru'] = $this->M_Pasien->get_pasien_baru()->result_array();
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/pasien/baru');
        $this->load->view('templates/footer');
    }
    public function pasien_lama(){
        $username = $this->session->userdata('username');
        $data['title'] = 'Data Pasien Lama';
        $data['username'] = $username;
        $data['pasien_lama'] = $this->M_Pasien->get_pasien_lama()->result_array();
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/pasien/lama');
        $this->load->view('templates/footer');
    }

    public function detail($id_pasien){
        $username = $this->session->userdata('username');
        $data['title'] = 'Detail Pasien';
        $data['username'] = $username;
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $data['pasien']=$this->M_Pasien->get_pasien($id_pasien)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/pasien/detail');
        $this->load->view('templates/footer');
    }

    public function edit($id_pasien){
        if(!$this->input->post()){
        $username = $this->session->userdata('username');
        $data['title'] = 'Edit Pasien';
        $data['username'] = $username;
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $data['pasien']=$this->M_Pasien->get_pasien($id_pasien)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/pasien/edit');
        $this->load->view('templates/footer');
        }else{
            $data = array(
                'no_rm' => $this->input->post('no_rm'),
                'nik_pasien' => $this->input->post('nik_pasien'),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'alamat_pasien' => $this->input->post('alamat_pasien'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk_pasien' => $this->input->post('jk_pasien'),
                'goldar_pasien' => $this->input->post('goldar_pasien'),
                'pekerjaan_pasien' => $this->input->post('pekerjaan_pasien'),
                'telp_pasien' => $this->input->post('telp_pasien'),
            );
            $this->M_Pasien->update($id_pasien, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data Pasien berhasil diubah!</div>');
            redirect('pasien/detail/'.$id_pasien);
        }
    }

    public function delete_pasien_baru($id_Pasien){
        $this->M_Pasien->delete($id_Pasien);
        redirect('pasien/pasien_baru');
    }
    public function delete_pasien_lama($id_Pasien){
        $this->M_Pasien->delete($id_Pasien);
        redirect('pasien/pasien_lama');
    }
}