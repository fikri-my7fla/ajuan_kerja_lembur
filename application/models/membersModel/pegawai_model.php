<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai_model extends CI_Model
{
    public $_table = "data_pegawai";

    public function getAll()
    {
        // $query = "SELECT data_pegawai.nip, data_pegawai.nama_pegawai, jenis_pekerjaan.sub_unit
        //           FROM jenis_pekerjaan INNER JOIN data_pegawai ON jenis_pekerjaan.id_jenis = 
        //           data_pegawai.jenis_id";
        // return $this->db->get($this->_table)->result();
        $this->db->select(`data_pegawai`.`nip`, `data_pegawai`.`nama_pegawai`, `jenis_pekerjaan`.`sub_unit`);
        $this->db->from('jenis_pekerjaan');
        $this->db->join('data_pegawai','jenis_pekerjaan.id_jenis=data_pegawai.jenis_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_data_pegawai => $id"])->row();
    }

}