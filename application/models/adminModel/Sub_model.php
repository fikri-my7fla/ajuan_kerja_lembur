<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function all()
    {
        $this->db->select('*');
        $this->db->from('jenis_pekerjaan');
        $this->db->order_by('sub_unit', 'ASC');

        return $this->db->get();
    }
    public function insertData(){
        $this->db->insert('jenis_pekerjaan', $data);
    }
}