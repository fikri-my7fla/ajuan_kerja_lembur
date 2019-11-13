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
    // data detailnya
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
    // detail pegawainya
    function get_pgw_detail($id_form_ajuan){
        $this->db->select('
            data_pegawai.nama_pegawai,
            jenis_pekerjaan.sub_unit
        ');
		$this->db->from('form_ajuan_lembur');
		$this->db->join('ajuan_lembur', 'form_ajuan_lembur.id_form_ajuan=ajuan_lembur.form_id');
		$this->db->join('data_pegawai','ajuan_lembur.pegawai_id=data_pegawai.id_data_pegawai');
        $this->db->join('jenis_pekerjaan', 'data_pegawai.jenis_id=jenis_pekerjaan.id_jenis');
		$this->db->where('id_form_ajuan', $id_form_ajuan);
		$query = $this->db->get();
		return $query;
    }
    // tanda tangan 1
    function show_sign1_data($id_form_ajuan){
        $this->db->select('signature.*');
        $this->db->from('signature');
        $this->db->join('form_ajuan_lembur','id_form_ajuan=form_id');
        $this->db->where('form_id',$id_form_ajuan);
        $this->db->where('append','sign1');
        $query = $this->db->get();
        return $query;
    }
    // tanda tangan 2
    function show_sign2_data($id_form_ajuan){
        $this->db->select('signature.*');
        $this->db->from('signature');
        $this->db->join('form_ajuan_lembur','id_form_ajuan=form_id');
        $this->db->where('form_id',$id_form_ajuan);
        $this->db->where('append','sign2');
        $query = $this->db->get();
        return $query;
    }
    // untk proses absen
    function get_ajuan_dtl($id_form_ajuan){
        $this->db->select('ajuan_lembur.id_ajuan_lembur,');
        $this->db->from('form_ajuan_lembur');
        $this->db->join('ajuan_lembur','form_id=id_form_ajuan');
        $this->db->where('id_form_ajuan',$id_form_ajuan);
        $query = $this->db->get();
        return $query;
    }
    function proses_absen($id_ajuan){
        $this->db->trans_start();
            //INSERT TO
            $id=$this->input->post('id_form_ajuan',true);
            $this->db->set('status','2',false);
            $this->db->where('id_form_ajuan',$id);
            $this->db->update('form_ajuan_lembur');
			//GET ID
			$result = array();
				foreach($id_ajuan AS $key => $val){
					$result[] = array(
					'ajuan_lembur_id'  => $_POST['ajuan_id'][$key],
					);
				}      
			//MULTIPLE INSERT TO AJUAN TABLE
			$this->db->insert_batch('absen_lembur', $result);
		$this->db->trans_complete();
    }

    // memasukkan data tanda tangan
    Public function insert_single_signature($image){
        $check=$this->get_single_signs();
        if($check==0) {
            $data=array(
                'signname'=>$_POST['signname'],
                'img'=>$image,
                'rowno'=>$_POST['rowno'],
                'form_id'=>$_POST['form_id'],
                'append'=>$_POST['append']
                );
            $this->db->insert('signature', $data);
        } else {
            $data=array(
                'signname'=>$_POST['signname'],
                'img'=>$image,		
                );

            $this->db
                ->where('rowno',$_POST['rowno'])
                ->where('append',$_POST['append'])
                ->update('signature', $data);
            }
        return ($this->db->affected_rows()!=1)?false:true;
    }
    
    // untuk mengecek data
    public function get_single_signs(){
        $datas=array(
                'rowno'=>$_POST['rowno'] 			
            );
        return $this->db->get_where('signature',$datas)->num_rows();
        
    }
}