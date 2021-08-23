<?php
class Crypt extends CI_Model{
    public function en ($str){
		$this->load->library('XTEA');
        
    }
}
?>