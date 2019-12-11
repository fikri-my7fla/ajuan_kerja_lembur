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
        $this->load->helper('short_number');
    }

    // Untuk Menampilkan Daftar Honor
    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title']   = 'Daftar Honor';
        $data['honor']   = $this->honor_model->index();
        $data['user'] = $this->honor_model->get_pegawai_user($id_user);

        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view('member/honor/index', $data);
        $this->load->view('member/_partials/footFF');
    }
    public function tambah(){
        if(isset($_POST['sign']) && $_POST['sign']) {
            $json = $_POST['sign'];
            $nip_pgw = $this->input->post('nip_pgw');
            $honor_id = $this->input->post('honor_id',true);
            $this->honor_model->insert_insert($json,$nip_pgw,$honor_id);
        }
    }
}