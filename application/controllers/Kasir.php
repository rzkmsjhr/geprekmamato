<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_promo');
		$this->load->model('m_transaksi');
		$this->load->model('m_user');
		$this->load->model('m_menu');
		if($this->session->userdata('akses') != '2')
		{
      		echo "Anda tidak berhak mengakses halaman ini";
      		redirect(base_url("login"));
   		}
   	}
 
	function index() {
		$this->template->load('kasir/v_kasir', 'kasir/v_kasir_index');
	}

	/* Awal Proses Transaksi */
	function transaksi() {
		$data['header'] = $this->m_transaksi->get_transaksi_header_kasir();
		$data['sale'] = $this->m_transaksi->get_transaksi_sale();
		$this->template->load('kasir/v_kasir', 'kasir/v_tbl_transaksi', $data);
	}

	function transaksi_detail($id) {
		$where = array('no_transaksi' => $id);
		$data['header'] =$this->m_transaksi->detail_transaksi($id);
		$data['sale'] = $this->m_transaksi->detail_sale($id);
		$this->template->load('kasir/v_kasir', 'kasir/v_transaksi_detail', $data);
	}

	function add_transaksi() {
		$data['makanan'] = $this->m_transaksi->get_menu_makanan();
		$data['minuman'] = $this->m_transaksi->get_menu_minuman();
		$data['snack'] = $this->m_transaksi->get_menu_snack();
		$data['promo'] = $this->m_promo->get_promo();
		$this->template->load('kasir/v_kasir', 'kasir/v_add_transaksi',$data);
	}

	function harga_menu() {
    	$id_menu = $this->input->post('id_menu');
    	$menu = $this->m_transaksi->get_harga_menu($id_menu);
    	$lists = "";
    	$list1 = "";
    	
    	foreach($menu as $data){
    	  $list1 .= "<input type='hidden' name='id_menu_transaksi[]' class='form-control' placeholder='Harga' value='".$data->id_menu."'>
    	  			     <input type='text' readonly name='nama_menu[]' class='form-control' placeholder='Harga' value='".$data->nama_menu."'>";
    	  $lists .= "<input type='text' readonly name='harga_menu[]' class='form-control' placeholder='Harga' value='".$data->harga_menu."'>";
    	}
    	
    	$callback = array('list_menu'=>$lists,'list_nama'=>$list1);
    	echo json_encode($callback);
  	}

  	function nilai_promo() {
    	$id_promo = $this->input->post('id_promo');
    	$promo = $this->m_transaksi->get_nilai_promo($id_promo);
    	$lists = "";
    	
    	foreach($promo as $data){
    	  $lists .= "<input type='hidden' name='nilai_promo' class='form-control' placeholder='Harga' value='".$data->nilai_promo."'>";
    	}
    	
    	$callback = array('list_promo'=>$lists);
    	echo json_encode($callback);
  	}

  	function cetaknota() {
  		$menu=implode(',',$this->input->post('id_menu_transaksi'));
  		$quantity=implode(',',$this->input->post('quantity'));
  		$nama_menu=implode(',',$this->input->post('nama_menu'));
  		$harga_menu=implode(',',$this->input->post('harga_menu'));

  		$data['tanggal_transaksi']=$this->input->post('tanggal_transaksi',true);
  		$data['waktu_transaksi']=$this->input->post('waktu_transaksi',true);
  		$data['id_user_transaksi']=$this->input->post('id_user_transaksi',true);
  		$data['no_transaksi']=$this->input->post('no_transaksi',true);
  		$data['nama_customer']=$this->input->post('nama_customer',true);
  		$data['nama_menu1']=$this->input->post('nama_menu',true);
  		$data['harga_menu1']=$this->input->post('harga_menu',true);
  		$data['quantity1']=$this->input->post('quantity',true);
  		$data['id_menu_transaksi1']=$this->input->post('id_menu_transaksi',true);
  		$data['id_promo_transaksi']=$this->input->post('id_promo_transaksi',true);
  		$data['nilai_promo']=$this->input->post('nilai_promo',true);

  		$data['id_menu_transaksi']=$menu;
  		$data['nama_menu']=(int)$nama_menu;
  		$data['harga_menu']=(int)$harga_menu;
  		$data['quantity']=(int)$quantity;

  		$data['totalbayar']=$data['harga_menu']*$data['quantity'];
  		$this->template->load('kasir/v_kasir', 'kasir/v_cetak_nota', $data);
  	}

  	function save_transaksi() {
  		$transaksi = array(
  		'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
  		'waktu_transaksi' => $this->input->post('waktu_transaksi'),
  		'no_transaksi' => $this->input->post('no_transaksi'),
  		'nama_customer' => $this->input->post('nama_customer'),
  		'id_user_transaksi' => $this->input->post('id_user_transaksi'),
  		'id_menu_transaksi' => $this->input->post('id_menu_transaksi'),
  		'quantity' => $this->input->post('quantity'), 
  		'id_promo_transaksi' => $this->input->post('id_promo_transaksi'),
  		'total_bayar' => $this->input->post('total_bayar')
		  );

      $no_transaksiqr=$this->input->post('no_transaksiqr');

      $this->load->library('ciqrcode');
      $config['cacheable']  = true;
      $config['cachedir']   = './assets/';
      $config['errorlog']   = './assets/';
      $config['imagedir']   = './assets/qrtrans/';
      $config['quality']    = true;
      $config['size']     = '1024';
      $config['black']    = array(224,255,255);
      $config['white']    = array(70,130,180);
      $this->ciqrcode->initialize($config);
  
      $image_name=$no_transaksiqr.'.png';
  
      $params['data'] = "http://www.geprekmamato.com/transaksi/".$no_transaksiqr;
      $params['level'] = 'H';
      $params['size'] = 10;
      $params['savename'] = FCPATH.$config['imagedir'].$image_name;
      $this->ciqrcode->generate($params);

      $result = $this->m_transaksi->insert($transaksi);
      echo json_decode($result);
    }
    /* Akhir Proses Transaksi */

    function menu() {
      $data['menu'] = $this->m_menu->get_menu();
      $this->template->load('kasir/v_kasir', 'kasir/v_tbl_menu', $data);
    }

    function userkasir() {
		  $data['userkasir'] = $this->m_user->get_kasir();
		  $this->template->load('kasir/v_kasir', 'kasir/v_tbl_user_kasir',$data);
    }

    function add_user_kasir() {
    	$this->template->load('kasir/v_kasir', 'kasir/v_add_userkasir');
    }

    function save_user() {
        $level= $this->input->post('level');
        $username= $this->input->post('username');
        $password= password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $result= $this->m_user->insert($level,$username,$password);
        echo json_decode($result);
    }

    function edit_user($id) {
      $where = array('id_user' => $id);
      $data['user'] = $this->m_user->edit_data($where,'user')->result();
      $this->template->load('kasir/v_kasir', 'kasir/v_edit_user', $data);
    }

    function update_user() {
      $id_user= $this->input->post('id_user');
      $level= $this->input->post('level');
      $username= $this->input->post('username');
      $password= password_hash($this->input->post('password'), PASSWORD_BCRYPT);
      $data = array(
        'level' => $level,
        'username' => $username,
        'password' => $password
      );
      $where = array(
        'id_user' => $id_user
      );
      $result= $this->m_user->update($where,$data,'user');
      echo json_decode($result);
    }

    function delete_kasir($id) {
    	$where = array('id_user' => $id);
    	$this->m_user->delete($where,'user');
    	redirect('kasir/userkasir');
    }
}