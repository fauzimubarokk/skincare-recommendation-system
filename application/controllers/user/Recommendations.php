<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recommendations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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
