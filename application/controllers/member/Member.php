<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "admin") {
        redirect('admin/admin');
        }
    }
    
    public function index(){
        $this->load->view('member/dashboard');
    }
}