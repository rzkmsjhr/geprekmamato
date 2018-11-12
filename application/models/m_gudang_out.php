<?php
class M_gudang_out extends CI_Model{
 
    function get_bahanmasak_out() {

        $query = $this->db->query('SELECT i.id_item_out, g.kode_item, tanggal_keluar, nama_item, jumlah, keterangan, satuan FROM gudang_out i JOIN gudang g ON i.kode_item = g.kode_item WHERE g.kode_item LIKE "BHN%"');
        return $query->result();
    }

    function get_inventori_out() {

        $query = $this->db->query('SELECT i.id_item_out, g.kode_item, tanggal_keluar, nama_item, jumlah, keterangan, satuan FROM gudang_out i JOIN gudang g ON i.kode_item = g.kode_item WHERE g.kode_item LIKE "INV%"');
        return $query->result();
    }

    function insert($kode_item,$tanggal_keluar,$jumlah,$keterangan) {
        $data = array(
                'kode_item' => $kode_item,
                'tanggal_keluar' => $tanggal_keluar,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan
            );
        $result= $this->db->insert('gudang_out',$data);
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