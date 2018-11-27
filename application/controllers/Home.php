<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model(array('m_transaksi'));
	}

	public function index()
	{
		$this->template->load('v_home', 'v_index');
	}

	function transaksi($id) {
		$where = array('no_transaksi' => $id);
		$data['header'] =$this->m_transaksi->detail_transaksi($id);
		$data['sale'] = $this->m_transaksi->detail_sale($id);
		$this->load->view('v_transaksi', $data);
	}
}
