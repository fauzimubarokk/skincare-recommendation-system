<?php
class Skincare extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Skincare_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        $this->load->library('auth');

        if ($this->auth->check_login_is_admin() == FALSE) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['contents'] = 'admin/skincare';
        $data['skincare'] = $this->Skincare_model->get_all_skincare();
        $data['jenis_skincare'] = $this->Skincare_model->get_all_jenis_skincare();
        $data['jenis_kulit'] = $this->Skincare_model->get_all_jenis_kulit();
        $this->load->view('admin/index', $data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('detail', 'Detail', 'required');
        $this->form_validation->set_rules('id_jenis_skincare', 'Jenis Skincare', 'required');
        $this->form_validation->set_rules('id_jenis_kulit', 'Jenis Kulit', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('skincare');
        } else {
            $data = array(
                'merk' => $this->input->post('merk'),
                'detail' => $this->input->post('detail'),
                'id_jenis_skincare' => $this->input->post('id_jenis_skincare'),
                'id_jenis_kulit' => $this->input->post('id_jenis_kulit'),
                'harga' => $this->input->post('harga')
            );

            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $upload_data = $this->upload->data();
                    $data['gambar'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('skincare');
                }
            }

            $this->Skincare_model->insert_skincare($data);
            $this->session->set_flashdata('success', 'Data skincare berhasil ditambahkan.');
            redirect('skincare');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('detail', 'Detail', 'required');
        $this->form_validation->set_rules('id_jenis_skincare', 'Jenis Skincare', 'required');
        $this->form_validation->set_rules('id_jenis_kulit', 'Jenis Kulit', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('skincare');
        } else {
            $data = array(
                'merk' => $this->input->post('merk'),
                'detail' => $this->input->post('detail'),
                'id_jenis_skincare' => $this->input->post('id_jenis_skincare'),
                'id_jenis_kulit' => $this->input->post('id_jenis_kulit'),
                'harga' => $this->input->post('harga')
            );

            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $upload_data = $this->upload->data();
                    $data['gambar'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('skincare');
                }
            }

            $this->Skincare_model->update_skincare($id, $data);
            $this->session->set_flashdata('success', 'Data skincare berhasil diperbarui.');
            redirect('skincare');
        }
    }

    public function delete($id)
    {
        $this->Skincare_model->delete_skincare($id);
        $this->session->set_flashdata('success', 'Data skincare berhasil dihapus.');
        redirect('skincare');
    }
}
