<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Direct_model extends CI_Model {
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
        $this->db->select('data_pegawai.*,jenis_pekerjaan.sub_unit');
        $this->db->from('data_pegawai');
        $this->db->join('jenis_pekerjaan','id_jenis=jenis_id');
        $this->db->order_by('jenis_pekerjaan.sub_unit','asc');
		$query = $this->db->get();
		return $query;
    }
    // select data jenis
    function get_data_sub(){
        $query = $this->db->query('SELECT * From jenis_pekerjaan');
        return $query;
    }
    function create_form($tanggal,$unit_kerja,$jenis_id,$hasil,$alasan,$pengusul,$pegawai){
		$this->db->trans_start();
			//INSERT TO
			$data  = array(
				'tanggal' => $tanggal,
                'unit_kerja' => $unit_kerja,
                'jenis_id' => $jenis_id,
                'hasil' => $hasil,
                'alasan' => $alasan,
				'pengusul' => $pengusul,
				'status' => '1',
			);
			$this->db->insert('form_ajuan_lembur', $data);
			//GET ID
			$id_form_ajuan = $this->db->insert_id();
			$result = array();
				foreach($pegawai AS $key => $val){
					$result[] = array(
					'form_id'  => $id_form_ajuan,
					'nip_pegawai'  => $_POST['pegawai'][$key]
					);
				}      
			//MULTIPLE INSERT TO AJUAN TABLE
			$this->db->insert_batch('ajuan_lembur', $result);
		$this->db->trans_complete();
	}
}