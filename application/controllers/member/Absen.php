<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "admin") {
        redirect('admin/admin');
        }
        elseif ($this->session->userdata('type') == "operator"){
            redirect('pimpinan/dashboard');
        }
        $this->load->model('membersModel/absen_model', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    // Untuk Menampilkan Daftar Absen Lembur
    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title']          = 'Absen Lembur';
        $data['absen_lembur']   = $this->absen_model->getAbsenLembur();
        $data['user'] = $this->absen_model->get_pegawai_user($id_user);

        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view('member/absen/index', $data);
        $this->load->view('member/_partials/foot');
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