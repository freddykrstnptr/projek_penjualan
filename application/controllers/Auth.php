<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model'); // Pastikan model sudah dibuat
        $this->load->library('session');
    }

    public function login() {
        $this->load->view('auth/login'); // Pastikan file login ada di views/auth/
    }

    public function register() {
        $this->load->view('auth/register'); // Pastikan file register ada di views/auth/
    }

    public function login_aksi() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
        $user = $this->Auth_model->get_user_by_email($email);
    
        if ($user) {
            if ($user->password === $password) {
                $session_data = [
                    'id' => $user->id,
                    'nama' => $user->nama,
                    'email' => $user->email,
                    'role' => $user->role,
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);

                $this->session->set_flashdata('welcome', 'Selamat Datang di Paket- Kangkung');
                redirect('user/home');
    
                // Arahkan berdasarkan role
                if ($user->role == 'admin') {
                    redirect('dashboard'); // Admin masuk ke dashboard admin
                } else {
                    redirect('user/home'); // User masuk ke dashboard_user.php
                }
            } else {
                $this->session->set_flashdata('error', 'Password salah!');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Email tidak ditemukan!');
            redirect('auth/login');
        }
    }

    public function logout() {
        // Hapus semua sesi pengguna
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy(); // Menghapus semua sesi

        // Redirect ke halaman login
        redirect('auth/login');
    }

    public function register_aksi() {
        $this->load->library('form_validation');
    
        // Aturan validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    
        if ($this->form_validation->run() == FALSE) {
            $this->register(); // tampilkan lagi form
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' => 'user'
            ];
    
            $this->load->model('Auth_model');
            $this->Auth_model->insert_user($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
            redirect('auth/register');
        }
    }

    // Tampilkan halaman lupa password
    public function lupa_password() {
        $this->load->view('auth/lupa_password');
    }

    public function cek_email() {
        $email = $this->input->post('email');
        $user = $this->db->get_where('users', ['email' => $email])->row();

        if ($user) {
            $data['email'] = $email;
            $this->load->view('auth/ubah_password', $data);
        } else {
            $this->session->set_flashdata('error', 'Email tidak ditemukan.');
            redirect('auth/lupa_password');
        }
    }

    public function ubah_password() {
        $email = $this->input->post('email');
        $password_baru = $this->input->post('password');

        $this->db->where('email', $email);
        $this->db->update('users', ['password' => $password_baru]);

        $this->session->set_flashdata('success', 'Password berhasil diubah. Silahkan login.');
        redirect('auth/login');
    }
}
?>
