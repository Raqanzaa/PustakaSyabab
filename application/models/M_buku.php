<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_buku() {
        $this->db->select('tbl_buku.*, tbl_kategori.nama_kategori, tbl_subkategori.nama_subkategori');
        $this->db->from('tbl_buku');
        $this->db->join('tbl_kategori', 'tbl_buku.id_kategori = tbl_kategori.id_kategori');
        $this->db->join('tbl_subkategori', 'tbl_buku.id_subkategori = tbl_subkategori.id_subkategori');
        $query = $this->db->get();
        return $query->result();
    }

    // Fungsi untuk mengambil data kategori berdasarkan id
    public function get_buku_by_id($id_buku) {
        $this->db->select('tbl_buku.*, tbl_kategori.nama_kategori, tbl_subkategori.nama_subkategori');
        $this->db->from('tbl_buku');
        $this->db->join('tbl_kategori', 'tbl_buku.id_kategori = tbl_kategori.id_kategori');
        $this->db->join('tbl_subkategori', 'tbl_buku.id_subkategori = tbl_subkategori.id_subkategori');
        $this->db->where('tbl_buku.id_buku', $id_buku);
        $query = $this->db->get();
        return $query->row();
    }

    // Fungsi untuk menambah kategori baru
    public function insert_buku($data) {
        return $this->db->insert('tbl_buku', $data);
    }

    public function update_buku($id_buku, $data) {
        $this->db->where('id_buku', $id_buku);
        return $this->db->update('tbl_buku', $data);
    }

    // Fungsi untuk menghapus kategori
    public function delete_buku($id_buku) {
        $this->db->where('id_buku', $id_buku);
        return $this->db->delete('tbl_buku');
    }

    public function search_buku($search_query) {
        $this->db->select('tbl_buku.*, tbl_kategori.nama_kategori, tbl_subkategori.nama_subkategori');
        $this->db->from('tbl_buku');
        $this->db->join('tbl_kategori', 'tbl_buku.id_kategori = tbl_kategori.id_kategori');
        $this->db->join('tbl_subkategori', 'tbl_buku.id_subkategori = tbl_subkategori.id_subkategori');
        $this->db->like('tbl_kategori.nama_kategori', $search_query);
        $this->db->or_like('tbl_subkategori.nama_subkategori', $search_query);
        $this->db->or_like('tbl_buku.nama_buku', $search_query);
        $this->db->or_like('tbl_buku.penulis', $search_query);
        $this->db->or_like('tbl_buku.berat_buku', $search_query);
        // $this->db->or_like('tbl_buku.stok_buku', $search_query);
        $this->db->or_like('tbl_buku.promo', $search_query);
        $this->db->or_like('tbl_buku.produk_baru', $search_query);
        $this->db->or_like('tbl_buku.best_seller', $search_query);
        $this->db->or_like('tbl_buku.harga_buku', $search_query);
        $this->db->or_like('tbl_buku.diskon', $search_query);
        $this->db->or_like('tbl_buku.tag_buku', $search_query);
        $this->db->or_like('tbl_buku.deskripsi_pendek', $search_query);
        $query = $this->db->get();
        return $query->result();
    }       
}
