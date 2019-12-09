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
            jenis_pekerjaan.*,
        ');
        $this->db->from('daftar_honor');
        $this->db->join('form_ajuan_lembur','id_form_ajuan=form_id_honor');
        $this->db->join('data_pegawai','nip_honor=nip');
        $this->db->join('jenis_pekerjaan','daftar_honor.jenis_id_honor=jenis_pekerjaan.id_jenis');
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
}