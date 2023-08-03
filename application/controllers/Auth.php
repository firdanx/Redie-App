<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Auth');
		auth_restrict();
	}
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric', array(
			'required' => 'Username harus di isi',
			'alpha_numeric' => 'Username harus berisi huruf atau angka'
		));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]', 
		array(
			'required' => 'Password harus di isi',
			'min_length' => 'Password minimal 4 karakter'
		));
		// cek validasi form
		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// cek ketersediaan user
			if($this->M_Auth->user_availabilites($username)){
				// cek password
				if($this->M_Auth->pass_check($username, $password)){
					$dataSession = array(
						'username'  => lcfirst($username),
						'logged_in' => TRUE
					);
					$this->session->set_userdata($dataSession);
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('failed', '<div class="alert alert-danger mb-2 text-center" role="alert">Password salah!</div>');
					$data['title'] = 'Login';
					$this->load->view('templates/header', $data);
					$this->load->view('admins/login');
					$this->load->view('templates/footer');
				}
			}else{
				$this->session->set_flashdata('failed', '<div class="alert alert-danger mb-2 text-center" role="alert">User tidak terdaftar. Silahkan daftar!</div>');
				redirect('auth');
			}
		}else {
			$data['title'] = 'Login';
			$this->load->view('templates/header', $data);
			$this->load->view('admins/login');
			$this->load->view('templates/footer');
		}
	}
	public function register()
	{
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
			$data['title'] = 'Register';
            $this->load->view('templates/header', $data);
            $this->load->view('admins/register');
            $this->load->view('templates/footer');
		}else{
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$data = array(
				'account_pic' => 'default.svg',
                'username' => $username,
                'password' => $password
            );
			$this->M_Auth->insert($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success mb-2 text-center" role="alert">Berhasil Mendaftar! Silahkan login.</div>');
			redirect('auth');
		}
	}


}
