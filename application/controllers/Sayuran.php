<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sayuran extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Sayuran_model'); // Pastikan nama model sesuai dengan file
        $this->load->library('form_validation');
    }

    public function index() {
        $data["title"] = 'Sayuran';
        $data["sayuran"] = $this->Sayuran_model->get_data('sayuran')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sayuran', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data["title"] = 'Tambah Sayuran';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_sayur');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $config['upload_path'] = FCPATH . 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048;
    
            // Cek folder valid
            echo 'Upload path: ' . $config['upload_path'] . '<br>';
            echo 'Exists? ' . (file_exists($config['upload_path']) ? 'YES' : 'NO') . '<br>';
            echo 'Writable? ' . (is_writable($config['upload_path']) ? 'YES' : 'NO') . '<br>';                       
    
            $this->load->library('upload');
            $this->upload->initialize($config); 
    
            $foto = '';
            if (!empty($_FILES['foto']['name'])) {
                if (!$this->upload->do_upload('foto')) {
                    echo 'Upload error: ' . $this->upload->display_errors();
                    die('Upload Error');
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
    
            $data = array(
                'nama_sayur' => $this->input->post('namasayuran'),
                'jenis_sayur' => $this->input->post('jenis'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
                'foto' => $foto
            );
    
            $this->Sayuran_model->insert_data($data, 'sayuran');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('sayuran');
        }
    }

    public function print() {
        $data['sayuran'] = $this->Sayuran_model->get_data('sayuran')->result();
        $this->load->view('print_sayur', $data);
    }

    public function pdf() {
        $this->load->library('dompdf_gen');

        $data['sayuran'] = $this->Sayuran_model->get_data('sayuran')->result();
        $this->load->view('laporan_sayur', $data);

        $paper_size = 'A4';
        $orientation = "potrait";
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_sayur.pdf', array('Attachment' => 0));
    }

    public function edit($id_sayur) {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $config['upload_path']   = FCPATH . 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048;
    
            $this->load->library('upload');
            $this->upload->initialize($config); // <-- INI YANG WAJIB
    
            $foto = '';
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                } else {
                    echo "Upload error: " . $this->upload->display_errors();
                    die('Upload Error (edit)');
                }
            } else {
                $foto = $this->input->post('foto_lama');
            }
    
            $data = array(
                'id_sayur'   => $id_sayur,
                'nama_sayur'=> $this->input->post('namasayuran'),
                'jenis_sayur'=> $this->input->post('jenis'),
                'stok'      => $this->input->post('stok'),
                'harga'     => $this->input->post('harga'),
                'foto'      => $foto
            );
    
            $this->Sayuran_model->update_data($data, 'sayuran');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah!</div>');
            redirect('sayuran');
        }
    }    

    public function delete($id) {
        $where = array('id_sayur' => $id);

        $this->Sayuran_model->delete($where, 'sayuran');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
        redirect('sayuran');
    }

    public function _rules() {
        $this->form_validation->set_rules('namasayuran', 'Nama Sayuran', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Sayuran', 'required');
        $this->form_validation->set_rules('stok', 'Stok Sayuran', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        // Tidak perlu validasi foto sebagai required, karena tidak semua kondisi harus upload foto baru
    }    

    public function keranjang() {
        $this->load->view('keranjang');
    }
}
?>