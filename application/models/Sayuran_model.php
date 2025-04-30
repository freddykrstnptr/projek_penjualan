<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sayuran_model extends CI_Model {
    public function get_data($table) {

        return $this->db->get($table);
    }

    public function insert_data($data, $table) {
        $this -> db -> insert($table, $data);
    }

    public function update_data($data, $table) {
        $this->db->where('id_sayur', $data['id_sayur']);
        $this->db->update($table, $data);
    }

    public function delete($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // Ambil produk biasa (yang bukan Pakbum)
    public function get_produk() {
        $this->db->where('nama_sayur !=', 'Pakbum 1');
        $this->db->where('nama_sayur !=', 'Pakbum 2');
        $this->db->where('nama_sayur !=', 'Pakbum 3');
        return $this->db->get('sayuran')->result();
    }
    
    // Ambil promo Pakbum
    public function get_promo() {
        $this->db->where_in('nama_sayur', ['Pakbum 1', 'Pakbum 2', 'Pakbum 3']);
        return $this->db->get('sayuran')->result();
    }

}


?>