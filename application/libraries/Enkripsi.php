<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Enkripsi {
    function __construct()
    {
        require_once('XTEA.php');
    }

    function encodex($string){
        $xtea = new XTEA("1234567890123456");
        $encrypted = $xtea->Encrypt($string);
        return $encrypted;
    }
    function decodex($string)
    {
        $xtea = new XTEA("1234567890123456");
        $decrypted= $xtea->decrypt($string);
        return $decrypted;
    }
}
