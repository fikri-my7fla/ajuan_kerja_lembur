<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class absen_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAbsenLembur()
    {
        $this->db->select('ajuan_lembur.*, form_ajuan_lembur.*, absen_lembur.*, data_pegawai.*');
        $this->db->from('ajuan_lembur');
        $this->db->join('form_ajuan_lembur', 'ajuan_lembur.form_id=form_ajuan_lembur.id_form_ajuan');
        $this->db->join('absen_lembur', 'form_ajuan_lembur.id_form_ajuan=absen_lembur.form_id');
        $this->db->join('data_pegawai', 'absen_lembur.nip=data_pegawai.nip');
        $query = $this->db->get();
        return $query->result();
    }
}