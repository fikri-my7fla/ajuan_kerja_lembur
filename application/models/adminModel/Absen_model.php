<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_absen(){
        $this->db->select('absen_lembur.*','ajuan_lembur.*','data_pegawai.nama_pegawai');
        $this->db->from('absen_lembur');
        $this->db->join('data_pegawai','pegawai_id=id_data_pegawai');
        $this->db->join('ajuan_lembur','ajuan_id=id_ajuan_lembur');
        $this->db->order_by('absen_lembur.id_absen','ASC');
        return $this->db->get();
    }
}