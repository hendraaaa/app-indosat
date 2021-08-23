<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	function __construct()
	{
		parent::__construct(); //wajib ada jika memanggil model dan view 
		$this->load->model('LoginModel');
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	public function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->LoginModel->do_login($username);
		if($cek){
			$decrypt = $this->enkripsi->decodex($cek[0]->password);
			if($password == trim($decrypt)){
				$sess_array = array(
					'nama' => $cek[0]->username
				);
				$this->session->set_userdata('sess_app', $sess_array);
				echo 1;
			}else{
 				echo "<p style=color:red>password dan username salah</p>";
			}
			
		}else echo "<p style=color:red>username tidak terdaftar</p>";
		
	}
}
