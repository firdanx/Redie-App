<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_Common');
        $this->load->model('M_Settings');
    }
	public function index()
	{
        $username = $this->session->userdata('username');
        $data['title'] = 'Pengaturan';
        $data['username'] = $username;
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/settings/menu');
        $this->load->view('templates/footer');
	}

    public function change_password()
    {
        $this->form_validation->set_rules('oldPassword', 'Password Lama', 'trim|required|min_length[4]', 
		array(
			'required' => 'Password harus di isi',
			'min_length' => 'Password minimal 4 karakter'
		));
        $this->form_validation->set_rules('newPassword', 'Password Baru', 'trim|required|min_length[4]', 
		array(
			'required' => 'Password harus di isi',
			'min_length' => 'Password minimal 4 karakter'
		));
		$this->form_validation->set_rules('newPasswordConfirmation', 'Konfirmasi Password Baru', 'required|matches[newPassword]', 
		array(
			'required' => 'Konfirmasi Password harus di isi',
			'matches' => 'Password tidak sama'
		));
        if ($this->form_validation->run()) {
            $username = $this->session->userdata('username');
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            if($this->M_Settings->pass_check($username, $oldPassword)){
                $id = $this->M_Settings->get_id($username);
                $this->M_Settings->update_pass($id, $newPassword);
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('logged_in');
                $this->session->set_flashdata('suksesganti', '<div class="alert alert-success mb-2 text-center" role="alert">Berhasil ubah password! Silahkan login.</div>');
                redirect('auth');
            }else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger mb-2 text-center" role="alert">Password Lama Salah!</div>');
            $username = $this->session->userdata('username');
            $data['title'] = 'Dashboard';
            $data['username'] = $username;
            $data['status'] = 'active';
            $data['dp'] = 'block';
            $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admins/settings');
            $this->load->view('templates/footer');
            }
        }else {
            $username = $this->session->userdata('username');
            $data['title'] = 'Dashboard';
            $data['username'] = $username;
            $data['status'] = 'active';
            $data['dp'] = 'block';
            $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admins/settings');
            $this->load->view('templates/footer');
        }
    }
}
