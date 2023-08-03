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
    function is_there()
    {
        $CI =& get_instance();
        $username = $CI->session->userdata('username');
        $CI->db->where('username', $username);
        $query = $CI->db->get('tbaccount');
        if($query->num_rows() < 1){
            $CI->session->unset_userdata('username');
            $CI->session->unset_userdata('logged_in');
            redirect(base_url());
        }
    }