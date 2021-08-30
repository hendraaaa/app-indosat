<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotFound extends MX_Controller
{


    public function index()
    {
        $this->load->view('header');
        $this->load->view('v_notfound');
    }
}
