<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getData(){
        $this->db->select('
            data_pegawai.id_data_pegawai,
            data_pegawai.nip,
            data_pegawai.nama_pegawai,
            data_pegawai.jenis_id,
            jenis_pekerjaan.sub_unit
        ');
        $this->db->from('data_pegawai');
        $this->db->join('jenis_pekerjaan', 'jenis_pekerjaan.id_jenis = data_pegawai.jenis_id');
        $this->db->order_by('data_pegawai.id_data_pegawai', 'desc');

        return $this->db->get();
    }
    public function getSub(){
        $this->db->select('*');
        $this->db->from('jenis_pekerjaan');
        $query = $this->db->get();
        return $query->result();
    }
    public function actionTambah(){
        $data = array(
            "nip"=>$_POST['nip'],
            "nama_pegawai"=>$_POST['nama_pegawai'],
            "jenis_id"=>$_POST['jenis_id']
        );
        $this->db->insert('data_pegawai',$data);
    }
    public function actionEdit(){
        $data = array(
            "nip"=>$_POST['nip'],
            "nama_pegawai"=>$_POST['nama_pegawai'],
            "jenis_id"=>$_POST['jenis_id']
        );
        $this->db->where('id_data_pegawai',$_POST['id_data_pegawai']);
        $this->db->update('data_pegawai',$data);
    }
}