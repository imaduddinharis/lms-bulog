<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Learning_plan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
        $this->table = "learning_plan";
    }

    //Menampilkan data user
    function index_get() {
        $kode_lp = $this->get('kode_lp');
        if ($kode_lp == '') {
            $data = $this->db->get($this->table)->result();
            $user = array('status' => 'success','message' => 'get success','result'=>$data);
        } else {
            $this->db->where('kode_lp', $kode_lp);
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
                    'kode_lp'         => $this->post('kode_lp'),
                    'kode_diklat'     => $this->post('kode_diklat'),
                    'kode_akademi'    => $this->post('kode_akademi'),
                    'kode_pi'         => $this->post('kode_pi'),
                    'kode_si'         => $this->post('kode_si'),
                    'kode_ci'         => $this->post('kode_ci'),
                    'kode_bi'         => $this->post('kode_bi'),
                    'tahun'           => $this->post('tahun'),
                    'total_anggaran'  => $this->post('total_anggaran'),
                    'tempat'          => $this->post('tempat'),
                    'tgl_mulai'   => $this->post('tgl_mulai'),
                    'tgl_selesai' => $this->post('tgl_selesai'),
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
        $kode_lp = $this->put('kode_lp');
        $data = array(
                    'kode_lp'         => $this->put('kode_lp'),
                    'kode_diklat'     => $this->put('kode_diklat'),
                    'kode_akademi'    => $this->put('kode_akademi'),
                    'kode_pi'         => $this->put('kode_pi'),
                    'kode_si'         => $this->put('kode_si'),
                    'kode_ci'         => $this->put('kode_ci'),
                    'kode_bi'         => $this->put('kode_bi'),
                    'tahun'           => $this->put('tahun'),
                    'total_anggaran'  => $this->put('total_anggaran'),
                    'tempat'          => $this->put('tempat'),
                    'tgl_mulai'       => $this->put('tgl_mulai'),
                    'tgl_selesai'     => $this->put('tgl_selesai'),
                    'updated_at'        => date("Y-m-d h:i:sa")
        );
        $this->db->where('kode_lp', $kode_lp);
        $update = $this->db->update($this->table, $data);
        if ($update) {
            $this->response(array('status' => 'success',$data, 200));
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
    //Menghapus salah satu data user
	function index_delete() {
        $kode_lp = $this->delete('kode_lp');
        $this->db->where('kode_lp', $kode_lp);
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