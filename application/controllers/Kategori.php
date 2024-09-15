<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_kategori');

        if (!$this->session->userdata('username')) {
            redirect('Auth');
        }
    }

    // Halaman utama kategori (list)
    public function index()
    {
        $username = $this->session->userdata('username');
        $data['data_admin'] = $this->M_admin->get_admin_by_username($username);

        // Ambil input pencarian
        $search_query = $this->input->get('table_search', TRUE);

        // Jika ada input pencarian, lakukan pencarian di model
        if (!empty($search_query)) {
            $data['data_kategori'] = $this->M_kategori->search_kategori($search_query);
        } else {
            $data['data_kategori'] = $this->M_kategori->get_all_kategori();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/alerts', $data);
        $this->load->view('v_kategori/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // Tambah kategori baru
    public function add()
    {
        // Validasi form
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        // Jika validasi gagal, tetap berada di halaman index dengan pesan error
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan'))
            ];
            $this->M_kategori->insert_kategori($data);
            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan!');
        }

        redirect('Kategori');
    }

    // Edit kategori
    public function edit($id_kategori)
    {
        $data['kategori'] = $this->M_kategori->get_kategori_by_id($id_kategori);

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_kategori/edit', $data);
        } else {
            $update_data = [
                'nama_kategori' => $this->input->post('nama_kategori'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->M_kategori->update_kategori($id_kategori, $update_data);
            $this->session->set_flashdata('success', 'Kategori berhasil diupdate!');
            redirect('Kategori');
        }
    }

    // Hapus kategori
    public function destroy($id_kategori)
    {
        $this->M_kategori->delete_kategori($id_kategori);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus!');
        redirect('Kategori');
    }
}
