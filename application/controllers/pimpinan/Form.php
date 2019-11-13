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
        $this->load->library('breadcrumbs');
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
        $this->breadcrumbs->push('Home', 'pimpinan/');
        $this->breadcrumbs->push('Ajuan Lembur', 'pimpinan/form/');
        $this->breadcrumbs->push('Detail','pimpinan/form/detail');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['test'] = $this->form_model->get_form_detail($id_form_ajuan);
        $data['apa_yah'] = $this->form_model->get_pgw_detail($id_form_ajuan);
        $data['ajuan'] = $this->form_model->get_ajuan_dtl($id_form_ajuan);
        $data['sign1'] = $this->form_model->show_sign1_data($id_form_ajuan);
        $data['sign2'] = $this->form_model->show_sign2_data($id_form_ajuan);
        $this->load->view('oprt/form/detail',$data);
    }
    // Proses terima
    function proses2(){
        $id_ajuan = $this->input->post('ajuan_id', TRUE);
        $this->form_model->proses_absen($id_ajuan);
        $this->session->set_flashdata('sukses',"");
        redirect('pimpinan/form');
    }
    // ctllr ditolak
    function proses3(){
        $id=$this->input->post('id_form_ajuan',true);
        $this->db->set('status','3',false);
        $this->db->where('id_form_ajuan',$id);
        $this->db->update('form_ajuan_lembur');
        $this->session->set_flashdata('sukses',"");
		redirect('pimpinan/form');
    }
    // cntlr direvisi
    function proses4(){
        $id=$this->input->post('id_form_ajuan',true);
        $this->db->set('status','4',false);
        $this->db->where('id_form_ajuan',$id);
        $this->db->update('form_ajuan_lembur');
        $this->session->set_flashdata('sukses',"");
		redirect('pimpinan/form');
    }
    
    // controller tanda tangan
    Public function insert_signature(){
        if(isset($_POST['image']) && $_POST['image']) {
            $img = $_POST['image'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $image=uniqid() . '.png';
            $file = './signature-image/' .$image;
            $success = file_put_contents($file, $data);
	        $image=str_replace('./','',$file);
            
	        $this->form_model->insert_single_signature($image);
        }
    }
}
