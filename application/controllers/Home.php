<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index()
    {
        $this->load->view('dashboard_user'); // Pastikan file dashboard_user.php ada di folder views
    }
}
