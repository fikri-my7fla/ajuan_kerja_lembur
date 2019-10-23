<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller
{
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
        $this->load->model('membersModel/pegawai_model', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['title'] = 'Data Pegawai';
        // $data['data_pegawai'] = $this->data_model->getAll();

        $data['unit'] = $this->pegawai_model->getAll();

        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view("member/data_pegawai/index", $data);
        $this->load->view('member/_partials/foot');
    }

}