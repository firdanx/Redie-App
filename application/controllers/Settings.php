<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_there();
        user_restricted();
        $this->load->model('M_Common');
    }
    public function index(){
        $this->Administrator();
    }
    public function Administrator(){
        $username = $this->session->userdata('username');
        $data['title'] = 'Administrator';
        $data['username'] = $username;
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $data['admin'] = $this->M_Common->get_account()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/settings/templates/headset');
        $this->load->view('admins/settings/administrator');
        $this->load->view('admins/settings/templates/footset');
        $this->load->view('templates/footer');
    }

    public function tambahAdmin() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbaccount.username]',
		array(
			'is_unique' => 'Username telah digunakan',
			'required' => 'Username harus di isi'
		));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]', 
		array(
			'required' => 'Password harus di isi',
			'min_length' => 'Password minimal 4 karakter'
		));
		$this->form_validation->set_rules('password2', 'Confirmation Password', 'required|matches[password]', 
		array(
			'required' => 'Confirmation Password harus di isi',
			'matches' => 'Password tidak sama'
		));
		if($this->form_validation->run()==false){
            $username = $this->session->userdata('username');
            $data['title'] = 'Administrator';
            $data['username'] = $username;
            $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
            $data['admin'] = $this->M_Common->get_account()->result();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admins/settings/templates/headset');
            $this->load->view('admins/settings/administrator');
            $this->load->view('admins/settings/templates/footset');
            $this->load->view('templates/footer');
		}else{
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$data = array(
				'account_pic' => 'default.svg',
                'username' => $username,
                'password' => $password,
				'id_role' => 1
            );
			$this->M_Common->insert($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success mb-2 text-center" role="alert">Admin berhasil ditambahkan</div>');
			redirect('settings/administrator');
		}
    }
}