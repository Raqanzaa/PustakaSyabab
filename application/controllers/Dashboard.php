<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load any necessary models or libraries here
    }

    public function index() {
        // Load any data you want to pass to the view
        $data = array();

        // Load the view
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);   
        $this->load->view('templates/dashboard_navbar', $data);
        $this->load->view('v_dashboard/index', $data);
        $this->load->view('templates/dashboard_footer', $data);
    }
}
