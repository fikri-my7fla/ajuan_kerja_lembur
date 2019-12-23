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
        elseif ($this->session->userdata('type') == "operator"){
            redirect('pimpinan/dashboard');
        }
        $this->load->model('adminModel/Pegawai_model','pegawai_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
    }
    public function index(){
        $this->breadcrumbs->push('Home','admin/admin');
        $this->breadcrumbs->push('Pegawai','admin/pegawai/index');
		$data['test1'] = $this->breadcrumbs->show();
        $data['pgw'] = $this->pegawai_model->getData();
        $data['get_data_sub'] = $this->pegawai_model->getSub();
        $this->load->view("admin/datapegawai/index",$data);
    }
    public function tambah(){
        $this->breadcrumbs->push('Home','admin/admin');
        $this->breadcrumbs->push('Pegawai','admin/pegawai/index');
        $this->breadcrumbs->push('Tambah','admin/pegawai/tambah');
        $data['tambah'] = $this->breadcrumbs->show();
        $data['get_sub_unit'] = $this->pegawai_model->getSub();
        $this->load->view("admin/datapegawai/tambah",$data);
    }
    public function tambahAksi(){
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);
        $type = $this->input->post('type',true);
        $nip = $this->input->post('nip',true);
        $nama_pegawai = $this->input->post('nama_pegawai',true);
        $jenis_id = $this->input->post('jenis_id',true);

        $this->pegawai_model->actionTambah($username,$password,$type,$nip,$nama_pegawai,$jenis_id);
        $this->session->set_flashdata('sukses',"Data Berhasil Ditambah");
        redirect('admin/pegawai/index');
    }
    public function editAksi(){
        $nip = $this->input->post('nip',true);
        $nama_pegawai = $this->input->post('nama_pegawai',true);
        $jenis_id = $this->input->post('jenis_id',true);
        $edit = $this->input->post('edit_nip',true);

        $this->pegawai_model->actionEdit($nip,$nama_pegawai,$jenis_id,$edit);
        $this->session->set_flashdata('sukses',"Data Berhasil Diupdate");
        redirect('admin/pegawai/index');
    }
    public function hapusAksi(){
        $nip = $this->input->post('nip_delete',true);
        $this->pegawai_model->actionDelete($nip);
        $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
		redirect('admin/pegawai/index');
    }
}