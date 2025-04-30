<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Sayuran_model'); // <<< TAMBAHKAN INI BROO 🔥

        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        // Cek apakah role user adalah "user"
        if ($this->session->userdata('role') !== 'user') {
            redirect('dashboard');
        }
    }

    public function home() {
        $data["title"] = 'Dashboard User';
        $data["sayuran"] = $this->Sayuran_model->get_data('sayuran')->result(); // <<< TAMBAHKAN INI BROO 🔥
        $data["promo"] = $this->Sayuran_model->get_promo(); // Produk Promo
        $this->load->view('dashboard_user', $data);
    }

    public function update_stok() {
        $id = $this->input->post('id');
        $quantity = (int) $this->input->post('quantity');
    
        $this->db->where('id_sayur', $id);
        $sayur = $this->db->get('sayuran')->row();
    
        if ($sayur) {
            $stok_baru = $sayur->stok - $quantity;
            if ($stok_baru < 0) {
                $stok_baru = 0;
            }
    
            $this->db->where('id_sayur', $id);
            $this->db->update('sayuran', ['stok' => $stok_baru]);
    
            echo "Stok berhasil dikurangi.";
        } else {
            echo "Produk tidak ditemukan.";
        }
    }
    

}
?>
