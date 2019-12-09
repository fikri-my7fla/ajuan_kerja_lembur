<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends MY_Controller{
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
        $this->load->model('adminModel/Absen_model','absen_model');
        $this->load->library('breadcrumbs');
    }
    function index(){
        
        $id_user = $this->session->userdata('id_user');
        $this->breadcrumbs->push('Home','admin/admin');
        $this->breadcrumbs->push('Absen Lembur','admin/absen/index');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['absen'] = $this->absen_model->absen($id_user);
        $data['user'] = $this->absen_model->get_pegawai_user($id_user);
        $data['sign'] = $this->absen_model->sign($id_user);
        $data['tabel'] = $this->absen_model->daftar_absen();
        $this->load->view('admin/absen/index',$data);
    }
    function tambah(){
        if(isset($_POST['sign']) && $_POST['sign']) {
            $json = $_POST['sign'];
            $nip_pgw = $this->input->post('nip_pgw');
            $absen_id = $this->input->post('absen_id',true);
            $form_honor = $this->input->post('form_honor',rue);
            $jenis_honor = $this->input->post('jenis_honor',true);
            $this->absen_model->insert_insert($json,$nip_pgw,$absen_id,$form_honor,$jenis_honor);
        }
    }
}   