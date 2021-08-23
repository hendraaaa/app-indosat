<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{

    function __construct()
    {
        parent::__construct(); //wajib ada jika memanggil model dan view 
        if(!isset($_SESSION['sess_app']))
        redirect('login');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('v_home');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}
