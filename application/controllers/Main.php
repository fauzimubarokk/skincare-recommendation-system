<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/User_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'auth'));

		if ($this->auth->is_logged_in() == FALSE) {
			redirect('login');
		}
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


	public function update_password()
	{
		$this->form_validation->set_rules('old_password', 'Password Lama', 'required');
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('change-password');
			return;
		}


		$email = $this->session->userdata('email');
		$old_password = sha1($this->input->post('old_password'));
		$new_password = $this->input->post('new_password');

		$user = $this->User_model->get_user_by_email($email);

		if ($user <= 0) {
			$this->session->set_flashdata('error', 'Gagal memperbarui password. Silakan coba lagi.');
			redirect('change-password');
			return;
		}

		if ($old_password == sha1($new_password)) {
			$this->session->set_flashdata('error', 'Password lama tidak boleh sama dengan password baru.');
			redirect('change-password');
			return;
		}

		if ($user->password != $old_password) {
			$this->session->set_flashdata('error', 'Password lama tidak cocok.');
			redirect('change-password');
			return;
		}

		$this->User_model->update_password($email, $new_password);
		$this->session->set_flashdata('success', 'Password berhasil diperbarui.');

		redirect('change-password');
	}
}
