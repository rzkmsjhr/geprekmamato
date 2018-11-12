<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('m_login');
	}
 
	function index() {
		$this->load->view('login/v_login');
	}

	function auth() {
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_user=$this->m_login->auth_user($username);
 
        if($cek_user) {
        	if (password_verify($password,$cek_user['password'])) {
        		$data=$cek_user;
            	$this->session->set_userdata('masuk',TRUE);
            	if($data['level']=='1') {
            		$this->session->set_userdata('akses','1');
            		$this->session->set_userdata('ses_id',$data['id_user']);
            		$this->session->set_userdata('ses_nama',$data['username']);
            		redirect(base_url('admin'));
 				}
 				else if ($data['level']=='2') {
					$this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_id',$data['id_user']);
					$this->session->set_userdata('ses_nama',$data['username']);
					redirect(base_url('kasir'));
            	}
            	else {
					$this->session->set_userdata('akses','3');
					$this->session->set_userdata('ses_id',$data['id_user']);
					$this->session->set_userdata('ses_nama',$data['username']);
					redirect(base_url('gudang'));
        		}
        	}

        	else {
				$this->session->set_flashdata('msg','Username Atau Password Salah');
				redirect(base_url('login'));
			}
		}
	 	else {
			$this->session->set_flashdata('msg','Username Atau Password Salah');
			redirect(base_url('login'));
		}
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}