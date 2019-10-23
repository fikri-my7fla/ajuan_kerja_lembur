<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // ambil data sub unit
    function get_sub(){
		$query = $this->db->get('jenis_pekejaan');
		return $query;
	}
    // ambil semua data pegawai
    function get_pegawai(){
		$query = $this->db->get('data_pegawai');
		return $query;
    }
    //ambil pegawai by form_id
	function get_pegawai_by_form($id_form_ajuan){
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->join('ajuan_pegawai', 'pegawai_id=id_data_pegawai');
		$this->db->join('form_ajuan_lembur', 'id_form_ajuan=form_id');
		$this->db->where('id_form_ajuan',$id_form_ajuan);
		$query = $this->db->get();
		return $query;
    }
    //READ
	function get_form_ajuan(){
        $this->db->select('
            form_ajuan_lembur.*,
            COUNT(pegawai_id) AS item_pegawai,
            jenis_pekerjaan.sub_unit
        ');
		$this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
		$this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->join('data_pegawai', 'pegawai_id=id_data_pegawai');
		$this->db->group_by('id_form_ajuan');
		$query = $this->db->get();
		return $query;
	}
}