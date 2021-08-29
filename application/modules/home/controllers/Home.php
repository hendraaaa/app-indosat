<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{

    function __construct()
    {
        parent::__construct(); //wajib ada jika memanggil model dan view 
        $this->load->model('M_home');
        if(!isset($_SESSION['sess_app']))
        redirect('login');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('v_home');
    }
    function ambilData(){
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('M_home', 'home');
            $list = $this->home->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $btnEdit = "<button type=\"button\" class=\"btn btn-outline-primary btn-sm\"><i class=\"fa fa-tags\" onclick=\"edit('".$field->id."')\"></i></button>";
                $btnDelete = "<button type=\"button\" class=\"btn btn-outline-danger btn-sm\"><i class=\"fa fa-trash\" onclick=\"hapus('" . $field->id . "')\"></i></button>";


                $no++;
                $row = array();
                $row[] = $field->id;
                $row[] = $no;
                $row[] = $field->site;
                $row[] = $field->jenis_barang;
                $row[] = $field->brand;
                $row[] = $field->deskripsi;
                $row[] = $field->sn;
                $row[] = $field->kondisi;
                $row[] = $field->tanggal;
                $row[] = $field->last_modify;
                $row[] = $btnEdit.'    '.$btnDelete;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->home->count_all(),
                "recordsFiltered" => $this->home->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }
    public function formtambah(){
        if ($this->input->is_ajax_request() == true) {
          
                    $msg = [
                        'success' => $this->load->view('v_modalTambah', '', true)
                    ];
                    echo json_encode($msg);
            
        }
       
    }
    public function insertData(){       
        $site = $this->input->post('site', true);
        $jenis_barang = $this->input->post('jenis_barang',true);
        $brand = $this->input->post('brand',true);
        $deskripsi = $this->input->post('deskripsi', true);
        $sn = $this->input->post('sn', true);
        $kondisi = $this->input->post('kondisi', true);
		$simpan = $this->M_home->simpanData($site,$jenis_barang,$brand,$deskripsi,$sn,$kondisi);

        if($simpan){
            $msg = [
                'sukses' => 'data berhasil disimpan'
            ];
            echo json_encode($msg);
        }else{
            $msg = [
                'error' => 'error'
            ];
            echo json_encode($msg);
        }       
        
    }
    public function formedit()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id',true);
            $ambilData = $this->M_home->EditData($id);

            if($ambilData->num_rows() > 0){
                $row = $ambilData->row_array();
                $data = [
                    'id' => $row['id'],
                    'site' => $row['site'],
                    'jenis_barang' => $row['jenis_barang'],
                    'brand' => $row['brand'],
                    'deskripsi' => $row['deskripsi'],
                    'sn' => $row['sn'],
                    'kondisi' => $row['kondisi'],
                ];
            }
            $msg = [
                'success' => $this->load->view('v_modalEdit', $data, true)
            ];
            echo json_encode($msg);
        }
    }
    public function updateData()
    {
        $id = $this->input->post('id', true);
        $site = $this->input->post('site', true);
        $jenis_barang = $this->input->post('jenis_barang', true);
        $brand = $this->input->post('brand', true);
        $deskripsi = $this->input->post('deskripsi', true);
        $sn = $this->input->post('sn', true);
        $kondisi = $this->input->post('kondisi', true);
        $simpan = $this->M_home->updateData($id,$site, $jenis_barang, $brand, $deskripsi, $sn, $kondisi);

        if ($simpan) {
            $msg = [
                'sukses' => 'data berhasil di Edit'
            ];
            echo json_encode($msg);
        } else {
            $msg = [
                'error' => 'error'
            ];
            echo json_encode($msg);
        }
    }
    public function hapus()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id', true);
            $hapus = $this->M_home->hapusData($id);

            if($hapus){
                $msg = [
                    'sukses' => 'berhasil dihapus'
                ];

            }
            echo json_encode($msg);
        }
    }

    public function hapusAll()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('test');
            $jumlah = count($id);

            $hapus = $this->M_home->hapusSemuaData($id,$jumlah);

            if ($hapus) {
                $msg = [
                    'sukses' => 'berhasil dihapus'
                ];
            }
            echo json_encode($msg);
        }
    }


    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}
