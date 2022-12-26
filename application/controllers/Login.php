<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_Login'); 
	}
 
	function index(){
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('login', $data);
	}
 
	function action_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			'Username' => $username,
			'Password' => md5($password)
		);
		$cek = $this->M_Login->cek_login($data);

		if($cek->num_rows() > 0){
			$row = $cek->row();

			$data_session = array(
				'Username'	=> $username,
				'First_Name'=> $row->First_Name,
				'Last_Name' => $row->Last_Name,
				'Status'	=> 'login'
			);
 
			$this->session->set_userdata($data_session); 
			redirect(base_url()); 
		}else{
			$this->session->set_flashdata('message', pesan_login());
			redirect(base_url('Login')); 
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}