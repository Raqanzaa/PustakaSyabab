<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_admin_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('tbl_admin');
        return $query->row_array();
    }
}
?>
