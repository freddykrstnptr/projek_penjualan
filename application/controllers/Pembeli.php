<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Pembeli_model'); // Pastikan nama model sesuai dengan file
        $this->load->library('form_validation');
    }

    public function index() {
        $data["title"] = 'Pembeli';
        $data["pembeli"] = $this->Pembeli_model->get_data('pembeli') -> result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembeli', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data["title"] = 'Tambah Pembeli';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_pembeli');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_pembeli' => $this->input->post('namapembeli'),
                'gender' => $this->input->post('gender'),
                'notelefon' => $this->input->post('notelefon'),
                'alamat_pembeli' => $this->input->post('alamatpembeli'),
            );

            $this->Pembeli_model->insert_data($data, 'pembeli');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('pembeli');
        }
    }

    public function print() {
        $data['pembeli'] = $this->Pembeli_model->get_data('pembeli')->result();
        $this->load->view('print_pembeli', $data);
    }

    public function pdf() {
        $this->load->library('dompdf_gen');

        $data['pembeli'] = $this->Pembeli_model->get_data('pembeli')->result();
        $this->load->view('laporan_pembeli', $data);

        $paper_size = 'A4';
        $orientation = "potrait";
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_pembeli.pdf', array('Attachment' => 0));
    }

    public function edit($id_pembeli) {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_pembeli' => $id_pembeli,
                'nama_pembeli' => $this->input->post('namapembeli'),
                'gender' => $this->input->post('gender'),
                'notelefon' => $this->input->post('notelefon'),
                'alamat_pembeli' => $this->input->post('alamatpembeli'),
            );

            $this->Pembeli_model->update_data($data, 'pembeli');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('pembeli');
        }
    }

    public function delete($id) {
        $where = array('id_pembeli' => $id);

        $this->Pembeli_model->delete($where, 'pembeli');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
        redirect('pembeli');
    }

    public function _rules() {
        $this->form_validation->set_rules('namapembeli', 'Nama Pembeli', 'required', array('required' => '%s Harus Diisi!!'));
        $this->form_validation->set_rules('gender', 'Gender', 'required', array('required' => '%s Harus Diisi!!'));
        $this->form_validation->set_rules('notelefon', 'No Telefon', 'required', array('required' => '%s Harus Diisi!!'));
        $this->form_validation->set_rules('alamatpembeli', 'Alamat Pembeli', 'required', array('required' => '%s Harus Diisi!!'));
    }
}


?>