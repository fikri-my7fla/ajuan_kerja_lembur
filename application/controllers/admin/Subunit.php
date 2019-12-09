<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subunit extends MY_Controller
{
    public $db;
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "member") {
        redirect('member/member');
        }elseif ($this->session->userdata('type') == "operator"){
            redirect('pimpinan/dashboard');
        }
        $this->load->model('adminModel/Sub_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
    }

    public function index()
    {
        $this->breadcrumbs->push('Home','admin/admin');
        $this->breadcrumbs->push('Jenis Pekerjaan','admin/subunit/index');
		$data['brcm'] = $this->breadcrumbs->show();
        $data['jenis_pekerjaan'] = $this->Sub_model->all();
        $this->load->view("admin/sub_unit/index",$data);
    }
    public function tambah(){
        $this->form_validation->set_rules('sub_unit', 'sub_unit', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('admin/subunit/index');
        }else{
            $data=array(
                "sub_unit"=>$_POST['sub_unit'],
            );
            $this->db->insert('jenis_pekerjaan',$data);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('admin/subunit/index');
        }
    }
    public function edit()
    {
        $this->form_validation->set_rules('id_jenis', 'id_jenis', 'required');
        $this->form_validation->set_rules('sub_unit', 'sub_unit', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Edit");
            redirect('admin/subunit/index');
        }else{
            $data=array(
                "sub_unit"=>$_POST['sub_unit'],
            );
            $this->db->where('id_jenis', $_POST['id_jenis']);
            $this->db->update('jenis_pekerjaan',$data);
            $this->session->set_flashdata('sukses',"Data Berhasil Diedit");
            redirect('admin/subunit/index');
        }
    }
    public function hapus()
    {
        $id = $this->input->post('delete_id',TRUE);
        $this->db->delete('jenis_pekerjaan', array('id_jenis' => $id));
        $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
		redirect('admin/subunit/index');
    }
}