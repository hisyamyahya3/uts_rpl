<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    public function index() {
        $input = file_get_contents("php://input");
        $obj = json_decode($input);
        // cek token
        if($obj->token <> '12345') {
            $hasil = array(
                'status' => 'gagal',
                'keterangan' => 'token invalid'
            );
            echo json_encode($hasil);        
            return; // stop function jika token salah
        }

        // pengecekan request
        if($obj->req == 'get_data') {
            echo $this->mapi->get_data($obj);
        }elseif($obj->req == 'input_data') {
            echo $this->mapi->input_data($obj);
        }elseif($obj->req == 'update_data') {
            echo $this->mapi->update_data($obj);
        }elseif($obj->req == 'delete_data') {
            echo $this->mapi->delete_data($obj);
        }else {
            $hasil = array(
                'status' => 'gagal',
                'keterangan' => 'request invalid'
            );
            echo json_encode($hasil); 
        }
    }
}