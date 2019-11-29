<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Honor extends MY_Controller
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
        $this->load->model('membersModel/honor_model', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    // Untuk Menampilkan Daftar Honor
    public function index()
    {
        $data['title']   = 'Daftar Honor';
        $data['honor']   = $this->honor_model->index();

        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view('member/honor/index', $data);
        $this->load->view('member/_partials/foot');
    }
}