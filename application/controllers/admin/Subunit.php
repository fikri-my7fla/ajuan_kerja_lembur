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
        }
        $Sub_model = $this->load->model('adminModel/Sub_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["jenis_pekerjaan"] = $this->Sub_model->getAll();
        $this->load->view("admin/sub_unit/index", $data);
    }

    public function add()
    {
        $jenis_pekerjaan = $this->Sub_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenis_pekerjaan->rules());

        if ($validation->run()) {
            $jenis_pekerjaan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect(site_url('admin/sub_unit'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/sub_unit');
        $jenis_pekerjaan = $this->Sub_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenis_pekerjaan->rules());

        if ($validation->run()) {
            $jenis_perkerjaan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jenis_pekerjaan"] = $jenis_pekerjaan->getById($id);
        if (!$data["jenis_pekerjaan"]) show_404();
        
        $this->load->view("admin/sub_unit/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Sub_model->delete($id)) {
            redirect(site_url('admin/sub_unit'));
        }
    }
}