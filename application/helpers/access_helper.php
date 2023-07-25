<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    function is_logged_in()
    {
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata('logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            echo 'You don\'t have permission to access this page.';
            die();      
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