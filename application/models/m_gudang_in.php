<?php
class M_gudang_in extends CI_Model{
 
    function get_bahanmasak_in() {

        $query = $this->db->query('SELECT i.id_item_in, g.kode_item, tanggal_beli, harga_beli, nama_item, jumlah, keterangan, satuan FROM gudang_in i JOIN gudang g ON i.kode_item = g.kode_item WHERE g.kode_item LIKE "BHN%"');
        return $query->result();
    }

    function get_inventori_in() {

        $query = $this->db->query('SELECT i.id_item_in, g.kode_item, tanggal_beli, harga_beli, nama_item, jumlah, keterangan, satuan FROM gudang_in i JOIN gudang g ON i.kode_item = g.kode_item WHERE g.kode_item LIKE "INV%"');
        return $query->result();
    }

    function insert($kode_item,$tanggal_beli,$harga_beli,$jumlah,$keterangan) {
        $data = array(
                'kode_item' => $kode_item,
                'tanggal_beli' => $tanggal_beli,
                'harga_beli' => $harga_beli,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan
            );
        $result= $this->db->insert('gudang_in',$data);
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