<?php
class M_transaksi extends CI_Model{
 
    function get_menu_makanan() {

        $query = $this->db->query('SELECT m.id_menu, nama_menu, harga_menu, nama_kategori FROM menu m JOIN kategori_menu k ON m.id_kategori_menu = k.id_kategori WHERE id_kategori_menu = 1');
        return $query->result();
    }

    function get_menu_minuman() {

        $query = $this->db->query('SELECT m.id_menu, nama_menu, harga_menu, nama_kategori FROM menu m JOIN kategori_menu k ON m.id_kategori_menu = k.id_kategori WHERE id_kategori_menu = 2');
        return $query->result();
    }
    function get_menu_snack() {

        $query = $this->db->query('SELECT m.id_menu, nama_menu, harga_menu, nama_kategori FROM menu m JOIN kategori_menu k ON m.id_kategori_menu = k.id_kategori WHERE id_kategori_menu = 3');
        return $query->result();
    }

    function get_harga_menu($id_menu) {

        $this->db->where('id_menu', $id_menu);
        $result = $this->db->get('menu')->result();
        return $result; 
    }

    function get_nilai_promo($id_promo) {

        $this->db->where('id_promo', $id_promo);
        $result = $this->db->get('promo')->result();
        return $result; 
    }

    function get_transaksi_header() {
        $query = ('SELECT DISTINCT t.tanggal_transaksi, t.waktu_transaksi, t.no_transaksi, t.nama_customer, u.username, p.nama_promo FROM transaksi t JOIN user u ON t.id_user_transaksi = u.id_user JOIN promo p ON t.id_promo_transaksi = p.id_promo ORDER BY t.tanggal_transaksi DESC, `t`.`waktu_transaksi` DESC');

        $this->load->library('pagination');
        
        $config['base_url'] = base_url('admin/transaksi');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 10;
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
        $data['transaksi'] = $this->db->query($query)->result();
    
        return $data;
    }

    function get_transaksi_header_kasir() {
        $query = ('SELECT DISTINCT t.tanggal_transaksi, t.waktu_transaksi, t.no_transaksi, t.nama_customer, u.username, p.nama_promo FROM transaksi t JOIN user u ON t.id_user_transaksi = u.id_user JOIN promo p ON t.id_promo_transaksi = p.id_promo ORDER BY t.tanggal_transaksi DESC, `t`.`waktu_transaksi` DESC');

        $this->load->library('pagination');
        
        $config['base_url'] = base_url('kasir/transaksi');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 10;
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
        $data['transaksi'] = $this->db->query($query)->result();
    
        return $data;
    }

    function get_transaksi_sale() {

        $query = $this->db->query('SELECT m.nama_menu, t.quantity, t.total_bayar FROM transaksi t JOIN menu m ON t.id_menu_transaksi = m.id_menu');
        return $query->result();
    }

    function insert($transaksi) {
        foreach($transaksi['id_menu_transaksi'] as $key => $id_menu_transaksi) {
          $dataToSave[] = array(
            'tanggal_transaksi' => $transaksi['tanggal_transaksi'][$key],
            'waktu_transaksi' => $transaksi['waktu_transaksi'][$key],
            'no_transaksi' => $transaksi['no_transaksi'][$key],
            'nama_customer' => $transaksi['nama_customer'][$key],
            'id_user_transaksi' => $transaksi['id_user_transaksi'][$key],
            'id_menu_transaksi' => $id_menu_transaksi,
            'quantity' => $transaksi['quantity'][$key],
            'id_promo_transaksi' => $transaksi['id_promo_transaksi'][$key],
            'total_bayar' => $transaksi['total_bayar'][$key]
          );
        }

        $result=$this->db->insert_batch('transaksi', $dataToSave);
        return $result;
    }


    function edit_data($where,$table) {
        return $this->db->get_where($table,$where);
    }

    function detail_transaksi($id) {

        $sql = $this->db->query("SELECT DISTINCT t.tanggal_transaksi, t.waktu_transaksi, t.no_transaksi, t.nama_customer, u.username, p.nama_promo FROM transaksi t JOIN user u ON t.id_user_transaksi = u.id_user JOIN promo p ON t.id_promo_transaksi = p.id_promo WHERE t.no_transaksi = '$id'");
        return $sql->result();
    }

    function detail_sale($id) {

        $sql = $this->db->query("SELECT t.no_transaksi, m.harga_menu, m.nama_menu, t.quantity, t.total_bayar, p.nilai_promo FROM transaksi t JOIN menu m ON t.id_menu_transaksi = m.id_menu JOIN promo p ON t.id_promo_transaksi = p.id_promo WHERE t.no_transaksi = '$id'");
        return $sql->result();
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

    function get_transaksi() {

        $query = $this->db->query('SELECT t.tanggal_transaksi, t.waktu_transaksi, t.no_transaksi, t.nama_customer, u.username, m.nama_menu, t.quantity, p.nama_promo, t.total_bayar FROM transaksi t 
            JOIN menu m 
            ON t.id_menu_transaksi = m.id_menu 
            JOIN user u
            ON t.id_user_transaksi = u.id_user
            JOIN promo p
            ON t.id_promo_transaksi = p.id_promo');

        return $query->result();
    }
}
?>