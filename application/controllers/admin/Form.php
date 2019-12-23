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
    $this->load->library('breadcrumbs');
    }
    function index(){
        $this->breadcrumbs->push('Home','admin/admin');
        $this->breadcrumbs->push('Ajuan Lembur','admin/form/index');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['subunit'] = $this->form_model->get_data_sub();
        $data['pegawai'] = $this->form_model->get_pegawai();
        $data['form_ajuan'] = $this->form_model->get_form_ajuan();
        $this->load->view('admin/form/index',$data);
    }
    function tambah(){
        $user_id = $this->session->userData('id_user');
        $this->breadcrumbs->push('Home','admin/admin');
        $this->breadcrumbs->push('Ajuan Lembur','admin/form/index');
        $this->breadcrumbs->push('Tambah','admin/form/tambah');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['subunit'] = $this->form_model->get_data_sub();
        $data['pegawai'] = $this->form_model->get_pegawai();
        $data['form_ajuan'] = $this->form_model->get_form_ajuan();
        $data['cape'] = $this->form_model->get_pegawai_user($user_id);
        $this->load->view('admin/form/create',$data);
    }
    function detail($id_form_ajuan){
        $this->breadcrumbs->push('Home','admin/');
        $this->breadcrumbs->push('Ajuan','admin/form');
        $this->breadcrumbs->push('Detail Data','admin/form/detail');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['test'] = $this->form_model->get_form_detail($id_form_ajuan);
        $data['apa_yah'] = $this->form_model->get_pgw_detail($id_form_ajuan);
        $data['sign1'] = $this->form_model->show_sign1_data($id_form_ajuan);
        $this->load->view('admin/form/detail',$data);
    }
    //CREATE
	function create(){
        $tanggal = $this->input->post('tanggal',TRUE);
        $unit_kerja = $this->input->post('unit_kerja',TRUE);
        $jenis_id = $this->input->post('jenis_id',TRUE);
        $hasil = $this->input->post('hasil',TRUE);
        $alasan = $this->input->post('alasan',TRUE);
        $pengusul = $this->input->post('pengusul',TRUE);
        $pegawai = $this->input->post('pegawai',TRUE);

        $this->form_model->create_form($tanggal,$unit_kerja,$jenis_id,$hasil,$alasan,$pengusul,$pegawai);
        $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
		redirect('admin/form/index');
	}
    function get_pegawai_by_(){
        $id_form_ajuan=$this->input->post('id_form_ajuan');
        $data['pgw'] = $this->form_model->get_pegawai_by_form($id_form_ajuan)->result();
        foreach ($data['pgw'] as $result) {
            $value[] = (float) $result->nip;
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
        $pengusul = $this->input->post('pengusul',TRUE);
        $pegawai = $this->input->post('pegawai_edit',TRUE);

        $this->form_model->update_form($id_form_ajuan,$tanggal,$unit_kerja,$jenis_id,$hasil,$alasan,$status,$pengusul,$pegawai);
        $this->session->set_flashdata('sukses',"Data Berhasil Diubah");
		redirect('admin/form/index');
    }
    function delete(){
		$id_form_ajuan = $this->input->post('delete_id',TRUE);
        $this->form_model->delete_form($id_form_ajuan);
        $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
		redirect('admin/form');
    }
}