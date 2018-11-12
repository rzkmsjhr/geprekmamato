<?php
class M_menu extends CI_Model{
 
    function get_menu() {

        $query = $this->db->query('SELECT m.id_menu, nama_menu, harga_menu, nama_kategori FROM menu m JOIN kategori_menu k ON m.id_kategori_menu = k.id_kategori ORDER BY id_kategori_menu ASC');
        return $query->result();
    }

    function insert($nama_menu,$harga_menu,$id_kategori_menu) {
        $data = array(
                'nama_menu' => $nama_menu,
                'harga_menu' => $harga_menu,
                'id_kategori_menu' => $id_kategori_menu
            );  
        $result= $this->db->insert('menu',$data);
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