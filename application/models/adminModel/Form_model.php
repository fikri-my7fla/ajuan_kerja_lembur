<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function data(){
        $this->db->select('
        form_ajuan_lembur.tanggal,
        form_ajuan_lembur.unit_kerja,
        form_ajuan_lembur.jenis_id,
        form_ajuan_lembur.hasil,
        form_ajuan_lembur.alasan,
        jenis_pekerjaan.id_jenis,
        jenis_pekerjaan.sub_unit
        ');
        $this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan','jenis_pekerjaan.id_jenis = form_ajuan_lembur.jenis_id');
        return $this->db->get();
    } 
    public function unit(){
        $this->db->select();
        $this->db->from('jenis_pekerjaan');
        $query = $this->db->get();
        return $query->result();
    }
    public function actionTambah(){
        $data = array(
            "tanggal"=>$_POST['tanggal'],
            "unit_kerja"=>$_POST['unit_kerja'],
            "jenis_id"=>$_POST['jenis_id'],
            "hasil"=>$_POST['hasil'],
            "alasan"=>$_POST['alasan'],
        );
        $this->db->insert('form_ajuan_lembur',$data);
    }
}