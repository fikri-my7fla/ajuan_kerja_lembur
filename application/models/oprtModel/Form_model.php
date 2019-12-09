<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    //memanggil data ajuan
	function get_form_ajuan(){
        $this->db->select('
            form_ajuan_lembur.*,
            COUNT(nip_Pegawai) AS item_pegawai,
            jenis_pekerjaan.sub_unit,
        ');
		$this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
		$this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->join('data_pegawai', 'nip_pegawai=nip');
        $this->db->group_by('id_form_ajuan');
        $this->db->order_by('status');
		$query = $this->db->get();
		return $query;
    }
    // data detailnya
    function get_form_detail($id_form_ajuan){
        $this->db->select('
            form_ajuan_lembur.*,
            COUNT(nip_pegawai) AS item_pegawai,
            jenis_pekerjaan.sub_unit,
        ');
		$this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
		$this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->join('data_pegawai', 'nip_pegawai=nip');
        $this->db->where('id_form_ajuan',$id_form_ajuan);
		$query = $this->db->get();
		return $query;
    }
    // detail pegawainya
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
    // tanda tangan 1
    function show_signature($user_id){
        $this->db->select('
            signature.*,
            data_pegawai.nama_pegawai
        ');
		$this->db->from('signature');
        $this->db->join('data_pegawai','nip_pgw=nip');
        $this->db->join('users','user_id=id_user');
		$this->db->where('id_user',$user_id);
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
    // untk proses absen
    function get_ajuan_dtl($id_form_ajuan){
        $this->db->select('ajuan_lembur.*');
        $this->db->from('form_ajuan_lembur');
        $this->db->join('ajuan_lembur','form_id=id_form_ajuan');
        $this->db->where('id_form_ajuan',$id_form_ajuan);
        $query = $this->db->get();
        return $query;
    }
    function get_pegawai_user($user_id){
        $this->db->select('data_pegawai.nip');
        $this->db->from('users');
        $this->db->join('data_pegawai','id_user=user_id');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return $query;
    }
    function proses_absen($sign,$form,$id,$nip_pgwii){
        $this->db->trans_start();
            $datas = array(
                'sign_id'=>$sign,
                'form_id'=>$form
            );
            $this->db->insert('signature_ppk',$datas);
            //UpFrm
            $this->db->set('status','2');
            $this->db->set('description',null);
            $this->db->where('id_form_ajuan',$id);
            $this->db->update('form_ajuan_lembur');
            //absn
			$result = array();
				foreach($nip_pgwii AS $key => $val){
					$result[] = array(
                    'form_id' => $id,
					'nip_absen'  => $_POST['nip_pgwii'][$key],
					);
				}      
			//MULTIPLE INSERT TO ABSEN TABLE
            $this->db->insert_batch('absen_lembur', $result);
		$this->db->trans_complete();
    }
}