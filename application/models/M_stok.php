<?php
class M_stok extends CI_Model {

    // Fungsi untuk mengambil data stok dari tabel stok dan tabel buku
    public function get_all_stok() {
        $this->db->select('tbl_buku.nama_buku, tbl_buku.harga_buku, tbl_buku.diskon, tbl_stok.tot_harga, tbl_stok.stok, tbl_stok.is_active, tbl_stok.id_stok');
        $this->db->from('tbl_stok');
        $this->db->join('tbl_buku', 'tbl_buku.id_buku = tbl_stok.id_buku');
        $query = $this->db->get();
        return $query->result();
    }

    // Fungsi untuk memperbarui status ketersediaan dan stok
    public function update_stok($id_stok, $stok, $is_active) {
        $this->db->where('id_stok', $id_stok);
        $this->db->update('tbl_stok', [
            'stok' => $stok,
            'is_active' => $is_active
        ]);
    }

    public function search_stok($search_query) {
        $this->db->select('tbl_buku.nama_buku, tbl_buku.harga_buku, tbl_buku.diskon, tbl_stok.tot_harga, tbl_stok.stok, tbl_stok.is_active, tbl_stok.id_stok');
        $this->db->from('tbl_stok');
        $this->db->join('tbl_buku', 'tbl_buku.id_buku = tbl_stok.id_buku');
        $this->db->like('tbl_buku.nama_buku', $search_query);
        $this->db->or_like('tbl_buku.harga_buku', $search_query);
        $this->db->or_like('tbl_buku.diskon', $search_query);
        $this->db->or_like('tbl_stok.tot_harga', $search_query);
        $this->db->or_like('tbl_stok.stok', $search_query);
        $query = $this->db->get();
        return $query->result();
    }       
}
