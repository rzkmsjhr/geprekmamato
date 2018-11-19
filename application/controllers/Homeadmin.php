<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homeadmin extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->userdata('akses') != '4')
		{
      		echo "Anda tidak berhak mengakses halaman ini";
      		redirect(base_url("login"));
   		}
	}

	function index()
	{
		$this->template->load('homeadmin/v_homeadmin', 'homeadmin/v_homeadmin_index');
	}

	function home_logo()
	{
		$this->template->load('homeadmin/v_homeadmin', 'homeadmin/v_home_logo');
	}
}
