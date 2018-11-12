<?php
class M_promo extends CI_Model{
 
    function get_promo() {

        $query = $this->db->query('SELECT * FROM promo');
        return $query->result();
    }

    function insert($nama_promo,$nilai_promo,$keterangan) {
        $data = array(
                'nama_promo' => $nama_promo,
                'nilai_promo' => $nilai_promo,
                'keterangan' => $keterangan
            );
        $result= $this->db->insert('promo',$data);
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