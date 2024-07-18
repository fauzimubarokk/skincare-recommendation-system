<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');

		$this->auth->check_login();
	}

	public function index()
	{
		$data = array(
			'contents'    => 'admin/dashboard',
		);
		$this->load->view('admin/index', $data);
	}

	public function change_password()
	{
		$data = array(
			'contents'    => 'change_password',
		);
		$this->load->view('admin/index', $data);
	}


	public function change_password_process()
	{
	}
}
