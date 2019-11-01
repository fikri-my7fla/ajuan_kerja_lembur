<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function absen(){
        $this->db->select(
            'absen_lembur.*,
            ajuan_lembur.*,
            data_pegawai.*'
        );
        $this->db->from('absen_lembur');
        $this->db->join('ajuan_lembur', 'id_ajuan_lembur=ajuan_lembur_id');
        $this->db->join('data_pegawai', 'pegawai_id=id_data_pegawai');
        $query = $this->db->get();
        return $query;
    }
}