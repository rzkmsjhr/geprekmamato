<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_gudang');
		$this->load->model('m_gudang_in');
		$this->load->model('m_gudang_out');
		$this->load->model('m_user');
		if($this->session->userdata('akses') != '3')
		{
      		echo "Anda tidak berhak mengakses halaman ini";
      		redirect(base_url("login"));
   		}
   	}
 
	function index() {
		$this->template->load('gudang/v_gudang', 'gudang/v_gudang_index');
	}

	function mastergudang() {
		$data['mastergudang'] = $this->m_gudang->get_mastergudang();
		$this->template->load('gudang/v_gudang', 'gudang/v_tbl_mastergudang', $data);
	}

	function add_bahanmasakan() {
		$this->template->load('gudang/v_gudang', 'gudang/v_add_bahanmasakan');
	}

	function add_inventori() {
		$this->template->load('gudang/v_gudang', 'gudang/v_add_inventori');
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
		$this->template->load('gudang/v_gudang', 'gudang/v_edit_item_gudang', $data);
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
		redirect('gudang/mastergudang');
	}
	/* Akhir Proses Master Gudang */

	/* Awal Proses Gudang Bahan Masakan & Inventori*/
	function bahanmasak() {
		$data['bahanmasak'] = $this->m_gudang->get_bahan_masakan();
		$data['bahanmasak_in'] = $this->m_gudang_in->get_bahanmasak_in();
		$data['bahanmasak_out'] = $this->m_gudang_out->get_bahanmasak_out();
		$this->template->load('gudang/v_gudang', 'gudang/v_tbl_gudang_bahanmasak', $data);
	}

	function inventori() {
		$data['inventori'] = $this->m_gudang->get_inventori();
		$data['inventori_in'] = $this->m_gudang_in->get_inventori_in();
		$data['inventori_out'] = $this->m_gudang_out->get_inventori_out();
		$this->template->load('gudang/v_gudang', 'gudang/v_tbl_gudang_inventori', $data);
	}

	function bahanmasak_in() {
		$data['bahanmasak'] = $this->m_gudang->get_bahan_masakan();
		$this->template->load('gudang/v_gudang', 'gudang/v_bahan_masak_in', $data);
	}

	function bahanmasak_out() {
		$data['bahanmasak'] = $this->m_gudang->get_bahan_masakan_out();
		$this->template->load('gudang/v_gudang', 'gudang/v_bahan_masak_out', $data);
	}

	function inventori_in() {
		$data['inventori'] = $this->m_gudang->get_inventori();
		$this->template->load('gudang/v_gudang', 'gudang/v_inventori_in', $data);
	}

	function inventori_out() {
		$data['inventori'] = $this->m_gudang->get_inventori_out();
		$this->template->load('gudang/v_gudang', 'gudang/v_inventori_out', $data);
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
		redirect('gudang/bahanmasak');
	}

	function delete_bahanmasakan_out($id) {
		$where = array('id_item_out' => $id);
		$this->m_gudang_out->delete($where,'gudang_out');
		redirect('gudang/bahanmasak');
	}

	function delete_inventori_in($id) {
		$where = array('id_item_in' => $id);
		$this->m_gudang_in->delete($where,'gudang_in');
		redirect('gudang/inventori');
	}

	function delete_inventori_out($id) {
		$where = array('id_item_out' => $id);
		$this->m_gudang_out->delete($where,'gudang_out');
		redirect('gudang/inventori');
	}

	function usergudang() {
		$data['usergudang'] = $this->m_user->get_gudang();
		$this->template->load('gudang/v_gudang', 'gudang/v_tbl_user_gudang',$data);
	}

	function add_user_gudang() {
		$this->template->load('gudang/v_gudang', 'gudang/v_add_usergudang');
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
		$this->template->load('gudang/v_gudang', 'gudang/v_edit_user', $data);
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

	function delete_gudang($id) {
		$where = array('id_user' => $id);
		$this->m_user->delete($where,'user');
		redirect('gudang/usergudang');
	}
}