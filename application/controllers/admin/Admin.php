<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "member") {
        redirect('member/member');
        } elseif ($this->session->userdata('type') == "operator"){
            redirect('pimpinan/op');
        }
    }
    
    public function index(){
        $this->load->view('admin/dashboard');
    }
}