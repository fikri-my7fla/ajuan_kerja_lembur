<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sub_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //MENGAMBIL SEMUA DATA SUB UNIT
    public function getAll()
    {
        $this->db->select('jenis_pekerjaan.*, count(jenis_id) as jenis');
        $this->db->from('jenis_pekerjaan');
        $this->db->join('data_pegawai', 'id_jenis=jenis_id');
        $this->db->group_by('id_jenis');
        $query = $this->db->get();
		return $query->result();
    }

    //AMBIL DATA SUB UNIT BY ID JENIS
    public function getsub_unit_by_id($id_jenis)
    {
        $this->db->select('*');
        $this->db->from('jenis_pekerjaan');
        $this->db->where('id_jenis', $id_jenis);
        $query = $this->db->get();
        return $query->result();
    }

    //AMBIL DATA PEGAWAI BY ID JENIS
    public function getdetail_pegawai($id_jenis)
    {
        $this->db->select('*');
        $this->db->from('data_pegawai');
        $this->db->join('jenis_pekerjaan', 'jenis_id='.$id_jenis);
        $this->db->where('id_jenis', $id_jenis);
        $this->db->order_by('nama_pegawai');
        $query = $this->db->get();
        return $query->result();
    }
}