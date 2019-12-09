<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //AMBIL SEMUA DATA PEGAWAI
    public function getAll()
    {
        $this->db->select(`data_pegawai`.`nip`, `data_pegawai`.`nama_pegawai`, `jenis_pekerjaan`.`sub_unit`);
        $this->db->from('jenis_pekerjaan');
        $this->db->join('data_pegawai','jenis_pekerjaan.id_jenis=data_pegawai.jenis_id');
        $query = $this->db->get();
        return $query->result();
    }

}