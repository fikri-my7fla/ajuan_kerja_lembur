<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Honor_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_honor()
    {
        $this->db->select('
            daftar_honor.*,
            data_pegawai.*,
            jenis_pekerjaan.*,tarif_honor.tarif_sebagai,tarif_honor.tarif_jumlah,
            signature.*,signature_honor.date_time as waktu_sign_honor
        ');
        $this->db->from('daftar_honor');
        $this->db->join('form_ajuan_lembur','id_form_ajuan=form_id_honor');
        $this->db->join('data_pegawai','nip_honor=nip');
        $this->db->join('jenis_pekerjaan','daftar_honor.jenis_id_honor=jenis_pekerjaan.id_jenis');
        $this->db->join('tarif_honor','tarif_id=id_tarif','left outer');
        $this->db->join('signature_honor','id_honor=honor_id','left outer');
        $this->db->join('signature','id_sign=sign_id','left outer');
        $query = $this->db->get();
        return $query;
    }
    function honor_tarif(){
        $this->db->select('
            daftar_honor.*,
            tarif_honor.*
        ');
        $this->db->from('daftar_honor');
        $this->db->join('tarif_honor','tarif_id=id_tarif');
        $query = $this->db->get();
        return $query;
    }
    function get_tarif(){
        $this->db->select('*');
        $this->db->from('tarif_honor');
        $query = $this->db->get();
        return $query;
    }

    function get_pegawai_user($id_user){
        $this->db->select('data_pegawai.nip,jenis_pekerjaan.id_jenis');
        $this->db->from('users');
        $this->db->join('data_pegawai','id_user=user_id');
        $this->db->join('jenis_pekerjaan','jenis_id=id_jenis');
        $this->db->where('user_id',$id_user);
        $query = $this->db->get();
        return $query;
    }

    Public function insert_insert($json,$nip_pgw,$honor_id){
        $this->db->trans_start();
        // simpan tanda tangan
            $data=array(
                'sign'=>$json,
                'nip_pgw'=>$nip_pgw
            );
            $this->db->insert('signature', $data);
        // tanda tangan untuk honor
            $id_sign = $this->db->insert_id();
            $datas=array(
                'sign_id'=>$id_sign,
                'honor_id'=>$honor_id
            );
            $this->db->insert('signature_honor',$datas);
        $this->db->trans_complete();
    }
}