<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{
    var $table = 'history'; //nama tabel dari database
    var $column_order = array(null, 'SN', 'username', 'action', 'time'); //Sesuaikan dengan field
    var $column_search = array('SN', 'username', 'action', 'time'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'desc'); // default order 
    private function _get_datatables_query()
    {
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function simpanData($site, $jenis_barang, $brand, $deskripsi, $sn, $kondisi)
    {
        //set time
        date_default_timezone_set('Asia/Singapore');
        $simpan = [
            'site' => $site,
            'jenis_barang' => $jenis_barang,
            'brand' => $brand,
            'deskripsi' => $deskripsi,
            'sn' => $sn,
            'kondisi' => $kondisi,
            'tanggal' => date('d-m-Y H:i:s'),
            'last_modify' => $this->session->userdata('sess_app')['nama']

        ];
        $cek = $this->db->insert('barang', $simpan);
        return $cek;
    }
    public function editData($id)
    {
        return $this->db->get_where('barang', ['id' => $id]);
    }
    public function updateData($id, $site, $jenis_barang, $brand, $deskripsi, $sn, $kondisi)
    {
        //set time
        date_default_timezone_set('Asia/Singapore');
        $simpan = [
            'site' => $site,
            'jenis_barang' => $jenis_barang,
            'brand' => $brand,
            'deskripsi' => $deskripsi,
            'sn' => $sn,
            'kondisi' => $kondisi,
            'tanggal' => date('d-m-Y H:i:s'),
            'last_modify' => $this->session->userdata('sess_app')['nama']

        ];
        $this->db->where('id', $id);
        $cek = $this->db->update('barang', $simpan);
        return $cek;
    }
    public function hapusData($id)
    {
        return $this->db->delete('barang', ['id' => $id]);
    }
    public function hapusSemuaData($id, $jumlah)
    {
        for ($i = 0; $i < $jumlah; $i++) {
            $this->db->delete('barang', ['id' => $id[$i]]);
        }
        return true;
    }
}
