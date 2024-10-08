<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_there();
        user_restricted();
        $this->load->model('M_Common');
        $this->load->model('M_Dokter');
        $this->load->model('M_Poliklinik');
    }
    public function index(){
        $username = $this->session->userdata('username');
        $data['title'] = 'Data Dokter';
        $data['username'] = $username;
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $data['dokter'] = $this->M_Dokter->get_dokter()->result_array();
        $data['poliklinik'] = $this->M_Poliklinik->get_poliklinik()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/dokter/dataDokter');
        $this->load->view('templates/footer');
    }
    public function tambahDokter(){
        $this->form_validation->set_rules('nip_dokter', 'NIP Dokter', 'trim|required|is_unique[tbdokter.nip_dokter]',
		array(
			'required' => 'NIP Dokter harus di isi',
            'is_unique' => 'NIP Dokter sudah terdaftar'
		));
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'trim|required',
		array(
			'required' => 'Nama Dokter harus di isi'
		));
        $this->form_validation->set_rules('telp_dokter', 'No Telepon Dokter', 'trim|required',
		array(
			'required' => 'No Telepon Dokter harus di isi'
		));
        $this->form_validation->set_rules('spesialis_dokter', 'Spesialis Dokter', 'trim|required',
		array(
			'required' => 'Spesialis Dokter harus di isi'
		));
        $this->form_validation->set_rules('id_poliklinik', 'Poliklinik', 'trim|required',
		array(
			'required' => 'Poliklinik harus di pilih'
		));
        if($this->form_validation->run()){
            $nip = $this->input->post('nip_dokter');
            $nama_dokter = $this->input->post('nama_dokter');
            $telp_dokter = $this->input->post('telp_dokter');
            $spesialis_dokter = $this->input->post('spesialis_dokter');
            $poli = $this->input->post('id_poliklinik');
                $data = array(
                'nip_dokter' => $nip,
                'nama_dokter' => $nama_dokter,
                'telp_dokter' => $telp_dokter,
                'spesialis_dokter' => $spesialis_dokter,
                'id_poliklinik' => $poli
            );
            $this->M_Dokter->add_Dokter($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah Dokter</div>');
            redirect('dokter');
        }else{
            $username = $this->session->userdata('username');
            $data['title'] = 'Data Dokter';
            $data['username'] = $username;
            $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
            $data['dokter'] = $this->M_Dokter->get_dokter()->result_array();
            $data['poliklinik'] = $this->M_Poliklinik->get_poliklinik()->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admins/dokter/dataDokter');
            $this->load->view('templates/footer');
        }
    }

    public function editDokter($id_dokter){
        $this->form_validation->set_rules('nip_dokter', 'NIP Dokter', 'trim|required',
		array(
			'required' => 'NIP Dokter harus di isi'
		));
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'trim|required',
		array(
			'required' => 'Nama Dokter harus di isi'
		));
        $this->form_validation->set_rules('telp_dokter', 'No Telepon Dokter', 'trim|required',
		array(
			'required' => 'No Telepon Dokter harus di isi'
		));
        $this->form_validation->set_rules('spesialis_dokter', 'Spesialis Dokter', 'trim|required',
		array(
			'required' => 'Spesialis Dokter harus di isi'
		));
        $this->form_validation->set_rules('id_poliklinik', 'Poliklinik', 'trim|required',
		array(
			'required' => 'Poliklinik harus di pilih'
		));
        if($this->form_validation->run()){
            $nip_dokter = $this->input->post('nip_dokter');
            if($this->M_Dokter->is_nip_unique($id_dokter, $nip_dokter)){
                $data = array(
                'nip_dokter' => $nip_dokter,
                'nama_dokter' => $this->input->post('nama_dokter'),
                'telp_dokter' => $this->input->post('telp_dokter'),
                'spesialis_dokter' => $this->input->post('spesialis_dokter'),
                'id_poliklinik' => $this->input->post('id_poliklinik')
            );
                $this->M_Dokter->edit_Dokter($id_dokter, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data Dokter berhasil diubah!</div>');
                redirect('dokter');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>NIP Sudah terdaftar!</div>');
                redirect('dokter');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal mengubah data dokter!</div>');
            redirect('dokter');
        }
    }
    
    public function delete($id_dokter){
        $this->M_Dokter->delete_Dokter($id_dokter);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus Dokter</div>');
        redirect('dokter');
    }
}
