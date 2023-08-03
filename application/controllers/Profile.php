<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_Common');
        $this->load->model('M_Profile');
    }
    public function index(){
        $username = $this->session->userdata('username');
        $data['title'] = 'Profil';
        $data['username'] = $username;
        $data['tab'] = 1;
        $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admins/profile');
        $this->load->view('templates/footer');
    }

    public function editProfile(){
        $this->form_validation->set_rules('oldPassword', 'Password Lama', 'trim|required|min_length[4]', 
		array(
            'required' => 'Password harus di isi',
			'min_length' => 'Password minimal 4 karakter'
		));
        $id = $this->M_Profile->get_id($this->session->userdata('username'));
        $username = $this->input->post('username');
        $profile= $this->M_Profile->get_profile($username);
        if($this->M_Profile->is_username_unique($id,$username)){
            $upload_image = $_FILES['image']['name'];
            if($upload_image){
                $config['upload_path']          = './assets/profile/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $this->load->library('upload', $config);
                if($this->upload->do_upload('image')){
                    $old_image = $profile->account_pic;
                    if($old_image!= 'default.svg'){
                        unlink(FCPATH.'assets/profile/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $data = array(
                        'account_pic' => $new_image
                    );
                    $this->M_Profile->edit_profile($id, $data);
                }
            }
            $data = array('username' => lcfirst($username));
            $this->M_Profile->edit_profile($id, $data);
            $this->session->unset_userdata('username');
            $dataSession = array(
                'username'  => lcfirst($username),
            );
            $this->session->set_userdata($dataSession);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Profil berhasil di update</div>');
            redirect('profile');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Username telah digunakan!</div>');
            $username = $this->session->userdata('username');
            $data['title'] = 'Dashboard';
            $data['username'] = $username;
            $data['tab'] = 2;
            $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admins/profile');
            $this->load->view('templates/footer');
        }
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
            if($this->M_Profile->pass_check($username, $oldPassword)){
                $id = $this->M_Profile->get_id($username);
                $this->M_Profile->update_pass($id, $newPassword);
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('logged_in');
                $this->session->set_flashdata('message', '<div class="alert alert-success mb-2 text-center" role="alert">Berhasil ubah password! Silahkan login.</div>');
                redirect('auth');
            }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal ubah Password. Password Lama Salah!</div>');
            $username = $this->session->userdata('username');
            $data['title'] = 'Dashboard';
            $data['username'] = $username;
            $data['tab'] = 3;
            $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admins/profile');
            $this->load->view('templates/footer');
            }
        }else {
            $username = $this->session->userdata('username');
            $data['title'] = 'Dashboard';
            $data['username'] = $username;
            $data['tab'] = 3;
            $data['profile_pic'] = $this->M_Common->get_profile_pic($username);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admins/profile');
            $this->load->view('templates/footer');
        }
    }
}