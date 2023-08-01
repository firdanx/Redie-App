<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_Common');
    }
    public function index(){
        $username = $this->session->userdata('username');
        $data['title'] = 'Profil';
        $data['username'] = $username;
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/profile');
        $this->load->view('templates/footer');
    }
}