<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Diklat extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
        $this->table = "diklat";
    }

    //Menampilkan data user
    function index_get() {
        $kode_diklat = $this->get('kode_diklat');
        if ($kode_diklat == '') {
            $data = $this->db->get($this->table)->result();
            $user = array('status' => 'success','message' => 'get success','result'=>$data);
        } else {
            $this->db->where('kode_diklat', $kode_diklat);
            $data = $this->db->get($this->table)->result();
            if($data != NULL){
            $user = array('status' => 'success','message' => 'ditemukan','result'=>$data,200);
            }else{    
            $user = array('status' => 'failed','message' => 'data tidak ditemukan',502);
            }
        }
        $this->response($user, 200);
    }

    //Mengirim atau menambah data user baru
	function index_post() {
        $data = array(
                    'kode_diklat'         => $this->post('kode_diklat'),
                    'nama_diklat'         => $this->post('nama_diklat'),
                    'kode_kompetensi'     => $this->post('kode_kompetensi'),
                    'materi'              => $this->post('materi'),
                    'master_plan'         => $this->post('master_plan'),
                    'tujuan'              => $this->post('tujuan'),
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
        $kode_diklat = $this->put('kode_diklat');
        $data = array(
                    'nama_diklat'       => $this->put('nama_diklat'),
                    'kode_kompetensi'   => $this->put('kode_kompetensi'),
                    'materi'            => $this->put('materi'),
                    'master_plan'       => $this->put('master_plan'),
                    'tujuan'            => $this->put('tujuan'),
                    'updated_at'        => date("Y-m-d h:i:sa")
        );
        $this->db->where('kode_diklat', $kode_diklat);
        $update = $this->db->update($this->table, $data);
        if ($update) {
            $this->response(array('status' => 'success',$data, 200));
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
    //Menghapus salah satu data user
	function index_delete() {
        $kode_diklat = $this->delete('kode_diklat');
        $this->db->where('kode_diklat', $kode_diklat);
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