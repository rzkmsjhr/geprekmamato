<?php

class M_login extends CI_Model{
    function auth_user($username) {
        $query=$this->db->query("SELECT * FROM user WHERE username='$username' LIMIT 1");
        return $query->row_array();
    }
}