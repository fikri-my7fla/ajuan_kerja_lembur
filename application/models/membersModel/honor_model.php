<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class honor_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $this->db->select('ajuan_lembur.*, form_ajuan_lembur.*, daftar_honor.*, data_pegawai.*, jenis_pekerjaan.*, tarif_honor.*');
        $this->db->from('ajuan_lembur');
        $this->db->join('form_ajuan_lembur', 'ajuan_lembur.form_id=form_ajuan_lembur.id_form_ajuan');
        $this->db->join('daftar_honor', 'form_ajuan_lembur.id_form_ajuan=daftar_honor.form_id');
        $this->db->join('data_pegawai', 'daftar_honor.nip=data_pegawai.nip');
        $this->db->join('jenis_pekerjaan', 'data_pegawai.jenis_id=jenis_pekerjaan.id_jenis');
        $this->db->join('tarif_honor', 'daftar_honor.tarif_id=tarif_honor.id_tarif');
        $query = $this->db->get();
        return $query->result();
    }
}