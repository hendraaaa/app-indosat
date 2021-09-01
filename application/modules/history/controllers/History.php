<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends MX_Controller
{

    function __construct()
    {
        parent::__construct(); //wajib ada jika memanggil model dan view 
        $this->load->model('M_history');

        if (!isset($_SESSION['sess_app']))
            redirect('login');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('v_history');
    }
    function ambilData()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('M_history', 'history');
            $list = $this->history->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->username;
                $row[] = $field->action;
                $row[] = $field->site;
                $row[] = $field->brand;
                $row[] = $field->desk;
                $row[] = $field->SN;
                $row[] = $field->time;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->history->count_all(),
                "recordsFiltered" => $this->history->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }
}
