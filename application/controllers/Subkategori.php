<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subkategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_kategori');
        $this->load->model('M_subkategori');

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
        $data['data_kategori'] = $this->M_kategori->get_all_kategori();

        // Jika ada input pencarian, lakukan pencarian di model
        if (!empty($search_query)) {
            $data['data_subkategori'] = $this->M_subkategori->search_subkategori($search_query);
        } else {
            $data['data_subkategori'] = $this->M_subkategori->get_all_subkategori();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/alerts', $data);
        $this->load->view('v_subkategori/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // Tambah kategori baru
    public function add()
    {
        // Validasi form
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('nama_subkategori', 'Nama Subkategori', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        // Jika validasi gagal, tetap berada di halaman index dengan pesan error
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $data = [
                'id_kategori' => htmlspecialchars($this->input->post('id_kategori')),
                'nama_subkategori' => htmlspecialchars($this->input->post('nama_subkategori')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan'))
            ];

            $this->M_subkategori->insert_subkategori($data);
            $this->session->set_flashdata('success', 'Subkategori berhasil ditambahkan!');
        }
        redirect('Subkategori');
    }

    // Edit kategori
    public function edit($id_subkategori)
    {
        // Ambil data subkategori berdasarkan ID
        $data['data_subkategori'] = $this->M_subkategori->get_subkategori_by_id($id_subkategori);
        
        // Ambil semua kategori untuk dropdown
        $data['data_kategori'] = $this->M_kategori->get_all_kategori();
    
        // Validasi form
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('nama_subkategori', 'Nama Subkategori', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_subkategori/edit', $data);
        } else {
            $update_data = [
                'id_kategori' => $this->input->post('id_kategori'),
                'nama_subkategori' => $this->input->post('nama_subkategori'),
                'keterangan' => $this->input->post('keterangan')
            ];
    
            $this->M_subkategori->update_subkategori($id_subkategori, $update_data);
    
            $this->session->set_flashdata('success', 'Sub-kategori berhasil diupdate!');
            redirect('Subkategori');
        }
    }    

    // Hapus Sub-kategori
    public function destroy($id_subkategori)
    {
        $this->M_subkategori->delete_subkategori($id_subkategori);
        $this->session->set_flashdata('success', 'Sub-kategori berhasil dihapus!');
        redirect('Subkategori');
    }
}
