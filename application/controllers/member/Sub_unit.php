<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_unit extends MY_Controller
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
        $this->load->model('membersModel/sub_model', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    //MENAMPILKAN DAFTAR SUB UNIT
    public function index()
    {
        $data['title'] = 'Sub Unit';
        $data['sub_unit'] = $this->sub_model->getAll();

        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view("member/sub_unit/index", $data);
        $this->load->view('member/_partials/foot');
    }

    //MENAMPILKAN DETAIL SUB UNIT
    public function detail($id_jenis)
    {
        $data['title'] = 'Detail Unit Kerja';
        $data['detail_sub'] = $this->sub_model->getsub_unit_by_id($id_jenis);
        $data['detail_pegawai'] = $this->sub_model->getdetail_pegawai($id_jenis);

        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view("member/sub_unit/detail", $data);
        $this->load->view('member/_partials/foot');
    }
}