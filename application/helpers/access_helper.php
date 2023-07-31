<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    function is_logged_in()
    {
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata('logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            $CI->session->set_flashdata('failed', '<div class="alert alert-danger mb-2 text-center" role="alert">Silahkan Login terlebih dahulu!!!</div>');
            redirect(base_url());
            //$this->load->view('login_form');
        } 
    }
    function auth_restrict(){
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata('logged_in');
        if($is_logged_in)
        {
            redirect('dashboard');
        } 
    }