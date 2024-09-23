<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load any necessary models or libraries here
    }

    private function load_views_general($view, $data)
    {
        $this->load->view('templates/landing_header', $data);
        $this->load->view('templates/landing_topbar', $data);
        $this->load->view('templates/landing_sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/landing_footer', $data);
    }

    private function load_views($view, $data)
    {
        $this->load->view('templates/landing_header', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/landing_footer', $data);
    }

    public function index() {
        // Load any data you want to pass to the view
        $data = array();

        $this->load_views_general('v_landing/index', $data);
    }

    public function detail() {
        // Load any data you want to pass to the view
        $data = array();

        // Load the view
        $this->load->view('templates/landing_header', $data);
        // $this->load->view('templates/landing_topbar', $data);   
        // $this->load->view('templates/landing_sidebar', $data);
        $this->load->view('v_landing/index', $data);
        $this->load->view('templates/landing_footer', $data);
    }
}
