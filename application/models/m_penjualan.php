<?php
class M_penjualan extends CI_Model{
 
    function get_penjualan_harian() {

        $query = ("SELECT tanggal_transaksi, count(distinct no_transaksi) AS jumlah_transaksi, SUM(quantity) AS menu_terjual, SUM(total_bayar) AS omzet FROM transaksi GROUP BY tanggal_transaksi ORDER BY tanggal_transaksi DESC");
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('admin/penjualan');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = ' <i class="fa fa-arrow-right" aria-hidden="true"></i> '; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = ' <i class="fa fa-arrow-left" aria-hidden="true"></i> '; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
    
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['harian'] = $this->db->query($query)->result();
    
        return $data;
    }

    function get_penjualan_mingguan() {

        $query = $this->db->query("SELECT tanggal_transaksi, count(distinct no_transaksi) AS jumlah_transaksi, SUM(quantity) AS menu_terjual, SUM(total_bayar) AS omzet FROM transaksi WHERE YEARWEEK(`tanggal_transaksi`, 1) = YEARWEEK(CURDATE(), 1) ORDER BY tanggal_transaksi DESC");
        return $query->result();
    }

    function get_penjualan_bulanan() {

        $query = $this->db->query("SELECT tanggal_transaksi, MONTHNAME(tanggal_transaksi) AS bulan, count(distinct no_transaksi) AS jumlah_transaksi, SUM(quantity) AS menu_terjual, SUM(total_bayar) AS omzet FROM transaksi GROUP BY MONTH(tanggal_transaksi) ORDER BY tanggal_transaksi DESC");
        return $query->result();
    }
}
?>