<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model {
    public function do_login($u,$p=null)
    {
        $this->db->where("username = '$u'");
        if($p!= null)
            $this->db->where("password='$p'");
        $this->db->from('user');
        $query = $this->db->get();
        if ($query)
        return $query->result();
        else
            return false;
          
    }
}
