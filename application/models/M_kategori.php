<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mengambil semua data kategori
    public function get_all_kategori() {
        $query = $this->db->get('tbl_kategori');
        return $query->result();
    }

    // Fungsi untuk menambah kategori baru
    public function insert_kategori($data) {
        return $this->db->insert('tbl_kategori', $data);
    }

    // Fungsi untuk mengambil data kategori berdasarkan id
    public function get_kategori_by_id($id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get('tbl_kategori');
        return $query->row_array();
    }

    // Fungsi untuk mengupdate kategori
    public function update_kategori($id_kategori, $data) {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->update('tbl_kategori', $data);
    }

    // Fungsi untuk menghapus kategori
    public function delete_kategori($id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->delete('tbl_kategori');
    }

    public function search_kategori($search_query) {
        $this->db->like('nama_kategori', $search_query);
        $this->db->or_like('keterangan', $search_query);
        $query = $this->db->get('tbl_kategori');
        return $query->result();
    }    
}
