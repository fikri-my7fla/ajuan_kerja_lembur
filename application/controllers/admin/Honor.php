<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Honor extends MY_Controller {
    public $db;
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        if ($this->session->userdata('type') == "member") {
        redirect('member/member');
        }elseif ($this->session->userdata('type') == "operator"){
            redirect('pimpinan/dashboard');
        }
        $this->load->library('breadcrumbs');
        $this->load->model('adminModel/Honor_model','honor_model');
        $this->load->helper('short_number');
    }
    //
    public function index(){
        $id_user = $this->session->userdata('id_user');
        $id_honor = $this->input->post('id_honor',true);
        $this->breadcrumbs->push('Home','admin/admin');
        $this->breadcrumbs->push('Daftar Honor','admin/honor');
        $data['brcm'] = $this->breadcrumbs->show();
        $data['honor'] = $this->honor_model->get_honor();
        $data['tarif'] = $this->honor_model->get_tarif();
        $data['tarif_hnr'] = $this->honor_model->honor_tarif();
        $data['user'] = $this->honor_model->get_pegawai_user($id_user);
        $this->load->view('admin/honor/index',$data);
    }
    public function tarif_pertama(){
        $tarif_id = $this->input->post('tarif_id',true);
        $id_honor = $this->input->post('id_honor',true);
        $this->db->set('tarif_id',$tarif_id);
        $this->db->where('id_honor',$id_honor);
        $this->db->update('daftar_honor');
        $this->session->set_flashdata('sukses',"Penetapan Jumlah Honor");
        redirect('admin/honor/index');
    }
    public function sebagai_edit(){
        $tarif_id = $this->input->post('tarif_edit',true);
        $id_honor = $this->input->post('edit_honor',true);
        $this->db->set('tarif_id',$tarif_id);
        $this->db->where('id_honor',$id_honor);
        $this->db->update('daftar_honor');
        $this->session->set_flashdata('sukses',"Penetapan Jumlah Honor");
        redirect('admin/honor/index');
    }
    public function tambah(){
        if(isset($_POST['sign']) && $_POST['sign']) {
            $json = $_POST['sign'];
            $nip_pgw = $this->input->post('nip_pgw');
            $honor_id = $this->input->post('honor_id',true);
            $this->honor_model->insert_insert($json,$nip_pgw,$honor_id);
        }
    }
}