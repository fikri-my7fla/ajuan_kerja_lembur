<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends MY_Controller{

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
        $this->load->model('oprtModel/Form_model','form_model');
        $this->load->library('Breadcrumbs','breadcrumbs');
        $this->load->library(array('form_validation', 'Recaptcha'));
    }
    // tampilan menu ajuan
    function index(){
        $this->breadcrumbs->push('Home', 'pimpinan/');
        $this->breadcrumbs->push('Ajuan Lembur', 'pimpinan/form');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['form_ajuan'] = $this->form_model->get_form_ajuan();
        $this->load->view('oprt/form/index',$data);
    }
    // detail ajuan
    function detail($id_form_ajuan){
        $user_id = $this->session->userData('id_user');
        $this->breadcrumbs->push('Home', 'pimpinan/');
        $this->breadcrumbs->push('Ajuan Lembur', 'pimpinan/form/');
        $this->breadcrumbs->push('Detail','pimpinan/form/detail');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['test'] = $this->form_model->get_form_detail($id_form_ajuan);
        $data['apa_yah'] = $this->form_model->get_pgw_detail($id_form_ajuan);
        $data['ajuan'] = $this->form_model->get_ajuan_dtl($id_form_ajuan);
        $data['signature'] = $this->form_model->show_signature($user_id);
        $data['sign1'] = $this->form_model->show_sign1_data($id_form_ajuan);
        $data['cape'] = $this->form_model->get_pegawai_user($user_id);
        $this->load->view('oprt/form/detail',$data);
    }
    function sign_proses($id_form_ajuan){
        $user_id = $this->session->userData('id_user');
        $this->breadcrumbs->push('Home', 'pimpinan/index');
        $this->breadcrumbs->push('Ajuan', 'pimpinan/form/index');
        $this->breadcrumbs->push('proses','pimpinan/form/sign_proses');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['cape'] = $this->form_model->get_pegawai_user($user_id);
        $this->load->view('oprt/form/proses_signature',$data);
    }
    // Proses terima
    function proses2(){
        $sign = $this->input->post('sign_id',TRUE);
        $form = $this->input->post('form_id',TRUE);
        $id = $this->input->post('stts_id',TRUE);
        $nip_pgwii = $this->input->post('nip_pgwii',TRUE);
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if (isset($response['success']) and $response['success'] === true) {
            $this->form_model->proses_absen($sign,$form,$id,$nip_pgwii);
            $this->session->set_flashdata('success',"Complete Acc Form Ajuan");
            redirect('pimpinan/form/index');
        } else {
            $this->session->set_flashdata('error',"Captcha Error");
            redirect('pimpinan/form/index');

        }
    }
    // ctllr ditolak
    function proses3(){
        $id=$this->input->post('stts_tlk',true);
        $descr=$this->input->post('descr_tlk',TRUE);
        $this->db->set('status','3');
        $this->db->set('description',$descr);
        $this->db->where('id_form_ajuan',$id);
        $this->db->update('form_ajuan_lembur');
        $this->session->set_flashdata('error',"Data Ajuan Lembur Ini Ditolak");
		redirect('pimpinan/form/index');
    }
    // cntlr direvisi
    function proses4(){
        $id=$this->input->post('stts_rev',true);
        $descr=$this->input->post('descr_rev',TRUE);
        $this->db->set('status','4');
        $this->db->set('description',$descr);
        $this->db->where('id_form_ajuan',$id);
        $this->db->update('form_ajuan_lembur');
        $this->session->set_flashdata('revs',"Data Ajuan Lembur Ini Direvisi");
		redirect('pimpinan/form/index');
    }
}
