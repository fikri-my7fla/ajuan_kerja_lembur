<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    //AMBIL DATA PEGAWAI
    public function getPegawai()
    {
        $this->db->select('data_pegawai.*');
        $this->db->from('data_pegawai');
        $this->db->order_by('nama_pegawai');
        $query = $this->db->get();
        return $query->result();
    }

    //AMBIL DATA PEGAWAI BY FORM
    public function getpegawai_by_form($id_form_ajuan)
    {
        $this->db->select('*');
        $this->db->from('data_pegawai');
        $this->db->join('ajuan_lembur', 'pegawai_id=id_data_pegawai');
        $this->db->join('form_ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->where('id_form_ajuan',$id_form_ajuan);
        $query = $this->db->get();
        return $query;
    }

    //MENAMPILKAN DAFTAR AJUAN
    public function getForm_ajuan()
    {
        $this->db->select('form_ajuan_lembur.*, count(pegawai_id) as pgw, 
                           data_pegawai.nama_pegawai, jenis_pekerjaan.sub_unit');
		$this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
        $this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->join('data_pegawai', 'id_data_pegawai=pegawai_id');
		$this->db->group_by('id_form_ajuan');
		$query = $this->db->get();
		return $query;
    }

    //AMBIL DATA SUB UNIT
    public function getsub_unit()
    {
        $this->db->select('jenis_pekerjaan.*');
        $this->db->from('jenis_pekerjaan');
        $query = $this->db->get();
        return $query->result();
    }

    //PROSES TAMBAH AJUAN LEMBUR
    public function create_form($tanggal,$unit_kerja,$jenis_id,$hasil, $alasan, $pegawai)
    {
        //INSERT FORM AJUAN
        $this->db->trans_start();
            $data = array(
                'tanggal'    => $tanggal,
                'unit_kerja' => $unit_kerja,
                'jenis_id'   => $jenis_id,
                'hasil'      => $hasil,
                'alasan'     => $alasan,
                'status'     => '0',
            );
            $this->db->insert('form_ajuan_lembur', $data);

            //GET ID PEGAWAI
            $id_form_ajuan = $this->db->insert_id();
            $result = array();
                foreach($pegawai AS $key => $val)
                {
                    $result[] = array(
                        'form_id'    => $id_form_ajuan,
                        'pegawai_id' => $_POST['pegawai'][$key]
                    );
                }

            //MULTIPLE INSERT TO AJUAN_LEMBUR
            $this->db->insert_batch('ajuan_lembur', $result);
        $this->db->trans_complete();
    }

    //PROSES UBAH FORM
    public function update_form($id, $pegawai)
    {
        $this->db->trans_start();

            $this->db->delete('ajuan_lembur', array('form_id' => $id));

            $result = array();
                foreach($pegawai as $key => $val)
                {
                    $result[] = array(
                        'form_id'    => $id,
                        'pegawai_id' => $_POST['pegawai_edit'][$key]
                    );
                }
            
            $this->db->insert_batch('ajuan_lembur', $result);
        $this->db->trans_complete();
    }

    //AMBIL DATA AJUAN BY ID FORM AJUAN
    public function getform_ajuan_by_id($id_form_ajuan)
    {
        $this->db->select('form_ajuan_lembur.*, jenis_pekerjaan.sub_unit');
        $this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
        $this->db->where('id_form_ajuan', $id_form_ajuan);
        $query = $this->db->get();
        return $query->result();
    }

    //AMBIL DATA PEGAWAI DI HALAMAN DETAIL
    public function getdetail_pegawai($id_form_ajuan)
    {
        $this->db->select('*');
        $this->db->from('data_pegawai');
        $this->db->join('ajuan_lembur', 'id_data_pegawai=pegawai_id');
        $this->db->join('form_ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->where('id_form_ajuan', $id_form_ajuan);
        $this->db->order_by('nama_pegawai');
        $query = $this->db->get();
        return $query->result();
    }
    
}