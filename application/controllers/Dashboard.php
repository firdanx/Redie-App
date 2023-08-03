<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_there();
        $this->load->model('M_Common');
    }
	public function index()
	{
        $username = $this->session->userdata('username');
        $data['title'] = 'Dashboard';
        $data['username'] = $username;
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/dashboard');
        $this->load->view('templates/footer');
	}
    	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}
}
