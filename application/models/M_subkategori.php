<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_subkategori extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_subkategori() {
        $this->db->select('tbl_subkategori.*, tbl_kategori.nama_kategori');
        $this->db->from('tbl_subkategori');
        $this->db->join('tbl_kategori', 'tbl_subkategori.id_kategori = tbl_kategori.id_kategori');
        $query = $this->db->get();
        return $query->result();
    }

    // Fungsi untuk mengambil data kategori berdasarkan id
    public function get_subkategori_by_id($id_subkategori) {
        $this->db->select('tbl_subkategori.*, tbl_kategori.nama_kategori');
        $this->db->from('tbl_subkategori');
        $this->db->join('tbl_kategori', 'tbl_subkategori.id_kategori = tbl_kategori.id_kategori');
        $this->db->where('tbl_subkategori.id_subkategori', $id_subkategori);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_subkategori_by_kategori($id_kategori) {
        $this->db->from('tbl_subkategori');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        return $query->result(); // Mengembalikan array objek
    }    

    // Fungsi untuk menambah kategori baru
    public function insert_subkategori($data) {
        return $this->db->insert('tbl_subkategori', $data);
    }

    // Fungsi untuk mengupdate kategori
    public function update_subkategori($id_subkategori, $data) {
        $this->db->where('id_subkategori', $id_subkategori);
        return $this->db->update('tbl_subkategori', $data);
    }

    // Fungsi untuk menghapus kategori
    public function delete_subkategori($id_subkategori) {
        $this->db->where('id_subkategori', $id_subkategori);
        return $this->db->delete('tbl_subkategori');
    }

    public function search_subkategori($search_query) {
        $this->db->select('tbl_subkategori.*, tbl_kategori.nama_kategori');
        $this->db->from('tbl_subkategori');
        $this->db->join('tbl_kategori', 'tbl_subkategori.id_kategori = tbl_kategori.id_kategori');
        $this->db->like('tbl_kategori.nama_kategori', $search_query);
        $this->db->or_like('tbl_subkategori.nama_subkategori', $search_query);
        $this->db->or_like('tbl_subkategori.keterangan', $search_query);
        $query = $this->db->get();
        return $query->result();
    }       
}
