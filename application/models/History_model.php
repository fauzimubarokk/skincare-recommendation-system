<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_history()
    {
        $this->db->select('tb_riwayat.id, tb_pengguna.nama AS pengguna, tb_skincare.merk AS skincare');
        $this->db->from('tb_riwayat');
        $this->db->join('tb_pengguna', 'tb_riwayat.id_pengguna = tb_pengguna.id');
        $this->db->join('tb_skincare', 'tb_riwayat.id_skincare = tb_skincare.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_history_by_user($email)
    {
        $this->db->select('tb_riwayat.id, tb_pengguna.nama AS pengguna, tb_skincare.merk AS skincare');
        $this->db->from('tb_riwayat');
        $this->db->join('tb_pengguna', 'tb_riwayat.id_pengguna = tb_pengguna.id');
        $this->db->join('tb_skincare', 'tb_riwayat.id_skincare = tb_skincare.id');
        $this->db->where('tb_pengguna.email', $email);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_history($data) {
        return $this->db->insert('tb_riwayat', $data);
    }
}
