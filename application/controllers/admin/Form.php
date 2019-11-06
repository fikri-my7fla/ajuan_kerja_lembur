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
            redirect('pimpinan/dashboard');
        }
    $this->load->model('adminModel/Form_model','form_model');
    $this->load->library('form_validation');
    }
    function index(){
        $data['subunit'] = $this->form_model->get_data_sub();
        $data['pegawai'] = $this->form_model->get_pegawai();
        $data['form_ajuan'] = $this->form_model->get_form_ajuan();
        $this->load->view('admin/form/index',$data);
    }
    function tambah(){
        $data['subunit'] = $this->form_model->get_data_sub();
        $data['pegawai'] = $this->form_model->get_pegawai();
        $data['form_ajuan'] = $this->form_model->get_form_ajuan();
        $this->load->view('admin/form/create',$data);
    }
    function detail($id_form_ajuan){
        $data['test'] = $this->form_model->get_form_detail($id_form_ajuan);
        $data['apa_yah'] = $this->form_model->get_pgw_detail($id_form_ajuan);
        $this->load->view('admin/form/detail',$data);
    }
    //CREATE
	function create(){
        $tanggal = $this->input->post('tanggal',TRUE);
        $unit_kerja = $this->input->post('unit_kerja',TRUE);
        $jenis_id = $this->input->post('jenis_id',TRUE);
        $hasil = $this->input->post('hasil',TRUE);
        $alasan = $this->input->post('alasan',TRUE);
        $pegawai = $this->input->post('pegawai',TRUE);

        $this->form_model->create_form($tanggal,$unit_kerja,$jenis_id,$hasil,$alasan,$pegawai);
        $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
		redirect('admin/form');
	}
    function get_pegawai_by_form(){
        $id_form_ajuan=$this->input->post('id_form_ajuan');
        $data=$this->form_model->get_pegawai_by_form($id_form_ajuan)->result();
        foreach ($data as $result) {
            $value[] = (float) $result->id_data_pegawai;
        }
        echo json_encode($value);
    }
    function edit(){
        $id_form_ajuan = $this->input->post('edit_id', TRUE);
        $tanggal = $this->input->post('tanggal',TRUE);
        $unit_kerja = $this->input->post('unit_kerja',TRUE);
        $jenis_id = $this->input->post('jenis_id',TRUE);
        $hasil = $this->input->post('hasil',TRUE);
        $alasan = $this->input->post('alasan',TRUE);
        $status = $this->input->post('status',TRUE);
        $pegawai = $this->input->post('pegawai_edit',TRUE);

        $this->form_model->update_form($id_form_ajuan,$tanggal,$unit_kerja,$jenis_id,$hasil,$alasan,$status,$pegawai);
        $this->session->set_flashdata('sukses',"Data Berhasil Diubah");
		redirect('admin/form');
    }
    function delete(){
		$id_form_ajuan = $this->input->post('delete_id',TRUE);
        $this->form_model->delete_form($id_form_ajuan);
        $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
		redirect('admin/form');
    }
}