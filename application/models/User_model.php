<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'tb_user';

    public function cekAkun($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->table)->row();

        if (!$query) return false;

        $hash = $query->password;

        if (!password_verify($password, $hash)) return false;
        return $query;
    }
}