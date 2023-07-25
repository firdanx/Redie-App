<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
	public function index()
	{
        $data['title'] = 'Dashboard';
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
