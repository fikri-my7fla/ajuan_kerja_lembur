<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends MY_Controller{
    public $db;
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "member") {
        redirect('member/member');
        }
        elseif ($this->session->userdata('type') == "operator"){
            redirect('pimpinan/op');
        }
    $this->load->model('adminModel/Form_model','form_model');
    $this->load->library('form_validation');
    }
    function index(){
        $data['pegawai'] = $this->form_model->get_pegawai();
        $data['form_ajuan'] = $this->form_model->get_form_ajuan();
        $this->load->view('admin/form/index',$data);
    }
}