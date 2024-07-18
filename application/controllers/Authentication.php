<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->get_user_by_email_and_password($username, $password);

        if ($user > 0) {
            $session = array(
                "logged_in" => TRUE,
                "name" => $user->nama,
                "role" => $user->role,
            );

            $this->session->set_userdata($session);
            redirect('home');
        } else {
            $this->session->set_flashdata('error_message', 'Username atau password salah');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        redirect('login');
    }


    public function register()
    {
        $this->load->view('register');
    }

    public function register_process()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('birthdate', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_pengguna.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $data = array(
                'nama' => $this->input->post('name'),
                'tgl_lahir' => $this->input->post('birthdate'),
                'alamat' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'password' => sha1($this->input->post('password')),
                'jenis_kelamin' => $this->input->post('gender'),
                'role' => 'User'
            );

            $result = $this->User_model->insert_user($data);

            if ($result) {
                $this->session->set_flashdata('success_message', 'Registrasi Berhasil! Silahkan Login');
                redirect('login');
            } else {
                $this->session->set_flashdata('error_message', 'Registrasi Gagal !');
                $this->load->view('register');
            }
        }
    }
}
