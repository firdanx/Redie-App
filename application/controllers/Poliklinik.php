<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poliklinik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_Common');
        $this->load->model('M_Poliklinik');
    }
	public function index()
	{
        $username = $this->session->userdata('username');
        $data['title'] = 'Data Poliklinik';
        $data['username'] = $username;
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $data['poliklinik'] = $this->M_Poliklinik->get_poliklinik()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/poliklinik/dataPoliklinik');
        $this->load->view('templates/footer');
	}
    public function delete($id_poliklinik){
        $this->M_Poliklinik->delete_poliklinik($id_poliklinik);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data Poliklinik Berhasil Dihapus!</div>');
        redirect('poliklinik');
    }
    public function tambahPoliklinik(){
        $this->form_validation->set_rules('kodePoliklinik', 'Kode Poliklinik', 'trim|required|is_unique[tbpoliklinik.kode_poliklinik]',
		array(
			'is_unique' => 'Kode Poliklinik sudah ada!',
			'required' => 'Kode Poliklinik harus di isi'
		));
        $this->form_validation->set_rules('ruangPoliklinik', 'Ruang Poliklinik', 'trim|required|is_unique[tbpoliklinik.ruang_poliklinik]',
		array(
			'is_unique' => 'Ruang Poliklinik sudah ada!',
			'required' => 'Ruang Poliklinik harus di isi'
		));
        $this->form_validation->set_rules('namaPoliklinik', 'Nama Poliklinik', 'trim|required|is_unique[tbpoliklinik.nama_poliklinik]',
		array(
			'is_unique' => 'Nama Poliklinik sudah ada!',
			'required' => 'Nama Poliklinik harus di isi'
		));
        if($this->form_validation->run()){
            $kodePoliklinik = $this->input->post('kodePoliklinik');
            $ruangPoliklinik = $this->input->post('ruangPoliklinik');
            $namaPoliklinik = $this->input->post('namaPoliklinik');
            $data = array(
                'kode_poliklinik' => $kodePoliklinik,
                'ruang_poliklinik' => $ruangPoliklinik,
                'nama_poliklinik' => $namaPoliklinik
            );
            $this->M_Poliklinik->add_poliklinik($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data Poliklinik berhasil ditambahkan!</div>');
            redirect('poliklinik');
        }else{
            $username = $this->session->userdata('username');
            $data['title'] = 'Data Poliklinik';
            $data['username'] = $username;
            $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
            $data['poliklinik'] = $this->M_Poliklinik->get_poliklinik()->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admins/poliklinik/dataPoliklinik');
            $this->load->view('templates/footer');
        }
    }
}
