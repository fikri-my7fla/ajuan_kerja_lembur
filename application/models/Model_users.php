<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_users extends CI_Model {

    public $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    public function cekAkun($username, $password){
        //cari username lalu lakukan validasi
        $this->db->where('username', $username);
        $query = $this->db->get($this->table)->row();
        $hash = $query->password;
        if (md5($password) != $hash) return 2;
        return $query;
    }
}