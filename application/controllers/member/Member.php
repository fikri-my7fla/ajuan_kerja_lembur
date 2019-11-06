<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "admin") {
        redirect('admin/admin');
        }
        elseif ($this->session->userdata('type') == "operator"){
            redirect('pimpinan/op');
        }
    }
    
    //TAMPILAN SELAMAT DATANG MEMBER
    public function index()
    {
        $data['title'] = 'Beranda';

        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view('member/_partials/side');
        $this->load->view('member/_partials/top');
        $this->load->view('member/dashboard');
        $this->load->view('member/_partials/foot');
    }
}