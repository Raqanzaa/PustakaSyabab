<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
        $this->load->model('M_subkategori');
        $this->load->model('M_buku');
        $this->load->model('M_admin');

        if (!$this->session->userdata('username')) {
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

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['data_admin'] = $this->M_admin->get_admin_by_username($username);

        $search_query = $this->input->get('table_search', TRUE);
        $data['data_kategori'] = $this->M_kategori->get_all_kategori();
        $data['data_subkategori'] = $this->M_subkategori->get_all_subkategori();

        if (!empty($search_query)) {
            $data['data_buku'] = $this->M_buku->search_buku($search_query);
        } else {
            $data['data_buku'] = $this->M_buku->get_all_buku();
        }

        $this->load_views('v_buku/index', $data);
    }

    public function create()
    {
        $username = $this->session->userdata('username');
        $data['data_admin'] = $this->M_admin->get_admin_by_username($username);
        $data['data_kategori'] = $this->M_kategori->get_all_kategori();
        $data['data_subkategori'] = [];

        $this->load_views('v_buku/create', $data);
    }

    public function store()
    {
        $data['data_kategori'] = $this->M_kategori->get_all_kategori();
        $id_kategori = $this->input->post('id_kategori');

        if (!empty($id_kategori)) {
            $data['data_subkategori'] = $this->M_subkategori->get_subkategori_by_kategori($id_kategori);
        } else {
            $data['data_subkategori'] = [];
        }

        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Nama Penulis', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('id_subkategori', 'Sub Kategori', 'required');
        $this->form_validation->set_rules('berat_buku', 'Berat Buku', 'required|numeric');
        // $this->form_validation->set_rules('stok_buku', 'Stok Buku', 'required|integer');
        $this->form_validation->set_rules('harga_buku', 'Harga Buku', 'required|numeric');
        $this->form_validation->set_rules('diskon', 'Diskon', 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
        $this->form_validation->set_rules('deskripsi_pendek', 'Deskripsi Pendek', 'required');
        $this->form_validation->set_rules('deskripsi_panjang', 'Deskripsi Panjang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->load_views('v_buku/create', $data);
        } else {
            $postData = $this->input->post();

            $thumbnail = $this->upload_image('thumbnail');
            if (!$thumbnail) {
                $this->session->set_flashdata('error', 'Gagal mengunggah thumbnail.');
                $this->load_views('v_buku/create', $data);
                return;
            }

            $galeri_files = $this->upload_multiple_images('galeri');
            if (!$galeri_files) {
                $this->session->set_flashdata('error', 'Gagal mengunggah galeri.');
                $this->load_views('v_buku/create', $data);
                return;
            }

            $dataBuku = [
                'nama_buku' => htmlspecialchars($postData['nama_buku']),
                'penulis' => htmlspecialchars($postData['penulis']),
                'id_kategori' => htmlspecialchars($postData['id_kategori']),
                'id_subkategori' => htmlspecialchars($postData['id_subkategori']),
                'berat_buku' => htmlspecialchars($postData['berat_buku']),
                // 'stok_buku' => htmlspecialchars($postData['stok_buku']),
                'promo' => isset($postData['promo']) ? 1 : 0,
                'produk_baru' => isset($postData['produk_baru']) ? 1 : 0,
                'best_seller' => isset($postData['best_seller']) ? 1 : 0,
                'harga_buku' => htmlspecialchars($postData['harga_buku']),
                'diskon' => htmlspecialchars($postData['diskon']),
                'tag_buku' => implode(',', $postData['tag_buku']),
                'thumbnail' => $thumbnail,
                'galeri' => json_encode($galeri_files),
                'deskripsi_pendek' => htmlspecialchars($postData['deskripsi_pendek']),
                'deskripsi_panjang' => $postData['deskripsi_panjang'],
                // 'is_active' => htmlspecialchars($postData['stok_buku']) > 0 ? 1 : 0
            ];


            $this->M_buku->insert_buku($dataBuku);
            $id_buku = $this->db->insert_id();

            // Hitung harga setelah diskon
            $harga_buku = htmlspecialchars($postData['harga_buku']);
            $diskon = htmlspecialchars($postData['diskon']) / 100;
            $tot_harga = $harga_buku - ($harga_buku * $diskon);

            // Masukkan data ke tabel stok
            $dataStok = [
                'id_buku' => $id_buku,
                'tot_harga' => $tot_harga,
                'stok' => 0, // Stok awal 0
                'is_active' => 0 // Status tidak aktif (aktifkan manual)
            ];
            $this->db->insert('tbl_stok', $dataStok);

            $this->session->set_flashdata('success', 'Buku berhasil ditambahkan!');

            redirect('Buku/index');
        }
    }


    public function get_subkategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $subkategori = $this->M_subkategori->get_subkategori_by_kategori($id_kategori);

        echo json_encode($subkategori);
    }

    private function upload_image($field_name)
    {
        $config['upload_path'] = './assets/images/buku';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = uniqid();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        } else {
            return false;
        }
    }


    private function upload_multiple_images($field_name)
    {
        $config['upload_path'] = './assets/images/buku';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = uniqid();

        $this->load->library('upload', $config);

        $files = $_FILES[$field_name];
        $file_count = count($files['name']);
        $uploaded_files = [];

        for ($i = 0; $i < $file_count; $i++) {
            $_FILES['file']['name'] = $files['name'][$i];
            $_FILES['file']['type'] = $files['type'][$i];
            $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['file']['error'] = $files['error'][$i];
            $_FILES['file']['size'] = $files['size'][$i];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $uploaded_files[] = $this->upload->data('file_name');
            } else {
                return false;
            }
        }

        return $uploaded_files;
    }

    public function edit($id)
    {
        $username = $this->session->userdata('username');
        $data['data_admin'] = $this->M_admin->get_admin_by_username($username);
        $data['data_kategori'] = $this->M_kategori->get_all_kategori();
        $data['data_buku'] = $this->M_buku->get_buku_by_id($id);
        $data['data_buku']->tag_buku = explode(',', $data['data_buku']->tag_buku);

        if ($data['data_buku']) {
            $data['data_subkategori'] = $this->M_subkategori->get_subkategori_by_kategori($data['data_buku']->id_kategori);
            $this->load_views('v_buku/edit', $data);
        } else {
            $this->session->set_flashdata('error', 'Data buku tidak ditemukan.');
            redirect('Buku/index');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Nama Penulis', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('id_subkategori', 'Sub Kategori', 'required');
        $this->form_validation->set_rules('berat_buku', 'Berat Buku', 'required|numeric');
        // $this->form_validation->set_rules('stok_buku', 'Stok Buku', 'required|integer');
        $this->form_validation->set_rules('harga_buku', 'Harga Buku', 'required|numeric');
        $this->form_validation->set_rules('diskon', 'Diskon', 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
        $this->form_validation->set_rules('deskripsi_pendek', 'Deskripsi Pendek', 'required');
        $this->form_validation->set_rules('deskripsi_panjang', 'Deskripsi Panjang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->edit($id);
        } else {
            $postData = $this->input->post();
            $dataBukuLama = $this->M_buku->get_buku_by_id($id);

            $thumbnail = $this->upload_image('thumbnail');
            if ($thumbnail) {
                if ($dataBukuLama->thumbnail && file_exists('./assets/images/buku/' . $dataBukuLama->thumbnail)) {
                    unlink('./assets/images/buku/' . $dataBukuLama->thumbnail);
                }
                $dataBuku['thumbnail'] = $thumbnail;
            } else {
                $dataBuku['thumbnail'] = $dataBukuLama->thumbnail;
            }

            $deletedImages = json_decode($postData['deleted_images'], true) ?: [];

            $existingGaleri = json_decode($dataBukuLama->galeri, true) ?: [];

            foreach ($deletedImages as $deletedImage) {
                if (($key = array_search($deletedImage, $existingGaleri)) !== false) {
                    unset($existingGaleri[$key]);
                }
                if (file_exists('./assets/images/buku/' . $deletedImage)) {
                    unlink('./assets/images/buku/' . $deletedImage);
                }
            }

            $galeri_files = $this->upload_multiple_images('galeri');
            if (!empty($galeri_files)) {
                $existingGaleri = array_merge($existingGaleri, $galeri_files);
            }

            $dataBuku = [
                'nama_buku' => htmlspecialchars($postData['nama_buku']),
                'penulis' => htmlspecialchars($postData['penulis']),
                'id_kategori' => htmlspecialchars($postData['id_kategori']),
                'id_subkategori' => htmlspecialchars($postData['id_subkategori']),
                'berat_buku' => htmlspecialchars($postData['berat_buku']),
                // 'stok_buku' => htmlspecialchars($postData['stok_buku']),
                'promo' => isset($postData['promo']) ? 1 : 0,
                'produk_baru' => isset($postData['produk_baru']) ? 1 : 0,
                'best_seller' => isset($postData['best_seller']) ? 1 : 0,
                'harga_buku' => htmlspecialchars($postData['harga_buku']),
                'diskon' => htmlspecialchars($postData['diskon']),
                'tag_buku' => implode(',', $postData['tag_buku']),
                'deskripsi_pendek' => htmlspecialchars($postData['deskripsi_pendek']),
                'deskripsi_panjang' => $postData['deskripsi_panjang'],
                // 'is_active' => htmlspecialchars($postData['stok_buku']) > 0 ? 1 : 0,
                'thumbnail' => $dataBuku['thumbnail'],
                'galeri' => json_encode(array_values($existingGaleri)),
            ];

            // Update buku
            $this->M_buku->update_buku($id, $dataBuku);
            $harga_buku = htmlspecialchars($postData['harga_buku']);
            $diskon = htmlspecialchars($postData['diskon']) / 100;
            $tot_harga = $harga_buku - ($harga_buku * $diskon);

            // Update data stok di tbl_stok
            $dataStok = [
                'tot_harga' => $tot_harga,
            ];
            $this->db->where('id_buku', $id);
            $this->db->update('tbl_stok', $dataStok);

            $this->session->set_flashdata('success', 'Buku berhasil diperbarui!');
            redirect('Buku/detail/' . $id);
        }
    }


    public function detail($id)
    {
        $username = $this->session->userdata('username');
        $data['data_admin'] = $this->M_admin->get_admin_by_username($username);
        $data['data_buku'] = $this->M_buku->get_buku_by_id($id);

        if ($data['data_buku']) {
            $this->load_views('v_buku/detail', $data);
        } else {
            $this->session->set_flashdata('error', 'Data buku tidak ditemukan.');
            redirect('Buku/index');
        }
    }

    public function delete($id_buku)
    {
        $buku = $this->M_buku->get_buku_by_id($id_buku);

        if ($buku) {
            if (!empty($buku->thumbnail)) {
                $thumbnail_path = './assets/images/buku/' . $buku->thumbnail;
                if (file_exists($thumbnail_path)) {
                    unlink($thumbnail_path);
                }
            }

            if (!empty($buku->galeri)) {
                $galeri_files = json_decode($buku->galeri);
                foreach ($galeri_files as $file) {
                    $galeri_path = './assets/images/buku/' . $file;
                    if (file_exists($galeri_path)) {
                        unlink($galeri_path);
                    }
                }
            }

            $this->M_buku->delete_buku($id_buku);

            $this->session->set_flashdata('success', 'Data Buku berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data Buku tidak ditemukan.');
        }

        redirect('Buku/index');
    }
}
