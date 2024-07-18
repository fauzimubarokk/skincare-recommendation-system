<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the User_model
        $this->load->model('admin/User_model');

        $this->load->library('auth');

        $this->auth->check_login();
    }

    public function index()
    {

        $data = array(
            'contents'    => 'admin/user',
            'users' => $this->User_model->get_all_users(),
        );
        $this->load->view('admin/index', $data);
    }
}
