<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_admin');

        if (!$this->session->userdata('username')) {
            redirect('Auth');
        }
    }

    public function index() {
        $username = $this->session->userdata('username');
        $data = [];
        // Load any data you want to pass to the view
        // $admin_data = $this->M_admin->get_admin_by_username($username);

        $data['data_admin'] = $this->M_admin->get_admin_by_username($username);
        // $data = array();

        // Load the view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);   
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/alerts', $data);
        $this->load->view('v_dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
