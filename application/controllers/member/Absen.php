<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "admin") {
        redirect('admin/admin');
        }
        elseif ($this->session->userdata('type') == "operator"){
            redirect('pimpinan/dashboard');
        }
        $this->load->model('membersModel/absen_model', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    // Untuk Menampilkan Daftar Absen Lembur
    public function index()
    {
        $data['title']          = 'Absen Lembur';
        $data['absen_lembur']   = $this->absen_model->getAbsenLembur();

        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view('member/absen/index', $data);
        $this->load->view('member/_partials/foot');
    }
}