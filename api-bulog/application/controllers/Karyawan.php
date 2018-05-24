<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Karyawan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
        $this->table = "karyawan";
    }

    //Menampilkan data user
    function index_get() {
        $nip = $this->get('nip');        
        if ($nip == '') {
            $data = $this->db->get($this->table)->result();
            $user = array('status' => 'success','message' => 'get success','result'=>$data);
        } else {
            $this->db->where('nip', $nip);
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
                    'nip'               => $this->post('nip'),
                    'nama'              => $this->post('nama'),
                    'gelar_depan'       => $this->post('gelar_depan'),
                    'gelar_belakang'    => $this->post('gelar_belakang'),
                    'tgl_lahir'         => $this->post('tgl_lahir'),
                    'jns_kelamin'       => $this->post('jns_kelamin'),
                    'jenjang'           => $this->post('jenjang'),
                    'divre'             => $this->post('divre'),
                    'divisi'            => $this->post('divisi'),
                    'tmt_pengangkatan'  => $this->post('tmt_pengangkatan'),
                    'telp_1'            => $this->post('telp_1'),
                    'telp_2'            => $this->post('telp_2'),
                    'created_at'        => date("Y-m-d h:i:sa"),
                    'updated_at'        => date("Y-m-d h:i:sa")
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
        $nip = $this->put('nip');
        $data = array(
                    'nama'              => $this->put('nama'),
                    'gelar_depan'       => $this->put('gelar_depan'),
                    'gelar_belakang'    => $this->put('gelar_belakang'),
                    'tgl_lahir'         => $this->put('tgl_lahir'),
                    'jns_kelamin'       => $this->put('jns_kelamin'),
                    'jenjang'           => $this->put('jenjang'),
                    'divre'             => $this->put('divre'),
                    'divisi'            => $this->put('divisi'),
                    'tmt_pengangkatan'  => $this->put('tmt_pengangkatan'),
                    'telp_1'            => $this->put('telp_1'),
                    'telp_2'            => $this->put('telp_2'),
                    'updated_at'      => date("Y-m-d h:i:sa")
        );
        $this->db->where('nip', $nip);
        $update = $this->db->update($this->table, $data);
        if ($update) {
            $this->response(array('status' => 'success',$data, 200));
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
    //Menghapus salah satu data user
	function index_delete() {
        $nip = $this->delete('nip');
        $this->db->where('nip', $nip);
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