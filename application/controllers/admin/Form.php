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
        $this->load->library('form_validation');
        }
    }
    public function index(){
        $this->load->view('admin/form/index');
    }
    public function tambah(){
        $this->load->model('adminModel/Form_model');
        $data['pal'] = $this->Form_model->unit();
        $this->load->view('admin/form/tambah',$data);
    }
    public function aksiTambah(){
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('unit_kerja', 'unit_kerja', 'required');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
        $this->form_validation->set_rules('hasil', 'hasil', 'required');
        $this->form_validation->set_rules('alasan', 'alasan', 'required');

        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('admin/form');
        }else{
            $this->load->model('adminModel/Form_model');
            $data = $this->Form_model->actionTambah();
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('admin/form');
        }
    }
}