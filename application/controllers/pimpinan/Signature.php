<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signature extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "admin") {
        redirect('admin/admin');
        }
        elseif ($this->session->userdata('type') == "member"){
            redirect('member/member');
        }
        $this->load->model('oprtModel/Signt_model','signt_model');
        $this->load->library('breadcrumbs');
    }
    function index(){
        $id_user = $this->session->userdata('id_user');
        $this->breadcrumbs->push('Home', 'pimpinan/');
        $this->breadcrumbs->push('Signature', 'pimpinan/signature');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['signature'] = $this->signt_model->get_signtr($id_user);
        $data['user'] = $this->signt_model->get_pegawai_user($id_user);
        $this->load->view('oprt/signature/index',$data);
    }
    Public function insert_signature(){
        if(isset($_POST['sign']) && $_POST['sign']) {
            $json = $_POST['sign'];
            $this->signt_model->insert_single_signature($json);
        }
    }
}