<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recommendations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->model("History_model");
        $this->load->helper('url');

        if ($this->auth->check_login_is_user() == FALSE) {
            redirect('login');
        }
    }

    public function index()
    {
    }

    public function history()
    {
        $email = $this->session->userdata("email");
        $data = array(
            'contents' => "user/history",
            'history' => $this->History_model->get_history_by_user($email),
        );

        $this->load->view('admin/index', $data);
    }

    public function check()
    {
        $data = array(
            'contents' => 'user/check_recommendation',
        );

        $this->load->view('admin/index', $data);
    }

    private function get_recommendations()
    {
    }
}
