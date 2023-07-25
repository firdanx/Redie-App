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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Poliklinik Berhasil Dihapus!</div>');
        redirect('poliklinik');
    }
    public function tambahPoliklinik(){
        $username = $this->session->userdata('username');
        $data['title'] = 'Data Poliklinik';
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $data['username'] = $username;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/poliklinik/addPoliklinik');
        $this->load->view('templates/footer');
    }
}
