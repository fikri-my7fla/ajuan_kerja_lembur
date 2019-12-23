<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form extends MY_Controller
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
        $this->load->model('membersModel/form_model', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }
    //TAMPILAN DAFTAR AJUAN LEMBUR
    public function index()
    {
        $data['title']   = 'Ajuan Lembur';
        $data['page']    = 'ajuan_lembur';
        $data['ajuan']   = $this->form_model->getForm_ajuan();
        $data['pegawai'] = $this->form_model->getPegawai();
        
        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view('member/form/index', $data);
        $this->load->view('member/_partials/foot');
    }
    //TAMPILAN HALAMAN TAMBAH AJUAN LEMBUR
    public function tambah()
    {
        $data['ajuan']    = $this->form_model->getForm_ajuan();
        $data['pegawai']  = $this->form_model->getPegawai();
        $data['sub_unit'] = $this->form_model->getsub_unit();
        $data['pengusul'] = $this->form_model->getpengusul();
        $data['title']    = 'Tambah Ajuan Lembur';
        
        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view('member/form/tambah', $data);
        $this->load->view('member/_partials/foot');
    }
    //PROSES TAMBAH AJUAN LEMBUR
    public function create()
    {
        $tanggal    = $this->input->post('tanggal', TRUE);
        $unit_kerja = $this->input->post('unit_kerja', TRUE);
        $jenis_id   = $this->input->post('jenis_id', TRUE);
        $hasil      = $this->input->post('hasil', TRUE);
        $alasan     = $this->input->post('alasan', TRUE);
        $pegawai    = $this->input->post('pegawai', TRUE);
        $pengusul   = $this->input->post('pengusul', TRUE);
        $this->form_model->create_form($tanggal,$unit_kerja,$jenis_id,$hasil, $alasan, $pegawai, $pengusul);
        $this->session->set_flashdata('message', 'ditambahkan');
        redirect('member/form');
    }
    //AMBIL DATA PEGAWAI BY FORM
    public function getpegawai_by_form()
    {
        $id_form_ajuan = $this->input->post('id_form_ajuan');
        $data          = $this->form_model->getpegawai_by_form($id_form_ajuan)->result();
        foreach ($data as $result) {
            $value[] = (float) $result->id_data_pegawai;
        }
        echo json_encode($value);
    }
    //Ubah Data Di Rekapan Ajuan
    public function update()
    {
        $id      = $this->input->post('edit_id', TRUE);
        $pegawai = $this->input->post('pegawai_edit', TRUE);
        $this->form_model->update_form($id, $pegawai);
        $this->session->set_flashdata('message', 'diubah');
        redirect('member/form');
    }
    
    //TAMPIL DETAIL AJUAN LEMBUR
    public function detail($id_form_ajuan)
    {
        $data['title']             = 'Detail Ajuan';
        $data['form_ajuan_lembur'] = $this->form_model->getform_ajuan_by_id($id_form_ajuan);
        $data['pgw']               = $this->form_model->getdetail_pegawai($id_form_ajuan);
        $data['pegawai']           = $this->form_model->getPegawai();
        $data['dtl_pengusul']      = $this->form_model->getdetailPengusul();
        $data['sign1'] = $this->form_model->show_sign1_data($id_form_ajuan);
        $this->load->view('member/_partials/head', $data);
        $this->load->view('member/_partials/top', $data);
        $this->load->view('member/_partials/side', $data);
        $this->load->view('member/_partials/preloader', $data);
        $this->load->view('member/form/detail', $data);
        $this->load->view('member/_partials/foot');
    }
    //Ubah Data Di Detail Ajuan
    public function ubah()
    {
        $id      = $this->input->post('edit_id', TRUE);
        $pegawai = $this->input->post('pegawai_edit', TRUE);
        $this->form_model->update_form($id, $pegawai);
        // header('Location: detail/'.$id);
        $this->session->set_flashdata('message', 'diubah');
        redirect('member/form/detail/'.$id);
    }
    //Untuk Proses Tanda Tangan
    Public function insert_sig()
    {
        $id = $this->input->post('form_id', TRUE);
        if(isset($_POST['image']) && $_POST['image']) 
        {
            $nama    = $_POST['signname'];
            $img     = $_POST['image'];
            $img     = str_replace('data:image/png;base64,', '', $img);
            $img     = str_replace(' ', '+', $img);
            $data    = base64_decode($img);
            $image   = uniqid() . '.png';
            $file    = './assets/members/img/signature_image/'.$nama .$image;
            $success = file_put_contents($file, $data);
	        $image   = str_replace('./','',$file);
            
            $this->form_model->insert_signature($image);
            redirect('member/form/detail/'.$id);
        }
    }
}