<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Divre extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
        $this->table = "divre";
    }

    //Menampilkan data user
    function index_get() {
        $kode_divre = $this->get('kode_divre');
        if ($kode_divre == '') {
            $data = $this->db->get($this->table)->result();
            $user = array('status' => 'success','message' => 'get success','result'=>$data);
        } else {
            $this->db->where('kode_divre', $kode_divre);
            $data = $this->db->get($this->table)->result();
            if($data != NULL){
            $user = array('status' => 'success','message' => 'ditemukan',$data,200);
            }else{    
            $user = array('status' => 'failed','message' => 'data tidak ditemukan',502);
            }
        }
        $this->response($user, 200);
    }

    //Mengirim atau menambah data user baru
	function index_post() {
        $data = array(
                    'kode_divre'         => $this->post('kode_divre'),
                    'uraian'         => $this->post('uraian'),
                    'created_at'          => date("Y-m-d h:i:sa"),
                    'updated_at'          => date("Y-m-d h:i:sa")
        );
        $insert = $this->db->insert($this->table, $data);
        if ($insert) {
            $this->response(array('status' => 'success',$data, 200));
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
    //Memperbarui data user yang telah ada
	function index_put() {
        $kode_divre = $this->put('kode_divre');
        $data = array(
                    'uraian'       => $this->put('uraian'),
                    'updated_at'        => date("Y-m-d h:i:sa")
        );
        $this->db->where('kode_divre', $kode_divre);
        $update = $this->db->update($this->table, $data);
        if ($update) {
            $this->response(array('status' => 'success',$data, 200));
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
    //Menghapus salah satu data user
	function index_delete() {
        $kode_divre = $this->delete('kode_divre');
        $this->db->where('kode_divre', $kode_divre);
        $delete = $this->db->delete($this->table);
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Masukan function selanjutnya disini
}
?>