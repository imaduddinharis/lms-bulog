<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Tujuan_pelatihan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
        $this->table = "tujuan_pelatihan";
    }

    //Menampilkan data user
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $data = $this->db->get($this->table)->result();
            if($data != NULL){
                $user = array('status' => 'success','message' => 'get success','result'=>$data);
            }else{
                $user = array('status' => 'success','message' => 'get success','result'=>'empty data');
            }
        } else {
            $this->db->where('id', $id);
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
                    'kode_tipe'       => $this->post('kode_tipe'),
                    'kode_akademi'    => $this->post('kode_akademi'),
                    'created_at'      => date("Y-m-d h:i:sa"),
                    'updated_at'      => date("Y-m-d h:i:sa")
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
        $id = $this->put('id');
        $data = array(
                    'kode_tipe'     => $this->put('kode_tipe'),
                    'kode_akademi'  => $this->put('kode_akademi'),
                    'updated_at'    => date("Y-m-d h:i:sa")
        );
        $this->db->where('id', $id);
        $update = $this->db->update($this->table, $data);
        if ($update) {
            $this->response(array('status' => 'success',$data, 200));
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
    //Menghapus salah satu data user
	function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
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