<?php
class Mapi extends CI_Model {

    function get_data($obj) {
        if(array_key_exists('filter',$obj)) {
            $data = $this->db->query("select * from koleksifilmku where $obj->filter")->result();
        }else{
            $data = $this->db->query("select * from koleksifilmku")->result();
        }

        $hasil = array(
            'status' => 'ok',
            'data' => $data
        );
        return json_encode($hasil);
    }

    
    function input_data($obj) {
        $data = $obj->data;
        $input = $this->db->insert('koleksifilmku',$data);
        if($input) {
            $hasil = array(
                'status' => 'ok',
                'keterangan' => 'data berhasil ditambahkan'
            );
        }else {
            $hasil = array(
                'status' => 'gagal',
                'keterangan' => 'data gagal ditambahkan'
            );   
        }
        return json_encode($hasil);
    }

    function update_data($obj) {
        $data = $obj->data;
        $this->db->where('id',$obj->id);
        $update = $this->db->update('koleksifilmku',$data);
        if($update) {
            $hasil = array(
                'status' => 'ok',
                'keterangan' => 'data berhasil diupdate'
            );
        }else {
            $hasil = array(
                'status' => 'gagal',
                'keterangan' => 'data gagal diupdate'
            );   
        }
        return json_encode($hasil);
    }

    function delete_data($obj) {
        $data = $obj->data;
        $this->db->where('id', $obj->id);
        $delete = $this->db->delete('koleksifilmku');
        // $delete = $this->db->delete('koleksifilmku', array('id' => $data->id));
        if($delete) {
            $hasil = array(
                'status' => 'ok',
                'keterangan' => 'data berhasil dihapus'
            );
        }else {
            $hasil = array(
                'status' => 'gagal',
                'keterangan' => 'data gagal dihapus'
            );   
        }
        return json_encode($hasil);
    }

}