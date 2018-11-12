<?php
class M_kategori extends CI_Model{
 
    function get_kategori() {

        $query = $this->db->query('SELECT * FROM kategori_menu');
        return $query->result();
    }

    function insert($nama_kategori) {
        $data = array(
                'nama_kategori' => $nama_kategori
            );
        $result= $this->db->insert('kategori_menu',$data);
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