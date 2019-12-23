<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getData(){
        $this->db->select('
            data_pegawai.nip,
            data_pegawai.nama_pegawai,
            data_pegawai.jenis_id,
            jenis_pekerjaan.sub_unit
        ');
        $this->db->from('data_pegawai');
        $this->db->join('jenis_pekerjaan', 'jenis_pekerjaan.id_jenis = data_pegawai.jenis_id');
        $this->db->order_by('data_pegawai.nip', 'asc');

        return $this->db->get();
    }
    public function getSub(){
        $this->db->select('*');
        $this->db->from('jenis_pekerjaan');
        $query = $this->db->get();
        return $query->result();
    }
    public function actionTambah($username,$password,$type,$nip,$nama_pegawai,$jenis_id){
        $this->db->trans_start();
            $vals = array(
                "username"=>$username,
                "password"=>md5($password),
                "type"=>$type,
                "nickname"=>$nama_pegawai
            );
            $this->db->insert('users',$vals);
            $id_user = $this->db->insert_id();
            $data = array(
                "nip"=>$nip,
                "nama_pegawai"=>$nama_pegawai,
                "jenis_id"=>$jenis_id,
                "user_id"=>$id_user
            );
            $this->db->insert('data_pegawai',$data);
        $this->db->trans_complete();
    }
    public function actionEdit($nip,$nama_pegawai,$jenis_id,$edit){
        $data = array(
            "nip"=>$nip,
            "nama_pegawai"=>$nama_pegawai,
            "jenis_id"=>$jenis_id
        );
        $this->db->where('nip',$edit);
        $this->db->update('data_pegawai',$data);
    }
    public function actionDelete($nip){
        $this->db->delete('data_pegawai', array('nip' => $nip));
    }
}