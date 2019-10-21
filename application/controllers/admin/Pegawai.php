<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller {
    public $db;
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "member") {
        redirect('member/member');
        }
        $this->load->model('adminModel/Pegawai_model');
        $this->load->library('form_validation');
    }
    public function index(){
        $data['pgw'] = $this->Pegawai_model->getData();
        $data['get_data_sub'] = $this->Pegawai_model->getSub();
        $this->load->view("admin/datapegawai/index",$data);
    }
    public function tambah(){
        $data = array('get_sub_unit'=>$this->Pegawai_model->getSub());
        $this->load->view("admin/datapegawai/tambah",$data);
    }
    public function tambahAksi(){
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'required');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');

        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('admin/pegawai');
        }else{
            $data = $this->Pegawai_model->actionTambah();
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('admin/pegawai');
        }
    }
    public function editAksi(){
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'required');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');

        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di ubah");
            redirect('admin/pegawai');
        }else{
            $data = $this->Pegawai_model->actionEdit();
            $this->session->set_flashdata('sukses',"Data Berhasil Diupdate");
            redirect('admin/pegawai');
        }
    }
    public function hapusAksi($id){
        if($id==""){
            $this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
            redirect('admin/pegawai');
        }else{
            $this->db->where('id_data_pegawai',$id);
            $this->db->delete('data_pegawai');
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
            redirect('admin/pegawai');
        }
    }
}