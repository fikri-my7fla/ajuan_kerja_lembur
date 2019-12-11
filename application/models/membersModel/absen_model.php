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
        $this->db->select(
            'absen_lembur.*,
            data_pegawai.*,
            jenis_pekerjaan.*,
            signature.*,
            signature_absen.date_time as waktu_sign_absen
            '
        );
        $this->db->from('absen_lembur');
        $this->db->join('data_pegawai', 'nip_absen=nip');
        $this->db->join('jenis_pekerjaan','id_jenis=jenis_id');
        $this->db->join('signature_absen','absen_id=id_absen','left outer');
        $this->db->join('signature','id_sign=sign_id','left outer');
        $query = $this->db->get();
        return $query;
    }
    function get_pegawai_user($id_user){
        $this->db->select('data_pegawai.nip,jenis_pekerjaan.id_jenis');
        $this->db->from('users');
        $this->db->join('data_pegawai','id_user=user_id');
        $this->db->join('jenis_pekerjaan','jenis_id=id_jenis');
        $this->db->where('user_id',$id_user);
        $query = $this->db->get();
        return $query;
    }
    Public function insert_insert($json,$nip_pgw,$absen_id,$form_honor,$jenis_honor){
        $this->db->trans_start();
        // simpan tanda tangan
            $data=array(
                'sign'=>$json,
                'nip_pgw'=>$nip_pgw
            );
            $this->db->insert('signature', $data);
        // tanda tangan untuk absen
            $id_sign = $this->db->insert_id();
            $datas=array(
                'sign_id'=>$id_sign,
                'absen_id'=>$absen_id
            );
            $this->db->insert('signature_absen',$datas);
        // proses honor lembur
            $dats=array(
                'form_id_honor'=>$form_honor,
                'nip_honor'=>$nip_pgw,
                'jenis_id_honor'=>$jenis_honor
            );
            $this->db->insert('daftar_honor',$dats);

        $this->db->trans_complete();
    }
}