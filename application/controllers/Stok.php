<?php
class Stok extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_stok');
        $this->load->model('M_admin');
        $this->load->model('M_buku');

        if (!$this->session->userdata('username')){
            redirect('Auth');
        }
    }

    private function load_views($view, $data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/alerts', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/footer', $data);
    }

    // Fungsi untuk menampilkan halaman stok
    public function index() 
    {
        $username = $this->session->userdata('username');
        $data['data_admin'] = $this->M_admin->get_admin_by_username($username);

        $search_query = $this->input->get('table_search', TRUE);

        if (!empty($search_query)) {
            $data['data_stok'] = $this->M_stok->search_stok($search_query);
        } else {
            $data['data_stok'] = $this->M_stok->get_all_stok();
        }

        $this->load_views('v_stok/index', $data);
    }

    // Fungsi untuk mengubah stok dan status ketersediaan
    public function update_stok() {
        $id_stok = $this->input->post('id_stok');
        $stok = $this->input->post('stok');
        $is_active = $this->input->post('is_active');
        $this->M_stok->update_stok($id_stok, $stok, $is_active);
        redirect('Stok');
    }
}
