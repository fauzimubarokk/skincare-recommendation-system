<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recommendations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');

        if ($this->auth->check_login_is_user() == FALSE) {
            redirect('login');
        }
    }

    public function index()
    {
    }

    public function history()
    {
        $data = array(
            'contents' => "user/history",
        );

        
        $this->load->view('admin/index', $data);
    }

    public function check()
    {
    }

    private function get_recommendations()
    {
    }
}
