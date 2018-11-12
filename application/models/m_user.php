<?php
class M_user extends CI_Model{
 
    function get_admin() {

        $query = $this->db->query('SELECT * FROM user WHERE level = 1');
        return $query->result();
    }

    function get_kasir() {

        $query = $this->db->query('SELECT * FROM user WHERE level = 2');
        return $query->result();
    }

    function get_gudang() {

        $query = $this->db->query('SELECT * FROM user WHERE level = 3');
        return $query->result();
    }

    function insert($level,$username,$password) {
        $data = array(
                'level' => $level,
                'username' => $username,
                'password' => $password
            );
        $result= $this->db->insert('user',$data);
        return $result;
    }

    function edit_data($where,$table) {
        return $this->db->get_where($table,$where);
    }

    function update($where,$data,$table) {
        $this->db->where($where);
        $result= $this->db->update($table,$data);
        return $result;
    }

    function delete($where,$table) {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
?>