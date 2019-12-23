<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direct_form extends MY_Controller{
    public $db;
    public function __construct()
    {
        parent::__construct();
    $this->load->model('Direct_model','direct_model');
    $this->load->library('form_validation');
    }
    function tambah(){
        $data['subunit'] = $this->direct_model->get_data_sub();
        $data['pegawai'] = $this->direct_model->get_pegawai();
        $this->load->view('authentication/create',$data);
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

        $this->direct_model->create_form($tanggal,$unit_kerja,$jenis_id,$hasil,$alasan,$pengusul,$pegawai);
        $this->session->set_flashdata('success',"Data Berhasil Disimpan");
		redirect('authentication/auth/login');
	}
}