<?php
class M_gudang extends CI_Model{
 
    function get_mastergudang() {

        $query = $this->db->query('SELECT * FROM gudang');
        return $query->result();
    }

    function get_bahan_masakan() {

        $query = $this->db->query('SELECT * FROM gudang WHERE kode_item LIKE "BHN%"');
        return $query->result();
    }

    function get_inventori() {

        $query = $this->db->query('SELECT * FROM gudang WHERE kode_item LIKE "INV%"');
        return $query->result();
    }

    function get_inventori_out() {

        $query = $this->db->query('SELECT * FROM gudang WHERE kode_item LIKE "INV%" AND stok >0');
        return $query->result();
    }

    function get_bahan_masakan_out() {

        $query = $this->db->query('SELECT * FROM gudang WHERE kode_item LIKE "BHN%" AND stok >0');
        return $query->result();
    }

    function insert($kode_item,$nama_item,$satuan,$stok) {
        $data = array(
                'kode_item' => $kode_item,
                'nama_item' => $nama_item,
                'satuan' => $satuan,
                'stok' => $stok
            );  
        $result= $this->db->insert('gudang',$data);
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