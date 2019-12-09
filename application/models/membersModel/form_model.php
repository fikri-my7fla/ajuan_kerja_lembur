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
        $this->db->select('data_pegawai.*, jenis_pekerjaan.sub_unit');
        $this->db->from('data_pegawai');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
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

    //MENAMPILKAN DAFTAR AJUAN LEMBUR
    public function getForm_ajuan()
    {
        $this->db->select('form_ajuan_lembur.*, count(ajuan_lembur.nip) as pgw, 
                           data_pegawai.nama_pegawai, jenis_pekerjaan.sub_unit');
		$this->db->from('form_ajuan_lembur');
        $this->db->join('jenis_pekerjaan', 'jenis_id=id_jenis');
        $this->db->join('ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->join('data_pegawai', 'data_pegawai.nip=ajuan_lembur.nip');
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

    public function getPengusul()
    {
        $this->db->select('users.*, data_pegawai.nama_pegawai');
        $this->db->from('users');
        $this->db->join('data_pegawai', 'id_user=user_id');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $query = $this->db->get();
        return $query->result();
    }

    public function getdetailPengusul()
    {
        $this->db->select('form_ajuan_lembur.pengusul, users.id_user, data_pegawai.nama_pegawai');
        $this->db->from('form_ajuan_lembur');
        $this->db->join('users', 'pengusul=id_user');
        $this->db->join('data_pegawai', 'id_user=user_id');
        $query = $this->db->get();
        return $query->result();
    }

    //PROSES TAMBAH AJUAN LEMBUR
    public function create_form($tanggal,$unit_kerja,$jenis_id,$hasil, $alasan, $pegawai, $pengusul)
    {
        //INSERT FORM AJUAN
        $this->db->trans_start();
            $data = array(
                'tanggal'    => $tanggal,
                'unit_kerja' => $unit_kerja,
                'jenis_id'   => $jenis_id,
                'hasil'      => $hasil,
                'alasan'     => $alasan,
                'status'     => '1',
                'pengusul'   => $pengusul
                
            );
            $this->db->insert('form_ajuan_lembur', $data);

            //GET ID PEGAWAI
            $id_form_ajuan = $this->db->insert_id();
            $result = array();
                foreach($pegawai AS $key => $val)
                {
                    $result[] = array(
                        'form_id'    => $id_form_ajuan,
                        'nip' => $_POST['pegawai'][$key]
                    );
                }

            //MULTIPLE INSERT TO AJUAN_LEMBUR
            $this->db->insert_batch('ajuan_lembur', $result);
        $this->db->trans_complete();
    }

    //PROSES UBAH AJUAN LEMBUR
    public function update_form($id, $pegawai)
    {
        $this->db->trans_start();

            $data = array(
                'status' => '1'
            );
            $this->db->where('id_form_ajuan',$id);
			$this->db->update('form_ajuan_lembur', $data);

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
        $this->db->select('data_pegawai.*, jenis_pekerjaan.sub_unit');
        $this->db->from('data_pegawai');
        $this->db->join('ajuan_lembur', 'ajuan_lembur.nip=data_pegawai.nip');
        $this->db->join('form_ajuan_lembur', 'id_form_ajuan=form_id');
        $this->db->join('jenis_pekerjaan', 'data_pegawai.jenis_id=jenis_pekerjaan.id_jenis');
        $this->db->where('id_form_ajuan', $id_form_ajuan);
        $this->db->order_by('nama_pegawai');
        $query = $this->db->get();
        return $query->result();
    }

    //Proses Insert Signature (Tanda Tangan)
    Public function insert_signature($image)
    {
        $check=$this->get_sign();
        if($check==0) {
            $data=array(
                'signname'=> $_POST['signname'],
                'img'     => $image,
                'rowno'   => $_POST['rowno'],
                'form_id' => $_POST['form_id'],
                'append'  => $_POST['append']
                );
            $this->db->insert('signature', $data);
        } else {
            $data=array(
                'signname'=> $_POST['signname'],
                'img'     => $image,		
                );
            $this->db
                ->where('rowno',$_POST['rowno'])
                ->where('append',$_POST['append'])
                ->update('signature', $data);
            }
        return ($this->db->affected_rows()!=1)?false:true;
    }

    //Ambil Tanda Tangan
    public function get_sign()
    {
        $data=array(
                'rowno'=>$_POST['rowno'] 			
            );
        return $this->db->get_where('signature',$data)->num_rows();
    }

    //Untuk Menampilkan tanda tangan 1
    public function preview_signature1($id_form_ajuan)
    {
        $this->db->select('signature.*');
        $this->db->from('signature');
        $this->db->join('form_ajuan_lembur','id_form_ajuan=form_id');
        $this->db->where('form_id',$id_form_ajuan);
        $this->db->where('append','sign1');
        $query = $this->db->get();
        return $query;
    }

    //Untuk menampilkan tanda tangan 2
    public function preview_signature2($id_form_ajuan)
    {
        $this->db->select('signature.*');
        $this->db->from('signature');
        $this->db->join('form_ajuan_lembur','id_form_ajuan=form_id');
        $this->db->where('form_id',$id_form_ajuan);
        $this->db->where('append','sign2');
        $query = $this->db->get();
        return $query;
    }

}