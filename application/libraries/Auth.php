<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

    protected $CI;

    public function __construct() {
        // Get instance from codeIgniter
        $this->CI =& get_instance();
        
        $this->CI->load->library('session');
    }

    public function is_logged_in() {
        return $this->CI->session->userdata('logged_in');
    }

    public function check_login() {
        if (!$this->is_logged_in()) {
            redirect('login');
        }
    }
}