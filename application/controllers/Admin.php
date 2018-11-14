<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model(array('m_kategori','m_menu','m_gudang','m_gudang_in','m_gudang_out','m_promo','m_user','m_transaksi','m_penjualan'));
		$this->load->library('form_validation');
		if($this->session->userdata('akses') != '1')
		{
      		echo "Anda tidak berhak mengakses halaman ini";
      		redirect(base_url("login"));
   		}
   	}

	function index() {
		$this->template->load('admin/v_admin', 'admin/v_admin_index');
	}

	/* Awal Proses Transaksi */
	function transaksi() {
		$data['header'] = $this->m_transaksi->get_transaksi_header();
		$data['sale'] = $this->m_transaksi->get_transaksi_sale();
		$this->template->load('admin/v_admin', 'admin/v_tbl_transaksi', $data);
	}

	function transaksi_detail($id) {
		$where = array('no_transaksi' => $id);
		$data['header'] =$this->m_transaksi->detail_transaksi($id);
		$data['sale'] = $this->m_transaksi->detail_sale($id);
		$this->template->load('admin/v_admin', 'admin/v_transaksi_detail', $data);
	}

	function add_transaksi() {
		$data['makanan'] = $this->m_transaksi->get_menu_makanan();
		$data['minuman'] = $this->m_transaksi->get_menu_minuman();
		$data['snack'] = $this->m_transaksi->get_menu_snack();
		$data['promo'] = $this->m_promo->get_promo();
		$this->template->load('admin/v_admin', 'admin/v_add_transaksi',$data);
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
  		$this->template->load('admin/v_admin', 'admin/v_cetak_nota', $data);
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

		$config['cacheable']	= true;
		$config['cachedir']		= './assets/';
		$config['errorlog']		= './assets/';
		$config['imagedir']		= './assets/qrtrans/';
		$config['quality']		= true;
		$config['size']			= '1024';
		$config['black']		= array(224,255,255);
		$config['white']		= array(70,130,180);
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

	function penjualan() {
		$data['penjualanharian'] = $this->m_penjualan->get_penjualan_harian();
		$data['penjualanmingguan'] = $this->m_penjualan->get_penjualan_mingguan();
		$data['penjualanbulanan'] = $this->m_penjualan->get_penjualan_bulanan();
		$this->template->load('admin/v_admin', 'admin/v_tbl_penjualan', $data);
	}

	/* Awal Proses Menu */
	function menu() {
		$data['menu'] = $this->m_menu->get_menu();
		$this->template->load('admin/v_admin', 'admin/v_tbl_menu', $data);
	}
	
	function add_menu() {
		$data['kategori'] = $this->m_kategori->get_kategori();
		$this->template->load('admin/v_admin', 'admin/v_add_menu', $data);
	}

	function save_menu() {
        $nama_menu= $this->input->post('nama_menu');
        $harga_menu= $this->input->post('harga_menu');
        $id_kategori_menu= $this->input->post('id_kategori_menu');
        $result= $this->m_menu->insert($nama_menu,$harga_menu,$id_kategori_menu);
        echo json_decode($result);
    }

    function edit_menu($id) {
		$where = array('id_menu' => $id);
		$data['menu'] = $this->m_menu->edit_data($where,'menu')->result();
		$data['kategori'] = $this->m_kategori->get_kategori();
		$this->template->load('admin/v_admin', 'admin/v_edit_menu', $data);
	}

	function update_menu() {
        $id_menu= $this->input->post('id_menu');
    	$nama_menu= $this->input->post('nama_menu');
    	$harga_menu= $this->input->post('harga_menu');
    	$id_kategori_menu= $this->input->post('id_kategori_menu');
		$data = array(
			'nama_menu' => $nama_menu,
			'harga_menu' => $harga_menu,
			'id_kategori_menu' => $id_kategori_menu
		);
		$where = array(
			'id_menu' => $id_menu
		);
		$result= $this->m_menu->update($where,$data,'menu');
		echo json_decode($result);
	}

	function delete_menu($id) {
		$where = array('id_menu' => $id);
		$this->m_menu->delete($where,'menu');
		redirect('admin/menu');
	}
	/* Akhir Proses Menu */

	/* Awal Proses Kategori */
	function kategori_menu() {
		$data['kategori'] = $this->m_kategori->get_kategori();
		$this->template->load('admin/v_admin', 'admin/v_tbl_kategori_menu', $data);
	}

	function add_kategori_menu() {
		$this->template->load('admin/v_admin', 'admin/v_add_kategori_menu');
	}

	function save_kategori() {
        $nama_kategori= $this->input->post('nama_kategori');
        $result= $this->m_kategori->insert($nama_kategori);
        echo json_decode($result);
    }

    function edit_kategori($id) {
		$where = array('id_kategori' => $id);
		$data['kategori_menu'] = $this->m_kategori->edit_data($where,'kategori_menu')->result();
		$this->template->load('admin/v_admin', 'admin/v_edit_kategori_menu', $data);
	}

	function update_kategori() {
        $id_kategori= $this->input->post('id_kategori');
    	$nama_kategori= $this->input->post('nama_kategori');
		$data = array(
			'nama_kategori' => $nama_kategori
		);
		$where = array(
			'id_kategori' => $id_kategori
		);
		$result= $this->m_kategori->update($where,$data,'kategori_menu');
		echo json_decode($result);
	}

	function delete_kategori($id) {
		$where = array('id_kategori' => $id);
		$this->m_kategori->delete($where,'kategori_menu');
		redirect('admin/kategori_menu');
	}
	/* Akhir Proses Kategori */

	/* Awal Proses Master Gudang */
	function mastergudang() {
		$data['mastergudang'] = $this->m_gudang->get_mastergudang();
		$this->template->load('admin/v_admin', 'admin/v_tbl_mastergudang', $data);
	}

	function add_bahanmasakan() {
		$this->template->load('admin/v_admin', 'admin/v_add_bahanmasakan');
	}

	function add_inventori() {
		$this->template->load('admin/v_admin', 'admin/v_add_inventori');
	}

	function save_item_gudang() {
        $kode_item1= $this->input->post('kode_item1');
        $kode_item2= $this->input->post('kode_item2');
        $kode_item = $kode_item1."".$kode_item2;
        $nama_item= $this->input->post('nama_item');
        $satuan= $this->input->post('satuan');
        $stok= $this->input->post('stok');
        $result= $this->m_gudang->insert($kode_item,$nama_item,$satuan,$stok);
        echo json_decode($result);
    }

    function edit_item_gudang($id) {
		$where = array('id_item' => $id);
		$data['gudang'] = $this->m_gudang->edit_data($where,'gudang')->result();
		$this->template->load('admin/v_admin', 'admin/v_edit_item_gudang', $data);
	}

	function update_item_gudang() {
        $id_item= $this->input->post('id_item');
        $kode_item= $this->input->post('kode_item');
    	$nama_item= $this->input->post('nama_item');
    	$satuan= $this->input->post('satuan');
    	$stok= $this->input->post('stok');
		$data = array(
			'kode_item' => $kode_item,
			'nama_item' => $nama_item,
			'satuan' => $satuan,
			'stok' => $stok
		);
		$where = array(
			'id_item' => $id_item
		);
		$result= $this->m_gudang->update($where,$data,'gudang');
		echo json_decode($result);
	}

	function delete_item_gudang($id) {
		$where = array('id_item' => $id);
		$this->m_gudang->delete($where,'gudang');
		redirect('admin/mastergudang');
	}
	/* Akhir Proses Master Gudang */

	/* Awal Proses Gudang Bahan Masakan & Inventori*/
	function bahanmasak() {
		$data['bahanmasak'] = $this->m_gudang->get_bahan_masakan();
		$data['bahanmasak_in'] = $this->m_gudang_in->get_bahanmasak_in();
		$data['bahanmasak_out'] = $this->m_gudang_out->get_bahanmasak_out();
		$this->template->load('admin/v_admin', 'admin/v_tbl_gudang_bahanmasak', $data);
	}

	function inventori() {
		$data['inventori'] = $this->m_gudang->get_inventori();
		$data['inventori_in'] = $this->m_gudang_in->get_inventori_in();
		$data['inventori_out'] = $this->m_gudang_out->get_inventori_out();
		$this->template->load('admin/v_admin', 'admin/v_tbl_gudang_inventori', $data);
	}

	function bahanmasak_in() {
		$data['bahanmasak'] = $this->m_gudang->get_bahan_masakan();
		$this->template->load('admin/v_admin', 'admin/v_bahan_masak_in', $data);
	}

	function bahanmasak_out() {
		$data['bahanmasak'] = $this->m_gudang->get_bahan_masakan_out();
		$this->template->load('admin/v_admin', 'admin/v_bahan_masak_out', $data);
	}

	/*function edit_bahanmasak_in($id) {
		$where = array('id_item_in' => $id);
		$data['gudang_in'] = $this->m_gudang_in->edit_data($where,'gudang_in')->result();
		$data['bahanmasak'] = $this->m_gudang->get_bahan_masakan();
		$this->template->load('v_admin', 'v_edit_bahanmasak_in', $data);
	}*/

	function inventori_in() {
		$data['inventori'] = $this->m_gudang->get_inventori();
		$this->template->load('admin/v_admin', 'admin/v_inventori_in', $data);
	}

	function inventori_out() {
		$data['inventori'] = $this->m_gudang->get_inventori_out();
		$this->template->load('admin/v_admin', 'admin/v_inventori_out', $data);
	}

	function save_item_in() {
        $kode_item= $this->input->post('kode_item');
        $tanggal_beli= $this->input->post('tanggal_beli');
        $harga_beli= $this->input->post('harga_beli');
        $jumlah= $this->input->post('jumlah');
        $keterangan= $this->input->post('keterangan');
        $result= $this->m_gudang_in->insert($kode_item,$tanggal_beli,$harga_beli,$jumlah,$keterangan);
        echo json_decode($result);
    }

    function save_item_out() {
		$kode_item= $this->input->post('kode_item');
		$tanggal_keluar= $this->input->post('tanggal_keluar');
		$jumlah= $this->input->post('jumlah');
		$keterangan= $this->input->post('keterangan');
		$result= $this->m_gudang_out->insert($kode_item,$tanggal_keluar,$jumlah,$keterangan);
		echo json_decode($result);
    }

    function delete_bahanmasakan_in($id) {
		$where = array('id_item_in' => $id);
		$this->m_gudang_in->delete($where,'gudang_in');
		redirect('admin/bahanmasak');
	}

	function delete_bahanmasakan_out($id) {
		$where = array('id_item_out' => $id);
		$this->m_gudang_out->delete($where,'gudang_out');
		redirect('admin/bahanmasak');
	}

	function delete_inventori_in($id) {
		$where = array('id_item_in' => $id);
		$this->m_gudang_in->delete($where,'gudang_in');
		redirect('admin/inventori');
	}

	function delete_inventori_out($id) {
		$where = array('id_item_out' => $id);
		$this->m_gudang_out->delete($where,'gudang_out');
		redirect('admin/inventori');
	}

    /*function update_item_in() {
        $id_item_in= $this->input->post('id_item_in');
        $kode_item= $this->input->post('kode_item');
    	$tanggal_beli= $this->input->post('tanggal_beli');
    	$harga_beli= $this->input->post('harga_beli');
    	$jumlah= $this->input->post('jumlah');
    	$keterangan= $this->input->post('keterangan');
		$data = array(
			'kode_item' => $kode_item,
			'tanggal_beli' => $tanggal_beli,
			'harga_beli' => $harga_beli,
			'jumlah' => $jumlah,
			'keterangan' => $keterangan
		);
		$where = array(
			'id_item_in' => $id_item_in
		);
		$result= $this->m_gudang_in->update($where,$data,'gudang_in');
		echo json_decode($result);
	}*/

	/* Akhir Proses Gudang Bahan Masakan & Inventori*/

	/* Awal Proses Promo*/
	function promo() {
		$data['promo'] = $this->m_promo->get_promo();
		$this->template->load('admin/v_admin', 'admin/v_tbl_promo', $data);
	}

	function save_promo() {
        $nama_promo= $this->input->post('nama_promo');
        $nilai_promo= $this->input->post('nilai_promo');
        $keterangan= $this->input->post('keterangan');
        $result= $this->m_promo->insert($nama_promo,$nilai_promo,$keterangan);
        echo json_decode($result);
    }

	function add_promo() {
		$this->template->load('admin/v_admin', 'admin/v_add_promo');
	}

	function edit_promo($id) {
		$where = array('id_promo' => $id);
		$data['promo'] = $this->m_promo->edit_data($where,'promo')->result();
		$this->template->load('admin/v_admin', 'admin/v_edit_promo', $data);
	}

	function update_promo() {
        $id_promo= $this->input->post('id_promo');
        $nama_promo= $this->input->post('nama_promo');
    	$nilai_promo= $this->input->post('nilai_promo');
    	$keterangan= $this->input->post('keterangan');
		$data = array(
			'nama_promo' => $nama_promo,
			'nilai_promo' => $nilai_promo,
			'keterangan' => $keterangan
		);
		$where = array(
			'id_promo' => $id_promo
		);
		$result= $this->m_promo->update($where,$data,'promo');
		echo json_decode($result);
	}

	function delete_promo($id) {
		$where = array('id_promo' => $id);
		$this->m_promo->delete($where,'promo');
		redirect('admin/promo');
	}
	/* Akhir Proses Promo*/

	/* Awal Proses User*/
	function useradmin() {
		$data['useradmin'] = $this->m_user->get_admin();
		$this->template->load('admin/v_admin', 'admin/v_tbl_user_admin', $data);
	}

	function add_user_admin() {
		$this->template->load('admin/v_admin', 'admin/v_add_useradmin');
	}

	function userkasir() {
		$data['userkasir'] = $this->m_user->get_kasir();
		$this->template->load('admin/v_admin', 'admin/v_tbl_user_kasir',$data);
	}

	function add_user_kasir() {
		$this->template->load('admin/v_admin', 'admin/v_add_userkasir');
	}

	function usergudang() {
		$data['usergudang'] = $this->m_user->get_gudang();
		$this->template->load('admin/v_admin', 'admin/v_tbl_user_gudang',$data);
	}

	function add_user_gudang() {
		$this->template->load('admin/v_admin', 'admin/v_add_usergudang');
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
		$this->template->load('admin/v_admin', 'admin/v_edit_user', $data);
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

	function delete_admin($id) {
		$where = array('id_user' => $id);
		$this->m_user->delete($where,'user');
		redirect('admin/useradmin');
	}

	function delete_kasir($id) {
		$where = array('id_user' => $id);
		$this->m_user->delete($where,'user');
		redirect('admin/userkasir');
	}

	function delete_gudang($id) {
		$where = array('id_user' => $id);
		$this->m_user->delete($where,'user');
		redirect('admin/usergudang');
	}
	/* Akhir Proses User*/
}