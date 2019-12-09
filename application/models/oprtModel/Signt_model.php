<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signt_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function get_signtr($id_user){
        $this->db->select('signature.*,data_pegawai.nama_pegawai');
        $this->db->from('signature');
        $this->db->join('data_pegawai','nip=nip_pgw');
        $this->db->join('users','id_user=user_id');
        $this->db->where('user_id',$id_user);
        $query = $this->db->get();
        return $query;
    }
    function get_pegawai_user($id_user){
        $this->db->select('data_pegawai.nip');
        $this->db->from('users');
        $this->db->join('data_pegawai','id_user=user_id');
        $this->db->where('user_id',$id_user);
        $query = $this->db->get();
        return $query;
    }
    // tanda tangan
    Public function insert_single_signature($json){
        $check=$this->get_single_signs();
        if($check==0) {
            $data=array(
                'sign'=>$json,
                'nip_pgw'=>$_POST['nip_pgw']
            );
            $this->db->insert('signature', $data);

        } else {
            $data=array(
                'sign'=>$json,
            );
            
            $this->db
            ->where('nip_pgw',$_POST['nip_pgw'])
            ->update('signature', $data);
        }
        return ($this->db->affected_rows()!=1)?false:true;
    }
    // untuk mengecek data
    public function get_single_signs(){
        $datas=array(
                'nip_pgw'=>$_POST['nip_pgw'] 			
            );
        return $this->db->get_where('signature',$datas)->num_rows();
    }

}