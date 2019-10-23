<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Op extends MY_Controller{

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
    }
    public function index(){
        $this->load->view('oprt/form/index');
    }
}