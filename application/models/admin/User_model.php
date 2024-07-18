<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_users()
    {
        $this->db->where('role !=', 'admin');
        $query = $this->db->get('tb_pengguna');
        return $query->result();
    }

    public function get_user_by_email_and_password($email, $password)
    {
        $hashed_password = sha1($password);
        $query = $this->db->get_where('tb_pengguna', array('email' => $email, 'password' => $hashed_password));
        return $query->row();
    }

    public function insert_user($data) {
        return $this->db->insert('tb_pengguna', $data);
    }
}
