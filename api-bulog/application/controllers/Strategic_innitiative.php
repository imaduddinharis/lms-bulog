<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Strategic_innitiative extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
        $this->table = "strategic_innitiative";
    }

    //Menampilkan data user
    function index_get() {
        $kode_si = $this->get('kode_si');
        if ($kode_si == '') {
            $data = $this->db->get($this->table)->result();
            $user = array('status' => 'success','message' => 'get success','result'=>$data);
        } else {
            $this->db->where('kode_si', $kode_si);
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
                    'kode_si'         => $this->post('kode_si'),
                    'nama'            => $this->post('nama'),
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
        $kode_si = $this->put('kode_si');
        $data = array(
                    'nama'   => $this->put('nama'),
                    'updated_at'      => date("Y-m-d h:i:sa")
        );
        $this->db->where('kode_si', $kode_si);
        $update = $this->db->update($this->table, $data);
        if ($update) {
            $this->response(array('status' => 'success',$data, 200));
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
    //Menghapus salah satu data user
	function index_delete() {
        $kode_si = $this->delete('kode_si');
        $this->db->where('kode_si', $kode_si);
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