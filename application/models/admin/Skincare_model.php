<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skincare_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_skincare() {
        $this->db->select('tb_skincare.*, tb_jenis_skincare.nama as jenis_skincare, tb_jenis_kulit.nama as jenis_kulit');
        $this->db->from('tb_skincare');
        $this->db->join('tb_jenis_skincare', 'tb_skincare.id_jenis_skincare = tb_jenis_skincare.id');
        $this->db->join('tb_jenis_kulit', 'tb_skincare.id_jenis_kulit = tb_jenis_kulit.id');
        $this->db->order_by('merk', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_skincare_by_type($id_jenis_skincare) {
        $this->db->select('tb_skincare.*, tb_jenis_skincare.nama as jenis_skincare, tb_jenis_kulit.nama as jenis_kulit');
        $this->db->from('tb_skincare');
        $this->db->where('id_jenis_skincare', $id_jenis_skincare);
        $this->db->join('tb_jenis_skincare', 'tb_skincare.id_jenis_skincare = tb_jenis_skincare.id');
        $this->db->join('tb_jenis_kulit', 'tb_skincare.id_jenis_kulit = tb_jenis_kulit.id');
        $this->db->order_by('merk', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_skincare_by_id($id) {
        $query = $this->db->get_where('tb_skincare', array('id' => $id));
        return $query->row();
    }

    public function insert_skincare($data) {
        return $this->db->insert('tb_skincare', $data);
    }

    public function update_skincare($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tb_skincare', $data);
    }

    public function delete_skincare($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tb_skincare');
    }

    public function get_all_jenis_skincare() {
        $query = $this->db->get('tb_jenis_skincare');
        return $query->result();
    }

    public function get_all_jenis_kulit() {
        $query = $this->db->get('tb_jenis_kulit');
        return $query->result();
    }
}
