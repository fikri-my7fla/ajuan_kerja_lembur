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
    //ambil pegawai by form_id
	function get_pegawai_by_form($id_form_ajuan){
		$this->db->select('data_pegawai.nip');
		$this->db->from('data_pegawai');
		$this->db->join('ajuan_lembur', 'nip_pegawai=nip');
		$this->db->join('form_ajuan_lembur', 'id_form_ajuan=form_id');
		$this->db->where('id_form_ajuan',$id_form_ajuan);
		$query = $this->db->get();
		return $query;
	}
	function get_pegawai_user($user_id){
        $this->db->select('data_pegawai.nama_pegawai');
        $this->db->from('data_pegawai');
        $this->db->join('users','id_user=user_id');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return $query;
    }
    //READ
	function get_form_ajuan(){
        $this->db->select('
			form_ajuan_lembur.*,
            COUNT(nip) AS item_pegawai,
			jenis_pekerjaan.sub_unit,
        ');
		$this->db->from('form_ajuan_lembur');
		$this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
		$this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->join('data_pegawai', 'nip_pegawai=nip');
		$this->db->group_by('id_form_ajuan');
		$query = $this->db->get();
		return $query;
	}
	function get_form_detail($id_form_ajuan){
        $this->db->select('
			form_ajuan_lembur.*,
			COUNT(nip) AS item_pegawai,
			jenis_pekerjaan.sub_unit,
        ');
		$this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
		$this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
		$this->db->join('data_pegawai','nip_pegawai=nip');
		$this->db->where('id_form_ajuan', $id_form_ajuan);
		$query = $this->db->get();
		return $query;
	}
	function get_pgw_detail($id_form_ajuan){
        $this->db->select('
			data_pegawai.nama_pegawai,
			jenis_pekerjaan.sub_unit
        ');
		$this->db->from('form_ajuan_lembur');
		$this->db->join('ajuan_lembur', 'form_ajuan_lembur.id_form_ajuan=ajuan_lembur.form_id');
		$this->db->join('data_pegawai','ajuan_lembur.nip_pegawai=data_pegawai.nip');
        $this->db->join('jenis_pekerjaan', 'data_pegawai.jenis_id=jenis_pekerjaan.id_jenis');
		$this->db->where('id_form_ajuan', $id_form_ajuan);
		$query = $this->db->get();
		return $query;
	}
	function show_sign1_data($id_form_ajuan){
        $this->db->select('
            signature.*,
            data_pegawai.nama_pegawai
        ');
		$this->db->from('signature_ppk');
		$this->db->join('form_ajuan_lembur','id_form_ajuan=form_id');
		$this->db->join('signature','id_sign=sign_id');
		$this->db->join('data_pegawai','nip_pgw=nip');
		$this->db->where('id_form_ajuan',$id_form_ajuan);
        $query = $this->db->get();
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
	function update_form($id_form_ajuan,$tanggal,$unit_kerja,$jenis_id,$hasil,$alasan,$status,$pengusul,$pegawai){
		$this->db->trans_start();
			//UPDATE TO FORM
			$data  = array(
				'tanggal' => $tanggal,
                'unit_kerja' => $unit_kerja,
                'jenis_id' => $jenis_id,
                'hasil' => $hasil,
                'alasan' => $alasan,
				'status' => $status,
				'pengusul'=>$pengusul,
			);
			$this->db->where('id_form_ajuan',$id_form_ajuan);
			$this->db->update('form_ajuan_lembur', $data);
			
			//DELETE FORM ID
			$this->db->delete('ajuan_lembur', array('form_id' => $id_form_ajuan));

			$result = array();
				foreach($pegawai AS $key => $val){
					$result[] = array(
					'form_id'  => $id_form_ajuan,
					'nip_pegawai'  => $_POST['pegawai_edit'][$key]
					);
				}      
			//MULTIPLE INSERT TO AJUAN TABLE
			$this->db->insert_batch('ajuan_lembur', $result);
		$this->db->trans_complete();
	}
	function delete_form($id_form_ajuan){
		$this->db->trans_start();
			$this->db->delete('ajuan_lembur', array('form_id' => $id_form_ajuan));
			$this->db->delete('form_ajuan_lembur', array('id_form_ajuan' => $id_form_ajuan));
		$this->db->trans_complete();
	}
}