<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    //READ
	function get_form_ajuan(){
        $this->db->select('
            form_ajuan_lembur.*,
            COUNT(pegawai_id) AS item_pegawai,
            jenis_pekerjaan.sub_unit,
        ');
		$this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
		$this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->join('data_pegawai', 'pegawai_id=id_data_pegawai');
        $this->db->group_by('id_form_ajuan');
		$query = $this->db->get();
		return $query;
    }
    function get_form_detail($id_form_ajuan){
        $this->db->select('
            form_ajuan_lembur.*,
            COUNT(pegawai_id) AS item_pegawai,
            jenis_pekerjaan.sub_unit,
        ');
		$this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
		$this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->join('data_pegawai', 'pegawai_id=id_data_pegawai');
        $this->db->where('id_form_ajuan',$id_form_ajuan);
		$query = $this->db->get();
		return $query;
    }
    function get_pgw_detail($id_form_ajuan){
        $this->db->select('
			data_pegawai.nama_pegawai
        ');
		$this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
		$this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
		$this->db->join('data_pegawai','pegawai_id=id_data_pegawai');
		$this->db->where('id_form_ajuan', $id_form_ajuan);
		$query = $this->db->get();
		return $query;
    }
    function get_ajuan($id_ajuan){
        $this->db->select('*');
        $this->db->from('ajuan_lembur');
        $this->db->where('id_ajuan');
        $query = $this->db->get();
        return $query;
    }
    function proses_absen($ajuan){
        $data= array(
            'ajuan_id' => $ajaun,
        );
        $this->db->insert('absen_lembur',$data);
    }
}