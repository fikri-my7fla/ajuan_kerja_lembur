<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller{

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
        $this->load->library('breadcrumbs');
    }
    public function index(){
        $this->breadcrumbs->push('Home','/');
        $data['brcm'] = $this->breadcrumbs->show();
        $this->load->view('oprt/index',$data);
    }
}