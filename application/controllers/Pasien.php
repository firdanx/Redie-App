<?php

use function PHPSTORM_META\map;

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_there();
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
        if($this->input->post()){
            $nik_pasien = $this->input->post('nik_pasien');
            $telp_pasien = $this->input->post('telp_pasien');
            if($this->M_Pasien->is_nik_unique($id_pasien, $nik_pasien) && $this->M_Pasien->is_telp_unique($id_pasien, $telp_pasien)){
            $data = array(
                'no_rm' => $this->input->post('no_rm'),
                'nik_pasien' => $nik_pasien,
                'nama_pasien' => $this->input->post('nama_pasien'),
                'alamat_pasien' => $this->input->post('alamat_pasien'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk_pasien' => $this->input->post('jk_pasien'),
                'goldar_pasien' => $this->input->post('goldar_pasien'),
                'pekerjaan_pasien' => $this->input->post('pekerjaan_pasien'),
                'telp_pasien' => $telp_pasien,
            );
                $this->M_Pasien->update($id_pasien, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data Pasien berhasil diubah!</div>');
                redirect('pasien/detail/'.$id_pasien);
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>NIK atau No Telepon sudah terdaftar</div>');
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
            }
        }else{
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
        }
    }

    public function add_pasien($tipe_pasien){
        if(!$this->input->post()){
            $username = $this->session->userdata('username');
            $data['title'] = 'Tambah Pasien';
            $data['username'] = $username;
            $data['tipe_pasien'] = $tipe_pasien;
            $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admins/pasien/tambah');
            $this->load->view('templates/footer');
        }else{
            $this->form_validation->set_rules('no_rm', 'No RM', 'trim|required|is_unique[tbpasien.no_rm]',
            array(
                'required' => 'No RM harus di isi',
                'is_unique' => 'No RM sudah terdaftar!'
            ));
            $this->form_validation->set_rules('nik_pasien', 'NIK', 'trim|required|is_unique[tbpasien.nik_pasien]',
            array(
                'required' => 'NIK harus di isi',
                'is_unique' => 'NIK sudah terdaftar!'
            ));
            $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'trim|required',
            array(
                'required' => 'Nama Pasien harus di isi'
            ));
            $this->form_validation->set_rules('alamat_pasien', 'Alamat', 'trim|required',
            array(
                'required' => 'Alamat harus di isi'
            ));
            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required',
            array(
                'required' => 'Tempat Lahir harus di isi'
            ));
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required',
            array(
                'required' => 'Tanggal Lahir harus di isi'
            ));
            $this->form_validation->set_rules('jk_pasien', 'Jenis Kelamin', 'trim|required',
            array(
                'required' => 'Jenis Kelamin harus di isi'
            ));
            $this->form_validation->set_rules('goldar_pasien', 'Golongan Darah', 'trim|required',
            array(
                'required' => 'Golongan Darah harus di isi'
            ));
            $this->form_validation->set_rules('pekerjaan_pasien', 'Pekerjaan', 'trim|required',
            array(
                'required' => 'Pekerjaan harus di isi'
            ));
            $this->form_validation->set_rules('telp_pasien', 'No Telepon', 'trim|required|is_unique[tbpasien.telp_pasien]',
            array(
                'required' => 'No Telepon harus di isi',
                'is_unique' => 'No Telepon sudah terdaftar!'
            ));
            if($this->form_validation->run()){
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
                        'tipe_pasien' => $tipe_pasien
                    );
                    $this->M_Pasien->add($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data Pasien berhasil ditambahkan!</div>');
                    redirect('pasien/pasien_'.$tipe_pasien);
            }else{
                $username = $this->session->userdata('username');
                $data['title'] = 'Tambah Pasien';
                $data['username'] = $username;
                $data['tipe_pasien'] = $tipe_pasien;
                $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar');
                $this->load->view('admins/pasien/tambah');
                $this->load->view('templates/footer');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal menambahkan data! Isi form dengan benar!</div>');
            }
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