<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_model extends CI_Model
{
    private $_table = "jenis_pekerjaan";

    public $id_jenis;
    public $sub_unit;

    public function rules()
    {
        return [
            ['field' => 'sub_unit',
            'label' => 'Sub_unit',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jenis" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_jenis = uniqid();
        $this->sub_unit = $post["sub_unit"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jenis = $post["id_jenis"];
        $this->sub_unit = $post["sub_unit"];
        $this->db->update($this->_table, $this, array('id_jenis' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jenis" => $id));
    }
}